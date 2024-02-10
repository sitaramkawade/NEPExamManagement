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
use App\Models\StudentExamforms;
use App\Models\Extracreditsubject;
use App\Models\Studentexamformfee;
use Illuminate\Support\Facades\DB;
use App\Models\CurrentclassStudents;
use Illuminate\Support\Facades\Auth;


class StudentExamForm extends Component
{  
    public $abcid_option=['show_abcid'=>true ,'required_abcid'=>false];
    public $medium_instruction;
    public $page=1;
    public $abcid;
    public $total_extra_credit;
    public $regular_subjects=[];
    public $backlog_subjects=[];
    public $extra_credit_subjects=[];
    public $exam_fee_courses=[];
    public $backlog_subject_previous_semester=[];

    protected Student $student;
    
    #[Locked]
    public $patternclss_id;

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
    public function render()
    {   
        // // Init Auth Student
        $this->student = Auth::guard('student')->user();

        // Init Student ABC ID
        $this->abcid = $this->student->abcid;

        // Init Medium Instruction
        // $this->medium_instruction = 'E';

        // Init Backlog Subject IDs
        $backlog_subject_ids=null;

        // Init Regular Subjects
        $this->regular_subjects=[];

        // Init Backlog Subjects To Empty
        $this->backlog_subjects=[];

        // Init Extra Credit Subjects
        $this->extra_credit_subjects=[]; 

        // Init Backlog Subject Previous Semesters
        $this->backlog_subject_previous_semester=null;

        // Init Active Exam Session
        $current_active_exam_session=null;

        // Getting Active Exam 
        $current_active_exam = Exam::Where('status',1)->get();

        // Checking Active Exam Session
        if(isset($current_active_exam->first()->exam_sessions))
        {   
            // Get Active Exam Session
            $current_active_exam_session=$current_active_exam->first()->exam_sessions;
        }

        // Checking If Student Present In Current Class Student
        $current_class_student_entry = $this->student->currentclassstudents->last();

        // Checking Current Class Student Pass Fail Status And Marksheet Print status
        // not_result_status means Not pass | Fail | ATKT #--> !PFA
        $not_result_status=$this->student->currentclassstudents->where('pfstatus','!=','-1')->where('markssheetprint_status','!=','-1');
        
        // if Current Class Student is Empty
        if(!isset($current_class_student_entry))
        {   
            // For First Year SEM-I Students

            // Getting Student Admission Data Of That Pattern Class
            $admission_data= Admissiondata::where('memid',$this->student->memid)->where('patternclass_id',$this->student->patternclass_id)->get();
            
            // Checking If Admission Data OF Student Not Empty
            if(!$admission_data->isEmpty())
            {                        
                // Checking Last Entry of Student Admission Data Acdemic Year And Active Exam Academic Year
                if($admission_data->last()->academicyear_id==$current_active_exam->first()->academicyear_id)
                {  
                    // if Current Active Exam Session is 1 then get Student SEM-1 Regular Subjects
                    if($current_active_exam_session==1)
                    {   
                        // Setting Subjects Of SEM-1 From Admission Data Subjects Ids
                        $this->regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',1)->get();

                        // Cheking Check Boxes
                        $this->check_subject_checkboxs($this->regular_subjects);

                        $this->exam_fee_courses=Examfeecourse::where('patternclass_id',$this->student->patternclass_id)->get();
                    }
                    else
                    {   
                        // Setting Subjects Of SEM-2 From Admission Data Subjects Ids
                        $this->regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',2)->get();
                        
                        // Cheking Check Boxes
                        $this->check_subject_checkboxs($this->regular_subjects);

                        // Setting Backlog Subjects Of SEM-1 From Admission Data Subjects Ids
                        $this->backlog_subject_previous_semester=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',1)->get();
                    }

                    //  #-> Getting Extra Credit Subject IDs From
                    //$extra_credit_subject_ids=$this->student->intextracreditbatchseatnoallocations->where('grade','=','NA')->pluck('subject_id');
                    
                    // Setting Extra Credit Subject of Course Class
                    $this->extra_credit_subjects=Extracreditsubject::where('status',1)->where('course_type',$this->student->patternclass->courseclass->course->course_type)->get();

                    // Cheking Check Boxes
                    $this->check_subject_checkboxs($this->extra_credit_subjects);

                    // Setting Total Extra Credit Count
                    $this->total_extra_credit= $this->extra_credit_subjects->pluck('subject_credit')->sum();  
                }
                else
                {   
                    $this->dispatch('alert',type:'info',message:'No Admission Found In The Current Academic Year !!');
                }
            }
            else
            {   
                $this->dispatch('alert',type:'info',message:'Invalid Member ID Please Update Your Profile !!');
            }
        }
        else
        {
            $this->dispatch('alert',type:'info',message:'Comming Soon !!');
        }

        return view('livewire.student.student-exam-form.student-exam-form')->extends('layouts.student')->section('student');
    }

    // Get SEM 1 Subjects For Fist Year
    public function get_sem_1_regular_subjects()
    {   

        $subjectids = Admissiondata::select('subject_id')->where('memid',$this->student->memid)->where('patternclass_id', $this->patternclss_id)->get();
        dd(   Subject::where('subject_sem',1)->whereIn('id',$subjectids)->where('patternclass_id', $this->patternclss_id)->get() );
        return  Subject::where('subject_sem',1)->whereIn('id',$subjectids)->where('patternclass_id', $this->patternclss_id)->get();
    }

    public function rules()
    {
        return [
            'abcid' => [  ($this->abcid_option['required_abcid'] ? 'required' : 'nullable'),'numeric','digits:12','unique:students,abcid,'.Auth::guard('student')->user()->id],
            'medium_instruction' => ['required','string',],
        ];
    }

    public function messages()
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

    // Check Subject checkboxes 
    public function check_subject_checkboxs($subjects)
    {
        foreach($subjects as $subjects)
        {   
            if( $subjects->subjectexam_type=="IE")
            {
                $this->internals[$subjects->id]=true;
                $this->externals[$subjects->id]=true;
            }
            
            if( $subjects->subjectexam_type=="IEP")
            {
                $this->internals[$subjects->id]=true;
                $this->externals[$subjects->id]=true;
                $this->practicals[$subjects->id]=true;
            }

            if( $subjects->subjectexam_type=="IEG")
            {
                $this->internals[$subjects->id]=true;
                $this->externals[$subjects->id]=true;
                $this->grades[$subjects->id]=true;
            }

            if( $subjects->subjectexam_type=="IEP")
            {
                $this->internals[$subjects->id]=true;
                $this->externals[$subjects->id]=true;
                $this->practicals[$subjects->id]=true;
            }
            
            if( $subjects->subjectexam_type=="IP")
            {
                $this->internals[$subjects->id]=true;
                $this->practicals[$subjects->id]=true;
            }

            if( $subjects->subjectexam_type=="IG")
            {
                $this->internals[$subjects->id]=true;
                $this->grades[$subjects->id]=true;
            }
            
            if( $subjects->subjectexam_type=="I")
            {
                $this->internals[$subjects->id]=true;
            }

            if( $subjects->subjectexam_type=="P")
            {
                $this->projects[$subjects->id]=true;
            }

            if( $subjects->subjectexam_type=="G")
            {
                $this->grades[$subjects->id]=true;
            }
        }
    }


    // Get SEM Wise Subjects
    public function get_sem_subjects($sem)
    {
        return Subject::where('subject_sem',$sem)->where('patternclass_id', $this->patternclss_id)->get();
    }

    //  Save Exam Form SEM-1
    public function save_sem_1_exam_form()
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
                foreach ($this->regular_subjects as $subject) 
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
                    ];

                    // Set Checked Input
                    switch ($subject->subjectexam_type) 
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
                $student_exam_form_data = StudentExamforms::insert($student_exam_forms);

                // Init Student Exam Form Fee
                $student_exam_form_fees = [];

                // Prepare Student Exam Form Fee
                foreach ($examfeecourse as $fee) 
                {
                    $student_exam_form_fees[] = [
                        'examformmaster_id' =>$exam_form_master_data->id,
                        'examfees_id' => $fee->examfees_id,
                        'fee_amount' => $fee->fee
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
            $this->save_sem_1_exam_form();
        }
        else
        {   
            //sem 2 ,3,4,5,6
            $this->patternclass_id->$current_class_student_entry->patternclass_id;
        }
    }
}

