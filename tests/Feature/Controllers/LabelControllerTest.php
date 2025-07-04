<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\User;
use App\Models\Label;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LabelControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function testIndex(): void
    {
        $response = $this->get(route('labels.index'));
        $response->assertOk();
    }

    public function testEdit(): void
    {
        $label = Label::factory()->create([
            'created_by_id' => $this->user->id,
        ]);
        $response = $this->actingAs($this->user)->get(route('labels.edit', $label));
        $response->assertOk();
    }

    public function testCreate(): void
    {
        $response = $this->actingAs($this->user)->get(route('labels.create'));
        $response->assertOk();
    }

    public function testStore(): void
    {
        $data = Label::factory()->make([
            'created_by_id' => $this->user->id,
        ])->toArray();
        $response = $this->actingAs($this->user)->post(route('labels.store'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('labels', $data);
    }

    public function testUpdate(): void
    {
        $label = Label::factory()->create([
            'created_by_id' => $this->user->id,
        ]);
        $data = Label::factory()->make()->except('created_by_id');
        $response = $this->actingAs($this->user)->patch(route('labels.update', $label), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('labels', [
            'id' => $label->id,
            ...$data,
        ]);
    }

    public function testDestroy(): void
    {
        $label = Label::factory()->create([
            'created_by_id' => $this->user->id,
        ]);
        $response = $this->actingAs($this->user)->delete(route('labels.destroy', $label));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseMissing('labels', ['id' => $label->id]);
    }
}
