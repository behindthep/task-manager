<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Task;
use Tests\TestCase;

class ProfileControllerTest extends TestCase
{
    public function testProfilePageIsDisplayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/profile');

        $response->assertOk();
    }

    public function testProfileInformationCanBeUpdated(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch('/profile', [
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');

        $user->refresh();

        $this->assertSame('Test User', $user->name);
        $this->assertSame('test@example.com', $user->email);
        $this->assertNull($user->email_verified_at);
    }

    public function testEmailVerificationStatusIsUnchangedWhenTheEmailAddressIsUnchanged(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch('/profile', [
                'name' => 'Test User',
                'email' => $user->email,
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');

        $this->assertNotNull($user->refresh()->email_verified_at);
    }


    public function testUserCanDeleteTheirAccount(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->delete('/profile', [
                'password' => 'password',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/');

        $this->assertGuest();
        $this->assertNull($user->fresh());
    }

    public function testTasksCorrectAfterUserDestroy(): void
    {
        $userForDel = User::factory()->create();
        $userForCheck = User::factory()->create();

        $taskForDel = Task::factory()->create([
            'created_by_id' => $userForDel->id,
        ]);

        $taskForCheck = Task::factory()->create([
            'created_by_id' => $userForCheck->id,
            'assigned_to_id' => $userForDel->id
        ]);

        $this->actingAs($userForDel)->delete('/profile', [
            'password' => 'password'
        ]);

        $this->assertDatabaseMissing('tasks', ['id' => $taskForDel->id]);
        $this->assertDatabaseHas('tasks', [
            'id' => $taskForCheck->id,
            'assigned_to_id' => null,
        ]);
    }

    public function testCorrectPasswordMustBeProvidedToDeleteAccount(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->from('/profile')
            ->delete('/profile', [
                'password' => 'wrong-password',
            ]);

        $response
            ->assertSessionHasErrorsIn('userDeletion', 'password')
            ->assertRedirect('/profile');

        $this->assertNotNull($user->fresh());
    }
}
