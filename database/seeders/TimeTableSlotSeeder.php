<?php

namespace Database\Seeders;

use App\Models\Timetableslot;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class TimeTableSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++)
         { 
            Timetableslot::create([
                'timeslot' => $faker->time(),
                'slot' => $faker->randomNumber(2),
                'isactive' => $faker->boolean(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
