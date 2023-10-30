<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        for ($i = 0; $i < 20; $i++) {
            $transaction = new Transaction;

            $transaction->member_id = rand(1, 20);
            $transaction->date_start = $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s');
            $transaction->date_end = $faker->dateTimeBetween($transaction->date_start, 'now')->format('Y-m-d H:i:s');

            $transaction->save();
        }
    }
}
