<?php

namespace Database\Seeders;

use App\Models\Registration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Registration::create([
                'member_id' => $i,
                'class_id' => $i,
                'transaction_id' => $i,
                'registration_date' => now()->subDays($i),
            ]);
        }
    }
}
