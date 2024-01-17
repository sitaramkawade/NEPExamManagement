<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\College;
use App\Models\Capmaster;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CapmasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $exams = Exam::inRandomOrder()->get();
        $colleges = College::inRandomOrder()->get();


        for ($i = 0; $i < 100; $i++) {
            $exam = $exams->random();
            $college =  $colleges->random();

            Capmaster::create([
                'exam_id' => $exam->id,
                'college_id' => $college->id,
                'status' => $faker->numberBetween(1,2),
                'cap_name' => $faker->word,
                'place' => $faker->sentence,
            ]);
        }
    }
}
