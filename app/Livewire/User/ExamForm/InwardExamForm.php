<?php

namespace App\Livewire\User\ExamForm;

use Carbon\Carbon;
use App\Models\Exam;
use App\Models\Course;
use App\Models\Pattern;
use Livewire\Component;
use App\Models\Courseclass;
use App\Models\Patternclass;
use Livewire\WithPagination;
use App\Models\Admissiondata;
use App\Models\Examformmaster;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Locked;
use Illuminate\Support\Facades\DB;
use App\Models\Currentclassstudent;

class InwardExamForm extends Component
{   
    use WithPagination;
    
    public $page=1;
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $course_id;
    public $list_by;
    public $application_id;
    public $patternclass_id;

    #[Locked]
    public $student_name;
    #[Locked]
    public $mother_name;
    #[Locked]
    public $course_name;
    #[Locked]
    public $memid;

    #[Locked]
    public $inward_id;

    #[Locked]
    public $courses=[];
    #[Locked]
    public $pattern_classes=[];
    #[Locked]
    public $student_exam_form_fees=[];
    #[Locked]
    public $student_exam_form_subjects=[];
    #[Locked]
    public $student_exam_form_extrcredit_subjects=[];


    protected function rules()
    {   
        $rules = [
            'course_id' => ['required', 'integer',Rule::exists('courses', 'id')],
            'patternclass_id' => ['required', 'integer',Rule::exists('pattern_classes', 'id')],
            'list_by' => ['required', 'in:o,m'],
        ];

        if($this->list_by=='o'){
            $rules['application_id']=['required', 'integer',Rule::exists('examformmasters', 'id')->where(function ($query) {
                return $query->where('patternclass_id', $this->patternclass_id);
            })];
        }

        return $rules;
    }

    protected function messages()
    {   
        $messages = [
            'application_id.required' => 'The Application ID is required.',
            'application_id.integer' => 'The Application ID must be an integer.',
            'application_id.exists' => 'The Application ID does not exist For This Pattern Class.',

            'course_id.required' => 'The Course is required.',
            'course_id.integer' => 'The Course must be an integer.',
            'course_id.exists' => 'The selected Course does not exist.',

            'patternclass_id.required' => 'The Pattern Class is required.',
            'patternclass_id.integer' => 'The Pattern Class must be an integer.',
            'patternclass_id.exists' => 'The selected Pattern Class does not exist.',

            'list_by.required' => 'The List By field is required.',
            'list_by.in' => 'The List By field must be valid',
        ];
        
        return $messages;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {   
        $this->reset([
            'page',
            'inward_id',
            'search',
            'course_id',
            'application_id',
            'list_by',
            'patternclass_id',
            'courses',
            'pattern_classes',
            'student_name',
            'mother_name',
            'course_name',
            'memid',
            'student_exam_form_fees',
            'student_exam_form_subjects',
            'student_exam_form_extrcredit_subjects',
        ]);
    }

    public function sort_column($column)
    {
        if( $this->sortColumn === $column)
        {
            $this->sortColumnBy=($this->sortColumnBy=="ASC")?"DESC":"ASC";
            return;
        }
        $this->sortColumn=$column;
        $this->sortColumnBy=="ASC";
    }

    public function setpage($page)
    {   
        $this->page=$page;
    }


    public function inward_class_form()
    {   
        $this->validate();
        $this->page=2;

    }

    
    public function procced_to_approve($id)
    {   
        $this->application_id=null;
        $exam_form_master=Examformmaster::find($id);
        $this->inward_id=$exam_form_master->id;
        $this->mother_name=$exam_form_master->student->mother_name;
        $this->course_name=get_pattern_class_name($exam_form_master->patternclass_id);
        $this->memid=$exam_form_master->student->memid;
        $this->student_name=$exam_form_master->student->student_name;
        $this->student_exam_form_fees=$exam_form_master->studentexamformfees()->get();
        $this->student_exam_form_subjects=$exam_form_master->studentexamforms()->get();
        $this->student_exam_form_extrcredit_subjects=$exam_form_master->studentextracreditexamforms()->get();
        $this->page=3;
    }
    
    public function inward_form(Examformmaster $exam_form_master)
    {   
        DB::beginTransaction();

        try 
        {
            $exam_form_master->update(['inwardstatus' => 1,'feepaidstatus' => 1, 'inwarddate' => now()]);
            $student =$exam_form_master->student;
            
            $active_exam = $student->patternclass->exams()->where('launch_status',1)->first();
        
            $student_current_class_entry=$student->currentclassstudents->last();
    
            $datasem=$student->currentclassstudents->where('markssheetprint_status','!=','-1');
    
            if(is_null($student_current_class_entry))
            {   
                if (is_null($student->prn))
                { 
                    $admission_data= Admissiondata::where('memid',$student->memid)->where('patternclass_id',$student->patternclass_id)->get();               
                    if($admission_data->last()->academicyear_id==$exam_form_master->exam->academicyear_id)
                    {
                        if(!$admission_data->isEmpty())
                        { 
                           $student->studentadmissions()->create(['student_id'=>$student->id,'patternclass_id'=>$exam_form_master->patternclass_id,'academicyear_id'=>$exam_form_master->exam->academicyear_id,'college_id'=>$exam_form_master->college_id],['student_id','patternclass_id','academicyear_id']);
                        }
                    }
                    
                    //3 digit coursecode  2 digit year 5 digit studentid
                    $course_code = $student->patternclass->courseclass->course->course_code;
                    $year = Carbon::now()->format('y');
                    str_pad($student->id, 5, '0', STR_PAD_LEFT);
                    $prn = $course_code . $year . str_pad($student->id, 5, '0', STR_PAD_LEFT);
                    $student->update(['prn'=>$prn]);
        
                    if(get_student_current_sem($exam_form_master->student_id)==='not_regular')
                    {   
                        Currentclassstudent::create([
                            'sem'=>1,
                            'patternclass_id'=>$exam_form_master->patternclass_id ,
                            'student_id'=>$exam_form_master->student_id,
                            'college_id'=>$exam_form_master->college_id,
                            'academicyear_id'=>$exam_form_master->exam->academicyear_id,
                        ]);          
                        Currentclassstudent::create([
                            'sem'=>2,
                            'patternclass_id'=>$exam_form_master->patternclass_id ,
                            'student_id'=>$exam_form_master->student_id,
                            'college_id'=>$exam_form_master->college_id,
                            'academicyear_id'=>$exam_form_master->exam->academicyear_id,
                        ]);          
    
                    }else
                    {
                        Currentclassstudent::create([
                            'sem'=>get_student_current_sem($exam_form_master->student_id),
                            'patternclass_id'=>$exam_form_master->patternclass_id ,
                            'student_id'=>$exam_form_master->student_id,
                            'college_id'=>$exam_form_master->college_id,
                            'academicyear_id'=>$exam_form_master->exam->academicyear_id,
                        ]);
                    }
                }
            }
            else
            {
                //         $prn=$student->prn;
                //         if(($student->patternclass->coursepatternclasses->course->course_type=='PG' and $student_current_class_entry->sem==4)
                //         || ($student->patternclass->coursepatternclasses->course->course_type=='UG' and $student_current_class_entry->sem==6))
                //     {
                //         $currentadmission=false;
                //     } else{
                //                     $memberid= $student->memid;//123;
                //                     //$admission_data=Admissiondata::with(['subject'])->where('memid',$memberid)->get();
                //                     $admission_data= Admissiondata::where('memid',$memberid)
                //                     ->where('patternclass_id',$student_current_class_entry->patternclass_id+1)
                //                     ->where('academicyear_id',$currentexam->first()->academicyear_id)
                //                     ->get();
                                
                //                 if(!$admission_data->isEmpty())
                //                     {
                //                         $currentadmission=true;
                //                     }
                //                     else{$currentadmission=false;}
                //                 }
                //                 //dd($currentadmission);
                //         switch($student_current_class_entry->sem)
                //             {
                //                 case 1:
                //                     $sem=2;
                //                     $patternclass_id= $student_current_class_entry->patternclass->id; 
                //                     $values = array('prn' => $prn, 'sem' =>  $sem, 'patternclass_id' => $patternclass_id);
                //                     $student->currentclassstudent()->create($values);
                                
                //                     break;
                //                 case 2:
                //                     $Sem1Data= $student->studentresults->where('sem',$student_current_class_entry->sem-1)->last();
                //                     $Sem2Data= $student->studentresults->where('sem',$student_current_class_entry->sem)->last() ;
                //                 if(is_null($Sem1Data) && is_null($Sem2Data)) //direct to 2nd year admission
                //                 {
                //                     if($student_current_class_entry->markssheetprint_status=-1)
                //                     {
                //                         $sem=$student_current_class_entry->sem+1;
                //                         $pc=PatternClass::where('id',$student_current_class_entry->patternclass_id+1)->first();
                //                         $patternclass_id=$pc->id;
                //                         $values = array('prn' => $prn, 'sem' =>  $sem, 'patternclass_id' => $patternclass_id);
                //                         $student->currentclassstudent()->create($values);
                //                         $student->studentadmission()->create(['student_id'=>$student->id,'patternclass_id'=>$patternclass_id,'academicyear_id'=>$currentexam->first()->academicyear_id],['student_id','patternclass_id','academicyear_id']);
                                        
                //                     }
                //                 }
                //                 else if(!(is_null($Sem1Data) && is_null($Sem2Data)))
                //                 {
                //                     $this->yearresult=$student->getyearresult_examform($Sem1Data,$Sem2Data,$student_current_class_entry);
                            
                //                     if($this->yearresult==0 || $currentadmission==false)//fail repeater student
                //                     {   $sem=$student_current_class_entry->sem;
                //                         $pc=PatternClass::where('id',$student_current_class_entry->patternclass_id)->first();
                //                         $patternclass_id=$pc->id;
                //                         $values = array('student_id'=>$student->id,'prn' => $student->prn, 'sem' => $sem, 'patternclass_id' => $patternclass_id);  
                //                         $student->currentclassstudent()->upsert($values,['student_id','sem','patternclass_id']);
                            
                //                     }
                                
                //                     else //regular admitted student
                //                     { 
                //                         if ($active_exam->exam_sessions == 2) //sem 3,4  subject only
                //                         {
                //                             $sem = $student_current_class_entry->sem+1;
                //                             $values = array('prn' => $prn, 'sem' => 3, 'patternclass_id' => $patternclass_id);
                //                             $student->currentclassstudent()->create($values);
                //                             $values = array('prn' => $prn, 'sem' => 4, 'patternclass_id' => $patternclass_id);
                //                             $student->currentclassstudent()->create($values);
                //                             //$extracrstud=Extracreditsubjectexamform::where('student_id',$student->id)->get();
                //                             //$extracrstud->update(['prn'=>$prn]);
                //                             //$student->studentextracreditexamforms()->update(['prn'=>$prn]);
                //                         }else{
                //                         $sem=$student_current_class_entry->sem+1;
                //                         $pc=PatternClass::where('id',$student_current_class_entry->patternclass_id+1)->first();
                //                         $patternclass_id=$pc->id;
                //                         $values = array('prn' => $prn, 'sem' =>  $sem, 'patternclass_id' => $patternclass_id);
                //                         $student->currentclassstudent()->create($values);
                //                         $student->studentadmission()->create(['student_id'=>$student->id,'patternclass_id'=>$patternclass_id,'academicyear_id'=>$currentexam->first()->academicyear_id],['student_id','patternclass_id','academicyear_id']);
                //                     }
                //                     } 
                //                 }
                            
                //                     break;
                //                 case 3:
                //                     $sem=4;
                //                     $patternclass_id= $student_current_class_entry->patternclass->id; 
                //                     $values = array('prn' => $prn, 'sem' => $sem, 'patternclass_id' => $patternclass_id);
                //                     $student->currentclassstudent()->create($values);
                                
                //                     break;
                //                 case 4:
                //                     if($datasem->isEmpty())
                //                     {
                //                         $sem=$student_current_class_entry->sem+1;
                //                         $pc=PatternClass::where('id',$student_current_class_entry->patternclass_id+1)->first();
                                        
                //                         $patternclass_id=$pc->id;
                //                         $values = array('prn' => $prn, 'sem' => $sem, 'patternclass_id' => $patternclass_id);
                //                         $student->currentclassstudent()->create($values);
                //                         $student->studentadmission()->create(['student_id'=>$student->id,'patternclass_id'=>$patternclass_id,'academicyear_id'=>$currentexam->first()->academicyear_id],['student_id','patternclass_id','academicyear_id']);
                    
                //                     }
                //                     if($datasem->count()==4)
                //                     {
                //                     $Sem1Data= $student->studentresults->where('sem',1)->last();
                //                     $Sem2Data= $student->studentresults->where('sem',2)->last() ;
    
                //                     if(!(is_null($Sem1Data) && is_null($Sem2Data)))
                //                     {
                //                         $this->yearresult=$student->getyearresult_examform($Sem1Data,$Sem2Data,$student_current_class_entry);
                                    
                //                         if($this->yearresult!=1 || $currentadmission==false)//fail repeater student
                //                         {
                //                             //$active_exam=$student_current_class_entry->patternclass->exams()->where('launch_status','1')->first();
                //                             //$pc=$student_current_class_entry->patternclass_id;
    
                //                             $sem=$student_current_class_entry->sem;
                //                             $pc=PatternClass::where('id',$student_current_class_entry->patternclass_id)->first();
                //                             $patternclass_id=$pc->id;
                //                             $values = array('student_id'=>$student->id,'prn' => $student->prn, 'sem' => $sem, 'patternclass_id' => $patternclass_id);  
                //                             $student->currentclassstudent()->upsert($values,['student_id','sem','patternclass_id']);
                                
                //                         // dd($patternclass_id);
                //                         }
                //                         else{  
                //                             $Sem3Data= $student->studentresults->where('sem',3)->last();
                //                             $Sem4Data= $student->studentresults->where('sem',4)->last() ;
                //                             if(!(is_null($Sem3Data) && is_null($Sem4Data)))
                //                             {
                //                                 $this->yearresult=$student->getyearresult_examform($Sem3Data,$Sem4Data,$student_current_class_entry);
                                        
                //                                 if($this->yearresult==0 || $currentadmission==false)//fail repeater student
                //                                 {   $sem=$student_current_class_entry->sem;
                //                                     $pc=PatternClass::where('id',$student_current_class_entry->patternclass_id)->first();
                //                                     $patternclass_id=$pc->id;
                //                                     $values = array('student_id'=>$student->id,'prn' => $student->prn, 'sem' => $sem, 'patternclass_id' => $patternclass_id);  
                //                                     $student->currentclassstudent()->upsert($values,['student_id','sem','patternclass_id']);
                                        
                //                                 }
                //                                 else{
                //                                     if ($active_exam->exam_sessions == 2) //sem 1,2  subject only
                //             {
                //                 $sem = $student_current_class_entry->sem+1;
                //                 $values = array('prn' => $prn, 'sem' => 5, 'patternclass_id' => $patternclass_id);
                //                 $student->currentclassstudent()->create($values);
                //                 $values = array('prn' => $prn, 'sem' => 6, 'patternclass_id' => $patternclass_id);
                //                 $student->currentclassstudent()->create($values);
                //                 //$extracrstud=Extracreditsubjectexamform::where('student_id',$student->id)->get();
                //                 //$extracrstud->update(['prn'=>$prn]);
                //                 //$student->studentextracreditexamforms()->update(['prn'=>$prn]);
                //             }else{
                //                                     $sem=$student_current_class_entry->sem+1;
                //                                     $pc=PatternClass::where('id',$student_current_class_entry->patternclass_id+1)->first();
                                                    
                //                                     $patternclass_id=$pc->id;
                //                                     $values = array('prn' => $prn, 'sem' => $sem, 'patternclass_id' => $patternclass_id);
                //                                     $student->currentclassstudent()->create($values);
                //                                     $student->studentadmission()->create(['student_id'=>$student->id,'patternclass_id'=>$patternclass_id,'academicyear_id'=>$currentexam->first()->academicyear_id],['student_id','patternclass_id','academicyear_id']);
                //             }
                //                                 }
                //                         }
                //                     }
                //                 }
                //             }
                //                     else  if($datasem->count()==2)
                //                     {
                //                     $Sem1Data= $student->studentresults->where('sem',$student_current_class_entry->sem-1)->last();
                //                     $Sem2Data= $student->studentresults->where('sem',$student_current_class_entry->sem)->last() ;
                //                     if(!(is_null($Sem1Data) && is_null($Sem2Data)))
                //                     {
                //                         $this->yearresult=$student->getyearresult_examform($Sem1Data,$Sem2Data,$student_current_class_entry);
                                
                //                         if($this->yearresult==0 || $currentadmission==false)//fail repeater student
                //                         {
                //                             $sem=$student_current_class_entry->sem;
                                        
                //                             $patternclass_id=$student_current_class_entry->patternclass_id;
                //                             $values = array('student_id'=>$student->id,'prn' => $student->prn, 'sem' => $sem, 'patternclass_id' => $patternclass_id);  
                //                             $student->currentclassstudent()->upsert($values,['student_id','sem','patternclass_id']);
                                
                //                         }
                                    
                //                         else //regular admitted student
                //                         { 
                //                             if ($active_exam->exam_sessions == 2) //sem 1,2  subject only
                //                             {
                //                                 $sem = $student_current_class_entry->sem+1;
                //                                 $values = array('prn' => $prn, 'sem' => 5, 'patternclass_id' => $patternclass_id);
                //                                 $student->currentclassstudent()->create($values);
                //                                 $values = array('prn' => $prn, 'sem' => 6, 'patternclass_id' => $patternclass_id);
                //                                 $student->currentclassstudent()->create($values);
                //                                 //$extracrstud=Extracreditsubjectexamform::where('student_id',$student->id)->get();
                //                                 //$extracrstud->update(['prn'=>$prn]);
                //                                 //$student->studentextracreditexamforms()->update(['prn'=>$prn]);
                //                             }else{
                //                             $sem=$student_current_class_entry->sem+1;
                //                             $pc=PatternClass::where('id',$student_current_class_entry->patternclass_id+1)->first();
                //                             $patternclass_id=$pc->id;
                //                             $values = array('prn' => $prn, 'sem' => $sem, 'patternclass_id' => $patternclass_id);
                //                             $student->currentclassstudent()->create($values);
                //                             $student->studentadmission()->create(['student_id'=>$student->id,'patternclass_id'=>$patternclass_id,'academicyear_id'=>$currentexam->first()->academicyear_id],['student_id','patternclass_id','academicyear_id']);
                //                         }
                //                         } 
                //                         }
                //                     }
                //                     break;
                //                 case 5:
                //                     $sem=6;
                //                     $patternclass_id= $student_current_class_entry->patternclass->id; 
                //                     $values = array('prn' => $prn, 'sem' => $sem, 'patternclass_id' => $patternclass_id);
                //                     $student->currentclassstudent()->create($values);
                                
                                
                //                     break;
                //             }
                    
                //     }
                
                //     if (1 == session('key')) {
                //         session()->forget('key');
    
    
    
                //         $activeexam = Exam::where('status', '1')->get()->first();
                //         $applicationdata = Examformmaster::where('inwardstatus', '0')->where('patternclass_id', $patternclass_id)->where('exam_id', $activeexam->id)->orderBy('created_at', 'DESC')->get();
                //         return view('inwardform.create', compact('applicationdata', 'patternclass_id'));
                //         //  return view('inwardform.oneinward',compact('patternclass_id'))->with('success','Exam Inwarded Successfully!!!');
                //         //   return redirect()->route('examform.oneinward')->with('success','Exam Inwarded Successfully');
                //     } else {
    
                //         $patternclass=PatternClass::find($patternclass_id );
                //         $cnt=$patternclass->examformmasters->where('exam_id',$activeexam->id)->where('inwardstatus','1')->count();
                
                //         return view('inwardform.oneinward', compact('patternclass_id','cnt'))->with('error', 'Application Inwarded Successfully!!! !!!');
                //         //return view('inwardform.oneinward',compact('patternclass_id'));   
                //     }
                // }
                // else
                // {
                //     $patternclass=PatternClass::find($patternclass_id );
                //     $cnt=$patternclass->examformmasters->where('exam_id',$activeexam->id)->where('inwardstatus','1')->count();
    
                //     return view('inwardform.oneinward', compact('patternclass_id','cnt'))->with('error', 'Application not Confirmed by the student!!! !!!');
            }  

            DB::commit();

            $this->application_id=null;
            $this->inward_id=null;

            $this->dispatch('alert',type:'success',message:'Exam Form Inward Successfully !!');

            if($this->list_by=='o')
            {
                $this->page=1;
            }else
            {
                $this->page=2;
            }
           
        } catch (\Exception $e) {
         
            DB::rollBack();
        
            \Log::error($e);

            $this->dispatch('alert',type:'error',message:'Failed To Inward Exam Form !!');
        }
    }

    public function verify(Examformmaster $exam_form_master)
    {   
        DB::beginTransaction();

        try 
        {
            $exam_form_master->verified_at=now();
            $exam_form_master->update();

            DB::commit();

            $this->application_id=null;
            $this->inward_id=null;
            if($this->list_by=='o')
            {
                $this->page=1;
            }else
            {
                $this->page=2;
            }
            $this->dispatch('alert',type:'success',message:'Exam Form Verified Successfully !!');

        } catch (\Exception $e) {
            
            DB::rollBack();
        
            \Log::error($e);

            $this->dispatch('alert',type:'error',message:'Failed To Verify Exam Form !!');
        }
    }

    public function render()
    {   
        $exam=Exam::where('status',1)->first();
        $exam_form_master_inwards=collect([]);
        $exam_form_masters=collect([]);
        if($this->page==1)
        {
            $this->courses=Course::select('course_name','id')->get();
            if($this->course_id)
            {
               $courseclassids=Courseclass::select('id')->where('course_id',$this->course_id)->pluck('id')->toArray();
               $this->pattern_classes=Patternclass::select('id','pattern_id','class_id')->with('courseclass.course:course_name,special_subject,id','courseclass.classyear:classyear_name,id','pattern:pattern_name,id')->whereIn('class_id',$courseclassids)->get();
            }
        }elseif($this->page==2)
        {   
            if($this->patternclass_id && $this->list_by=="m")
            {
                $exam_form_masters=Examformmaster::where('exam_id',$exam->id)->where('printstatus',1)->where('inwardstatus',0)->where('patternclass_id',$this->patternclass_id)->when($this->search, function ($query, $search) {
                    $query->search($search);
                })->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);
               
                $exam_form_master_inwards=Examformmaster::where('exam_id',$exam->id)->where('printstatus',1)->where('inwardstatus',1)->where('patternclass_id',$this->patternclass_id)->when($this->search, function ($query, $search) {
                    $query->search($search);
                })->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

            }elseif($this->patternclass_id && $this->list_by=="o" && $this->application_id)
            {
                $exam_form_masters = Examformmaster::where('exam_id',$exam->id)->where('printstatus',1)->where('inwardstatus',0)->where('patternclass_id', $this->patternclass_id)->where('id',$this->application_id)->first();
                if($exam_form_masters)
                {   
                    $this->page=3;
                    $this->procced_to_approve($exam_form_masters->id);
                }
            }
        }

        return view('livewire.user.exam-form.inward-exam-form',compact('exam_form_masters','exam_form_master_inwards'))->extends('layouts.user')->section('user');
    }
}
