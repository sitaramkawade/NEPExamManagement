<?php

namespace Database\Seeders;

use App\Models\Exam;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            Exam::create([
                'exam_sessions' => $faker->numberBetween(1,2),
                'exam_name' => $faker->word,
                'status' =>$faker->numberBetween(1,0),
            ]);
        }
    }
}
