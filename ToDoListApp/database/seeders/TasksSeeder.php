<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            $task = new Task;

            $task->title = $faker->sentence(3);
            $task->description = $faker->paragraph(3);
            $task->time_start = now();
            $task->time_end = now()->addHours(1);

            $task->save();
        }
    }
}
