<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\Subject;
use App\Models\Exampanel;
use Faker\Factory as Faker;
use App\Models\Examorderpost;
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

        for ($i = 0; $i < 20; $i++) {

            $faculty = Faculty::pluck('id')->toArray();
            $examorderpost = Examorderpost::pluck('id')->toArray();
            $subject = Subject::pluck('id')->toArray();

            Exampanel::create([

                'faculty_id' => rand(1, count($faculty)),
                'examorderpost_id' => rand(1, count($examorderpost)),
                'subject_id' => rand(1, count($subject)),
                'active_status' => $faker->randomNumber(1),

            ]);
        }
    }
}
