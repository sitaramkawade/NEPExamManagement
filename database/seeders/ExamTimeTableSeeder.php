<?php

namespace Database\Seeders;

use App\Models\Subject;
use Faker\Factory as Faker;
use App\Models\Examtimetable;
use App\Models\Timetableslot;
use Illuminate\Database\Seeder;
use App\Models\Exampatternclass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExamTimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Examtimetable::create([
            'subjectbucket_id' => 3,
            'exam_patternclasses_id' => 1,
            'examdate' =>now(),
            'timeslot_id' => 1 ,
            'status' => 1,
        ]);
        
        Examtimetable::create([
            'subjectbucket_id' => 4,
            'exam_patternclasses_id' => 1,
            'examdate' =>now(),
            'timeslot_id' => 1 ,
            'status' => 1,
        ]);

        Examtimetable::create([
            'subjectbucket_id' => 9,
            'exam_patternclasses_id' => 1,
            'examdate' =>now(),
            'timeslot_id' => 1 ,
            'status' => 1,
        ]);

        Examtimetable::create([
            'subjectbucket_id' => 10,
            'exam_patternclasses_id' => 1,
            'examdate' =>now(),
            'timeslot_id' => 1 ,
            'status' => 1,
        ]);

        Examtimetable::create([
            'subjectbucket_id' => 20,
            'exam_patternclasses_id' => 1,
            'examdate' =>now(),
            'timeslot_id' => 1 ,
            'status' => 1,
        ]);
        
    }
}
