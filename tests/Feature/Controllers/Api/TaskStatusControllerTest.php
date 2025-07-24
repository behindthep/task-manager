<?php

namespace Tests\Feature\Controllers\Api;

use Tests\TestCase;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Testing\TestResponse;

class TaskStatusControllerTest extends TestCase
{
    public function testIndex(): TestResponse
    {
        TaskStatus::factory()->count(10)->create();

        $response = $this->getJson('/api/task_statuses');

        $response->assertStatus(200)
                 ->assertJsonStructure(['total', 'task_statuses', 'page']);

        return $response;
    }

    public function testStore(): TestResponse
    {
        $user = User::factory()->create();

        $data = [
            'name' => 'New Status',
        ];
        $response = $this->actingAs($user, 'sanctum')->postJson('/api/task_statuses', $data);

        $response->assertStatus(201)
                 ->assertJson($data);

        return $response;
    }

    public function testUpdate(): TestResponse
    {
        $user = User::factory()->create();
        $status = TaskStatus::factory()->create(['created_by_id' => $user->id]);

        $data = [
            'name' => 'Updated Status',
        ];
        $response = $this->actingAs($user, 'sanctum')->patchJson("/api/task_statuses/{$status->id}", $data);

        $response->assertStatus(200)
                 ->assertJson($data);

        $this->assertDatabaseHas('task_statuses', [
            'id' => $status->id,
            ...$data
        ]);

        return $response;
    }

    public function testDestroy(): TestResponse
    {
        $user = User::factory()->create();
        $status = TaskStatus::factory()->create(['created_by_id' => $user->id]);

        $response = $this->actingAs($user, 'sanctum')->deleteJson("/api/task_statuses/{$status->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('task_statuses', ['id' => $status->id]);

        return $response;
    }
}
