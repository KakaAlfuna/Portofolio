<?php

namespace Database\Seeders;

use App\Models\Catalog;
use faker\factory as faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for($i=0; $i<20; $i++){

            $catalog= new Catalog;
            
            $catalog->name = $faker->name;
    
            $catalog->save();
        }

    }
}
