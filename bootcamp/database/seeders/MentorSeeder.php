<?php

namespace Database\Seeders;

use App\Models\Mentor;
use faker\factory as faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker= Faker :: create();

        for($i=0; $i<20; $i++){
            $mentor=new Mentor;

            $mentor->name = $faker->name;
            $mentor->specialization = 'specialization'. $i ;
            $mentor->class_id = rand(1,5);
            $mentor->phone_number = '0832'.$faker->randomNumber(8);

            $mentor->save();
        }
    }
}
