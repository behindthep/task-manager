<?php

namespace Tests\Feature\Controllers\Api;

use Tests\TestCase;
use App\Models\Label;
use App\Models\User;
use Illuminate\Testing\TestResponse;

class LabelControllerTest extends TestCase
{
    public function testIndex(): TestResponse
    {
        Label::factory()->count(5)->create();

        $response = $this->getJson('/api/labels');

        $response->assertStatus(200)
                 ->assertJsonStructure(['total', 'labels', 'page'])
                 ->assertJson(['page' => 1]);

        return $response;
    }

    public function testStore(): TestResponse
    {
        $user = User::factory()->create();

        $data = [
            'name' => 'New Label',
            'description' => 'Test description'
        ];
        $response = $this->actingAs($user, 'sanctum')->postJson('/api/labels', $data);

        $response->assertStatus(201)
                 ->assertJson($data)
                 ->assertJsonStructure(['id', 'name', 'description', 'created_by_id']);

        return $response;
    }

    public function testUpdate(): TestResponse
    {
        $user = User::factory()->create();
        $label = Label::factory()->create(['created_by_id' => $user->id]);

        $data = [
            'name' => 'Updated Label',
            'description' => 'Updated description',
        ];
        $response = $this->actingAs($user, 'sanctum')->patchJson("/api/labels/{$label->id}", $data);

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
        $user = User::factory()->create();
        $label = Label::factory()->create(['created_by_id' => $user->id]);

        $response = $this->actingAs($user, 'sanctum')->deleteJson("/api/labels/{$label->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('labels', ['id' => $label->id]);

        return $response;
    }
}
