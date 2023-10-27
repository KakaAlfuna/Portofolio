<?php

namespace Database\Seeders;

use App\Models\Member;
use faker\factory as faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker= Faker :: create();

        for($i=0; $i<20; $i++){
            $member=new Member;

            $member->name = $faker->name;
            $member->gender = $faker->randomElement(['P','L']);
            $member->phone_number = '0832'.$faker->randomNumber(8);
            $member->address = $faker->address;
            $member->email = $faker->email;
            $member->class_id = rand(1,5);

            $member->save();
        }
    }
}
