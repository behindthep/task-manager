<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\User;
use App\Models\TaskStatus;
use App\Models\Task;

class TaskStatusControllerTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        TaskStatus::factory()->count(5)->create();
    }

    public function testIndex(): void
    {
        $response = $this->get(route('task_statuses.index'));
        $response->assertOk();
    }

    public function testEdit(): void
    {
        $taskStatus = TaskStatus::factory()->create([
            'created_by_id' => $this->user->id,
        ]);
        $response = $this->actingAs($this->user)->get(route('task_statuses.edit', $taskStatus));
        $response->assertOk();
    }

    public function testCreate(): void
    {
        $response = $this->actingAs($this->user)->get(route('task_statuses.create'));
        $response->assertOk();
    }

    public function testStore(): void
    {
        $data = TaskStatus::factory()->make()->only('name');
        $response = $this->actingAs($this->user)->post(route('task_statuses.store'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('task_statuses.index'));

        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testUpdate(): void
    {
        $taskStatus = TaskStatus::factory()->create([
            'created_by_id' => $this->user->id,
        ]);
        $data = TaskStatus::factory()->make()->only('name');

        $response = $this->actingAs($this->user)->patch(route('task_statuses.update', $taskStatus), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('task_statuses.index'));

        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testDestroy(): void
    {
        $taskStatus = TaskStatus::factory()->create([
            'created_by_id' => $this->user->id,
        ]);
        $response = $this->actingAs($this->user)->delete(route('task_statuses.destroy', $taskStatus));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('task_statuses.index'));

        $this->assertDatabaseMissing('task_statuses', ['id' => $taskStatus->id]);
    }

    public function testDestroyWithTasks(): void
    {
        $taskStatus = TaskStatus::factory()->create([
            'created_by_id' => $this->user->id
        ]);
        Task::factory()->create([
            'status_id' => $taskStatus->id
        ]);

        $response = $this->actingAs($this->user)->delete(route('task_statuses.destroy', $taskStatus));
        $response->assertSessionHasErrors();
        $response->assertRedirect(url()->previous());

        $this->assertDatabaseHas('task_statuses', ['id' => $taskStatus->id]);
    }
}
