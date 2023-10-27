<?php

namespace Database\Seeders;

use App\Models\NameClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NameClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            NameClass::create([
                'name_class' => 'Kelas ' . $i,
                'description' => 'Deskripsi kelas ' . $i,
            ]);
        }
    }
}
