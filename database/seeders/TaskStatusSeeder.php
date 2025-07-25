<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TaskStatus;
use App\Models\User;

class TaskStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['name' => 'новый'],
            ['name' => 'в работе'],
            ['name' => 'на тестировании'],
            ['name' => 'завершен'],
        ];

        foreach ($statuses as $status) {
            TaskStatus::firstOrCreate(
                ['name' => $status['name']],
                ['created_by_id' => User::inRandomOrder()->first()->id],
            );
        }
    }
}
