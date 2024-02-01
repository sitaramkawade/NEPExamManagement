<?php

namespace Database\Seeders;

use App\Models\Subject;
use Faker\Factory as Faker;
use App\Models\ExamTimetable;
use App\Models\Timetableslot;
use Illuminate\Database\Seeder;
use App\Models\ExamPatternclass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExamTimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {

            $exampatternclassIds = ExamPatternclass::pluck('id')->toArray();
            $subjectIds = Subject::pluck('id')->toArray();
            $timeslotIds = Timetableslot::pluck('id')->toArray();

            ExamTimetable::create([
                'subject_id' => rand(1, count($subjectIds)),
                'exam_patternclasses_id' => rand(1, count($exampatternclassIds)),
                'examdate' => $faker->dateTimeBetween('now', '+30 days'),
                'timeslot_id' => rand(1, count($timeslotIds)),
                'status' => $faker->boolean,
            ]);
        }
    }
}
