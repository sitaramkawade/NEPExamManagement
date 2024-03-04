<?php

namespace Database\Seeders;

use App\Models\Examorder;
use App\Models\Exampanel;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\Exampatternclass;
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

            $exampatternclassIds = Exampatternclass::pluck('id')->toArray();
            $exampanelIds = Exampanel::pluck('id')->toArray();

            Examorder::create([
                'exampanel_id' => rand(1, count($exampanelIds)),
                'exam_patternclass_id' => rand(1, count($exampatternclassIds)),
                'description' => $faker->word,
                'email_status' => $faker->boolean,
            ]);
        }
    }
}
