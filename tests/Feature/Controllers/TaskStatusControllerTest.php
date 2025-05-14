<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\TaskStatus;

class TaskStatusControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGuestCannotAccessCreatePage()
    {
        $response = $this->get(route('task_statuses.create'));
        $response->assertRedirect(route('login'));
    }

    public function testAuthenticatedUserCanAccessCreatePage()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('task_statuses.create'));
        $response->assertStatus(200);
    }

    public function testGuestCannotStoreTaskStatus()
    {
        $response = $this->post(route('task_statuses.store'), ['name' => 'New Status']);
        $response->assertRedirect(route('login'));
    }

    public function testAuthenticatedUserCanStoreTaskStatus()
    {
        $user = User::factory()->create();
        $data = ['name' => 'In Progress'];

        $response = $this->actingAs($user)->post(route('task_statuses.store'), $data);

        $this->assertDatabaseHas('task_statuses', $data);
        $response->assertRedirect(route('task_statuses.index'));
    }

    public function testAuthenticatedUserCanUpdateTaskStatus()
    {
        $user = User::factory()->create();
        $taskStatus = TaskStatus::factory()->create(['name' => 'Old Name']);
        $newData = ['name' => 'Updated Name'];

        $response = $this->actingAs($user)->put(route('task_statuses.update', $taskStatus), $newData);

        $this->assertDatabaseHas('task_statuses', $newData);
        $response->assertRedirect(route('task_statuses.index'));
    }

    public function testAuthenticatedUserCanDeleteTaskStatus()
    {
        $user = User::factory()->create();
        $taskStatus = TaskStatus::factory()->create();

        $response = $this->actingAs($user)->delete(route('task_statuses.destroy', $taskStatus));

        $this->assertDatabaseMissing('task_statuses', ['id' => $taskStatus->id]);
        $response->assertRedirect(route('task_statuses.index'));
    }
}
