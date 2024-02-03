<?php

namespace App\Livewire\Student\StudentExamForm;


use App\Models\Subject;
use Livewire\Component;
use App\Models\Admissiondata;
use App\Models\Examformmaster;
use Livewire\Attributes\Locked;
use App\Models\ExamPatternclass;
use App\Models\CurrentclassStudents;
use Illuminate\Support\Facades\Auth;


class StudentExamForm extends Component
{  
    public $medium_instruction;
    public $abcid;
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

    // Get SEM 1 Subjects For Fist Year
    public function get_sem_1_subjects()
    {   
        $subjectids = Admissiondata::select('subject_id')->where('patternclass_id', $this->patternclss_id)->get();
        return  Subject::where('subject_sem',1)->whereIn('id',$subjectids)->where('patternclass_id', $this->patternclss_id)->get();
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
        $current_class=CurrentclassStudents::where('patternclass_id', $this->patternclss_id)->where('student_id',Auth::guard('student')->user()->id)->get();
        if($current_class->isEmpty())
        {    
            // Subject For First Sem
            $this->patternclss_id=Auth::guard('student')->user()->patternclass_id;
            $regular_subjects = $this->get_sem_1_subjects();
        }else
        {
            foreach ($current_class as $classRecord) {

                switch ($classRecord->sem) {
                    case 1:
                        $this->patternclss_id=$classRecord->patternclass_id;
                        $regular_subjects = $this->get_sem_subjects(2);
                    break;
                    case 2:
                        $this->patternclss_id=$classRecord->patternclass_id;
                        $regular_subjects = $this->get_sem_subjects(3);
                    break;
                    case 3:
                        $this->patternclss_id=$classRecord->patternclass_id;
                        $regular_subjects = $this->get_sem_subjects(4);
                    break;
                    case 4:
                        $this->patternclss_id=$classRecord->patternclass_id;
                        $regular_subjects = $this->get_sem_subjects(5);
                    break;
                    case 5:
                        $this->patternclss_id=$classRecord->patternclass_id;
                        $regular_subjects = $this->get_sem_subjects(6);
                    break;
                    default:
                       $regular_subjects=[];
                  }
            }
        }
        

        $this->check_subject_checkboxs($regular_subjects);
        
        $backlog_subjects= [];
        $this->check_subject_checkboxs($backlog_subjects);
        $extra_credit_subjects= [];
        return view('livewire.student.student-exam-form.student-exam-form',compact('regular_subjects','backlog_subjects','extra_credit_subjects'))->extends('layouts.student')->section('student');
    }




    public function examform(Request $request)
    {    
        
        $oddevensixsem=false;
        $examsession=null; 
        $extracreditsub=null;
        $student= Auth::guard('student')->user();         
        $currentexam = Exam::Where('status', '1')->get();
        $examsession=$currentexam->first()->exam_sessions;
        $data2=$student->currentclassstudent->last();
        $datasem=$student->currentclassstudent->where('pfstatus','!=','-1')->where('markssheetprint_status','!=','-1');
        $backsubjectid=null;
        $subjectdata=null;
        $backsubjectpreviousem=null;
        if($request->input('examform')=="Exam Form")//"Exam Form")
        {
            if(is_null($data2))//first year sem-I
            {
                            $memberid= $student->memid;//123;
                            //$adsubjectdata=Admissiondata::with(['subject'])->where('memid',$memberid)->get();
                            $adsubjectdata= Admissiondata::where('memid',$memberid)
                            ->where('patternclass_id',$student->patternclass_id)
                            ->get();
                            if(!$adsubjectdata->isEmpty())
                            {                        
                            if($adsubjectdata->last()->academicyear_id==$currentexam->first()->academicyear_id)
                            {
                            
                            if($examsession!=2)
                            $subjectdata=Subject::whereIn('id',$adsubjectdata->pluck('subject_id'))
                            ->where('subject_sem','1')
                            ->get();
                            else
                            {
                            // $subjectdata=Subject::whereIn('id',$adsubjectdata->pluck('subject_id'))
                            // ->whereIn('subject_sem',['1','2'])
                            // ->get();
                            $backsubjectpreviousem=Subject::whereIn('id',$adsubjectdata->pluck('subject_id'))
                            ->where('subject_sem',1)
                            ->get();
                           // dd($backsubjectpreviousem);
                            $subjectdata=Subject::whereIn('id',$adsubjectdata->pluck('subject_id'))
                            ->where('subject_sem',2)
                            ->get();//dd($subjectdata);
                            }
                          //  dd($subjectdata);
                           $backsubject=null;
                           $excrsubid=$student->intextracreditbatchseatnoallocations->where('grade','=','NA')->pluck('subject_id');
            
                                $extracreditsub=Extracreditsubject::where('isactive','1')
                                ->where('course_type',$student->patternclass->coursepatternclasses->course->course_type)
                                ->get();
                                $totalextracredit= $extracreditsub->pluck('subject_credit')->sum();
                             
                    return view("student.examform1",compact('student','subjectdata','backsubject','examsession','extracreditsub','backsubjectpreviousem','totalextracredit','oddevensixsem'));
                            }
                            else{
                                //No admission in current  year
                                
                                return back()->with('success','No admission in the current year !!!!!');
                
                            }
                            }
                            else
                                return back()->with('success','Invalid Member ID please Update your profile !!!!!');
                
            }
            else
            {  
                switch($data2->sem)
                {
                    case 1:

                        $memberid= $student->memid;//123;
                        //$adsubjectdata=Admissiondata::with(['subject'])->where('memid',$memberid)->get();
                        $adsubjectdata= Admissiondata::where('memid',$memberid)
                        ->where('patternclass_id',$data2->patternclass_id)
                        ->get();
                       if(!$adsubjectdata->isEmpty())
                        {//dd($adsubjectdata);
                        if($adsubjectdata->last()->academicyear_id==$currentexam->first()->academicyear_id)
                        { //dd($adsubjectdata->last()->academicyear_id);
                        
                            $subjectdata=Subject::whereIn('id',$adsubjectdata->pluck('subject_id'))
                            ->where('subject_sem',$data2->sem+1)
                            ->get();
                                        $backsubject=null;
                                        $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                        $backsubject=Subject::whereIn('id',$subdata)
                                        ->where('patternclass_id',$data2->patternclass_id)
                                        ->get();
                                       // dd($backsubject);
                        }
                                        
                        else
                        {
                                //fail student
                                $subjectdata=null;
                                $subjectdataprevious=Subject::whereIn('id',$adsubjectdata->pluck('subject_id'))
                                ->where('subject_sem',$data2->sem+1)->get();
                               $a=$subjectdataprevious->pluck('id');

                                $backsubjectpreviousem=null;
                                       // $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                      //  $allsubject=$a->merge($subdata);
                                      //  dd($allsubject);
                                        $backsubjectpreviousem=Subject::whereIn('id',$a)
                                        ->get();
                                        //dd($backsubjectprevious);
                        }
                    }
                    else
                                    return back()->with('success','Invalid Member ID please Update your profile !!!!!');
                        
                        break;
                    case 2:  
                        $memberid= $student->memid;//123;
                        //$adsubjectdata=Admissiondata::with(['subject'])->where('memid',$memberid)->get();
                        $adsubjectdata= Admissiondata::where('memid',$memberid)
                        ->where('patternclass_id',$data2->patternclass_id+1)
                        ->get();
                       if(!$adsubjectdata->isEmpty())
                        {//dd($adsubjectdata);
                        if($adsubjectdata->last()->academicyear_id==$currentexam->first()->academicyear_id)
                        { //dd($adsubjectdata->last()->academicyear_id);
                                                         
                    $Sem1Data= $student->studentresults->where('sem',$data2->sem-1)->last();
                    $Sem2Data= $student->studentresults->where('sem',$data2->sem)->last() ;
                    if(is_null($Sem1Data) && is_null($Sem2Data)) //direct to 2nd year admission
                    {
                        if($data2->markssheetprint_status=-1)
                        {
                            $subjectdata=Subject::whereIn('id',$adsubjectdata->pluck('subject_id'))
                            ->where('subject_sem',$data2->sem+1)
                            ->get();
                                        $backsubject=null;
                                        $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                        $backsubject=Subject::whereIn('id',$subdata)
                                        ->where('patternclass_id',$data2->patternclass_id)
                                        ->get();
                                        //dd($backsubject);
                        }
                    }
                    else if(!(is_null($Sem1Data) && is_null($Sem2Data)))
                    {//dd("OK");
                        
                        $this->yearresult=$student->getyearresult_examform($Sem1Data,$Sem2Data,$data2);
                      
                        if($this->yearresult==0)//fail student
                        {  
                            $subjectdata=null;
                            $backsubject=null;
                                    $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                    $backsubject=Subject::whereIn('id',$subdata)
                                    ->where('patternclass_id',$data2->patternclass_id)
                                    ->get();
                        }
                        else//regular admitted student
                        {
                          //dd($data2);
                          if($examsession==2)
                          {
                            $backsubjectpreviousem=Subject::whereIn('id',$adsubjectdata->pluck('subject_id'))
                            ->where('subject_sem',$data2->sem+1)
                            ->get();
                            //dd($backsubject);
                            $subjectdata=Subject::whereIn('id',$adsubjectdata->pluck('subject_id'))
                            ->where('subject_sem',$data2->sem+2)
                            ->get();//dd($subjectdata);
                          }else{
                                        $subjectdata=Subject::whereIn('id',$adsubjectdata->pluck('subject_id'))
                                        ->where('subject_sem',$data2->sem+1)
                                        ->get();//dd($subjectdata);
                                                    $backsubject=null;
                                                    $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                                    $backsubject=Subject::whereIn('id',$subdata)
                                                    ->where('patternclass_id',$data2->patternclass_id)
                                                    ->get();
                          }
                                                    //dd($backsubject);
                        }

                    }
                }
                        else
                        {
                                //fail student
                                $subjectdata=null;
                                $backsubject=null;
                                        $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                        $backsubject=Subject::whereIn('id',$subdata)
                                        ->where('patternclass_id',$data2->patternclass_id)
                                        ->get();
                        }
                    }
                     else
                     {
                        $subjectdata=null;
                                $backsubject=null;
                                        $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                        $backsubject=Subject::whereIn('id',$subdata)
                                        ->where('patternclass_id',$data2->patternclass_id)
                                        ->get();//dd( $subdata);
                                        if($subdata->isEmpty())
                                            return back()->with('success','Invalid Member ID please Update your profile !!!!!');
                     }  
                        break;
                    case 3:
                        
                        $memberid= $student->memid;//123;
                        //$adsubjectdata=Admissiondata::with(['subject'])->where('memid',$memberid)->get();
                        $adsubjectdata= Admissiondata::where('memid',$memberid)
                        ->where('patternclass_id',$data2->patternclass_id)
                        ->get();
                       // dd($adsubjectdata);
                         if(!$adsubjectdata->isEmpty())
                        {//dd($adsubjectdata);
                        if($adsubjectdata->last()->academicyear_id==$currentexam->first()->academicyear_id)
                        { //dd($adsubjectdata->last()->academicyear_id);
                      
                            $subjectdata=Subject::whereIn('id',$adsubjectdata->pluck('subject_id'))
                            ->where('subject_sem',$data2->sem+1)
                            ->get();
                                        $backsubject=null;
                                        $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                        $backsubject=Subject::whereIn('id',$subdata)
                                        ->get();
                                        //dd($subjectdata);
                        }
                                        
                        else
                        {
                                //fail student
                                $subjectdata=null;
                                $subjectdataprevious=Subject::whereIn('id',$adsubjectdata->pluck('subject_id'))
                                ->where('subject_sem',$data2->sem+1)->get();
                               $a=$subjectdataprevious->pluck('id');

                                $backsubjectpreviousem=null;
                                       // $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                      //  $allsubject=$a->merge($subdata);
                                      //  dd($allsubject);
                                        $backsubjectpreviousem=Subject::whereIn('id',$a)
                                        ->get();
                                        //dd($backsubjectpreviousem);
                        }
                        }else
                                    return back()->with('success','Invalid Member ID please Update your profile !!!!!');
                        
                        break;
                    case 4: //dd($data2);
                        $memberid= $student->memid;//123;
                        //$adsubjectdata=Admissiondata::with(['subject'])->where('memid',$memberid)->get();
                        $adsubjectdata= Admissiondata::where('memid',$memberid)
                        ->where('patternclass_id',$data2->patternclass_id+1)
                        ->get();

                       if(!$adsubjectdata->isEmpty())
                        {//dd($adsubjectdata);
                        if($adsubjectdata->last()->academicyear_id==$currentexam->first()->academicyear_id)
                        { //dd($adsubjectdata->last()->academicyear_id);
                            if($datasem->isEmpty())
                            {
                                $subjectdata=Subject::whereIn('id',$adsubjectdata->pluck('subject_id'))
                                ->where('subject_sem',$data2->sem+1)
                                ->get();
                                            $backsubject=null;
                                            $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                            $backsubject=Subject::whereIn('id',$subdata)
                                            ->where('patternclass_id',$data2->patternclass_id)
                                            ->get();
                                            //dd($backsubject);
                        
                            }
                            if($datasem->count()==4)
                            {
                            $Sem1Data= $student->studentresults->where('sem',1)->last();
                            $Sem2Data= $student->studentresults->where('sem',2)->last() ;
                            if(!(is_null($Sem1Data) && is_null($Sem2Data)))
                            {
                                $this->yearresult=$student->getyearresult_examform($Sem1Data,$Sem2Data,$data2);
                          
                                if($this->yearresult!=1)//fail repeater student
                                {
                                    $subjectdata=null;
                                    $backsubject=null;
                                            $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                            $backsubject=Subject::whereIn('id',$subdata)
                                            ->where('patternclass_id',$data2->patternclass_id)
                                            ->get();
                                }
                                else
                                {
                                    $Sem3Data= $student->studentresults->where('sem',3)->last();
                                    $Sem4Data= $student->studentresults->where('sem',4)->last() ;
                                    if(!(is_null($Sem3Data) && is_null($Sem4Data)))
                                    {
                                         $this->yearresult=$student->getyearresult_examform($Sem3Data,$Sem4Data,$data2);
                                  
                                        if($this->yearresult==0)//fail repeater student
                                        {
                                            $subjectdata=null;
                                            $backsubject=null;
                                                    $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                                    $backsubject=Subject::whereIn('id',$subdata)
                                                    ->where('patternclass_id',$data2->patternclass_id)
                                                    ->get();
                                        }
                                        else //regular admitted student
                                        { 
                                            if($examsession==2)
                          { $oddevensixsem=true;
                            $backsubjectpreviousem=Subject::whereIn('id',$adsubjectdata->pluck('subject_id'))
                            ->where('subject_sem',$data2->sem+1)
                            ->get();
                            //dd($backsubjectpreviousem);
                            $subjectdata=Subject::whereIn('id',$adsubjectdata->pluck('subject_id'))
                            ->where('subject_sem',$data2->sem+2)
                            ->get();//dd($subjectdata);
                          }else{ 
                            $subjectdata=Subject::whereIn('id',$adsubjectdata->pluck('subject_id'))
                            ->where('subject_sem',$data2->sem+1)
                            ->get();
                                        $backsubject=null;
                                        $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                        $backsubject=Subject::whereIn('id',$subdata)
                                        ->where('patternclass_id',$data2->patternclass_id)
                                        ->get();
                                        dd($backsubject);
                          }
                                            
                                        }
                                    }
                          
                                }
                            }

                        }
                        if($datasem->count()==2)
                        {
                            $Sem1Data= $student->studentresults->where('sem',$data2->sem-1)->last();
                        $Sem2Data= $student->studentresults->where('sem',$data2->sem)->last() ;
                        if(!(is_null($Sem1Data) && is_null($Sem2Data)))
                        {
                            $this->yearresult=$student->getyearresult_examform($Sem1Data,$Sem2Data,$data2);
                      
                            if($this->yearresult==0)//fail repeater student
                            {
                                $subjectdata=null;
                                $backsubject=null;
                                        $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                        $backsubject=Subject::whereIn('id',$subdata)
                                        ->where('patternclass_id',$data2->patternclass_id)
                                        ->get();
                            }
                            else //regular admitted student
                            { 
                                $subjectdata=Subject::whereIn('id',$adsubjectdata->pluck('subject_id'))
                                ->where('subject_sem',$data2->sem+1)
                                ->get();
                                            $backsubject=null;
                                            $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                            $backsubject=Subject::whereIn('id',$subdata)
                                            ->where('patternclass_id',$data2->patternclass_id)
                                            ->get();
                                       // dd($backsubject);
                       
                            }
                        }
                        else
                        { 
                                //fail student
                                $subjectdata=null;
                                $backsubject=null;
                                        $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                        $backsubject=Subject::whereIn('id',$subdata)
                                        ->where('patternclass_id',$data2->patternclass_id)
                                        ->get();
                        }
                    }
                }
                    else
                     {
                                $subjectdata=null;
                                $backsubject=null;
                                        $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                        $backsubject=Subject::whereIn('id',$subdata)
                                       // ->where('patternclass_id',$data2->patternclass_id)
                                        ->get();
                                        //dd($backsubject);
                                        if($subdata->isEmpty())
                                            return back()->with('success','Invalid Member ID please Update your profile !!!!!');
                     }  
                    }//else  return back()->with('success','Invalid Member ID please Update your profile !!!!!');
                       else  
                    {
                        $adsubjectdata= Admissiondata::where('memid',$memberid)
                        ->where('patternclass_id',$data2->patternclass_id)
                        ->get();
                       if(!$adsubjectdata->isEmpty())
                        {
                            $subjectdata=null;
                            $backsubject=null;
                        }
                        else
                        return back()->with('success','Invalid Member ID please Update your profile !!!!!');
                    }
                        break;  
                    case 5:
                        //third year sem 5 to sem 6
                        $oddevensixsem=true;
                        $memberid= $student->memid;//123;
                        //$adsubjectdata=Admissiondata::with(['subject'])->where('memid',$memberid)->get();
                        $adsubjectdata= Admissiondata::where('memid',$memberid)
                        ->where('patternclass_id',$data2->patternclass_id)
                        ->get();
                        //dd($adsubjectdata);
                         if(!$adsubjectdata->isEmpty())
                        {//dd($adsubjectdata);
                        if($adsubjectdata->last()->academicyear_id==$currentexam->first()->academicyear_id)
                        { //dd($adsubjectdata->last()->academicyear_id);
                      
                            $subjectdata=Subject::whereIn('id',$adsubjectdata->pluck('subject_id'))
                            ->where('subject_sem',$data2->sem+1)
                            ->get();
                                        $backsubject=null;
                                        $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                        $backsubject=Subject::whereIn('id',$subdata)
                                        ->get();
                                        //dd($backsubject);
                        }
                                        
                        else
                        {
                                //fail student
                                $subjectdata=null;
                                $subjectdataprevious=Subject::whereIn('id',$adsubjectdata->pluck('subject_id'))
                                ->where('subject_sem',$data2->sem+1)->get();
                               $a=$subjectdataprevious->pluck('id');

                                $backsubjectpreviousem=null;
                                       // $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                      //  $allsubject=$a->merge($subdata);
                                      //  dd($allsubject);
                                        $backsubjectpreviousem=Subject::whereIn('id',$a)
                                        ->get();
                                        //dd($backsubjectprevious);
                        }
                        }else
                                    return back()->with('success','Invalid Member ID please Update your profile !!!!!');
                        
                       
                        break;      
                        case 6:
                            //if($this->yearresult==0)//fail repeater student
                            {
                                $subjectdata=null;
                                $backsubject=null;
                                        $subdata=$student->studentmarks()->with('subject')->pluck('subject_id');
                                        $backsubject=Subject::whereIn('id',$subdata)
                                        ->where('patternclass_id',$data2->patternclass_id)
                                        ->get();
                            }
                            break;                
                }//switch 
                $excrsubid=$student->intextracreditbatchseatnoallocations->where('grade','=','NA')->pluck('subject_id');
            if($student->patternclass->coursepatternclasses->course->course_type=="PG")
            {//dd($student->studentadmission->whereIn('academicyear_id',[1,2])->count());
                if($student->studentadmission->whereIn('academicyear_id',[1,2])->count()>=1 )
                {
                    $extracreditsub=Extracreditsubject::where('isactive','0')
                    ->where('course_type',$student->patternclass->coursepatternclasses->course->course_type)
                    ->get();
                    $totalextracredit= $extracreditsub->pluck('subject_credit')->sum();
                 //dd($extracreditsub);
                }
                else{
                    $extracreditsub=Extracreditsubject::where('isactive','1')
                    ->where('course_type',$student->patternclass->coursepatternclasses->course->course_type)
                    ->get();
                    $totalextracredit= $extracreditsub->pluck('subject_credit')->sum();
                 
                }
            }else
            {
                $extracreditsub=Extracreditsubject::where('isactive','1')
                ->where('course_type',$student->patternclass->coursepatternclasses->course->course_type)
                ->get();
                $totalextracredit= $extracreditsub->pluck('subject_credit')->sum();
             
            }
                //dd($subjectdata);
             
              return view("student.examform1",compact('student','examsession','currentexam','subjectdata','extracreditsub','backsubjectpreviousem','totalextracredit','oddevensixsem'));     
            }
        }//if exam form button on dashboard
        else   //view exam form button on dashboard
        { $currentexam = Exam::Where('status', '1')->get();
           // dd($student->examformmaster->where('exam_id', $currentexam->first()->id));
            //if($student->examformmaster->where('exam_id', $currentexam->first()->id))
            {$currentprintstatus=$student->examformmaster->where('exam_id', $currentexam->first()->id)->first()->printstatus;
            if($currentprintstatus==1)
            {

               return back()->with('success','Your Exam form has already printed');
            }
            $data=$student->examformmaster->where('exam_id', $currentexam->first()->id)->first();
            }
          // $data1=$student->studentextracreditexamforms;
           // dd($data);
           
            $flag=1;
            if($student->studentprofile)
            {
            if ((file_exists(public_path('storage/images/photo/'.$student->studentprofile->profile_photo_path)))||(file_exists(public_path('storage/images/photo/'.$student->studentprofile->sign_photo_path)))) {
                //dd($student->id);
                 $pdf = PDF::loadView('student.printexamform', compact('data','flag'))->setOptions(['images' => true,'defaultFont' => 'sans-serif']);
            $pdf->setPaper('L');
            $pdf->output();
            $canvas = $pdf->getDomPDF()->getCanvas();
            $height = $canvas->get_height();
            $width = $canvas->get_width();
            $canvas->set_opacity(.2,"Multiply");
            $canvas->page_text($width/5, $height/2, 'Print Preview', null,
             70, array(0,0,0),2,2,-30);
             $canvas->page_text($width/9, $height/3, 'Print Preview', null,
             70, array(0,0,0),2,2,-30);
            // $canvas->page_text($width/2, $height/1, 'Print Preview', null,
             //70, array(0,0,0),2,2,-30);
            return $pdf->stream('examform.pdf');
              }else{
                
               return back()->with('success','Your Photo and sign is not available.Kindly Update your profile');
       
              }
            } else   return back()->with('success','Your Photo and sign is not available.Kindly Update your profile');
       
           
        }
    }
}
