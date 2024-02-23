<?php

// app/helpers.php

use App\Models\PatternClass;

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
