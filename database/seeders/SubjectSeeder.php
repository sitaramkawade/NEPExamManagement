<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::create( [
            'id'=>1,
            'subject_sem'=>1,
            'subjectcategory_id'=>1,
            'subject_no'=>1,
            'subject_code'=>1,
            'subject_shortname'=>'STAT',
            'subject_name'=>'Statistics',
            'subjecttype_id'=>1,
            'subjectexam_type'=>'INTERNAL',
            'subject_credit'=>4,
            'subject_maxmarks'=>100,
            'subject_maxmarks_int'=>30,
            'subject_maxmarks_intpract'=>15,
            'subject_maxmarks_ext'=>70,
            'subject_totalpassing'=>40,
            'subject_intpassing'=>18,
            'subject_intpractpassing'=>8,
            'subject_extpassing'=>28,
            'subject_optionalgroup'=>'DSC',
            'patternclass_id'=>34,
            'classyear_id'=>4,
            'department_id'=>4,
            'college_id'=>1,
            'status'=>1,
            'created_at'=>'2023-09-25 05:10:43',
            'updated_at'=>'2023-09-25 05:10:43'
            ] );
    }
}
