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
    public function testIndex(): TestResponse
    {
        Task::factory()->count(12)->create();

        $response = $this->getJson('/api/tasks');

        $response->assertStatus(200)
                 ->assertJsonStructure(['total', 'tasks', 'page']);

        return $response;
    }

    public function testShow(): TestResponse
    {
        $task = Task::factory()->create();

        $response = $this->getJson("/api/tasks/{$task->id}");

        $response->assertStatus(200)
                 ->assertJson(['id' => $task->id]);

        return $response;
    }

    public function testStore(): TestResponse
    {
        $user = User::factory()->create();
        $status = TaskStatus::factory()->create();
        $labels = Label::factory()->count(2)->create();

        $data = [
            'name' => 'Test Task',
            'status_id' => $status->id,
            'labels' => $labels->pluck('id')->toArray(),
        ];

        $response = $this->actingAs($user, 'sanctum')->postJson('/api/tasks', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment(['name' => 'Test Task'])
                 ->assertJsonStructure(['id', 'name', 'labels']);

        return $response;
    }

    public function testUpdate(): TestResponse
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['created_by_id' => $user->id]);
        $status = TaskStatus::factory()->create();
        $labels = Label::factory()->count(2)->create();

        $data = [
            'name' => 'Updated Task',
            'status_id' => $status->id,
            'labels' => $labels->pluck('id')->toArray(),
        ];

        $response = $this->actingAs($user, 'sanctum')->patchJson("/api/tasks/{$task->id}", $data);

        unset($data['labels']);

        $response->assertStatus(200)
                 ->assertJsonFragment($data);

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            ...$data
        ]);

        return $response;
    }

    public function testDestroy(): TestResponse
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['created_by_id' => $user->id]);

        $response = $this->actingAs($user, 'sanctum')->deleteJson("/api/tasks/{$task->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);

        return $response;
    }
}
