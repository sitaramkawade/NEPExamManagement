<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Patternclass;
use App\Models\Examfeemaster;
use Illuminate\Database\Seeder;
use App\Models\Exambacklogfeecourse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExamBacklogFeeCoursesSeeder extends Seeder
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

            Exambacklogfeecourse::create([
                'backlogfee' => $faker->randomNumber(),
                'sem' => $faker->numberBetween(1, 6),
                'patternclass_id' => rand(1, count($patternclassIds)),
                'examfees_id' => rand(1, count($examfeemasterIds)),
                'active_status' => $faker->boolean,
                'approve_status' => $faker->boolean,
            ]);
        }
    }
}
