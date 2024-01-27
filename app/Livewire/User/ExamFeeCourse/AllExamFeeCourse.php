<?php

namespace App\Livewire\User\ExamFeeCourse;

use Excel;
use Livewire\Component;
use App\Models\Semester;
use App\Models\Patternclass;
use Livewire\WithPagination;
use App\Models\Examfeecourse;
use App\Models\Examfeemaster;
use Illuminate\Validation\Rule;
use App\Exports\User\ExamFeeCourse\ExamFeeCourseExport;

class AllExamFeeCourse extends Component
{
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    #[Locked] 
    public $delete_id;

    public $mode='all';
    public $perPage=10;
    public $search='';
    public $sortColumn="patternclass_id";
    public $sortColumnBy="ASC";
    public $ext;

    public $fees=[];
    public $active_status=[];
    public $sem;
    public $patternclass_id;
    public $examfees_id;
    public $approve_status;
    public $semesters;
    public $patternclasses;
    public $examfees;
    #[Locked] 
    public $edit_id;


    public function rules()
    {
        $rules = [
            'sem' => ['required', 'integer','digits_between:1,11'],
            'patternclass_id' => ['required',Rule::exists('pattern_classes', 'id')],
        ];

        if(count($this->examfees) >0)
        {   
            foreach ($this->examfees as $fee) {
                $rules["fees.".$fee->id] = ['nullable','integer', 'digits_between:1,11'];

            }
        }

        return $rules;
    }

    public function messages()
    {   
        $messages = [
            'sem.required' => 'The SEM field is required.',
            'sem.integer' => 'The SEM must be an integer.',
            'sem.digits_between' => 'The SEM must be between 1 and 11 digits.',
            'patternclass_id.required' => 'The Pattern Class field is required.',
            'patternclass_id.exists' => 'The selected Pattern Class is invalid.',
        ];
        if(count($this->examfees) >0)
        {
            foreach ($this->examfees as $fee) {
                $messages["fees.".$fee->id.".required"] = "The ".$fee->fee_type." Fee field is required.";
                $messages["fees.".$fee->id.".integer"] = "The ".$fee->fee_type."Fee must be an integer.";
                $messages["fees.".$fee->id.".digits_between"] = "The ".$fee->fee_type." Fee must be between :min and :max digits.";

            }   
        }    

        return $messages;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->sem=null;
        $this->fees=[];
        $this->active_status=[];
        $this->patternclass_id=null;
        $this->approve_status=null;
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

    public function setmode($mode)
    {
        if($mode=='add')
        {
            $this->resetinput();
        }
        $this->mode=$mode;
    }

    public function export()
    {
        $filename="Exam-Fee-Course".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExamFeeCourseExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExamFeeCourseExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExamFeeCourseExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function add()
    {   
        $this->validate();
        foreach ($this->fees as $key => $fee) {
            if (isset($key) && $fee !== "" && $fee !== null)
            {
                $activeStatus = isset($this->active_status[$key]) ? ($this->active_status[$key] == true ? 0 : 1) : 1;
                Examfeecourse::create([
                    'examfees_id' => $key,
                    'fee' => $fee==""?0:$fee,
                    'sem' => $this->sem,
                    'patternclass_id' => $this->patternclass_id,
                    'active_status' =>   $activeStatus,
                ]);
            }
        }
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Exam Fee Course Created Successfully !!');
    }


    public function edit(Examfeecourse $examfeecourse)
    {   
        $this->resetinput();
        $this->edit_id= $examfeecourse->id;
        $this->patternclass_id=$examfeecourse->patternclass_id;
        $this->sem=$examfeecourse->sem;
        
        $examfeecourses=Examfeecourse::where('patternclass_id',$examfeecourse->patternclass_id)->where('sem',$examfeecourse->sem)->get();
        foreach($examfeecourses as $fee)
        {   
            $this->fees[$fee->examfees_id]=$fee->fee;
            $this->active_status[$fee->examfees_id]=$fee->active_status==1?false:true;
        }
  
        $this->setmode('edit');
    }

    public function update(Examfeecourse $examfeecourse)
    {
        $this->validate();

        foreach ($this->fees as $key => $fee) {
            if (isset($key) && $fee !== "" && $fee !== null)
            {   
                $modify = Examfeecourse::where('sem',$this->sem)->where('patternclass_id',$this->patternclass_id)->where('examfees_id', $key)->latest()->first();

                if (isset($modify) && $modify->fee != $fee) 
                {
                    Examfeecourse::create([
                        'examfees_id' => $key,
                        'fee' => $fee ?? 0,
                        'sem' => $this->sem,
                        'patternclass_id' => $this->patternclass_id,
                        'active_status' => isset($this->active_status[$key]) ? ($this->active_status[$key] == true ? 0 : 1) : 1,
                    ]);
                        
                    $modify->active_status=0;
                    $modify->update();
                    $modify=null;
                } else 
                {
                    Examfeecourse::updateOrCreate(
                        [
                            'examfees_id' => $key,
                            'sem' => $examfeecourse->sem,
                            'patternclass_id' => $examfeecourse->patternclass_id,
                        ],
                        [
                            'examfees_id' => $key,
                            'fee' =>$fee ?? 0,
                            'sem' => $this->sem,
                            'patternclass_id' => $this->patternclass_id,
                            'active_status' =>  isset($this->active_status[$key]) ? ($this->active_status[$key] == true ? 0 : 1) : 1,
                        ]
                    );
                }
            }
        }
        $activeStatus=null;
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Exam Fee Course Updated Successfully !!');
    }

    public function status(Examfeecourse $examfeecourse)
    {   
        if($examfeecourse->active_status)
        {
           $examfeecourse->active_status=0;
        }
        else 
        {
           $examfeecourse->active_status=1;
        }
       $examfeecourse->update();

        $this->dispatch('alert',type:'success',message:'Exam Fee Course Status Updated Successfully !!');
    }

    public function approve(Examfeecourse $examfeecourse)
    {   
        
        if($examfeecourse->approve_status==1)
        {
            $examfeecourse->approve_status=0;
            $this->dispatch('alert',type:'success',message:'Exam Fee Course Not Approved Successfully !!');
        }
        else 
        {
            $examfeecourse->approve_status=1;
            $this->dispatch('alert',type:'success',message:'Exam Fee Course Approved Successfully !!');
        }
       $examfeecourse->update();
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }


    public function delete(Examfeecourse $examfeecourse)
    {   
        $examfeecourse->delete();
        $this->dispatch('alert',type:'success',message:'Exam Fee Course Soft Deleted Successfully !!');
    }
    
    public function restore($id)
    {   
        $examfeecourse = Examfeecourse::withTrashed()->find($id);
        $examfeecourse->restore();
        $this->dispatch('alert',type:'success',message:'Exam Fee Course Restored Successfully !!');
    }

    public function forcedelete()
    {   
        $examfeecourse = Examfeecourse::withTrashed()->find($this->delete_id);
        $examfeecourse->forceDelete();
        $this->dispatch('alert',type:'success',message:'Exam Fee Course Deleted Successfully !!');
    }

    public function render()
    {   

        if($this->mode!=='all')
        {
            $this->semesters = Semester::select('id', 'semester')->where('status', 1)->get();
            $this->patternclasses = Patternclass::select('id', 'class_id', 'pattern_id')->with(['pattern:pattern_name,id','courseclass.classyear:classyear_name,id','courseclass.course:course_name,id'])->where('status', 1)->get();

            if($this->mode=='add')
            {
                $examfeeids = Examfeecourse::select('examfees_id')->where('patternclass_id', $this->patternclass_id)->where('sem', $this->sem)->get();
            }else
            {
                $examfeeids=null; 
            }

            $this->examfees = Examfeemaster::select('id', 'fee_type')->when($examfeeids, function ($query) use ($examfeeids) {
                    return $query->whereNotIn('id', $examfeeids);
            })->where('active_status', 1)->get();
        }
        
        $examfeecourses=Examfeecourse::select('id','fee','sem','approve_status','patternclass_id','examfees_id','active_status','deleted_at')
        ->with(['patternclass.pattern:pattern_name,id','examfee:fee_type,id','patternclass.courseclass.classyear:classyear_name,id','patternclass.courseclass.course:course_name,id'])
        ->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.exam-fee-course.all-exam-fee-course',compact('examfeecourses'))->extends('layouts.user')->section('user');
    }
}
