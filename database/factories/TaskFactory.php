<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\TaskStatus;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(2, true),
            'description' => fake()->sentence(),
            'status_id' => fn() => TaskStatus::factory()->create()->id,
            'assigned_to_id' => fn() => User::factory()->create()->id,
            'created_by_id' => fn() => User::factory()->create()->id,
        ];
    }
}
