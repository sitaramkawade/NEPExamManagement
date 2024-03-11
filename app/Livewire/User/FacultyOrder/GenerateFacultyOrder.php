<?php

namespace App\Livewire\User\FacultyOrder;

use Carbon\Carbon;
use App\Models\Faculty;
use App\Models\Subject;
use Livewire\Component;
use App\Mail\MyTestMail;
use App\Models\Examorder;
use App\Models\Exampanel;
use App\Jobs\SendEmailJob;
use App\Models\Department;
use Illuminate\Support\Str;
use App\Models\Patternclass;
use Livewire\WithPagination;
use App\Models\Examorderpost;
use App\Models\Subjectcategory;
use App\Models\Exampatternclass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class GenerateFacultyOrder extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;
    public $department_id;
    public $departments;
    public $faculty_id;
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

    public function resetinput()
    {
         $this->faculty_id=null;
         $this->examorderpost_id=null;
         $this->subject_id=null;
         $this->department_id=null;
         $this->patternclass_id=null;
         $this->description=null;
       
        
    }

    public function setmode($mode)
    {
        if($mode=='add')
        {
            $this->resetinput();
        }
        $this->mode=$mode;
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

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function add()
    {
        $exampanel=new Exampanel;
        // $exampanel->user_id= 1;
        $exampanel->faculty_id= $this->faculty_id;
        $exampanel->examorderpost_id= $this->examorderpost_id;
        $exampanel->subject_id= $this->subject_id;
        $exampanel->description= $this->description;
        $exampanel->active_status= 0;
        $exampanel->save();

        if ($exampanel->subject->patternclass)  
        {
            $exampatternclasses = $exampanel->subject->patternclass->examPatternClasses->where('launch_status',1);
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
                    'created_at' => now(),
                    'updated_at' => now()
                ];
     
                $exam_order_data[] = Examorder::create($panels);

            }

            $examOrderIds = [];

            foreach ($exampatternclasses as $exampatternclass) {   
                if ($exampatternclass->examorder && $exampatternclass->examorder->where('email_status', '0')->isNotEmpty()) {
                     foreach ($exampatternclass->examorder->where('email_status', '0') as $examOrder) {
                        $examOrderIds=$examOrder->id;
                        SendEmailJob::dispatch([$examOrderIds]);
                    }
                }
            }
  
            $this->dispatch('alert',type:'success',message:'Emails have been sent successfully !!'  );
             $this->resetinput();
             $this->setmode('add');
        }
    
    }


    public function render()
    {  
          if($this->mode=='add')
         {
            $this->departments=Department::where('status',1)->pluck('dept_name','id');
            $this->patternclasses=Patternclass::select('id','class_id','pattern_id')->with(['pattern:pattern_name,id','courseclass.course:course_name,id','courseclass.classyear:classyear_name,id'])->where('status',1)->get();
            $this->examorderposts = Examorderpost::where('status', 1)->pluck('post_name','id');
            // $this->exampatternclasses = Exampatternclass::select('id','exam_id','patternclass_id')->get();    
       
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
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

    
        return view('livewire.user.faculty-order.generate-faculty-order',compact('panels'))->extends('layouts.user')->section('user');
    }
}



