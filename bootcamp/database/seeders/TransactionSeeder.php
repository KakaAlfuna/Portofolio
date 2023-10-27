<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Transaction::create([
                'member_id' => rand(1,5),
                'class_id' => rand(1,5),
                'amount' => 100.000,
                'method' => 'Metode ' . $i,
                'transaction_date' => now()->subDays($i),
            ]);
        }
    }
}
