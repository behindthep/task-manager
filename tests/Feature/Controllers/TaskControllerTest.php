<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\User;
use App\Models\Task;

class TaskControllerTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        Task::factory()->count(2)->create();
    }

    // public function testFilter(): void
    // {
    //     Можно ли в тестах сделать логику заполнения формы?
    //     Task::factory()->count(10)->create();
    // }

    public function testIndex(): void
    {
        $response = $this->get(route('tasks.index'));
        $response->assertOk();
    }

    public function testEdit(): void
    {
        $task = Task::factory()->create([
            'created_by_id' => $this->user->id,
        ]);
        $response = $this->actingAs($this->user)->get(route('tasks.edit', $task));
        $response->assertOk();
    }

    public function testCreate(): void
    {
        $response = $this->actingAs($this->user)->get(route('tasks.create'));
        $response->assertOk();
    }

    public function testStore(): void
    {
        $data = Task::factory()->make([
            'created_by_id' => $this->user->id
        ])->toArray();
        $response = $this->actingAs($this->user)->post(route('tasks.store'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('tasks.index'));

        $this->assertDatabaseHas('tasks', $data);
    }

    public function testUpdate(): void
    {
        $task = Task::factory()->create([
            'created_by_id' => $this->user->id,
        ]);
        $data = Task::factory()->make()->except('created_by_id');

        $response = $this->actingAs($this->user)->patch(route('tasks.update', $task), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('tasks.index'));

        $this->assertDatabaseHas('tasks', $data);
    }

    public function testDestroy(): void
    {
        $task = Task::factory()->create([
            'created_by_id' => $this->user->id
        ]);
        $response = $this->actingAs($this->user)->delete(route('tasks.destroy', $task));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('tasks.index'));

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }

    public function testShow(): void
    {
        $task = Task::factory()->create();
        $response = $this->get(route('tasks.show', $task));
        $response->assertOk();
    }
}
