<?php

namespace App\Livewire\Student\StudentExamForm;


use App\Models\Exam;
use App\Models\Student;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Admissiondata;
use App\Models\Examformmaster;
use Livewire\Attributes\Locked;
use App\Models\ExamPatternclass;
use App\Models\Extracreditsubject;
use App\Models\CurrentclassStudents;
use Illuminate\Support\Facades\Auth;


class StudentExamForm extends Component
{  
    public $medium_instruction;
    public $abcid;
    public $total_extra_credit;
    public $regular_subjects=[];
    public $backlog_subjects=[];
    public $extra_credit_subjects=[];
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



    public function mount()
    {   

        
    }







    public function examform(Request $request)
    {    
        
        $oddevensixsem=false;
        $current_active_exam_session=null; 
        $extra_credit_subjects=null;
        $student= Auth::guard('student')->user();         
        $current_active_exam = Exam::Where('status', '1')->get();
        $current_active_exam_session=$current_active_exam->first()->exam_sessions;
        $current_class_student_entry=$student->currentclassstudent->last();
        $not_result_status=$student->currentclassstudent->where('pfstatus','!=','-1')->where('markssheetprint_status','!=','-1');
        $backlog_subject_ids=null;
        $regular_subjects=null;
        $backlog_subject_previous_semester=null;

        if($request->input('examform')=="Exam Form")//"Exam Form")
        {
            if(is_null($current_class_student_entry))//first year sem-I
            {
                $memberid= $student->memid;//123;
               $admission_data= Admissiondata::where('memid',$memberid)->where('patternclass_id',$student->patternclass_id)->get();
                if(!$admission_data->isEmpty())
                {                        
                    if($admission_data->last()->academicyear_id==$current_active_exam->first()->academicyear_id)
                    {
                            
                        if($current_active_exam_session!=2)
                        {
                            $regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem','1')->get();
                        }
                        else
                        {
                            $backlog_subject_previous_semester=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',1)->get();
                            $regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',2)->get();
                        }

                        $this->backlog_subjects=[];
                        $extra_credit_subject_ids = $student->intextracreditbatchseatnoallocations->where('grade','=','NA')->pluck('subject_id');
                        $extra_credit_subjects=Extracreditsubject::where('isactive','1')->where('course_type',$student->patternclass->coursepatternclasses->course->course_type)->get();
                        $total_extra_credit= $extra_credit_subjects->pluck('subject_credit')->sum();
                             
                        return view("student.examform1",compact('student','subjectdata','backsubject','examsession','extracreditsub','backsubjectpreviousem','totalextracredit','oddevensixsem'));
                    }
                    else
                    {
                        return back()->with('success','No admission in the current year !!!!!');
                    }
                }
                else
                {
                    return back()->with('success','Invalid Member ID please Update your profile !!!!!');
                }
            }
            else
            {  
                switch($current_class_student_entry->sem)
                {
                    case 1:
                        $memberid= $student->memid;
                       $admission_data= Admissiondata::where('memid',$memberid)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
                        if(!$admission_data->isEmpty())
                        {
                            if($admission_data->last()->academicyear_id==$current_active_exam->first()->academicyear_id)
                            { 
                                $regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
                                $backlog_subjects=null;
                                $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
                            }       
                            else
                            {
                                //fail student
                                $regular_subjects=null;
                                $regular_subjectsprevious=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
                                $a=$regular_subjectsprevious->pluck('id');
                                $backlog_subject_previous_semester=Subject::whereIn('id',$a)->get();
                            }
                        }
                        else
                        {
                            return back()->with('success','Invalid Member ID please Update your profile !!!!!');
                        }
                    break;
                    case 2:  
                        $memberid= $student->memid;//123;
                       $admission_data= Admissiondata::where('memid',$memberid)->where('patternclass_id',$current_class_student_entry->patternclass_id+1)->get();
                        if(!$admission_data->isEmpty())
                        {
                            if($admission_data->last()->academicyear_id==$current_active_exam->first()->academicyear_id)
                            {                       
                                $Sem1Data= $student->studentresults->where('sem',$current_class_student_entry->sem-1)->last();
                                $Sem2Data= $student->studentresults->where('sem',$current_class_student_entry->sem)->last() ;
                                if(is_null($Sem1Data) && is_null($Sem2Data)) //direct to 2nd year admission
                                {
                                    if($current_class_student_entry->markssheetprint_status=-1)
                                    {
                                        $regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
                                        $backlog_subjects=null;
                                        $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                        $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
                                    }
                                }
                                else if(!(is_null($Sem1Data) && is_null($Sem2Data)))
                                {
                                    $this->yearresult=$student->getyearresult_examform($Sem1Data,$Sem2Data,$current_class_student_entry);

                                    if($this->yearresult==0)
                                    {  
                                        //fail student
                                        $regular_subjects=null;
                                        $backlog_subjects=null;
                                        $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                        $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
                                    }
                                    else
                                    {   
                                        // regular admitted student
                                        if($current_active_exam_session==2)
                                        {
                                            $backlog_subject_previous_semester=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
                                            $regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+2)->get();
                                        }
                                        else
                                        {
                                            $regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
                                            $backlog_subjects=null;
                                            $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                            $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
                                        }
                                    }
                                }
                            }
                            else
                            {
                                //fail student
                                $regular_subjects=null;
                                $backlog_subjects=null;
                                $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
                            }
                        }
                        else
                        {
                            $regular_subjects=null;
                            $backlog_subjects=null;
                            $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                            $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
                            if($subdata->isEmpty())
                            {
                                return back()->with('success','Invalid Member ID please Update your profile !!!!!');
                            }             
                        }  
                    break;
                    case 3:
                        $memberid= $student->memid;//123;
                       $admission_data= Admissiondata::where('memid',$memberid)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();

                        if(!$admission_data->isEmpty())
                        {
                            if($admission_data->last()->academicyear_id==$current_active_exam->first()->academicyear_id)
                            {
                                $regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
                                $backlog_subjects=null;
                                $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                $backlog_subjects=Subject::whereIn('id',$subdata)->get();
                            }             
                            else
                            {
                                //fail student
                                $regular_subjects=null;
                                $regular_subjectsprevious=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
                                $a=$regular_subjectsprevious->pluck('id');
                                $backlog_subject_previous_semester=null;
                                $backlog_subject_previous_semester=Subject::whereIn('id',$a)->get();
                            }
                        }
                        else
                        {
                            return back()->with('success','Invalid Member ID please Update your profile !!!!!');
                        }
                    break;
                    case 4:
                        $memberid= $student->memid;//123;
                       $admission_data= Admissiondata::where('memid',$memberid)->where('patternclass_id',$current_class_student_entry->patternclass_id+1)->get();

                        if(!$admission_data->isEmpty())
                        {
                            if($admission_data->last()->academicyear_id==$current_active_exam->first()->academicyear_id)
                            { 
                                if($not_result_status->isEmpty())
                                {
                                    $regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
                                    $backlog_subjects=null;
                                    $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                    $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
                                }

                                if($not_result_status->count()==4)
                                {
                                    $Sem1Data= $student->studentresults->where('sem',1)->last();
                                    $Sem2Data= $student->studentresults->where('sem',2)->last() ;
                                    if(!(is_null($Sem1Data) && is_null($Sem2Data)))
                                    {
                                        $this->yearresult=$student->getyearresult_examform($Sem1Data,$Sem2Data,$current_class_student_entry);
                            
                                        if($this->yearresult!=1)
                                        {   
                                            //fail repeater student
                                            $regular_subjects=null;
                                            $backlog_subjects=null;
                                            $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                            $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
                                        }
                                        else
                                        {
                                            $Sem3Data= $student->studentresults->where('sem',3)->last();
                                            $Sem4Data= $student->studentresults->where('sem',4)->last() ;

                                            if(!(is_null($Sem3Data) && is_null($Sem4Data)))
                                            {
                                                $this->yearresult=$student->getyearresult_examform($Sem3Data,$Sem4Data,$current_class_student_entry);
                                        
                                                if($this->yearresult==0)
                                                {   
                                                    //fail repeater student
                                                    $regular_subjects=null;
                                                    $backlog_subjects=null;
                                                    $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                                    $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
                                                }
                                                else
                                                { 
                                                    //regular admitted student
                                                    if($current_active_exam_session==2)
                                                    {   
                                                        $oddevensixsem=true;
                                                        $backlog_subject_previous_semester=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
                                                        $regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+2)->get();
                                                    }
                                                    else
                                                    { 
                                                        $regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
                                                        $backlog_subjects=null;
                                                        $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                                        $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();          
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }

                                if($not_result_status->count()==2)
                                {
                                    $Sem1Data= $student->studentresults->where('sem',$current_class_student_entry->sem-1)->last();
                                    $Sem2Data= $student->studentresults->where('sem',$current_class_student_entry->sem)->last() ;

                                    if(!(is_null($Sem1Data) && is_null($Sem2Data)))
                                    {
                                        $this->yearresult=$student->getyearresult_examform($Sem1Data,$Sem2Data,$current_class_student_entry);
                                        if($this->yearresult==0)
                                        {   
                                            //fail repeater student
                                            $regular_subjects=null;
                                            $backlog_subjects=null;
                                            $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                            $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
                                        }
                                        else 
                                        {   
                                            //regular admitted student
                                            $regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
                                            $backlog_subjects=null;
                                            $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                            $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
                                        }
                                    }
                                    else
                                    { 
                                        //fail student
                                        $regular_subjects=null;
                                        $backlog_subjects=null;
                                        $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                        $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
                                    }
                                }
                            }
                            else
                            {
                                $regular_subjects=null;
                                $backlog_subjects=null;
                                $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                $backlog_subjects=Subject::whereIn('id',$subdata)->get();        
                                if($subdata->isEmpty())
                                {
                                    return back()->with('success','Invalid Member ID please Update your profile !!!!!');
                                }                 
                            }  
                        }
                        else  
                        {
                           $admission_data= Admissiondata::where('memid',$memberid)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
                            if(!$admission_data->isEmpty())
                            {
                                $regular_subjects=null;
                                $backlog_subjects=null;
                            }
                            else
                            {
                                return back()->with('success','Invalid Member ID please Update your profile !!!!!');
                            }
                        }
                    break;  
                    case 5:

                        //third year sem 5 to sem 6
                        $oddevensixsem=true;
                        $memberid= $student->memid;//123;
                       $admission_data= Admissiondata::where('memid',$memberid)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();

                        if(!$admission_data->isEmpty())
                        {
                            if($admission_data->last()->academicyear_id==$current_active_exam->first()->academicyear_id)
                            { 
                                $regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
                                $backlog_subjects=null;
                                $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                $backlog_subjects=Subject::whereIn('id',$subdata)->get();
                            }       
                            else
                            {
                                //fail student
                                $regular_subjects=null;
                                $regular_subjectsprevious=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
                                $a=$regular_subjectsprevious->pluck('id');
                                $backlog_subject_previous_semester=null;
                                $backlog_subject_previous_semester=Subject::whereIn('id',$a)->get();
                            }
                        }
                        else
                        {
                            return back()->with('success','Invalid Member ID please Update your profile !!!!!');
                        }              
                    break;      
                    case 6:

                        $regular_subjects=null;
                        $backlog_subjects=null;
                        $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                        $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
                    break;                
                }

                $extra_credit_subject_ids=$student->intextracreditbatchseatnoallocations->where('grade','=','NA')->pluck('subject_id');

                if($student->patternclass->coursepatternclasses->course->course_type=="PG")
                {
                    if($student->studentadmission->whereIn('academicyear_id',[1,2])->count()>=1 )
                    {
                        $extra_credit_subjects=Extracreditsubject::where('isactive','0')->where('course_type',$student->patternclass->coursepatternclasses->course->course_type)->get();
                        $total_extra_credit= $extra_credit_subjects->pluck('subject_credit')->sum();
                    }
                    else
                    {
                        $extra_credit_subjects=Extracreditsubject::where('isactive','1')->where('course_type',$student->patternclass->coursepatternclasses->course->course_type)->get();
                        $total_extra_credit= $extra_credit_subjects->pluck('subject_credit')->sum();
                    }
                }else
                {
                    $extra_credit_subjects=Extracreditsubject::where('isactive','1')->where('course_type',$student->patternclass->coursepatternclasses->course->course_type)->get();
                    $total_extra_credit= $extra_credit_subjects->pluck('subject_credit')->sum();
                
                }

                return view("student.examform1",compact('student','examsession','currentexam','subjectdata','extracreditsub','backsubjectpreviousem','totalextracredit','oddevensixsem'));     
            }
        }
        else   
        {   
            // if exam form button on dashboard
            // view exam form button on dashboard

            $current_active_exam = Exam::Where('status', '1')->get();
            $currentprintstatus=$student->examformmaster->where('exam_id', $current_active_exam->first()->id)->first()->printstatus;
            if($currentprintstatus==1)
            {
                return back()->with('success','Your Exam form has already printed');
            }

            $data=$student->examformmaster->where('exam_id', $current_active_exam->first()->id)->first();
          
            $flag=1;
            if($student->studentprofile)
            {
                if ((file_exists(public_path('storage/images/photo/'.$student->studentprofile->profile_photo_path)))||(file_exists(public_path('storage/images/photo/'.$student->studentprofile->sign_photo_path)))) 
                {
                    $pdf = PDF::loadView('student.printexamform', compact('data','flag'))->setOptions(['images' => true,'defaultFont' => 'sans-serif']);
                    $pdf->setPaper('L');
                    $pdf->output();
                    $canvas = $pdf->getDomPDF()->getCanvas();
                    $height = $canvas->get_height();
                    $width = $canvas->get_width();
                    $canvas->set_opacity(.2,"Multiply");
                    $canvas->page_text($width/5, $height/2, 'Print Preview', null,70, array(0,0,0),2,2,-30);
                    $canvas->page_text($width/9, $height/3, 'Print Preview', null,70, array(0,0,0),2,2,-30);

                    return $pdf->stream('examform.pdf');
                }
                else
                {
                    return back()->with('success','Your Photo and sign is not available.Kindly Update your profile');
                }
            } 
            else
            {
                return back()->with('success','Your Photo and sign is not available.Kindly Update your profile');
            }   
        }
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
            'abcid' => ['nullable','numeric','digits:12','unique:students,abcid,'.$this->student->id],
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

    // Exam Form Save
    public function student_exam_form_save()
    {       


        $exampatternclass= ExamPatternclass::where('launch_status',1)->where('patternclass_id', $this->patternclss_id)->first();
        if( $exampatternclass)
        {

            $examorder = new Examformmaster;
    
            $examorder->medium_instruction=$this->medium_instruction;
            $examorder->totalfee=00;
            $examorder->student_id=Auth::guard('student')->user()->id;
            $examorder->college_id=Auth::guard('student')->user()->college_id;
            $examorder->exam_id=$exampatternclass->exam_id;
            $examorder->patternclass_id=$exampatternclass->patternclass_id;
            $examorder->save();
        }
        else
        {
            $this->dispatch('alert',type:'error',message:'Exam Not Lounched For This Pattern Class !!');
        }
        




        //    $examformmaster= new StudentExamforms;

       
    }

    public function render()
    {   
        // Init Auth Student
        $this->student = Auth::guard('student')->user();

        // Init Student ABC ID
        $this->abcid = $this->student->abcid;

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
        // #-> $not_result_status=$this->student->currentclassstudents->where('pfstatus','!=','-1')->where('markssheetprint_status','!=','-1');
        
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


        // $current_class=CurrentclassStudents::where('patternclass_id', $this->patternclss_id)->where('student_id',$this->student->id)->get();

        // if($current_class->isEmpty())
        // {    
        //     // Regular Subject For First Year First Sem Student
        //     $this->patternclss_id=$this->student->patternclass_id;
        //     $this->regular_subjects = $this->get_sem_1_regular_subjects();
        //     dd( $this->regular_subjects);
        // }
        // else
        // {
        //     foreach ($current_class as $classRecord) {

        //         switch ($classRecord->sem) {
        //             case 1:
        //                 $this->patternclss_id=$classRecord->patternclass_id;
        //                 $this->regular_subjects = $this->get_sem_subjects(2);
        //             break;
        //             case 2:
        //                 $this->patternclss_id=$classRecord->patternclass_id;
        //                 $this->regular_subjects = $this->get_sem_subjects(3);
        //             break;
        //             case 3:
        //                 $this->patternclss_id=$classRecord->patternclass_id;
        //                 $this->regular_subjects = $this->get_sem_subjects(4);
        //             break;
        //             case 4:
        //                 $this->patternclss_id=$classRecord->patternclass_id;
        //                 $this->regular_subjects = $this->get_sem_subjects(5);
        //             break;
        //             case 5:
        //                 $this->patternclss_id=$classRecord->patternclass_id;
        //                 $this->regular_subjects = $this->get_sem_subjects(6);
        //             break;
        //             default:
        //                $this->regular_subjects=[];
        //           }
        //     }
        // }
        

        // $this->check_subject_checkboxs($this->regular_subjects);
        

        // // $backlog_subjects= [];
        // // $this->check_subject_checkboxs($backlog_subjects);
        // // $extra_credit_subjects= [];
        return view('livewire.student.student-exam-form.student-exam-form')->extends('layouts.student')->section('student');
    }
}
