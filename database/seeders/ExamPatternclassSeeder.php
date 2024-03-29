<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\Capmaster;
use App\Models\Patternclass;
use App\Models\ExamPatternclass;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ExamPatternclassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $exams = Exam::with('exampatternclasses')->inRandomOrder()->get();
        $patternclasses = Patternclass::inRandomOrder()->get();
        $capmasters = Capmaster::inRandomOrder()->get();

        foreach ($exams as $exam) {

            $availablePatternclasses = $patternclasses->diff($exam->examPatternclasses->pluck('patternclass_id'));
            $patternclass = $availablePatternclasses->random();

            $capmaster = $capmasters->random();

            ExamPatternclass::create([
                'exam_id' => $exam->id,
                'patternclass_id' => $patternclass->id,
                'result_date' => $faker->dateTimeBetween('now', '+30 days'),
                'launch_status' => $faker->boolean,
                'start_date' => $faker->dateTimeBetween('now', '+30 days'),
                'end_date' => $faker->dateTimeBetween('now', '+60 days'),
                'latefee_date' => $faker->dateTimeBetween('now', '+15 days'),
                'intmarksstart_date' => $faker->dateTimeBetween('now', '+10 days'),
                'intmarksend_date' => $faker->dateTimeBetween('now', '+25 days'),
                'finefee_date' => $faker->dateTimeBetween('now', '+20 days'),
                'capmaster_id' => $capmaster->id,
                'capscheduled_date' => $faker->dateTimeBetween('now', '+5 days'),
                'papersettingstart_date' => $faker->dateTimeBetween('now', '+3 days'),
                'papersubmission_date' => $faker->dateTimeBetween('now', '+18 days'),
                'placeofmeeting' => $faker->word,
                'description' => $faker->title,
            ]);
        }
    }
}
