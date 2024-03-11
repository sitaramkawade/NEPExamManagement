<?php

use App\Models\Exam;
use App\Models\Course;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Courseclass;
use App\Models\Examfeeview;
use App\Models\Patternclass;
use App\Models\Departmentprefix;
use App\Models\ExamPatternclass;
use Illuminate\Support\Collection;
use App\Models\Currentclassstudent;
use Illuminate\Support\Facades\Auth;

// Getting Pattern Class Name
if (!function_exists('get_pattern_class_name')) {
    function get_pattern_class_name($pattern_class_id)
    {
        $pattern_class = Patternclass::with(['courseclass.classyear:classyear_name,id', 'courseclass.course:course_name,id', 'pattern:pattern_name,id'])->find($pattern_class_id);
        if ($pattern_class) {
            return  (isset($pattern_class->courseclass->classyear->classyear_name) ? $pattern_class->courseclass->classyear->classyear_name : '-') . " " .
                    (isset($pattern_class->courseclass->course->course_name) ? $pattern_class->courseclass->course->course_name : '-') . " " .
                    (isset($pattern_class->pattern->pattern_name) ? $pattern_class->pattern->pattern_name : '-');
        }
        return null;
    }
}

// Generate Subject Code
if (!function_exists('generate_subject_code')) {
    function generate_subject_code($patternClassId, $subjectVerticalId, $subjectSem, $classYear)
    {
        // dd($patternClassId, $subjectVerticalId, $subjectSem, $classYear);
        $authFaculty = Auth::guard('faculty')->user()->department_id;

        $departmentPrefix = Departmentprefix::where('dept_id', $authFaculty)->first();
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


// Checking Is Next Class Or Not
if (!function_exists('get_is_next_class')) 
{
    function get_is_next_class($pattern_class_id)
    {   
        $is_next_class=false;
        $pattern_class = Patternclass::with(['courseclass:nextyearclass_id,id'])->find($pattern_class_id);
        if($pattern_class)
        {
            if($pattern_class->courseclass->nextyearclass_id!=null)
            {
                $is_next_class = true;
            }
        }

        return  $is_next_class;
    }
}

// Getting Indian Rupees Currency
if (!function_exists('currency_indian_rupees')) 
{
    function currency_indian_rupees($amount)
    {
        $formatter = new \NumberFormatter('en_IN', \NumberFormatter::CURRENCY);
        $formatter->setTextAttribute(\NumberFormatter::PATTERN_RULEBASED, "#,##,##0.00");
        return $formatter->formatCurrency($amount, 'INR');
    }
}

// Getting Course Type , UG , PG ,PHD
if (!function_exists('get_course_type')) 
{
    function get_course_type($pattern_class_id)
    {
        $pattern_class = Patternclass::with(['courseclass.course:course_type,id'])->find($pattern_class_id);

        return  (isset($pattern_class->courseclass->course->course_type) ? $pattern_class->courseclass->course->course_type : '-');
    }
}



//Getting Student Exam Fees
// if (!function_exists('get_exam_form_fees')) 
// {
//     function get_exam_form_fees($regular_subject_data,$backlog_subject_data=[])
//     {   
//         $fee_courses = collect();
//         $patternclass_id=null;
//         $internal_count = 0;
//         $backlog_count = 0;
//         $project_count = 0;
//         $evs_count = 0;
//         $sem_count = 0;
//         $sems = [];
//         $setting = Setting::first();
//         $student=Auth::guard('student')->user();
//         $statement_of_marks_is_year_wise = isset($setting->statement_of_marks_is_year_wise) ? $setting->statement_of_marks_is_year_wise : 0;
//         $pattern_class_count = Currentclassstudent::where('student_id',$student->id)->pluck('patternclass_id')->count();
//         $current_class_student_last_entry = $student->currentclassstudents->last();
//         if($current_class_student_last_entry)
//         {
//             $patternclass_id=$current_class_student_last_entry->patternclass_id;
//         }else
//         {
//             $patternclass_id=$student->patternclass_id;
//         }

//         if (isset($backlog_subject_data)) {
//             $backlog_count = count($backlog_subject_data);
//         }

//         $regular_and_backlog_subjects = collect($regular_subject_data)->merge($backlog_subject_data);

//         foreach ($regular_and_backlog_subjects as $subject) {
//             if ($subject->subjectcategory->subjectcategory == "Project") {
//                 $project_count++;
//             }

//             if ($subject->subjectcategory->subjectcategory == "EVS") {
//                 $evs_count++;
//             }

//             if ($subject->subject_sem) {
//                 $temp[] = $subject->subject_sem;
//                 $sems = array_values(array_unique($temp));
//             }

//             if ($subject->subject_type == "I" || $subject->subject_type == "IP" || $subject->subject_type == "IE" || $subject->subject_type == "IG" || $subject->subject_type == "IEP" || $subject->subject_type == "IEG") {
//                 $internal_count++;
//             }
//         }

//         $sem_count = count($sems);

//         $exam = Exam::where('status', 1)->first();
//         if ($exam) {
//             $exam_pattern_class = Exampatternclass::where('patternclass_id', $patternclass_id)->where('exam_id', $exam->id)->first();
//             $student_course_fees = Examfeeview::where('patternclass_id', $patternclass_id)->where('active_status', 1)->get();
//             if ($student_course_fees) {
//                 $fee_data = [];
//                 foreach ($student_course_fees as $course_fee) {

//                     // Calculate Form Fee
//                     if ($course_fee->fee_name == "Form Fee") {
//                         $fee_courses->push($course_fee);
//                     }

//                     // Calculate Exam Fee
//                     if ($course_fee->fee_name == "Exam Fee") {
//                         $fee_courses->push($course_fee);
//                     }

//                     // Calculate CAP Fee SEM Wise
//                     if ($course_fee->fee_name == "CAP Fee") {
//                         // Apply CAP Fee SEM Wise
//                         if ($sem_count) {
//                             // SEM Count * Fee
//                             $updated_course_fee = clone $course_fee;
//                             $updated_course_fee->fee = ($updated_course_fee->fee * $sem_count);
//                             $fee_courses->push($updated_course_fee);
//                         }
//                     }

//                     // Calculate Statement of Marks Fee
//                     if ($course_fee->fee_name == "Statement of Marks Fee") {
//                         // Apply Statement of Marks Fee Patternclass Wise Or Year Wise
//                         if ($statement_of_marks_is_year_wise) {
//                             if ($pattern_class_count) {
//                                 // Patternclass Count In Current Class
//                                 $updated_course_fee = clone $course_fee;
//                                 $updated_course_fee->fee = ($updated_course_fee->fee * $pattern_class_count);
//                                 $fee_courses->push($updated_course_fee);
//                             }else
//                             {   
//                                 // No Patternclass In Current Class For SEM-I
//                                 $updated_course_fee = clone $course_fee;
//                                 $updated_course_fee->fee = ($updated_course_fee->fee);
//                                 $fee_courses->push($updated_course_fee);
//                             }
//                         } else {
//                             // Apply Statement of Marks Fee SEM Wise
//                             if ($sem_count) {
//                                 // SEM Count * Fee
//                                 $updated_course_fee = clone $course_fee;
//                                 $updated_course_fee->fee = ($updated_course_fee->fee * $sem_count);
//                                 $fee_courses->push($updated_course_fee);
//                             }
//                         }
//                     }

//                     // Calculate Passing Certificate Fee
//                     if ($course_fee->fee_name == "Passing Certificate Fee") {

//                         $type=get_course_type($patternclass_id);

//                         if(($type=="PG" && in_array(4, $sems)) || ($type=="UG"  && in_array(6, $sems)) || !(get_is_next_class($patternclass_id)))
//                         {
//                             $fee_courses->push($course_fee);
//                         }else
//                         {
//                             // Zero Fee
//                             $updated_course_fee = clone $course_fee;
//                             $updated_course_fee->fee = 0;
//                             $fee_courses->push($updated_course_fee);
//                         }
//                     }

//                     // Calculate Project Fee / Dissertation Fee
//                     if ($course_fee->fee_name == "Project Fee/Dissertation") {
//                         if ($project_count) {
//                             // Counting Subject has Subject Category is Project
//                             $updated_course_fee = clone $course_fee;
//                             $updated_course_fee->fee = ($updated_course_fee->fee * $project_count);
//                             $fee_courses->push($updated_course_fee);
//                         } else {
//                             // Zero Fee
//                             $updated_course_fee = clone $course_fee;
//                             $updated_course_fee->fee = 0;
//                             $fee_courses->push($updated_course_fee);
//                         }
//                     }

//                     // Calculate EVS Fee
//                     if ($course_fee->fee_name == "EVS Fee") {
//                         if ($evs_count) {
//                             // Counting Subject has Subject Category is EVS
//                             $updated_course_fee = clone $course_fee;
//                             $updated_course_fee->fee = ($updated_course_fee->fee * $evs_count);
//                             $fee_courses->push($updated_course_fee);
//                         } else {
//                             // Zero Fee
//                             $updated_course_fee = clone $course_fee;
//                             $updated_course_fee->fee = 0;
//                             $fee_courses->push($updated_course_fee);
//                         }
//                     }

//                     // Calculate Internal Marks Fee
//                     if ($course_fee->fee_name == "Internal Marks Fee") {
//                         if ($internal_count) {
//                             // Count Inernal Subject According Subject Type ,I,IE,IP .etc 
//                             $updated_course_fee = clone $course_fee;
//                             $updated_course_fee->fee = ($updated_course_fee->fee * $internal_count);
//                             $fee_courses->push($updated_course_fee);
//                         } else {
//                             // Zero Fee
//                             $updated_course_fee = clone $course_fee;
//                             $updated_course_fee->fee = 0;
//                             $fee_courses->push($updated_course_fee);
//                         }
//                     }

//                     // Calculate Departmental Fee If Inserted
//                     if ($course_fee->fee_name == "Departmental Fee") {
//                         $fee_courses->push($course_fee);
//                     }

//                     // Calculate Transcript Fee If Inserted
//                     if ($course_fee->fee_name == "Transcript Fee") {
//                         $fee_courses->push($course_fee);
//                     }

//                     // Calculate Late Fee
//                     if ($course_fee->fee_name == "Late Fee") {
//                         if ($exam_pattern_class) {
//                             // Late Fee Apply If In Exam Pattern Class Late Fee Date Is Exceeds Todays Date
//                             if (isset($exam_pattern_class->latefee_date)) {
//                                 $late_fee_date = date('Y-m-d', strtotime($exam_pattern_class->latefee_date));
//                                 $today_date = date('Y-m-d');
//                                 if ($today_date > $late_fee_date) {
//                                     $fee_courses->push($course_fee);
//                                 } else {
//                                     // Zero Fee
//                                     $updated_course_fee = clone $course_fee;
//                                     $updated_course_fee->fee = 0;
//                                     $fee_courses->push($updated_course_fee);
//                                 }
//                             }
//                         }
//                     }

//                     // Calculate Fine Fee
//                     if ($course_fee->fee_name == "Fine Fee") {
//                         if ($exam_pattern_class) {
//                             // Fine Fee Apply If In Exam Pattern Class Fine Fee Date Is Exceeds Todays Date
//                             if (isset($exam_pattern_class->finefee_date)) {
//                                 $fine_fee_date = date('Y-m-d', strtotime($exam_pattern_class->finefee_date));
//                                 $today_date = date('Y-m-d');
//                                 if ($today_date > $fine_fee_date) {
//                                     $fee_courses->push($course_fee);
//                                 } else {
//                                     $updated_course_fee = clone $course_fee;
//                                     $updated_course_fee->fee = 0;
//                                     $fee_courses->push($updated_course_fee);
//                                 }
//                             }
//                         }
//                     }

//                     // Calculate Backlog Subject Exam Fee
//                     if ($course_fee->fee_name == "Backlog Subject Exam Fee") {
//                         if ($backlog_count) {
//                             // According Backlog Subject Count
//                             $updated_course_fee = clone $course_fee;
//                             $updated_course_fee->fee_name = "Backlog Fee";
//                             $updated_course_fee->fee = ($updated_course_fee->fee * $backlog_count);
//                             $fee_courses->push($updated_course_fee);
//                         }
//                     }
//                 }
//             }
//         }

//         return $fee_courses;
//     }
// }

//***************************************************************************************************************************************************** */


if (!function_exists('get_exam_form_fees')) {
    function get_exam_form_fees($patternclass_id,$regular_subject_data, $backlog_subject_data = [])
    {     
        $internal_count = 0;
        $external_count = 0;
        $backlog_count = 0;
        $project_count = 0;
        $evs_count = 0;
        $sem_count = 0;
        $sems = [];
        $setting = Setting::first();
        $student=Auth::guard('student')->user();
        $statement_of_marks_is_year_wise = isset($setting->statement_of_marks_is_year_wise) ? $setting->statement_of_marks_is_year_wise : 0;
        $pattern_class_count = Currentclassstudent::whereIn('pfstatus',[0,2])->where('student_id',$student->id)->distinct('patternclass_id')->pluck('patternclass_id')->count();

        $regular_and_backlog_subjects = collect($regular_subject_data)->merge($backlog_subject_data);

        foreach ($regular_and_backlog_subjects as $subject) {

            if ($subject->subjectcategory->subjectcategory == "Project") {
                $project_count++;
            }

            if ($subject->subjectcategory->subjectcategory == "EVS") {
                $evs_count++;
            }

            if ($subject->subject_sem) {
                $temp[] = $subject->subject_sem;
                $sems = array_values(array_unique($temp));
            }

            if ($subject->subject_type == "I" || $subject->subject_type == "IP" || $subject->subject_type == "IE" || $subject->subject_type == "IG" || $subject->subject_type == "IEP" || $subject->subject_type == "IEG") {
                $internal_count++;
            }

            if ($subject->subject_type == "E" || $subject->subject_type == "IE" || $subject->subject_type == "IEP" || $subject->subject_type == "EP"  || $subject->subject_type == "EINTP" || $subject->subject_type == "IEG" || $subject->subject_type == "EG") {
                $external_count++;
            }
        }
        $sem_count = count($sems);
        
        $exam = Exam::where('status', 1)->first();
        if ($exam) {

            $exam_pattern_class = Exampatternclass::where('patternclass_id', $patternclass_id)->where('exam_id', $exam->id)->first();

            $student_course_fees = Examfeeview::where('patternclass_id', $patternclass_id)->where('active_status', 1)->distinct('examfees_id')->groupBy('examfees_id')->orderBy('examfees_id','ASC')->latest()->get();
            if ($student_course_fees) {
                $fees_array = [];
                foreach ($student_course_fees as $course_fee) {
                    switch ($course_fee->fee_name) {
                        case "Form Fee":
                            // Calculate Form Fee
                            $fees_array[] = [
                                "form_name" => $course_fee->form_name,
                                "fee_name" => $course_fee->fee_name,
                                "id" => $course_fee->id,
                                "fee" =>$course_fee->fee,
                                "sem" => $course_fee->sem,
                                "patternclass_id" => $course_fee->patternclass_id,
                                "examfees_id" => $course_fee->examfees_id,
                                "active_status" =>$course_fee->active_status,
                                "approve_status" =>$course_fee->approve_status,
                                "remark" =>$course_fee->remark,
                            ];
                        break;
                        case "Exam Fee":
                            // Calculate Exam Fee
                            $fees_array[] = [
                                "form_name" => $course_fee->form_name,
                                "fee_name" => $course_fee->fee_name,
                                "id" => $course_fee->id,
                                "fee" =>$course_fee->fee,
                                "sem" => $course_fee->sem,
                                "patternclass_id" => $course_fee->patternclass_id,
                                "examfees_id" => $course_fee->examfees_id,
                                "active_status" =>$course_fee->active_status,
                                "approve_status" =>$course_fee->approve_status,
                                "remark" =>$course_fee->remark,
                            ];
                        break;
                        case "CAP Fee":
                            // Apply CAP Fee SEM Wise
                            if ($external_count) {
                                if ($sem_count) {
                                    // SEM Count * Fee
                                    $fees_array[] = [
                                        "form_name" => $course_fee->form_name,
                                        "fee_name" => $course_fee->fee_name,
                                        "id" => $course_fee->id,
                                        "fee" => ($course_fee->fee * $sem_count),
                                        "sem" => $course_fee->sem,
                                        "patternclass_id" => $course_fee->patternclass_id,
                                        "examfees_id" => $course_fee->examfees_id,
                                        "active_status" =>$course_fee->active_status,
                                        "approve_status" =>$course_fee->approve_status,
                                        "remark" =>$course_fee->remark,
                                    ];
                                }
                            }else
                            {
                                // Zero Fee
                                $fees_array[] = [
                                    "form_name" => $course_fee->form_name,
                                    "fee_name" => $course_fee->fee_name,
                                    "id" => $course_fee->id,
                                    "fee" => 0,
                                    "sem" => $course_fee->sem,
                                    "patternclass_id" => $course_fee->patternclass_id,
                                    "examfees_id" => $course_fee->examfees_id,
                                    "active_status" =>$course_fee->active_status,
                                    "approve_status" =>$course_fee->approve_status,
                                    "remark" =>$course_fee->remark,
                                ];
                            }
                        break;
                        case "Statement of Marks Fee":
                            // Calculate Statement of Marks Fee
                            if ($statement_of_marks_is_year_wise) {
                                    // Apply Statement of Marks Fee Patternclass Wise Or Year Wise
                                    if ($pattern_class_count) {
                                        // Patternclass Count In Current Class
                                        $fees_array[] = [
                                            "form_name" => $course_fee->form_name,
                                            "fee_name" => $course_fee->fee_name,
                                            "id" => $course_fee->id,
                                            "fee" => ($course_fee->fee * $pattern_class_count),
                                            "sem" => $course_fee->sem,
                                            "patternclass_id" => $course_fee->patternclass_id,
                                            "examfees_id" => $course_fee->examfees_id,
                                            "active_status" =>$course_fee->active_status,
                                            "approve_status" =>$course_fee->approve_status,
                                            "remark" =>$course_fee->remark,
                                        ];
                                    }else{
                                        // FY SEM-I or/and Direct SEM-II
                                        $fees_array[] = [
                                            "form_name" => $course_fee->form_name,
                                            "fee_name" => $course_fee->fee_name,
                                            "id" => $course_fee->id,
                                            "fee" => $course_fee->fee,
                                            "sem" => $course_fee->sem,
                                            "patternclass_id" => $course_fee->patternclass_id,
                                            "examfees_id" => $course_fee->examfees_id,
                                            "active_status" =>$course_fee->active_status,
                                            "approve_status" =>$course_fee->approve_status,
                                            "remark" =>$course_fee->remark,
                                        ];
                                    }
                            } else {
                                // Apply Statement of Marks Fee SEM Wise
                                if ($sem_count) {
                                    // SEM Count * Fee
                                    $fees_array[] = [
                                        "form_name" => $course_fee->form_name,
                                        "fee_name" => $course_fee->fee_name,
                                        "id" => $course_fee->id,
                                        "fee" => ($course_fee->fee * $sem_count),
                                        "sem" => $course_fee->sem,
                                        "patternclass_id" => $course_fee->patternclass_id,
                                        "examfees_id" => $course_fee->examfees_id,
                                        "active_status" =>$course_fee->active_status,
                                        "approve_status" =>$course_fee->approve_status,
                                        "remark" =>$course_fee->remark,
                                    ];
                                }
                            }
                        break;
                        case "Passing Certificate Fee":
                            // Calculate Passing Certificate Fee
                            $type=get_course_type($patternclass_id);
                            if(($type=="PG" && in_array(4, $sems)) || ($type=="UG"  && in_array(6, $sems)) || !(get_is_next_class($patternclass_id)))
                            {   
                                $fees_array[] = [
                                    "form_name" => $course_fee->form_name,
                                    "fee_name" => $course_fee->fee_name,
                                    "id" => $course_fee->id,
                                    "fee" => $course_fee->fee,
                                    "sem" => $course_fee->sem,
                                    "patternclass_id" => $course_fee->patternclass_id,
                                    "examfees_id" => $course_fee->examfees_id,
                                    "active_status" =>$course_fee->active_status,
                                    "approve_status" =>$course_fee->approve_status,
                                    "remark" =>$course_fee->remark,
                                ];
                            }else
                            {
                                // Zero Fee
                                $fees_array[] = [
                                    "form_name" => $course_fee->form_name,
                                    "fee_name" => $course_fee->fee_name,
                                    "id" => $course_fee->id,
                                    "fee" => 0,
                                    "sem" => $course_fee->sem,
                                    "patternclass_id" => $course_fee->patternclass_id,
                                    "examfees_id" => $course_fee->examfees_id,
                                    "active_status" =>$course_fee->active_status,
                                    "approve_status" =>$course_fee->approve_status,
                                    "remark" =>$course_fee->remark,
                                ];
                            }
                        break;
                        case "Project Fee/Dissertation":
                            // Calculate Project Fee / Dissertation Fee
                            if ($project_count) {
                                // Counting Subject has Subject Category is Project
                                $fees_array[] = [
                                    "form_name" => $course_fee->form_name,
                                    "fee_name" => $course_fee->fee_name,
                                    "id" => $course_fee->id,
                                    "fee" => ($course_fee->fee  * $project_count),
                                    "sem" => $course_fee->sem,
                                    "patternclass_id" => $course_fee->patternclass_id,
                                    "examfees_id" => $course_fee->examfees_id,
                                    "active_status" =>$course_fee->active_status,
                                    "approve_status" =>$course_fee->approve_status,
                                    "remark" =>$course_fee->remark,
                                ];
                            } else {
                                // Zero Fee
                                $fees_array[] = [
                                    "form_name" => $course_fee->form_name,
                                    "fee_name" => $course_fee->fee_name,
                                    "id" => $course_fee->id,
                                    "fee" => 0,
                                    "sem" => $course_fee->sem,
                                    "patternclass_id" => $course_fee->patternclass_id,
                                    "examfees_id" => $course_fee->examfees_id,
                                    "active_status" =>$course_fee->active_status,
                                    "approve_status" =>$course_fee->approve_status,
                                    "remark" =>$course_fee->remark,
                                ];
                            }
                        break;
                        case "EVS Fee":
                            // Calculate EVS Fee
                            if ($evs_count) {
                                // Counting Subject has Subject Category is EVS
                                $fees_array[] = [
                                    "form_name" => $course_fee->form_name,
                                    "fee_name" => $course_fee->fee_name,
                                    "id" => $course_fee->id,
                                    "fee" =>($course_fee->fee * $evs_count),
                                    "sem" => $course_fee->sem,
                                    "patternclass_id" => $course_fee->patternclass_id,
                                    "examfees_id" => $course_fee->examfees_id,
                                    "active_status" =>$course_fee->active_status,
                                    "approve_status" =>$course_fee->approve_status,
                                    "remark" =>$course_fee->remark,
                                ];
                            } else {
                                // Zero Fee
                                $fees_array[] = [
                                    "form_name" => $course_fee->form_name,
                                    "fee_name" => $course_fee->fee_name,
                                    "id" => $course_fee->id,
                                    "fee" =>0,
                                    "sem" => $course_fee->sem,
                                    "patternclass_id" => $course_fee->patternclass_id,
                                    "examfees_id" => $course_fee->examfees_id,
                                    "active_status" =>$course_fee->active_status,
                                    "approve_status" =>$course_fee->approve_status,
                                    "remark" =>$course_fee->remark,
                                ];
                            }
                        break;
                        case "Internal Marks Fee":
                            // Calculate Internal Marks Fee
                            if ($internal_count) {
                                // Count Inernal Subject According Subject Type ,I,IE,IP .etc 
                                $fees_array[] = [
                                    "form_name" => $course_fee->form_name,
                                    "fee_name" => $course_fee->fee_name,
                                    "id" => $course_fee->id,
                                    "fee" =>($course_fee->fee * $internal_count),
                                    "sem" => $course_fee->sem,
                                    "patternclass_id" => $course_fee->patternclass_id,
                                    "examfees_id" => $course_fee->examfees_id,
                                    "active_status" =>$course_fee->active_status,
                                    "approve_status" =>$course_fee->approve_status,
                                    "remark" =>$course_fee->remark,
                                ];
                            } else {
                                // Zero Fee
                                $fees_array[] = [
                                    "form_name" => $course_fee->form_name,
                                    "fee_name" => $course_fee->fee_name,
                                    "id" => $course_fee->id,
                                    "fee" =>0,
                                    "sem" => $course_fee->sem,
                                    "patternclass_id" => $course_fee->patternclass_id,
                                    "examfees_id" => $course_fee->examfees_id,
                                    "active_status" =>$course_fee->active_status,
                                    "approve_status" =>$course_fee->approve_status,
                                    "remark" =>$course_fee->remark,
                                ];
                            }
                        break;
                        case "Departmental Fee":
                            // Calculate Departmental Fee
                            $fees_array[] = [
                                "form_name" => $course_fee->form_name,
                                "fee_name" => $course_fee->fee_name,
                                "id" => $course_fee->id,
                                "fee" =>$course_fee->fee,
                                "sem" => $course_fee->sem,
                                "patternclass_id" => $course_fee->patternclass_id,
                                "examfees_id" => $course_fee->examfees_id,
                                "active_status" =>$course_fee->active_status,
                                "approve_status" =>$course_fee->approve_status,
                                "remark" =>$course_fee->remark,
                            ];
                        break;
                        case "Transcript Fee":
                            // Calculate Transcript Fee
                            $fees_array[] = [
                                "form_name" => $course_fee->form_name,
                                "fee_name" => $course_fee->fee_name,
                                "id" => $course_fee->id,
                                "fee" =>$course_fee->fee,
                                "sem" => $course_fee->sem,
                                "patternclass_id" => $course_fee->patternclass_id,
                                "examfees_id" => $course_fee->examfees_id,
                                "active_status" =>$course_fee->active_status,
                                "approve_status" =>$course_fee->approve_status,
                                "remark" =>$course_fee->remark,
                            ];
                        break;
                        case "Late Fee":
                            // Calculate Late Fee
                            if ($exam_pattern_class) {
                                // Late Fee Apply If In Exam Pattern Class Late Fee Date Is Exceeds Todays Date
                                if (isset($exam_pattern_class->latefee_date)) {
                                    $late_fee_date = date('Y-m-d', strtotime($exam_pattern_class->latefee_date));
                                    $today_date = date('Y-m-d');
                                    if ($today_date > $late_fee_date) {
                                        $fees_array[] = [
                                            "form_name" => $course_fee->form_name,
                                            "fee_name" => $course_fee->fee_name,
                                            "id" => $course_fee->id,
                                            "fee" =>$course_fee->fee,
                                            "sem" => $course_fee->sem,
                                            "patternclass_id" => $course_fee->patternclass_id,
                                            "examfees_id" => $course_fee->examfees_id,
                                            "active_status" =>$course_fee->active_status,
                                            "approve_status" =>$course_fee->approve_status,
                                            "remark" =>$course_fee->remark,
                                        ];
                                    } else {
                                        // Zero Fee
                                        $fees_array[] = [
                                            "form_name" => $course_fee->form_name,
                                            "fee_name" => $course_fee->fee_name,
                                            "id" => $course_fee->id,
                                            "fee" =>0,
                                            "sem" => $course_fee->sem,
                                            "patternclass_id" => $course_fee->patternclass_id,
                                            "examfees_id" => $course_fee->examfees_id,
                                            "active_status" =>$course_fee->active_status,
                                            "approve_status" =>$course_fee->approve_status,
                                            "remark" =>$course_fee->remark,
                                        ];
                                    }
                                }
                            }
                        break;
                        case "Fine Fee":
                            // Calculate Fine Fee
                            if ($exam_pattern_class) {
                                // Fine Fee Apply If In Exam Pattern Class Fine Fee Date Is Exceeds Todays Date
                                if (isset($exam_pattern_class->finefee_date)) {
                                    $fine_fee_date = date('Y-m-d', strtotime($exam_pattern_class->finefee_date));
                                    $today_date = date('Y-m-d');
                                    if ($today_date > $fine_fee_date) {
                                        $fees_array[] = [
                                            "form_name" => $course_fee->form_name,
                                            "fee_name" => $course_fee->fee_name,
                                            "id" => $course_fee->id,
                                            "fee" =>$course_fee->fee,
                                            "sem" => $course_fee->sem,
                                            "patternclass_id" => $course_fee->patternclass_id,
                                            "examfees_id" => $course_fee->examfees_id,
                                            "active_status" =>$course_fee->active_status,
                                            "approve_status" =>$course_fee->approve_status,
                                            "remark" =>$course_fee->remark,
                                        ];
                                    } else {
                                        $fees_array[] = [
                                            "form_name" => $course_fee->form_name,
                                            "fee_name" => $course_fee->fee_name,
                                            "id" => $course_fee->id,
                                            "fee" =>0,
                                            "sem" => $course_fee->sem,
                                            "patternclass_id" => $course_fee->patternclass_id,
                                            "examfees_id" => $course_fee->examfees_id,
                                            "active_status" =>$course_fee->active_status,
                                            "approve_status" =>$course_fee->approve_status,
                                            "remark" =>$course_fee->remark,
                                        ];
                                    }
                                }
                            }
                        break;
                        case "Backlog Fee":
                            // Calculate Backlog Subject Exam Fee
                            if ($backlog_count) {
                                // According Backlog Subject Count
                                $fees_array[] = [
                                    "form_name" => $course_fee->form_name,
                                    "fee_name" => $course_fee->fee_name,
                                    "id" => $course_fee->id,
                                    "fee" =>($course_fee->fee * $backlog_count),
                                    "sem" => $course_fee->sem,
                                    "patternclass_id" => $course_fee->patternclass_id,
                                    "examfees_id" => $course_fee->examfees_id,
                                    "active_status" =>$course_fee->active_status,
                                    "approve_status" =>$course_fee->approve_status,
                                    "remark" =>$course_fee->remark,
                                ];
                            }
                        break;
                    }
                }
            }
        }
        return collect($fees_array);
    }
}