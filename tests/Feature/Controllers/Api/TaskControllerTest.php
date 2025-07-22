<?php

namespace Tests\Feature\Controllers\Api;

use Tests\TestCase;
use App\Models\Task;
use App\Models\User;
use App\Models\TaskStatus;
use App\Models\Label;
use Illuminate\Testing\TestResponse;

class TaskControllerTest extends TestCase
{
    public function testIndexTasks(): TestResponse
    {
        Task::factory()->count(12)->create();

        $response = $this->getJson('/api/tasks');

        $response->assertStatus(200)
                 ->assertJsonStructure(['total', 'tasks', 'page']);

        return $response;
    }

    public function testShowTask(): TestResponse
    {
        $task = Task::factory()->create();

        $response = $this->getJson("/api/tasks/{$task->id}");

        $response->assertStatus(200)
                 ->assertJson(['id' => $task->id]);

        return $response;
    }

    public function testStoreTaskRequiresAuth(): TestResponse
    {
        $response = $this->postJson('/api/tasks', [
            'name' => 'Test Task',
            'status_id' => 1,
        ]);

        $response->assertStatus(401);

        return $response;
    }

    public function testStoreTaskSuccess(): TestResponse
    {
        $user = User::factory()->create();
        $status = TaskStatus::factory()->create();
        $labels = Label::factory()->count(2)->create();

        $payload = [
            'name' => 'Test Task',
            'status_id' => $status->id,
            'labels' => $labels->pluck('id')->toArray(),
        ];

        $response = $this->actingAs($user, 'sanctum')->postJson('/api/tasks', $payload);

        $response->assertStatus(201)
                 ->assertJsonFragment(['name' => 'Test Task'])
                 ->assertJsonStructure(['id', 'name', 'labels']);

        return $response;
    }

    public function testUpdateTaskSuccess(): TestResponse
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['created_by_id' => $user->id]);
        $status = TaskStatus::factory()->create();
        $labels = Label::factory()->count(2)->create();

        $payload = [
            'name' => 'Updated Task',
            'status_id' => $status->id,
            'labels' => $labels->pluck('id')->toArray(),
        ];

        $response = $this->actingAs($user, 'sanctum')->patchJson("/api/tasks/{$task->id}", $payload);

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => 'Updated Task']);

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'name' => 'Updated Task',
            'status_id' => $status->id,
        ]);

        return $response;
    }

    public function testDeleteTaskSuccess(): TestResponse
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['created_by_id' => $user->id]);

        $response = $this->actingAs($user, 'sanctum')->deleteJson("/api/tasks/{$task->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);

        return $response;
    }
}
