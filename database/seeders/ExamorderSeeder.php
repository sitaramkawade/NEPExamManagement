<?php

namespace Database\Seeders;

use App\Models\Examorder;
use App\Models\ExamPanel;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\ExamPatternclass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExamorderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 1; $i++) {

            $exampatternclassIds = ExamPatternclass::pluck('id')->toArray();
            $exampanelIds = ExamPanel::pluck('id')->toArray();

            Examorder::create([
                'exampanel_id' => rand(1, count($exampanelIds)),
                'exam_patternclass_id' => rand(1, count($exampatternclassIds)),
                'description' => $faker->word,
                'email_status' => $faker->boolean,
            ]);
        }
    }
}
