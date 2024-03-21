<?php

namespace App\Livewire\User\SubjectOrder;

use App\Models\Faculty;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Exampanel;
use App\Models\Examorder;
use App\Jobs\SendEmailJob;
use App\Models\Department;
use Illuminate\Support\Str;
use App\Models\Patternclass;
use App\Models\Examorderpost;
use Illuminate\Support\Facades\Auth;

class GenerateSubjectOrder extends Component
{
    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;
    public $department_id;
    public $departments;
    // public $faculty_id;
    public $faculty_ids=[];
    public $faculties=[];
    public $patternclass_id;
    public $patternclasses;
    public $subject_id;
    public $subjects=[];
    public $examorderpost_id;
    public $examorderposts;
    public $exam_patternclass_id;
    public $exampatternclasses;
    public $description;
    public $mode='add';

    public function add()
    {
        $subjectorder =[];
        foreach( $this->faculty_ids as  $examorderpost_id => $faculty_id)
      {
            $subjectorder[]=[
                'subject_id'=>$this->subject_id,
                'examorderpost_id'=>$examorderpost_id,
                'faculty_id'=>$faculty_id,
                'description'=>'', 
                'active_status'=>0,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        $insertResult = Exampanel::insert($subjectorder);

        if ($insertResult) 
        {
           
            $exampanels = Exampanel::whereIn('examorderpost_id', array_keys($this->faculty_ids))
                                    ->where('subject_id', $this->subject_id)
                                    ->get();
        
            foreach ($exampanels as $exampanel) 
            {
                // Access $exampanel->subject->patternclass safely here
                if ( $exampanel->subject->patternclass) 
               {
                    $examids = Exam::where('status',1)->pluck('id')->toArray();
                    $exampatternclasses = $exampanel->subject->patternclass->examPatternClasses->whereIn('exam_id',$examids);
                    foreach($exampatternclasses as $exampatternclass)
                        {
                            $exam_order_data = [];

                            $token = Str::random(30);
                            $panels = [
                                'user_id'=>Auth::guard('user')->user()->id,
                                'exampanel_id' => $exampanel->id,
                                'exam_patternclass_id' => $exampatternclass->id,
                                'email_status' => 1,
                                'description' => '',
                                'token'=>  $token,
                                'created_at' => now(),
                                'updated_at' => now()
                            ];
     
                            $exam_order_data[] = Examorder::create($panels);

                            if ($exampatternclass->examorder && $exampatternclass->examorder->where('email_status', '0')->isNotEmpty()) {
                                foreach ($exampatternclass->examorder->where('email_status', '0') as $examOrder) {
                                $examOrderIds=$examOrder->id;
                                SendEmailJob::dispatch([$examOrderIds]);
                            }
                            }

                        }
                }
            }
        }
        
        $this->dispatch('alert',type:'success',message:'Emails have been sent successfully !!'  );
    }

    
    public function render()
    {
        if($this->mode=='add')
    {
        $this->departments=Department::where('status',1)->pluck('dept_name','id');
        $this->patternclasses=Patternclass::select('id','class_id','pattern_id')->with(['pattern:pattern_name,id','courseclass.course:course_name,id','courseclass.classyear:classyear_name,id'])->where('status',1)->get();
        $this->examorderposts = Examorderpost::select('id', 'post_name')->where('status', 1)->get();
        // $this->faculties=Faculty::where('active',1)->pluck('faculty_name','id');

        if($this->department_id)
            {
                $this->faculties=Faculty::where('active',1)->where('department_id',$this->department_id)->pluck('faculty_name','id');
            }

        if($this->patternclass_id)
        {
            $this->subjects = Subject::where('status', 1)->where('patternclass_id', $this->patternclass_id)->pluck('subject_name', 'id');
        }
    }


        $panels=Exampanel::select('id','faculty_id','subject_id','examorderpost_id','description','active_status','deleted_at')
        ->with(['faculty:faculty_name,id','subject:subject_name,id','examorderpost:post_name,id'])
        ->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->paginate($this->perPage);

        return view('livewire.user.subject-order.generate-subject-order')->extends('layouts.user')->section('user');
    }
}
