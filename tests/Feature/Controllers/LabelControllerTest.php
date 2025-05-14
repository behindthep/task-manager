<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Label;

class LabelControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGuestCannotAccessCreatePage(): void
    {
        $response = $this->get(route('labels.create'));
        $response->assertRedirect(route('login'));
    }

    public function testAuthenticatedUserCanAccessCreatePage(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('labels.create'));
        $response->assertStatus(200);
    }

    public function testGuestCannotStoreLabel(): void
    {
        $response = $this->post(route('labels.store'), ['name' => 'New Label', 'description' => 'test']);
        $response->assertRedirect(route('login'));
    }

    public function testAuthenticatedUserCanStoreLabel(): void
    {
        $user = User::factory()->create();
        $data = ['name' => 'In Progress', 'description' => 'Task in progress'];

        $response = $this->actingAs($user)->post(route('labels.store'), $data);

        $this->assertDatabaseHas('labels', $data);
        $response->assertRedirect(route('labels.index'));
    }

    public function testAuthenticatedUserCanUpdateLabel(): void
    {
        $user = User::factory()->create();
        $label = Label::factory()->create(['name' => 'Old Name']);
        $newData = ['name' => 'Updated Name', 'description' => 'Updated description'];

        $response = $this->actingAs($user)->put(route('labels.update', $label), $newData);

        $this->assertDatabaseHas('labels', $newData);
        $response->assertRedirect(route('labels.index'));
    }

    public function testAuthenticatedUserCanDeleteLabel(): void
    {
        $user = User::factory()->create();
        $label = Label::factory()->create();

        $response = $this->actingAs($user)->delete(route('labels.destroy', $label));

        $this->assertDatabaseMissing('labels', ['id' => $label->id]);
        $response->assertRedirect(route('labels.index'));
    }
}
