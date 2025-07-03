<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\QueryException;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User::factory(10)->create();
        try {
            $this->call([
                UserSeeder::class,
                TaskStatusSeeder::class,
                LabelSeeder::class,
                TaskSeeder::class
            ]);
        } catch (QueryException $e) {
            if ($e->getCode() === '23505') {
                echo "Такие данные уже есть в базе. Скорее всего сидирование уже применено.\n";
            } else {
                echo "Ошибка при сидировании: {$e->getMessage()}\n";
            }
        }
    }
}
