<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\Capmaster;
use App\Models\Patternclass;
use Illuminate\Database\Seeder;
use App\Models\ExamPatternclass;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExamPatternclassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        for ($i = 0; $i < 100; $i++) {
            ExamPatternclass::create([
                'exam_id' =>  Exam::inRandomOrder()->first()->id, 
                'patternclass_id' =>Patternclass::inRandomOrder()->first()->id, 
                'result_date' => $faker->dateTimeBetween('now', '+30 days'),
                'launch_status' => $faker->boolean,
                'start_date' => $faker->dateTimeBetween('now', '+30 days'),
                'end_date' => $faker->dateTimeBetween('now', '+60 days'),
                'latefee_date' => $faker->dateTimeBetween('now', '+15 days'),
                'intmarksstart_date' => $faker->dateTimeBetween('now', '+10 days'),
                'intmarksend_date' => $faker->dateTimeBetween('now', '+25 days'),
                'finefee_date' => $faker->dateTimeBetween('now', '+20 days'),
                'capmaster_id' => Capmaster::inRandomOrder()->first()->id, 
                'capscheduled_date' => $faker->dateTimeBetween('now', '+5 days'),
                'papersettingstart_date' => $faker->dateTimeBetween('now', '+3 days'),
                'papersubmission_date' => $faker->dateTimeBetween('now', '+18 days'),
                'placeofmeeting' => $faker->word,
                'description' => $faker->sentence,
            ]);
        }
    }
}
