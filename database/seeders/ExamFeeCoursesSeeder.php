<?php

namespace Database\Seeders;

use App\Models\Patternclass;
use App\Models\Examfeecourse;
use App\Models\Examfeemaster;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class ExamFeeCoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {

            $patternclassIds = Patternclass::pluck('id')->toArray();
            $examfeemasterIds = Examfeemaster::pluck('id')->toArray();

            Examfeecourse::create([
                'fee' => $faker->randomNumber(),
                'sem' => $faker->numberBetween(1, 6),
                'patternclass_id' => rand(1, count($patternclassIds)),
                'examfees_id' => rand(1, count($examfeemasterIds)),
                'active_status' => $faker->boolean,
                'approve_status' => $faker->boolean,
            ]);
        }
    }
}
