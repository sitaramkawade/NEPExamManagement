<?php

namespace Database\Seeders;

use App\Models\Studentmark;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AshutoshStudentMarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Studentmark::create([
            'seatno'=>12345,
            'student_id'=>1, 
            'subject_id'=>339,	
            'sem'=>1,	
            'int_marks'=>9,	
            'int_practical_marks'=>1,	
            'ext_marks'=>19,	
            'ext_practical_marks'=>0,	
            'practical_marks'=>0,
            'project_marks'=>0,	
            'oral'=>'yes',	
            'grade'=>'F',
            'exam_id'=>8, 
            'patternclass_id'=>53,
        ]);

        Studentmark::create([
            'seatno'=>12345,
            'student_id'=>1, 
            'subject_id'=>340,	
            'sem'=>1,	
            'int_marks'=>9,	
            'int_practical_marks'=>1,	
            'ext_marks'=>30,	
            'ext_practical_marks'=>0,	
            'practical_marks'=>0,
            'project_marks'=>0,	
            'oral'=>'yes',	
            'grade'=>'F',
            'exam_id'=>8, 
            'patternclass_id'=>53,
        ]);

        Studentmark::create([
            'seatno'=>12345,
            'student_id'=>1, 
            'subject_id'=>341,	
            'sem'=>1,	
            'int_marks'=>13,	
            'int_practical_marks'=>1,	
            'ext_marks'=>30,	
            'ext_practical_marks'=>0,	
            'practical_marks'=>0,
            'project_marks'=>0,	
            'oral'=>'yes',	
            'grade'=>'A',
            'exam_id'=>8, 
            'patternclass_id'=>53,
        ]);

        Studentmark::create([
            'seatno'=>12345,
            'student_id'=>1, 
            'subject_id'=>342,	
            'sem'=>1,	
            'int_marks'=>17,	
            'int_practical_marks'=>1,	
            'ext_marks'=>30,	
            'ext_practical_marks'=>0,	
            'practical_marks'=>0,
            'project_marks'=>0,	
            'oral'=>'yes',	
            'grade'=>'A+',
            'exam_id'=>8, 
            'patternclass_id'=>53,
        ]);
        Studentmark::create([
            'seatno'=>12345,
            'student_id'=>1, 
            'subject_id'=>343,	
            'sem'=>1,	
            'int_marks'=>18,	
            'int_practical_marks'=>1,	
            'ext_marks'=>30,	
            'ext_practical_marks'=>0,	
            'practical_marks'=>0,
            'project_marks'=>0,	
            'oral'=>'yes',	
            'grade'=>'A+',
            'exam_id'=>8, 
            'patternclass_id'=>53,
        ]);
        Studentmark::create([
            'seatno'=>12345,
            'student_id'=>1, 
            'subject_id'=>344,	
            'sem'=>1,	
            'int_marks'=>17,	
            'int_practical_marks'=>1,	
            'ext_marks'=>35,	
            'ext_practical_marks'=>0,	
            'practical_marks'=>0,
            'project_marks'=>0,	
            'oral'=>'yes',	
            'grade'=>'O+',
            'exam_id'=>8, 
            'patternclass_id'=>53,
        ]);
        Studentmark::create([
            'seatno'=>12345,
            'student_id'=>1, 
            'subject_id'=>345,	
            'sem'=>1,	
            'int_marks'=>17,	
            'int_practical_marks'=>1,	
            'ext_marks'=>35,	
            'ext_practical_marks'=>0,	
            'practical_marks'=>0,
            'project_marks'=>0,	
            'oral'=>'yes',	
            'grade'=>'O+',
            'exam_id'=>8, 
            'patternclass_id'=>53,
        ]);
    }
}
