<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\Capmaster;
use App\Models\Patternclass;
use App\Models\Exampatternclass;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ExamPatternclassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

            // Exampatternclass::create([
            //     'exam_id' => 8,
            //     'patternclass_id' => 53,
            //     'result_date' => now(),
            //     'launch_status' => 1,
            //     'start_date' => now(),
            //     'end_date' => now(),
            //     'latefee_date' => now(),
            //     'intmarksstart_date' => now(),
            //     'intmarksend_date' => now(),
            //     'finefee_date' => now(),
            //     'capmaster_id' => 1,
            //     'capscheduled_date' => now(),
            //     'papersettingstart_date' => now(),
            //     'papersubmission_date' => now(),
            //     'placeofmeeting' => 'some ware',
            //     'description' => 'nothing',
            // ]);
            
            // Exampatternclass::create([
            //     'exam_id' => 9,
            //     'patternclass_id' => 53,
            //     'result_date' => now(),
            //     'launch_status' => 1,
            //     'start_date' => now(),
            //     'end_date' => now(),
            //     'latefee_date' => now(),
            //     'intmarksstart_date' => now(),
            //     'intmarksend_date' => now(),
            //     'finefee_date' => now(),
            //     'capmaster_id' => 1,
            //     'capscheduled_date' => now(),
            //     'papersettingstart_date' => now(),
            //     'papersubmission_date' => now(),
            //     'placeofmeeting' => 'some ware',
            //     'description' => 'nothing',
            // ]);

            // Exampatternclass::create([
            //     'exam_id' => 11,
            //     'patternclass_id' => 54,
            //     'result_date' => now(),
            //     'launch_status' => 1,
            //     'start_date' => now(),
            //     'end_date' => now(),
            //     'latefee_date' => now(),
            //     'intmarksstart_date' => now(),
            //     'intmarksend_date' => now(),
            //     'finefee_date' => now(),
            //     'capmaster_id' => 1,
            //     'capscheduled_date' => now(),
            //     'papersettingstart_date' => now(),
            //     'papersubmission_date' => now(),
            //     'placeofmeeting' => 'some ware',
            //     'description' => 'nothing',
            // ]);

            // Exampatternclass::create([
            //     'exam_id' => 12,
            //     'patternclass_id' => 54,
            //     'result_date' => now(),
            //     'launch_status' => 1,
            //     'start_date' => now(),
            //     'end_date' => now(),
            //     'latefee_date' => now(),
            //     'intmarksstart_date' => now(),
            //     'intmarksend_date' => now(),
            //     'finefee_date' => now(),
            //     'capmaster_id' => 1,
            //     'capscheduled_date' => now(),
            //     'papersettingstart_date' => now(),
            //     'papersubmission_date' => now(),
            //     'placeofmeeting' => 'some ware',
            //     'description' => 'nothing',
            // ]);



            Exampatternclass::create([
                'exam_id' => 1,
                'patternclass_id' => 10,
                'result_date' => now(),
                'launch_status' => 1,
                'start_date' => now(),
                'end_date' => now(),
                'latefee_date' => now(),
                'intmarksstart_date' => now(),
                'intmarksend_date' => now(),
                'finefee_date' => now(),
                'capmaster_id' => 1,
                'capscheduled_date' => now(),
                'papersettingstart_date' => now(),
                'papersubmission_date' => now(),
                'placeofmeeting' => 'some ware',
                'description' => 'nothing',
            ]);

            Exampatternclass::create([
                'exam_id' => 2,
                'patternclass_id' => 10,
                'result_date' => now(),
                'launch_status' => 1,
                'start_date' => now(),
                'end_date' => now(),
                'latefee_date' => now(),
                'intmarksstart_date' => now(),
                'intmarksend_date' => now(),
                'finefee_date' => now(),
                'capmaster_id' => 1,
                'capscheduled_date' => now(),
                'papersettingstart_date' => now(),
                'papersubmission_date' => now(),
                'placeofmeeting' => 'some ware',
                'description' => 'nothing',
            ]);

            Exampatternclass::create([
                'exam_id' => 3,
                'patternclass_id' => 11,
                'result_date' => now(),
                'launch_status' => 1,
                'start_date' => now(),
                'end_date' => now(),
                'latefee_date' => now(),
                'intmarksstart_date' => now(),
                'intmarksend_date' => now(),
                'finefee_date' => now(),
                'capmaster_id' => 1,
                'capscheduled_date' => now(),
                'papersettingstart_date' => now(),
                'papersubmission_date' => now(),
                'placeofmeeting' => 'some ware',
                'description' => 'nothing',
            ]);

            Exampatternclass::create([
                'exam_id' => 4,
                'patternclass_id' => 11,
                'result_date' => now(),
                'launch_status' => 1,
                'start_date' => now(),
                'end_date' => now(),
                'latefee_date' => now(),
                'intmarksstart_date' => now(),
                'intmarksend_date' => now(),
                'finefee_date' => now(),
                'capmaster_id' => 1,
                'capscheduled_date' => now(),
                'papersettingstart_date' => now(),
                'papersubmission_date' => now(),
                'placeofmeeting' => 'some ware',
                'description' => 'nothing',
            ]);

            Exampatternclass::create([
                'exam_id' => 5,
                'patternclass_id' => 12,
                'result_date' => now(),
                'launch_status' => 1,
                'start_date' => now(),
                'end_date' => now(),
                'latefee_date' => now(),
                'intmarksstart_date' => now(),
                'intmarksend_date' => now(),
                'finefee_date' => now(),
                'capmaster_id' => 1,
                'capscheduled_date' => now(),
                'papersettingstart_date' => now(),
                'papersubmission_date' => now(),
                'placeofmeeting' => 'some ware',
                'description' => 'nothing',
            ]);

            Exampatternclass::create([
                'exam_id' => 6,
                'patternclass_id' => 12,
                'result_date' => now(),
                'launch_status' => 1,
                'start_date' => now(),
                'end_date' => now(),
                'latefee_date' => now(),
                'intmarksstart_date' => now(),
                'intmarksend_date' => now(),
                'finefee_date' => now(),
                'capmaster_id' => 1,
                'capscheduled_date' => now(),
                'papersettingstart_date' => now(),
                'papersubmission_date' => now(),
                'placeofmeeting' => 'some ware',
                'description' => 'nothing',
            ]);
        
    }
}
