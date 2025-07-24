<?php

namespace Tests\Feature\Controllers\Api;

use Tests\TestCase;
use App\Models\Label;
use App\Models\User;
use App\Models\Task;
use Illuminate\Testing\TestResponse;

class LabelControllerTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        Label::factory()->count(5)->create();
    }

    public function testIndex(): TestResponse
    {
        $response = $this->getJson('/api/labels');

        $response->assertStatus(200)
                 ->assertJsonStructure(['total', 'labels', 'page'])
                 ->assertJson(['page' => 1]);

        return $response;
    }

    public function testStore(): TestResponse
    {
        $data = [
            'name' => 'New Label',
            'description' => 'Test description'
        ];
        $response = $this->actingAs($this->user, 'sanctum')->postJson('/api/labels', $data);

        $response->assertStatus(201)
                 ->assertJson($data)
                 ->assertJsonStructure(['id', 'name', 'description', 'created_by_id']);

        return $response;
    }

    public function testUpdate(): TestResponse
    {
        $label = Label::factory()->create(['created_by_id' => $this->user->id]);

        $data = [
            'name' => 'Updated Label',
            'description' => 'Updated description',
        ];
        $response = $this->actingAs($this->user, 'sanctum')->patchJson("/api/labels/{$label->id}", $data);

        $response->assertStatus(200)
                 ->assertJson($data);

        $this->assertDatabaseHas('labels', [
            'id' => $label->id,
            ...$data
        ]);

        return $response;
    }

    public function testDestroy(): TestResponse
    {
        $label = Label::factory()->create([
            'created_by_id' => $this->user->id
        ]);

        $response = $this->actingAs($this->user, 'sanctum')->deleteJson("/api/labels/{$label->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('labels', ['id' => $label->id]);

        return $response;
    }

    public function testDestroyWithTasks(): TestResponse
    {
        $label = Label::factory()->create([
            'created_by_id' => $this->user->id,
        ]);
        $task = Task::factory()->create();
        $task->labels()->sync([$label->id]);

        $response = $this->actingAs($this->user, 'sanctum')->deleteJson("/api/labels/{$label->id}");
        $response->assertStatus(409);

        $this->assertDatabaseHas('labels', ['id' => $label->id]);

        return $response;
    }
}
