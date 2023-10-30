<?php

namespace Database\Seeders;

use App\Models\TransactionDetail;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        for ($i = 0; $i < 20; $i++) {
            $transactionDetail = new TransactionDetail;

            $transactionDetail->transaction_id = rand(1, 20);
            $transactionDetail->book_id = rand(1, 20);
            $transactionDetail->qty = rand(1, 5);

            $transactionDetail->save();
        }
    }
}
