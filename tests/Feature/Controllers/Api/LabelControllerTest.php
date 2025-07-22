<?php

namespace Tests\Feature\Controllers\Api;

use Tests\TestCase;
use App\Models\Label;
use App\Models\User;
use Illuminate\Testing\TestResponse;

class LabelControllerTest extends TestCase
{
    public function testIndexLabels(): TestResponse
    {
        Label::factory()->count(5)->create();

        $response = $this->getJson('/api/labels');

        $response->assertStatus(200)
                 ->assertJsonStructure(['total', 'labels', 'page'])
                 ->assertJson(['page' => 1]);

        return $response;
    }

    public function testStoreLabelSuccess(): TestResponse
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'sanctum')->postJson('/api/labels', [
            'name' => 'New Label',
            'description' => 'Test description',
        ]);

        $response->assertStatus(201)
                 ->assertJson(['name' => 'New Label', 'description' => 'Test description'])
                 ->assertJsonStructure(['id', 'name', 'description', 'created_by_id']);

        return $response;
    }

    public function testUpdateLabelSuccess(): TestResponse
    {
        $user = User::factory()->create();
        $label = Label::factory()->create(['created_by_id' => $user->id]);

        $response = $this->actingAs($user, 'sanctum')->patchJson("/api/labels/{$label->id}", [
            'name' => 'Updated Label',
            'description' => 'Updated description',
        ]);

        $response->assertStatus(200)
                 ->assertJson(['name' => 'Updated Label', 'description' => 'Updated description']);

        $this->assertDatabaseHas('labels', [
            'id' => $label->id,
            'name' => 'Updated Label',
            'description' => 'Updated description',
        ]);

        return $response;
    }

    public function testDeleteLabelSuccess(): TestResponse
    {
        $user = User::factory()->create();
        $label = Label::factory()->create(['created_by_id' => $user->id]);

        $response = $this->actingAs($user, 'sanctum')->deleteJson("/api/labels/{$label->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('labels', ['id' => $label->id]);

        return $response;
    }
}
