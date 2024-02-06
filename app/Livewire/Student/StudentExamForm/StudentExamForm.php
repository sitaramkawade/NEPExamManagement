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


    // public function examform(Request $request)
    // {    
        
    //     $oddevensixsem=false;
    //     $current_active_exam_session=null; 
    //     $extra_credit_subjects=null;
    //     $student= Auth::guard('student')->user();         
    //     $current_active_exam = Exam::Where('status', '1')->get();
    //     $current_active_exam_session=$current_active_exam->first()->exam_sessions;
    //     $current_class_student_entry=$student->currentclassstudent->last();
    //     $not_result_status=$student->currentclassstudent->where('pfstatus','!=','-1')->where('markssheetprint_status','!=','-1');
    //     $backlog_subject_ids=null;
    //     $regular_subjects=null;
    //     $backlog_subject_previous_semester=null;

    //     if($request->input('examform')=="Exam Form")//"Exam Form")
    //     {
    //         if(is_null($current_class_student_entry))//first year sem-I
    //         {
    //             $memberid= $student->memid;//123;
    //            $admission_data= Admissiondata::where('memid',$memberid)->where('patternclass_id',$student->patternclass_id)->get();
    //             if(!$admission_data->isEmpty())
    //             {                        
    //                 if($admission_data->last()->academicyear_id==$current_active_exam->first()->academicyear_id)
    //                 {
                            
    //                     if($current_active_exam_session!=2)
    //                     {
    //                         $regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem','1')->get();
    //                     }
    //                     else
    //                     {
    //                         $backlog_subject_previous_semester=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',1)->get();
    //                         $regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',2)->get();
    //                     }

    //                     $this->backlog_subjects=[];
    //                     $extra_credit_subject_ids = $student->intextracreditbatchseatnoallocations->where('grade','=','NA')->pluck('subject_id');
    //                     $extra_credit_subjects=Extracreditsubject::where('isactive','1')->where('course_type',$student->patternclass->coursepatternclasses->course->course_type)->get();
    //                     $total_extra_credit= $extra_credit_subjects->pluck('subject_credit')->sum();
                             
    //                     return view("student.examform1",compact('student','subjectdata','backsubject','examsession','extracreditsub','backsubjectpreviousem','totalextracredit','oddevensixsem'));
    //                 }
    //                 else
    //                 {
    //                     return back()->with('success','No admission in the current year !!!!!');
    //                 }
    //             }
    //             else
    //             {
    //                 return back()->with('success','Invalid Member ID please Update your profile !!!!!');
    //             }
    //         }
    //         else
    //         {  
    //             switch($current_class_student_entry->sem)
    //             {
    //                 case 1:
    //                     $memberid= $student->memid;
    //                    $admission_data= Admissiondata::where('memid',$memberid)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
    //                     if(!$admission_data->isEmpty())
    //                     {
    //                         if($admission_data->last()->academicyear_id==$current_active_exam->first()->academicyear_id)
    //                         { 
    //                             $regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
    //                             $backlog_subjects=null;
    //                             $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
    //                             $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
    //                         }       
    //                         else
    //                         {
    //                             //fail student
    //                             $regular_subjects=null;
    //                             $regular_subjectsprevious=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
    //                             $a=$regular_subjectsprevious->pluck('id');
    //                             $backlog_subject_previous_semester=Subject::whereIn('id',$a)->get();
    //                         }
    //                     }
    //                     else
    //                     {
    //                         return back()->with('success','Invalid Member ID please Update your profile !!!!!');
    //                     }
    //                 break;
    //                 case 2:  
    //                     $memberid= $student->memid;//123;
    //                    $admission_data= Admissiondata::where('memid',$memberid)->where('patternclass_id',$current_class_student_entry->patternclass_id+1)->get();
    //                     if(!$admission_data->isEmpty())
    //                     {
    //                         if($admission_data->last()->academicyear_id==$current_active_exam->first()->academicyear_id)
    //                         {                       
    //                             $Sem1Data= $student->studentresults->where('sem',$current_class_student_entry->sem-1)->last();
    //                             $Sem2Data= $student->studentresults->where('sem',$current_class_student_entry->sem)->last() ;
    //                             if(is_null($Sem1Data) && is_null($Sem2Data)) //direct to 2nd year admission
    //                             {
    //                                 if($current_class_student_entry->markssheetprint_status=-1)
    //                                 {
    //                                     $regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
    //                                     $backlog_subjects=null;
    //                                     $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
    //                                     $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
    //                                 }
    //                             }
    //                             else if(!(is_null($Sem1Data) && is_null($Sem2Data)))
    //                             {
    //                                 $this->yearresult=$student->getyearresult_examform($Sem1Data,$Sem2Data,$current_class_student_entry);

    //                                 if($this->yearresult==0)
    //                                 {  
    //                                     //fail student
    //                                     $regular_subjects=null;
    //                                     $backlog_subjects=null;
    //                                     $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
    //                                     $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
    //                                 }
    //                                 else
    //                                 {   
    //                                     // regular admitted student
    //                                     if($current_active_exam_session==2)
    //                                     {
    //                                         $backlog_subject_previous_semester=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
    //                                         $regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+2)->get();
    //                                     }
    //                                     else
    //                                     {
    //                                         $regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
    //                                         $backlog_subjects=null;
    //                                         $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
    //                                         $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
    //                                     }
    //                                 }
    //                             }
    //                         }
    //                         else
    //                         {
    //                             //fail student
    //                             $regular_subjects=null;
    //                             $backlog_subjects=null;
    //                             $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
    //                             $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
    //                         }
    //                     }
    //                     else
    //                     {
    //                         $regular_subjects=null;
    //                         $backlog_subjects=null;
    //                         $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
    //                         $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
    //                         if($subdata->isEmpty())
    //                         {
    //                             return back()->with('success','Invalid Member ID please Update your profile !!!!!');
    //                         }             
    //                     }  
    //                 break;
    //                 case 3:
    //                     $memberid= $student->memid;//123;
    //                    $admission_data= Admissiondata::where('memid',$memberid)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();

    //                     if(!$admission_data->isEmpty())
    //                     {
    //                         if($admission_data->last()->academicyear_id==$current_active_exam->first()->academicyear_id)
    //                         {
    //                             $regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
    //                             $backlog_subjects=null;
    //                             $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
    //                             $backlog_subjects=Subject::whereIn('id',$subdata)->get();
    //                         }             
    //                         else
    //                         {
    //                             //fail student
    //                             $regular_subjects=null;
    //                             $regular_subjectsprevious=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
    //                             $a=$regular_subjectsprevious->pluck('id');
    //                             $backlog_subject_previous_semester=null;
    //                             $backlog_subject_previous_semester=Subject::whereIn('id',$a)->get();
    //                         }
    //                     }
    //                     else
    //                     {
    //                         return back()->with('success','Invalid Member ID please Update your profile !!!!!');
    //                     }
    //                 break;
    //                 case 4:
    //                     $memberid= $student->memid;//123;
    //                    $admission_data= Admissiondata::where('memid',$memberid)->where('patternclass_id',$current_class_student_entry->patternclass_id+1)->get();

    //                     if(!$admission_data->isEmpty())
    //                     {
    //                         if($admission_data->last()->academicyear_id==$current_active_exam->first()->academicyear_id)
    //                         { 
    //                             if($not_result_status->isEmpty())
    //                             {
    //                                 $regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
    //                                 $backlog_subjects=null;
    //                                 $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
    //                                 $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
    //                             }

    //                             if($not_result_status->count()==4)
    //                             {
    //                                 $Sem1Data= $student->studentresults->where('sem',1)->last();
    //                                 $Sem2Data= $student->studentresults->where('sem',2)->last() ;
    //                                 if(!(is_null($Sem1Data) && is_null($Sem2Data)))
    //                                 {
    //                                     $this->yearresult=$student->getyearresult_examform($Sem1Data,$Sem2Data,$current_class_student_entry);
                            
    //                                     if($this->yearresult!=1)
    //                                     {   
    //                                         //fail repeater student
    //                                         $regular_subjects=null;
    //                                         $backlog_subjects=null;
    //                                         $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
    //                                         $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
    //                                     }
    //                                     else
    //                                     {
    //                                         $Sem3Data= $student->studentresults->where('sem',3)->last();
    //                                         $Sem4Data= $student->studentresults->where('sem',4)->last() ;

    //                                         if(!(is_null($Sem3Data) && is_null($Sem4Data)))
    //                                         {
    //                                             $this->yearresult=$student->getyearresult_examform($Sem3Data,$Sem4Data,$current_class_student_entry);
                                        
    //                                             if($this->yearresult==0)
    //                                             {   
    //                                                 //fail repeater student
    //                                                 $regular_subjects=null;
    //                                                 $backlog_subjects=null;
    //                                                 $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
    //                                                 $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
    //                                             }
    //                                             else
    //                                             { 
    //                                                 //regular admitted student
    //                                                 if($current_active_exam_session==2)
    //                                                 {   
    //                                                     $oddevensixsem=true;
    //                                                     $backlog_subject_previous_semester=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
    //                                                     $regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+2)->get();
    //                                                 }
    //                                                 else
    //                                                 { 
    //                                                     $regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
    //                                                     $backlog_subjects=null;
    //                                                     $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
    //                                                     $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();          
    //                                                 }
    //                                             }
    //                                         }
    //                                     }
    //                                 }
    //                             }

    //                             if($not_result_status->count()==2)
    //                             {
    //                                 $Sem1Data= $student->studentresults->where('sem',$current_class_student_entry->sem-1)->last();
    //                                 $Sem2Data= $student->studentresults->where('sem',$current_class_student_entry->sem)->last() ;

    //                                 if(!(is_null($Sem1Data) && is_null($Sem2Data)))
    //                                 {
    //                                     $this->yearresult=$student->getyearresult_examform($Sem1Data,$Sem2Data,$current_class_student_entry);
    //                                     if($this->yearresult==0)
    //                                     {   
    //                                         //fail repeater student
    //                                         $regular_subjects=null;
    //                                         $backlog_subjects=null;
    //                                         $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
    //                                         $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
    //                                     }
    //                                     else 
    //                                     {   
    //                                         //regular admitted student
    //                                         $regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
    //                                         $backlog_subjects=null;
    //                                         $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
    //                                         $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
    //                                     }
    //                                 }
    //                                 else
    //                                 { 
    //                                     //fail student
    //                                     $regular_subjects=null;
    //                                     $backlog_subjects=null;
    //                                     $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
    //                                     $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
    //                                 }
    //                             }
    //                         }
    //                         else
    //                         {
    //                             $regular_subjects=null;
    //                             $backlog_subjects=null;
    //                             $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
    //                             $backlog_subjects=Subject::whereIn('id',$subdata)->get();        
    //                             if($subdata->isEmpty())
    //                             {
    //                                 return back()->with('success','Invalid Member ID please Update your profile !!!!!');
    //                             }                 
    //                         }  
    //                     }
    //                     else  
    //                     {
    //                        $admission_data= Admissiondata::where('memid',$memberid)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
    //                         if(!$admission_data->isEmpty())
    //                         {
    //                             $regular_subjects=null;
    //                             $backlog_subjects=null;
    //                         }
    //                         else
    //                         {
    //                             return back()->with('success','Invalid Member ID please Update your profile !!!!!');
    //                         }
    //                     }
    //                 break;  
    //                 case 5:

    //                     //third year sem 5 to sem 6
    //                     $oddevensixsem=true;
    //                     $memberid= $student->memid;//123;
    //                    $admission_data= Admissiondata::where('memid',$memberid)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();

    //                     if(!$admission_data->isEmpty())
    //                     {
    //                         if($admission_data->last()->academicyear_id==$current_active_exam->first()->academicyear_id)
    //                         { 
    //                             $regular_subjects=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
    //                             $backlog_subjects=null;
    //                             $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
    //                             $backlog_subjects=Subject::whereIn('id',$subdata)->get();
    //                         }       
    //                         else
    //                         {
    //                             //fail student
    //                             $regular_subjects=null;
    //                             $regular_subjectsprevious=Subject::whereIn('id',$admission_data->pluck('subject_id'))->where('subject_sem',$current_class_student_entry->sem+1)->get();
    //                             $a=$regular_subjectsprevious->pluck('id');
    //                             $backlog_subject_previous_semester=null;
    //                             $backlog_subject_previous_semester=Subject::whereIn('id',$a)->get();
    //                         }
    //                     }
    //                     else
    //                     {
    //                         return back()->with('success','Invalid Member ID please Update your profile !!!!!');
    //                     }              
    //                 break;      
    //                 case 6:

    //                     $regular_subjects=null;
    //                     $backlog_subjects=null;
    //                     $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
    //                     $backlog_subjects=Subject::whereIn('id',$subdata)->where('patternclass_id',$current_class_student_entry->patternclass_id)->get();
    //                 break;                
    //             }

    //             $extra_credit_subject_ids=$student->intextracreditbatchseatnoallocations->where('grade','=','NA')->pluck('subject_id');

    //             if($student->patternclass->coursepatternclasses->course->course_type=="PG")
    //             {
    //                 if($student->studentadmission->whereIn('academicyear_id',[1,2])->count()>=1 )
    //                 {
    //                     $extra_credit_subjects=Extracreditsubject::where('isactive','0')->where('course_type',$student->patternclass->coursepatternclasses->course->course_type)->get();
    //                     $total_extra_credit= $extra_credit_subjects->pluck('subject_credit')->sum();
    //                 }
    //                 else
    //                 {
    //                     $extra_credit_subjects=Extracreditsubject::where('isactive','1')->where('course_type',$student->patternclass->coursepatternclasses->course->course_type)->get();
    //                     $total_extra_credit= $extra_credit_subjects->pluck('subject_credit')->sum();
    //                 }
    //             }else
    //             {
    //                 $extra_credit_subjects=Extracreditsubject::where('isactive','1')->where('course_type',$student->patternclass->coursepatternclasses->course->course_type)->get();
    //                 $total_extra_credit= $extra_credit_subjects->pluck('subject_credit')->sum();
                
    //             }

    //             return view("student.examform1",compact('student','examsession','currentexam','subjectdata','extracreditsub','backsubjectpreviousem','totalextracredit','oddevensixsem'));     
    //         }
    //     }
    //     else   
    //     {   
    //         // if exam form button on dashboard
    //         // view exam form button on dashboard

    //         $current_active_exam = Exam::Where('status', '1')->get();
    //         $currentprintstatus=$student->examformmaster->where('exam_id', $current_active_exam->first()->id)->first()->printstatus;
    //         if($currentprintstatus==1)
    //         {
    //             return back()->with('success','Your Exam form has already printed');
    //         }

    //         $data=$student->examformmaster->where('exam_id', $current_active_exam->first()->id)->first();
          
    //         $flag=1;
    //         if($student->studentprofile)
    //         {
    //             if ((file_exists(public_path('storage/images/photo/'.$student->studentprofile->profile_photo_path)))||(file_exists(public_path('storage/images/photo/'.$student->studentprofile->sign_photo_path)))) 
    //             {
    //                 $pdf = PDF::loadView('student.printexamform', compact('data','flag'))->setOptions(['images' => true,'defaultFont' => 'sans-serif']);
    //                 $pdf->setPaper('L');
    //                 $pdf->output();
    //                 $canvas = $pdf->getDomPDF()->getCanvas();
    //                 $height = $canvas->get_height();
    //                 $width = $canvas->get_width();
    //                 $canvas->set_opacity(.2,"Multiply");
    //                 $canvas->page_text($width/5, $height/2, 'Print Preview', null,70, array(0,0,0),2,2,-30);
    //                 $canvas->page_text($width/9, $height/3, 'Print Preview', null,70, array(0,0,0),2,2,-30);

    //                 return $pdf->stream('examform.pdf');
    //             }
    //             else
    //             {
    //                 return back()->with('success','Your Photo and sign is not available.Kindly Update your profile');
    //             }
    //         } 
    //         else
    //         {
    //             return back()->with('success','Your Photo and sign is not available.Kindly Update your profile');
    //         }   
    //     }
    // }

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
            'abcid' => ['nullable','numeric','digits:12','unique:students,abcid,'.Auth::guard('student')->user()->id],
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
        // Getting Medium Instruction    
        $medium_instruction = $this->medium_instruction;

        // Getting ABC ID
        $abcid = $this->abcid;

        // Geting Active Exam
        $current_active_exam = Exam::Where('status',1)->get();
        
        // Init Project Fee
        $project_fee=0;

        // Init Backlog External Count
        $backlog_external_count=0;

        // Init Total Backlog Fee
        $total_backlog_fee=0;

        // Init Total Cap Fee
        $total_cap_fee=0;

        // Init Statement Of Marks Fee
        $statement_of_marks_fee=0;
        
        // Init Internal Count
        $internal_count=0;

        // Init Backlog Internal Count
        $backlog_internal_count=0;

        // Init Exam Date
        $exam_date=null;
        
        // Init Exam Session
        $exam_session=null;

        // Init Exam ID
        $exam_id=null;

        // Init SEM
        $sem=null;

        // Getting Course ID
        $course_id=$this->student->patternclass->courseclass->course_id;

        if(is_null($this->student->prn))
        {
            $prn=NULL; 
        }
        else 
        {
            $prn=$this->student->prn;
        }

        // Getting Active Exam
        $exam_data=$this->student->patternclass->exams()->where('launch_status',1)->first();

        if($exam_data)
        {
            $exam_id=$exam_data->id;

        }

        // If Current Class Student Entry
        $current_class_student_entry=$this->student->currentclassstudent->last();

        // Init Max SEM
        $maxsem=0;

        $maxsem=$this->student->currentclassstudent->max('sem');
        dd($maxsem);
        //     $data2=$student->currentclassstudent->where('sem',$maxsem)->first();
            
        //     $datasem=$student->currentclassstudent->where('pfstatus','!=','-1')->where('markssheetprint_status','!=','-1');
    

        // //dd($datasem);
        // if(is_null($data2))
        // {//first year sem-I
        //     $sem=1;
        //         $examdata=$student->patternclass->exams()->where('launch_status','1')->first();//->get();
        //         $exam_id=$examdata->id;
                
        //         $exam_session=$examdata->exam_sessions;
        //         $patternclass_id= $student->patternclass->id; 
        //         $exam_date=ExamPatternclass::where('exam_id',$exam_id)->where('patternclass_id', $patternclass_id)->get()->first();
        //         //dd($exam_date);        
        //         $feedata=$student->patternclass->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
        //         $memberid= $student->memid;//123;
        //         //$adsubjectdata=Admissiondata::with(['subject'])->where('memid',$memberid)->get();
        //         $adsubjectdata= Admissiondata::where('memid',$memberid)
        //         ->where('patternclass_id',$patternclass_id)
        //         ->where('academicyear_id',$currentexam->first()->academicyear_id)
        //         ->get();
            
        //     if(!$adsubjectdata->isEmpty())
        //         {
        //             $currentadmission=true;
        //         }
        //         else{$currentadmission=false;}
        // }
        // else
        // {
        //     if(($student->patternclass->coursepatternclasses->course->course_type=='PG' and $data2->sem==4)
        //     || ($student->patternclass->coursepatternclasses->course->course_type=='UG' and $data2->sem==6))
        // {
        //     $currentadmission=false;
        // } else{
        //                 $memberid= $student->memid;//123;
        //                 //$adsubjectdata=Admissiondata::with(['subject'])->where('memid',$memberid)->get();
        //                 $adsubjectdata= Admissiondata::where('memid',$memberid)
        //                 ->where('patternclass_id',$data2->patternclass_id+1)
        //                 ->where('academicyear_id',$currentexam->first()->academicyear_id)
        //                 ->get();
                    
        //             if(!$adsubjectdata->isEmpty())
        //                 {
        //                     $currentadmission=true;
        //                 }
        //                 else{$currentadmission=false;}
        //             }


        //     // $exampatternclass= ExamPatternclass::where('launch_status',1)->where('patternclass_id', $this->patternclss_id)->first();
        //     // if( $exampatternclass)
        //     // {

        //     //     $examorderData = [
        //     //         'medium_instruction' => $this->medium_instruction,
        //     //         'totalfee' => 0,
        //     //         'student_id' => $this->student->id,
        //     //         'college_id' => $this->student->college_id,
        //     //         'exam_id' => $exampatternclass->exam_id,
        //     //         'patternclass_id' => $exampatternclass->patternclass_id,
        //     //     ];
                
        //     //     $examorder = Examformmaster::create($examorderData);
        //     // }
        //     // else
        //     // {
        //     //     $this->dispatch('alert',type:'error',message:'Exam Not Lounched For This Pattern Class !!');
        //     // }

        //     //    $examformmaster= new StudentExamforms;

       
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

        return view('livewire.student.student-exam-form.student-exam-form')->extends('layouts.student')->section('student');
    }

    public function saveexamform(Request $request)
    { $oddevensixsem=false;
            
                $mediumofans=$request->input('mediumofans');
                //$abcid=trim($request->input('abcid'));
    
                $currentexam = Exam::Where('status', '1')->get();
                
        //dd($request->input('extracrd'));//." ".$request->input('sub'));
        $projectfee=0;//for SYBBA CA
        $student= Auth::guard('student')->user(); 
        $course_id=$student->patternclass->coursepatternclasses->course_id;
        //$examdata=$student->patternclass->exams()->where('launch_status','1')->first();//->get();
        //$exam_id=$examdata->id;
        $backlog_external_count=0;
        $total_backlog_fee=0;
                 $total_cap_fee=0;$somfeedata=0;
                $internal_count=0;$$backlog_internal_count=0;
            $student= Auth::guard('student')->user();
            $exam_date=null;
            $exam_session=null;$exam_id=null;
            $sem=null;
            if(is_null($student->prn))
                    $prn=NULL; 
            else $prn=$student->prn;
    
            //$data2=$student->currentclassstudent->last();
            $maxsem=0;
            $maxsem=$student->currentclassstudent->max('sem');
            $data2=$student->currentclassstudent->where('sem',$maxsem)->first();
            
            $datasem=$student->currentclassstudent->where('pfstatus','!=','-1')->where('markssheetprint_status','!=','-1');
            
        
            //dd($datasem);
            if(is_null($data2))
            {//first year sem-I
                $sem=1;
                    $examdata=$student->patternclass->exams()->where('launch_status','1')->first();//->get();
                    $exam_id=$examdata->id;
                    
                    $exam_session=$examdata->exam_sessions;
                    $patternclass_id= $student->patternclass->id; 
                    $exam_date=ExamPatternclass::where('exam_id',$exam_id)->where('patternclass_id', $patternclass_id)->get()->first();
                    //dd($exam_date);        
                    $feedata=$student->patternclass->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
                    $memberid= $student->memid;//123;
                    //$adsubjectdata=Admissiondata::with(['subject'])->where('memid',$memberid)->get();
                    $adsubjectdata= Admissiondata::where('memid',$memberid)
                    ->where('patternclass_id',$patternclass_id)
                    ->where('academicyear_id',$currentexam->first()->academicyear_id)
                    ->get();
                
                if(!$adsubjectdata->isEmpty())
                    {
                        $currentadmission=true;
                    }
                    else{$currentadmission=false;}
            }
            else
            {
                if(($student->patternclass->coursepatternclasses->course->course_type=='PG' and $data2->sem==4)
                || ($student->patternclass->coursepatternclasses->course->course_type=='UG' and $data2->sem==6))
            {
                $currentadmission=false;
            } else{
                            $memberid= $student->memid;//123;
                            //$adsubjectdata=Admissiondata::with(['subject'])->where('memid',$memberid)->get();
                            $adsubjectdata= Admissiondata::where('memid',$memberid)
                            ->where('patternclass_id',$data2->patternclass_id+1)
                            ->where('academicyear_id',$currentexam->first()->academicyear_id)
                            ->get();
                        
                        if(!$adsubjectdata->isEmpty())
                            {
                                $currentadmission=true;
                            }
                            else{$currentadmission=false;}
                        }
    
            switch($data2->sem)
            {
                case 1:
                    $sem=2;
                    $examdata=$student->patternclass->exams()->where('launch_status','1')->first();//->get();
                    $exam_id=$examdata->id;
                    $pc=PatternClass::where('id',$data2->patternclass_id)->first();
                            
                    $exam_session=$examdata->exam_sessions;
                    $patternclass_id= $data2->patternclass->id; 
                    $exam_date=ExamPatternclass::where('exam_id',$exam_id)->where('patternclass_id', $patternclass_id)->get()->first();
                    
                    $feedata=$pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
                    //dd($feedata);
                    break;
                
                case 2:
                        $Sem1Data= $student->studentresults->where('sem',$data2->sem-1)->last();
                        $Sem2Data= $student->studentresults->where('sem',$data2->sem)->last() ;
                        if(is_null($Sem1Data) && is_null($Sem2Data)) //direct to 2nd year admission
                        {
                            if($data2->markssheetprint_status==-1)
                            {
                            
                                $sem=$data2->sem+1;
                                $pc=PatternClass::where('id',$data2->patternclass_id+1)->first();
                                        
                                $examdata=$pc->exams()->where('launch_status','1')->first();
                                $exam_id=$examdata->id;
                                $exam_session=$examdata->exam_sessions;
                                        
                                $patternclass_id=$pc->id;
                            
                                $exam_date=ExamPatternclass::where('exam_id',$exam_id)->where('patternclass_id', $patternclass_id)->get()->first();
                                $backfeedata=Examfeecourse::where('patternclass_id', $data2->patternclass_id)->where('examfees_id','13')->first();
                
                                $feedata=$pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
    
                                    
                            }
                        }
                        else if(!(is_null($Sem1Data) && is_null($Sem2Data)))
                        {
                            $this->yearresult=$student->getyearresult_examform($Sem1Data,$Sem2Data,$data2);
                    
                            if($this->yearresult==0 || $currentadmission==false)//fail repeater student
                            {
                            // $examdata=$data2->patternclass->exams()->where('launch_status','1')->first();
                                //$pc=$data2->patternclass_id;
    
                                $sem=$data2->sem;
                                $pc=PatternClass::where('id',$data2->patternclass_id)->first();
                                        
                                $examdata=$pc->exams()->where('launch_status','1')->first();
                                $exam_id=$examdata->id;
                                $exam_session=$examdata->exam_sessions;
                                        
                                $patternclass_id=$pc->id;
                            
                                $exam_date=ExamPatternclass::where('exam_id',$exam_id)->where('patternclass_id', $patternclass_id)->get()->first();
                                $backfeedata=Examfeecourse::where('patternclass_id', $data2->patternclass_id)->where('examfees_id','13')->first();
                
                                $feedata=$pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
    
                            }
                        
                            else //regular admitted student
                            { 
                                $sem=$data2->sem+1;
                                $pc=PatternClass::where('id',$data2->patternclass_id+1)->first();
                                        
                                $examdata=$pc->exams()->where('launch_status','1')->first();
                                $exam_id=$examdata->id;
                                $exam_session=$examdata->exam_sessions;
                                        
                                $patternclass_id=$pc->id;
                            
                                $exam_date=ExamPatternclass::where('exam_id',$exam_id)->where('patternclass_id', $patternclass_id)->get()->first();
                                $backfeedata=Examfeecourse::where('patternclass_id', $data2->patternclass_id)->where('examfees_id','13')->first();
                
                                $feedata=$pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
    
                            } 
                        }
                    
                    break;
                case 3: 
                    $sem=4;
                    $examdata=$student->patternclass->exams()->where('launch_status','1')->first();//->get();
                    $exam_id=$examdata->id;
                    $pc=PatternClass::where('id',$data2->patternclass_id)->first();
                            
                    $exam_session=$examdata->exam_sessions;
                    $patternclass_id= $data2->patternclass->id; 
                    $exam_date=ExamPatternclass::where('exam_id',$exam_id)->where('patternclass_id', $patternclass_id)->get()->first();
                    
                    $feedata=$pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
                    //dd($feedata);
                    break;
                case 4: //dd($datasem->count());
                    if($datasem->isEmpty())
                    {
                        //direct ty admission
                        $sem=$data2->sem+1;
                                            $pc=PatternClass::where('id',$data2->patternclass_id+1)->first();
                                        //dd($data2->patternclass_id);
                                            $examdata=$pc->exams()->where('launch_status','1')->first();
                                        //dd($examdata);
                                            $exam_id=$examdata->id;
                                            $exam_session=$examdata->exam_sessions;
                                        
                                            $patternclass_id=$pc->id;
                                        // dd($patternclass_id);
                                            $exam_date=ExamPatternclass::where('exam_id',$exam_id)->where('patternclass_id', $patternclass_id)->get()->first();
                                            $backfeedata=Examfeecourse::where('patternclass_id', $data2->patternclass_id)->where('examfees_id','13')->first();
                                        // dd($backfeedata);
                                            $feedata=$pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
                            
                    }
                    if($datasem->count()==4)
                            {
                            $Sem1Data= $student->studentresults->where('sem',1)->last();
                            $Sem2Data= $student->studentresults->where('sem',2)->last() ;
    
                            if(!(is_null($Sem1Data) && is_null($Sem2Data)))
                            {
                                $this->yearresult=$student->getyearresult_examform($Sem1Data,$Sem2Data,$data2);
                        
                                if($this->yearresult!=1 || $currentadmission==false)//fail repeater student
                                {  //dd("OK");
                                    //$examdata=$data2->patternclass->exams()->where('launch_status','1')->first();
                                    //$pc=$data2->patternclass_id;
    
                                    $sem=$data2->sem;
                                    $pc=PatternClass::where('id',$data2->patternclass_id)->first();
                                
                                    $examdata=$pc->exams()->where('launch_status','1')->first();
                                // dd($examdata);
                                    $exam_id=$examdata->id;
                                    $exam_session=$examdata->exam_sessions;
                                
                                    $patternclass_id=$pc->id;
                                // dd($patternclass_id);
                                    $exam_date=ExamPatternclass::where('exam_id',$exam_id)->where('patternclass_id', $patternclass_id)->get()->first();
                                    $backfeedata=Examfeecourse::where('patternclass_id', $data2->patternclass_id)->where('examfees_id','13')->first();
                                // dd($backfeedata);
                                    $feedata=$pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
                                    
                                }
                                else{ 
                                    $Sem3Data= $student->studentresults->where('sem',3)->last();
                                    $Sem4Data= $student->studentresults->where('sem',4)->last() ;
                                    if(!(is_null($Sem3Data) && is_null($Sem4Data)))
                                    {
                                        $this->yearresult=$student->getyearresult_examform($Sem3Data,$Sem4Data,$data2);
                                    
                                        if($this->yearresult==0 || $currentadmission==false)//fail repeater student
                                        {   // dd("LL".$this->yearresult);
                                            //$examdata=$data2->patternclass->exams()->where('launch_status','1')->first();
                                            //$pc=$data2->patternclass_id;
                                            $sem=$data2->sem;
                                            $pc=PatternClass::where('id',$data2->patternclass_id)->first();
                                        
                                            $examdata=$pc->exams()->where('launch_status','1')->first();
                                        // dd($examdata);
                                            $exam_id=$examdata->id;
                                            $exam_session=$examdata->exam_sessions;
                                        
                                            $patternclass_id=$pc->id;
                                        // dd($patternclass_id);
                                            $exam_date=ExamPatternclass::where('exam_id',$exam_id)->where('patternclass_id', $patternclass_id)->get()->first();
                                            $backfeedata=Examfeecourse::where('patternclass_id', $data2->patternclass_id)->where('examfees_id','13')->first();
                                        // dd($backfeedata);
                                            $feedata=$pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
                            
                                        }
                                        else{ //dd("PP");
                                            
                                
                                            $pc=PatternClass::where('id',$data2->patternclass_id+1)->first();
                                        //dd($data2->patternclass_id);
                                            $examdata=$pc->exams()->where('launch_status','1')->first();
                                        //dd($examdata);
                                            $exam_id=$examdata->id;
                                            $exam_session=$examdata->exam_sessions;
                                        
                                            $patternclass_id=$pc->id;
                                        // dd($patternclass_id);
                                            $exam_date=ExamPatternclass::where('exam_id',$exam_id)->where('patternclass_id', $patternclass_id)->get()->first();
                                            $backfeedata=Examfeecourse::where('patternclass_id', $data2->patternclass_id)->where('examfees_id','13')->first();
                                        // dd($backfeedata);
                                            $feedata=$pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
                                            if($exam_session==2)  {$sem=6;$oddevensixsem=true;}
                                            else{
                                                $sem=$data2->sem+1;
                                            }
                                        }
                                }
                            }
                        }
                    }
                            else  if($datasem->count()==2)
                            {
                            $Sem1Data= $student->studentresults->where('sem',$data2->sem-1)->last();
                            $Sem2Data= $student->studentresults->where('sem',$data2->sem)->last() ;
                            if(!(is_null($Sem1Data) && is_null($Sem2Data)))
                            {
                                $this->yearresult=$student->getyearresult_examform($Sem1Data,$Sem2Data,$data2);
                        
                                if($this->yearresult==0 || $currentadmission==false)//fail repeater student
                                {
                                    //$examdata=$data2->patternclass->exams()->where('launch_status','1')->first();
                                    //$pc=$data2->patternclass_id;
                                    $sem=$data2->sem;
                                    $pc=PatternClass::where('id',$data2->patternclass_id)->first();
                                
                                    $examdata=$pc->exams()->where('launch_status','1')->first();
                                // dd($examdata);
                                    $exam_id=$examdata->id;
                                    $exam_session=$examdata->exam_sessions;
                                
                                    $patternclass_id=$pc->id;
                                // dd($patternclass_id);
                                    $exam_date=ExamPatternclass::where('exam_id',$exam_id)->where('patternclass_id', $patternclass_id)->get()->first();
                                    $backfeedata=Examfeecourse::where('patternclass_id', $data2->patternclass_id)->where('examfees_id','13')->first();
                                // dd($backfeedata);
                                    $feedata=$pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
                    
                                }
                            
                                else //regular admitted student
                                { 
                                    $sem=$data2->sem+1;
                                
                                    $pc=PatternClass::where('id',$data2->patternclass_id+1)->first();
                                
                                    $examdata=$pc->exams()->where('launch_status','1')->first();
                                // dd($examdata);
                                    $exam_id=$examdata->id;
                                    $exam_session=$examdata->exam_sessions;
                                
                                    $patternclass_id=$pc->id;
                                // dd($patternclass_id);
                                    $exam_date=ExamPatternclass::where('exam_id',$exam_id)->where('patternclass_id', $patternclass_id)->get()->first();
                                    $backfeedata=Examfeecourse::where('patternclass_id', $data2->patternclass_id)->where('examfees_id','13')->first();
                                // dd($backfeedata);
                                    $feedata=$pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
                    
                                } 
                                }
                            }
                    break;
                case 5:
                    $sem=6;$oddevensixsem=true;
                    $examdata=$student->patternclass->exams()->where('launch_status','1')->first();//->get();
                    $exam_id=$examdata->id;
                    $pc=PatternClass::where('id',$data2->patternclass_id)->first();
                            
                    $exam_session=$examdata->exam_sessions;
                    $patternclass_id= $data2->patternclass->id; 
                    $exam_date=ExamPatternclass::where('exam_id',$exam_id)->where('patternclass_id', $patternclass_id)->get()->first();
                    
                    $feedata=$pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
                    //dd($feedata);
                    break;
                    case 6:
                        $sem=6;$oddevensixsem=true;
                        $examdata=$student->patternclass->exams()->where('launch_status','1')->first();//->get();
                    $exam_id=$examdata->id;
                    $pc=PatternClass::where('id',$data2->patternclass_id)->first();
                            
                    $exam_session=$examdata->exam_sessions;
                    $patternclass_id= $data2->patternclass->id; 
                    $exam_date=ExamPatternclass::where('exam_id',$exam_id)->where('patternclass_id', $patternclass_id)->get()->first();
                    
                    $feedata=$pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
                    //dd($feedata);
                    
            }
            }
        // dd($sem);
            $extracrd=$request->input('extracrd');
            // dd($extracrd);
            $totalextracredit=0;
        
            if(($student->patternclass->coursepatternclasses->course->course_type=='PG' and $sem==4)
            || ($student->patternclass->coursepatternclasses->course->course_type=='UG' and $sem==6))
            {
                $excrsubid=$student->intextracreditbatchseatnoallocations->where('grade','!=','NA')->pluck('intbatch_id');
            
            $intbatch=$student->intextracreditbatchseatnoallocations->where('grade','!=','NA');
            $allintbatch=Internalmarksextracreditbatch::whereIn('id',$intbatch->pluck('intbatch_id'))->get();
            $totalextracredit=Extracreditsubject::whereIn('id',$allintbatch->pluck('subject_id'))->sum('subject_credit');
            
            
            
            if(isset($extracrd))
                {
                //  dd($request->input('extracrd'));
    
                    $extracreditsub=Extracreditsubject::whereIn('id',$extracrd)->get();
                    $totalextracredit+=$extracreditsub->pluck('subject_credit')->sum();
                    
                }
                if($totalextracredit<4)
                return redirect()->route('student.dashboard')->with('success','Please select extra credit subjects!!!!!!!');
    
            }
            
                $subbacklog= $request->input('subbacklog');
                $backsubcount=0;
            // dd($subbacklog);
                if(isset($subbacklog))
                {   $backlogpatternclass=Subject::whereIn('id',$subbacklog)->distinct()->pluck('patternclass_id');
            
                    $semflag1=0; $capfee=0;
                    $semarray=array();
                
                    $count=null;
                // dd($subbacklog);
                foreach($request->input('subbacklog') as $subject_id)
                {
                    $subject=Subject::find($subject_id);
                    
                    
                    $failstatus=$subject->checkstatus($student);
                    //if($failstatus=="G") dd("LL");
                // if($subject->subject_sem%2==$exam_session) //odd sem internal logic
                    { //internal
                    if( $failstatus=="G" || $failstatus=="IG"|| $failstatus=="I" ||$failstatus=="IP" ||$failstatus=="IINTP" ||$failstatus=="INTP" ||$failstatus=="IE" ||$failstatus=="IEG" || $failstatus=="IEINTP" || $failstatus=="EINTP") 
                    {
                        $internal_count++;$$backlog_internal_count++;
                    }}
                    //external
                    if($failstatus=="E"||$failstatus=="P" ||$failstatus=="EG" || $failstatus=="EINTP" || $failstatus=="IE"|| $failstatus=="EG" || $failstatus=="IP" || $failstatus=="IEINTP") 
                    {  $backlog_external_count++;//total external backlog subject
                    //dd("LLLL");
                        $backsubfee=$subject->patternclass->exambacklogfeecourses->where('sem',$subject->subject_sem)->where('active_status','1')->first()->backlogfee;
                        // dd("LL".$backsubfee);
                        $total_backlog_fee=$totalbacklogfee+$backsubfee;
                        $semarray[$subject->subject_sem]=$subject->subject_sem;
                        if($subject->patternclass_id!=$patternclass_id)
                        {
                            $backsubcount++; 
                        }
    
                    }//practical
            
                }
        // dd($internal_count);
                }
            
    
            //$backlog_external_count=null;
            
            
            $intsub=$request->input('internal');
        //dd($intsub);
            if(isset($intsub))
                $internal_count=$internal_count+count($request->input('internal'));//internal
            $grade=$request->input('grade');
            if(isset($grade))
                $internal_count=$internal_count+count($request->input('grade'));//grade subject
            
                $extracrdsub=$request->input('extracrd');
            if(isset($extracrdsub))
                    $internal_count=$internal_count+count($request->input('extracrd'));//extra credit subject
                //dd( $internal_count);    
            if($backlog_external_count!=0)
            { //dd($backlogpatterclass->count());
            $previous_patternclass_id=$data2->patternclass->id;
            $capfeedata=$data2->patternclass->examfeecourses()->where('patternclass_id', $previous_patternclass_id)->where('examfees_id','3')->get('fee')->first();
            //dd($capfeedata)  ;   
             $total_cap_fee=count($semarray)*$capfeedata->fee;      
            // dd( $total_cap_fee);
            if($backlogpatternclass->count()!=0)
            {   $statement_of_marks_fee1=$data2->patternclass->examfeecourses()->where('patternclass_id', $previous_patternclass_id)->where('examfees_id','4')->get('fee')->first();
            
                    $statement_of_marks_fee=$somfeedata1->fee*($backlogpatternclass->count());
                
                }
            // $total_cap_fee ;
        }  
        //    else if($backlog_external_count==0)
        //    {  
        //        if($$backlog_internal_count>=1)
        //        {
        //         $previous_patternclass_id=$data2->patternclass->id;
            
        //         $statement_of_marks_fee1=$data2->patternclass->examfeecourses()->where('patternclass_id', $previous_patternclass_id)->where('examfees_id','4')->get('fee')->first();
                
        //          $statement_of_marks_fee=$somfeedata1->fee;
        //        }
        //    }
        $subbacklog1=$request->input('subbacklog1');// in a year sem 1 exam not given,both sem subject is on sem 2 exam form
        //  dd( $subbacklog1);
        if(isset($subbacklog1))
        {
            //dd(count($backexternalsub));
            //dd($sem." ".$patternclass_id);
            $backsubfee=Exambacklogfeecourse::where('sem',$sem)->where('patternclass_id',$patternclass_id)->where('active_status','1')->first()->backlogfee;
        
        $total_backlog_fee=$totalbacklogfee+$backsubfee*count($subbacklog1);
            //dd("LL".$totalbacklogfee);
        $previous_patternclass_id=$patternclass_id;
            $capfeedata=Examfeecourse::where('patternclass_id', $previous_patternclass_id)->where('examfees_id','3')->get('fee')->first();
            // dd($capfeedata)  ;   
             $total_cap_fee= $total_cap_fee+$capfeedata->fee;      
            // dd( $total_cap_fee);  
        }
        $totalfee=0; 
        $examfees_id=collect(); 
        $fee_amount=collect();     
        $currentdate=Carbon::now();
        
        //dd($sem);
        foreach ($feedata as $fee)
        {
        
    
            if($fee->examfeemaster->fee_type=="Internal Marks Fee")
            { //dd($student);
            //  dd();
                $amount=$fee->fee*$internal_count;
                if($amount>0)
                $amount-= $student->studentextracreditexamforms->where('exam_id','8')
                ->whereIn('subject_id',$extracrdsub)->count()* $fee->fee;
                
                }
            else 
                $amount=$fee->fee;
            
            if($fee->examfeemaster->fee_type=="Exam Fee")
        {
                if(isset($intsub))
                        $amount=$fee->fee+$totalbacklogfee;
    
                else    $amount=$totalbacklogfee;
                //dd($amount);
        }
                if($fee->examfeemaster->fee_type=="Project Fee/Dissertation")
                {  
                    $project=$request->input('project');// in a year sem 1 exam not given,both sem subject is on sem 2 exam form
                    if(isset($project))
                    // if(($patternclass_id==20 or $patternclass_id==40 or $patternclass_id==70 or $patternclass_id==72 or $patternclass_id==74) and $sem==4) 
                            $amount=$fee->fee;
    
                    else    $amount=0;
                }
                if($fee->examfeemaster->fee_type=="Passing Certificate Fee")
                {  //dd($sem);
                    if(($student->patternclass->coursepatternclasses->course->course_type=='PG' && $sem==4) 
                        ||($student->patternclass->coursepatternclasses->course->course_type=='UG' && $sem==6))
                            $amount=$fee->fee;
    
                    else    $amount=0;
                }  
            if($fee->examfeemaster->fee_type=="CAP Fee")
            {
                if($patternclass_id==54 and $sem==4)//MCS 2 Sem 4
                    $amount= $total_cap_fee;
            else if(isset($intsub))
                    $amount=$fee->fee+ $total_cap_fee; 
                else  
                $amount= $total_cap_fee; 
            //  dd($somfeedata);
            }
        if($fee->examfeemaster->fee_type=="Statement of Marks Fee")
        {
            $extracrd=$request->input('extracrd');
            if($student->patternclass->coursepatternclasses->course->course_type=='PG') 
                $amount=$fee->fee;
                else  if (($somfeedata==0)&&(isset($intsub) || isset($extracrd)))//|| isset($subbacklog)|| isset($subbacklog1))
                    $amount=$fee->fee+$somfeedata; 
                
        }
        
        if($fee->examfeemaster->fee_type=="EVS Fee" && $currentadmission==true)
        { 
            $amount=$fee->fee;
        }else   
        if($fee->examfeemaster->fee_type=="EVS Fee" && $currentadmission==false)
        $amount=0;
            if($fee->examfeemaster->fee_type=="Late Fee")// and $fee->examfeemaster->fee_type!="Fine Fee")
                {
                //  dd("LL".$exam_date);
                // dd($currentdate->gte($exam_date->end_date)." CR ".$currentdate." LD".$exam_date->end_date) ;  
                if (isset($intsub))
                {
                    if($currentdate->gte($exam_date->end_date) and $currentdate->lte($exam_date->latefee_date) )
                        $amount=$fee->fee; 
                    else  $amount=0;
                }
                else{    //fy repeater student late fee date  apply sy late fee date 
                            $epc=ExamPatternclass::where('patternclass_id',($patternclass_id))->where('exam_id',$exam_id)->first();
                            //dd($epc);
                            if($currentdate->gte($epc->end_date) and $currentdate->lte($epc->latefee_date) )
                                { $amount=$fee->fee; }
                            else  $amount=0;
                }
                    //  else if($currentdate->gte($exam_date->latefee_date))
                    //         $amount=0;
                    //  else if($currentdate->lte($exam_date->end_date))
                                
                    
                }
                if($fee->examfeemaster->fee_type=="Fine Fee")// and $fee->examfeemaster->fee_type!="Late Fee")
                {
                    if (isset($intsub))
                    {
                        if($currentdate->gt($exam_date->latefee_date) and $currentdate->lte($exam_date->finefee_date))
                            $amount=$fee->fee;  
                        else
                            $amount=0;  
                    }
                    else{    //fy repeater student late fee date  apply sy late fee date 
                        $epc=ExamPatternclass::where('patternclass_id',($patternclass_id))->where('exam_id',$exam_id)->first();
                        //dd($epc);
                        if($currentdate->gte($epc->latefee_date) and $currentdate->lte($epc->finefee_date) )
                            { $amount=$fee->fee; }
                        else  $amount=0;
            }
    
                }
                if($fee->examfeemaster->fee_type=="Backlog Subject Exam Fee")
                        $amount=0;
                        
                        $examfees_id->push($fee->examfeemaster->id);
                        $fee_amount->push($amount);
                        
                        $totalfee=$totalfee+$amount;
    
                
        }
        // $insertid=$student->examformmaster->last()->id;
        //    $examformmaster=Examformmaster::find($insertid);
        //    $values = $totalfee;// array('totalfee'=>$request->input('totalfee'));
                
        //    $examformmaster->update($values);
        //dd($exam_id);
        $insertid=null;
        $valuesexam = array(
            'student_id'=>$student->id,'patternclass_id'=>$patternclass_id,
        'totalfee'=>$totalfee, 'exam_id'=>$exam_id);
            try{  
                $applicationform=$student->examformmaster()->create($valuesexam);
            $insertid=$applicationform->id;
            // dd($insertid);
            //Examformmaster::insertGetId($valuesexam);
            }
            catch(Exception $e)
                {
                    //dd($e);
                }
        
        $i=0;
        if(!is_null($insertid))
        {
        foreach($examfees_id as $examfee_id)
        {
                $values = array('examformmaster_id'=> $insertid,
                'examfees_id'=>$examfee_id,'fee_amount'=>$fee_amount[$i] );
        
                //echo $examfee_id." ".$fee_amount[$i]; 
                $i++;
                Studentexamformfee::insert($values);
        }
        // dd("ll=>".count($subbacklog));
        // dd($subbacklog);
        //if(count($request->input('subbacklog'))!=0) //add backlog subject into student examform
        if(isset($subbacklog))   
        { // dd("PP");
        foreach($request->input('subbacklog') as $subject_id)
        { 
            $subject=Subject::find($subject_id);
            $failstatus=$subject->checkstatus($student);
        // dd($failstatus);
        //  if($subject->subject_sem==$exam_session)//odd sem internal logic
            {
            //internal
                    if($failstatus=="I" ) //||$failstatus=="IP"||$failstatus=="IE" || $failstatus=="IEP"
                    {
                        $values = array('prn'=>$prn,'subject_id'=>$subject_id,
            'int_status' =>'1','ext_status'=>'0','exam_id'=>$exam_id,'examformmaster_id'=> $insertid);
    
                    }
                }
                    if($failstatus=="E" ) //||$failstatus=="IP"||$failstatus=="IE" || $failstatus=="IEP"
                    {
                        $values = array('prn'=>$prn,'subject_id'=>$subject_id,
            'int_status' =>'0','ext_status'=>'1','exam_id'=>$exam_id,'examformmaster_id'=> $insertid);
    
                    }
        if($failstatus=="IE" or $failstatus=="IP" or $failstatus=="IJ")
        { 
        // if(($subject->subject_sem%2==$exam_session%2  and  $subject->patternclass_id<39) or ($oddevensixsem==true))//odd sem internal logic
                $int_status=1; 
        // else if($subject->patternclass_id>=1 ) $int_status=1; 
        // else $int_status=0;
    
            $values = array('prn'=>$prn,'subject_id'=>$subject_id,
            'int_status' =>$int_status,'ext_status'=>'1','exam_id'=>$exam_id,'examformmaster_id'=> $insertid);
        //dd($values);
        // StudentExamform::insert($values);
        }
        if($failstatus=="EINTP")
        {
            //if(($subject->subject_sem%2==$exam_session%2 and  $subject->patternclass_id<39)or ($oddevensixsem==true))//odd sem internal logic
            $int_practical_status=1; 
        // else if($subject->patternclass_id>=39  )  $int_practical_status=1; 
        //  else $int_practical_status=0;
    
            $values = array('prn'=>$prn,'subject_id'=>$subject_id,
            'int_practical_status'=>$int_practical_status,'ext_status'=>'1','exam_id'=>$exam_id,'examformmaster_id'=> $insertid);
    
        // StudentExamform::insert($values);
        }
        if($failstatus=="IEINTP")
        { 
        //   if(($subject->subject_sem%2==$exam_session%2 and   $subject->patternclass_id<1)or ($oddevensixsem==true))//odd sem internal logic
            {
            $int_status=1;  $int_practical_status=1;
            }
        //  else if($subject->patternclass_id>=1 ) 
            {
        //      $int_status=1;  $int_practical_status=1;
            }
        //  else
        { //$int_status=0; $int_practical_status=0;
            }
            $values = array('prn'=>$prn,'subject_id'=>$subject_id,
            'int_status' => $int_status,'int_practical_status'=>$int_practical_status,'ext_status'=>'1','exam_id'=>$exam_id,'examformmaster_id'=> $insertid);
        //dd($values);
            //StudentExamform::insert($values);
        }
        if($failstatus=="IINTP")
        { 
        //  if(($subject->subject_sem%2==$exam_session%2  and $subject->patternclass_id<1 )or ($oddevensixsem==true))//odd sem internal logic
            {
            $int_status=1;  $int_practical_status=1;
            }
        //    else if($subject->patternclass_id>=39 ) 
            { //$int_status=1;  $int_practical_status=1;
            }
        // else
        { //$int_status=0; $int_practical_status=0;
            }
            $values = array('prn'=>$prn,'subject_id'=>$subject_id,
            'int_status' => $int_status,'int_practical_status'=>$int_practical_status,'ext_status'=>'0','exam_id'=>$exam_id,'examformmaster_id'=> $insertid);
        //dd($values);
            //StudentExamform::insert($values);
        }
        if($failstatus=="INTP")
        { 
        // if(($subject->subject_sem%2==$exam_session%2  and $subject->patternclass_id<1) or ($oddevensixsem==true))//odd sem internal logic
            $int_practical_status=1; 
        // else if($subject->patternclass_id>=39 ) 
            {//$int_practical_status=1; 
            }
        //  else $int_practical_status=0;
    
            $values = array('prn'=>$prn,'subject_id'=>$subject_id,
            'int_practical_status'=>$int_practical_status,'exam_id'=>$exam_id,'examformmaster_id'=> $insertid);
        //dd($values);
            //StudentExamform::insert($values);
        }
        if($failstatus=="G" or $failstatus=="IG" )
        {
            
                $grade_status=1;
            
            $values = array('prn'=>$prn,'subject_id'=>$subject_id,
            'int_status'=>'0', 'ext_status'=>'0',
                'grade_status'=>$grade_status,'exam_id'=>$exam_id,'examformmaster_id'=> $insertid);
        
                //StudentExamform::insert($values);
        }
        if($failstatus=="IEG" )
        { 
        
                $int_status=1; 
    
            $values = array('prn'=>$prn,'subject_id'=>$subject_id,
            'int_status' =>'1','ext_status'=>'1','exam_id'=>$exam_id,'examformmaster_id'=> $insertid);
        //dd($values);
        // StudentExamform::insert($values);
        }
        if( $failstatus=="EG")
        { 
        
                $int_status=0; 
    
            $values = array('prn'=>$prn,'subject_id'=>$subject_id,
            'int_status' =>$int_status,'ext_status'=>'1','exam_id'=>$exam_id,'examformmaster_id'=> $insertid);
        //dd($values);
        // StudentExamform::insert($values);
        }
        if($failstatus=="P") //practical backlog UG logic
        {
            $values = array('prn'=>$prn,'subject_id'=>$subject_id,
            'int_status'=>'0', 'ext_status'=>'1', 'project_status' =>'0','exam_id'=>$exam_id,'examformmaster_id'=> $insertid);
        
            //    StudentExamform::insert($values);
        }
        // if($failstatus=="J") //Project backlog UG logic
        // {
        //     $values = array('prn'=>$prn,'subject_id'=>$subject_id,
        //     'int_status'=>'0', 'ext_status'=>'1', 'project_status' =>'0','exam_id'=>$exam_id,'examformmaster_id'=> $insertid);
        
        //     //    StudentExamform::insert($values);
        // }
        if($failstatus=="O") //for Oral
        {
            $values = array('prn'=>$prn,'subject_id'=>$subject_id,
            'int_status'=>'0', 'ext_status'=>'0','oral_status' =>'1','exam_id'=>$exam_id,'examformmaster_id'=> $insertid);
        
            // StudentExamform::insert($values);
        }
            
        $student->studentexamform()->create($values); 
        
        // $student->studentexamform()->create($values); 
    
    
                }  
        } 
        //dd($subbacklog1);
        if(isset($subbacklog1))
        { 
        
        foreach($subbacklog1 as $subject_id)
        {
        //dd($subject_id." ".$request->input($subject_id));
        $subject_type=$request->input($subject_id);
    
        if($subject_type=="IE" or$subject_type=="IP")
        {
            $values = array('prn'=>$prn,'subject_id'=>$subject_id,
            'int_status' =>'0','ext_status'=>'1','exam_id'=>$exam_id,'examformmaster_id'=> $insertid);
    
        // StudentExamform::insert($values);
        }
        else if($subject_type=="IEP")
        { 
            $values = array('prn'=>$prn,'subject_id'=>$subject_id,
            'int_status' =>'0','int_practical_status'=>'0','ext_status'=>'1','exam_id'=>$exam_id,'examformmaster_id'=> $insertid);
        //dd($values);
            //StudentExamform::insert($values);
        }
    
        else if($subject_type=="P") //for MCOM project
        {
            $values = array('prn'=>$prn,'subject_id'=>$subject_id,
            'int_status'=>'0', 'ext_status'=>'0', 'project_status' =>'1','exam_id'=>$exam_id,'examformmaster_id'=> $insertid);
        
            //    StudentExamform::insert($values);
        }
        else if($subject_type=="O") //for Oral
        {
            $values = array('prn'=>$prn,'subject_id'=>$subject_id,
            'int_status'=>'0', 'ext_status'=>'0','oral_status' =>'1','exam_id'=>$exam_id,'examformmaster_id'=> $insertid);
        
            // StudentExamform::insert($values);
        }
        //  dd($values);
        $student->studentexamform()->create($values); 
    
        }  //foreach
        }//if
    
    
        if(isset($intsub))
        { 
        
        foreach($intsub as $subject_id)
        {
        //dd($subject_id." ".$request->input($subject_id));
        $subject_type=$request->input($subject_id);
        if($subject_type=="I" )
        {
            $values = array('prn'=>$prn,'subject_id'=>$subject_id,
            'int_status' =>'1','ext_status'=>'0','exam_id'=>$exam_id,'examformmaster_id'=> $insertid);
    
            //StudentExamform::insert($values);
        }
        else if($subject_type=="IE" or $subject_type=="IP"   or $subject_type=="IEG")
        {
            $values = array('prn'=>$prn,'subject_id'=>$subject_id,
            'int_status' =>'1','ext_status'=>'1','exam_id'=>$exam_id,'examformmaster_id'=> $insertid);
    
        // StudentExamform::insert($values);
        }
        else if($subject_type=="IEP")
        { 
            $values = array('prn'=>$prn,'subject_id'=>$subject_id,
            'int_status' =>'1','int_practical_status'=>'1','ext_status'=>'1','exam_id'=>$exam_id,'examformmaster_id'=> $insertid);
        //dd($values);
            //StudentExamform::insert($values);
        }
        else if($subject_type=="G" ||$subject_type=="IG")
        {
            $values = array('prn'=>$prn,'subject_id'=>$subject_id,
            'int_status'=>'0', 'ext_status'=>'0',
                'grade_status' =>'1','exam_id'=>$exam_id,'examformmaster_id'=> $insertid);
        
                //StudentExamform::insert($values);
        }
        else if($subject_type=="IEG" )
        {        
                $int_status=1; 
            $values = array('prn'=>$prn,'subject_id'=>$subject_id,
            'int_status' =>'1','ext_status'=>'1','exam_id'=>$exam_id,'examformmaster_id'=> $insertid);
        //dd($values);
        // StudentExamform::insert($values);
        }
        // else if($subject_type=="P") //for MCOM project
        // {
        //     $values = array('prn'=>$prn,'subject_id'=>$subject_id,
        //     'int_status'=>'1', 'ext_status'=>'0', 'project_status' =>'1','exam_id'=>$exam_id,'examformmaster_id'=> $insertid);
        
        //     //    StudentExamform::insert($values);
        // }
        else if($subject_type=="O") //for Oral
        {
            $values = array('prn'=>$prn,'subject_id'=>$subject_id,
            'int_status'=>'0', 'ext_status'=>'0','oral_status' =>'1','exam_id'=>$exam_id,'examformmaster_id'=> $insertid);
        
            // StudentExamform::insert($values);
        }
        //  dd($values);
        $student->studentexamform()->create($values); 
    
        }  //foreach
        }//if
        $grade=$request->input('grade');
        if(isset($grade))
        { //dd($extracrd);
        foreach($request->input('grade') as $subject_id)
        {
            
            $values = array('prn'=>$prn,'subject_id'=>$subject_id,
            'int_status'=>'0', 'ext_status'=>'0',
                'grade_status' =>'1','exam_id'=>$exam_id,'examformmaster_id'=> $insertid);
                $student->studentexamform()->create($values); 
        }
        }
        $extracrd=$request->input('extracrd');
        // dd($extracrd);
        if(isset($extracrd))
        { //dd($extracrd);
        foreach($request->input('extracrd') as $subject_id)
        {
                $values = array('prn'=>$prn,'subject_id'=>$subject_id,
                'select_status'=>'1', 'exam_id'=>$exam_id,'course_id'=>$course_id,'examformmaster_id'=> $insertid);
    
            $student->studentextracreditexamforms()->create($values); 
        }  //foreach
        }//
        }
        $data=$student->examformmaster->last();
        //reexamform
        //$student->update(['abcid'=>$abcid]);
        $student->patternclassstudent()->upsert(['medium_instruction'=>$mediumofans,'student_id'=>$student->id,'patternclass_id'=>$patternclass_id],['student_id','patternclass_id']);
    
        //return redirect()->route('student.examformfee', ['data' => $data,'patternclass_id'=>$patternclass_id,'internalcount'=>$internal_count])->withInput();
        return view("student.examformfee",compact('data','patternclass_id','internalcount'));
        //   var_dump($request->input('internal'));
        //   var_dump($request->input('external'));
        //var_dump($request->input('practical'));
        //   var_dump($request->input('grade'));
        //   var_dump($request->input('project'));
        //   var_dump($request->input('oral'));
    }
}

