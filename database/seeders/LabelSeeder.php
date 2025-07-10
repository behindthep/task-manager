<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Label;
use App\Models\User;

class LabelSeeder extends Seeder
{
    public function run(): void
    {
        $labels = [
            ['name' => 'ошибка',
            'description' => 'Какая-то ошибка в коде или проблема с функциональностью'],
            ['name' => 'документация',
            'description' => 'Задача которая касается документации'],
            ['name' => 'дубликат',
            'description' => 'Повтор другой задачи'],
            ['name' => 'доработка',
            'description' => 'Новая фича, которую нужно запилить'],
        ];

        foreach ($labels as $label) {
            Label::firstOrCreate([
                'name' => $label['name'],
                'description' => $label['description'],
                'created_by_id' => User::inRandomOrder()->first()->id,
            ]);
        }
    }
}
