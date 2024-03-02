<?php

// app/helpers.php

use App\Models\Exam;
use App\Models\Student;
use App\Models\PatternClass;

// Getting Pattern Class Name
if (!function_exists('get_pattern_class_name')) {
    function get_pattern_class_name($pattern_class_id)
    {
        $pattern_class = PatternClass::with(['courseclass.classyear:classyear_name,id', 'courseclass.course:course_name,id', 'pattern:pattern_name,id'])->find($pattern_class_id);
        if ($pattern_class) {
            return  (isset($pattern_class->courseclass->classyear->classyear_name) ? $pattern_class->courseclass->classyear->classyear_name : '-') . " " . 
                    (isset($pattern_class->courseclass->course->course_name) ? $pattern_class->courseclass->course->course_name : '-') . " " .
                    (isset($pattern_class->pattern->pattern_name) ? $pattern_class->pattern->pattern_name : '-');
        }
        return null;
    }
}

// Getting Current Sem of Student
if (!function_exists('get_student_current_sem')) 
{
    function get_student_current_sem($student_id)
    {
        $student=Student::find($student_id);
        if($student)
        {
            $sem=null;
            $current_active_exam_session=null;
            $current_active_exam = Exam::Where('status',1)->get();
            if(isset($current_active_exam->first()->exam_sessions))
            {   
                $current_active_exam_session=$current_active_exam->first()->exam_sessions;
            }
            $current_class_student_entry = $student->currentclassstudents->last();
            if(!isset($current_class_student_entry))
            {   
                if($current_active_exam_session==1)
                {   
                    $sem=1;
                }elseif($current_active_exam_session==2)
                {
                    $sem='not_regular';
                }
            }
            else
            {
                $sem=$current_class_student_entry->sem;
            }
        }
      return $sem;
    }
}
