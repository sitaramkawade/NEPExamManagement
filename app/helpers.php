<?php

// app/helpers.php

use App\Models\Course;

// tejas
use App\Models\Subject;
use App\Models\DeptPrefix;
use App\Models\Courseclass;
use App\Models\PatternClass;
use Illuminate\Support\Facades\Auth;

if (!function_exists('getpatternclass')) {
    function getpatternclass($pattern_class_id)
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

if (!function_exists('generate_subject_code')) {
    function generate_subject_code($patternClassId, $subjectVerticalId, $subjectSem, $classYear)
    {
        $authFaculty = Auth::guard('faculty')->user()->department_id;

        $departmentPrefix = DeptPrefix::where('dept_id', $authFaculty)->first();
        $courseClass = Courseclass::select('id', 'classyear_id')->find($patternClassId);
        $courseType = Course::where('id', optional($courseClass)->id)->value('course_type');
        $courseTypeFirstChar = strtoupper(substr($courseType, 0, 1));
        $subject_count = Subject::where('patternclass_id', $patternClassId)
                        ->where('subjectvertical_id', $subjectVerticalId)
                        ->where('department_id', $authFaculty)
                        ->where('subject_sem', $subjectSem)
                        ->where('classyear_id', $classYear)
                        ->count();
        $subjectCode = '';
        if ($departmentPrefix) {
            $subjectCode .= $departmentPrefix->prefix;
        }
        $subjectCode .= $courseTypeFirstChar;
        if ($courseClass) {
            $subjectCode .= $courseClass->classyear_id;
        }
        $subjectCode .= $subjectSem;

        $subjectCode .= $subject_count;
        if ($departmentPrefix) {
            $subjectCode .= $departmentPrefix->postfix;
        }

        return $subjectCode;
    }
}


