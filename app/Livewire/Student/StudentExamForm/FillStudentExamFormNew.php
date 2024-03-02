<?php

namespace App\Livewire\Student\StudentExamForm;


use App\Models\Exam;
use App\Models\Student;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Admissiondata;
use App\Models\Examfeecourse;
use App\Models\Examfeemaster;
use App\Models\Examformmaster;
use App\Models\Formtypemaster;
use Livewire\Attributes\Locked;
use App\Models\ExamPatternclass;
use App\Models\StudentExamform;
use App\Models\Extracreditsubject;
use App\Models\Studentexamformfee;
use Illuminate\Support\Facades\DB;
use App\Models\CurrentclassStudents;
use Illuminate\Support\Facades\Auth;


class FillStudentExamFormNew extends Component
{  
    
    public Student $student;
    public $page=1;
    public $medium_instruction;
    public $patternclass_id;
    public $member_id;
    public $abcid;
    public $abcid_option=['show_abcid'=>true ,'required_abcid'=>false];
    public $year_result = null;

    public $regular_subjects_data = [];
    public $extra_credit_subjects_data = [];
    public $backlog_subjects_data=[];
    public $backlog_subjects_previous_sem = [];
    public $exam_fee_courses=[];


    #[Locked] 
    public  $internals=[];
    #[Locked] 
    public  $externals=[];
    #[Locked] 
    public  $practicals=[];
    #[Locked] 
    public  $grades=[];
    #[Locked] 
    public  $projects=[];

    public function mount()
    {  
        $this->student = Auth::guard('student')->user();
        $this->member_id=$this->student->memid;
        $this->abcid=$this->student->abcid;
    }

    public function render()
    {   
        $this->regular_subjects_data = [];
        $this->extra_credit_subjects_data = [];
        $this->backlog_subjects_data=[];
        $this->backlog_subjects_previous_sem = [];
        
        $current_active_exams = Exam::Where('status',1)->get();
        $current_exam_session = null;
        $current_exam_session = $current_active_exams->first()->exam_sessions;
        $current_class_student_last_entry = $this->student->currentclassstudents->last(); 
        $current_class_inward_students = $this->student->currentclassstudents->where('pfstatus', '!=', -1)->where('markssheetprint_status', '!=', -1);

        if (true)
        {   
            if (is_null($current_class_student_last_entry)) 
            {   
                // FY SEM-I
                $admission_data = Admissiondata::where('memid', $this->member_id)->where('patternclass_id', $this->student->patternclass_id)->get();

                if (!$admission_data->isEmpty()) 
                {
                    if ($admission_data->last()->academicyear_id == $current_active_exams->first()->academicyear_id) 
                    {   
                        
                        if ($current_exam_session != 2)
                        {   
                            // dd('FY SEM-I');
                            // FY SEM-I Subjects
                            $this->regular_subjects_data = Subject::whereIn('id', $admission_data->pluck('subject_id'))->where('subject_sem',1)->get();
                            $this->check_subject_checkboxs($this->regular_subjects_data);
                            $this->exam_fee_courses=Examfeecourse::where('patternclass_id',$this->student->patternclass_id)->get();
                        }
                        else 
                        {   
                            dd('Direct SEM-II');
                            // Direct SEM-II Exam Form With SEM-I Subjects
                            $this->backlog_subjects_previous_sem = Subject::whereIn('id', $admission_data->pluck('subject_id'))->where('subject_sem',1)->get();
                            $this->check_subject_checkboxs($this->backlog_subjects_previous_sem);
                            $this->regular_subjects_data = Subject::whereIn('id', $admission_data->pluck('subject_id'))->where('subject_sem',2)->get();
                            $this->check_subject_checkboxs($this->regular_subjects_data);
                            $this->exam_fee_courses=Examfeecourse::where('patternclass_id',$this->student->patternclass_id)->get();
                        }

                        // Backloag Subjects
                        $this->backlog_subjects_data=[];

                        // $extra_credit_subject_ids = $this->student->intextracreditbatchseatnoallocations()->where('grade', '=', 'NA')->pluck('subject_id');

                        // // Extra Credit Subjects
                        // $this->extra_credit_subjects_data = Extracreditsubject::where('isactive',1)->where('course_type', $this->student->patternclass->courseclass->course->course_type)->get();
                       
                        // // Total Extra Credits
                        // $total_extra_credits = $this->extra_credit_subjects_data->pluck('subject_credit')->sum();

                        // render student , current_active_exams ,regular_subjects_data , current_exam_session , extra_credit_subjects_data ,backlog_subjects_previous_sem , total_extra_credits , backlog_subjects_data
                    } 
                    else 
                    {
                        $this->dispatch('alert',type:'info',message:'No Admission In The Current Year !!');
                    }
                } 
                else
                {   
                    $this->dispatch('alert',type:'info',message:'Invalid Member ID Please Update Your Profile !!');
                }
            } 
            else 
            {   
                switch ($current_class_student_last_entry->sem) 
                {
                    case 1:
                        
                        // Regular FY SEM-II  Data
                        $admission_data = Admissiondata::where('memid', $this->member_id)->where('patternclass_id', $current_class_student_last_entry->patternclass_id)->get();
                        
                        if (!$admission_data->isEmpty()) 
                        {
                            if ($admission_data->last()->academicyear_id == $current_active_exams->first()->academicyear_id) 
                            {   
                                // dd('FY SEM-II');
                                $this->patternclass_id=$current_class_student_last_entry->patternclass_id;
                                $this->regular_subjects_data = Subject::whereIn('id', $admission_data->pluck('subject_id'))->where('subject_sem', $current_class_student_last_entry->sem + 1)->get();
                                $this->check_subject_checkboxs($this->regular_subjects_data);
                                $this->backlog_subjects_data=[];
                                $student_marks_subject_ids = $this->student->studentmarks()->with('subject')->pluck('subject_id');
                                // $this->backlog_subjects_data = Subject::whereIn('id', $student_marks_subject_ids)->where('patternclass_id', $current_class_student_last_entry->patternclass_id)->get();
                                $this->backlog_subjects_data = $this->student->get_backlog_subjects();
                                $this->check_backlog_subject_checkboxs( $this->backlog_subjects_data);
                                $this->exam_fee_courses=Examfeecourse::where('patternclass_id',$this->student->patternclass_id)->get();
                            } 
                            else 
                            {
                                // fail student
                                $this->regular_subjects_data = [];
                                $this->regular_subjects_data_previous = Subject::whereIn('id', $admission_data->pluck('subject_id'))->where('subject_sem', $current_class_student_last_entry->sem + 1)->get();
                                $this->check_subject_checkboxs($this->regular_subjects_data);
                                $this->backlog_subjects_previous_sem = [];
                                $this->backlog_subjects_previous_sem = Subject::whereIn('id', $this->regular_subjects_data_previous->pluck('id'))->get();
                                $this->check_subject_checkboxs($this->backlog_subjects_previous_sem);
                            }
                        } 
                        else
                        {
                            $this->dispatch('alert',type:'info',message:'Invalid Member ID Please Update Your Profile !!');
                        }

                    break;
                    case 2:

                        // SY SEM-III

                        $admission_data = Admissiondata::where('memid', $this->member_id)->where('patternclass_id', $current_class_student_last_entry->patternclass_id + 1)->get();

                        if (!$admission_data->isEmpty()) 
                        {
                            if ($admission_data->last()->academicyear_id == $current_active_exams->first()->academicyear_id) 
                            {

                                $sem_1_data = $this->student->studentresults()->where('sem', $current_class_student_last_entry->sem - 1)->last();
                                $sem_2_data = $this->student->studentresults()->where('sem', $current_class_student_last_entry->sem)->last();
                                if (is_null($sem_1_data) && is_null($sem_2_data)) 
                                {
                                    // Direct SY Admission
                                    if ($current_class_student_last_entry->markssheetprint_status = -1) 
                                    {
                                        $this->regular_subjects_data = Subject::whereIn('id', $admission_data->pluck('subject_id'))->where('subject_sem', $current_class_student_last_entry->sem + 1)->get();
                                        $this->check_subject_checkboxs($this->regular_subjects_data); 
                                        $this->backlog_subjects_data = [];
                                        $student_marks_subject_ids = $this->student->studentmarks()->with('subject')->pluck('subject_id');
                                        $this->backlog_subjects_data = Subject::whereIn('id', $student_marks_subject_ids)->where('patternclass_id', $current_class_student_last_entry->patternclass_id)->get();
                                        $this->check_subject_checkboxs( $this->backlog_subjects_data);
                                    }

                                } 
                                else if (!(is_null($sem_1_data) && is_null($sem_2_data))) 
                                {

                                    $this->year_result = $this->student->get_year_result_exam_form($sem_1_data, $sem_2_data, $current_class_student_last_entry);

                                    if ($this->year_result == 0) 
                                    {
                                        // Fail Student
                                        $this->regular_subjects_data = [];
                                        $this->backlog_subjects_data = [];
                                        $student_marks_subject_ids = $this->student->studentmarks()->with('subject')->pluck('subject_id');
                                        $this->backlog_subjects_data = Subject::whereIn('id', $student_marks_subject_ids)->where('patternclass_id', $current_class_student_last_entry->patternclass_id)->get();
                                        $this->check_subject_checkboxs( $this->backlog_subjects_data);
                                    } 
                                    else 
                                    {
                                        if ($current_exam_session == 2) 
                                        {
                                            // Regular Student SEM-IV
                                            $this->backlog_subjects_previous_sem = Subject::whereIn('id', $admission_data->pluck('subject_id'))->where('subject_sem', $current_class_student_last_entry->sem + 1)->get();
                                            $this->check_subject_checkboxs($this->backlog_subjects_previous_sem);
                                            $this->regular_subjects_data = Subject::whereIn('id', $admission_data->pluck('subject_id'))->where('subject_sem', $current_class_student_last_entry->sem + 2)->get(); 
                                            $this->check_subject_checkboxs($this->regular_subjects_data);
                                        } 
                                        else 
                                        {   
                                            // Regular Student SEM-III
                                            $this->regular_subjects_data = Subject::whereIn('id', $admission_data->pluck('subject_id'))->where('subject_sem', $current_class_student_last_entry->sem + 1)->get();
                                            $this->check_subject_checkboxs($this->regular_subjects_data);
                                            $this->backlog_subjects_data = [];
                                            $student_marks_subject_ids = $this->student->studentmarks()->with('subject')->pluck('subject_id');
                                            $this->backlog_subjects_data = Subject::whereIn('id', $student_marks_subject_ids)->where('patternclass_id', $current_class_student_last_entry->patternclass_id)->get();
                                            $this->check_subject_checkboxs( $this->backlog_subjects_data);
                                        }
                                    }
                                }
                            } else 
                            {
                                // Fail Student
                                $this->regular_subjects_data = [];
                                $this->backlog_subjects_data = [];
                                $student_marks_subject_ids = $this->student->studentmarks()->with('subject')->pluck('subject_id');
                                $this->backlog_subjects_data = Subject::whereIn('id', $student_marks_subject_ids)->where('patternclass_id', $current_class_student_last_entry->patternclass_id)->get();
                                $this->check_subject_checkboxs( $this->backlog_subjects_data);
                            }
                        }
                        else 
                        {
                            $this->regular_subjects_data = [];
                            $this->backlog_subjects_data = [];
                            $student_marks_subject_ids = $this->student->studentmarks()->with('subject')->pluck('subject_id');
                            $this->backlog_subjects_data = Subject::whereIn('id', $student_marks_subject_ids)->where('patternclass_id', $current_class_student_last_entry->patternclass_id)->get();
                            $this->check_subject_checkboxs( $this->backlog_subjects_data);
                            if ($student_marks_subject_ids->isEmpty())
                            {

                                $this->dispatch('alert',type:'info',message:'Invalid Member ID Please Update Your Profile !!');
                            }
                        }
                    break;
                    case 3:
                        
                        $admission_data = Admissiondata::where('memid', $this->member_id)->where('patternclass_id', $current_class_student_last_entry->patternclass_id)->get();
                  
                        if (!$admission_data->isEmpty()) 
                        {
                            if ($admission_data->last()->academicyear_id == $current_active_exams->first()->academicyear_id) 
                            { 

                                $this->regular_subjects_data = Subject::whereIn('id', $admission_data->pluck('subject_id'))->where('subject_sem', $current_class_student_last_entry->sem + 1)->get();
                                $this->check_subject_checkboxs($this->regular_subjects_data);
                                $this->backlog_subjects_data = [];
                                $student_marks_subject_ids = $this->student->studentmarks()->with('subject')->pluck('subject_id');
                                $this->backlog_subjects_data = Subject::whereIn('id', $student_marks_subject_ids)->get();
                                $this->check_subject_checkboxs( $this->backlog_subjects_data);
                              
                            } else 
                            {
                                // Fail Student
                                $this->regular_subjects_data = null;
                                $this->regular_subjects_data_previous = Subject::whereIn('id', $admission_data->pluck('subject_id'))->where('subject_sem', $current_class_student_last_entry->sem + 1)->get();
                                $this->check_subject_checkboxs($this->regular_subjects_data);
                                $this->backlog_subjects_previous_sem = null;
                                $this->backlog_subjects_previous_sem = Subject::whereIn('id', $this->regular_subjects_data_previous->pluck('id'))->get();
                                $this->check_subject_checkboxs($this->backlog_subjects_previous_sem);
                            }
                        } 
                        else
                        {
                            $this->dispatch('alert',type:'info',message:'Invalid Member ID Please Update Your Profile !!');
                        }

                    break;
                    case 4:
                        $admission_data = Admissiondata::where('memid', $this->member_id)->where('patternclass_id', $current_class_student_last_entry->patternclass_id + 1)->get();

                        if (!$admission_data->isEmpty()) 
                        { 
                            if ($admission_data->last()->academicyear_id == $current_active_exams->first()->academicyear_id) 
                            {
                                if ($current_class_inward_students->isEmpty()) 
                                {
                                    $this->regular_subjects_data = Subject::whereIn('id', $admission_data->pluck('subject_id'))->where('subject_sem', $current_class_student_last_entry->sem + 1)->get();
                                    $this->check_subject_checkboxs($this->regular_subjects_data);
                                    $this->backlog_subjects_data = [];
                                    $student_marks_subject_ids = $this->student->studentmarks()->with('subject')->pluck('subject_id');
                                    $this->backlog_subjects_data = Subject::whereIn('id', $student_marks_subject_ids)->where('patternclass_id', $current_class_student_last_entry->patternclass_id)->get();
                                    $this->check_subject_checkboxs( $this->backlog_subjects_data);
                                }

                                if ($current_class_inward_students->count() == 4) 
                                {
                                    $sem_1_data = $this->student->studentresults()->where('sem', 1)->last();
                                    $sem_2_data = $this->student->studentresults()->where('sem', 2)->last();
                                    if (!(is_null($sem_1_data) && is_null($sem_2_data))) 
                                    {
                                        $this->year_result = $this->student->get_year_result_exam_form($sem_1_data, $sem_2_data, $current_class_student_last_entry);

                                        if ($this->year_result != 1) 
                                        {   
                                            // Fail Repeater Student
                                            $this->regular_subjects_data = [];
                                            $this->backlog_subjects_data = [];
                                            $student_marks_subject_ids = $this->student->studentmarks()->with('subject')->pluck('subject_id');
                                            $this->backlog_subjects_data = Subject::whereIn('id', $student_marks_subject_ids)->where('patternclass_id', $current_class_student_last_entry->patternclass_id)->get();
                                            $this->check_subject_checkboxs( $this->backlog_subjects_data);
                                        }
                                        else 
                                        {
                                            $Sem3Data = $this->student->studentresults()->where('sem', 3)->last();
                                            $Sem4Data = $this->student->studentresults()->where('sem', 4)->last();
                                            if (!(is_null($Sem3Data) && is_null($Sem4Data))) 
                                            {
                                                $this->year_result = $this->student->get_year_result_exam_form($Sem3Data, $Sem4Data, $current_class_student_last_entry);

                                                if ($this->year_result == 0) 
                                                {   
                                                    // Fail Repeater Student
                                                    $this->regular_subjects_data = [];
                                                    $this->backlog_subjects_data = [];
                                                    $student_marks_subject_ids = $this->student->studentmarks()->with('subject')->pluck('subject_id');
                                                    $this->backlog_subjects_data = Subject::whereIn('id', $student_marks_subject_ids)->where('patternclass_id', $current_class_student_last_entry->patternclass_id)->get();
                                                    $this->check_subject_checkboxs( $this->backlog_subjects_data);
                                                } 
                                                else 
                                                {   
                                                    // Regular Student
                                                    if ($current_exam_session == 2) 
                                                    {
                                                        $this->backlog_subjects_previous_sem = Subject::whereIn('id', $admission_data->pluck('subject_id'))->where('subject_sem', $current_class_student_last_entry->sem + 1)->get();
                                                        $this->check_subject_checkboxs($this->backlog_subjects_previous_sem);
                                                        $this->regular_subjects_data = Subject::whereIn('id', $admission_data->pluck('subject_id'))->where('subject_sem', $current_class_student_last_entry->sem + 2)->get(); 
                                                        $this->check_subject_checkboxs($this->regular_subjects_data);
                                                    } else 
                                                    {
                                                        $this->regular_subjects_data = Subject::whereIn('id', $admission_data->pluck('subject_id'))->where('subject_sem', $current_class_student_last_entry->sem + 1)->get();
                                                        $this->check_subject_checkboxs($this->regular_subjects_data);
                                                        $this->backlog_subjects_data = [];
                                                        $student_marks_subject_ids = $this->student->studentmarks()->with('subject')->pluck('subject_id');
                                                        $this->backlog_subjects_data = Subject::whereIn('id', $student_marks_subject_ids)->where('patternclass_id', $current_class_student_last_entry->patternclass_id)->get();
                                                        $this->check_subject_checkboxs( $this->backlog_subjects_data);
                                                    }

                                                }
                                            }
                                        }
                                    }
                                }
                                if ($current_class_inward_students->count() == 2) 
                                {
                                    $sem_1_data = $this->student->studentresults()->where('sem', $current_class_student_last_entry->sem - 1)->last();
                                    $sem_2_data = $this->student->studentresults()->where('sem', $current_class_student_last_entry->sem)->last();
                                    if (!(is_null($sem_1_data) && is_null($sem_2_data))) 
                                    {

                                        $this->year_result = $this->student->get_year_result_exam_form($sem_1_data, $sem_2_data, $current_class_student_last_entry);

                                        if ($this->year_result == 0) 
                                        {   
                                            // Fail Repeater Student
                                            $this->regular_subjects_data = [];
                                            $this->backlog_subjects_data = [];
                                            $student_marks_subject_ids = $this->student->studentmarks()->with('subject')->pluck('subject_id');
                                            $this->backlog_subjects_data = Subject::whereIn('id', $student_marks_subject_ids)->where('patternclass_id', $current_class_student_last_entry->patternclass_id)->get();
                                            $this->check_subject_checkboxs( $this->backlog_subjects_data);
                                        } 
                                        else 
                                        {   
                                            // Regular Student
                                            $this->regular_subjects_data = Subject::whereIn('id', $admission_data->pluck('subject_id'))->get();
                                            $this->check_subject_checkboxs($this->regular_subjects_data);
                                            $this->backlog_subjects_data = [];
                                            $student_marks_subject_ids = $this->student->studentmarks()->with('subject')->pluck('subject_id');
                                            $this->backlog_subjects_data = Subject::whereIn('id', $student_marks_subject_ids)->where('patternclass_id', $current_class_student_last_entry->patternclass_id)->get();
                                            $this->check_subject_checkboxs( $this->backlog_subjects_data);
                                        }
                                    } 
                                    else 
                                    {
                                        // Fail Student
                                        $this->regular_subjects_data = [];
                                        $this->backlog_subjects_data = [];
                                        $student_marks_subject_ids = $this->student->studentmarks()->with('subject')->pluck('subject_id');
                                        $this->backlog_subjects_data = Subject::whereIn('id', $student_marks_subject_ids)->where('patternclass_id', $current_class_student_last_entry->patternclass_id)->get();
                                        $this->check_subject_checkboxs( $this->backlog_subjects_data);
                                    }
                                }
                            } 
                            else 
                            {
                                $this->regular_subjects_data = [];
                                $this->backlog_subjects_data = [];
                                $student_marks_subject_ids = $this->student->studentmarks()->with('subject')->pluck('subject_id');
                                $this->backlog_subjects_data = Subject::whereIn('id', $student_marks_subject_ids)->get();
                                $this->check_subject_checkboxs( $this->backlog_subjects_data);
                                if ($student_marks_subject_ids->isEmpty())
                                {

                                    $this->dispatch('alert',type:'info',message:'Invalid Member ID Please Update Your Profile !!');
                                }
                            }
                        } 
                        else 
                        {
                            $admission_data = Admissiondata::where('memid', $this->member_id)->where('patternclass_id', $current_class_student_last_entry->patternclass_id)->get();
                            if (!$admission_data->isEmpty()) 
                            {
                                $this->regular_subjects_data = [];
                                $this->backlog_subjects_data = [];
                            } 
                            else
                            {
                                $this->dispatch('alert',type:'info',message:'Invalid Member ID Please Update Your Profile !!');
                            }
                        }
                        break;
                    case 5:

                        // TY SEM-V to SEM-VI
                        $admission_data = Admissiondata::where('memid', $this->member_id)->where('patternclass_id', $current_class_student_last_entry->patternclass_id)->get();
                        if (!$admission_data->isEmpty()) 
                        {
                            if ($admission_data->last()->academicyear_id == $current_active_exams->first()->academicyear_id) 
                            {

                                $this->regular_subjects_data = Subject::whereIn('id', $admission_data->pluck('subject_id'))->where('subject_sem', $current_class_student_last_entry->sem + 1)->get();
                                $this->check_subject_checkboxs($this->regular_subjects_data);
                                $this->backlog_subjects_data = [];
                                $student_marks_subject_ids = $this->student->studentmarks()->with('subject')->pluck('subject_id');
                                $this->backlog_subjects_data = Subject::whereIn('id', $student_marks_subject_ids)->get();
                                $this->check_subject_checkboxs( $this->backlog_subjects_data);
                            } 
                            else 
                            {
                                // Fail Student
                                $this->regular_subjects_data = [];
                                $this->regular_subjects_data_previous = Subject::whereIn('id', $admission_data->pluck('subject_id'))->where('subject_sem', $current_class_student_last_entry->sem + 1)->get();
                                $this->check_subject_checkboxs($this->regular_subjects_data_previous);
                                $this->backlog_subjects_previous_sem = [];
                                $this->backlog_subjects_previous_sem = Subject::whereIn('id', $this->regular_subjects_data_previous->pluck('id'))->get();
                                $this->check_subject_checkboxs($this->backlog_subjects_previous_sem);
                            }
                        } else
                        {
                            $this->dispatch('alert',type:'info',message:'Invalid Member ID Please Update Your Profile !!');
                        }

                    break;
                    case 6:
                        $this->regular_subjects_data = [];
                        $this->backlog_subjects_data = [];
                        $student_marks_subject_ids = $this->student->studentmarks()->with('subject')->pluck('subject_id');
                        $this->backlog_subjects_data = Subject::whereIn('id', $student_marks_subject_ids)->where('patternclass_id', $current_class_student_last_entry->patternclass_id)->get();
                        $this->check_subject_checkboxs( $this->backlog_subjects_data);
                    break;
                }
               
                // $extra_credit_subject_ids = $this->student->intextracreditbatchseatnoallocations()->where('grade', '=', 'NA')->pluck('subject_id');

                // if ($this->student->patternclass->courseclass->course->course_type == "PG") 
                // {
                //     if ($this->student->studentadmission->whereIn('academicyear_id', [1, 2])->count() >= 1) 
                //     {
                //         $this->extra_credit_subjects_data = Extracreditsubject::where('isactive',0)->where('course_type', $this->student->patternclass->courseclass->course->course_type)->get();
                //         $total_extra_credits = $this->extra_credit_subjects_data->pluck('subject_credit')->sum();
                //     } 
                //     else 
                //     {
                //         $this->extra_credit_subjects_data = Extracreditsubject::where('isactive', 1)->where('course_type', $this->student->patternclass->courseclass->course->course_type)->get();
                //         $total_extra_credits = $this->extra_credit_subjects_data->pluck('subject_credit')->sum();
                //     }
                // } 
                // else 
                // {
                //     $this->extra_credit_subjects_data = Extracreditsubject::where('isactive', 1)->where('course_type', $this->student->patternclass->courseclass->course->course_type)->get();
                //     $total_extra_credits = $this->extra_credit_subjects_data->pluck('subject_credit')->sum();
                // }

                // render student ,current_active_exams ,regular_subjects_data , current_exam_session , extra_credit_subjects_data ,backlog_subjects_previous_sem , total_extra_credits , backlog_subjects_data
            }
        } 
    
        return view('livewire.student.student-exam-form.fill-student-exam-form-new')->extends('layouts.student')->section('student');
    }

    //  Save Exam Form SEM-1
    public function save_fy_sem_1_exam_form()
    {  
        // Getting Exam Form
        $formtype=Formtypemaster::where('form_name','Exam Form')->first();

        // Getting Fee Ids
        $examfeemasterids=Examfeemaster::where('form_type_id', $formtype->id)->pluck('id');

        // Getting Exam Fee Courses Of Pattern Class
        $examfeecourse = Examfeecourse::whereIn('examfees_id',$examfeemasterids)->where('patternclass_id', $this->patternclass_id)->get();

        // Getting Launched Exam Of Pattern Class
        $exampatternclass = ExamPatternclass::where('launch_status', 1)->where('patternclass_id', $this->patternclass_id)->first();
        if ($exampatternclass) 
        {   
            // Checking Dublicate Entry
            $existingRecord = Examformmaster::where([
                'student_id' => $this->student->id,
                'exam_id' => $exampatternclass->exam_id,
                'patternclass_id' => $exampatternclass->patternclass_id,
            ])->first();
            
            // If Found Dublicte Entry Retun Error
            if ($existingRecord) 
            {
                $this->dispatch('alert',type:'error',message:'You Are Trying To Submit The Exam Form Again.');
                return false;
            }

            try 
            {   
                // Init Transaction
                DB::beginTransaction();

                // Intit Total Fee
                $total_fee = 0;

                // Calculate Total Fee
                foreach ($examfeecourse as $fee) 
                {
                    $total_fee= $total_fee + $fee->fee;
                }

                // Prepare Exam Form Matser Data
                $exam_form_master = [
                    'medium_instruction' => $this->medium_instruction,
                    'totalfee' => $total_fee,
                    'student_id' => $this->student->id,
                    'college_id' => $this->student->college_id,
                    'exam_id' => $exampatternclass->exam_id,
                    'patternclass_id' => $exampatternclass->patternclass_id,
                ];

                 // Save Exam Form Matser Data
                $exam_form_master_data = Examformmaster::create($exam_form_master);

                // Init Student Exam Form
                $student_exam_forms = [];

                // Prepare Student Exam Form Data
                foreach ($this->regular_subjects_data as $subject) 
                {
                    $student_exam_form = [
                        'exam_id' => $exam_form_master_data->exam_id,
                        'student_id' => $this->student->id,
                        'subject_id' => $subject->id,
                        'examformmaster_id' => $exam_form_master_data->id,
                        'college_id' => $this->student->college_id,
                        'int_status' => 0,
                        'ext_status' => 0,
                        'int_practical_status' => 0,
                        'grade_status' => 0,
                        'practical_status' => 0,
                        'project_status' => 0,
                        'oral_status' => 0,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    // Set Checked Input
                    switch ($subject->subject_type) 
                    {
                        case 'I':
                            $student_exam_form['int_status'] = 1;
                        break;
                        case 'G':
                            $student_exam_form['grade_status'] = 1;
                        break;
                        case 'IG':
                            $student_exam_form['int_status'] = 1;
                            $student_exam_form['grade_status'] = 1;
                        break;
                        case 'P':
                        case 'IP':
                        case 'IE':
                            $student_exam_form['int_status'] = 1;
                            $student_exam_form['ext_status'] = 1;
                        break;
                        case 'IEG':
                            $student_exam_form['int_status'] = 1;
                            $student_exam_form['ext_status'] = 1;
                            $student_exam_form['grade_status'] = 1;
                        break;
                        case 'IEP':
                            $student_exam_form['int_status'] = 1;
                            $student_exam_form['ext_status'] = 1;
                            $student_exam_form['int_practical_status'] = 1;
                        break;
                    }

                    $student_exam_forms[] = $student_exam_form;
                }

                // Save Student Exam Form Data
                $student_exam_form_data = StudentExamform::insert($student_exam_forms);

                // Init Student Exam Form Fee
                $student_exam_form_fees = [];

                // Prepare Student Exam Form Fee
                foreach ($examfeecourse as $fee) 
                {
                    $student_exam_form_fees[] = [
                        'examformmaster_id' =>$exam_form_master_data->id,
                        'examfees_id' => $fee->examfees_id,
                        'fee_amount' => $fee->fee,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }

                // Save Student Exam Form Fee
                $student_exam_form_fee_data=Studentexamformfee::insert($student_exam_form_fees);

                // If All Above Work Done Then Commint It into DB
                DB::commit();

                // Notifing Success 
                $this->dispatch('alert',type:'success',message:'Exam Form Saved Successfully !!');

                // Redirecting To Student Dashboard
                $this->redirect('/student/dashboard', navigate:true);
            }
            catch (\Exception $e) 
            {   
                dd($e);
                // If Above Work Not Done Then Revert Changes
                DB::rollback();

                // Notify  Failure
                $this->dispatch('alert', type: 'info', message: 'An Error Occurred. Transaction Rolled Back.');
            }
        } 
        else 
        {   
            // Notify  Failure
            $this->dispatch('alert',type:'info',message:'Exam Not Launched For This Pattern Class !!');
        }
    }

    public function save_sem_2_exam_form()
    {  
        dd();
        // Getting Exam Form
        $formtype=Formtypemaster::where('form_name','Exam Form')->first();

        // Getting Fee Ids
        $examfeemasterids=Examfeemaster::where('form_type_id', $formtype->id)->pluck('id');

        // Getting Exam Fee Courses Of Pattern Class
        $examfeecourse = Examfeecourse::whereIn('examfees_id',$examfeemasterids)->where('patternclass_id', $this->patternclass_id)->get();

        // Getting Launched Exam Of Pattern Class
        $exampatternclass = ExamPatternclass::where('launch_status', 1)->where('patternclass_id', $this->patternclass_id)->first();
        if ($exampatternclass) 
        {   
            // Checking Dublicate Entry
            $existingRecord = Examformmaster::where([
                'student_id' => $this->student->id,
                'exam_id' => $exampatternclass->exam_id,
                'patternclass_id' => $exampatternclass->patternclass_id,
            ])->first();
            
            // If Found Dublicte Entry Retun Error
            if ($existingRecord) 
            {
                $this->dispatch('alert',type:'error',message:'You Are Trying To Submit The Exam Form Again.');
                return false;
            }

            try 
            {   
                // Init Transaction
                DB::beginTransaction();

                // Intit Total Fee
                $total_fee = 0;

                // Calculate Total Fee
                foreach ($examfeecourse as $fee) 
                {
                    $total_fee= $total_fee + $fee->fee;
                }

                // Prepare Exam Form Matser Data
                $exam_form_master = [
                    'medium_instruction' => $this->medium_instruction,
                    'totalfee' => $total_fee,
                    'student_id' => $this->student->id,
                    'college_id' => $this->student->college_id,
                    'exam_id' => $exampatternclass->exam_id,
                    'patternclass_id' => $exampatternclass->patternclass_id,
                ];

                 // Save Exam Form Matser Data
                $exam_form_master_data = Examformmaster::create($exam_form_master);

                // Init Student Exam Form
                $student_exam_forms = [];
                $regular_and_backlog_subjects = array_merge($this->regular_subjects_data, $this->backlog_subjects);

                dd( $regular_and_backlog_subjects);
                // Prepare Student Exam Form Data
                foreach ($this->regular_and_backlog_subjects as $subject) 
                {
                    $student_exam_form = [
                        'exam_id' => $exam_form_master_data->exam_id,
                        'student_id' => $this->student->id,
                        'subject_id' => $subject->id,
                        'examformmaster_id' => $exam_form_master_data->id,
                        'college_id' => $this->student->college_id,
                        'int_status' => 0,
                        'ext_status' => 0,
                        'int_practical_status' => 0,
                        'grade_status' => 0,
                        'practical_status' => 0,
                        'project_status' => 0,
                        'oral_status' => 0,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    // Set Checked Input
                    switch ($subject->subject_type) 
                    {
                        case 'I':
                            $student_exam_form['int_status'] = 1;
                        break;
                        case 'G':
                            $student_exam_form['grade_status'] = 1;
                        break;
                        case 'IG':
                            $student_exam_form['int_status'] = 1;
                            $student_exam_form['grade_status'] = 1;
                        break;
                        case 'P':
                        case 'IP':
                        case 'IE':
                            $student_exam_form['int_status'] = 1;
                            $student_exam_form['ext_status'] = 1;
                        break;
                        case 'IEG':
                            $student_exam_form['int_status'] = 1;
                            $student_exam_form['ext_status'] = 1;
                            $student_exam_form['grade_status'] = 1;
                        break;
                        case 'IEP':
                            $student_exam_form['int_status'] = 1;
                            $student_exam_form['ext_status'] = 1;
                            $student_exam_form['int_practical_status'] = 1;
                        break;
                    }

                    $student_exam_forms[] = $student_exam_form;
                }

                // Save Student Exam Form Data
                $student_exam_form_data = StudentExamform::insert($student_exam_forms);

                // Init Student Exam Form Fee
                $student_exam_form_fees = [];

                // Prepare Student Exam Form Fee
                foreach ($examfeecourse as $fee) 
                {
                    $student_exam_form_fees[] = [
                        'examformmaster_id' =>$exam_form_master_data->id,
                        'examfees_id' => $fee->examfees_id,
                        'fee_amount' => $fee->fee,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }

                // Save Student Exam Form Fee
                $student_exam_form_fee_data=Studentexamformfee::insert($student_exam_form_fees);

                // If All Above Work Done Then Commint It into DB
                DB::commit();

                // Notifing Success 
                $this->dispatch('alert',type:'success',message:'Exam Form Saved Successfully !!');

                // Redirecting To Student Dashboard
                $this->redirect('/student/dashboard', navigate:true);
            }
            catch (\Exception $e) 
            {   
                // If Above Work Not Done Then Revert Changes
                DB::rollback();

                // Notify  Failure
                $this->dispatch('alert', type: 'info', message: 'An Error Occurred. Transaction Rolled Back.');
            }
        } 
        else 
        {   
            // Notify  Failure
            $this->dispatch('alert',type:'info',message:'Exam Not Launched For This Pattern Class !!');
        }
    }

    // Exam Form Save
    public function student_exam_form_save()
    {       
        try 
        {
            $this->validate();
        } 
        catch (\Illuminate\Validation\ValidationException $e) 
        {
            $this->page = 1;
            return false;
        }

        // If Public Property show_abcid Is Set Update ABCID
        if($this->abcid_option['show_abcid'])
        {   
            Auth::guard('student')->user()->update(['abcid'=>$this->abcid]);
        }

        // Setting Student
        $this->student = Auth::guard('student')->user();

        // Checking If Student Present In Current Class Student
        $current_class_student_entry = $this->student->currentclassstudents->last();
        
        // if Current Class Student is Empty
        if (!isset($current_class_student_entry)) 
        {  
            // For First Year SEM-I Students
            $this->patternclass_id = $this->student->patternclass_id;

            // Saving SEM-1 Exam Form
            $this->save_fy_sem_1_exam_form();
        }
        else
        {   
            //sem 2 ,3,4,5,6
            $this->patternclass_id =$current_class_student_entry->patternclass_id;
            $this->save_sem_2_exam_form();
        }
    }

    
    public function cancel()
    {   
        $this->redirect('/student/dashboard', navigate:true);
    }

    public function next_back()
    {   
        if($this->page==1)
        {   
            $this->validate();
            $this->page=2;
        }else
        {   
            $this->page=1;
        }
    }

    
    
    protected function rules()
    {
        return [
            'abcid' => [  ($this->abcid_option['required_abcid'] ? 'required' : 'nullable'),'numeric','digits:12','unique:students,abcid,'.Auth::guard('student')->user()->id],
            'medium_instruction' => ['required','string',],
        ];
    }
    
    protected function messages()
    {
        return [
            'medium_instruction.required' => 'Medium Of Instruction is required.',
            'medium_instruction.string' => 'Medium Of Instruction must be a String.',
            'abcid.unique'=>'The ABC ID has been taken.',
            'abcid.required' => 'ABC ID is required.',
            'abcid.numeric' => 'The ABC ID must be a number.',
            'abcid.digits' => 'The ABC ID must be 12 digits.',
        ];
    }
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    //Check Subject checkboxes 
    protected function check_subject_checkboxs($subjects)
    {
         foreach($subjects as $subjects)
         {   
             if( $subjects->subject_type=="IE")
             {
                 $this->internals[$subjects->id]=true;
                 $this->externals[$subjects->id]=true;
             }
             
             if( $subjects->subject_type=="IEP")
             {
                 $this->internals[$subjects->id]=true;
                 $this->externals[$subjects->id]=true;
                 $this->practicals[$subjects->id]=true;
             }
 
             if( $subjects->subject_type=="IEG")
             {
                 $this->internals[$subjects->id]=true;
                 $this->externals[$subjects->id]=true;
                 $this->grades[$subjects->id]=true;
             }
 
             if( $subjects->subject_type=="IEP")
             {
                 $this->internals[$subjects->id]=true;
                 $this->externals[$subjects->id]=true;
                 $this->practicals[$subjects->id]=true;
             }
             
             if( $subjects->subject_type=="IP")
             {
                 $this->internals[$subjects->id]=true;
                 $this->practicals[$subjects->id]=true;
             }
 
             if( $subjects->subject_type=="IG")
             {
                 $this->internals[$subjects->id]=true;
                 $this->grades[$subjects->id]=true;
             }
             
             if( $subjects->subject_type=="I")
             {
                 $this->internals[$subjects->id]=true;
             }
 
             if( $subjects->subject_type=="P")
             {
                 $this->projects[$subjects->id]=true;
             }
 
             if( $subjects->subject_type=="G")
             {
                 $this->grades[$subjects->id]=true;
             }
         }
    }

    //Check Backlog Subject checkboxes 
    protected function check_backlog_subject_checkboxs($subjects)
    {   
        foreach($subjects as $subject)
        {   

            if($subject->subject_type=="I" || $subject->subject_type=="IP" || $subject->subject_type=="IE" || $subject->subject_type=="IEP" || $subject->subject_type=="IEG")
            {
                $this->internals[$subject->id]=true;
            }

            if($subject->subject_type=="E" || $subject->subject_type=="IE" || $subject->subject_type=="IEP" || $subject->subject_type=="EP" || $subject->subject_type=="EP" || $subject->subject_type=="EINTP" || $subject->subject_type=="IEG" || $subject->subject_type=="EG")
            {
                $this->externals[$subject->id]=true;
            }

            if( ($subject->subjectcategory->subjectcategory != 'Project') && (  $subject->subject_type=="P" || $subject->subject_type=="INTP" || $subject->subject_type=="IP" || $subject->subject_type=="IEP" || $subject->subject_type=="EP" || $subject->subject_type=="EINTP"))
            {
                $this->practicals[$subject->id]=true;
            }
            
            if( $subject->subject_type=="G")
            {
                $this->grades[$subject->id]=true;
            }

            if( $subject->subject_type=="P" || $subject->subject_type=="IP"  ||  $subject->subject_type=="INTP")
            {
                $this->projects[$subject->id]=true;
            }
        }
    }
    
    // // Get SEM Wise Subjects
    // public function get_sem_subjects($sem)
    // {
    //     return Subject::where('subject_sem',$sem)->where('patternclass_id', $this->patternclss_id)->get();
    // }
    
    //  Save Exam Form SEM-1
    // public function save_sem_1_exam_form()
    // {  
        //     // Getting Exam Form
        //     $formtype=Formtypemaster::where('form_name','Exam Form')->first();
        
        //     // Getting Fee Ids
        //     $examfeemasterids=Examfeemaster::where('form_type_id', $formtype->id)->pluck('id');
        
        //     // Getting Exam Fee Courses Of Pattern Class
        //     $examfeecourse = Examfeecourse::whereIn('examfees_id',$examfeemasterids)->where('patternclass_id', $this->patternclass_id)->get();
        
        //     // Getting Launched Exam Of Pattern Class
    //     $exampatternclass = ExamPatternclass::where('launch_status', 1)->where('patternclass_id', $this->patternclass_id)->first();
    //     if ($exampatternclass) 
    //     {   
        //         // Checking Dublicate Entry
        //         $existingRecord = Examformmaster::where([
            //             'student_id' => $this->student->id,
            //             'exam_id' => $exampatternclass->exam_id,
            //             'patternclass_id' => $exampatternclass->patternclass_id,
            //         ])->first();
            
            //         // If Found Dublicte Entry Retun Error
            //         if ($existingRecord) 
            //         {
                //             $this->dispatch('alert',type:'error',message:'You Are Trying To Submit The Exam Form Again.');
                //             return false;
                //         }
                
                //         try 
                //         {   
    //             // Init Transaction
    //             DB::beginTransaction();
    
    //             // Intit Total Fee
    //             $total_fee = 0;
    
    //             // Calculate Total Fee
    //             foreach ($examfeecourse as $fee) 
    //             {
        //                 $total_fee= $total_fee + $fee->fee;
        //             }
        
        //             // Prepare Exam Form Matser Data
        //             $exam_form_master = [
            //                 'medium_instruction' => $this->medium_instruction,
            //                 'totalfee' => $total_fee,
            //                 'student_id' => $this->student->id,
    //                 'college_id' => $this->student->college_id,
    //                 'exam_id' => $exampatternclass->exam_id,
    //                 'patternclass_id' => $exampatternclass->patternclass_id,
    //             ];
    
    //              // Save Exam Form Matser Data
    //             $exam_form_master_data = Examformmaster::create($exam_form_master);
    
    //             // Init Student Exam Form
    //             $student_exam_forms = [];
    
    //             // Prepare Student Exam Form Data
    //             foreach ($this->regular_subjects_data as $subject) 
    //             {
        //                 $student_exam_form = [
            //                     'exam_id' => $exam_form_master_data->exam_id,
            //                     'student_id' => $this->student->id,
            //                     'subject_id' => $subject->id,
            //                     'examformmaster_id' => $exam_form_master_data->id,
            //                     'college_id' => $this->student->college_id,
            //                     'int_status' => 0,
            //                     'ext_status' => 0,
            //                     'int_practical_status' => 0,
            //                     'grade_status' => 0,
            //                     'practical_status' => 0,
            //                     'project_status' => 0,
            //                     'oral_status' => 0,
            //                     'created_at' => now(),
            //                     'updated_at' => now(),
            //                 ];

            //                 // Set Checked Input
    //                 switch ($subject->subject_type) 
    //                 {
        //                     case 'I':
            //                         $student_exam_form['int_status'] = 1;
            //                     break;
            //                     case 'G':
                //                         $student_exam_form['grade_status'] = 1;
                //                     break;
                //                     case 'IG':
    //                         $student_exam_form['int_status'] = 1;
    //                         $student_exam_form['grade_status'] = 1;
    //                     break;
    //                     case 'P':
        //                     case 'IP':
            //                     case 'IE':
                //                         $student_exam_form['int_status'] = 1;
                //                         $student_exam_form['ext_status'] = 1;
                //                     break;
                //                     case 'IEG':
                    //                         $student_exam_form['int_status'] = 1;
                    //                         $student_exam_form['ext_status'] = 1;
                    //                         $student_exam_form['grade_status'] = 1;
                    //                     break;
                    //                     case 'IEP':
                        //                         $student_exam_form['int_status'] = 1;
                        //                         $student_exam_form['ext_status'] = 1;
                        //                         $student_exam_form['int_practical_status'] = 1;
                        //                     break;
                        //                 }
                        
                        //                 $student_exam_forms[] = $student_exam_form;
                        //             }
                        
                        //             // Save Student Exam Form Data
                        //             $student_exam_form_data = StudentExamform::insert($student_exam_forms);
                        
                        //             // Init Student Exam Form Fee
                        //             $student_exam_form_fees = [];
                        
                        //             // Prepare Student Exam Form Fee
                        //             foreach ($examfeecourse as $fee) 
                        //             {
                            //                 $student_exam_form_fees[] = [
                                //                     'examformmaster_id' =>$exam_form_master_data->id,
                                //                     'examfees_id' => $fee->examfees_id,
                                //                     'fee_amount' => $fee->fee,
                                //                     'created_at' => now(),
                                //                     'updated_at' => now(),
                                //                 ];
                                //             }
                                
                                //             // Save Student Exam Form Fee
                                //             $student_exam_form_fee_data=Studentexamformfee::insert($student_exam_form_fees);
                                
                                //             // If All Above Work Done Then Commint It into DB
                                //             DB::commit();
                                
                                //             // Notifing Success 
                                //             $this->dispatch('alert',type:'success',message:'Exam Form Saved Successfully !!');
                                
                                //             // Redirecting To Student Dashboard
                                //             $this->redirect('/student/dashboard', navigate:true);
                                //         }
                                //         catch (\Exception $e) 
                                //         {   
    //             // If Above Work Not Done Then Revert Changes
    //             DB::rollback();

    //             // Notify  Failure
    //             $this->dispatch('alert', type: 'info', message: 'An Error Occurred. Transaction Rolled Back.');
    //         }
    //     } 
    //     else 
    //     {   
        //         // Notify  Failure
        //         $this->dispatch('alert',type:'info',message:'Exam Not Launched For This Pattern Class !!');
        //     }
        // }
        
        // public function save_sem_2_exam_form()
        // {  
            //     dd();
            //     // Getting Exam Form
            //     $formtype=Formtypemaster::where('form_name','Exam Form')->first();
            
            //     // Getting Fee Ids
            //     $examfeemasterids=Examfeemaster::where('form_type_id', $formtype->id)->pluck('id');
            
            //     // Getting Exam Fee Courses Of Pattern Class
            //     $examfeecourse = Examfeecourse::whereIn('examfees_id',$examfeemasterids)->where('patternclass_id', $this->patternclass_id)->get();
            
            //     // Getting Launched Exam Of Pattern Class
            //     $exampatternclass = ExamPatternclass::where('launch_status', 1)->where('patternclass_id', $this->patternclass_id)->first();
            //     if ($exampatternclass) 
            //     {   
                //         // Checking Dublicate Entry
                //         $existingRecord = Examformmaster::where([
                    //             'student_id' => $this->student->id,
                    //             'exam_id' => $exampatternclass->exam_id,
                    //             'patternclass_id' => $exampatternclass->patternclass_id,
                    //         ])->first();
            
                    //         // If Found Dublicte Entry Retun Error
                    //         if ($existingRecord) 
    //         {
        //             $this->dispatch('alert',type:'error',message:'You Are Trying To Submit The Exam Form Again.');
    //             return false;
    //         }
    
    //         try 
    //         {   
        //             // Init Transaction
        //             DB::beginTransaction();
        
        //             // Intit Total Fee
        //             $total_fee = 0;
        
        //             // Calculate Total Fee
        //             foreach ($examfeecourse as $fee) 
        //             {
            //                 $total_fee= $total_fee + $fee->fee;
            //             }
            
            //             // Prepare Exam Form Matser Data
            //             $exam_form_master = [
                //                 'medium_instruction' => $this->medium_instruction,
                //                 'totalfee' => $total_fee,
                //                 'student_id' => $this->student->id,
                //                 'college_id' => $this->student->college_id,
                //                 'exam_id' => $exampatternclass->exam_id,
                //                 'patternclass_id' => $exampatternclass->patternclass_id,
                //             ];
                
                //              // Save Exam Form Matser Data
                //             $exam_form_master_data = Examformmaster::create($exam_form_master);
                
                //             // Init Student Exam Form
                //             $student_exam_forms = [];
                //             $regular_and_backlog_subjects = array_merge($this->regular_subjects_data, $this->backlog_subjects);
                
                //             dd( $regular_and_backlog_subjects);
                //             // Prepare Student Exam Form Data
                //             foreach ($this->regular_and_backlog_subjects as $subject) 
                //             {
                    //                 $student_exam_form = [
                        //                     'exam_id' => $exam_form_master_data->exam_id,
                        //                     'student_id' => $this->student->id,
                        //                     'subject_id' => $subject->id,
                        //                     'examformmaster_id' => $exam_form_master_data->id,
                        //                     'college_id' => $this->student->college_id,
                        //                     'int_status' => 0,
                        //                     'ext_status' => 0,
                        //                     'int_practical_status' => 0,
                        //                     'grade_status' => 0,
    //                     'practical_status' => 0,
    //                     'project_status' => 0,
    //                     'oral_status' => 0,
    //                     'created_at' => now(),
    //                     'updated_at' => now(),
    //                 ];
    
    //                 // Set Checked Input
    //                 switch ($subject->subject_type) 
    //                 {
        //                     case 'I':
            //                         $student_exam_form['int_status'] = 1;
            //                     break;
            //                     case 'G':
                //                         $student_exam_form['grade_status'] = 1;
                //                     break;
                //                     case 'IG':
                    //                         $student_exam_form['int_status'] = 1;
                    //                         $student_exam_form['grade_status'] = 1;
                    //                     break;
                    //                     case 'P':
    //                     case 'IP':
        //                     case 'IE':
            //                         $student_exam_form['int_status'] = 1;
            //                         $student_exam_form['ext_status'] = 1;
            //                     break;
            //                     case 'IEG':
                //                         $student_exam_form['int_status'] = 1;
                //                         $student_exam_form['ext_status'] = 1;
                //                         $student_exam_form['grade_status'] = 1;
                //                     break;
                //                     case 'IEP':
                    //                         $student_exam_form['int_status'] = 1;
                    //                         $student_exam_form['ext_status'] = 1;
                    //                         $student_exam_form['int_practical_status'] = 1;
                    //                     break;
                    //                 }
                    
                    //                 $student_exam_forms[] = $student_exam_form;
                    //             }
                    
                    //             // Save Student Exam Form Data
                    //             $student_exam_form_data = StudentExamform::insert($student_exam_forms);
                    
                    //             // Init Student Exam Form Fee
                    //             $student_exam_form_fees = [];
                    
                    //             // Prepare Student Exam Form Fee
                    //             foreach ($examfeecourse as $fee) 
                    //             {
                        //                 $student_exam_form_fees[] = [
                            //                     'examformmaster_id' =>$exam_form_master_data->id,
                            //                     'examfees_id' => $fee->examfees_id,
                            //                     'fee_amount' => $fee->fee,
                            //                     'created_at' => now(),
                            //                     'updated_at' => now(),
                            //                 ];
    //             }

    //             // Save Student Exam Form Fee
    //             $student_exam_form_fee_data=Studentexamformfee::insert($student_exam_form_fees);
    
    //             // If All Above Work Done Then Commint It into DB
    //             DB::commit();
    
    //             // Notifing Success 
    //             $this->dispatch('alert',type:'success',message:'Exam Form Saved Successfully !!');
    
    //             // Redirecting To Student Dashboard
    //             $this->redirect('/student/dashboard', navigate:true);
    //         }
    //         catch (\Exception $e) 
    //         {   
        //             // If Above Work Not Done Then Revert Changes
        //             DB::rollback();
        
        //             // Notify  Failure
        //             $this->dispatch('alert', type: 'info', message: 'An Error Occurred. Transaction Rolled Back.');
        //         }
        //     } 
        //     else 
        //     {   
            //         // Notify  Failure
            //         $this->dispatch('alert',type:'info',message:'Exam Not Launched For This Pattern Class !!');
            //     }
            // }
            
            // // Exam Form Save
            // public function student_exam_form_save()
            // {       
                //     try 
                //     {
                    //         $this->validate();
    //     } 
    //     catch (\Illuminate\Validation\ValidationException $e) 
    //     {
        //         $this->page = 1;
        //         return false;
        //     }
        
        //     // If Public Property show_abcid Is Set Update ABCID
        //     if($this->abcid_option['show_abcid'])
        //     {   
            //         Auth::guard('student')->user()->update(['abcid'=>$this->abcid]);
            //     }
            
            //     // Setting Student
            //     $this->student = Auth::guard('student')->user();
            
            //     // Checking If Student Present In Current Class Student
            //     $current_class_student_entry = $this->student->currentclassstudents->last();
            
            //     // if Current Class Student is Empty
            //     if (!isset($current_class_student_entry)) 
            //     {  
                //         // For First Year SEM-I Students
    //         $this->patternclass_id = $this->student->patternclass_id;
    
    //         // Saving SEM-1 Exam Form
    //         $this->save_sem_1_exam_form();
    //     }
    //     else
    //     {   
        //         //sem 2 ,3,4,5,6
    //         $this->patternclass_id =$current_class_student_entry->patternclass_id;
    //         $this->save_sem_2_exam_form();
    //     }
    // }




}

