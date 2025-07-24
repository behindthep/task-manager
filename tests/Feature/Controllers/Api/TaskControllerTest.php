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
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        Task::factory()->count(5)->create();
    }

    public function testIndex(): TestResponse
    {
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
        $status = TaskStatus::factory()->create();
        $labels = Label::factory()->count(2)->create();

        $data = [
            'name' => 'Test Task',
            'status_id' => $status->id,
            'labels' => $labels->pluck('id')->toArray(),
        ];

        $response = $this->actingAs($this->user, 'sanctum')->postJson('/api/tasks', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment(['name' => 'Test Task'])
                 ->assertJsonStructure(['id', 'name', 'labels']);

        return $response;
    }

    public function testUpdate(): TestResponse
    {
        $task = Task::factory()->create(['created_by_id' => $this->user->id]);
        $status = TaskStatus::factory()->create();
        $labels = Label::factory()->count(2)->create();

        $data = [
            'name' => 'Updated Task',
            'status_id' => $status->id,
            'labels' => $labels->pluck('id')->toArray(),
        ];

        $response = $this->actingAs($this->user, 'sanctum')->patchJson("/api/tasks/{$task->id}", $data);

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
        $task = Task::factory()->create(['created_by_id' => $this->user->id]);

        $response = $this->actingAs($this->user, 'sanctum')->deleteJson("/api/tasks/{$task->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);

        return $response;
    }
}
