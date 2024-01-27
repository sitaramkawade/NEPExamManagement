<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\Subject;
use App\Models\ExamPanel;
use Faker\Factory as Faker;
use App\Models\ExamOrderPost;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExamPanelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {

            $faculty = Faculty::pluck('id')->toArray();
            $examorderpost = ExamOrderPost::pluck('id')->toArray();
            $subject = Subject::pluck('id')->toArray();

            ExamPanel::create([

                'faculty_id' => rand(1, count($faculty)),
                'examorderpost_id' => rand(1, count($examorderpost)),
                'subject_id' => rand(1, count($subject)),
                'description' => $faker->word,
                'active_status' => $faker->boolean,
               
            ]);
        }
    }
}
