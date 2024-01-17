<?php

namespace Database\Seeders;

use App\Models\ExamTimetable;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExamTimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data=ExamTimetable::create(
            [ 
            'subject_id' => 1,
            'exam_patternclasses_id' => 2,
            'examdate' => now(),
            'timeslot_id' => 3,
            'status' => '1',
             ]
         );
    }
}
