<?php

namespace Tests\Feature\Controllers\Api;

use Tests\TestCase;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Testing\TestResponse;

class TaskStatusControllerTest extends TestCase
{
    public function testIndexTaskStatuses(): TestResponse
    {
        TaskStatus::factory()->count(10)->create();

        $response = $this->getJson('/api/task_statuses');

        $response->assertStatus(200)
                 ->assertJsonStructure(['total', 'task_statuses', 'page']);

        return $response;
    }

    public function testStoreTaskStatusRequiresAuth(): TestResponse
    {
        $response = $this->postJson('/api/task_statuses', [
            'name' => 'New Status',
        ]);

        $response->assertStatus(401);

        return $response;
    }

    public function testStoreTaskStatusSuccess(): TestResponse
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'sanctum')->postJson('/api/task_statuses', [
            'name' => 'New Status',
        ]);

        $response->assertStatus(201)
                 ->assertJson(['name' => 'New Status']);

        return $response;
    }

    public function testUpdateTaskStatusSuccess(): TestResponse
    {
        $user = User::factory()->create();
        $status = TaskStatus::factory()->create(['created_by_id' => $user->id]);

        $response = $this->actingAs($user, 'sanctum')->patchJson("/api/task_statuses/{$status->id}", [
            'name' => 'Updated Status',
        ]);

        $response->assertStatus(200)
                 ->assertJson(['name' => 'Updated Status']);

        $this->assertDatabaseHas('task_statuses', [
            'id' => $status->id,
            'name' => 'Updated Status',
        ]);

        return $response;
    }

    public function testDeleteTaskStatusSuccess(): TestResponse
    {
        $user = User::factory()->create();
        $status = TaskStatus::factory()->create(['created_by_id' => $user->id]);

        $response = $this->actingAs($user, 'sanctum')->deleteJson("/api/task_statuses/{$status->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('task_statuses', ['id' => $status->id]);

        return $response;
    }
}
