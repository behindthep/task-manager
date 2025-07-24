<?php

namespace Tests\Feature\Controllers\Api;

use Tests\TestCase;
use App\Models\TaskStatus;
use App\Models\User;
use App\Models\Task;
use Illuminate\Testing\TestResponse;

class TaskStatusControllerTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        TaskStatus::factory()->count(5)->create();
    }

    public function testIndex(): TestResponse
    {
        $response = $this->getJson('/api/task_statuses');

        $response->assertStatus(200)
                 ->assertJsonStructure(['total', 'task_statuses', 'page']);

        return $response;
    }

    public function testStore(): TestResponse
    {
        $data = [
            'name' => 'New Status',
        ];
        $response = $this->actingAs($this->user, 'sanctum')->postJson('/api/task_statuses', $data);

        $response->assertStatus(201)
                 ->assertJson($data);

        return $response;
    }

    public function testUpdate(): TestResponse
    {
        $taskStatus = TaskStatus::factory()->create(['created_by_id' => $this->user->id]);

        $data = [
            'name' => 'Updated Status',
        ];
        $response = $this->actingAs($this->user, 'sanctum')->patchJson("/api/task_statuses/{$taskStatus->id}", $data);

        $response->assertStatus(200)
                 ->assertJson($data);

        $this->assertDatabaseHas('task_statuses', [
            'id' => $taskStatus->id,
            ...$data
        ]);

        return $response;
    }

    public function testDestroy(): TestResponse
    {
        $taskStatus = TaskStatus::factory()->create([
            'created_by_id' => $this->user->id
        ]);

        $response = $this->actingAs($this->user, 'sanctum')->deleteJson("/api/task_statuses/{$taskStatus->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('task_statuses', ['id' => $taskStatus->id]);

        return $response;
    }

    public function testDestroyWithTasks(): TestResponse
    {
        $taskStatus = TaskStatus::factory()->create([
            'created_by_id' => $this->user->id
        ]);
        Task::factory()->create([
            'status_id' => $taskStatus->id
        ]);

        $response = $this->actingAs($this->user, 'sanctum')->deleteJson("/api/task_statuses/{$taskStatus->id}");
        $response->assertStatus(409);

        $this->assertDatabaseHas('task_statuses', ['id' => $taskStatus->id]);

        return $response;
    }
}
