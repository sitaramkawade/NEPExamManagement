<?php

namespace App\Livewire\User\ExamBacklogFeeCourse;

use Excel;
use Livewire\Component;
use App\Models\Semester;
use App\Models\Patternclass;
use Livewire\WithPagination;
use App\Models\Examfeemaster;
use Illuminate\Validation\Rule;
use App\Models\Exambacklogfeecourse;
use App\Exports\User\ExamBacklogFeeCourse\ExamBacklogFeeCourseExport;

class AllExamBacklogFeeCourse extends Component
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

    public $active_status=[];
    public $backlogfees=[];
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
                $rules["backlogfees.".$fee->id] = ['nullable','integer', 'digits_between:1,11'];

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
                $messages["backlogfees.".$fee->id.".required"] = "The ".$fee->fee_type." Backlog Fee field is required.";
                $messages["backlogfees.".$fee->id.".integer"] = "The ".$fee->fee_type." BacklogFee must be an integer.";
                $messages["backlogfees.".$fee->id.".digits_between"] = "The ".$fee->fee_type." Backlog Fee must be between :min and :max digits.";

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
        $this->backlogfees=[];
        $this->examfees_id=null;
        $this->patternclass_id=null;
        $this->approve_status=null;
        $this->active_status=[];
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
        $filename="Exam-Backlog-Fee-Course".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExamBacklogFeeCourseExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExamBacklogFeeCourseExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExamBacklogFeeCourseExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function add()
    {   
        $this->validate();
        foreach ($this->backlogfees as $key => $fee) {
            if (isset($key) && $fee !== "" && $fee !== null)
            {
                $activeStatus = isset($this->active_status[$key]) ? ($this->active_status[$key] == true ? 0 : 1) : 1;
                Exambacklogfeecourse::create([
                    'examfees_id' => $key,
                    'backlogfee' => $fee==""?0:$fee,
                    'sem' => $this->sem,
                    'patternclass_id' => $this->patternclass_id,
                    'active_status' =>   $activeStatus,
                ]);
            }
        }

        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Exam Fee Created Successfully !!');
    }


    public function edit(Exambacklogfeecourse $exambacklogfeecourse)
    {   
        $this->resetinput();

        $this->edit_id= $exambacklogfeecourse->id;
        $this->sem=$exambacklogfeecourse->sem;
        $this->patternclass_id=$exambacklogfeecourse->patternclass_id;
        
        $exambacklogfeecourses=Exambacklogfeecourse::where('patternclass_id',$exambacklogfeecourse->patternclass_id)->where('sem',$exambacklogfeecourse->sem)->get();
        foreach($exambacklogfeecourses as $fee)
        {   
            $this->backlogfees[$fee->examfees_id]=$fee->backlogfee;
            $this->active_status[$fee->examfees_id]=$fee->active_status==1?false:true;
        }
  
        $this->setmode('edit');
    }

    public function update(Exambacklogfeecourse $exambacklogfeecourse)
    {
        $this->validate();
        foreach ($this->backlogfees as $key => $fee) {
            if (isset($key) && $fee !== "" && $fee !== null)
            {   
                $modify = Exambacklogfeecourse::where('sem',$this->sem)->where('patternclass_id',$this->patternclass_id)->where('examfees_id', $key)->latest()->first();

                if (isset($modify) && $modify->backlogfee != $fee) 
                {
                    Exambacklogfeecourse::create([
                        'examfees_id' => $key,
                        'backlogfee' => $fee ?? 0,
                        'sem' => $this->sem,
                        'patternclass_id' => $this->patternclass_id,
                        'active_status' => isset($this->active_status[$key]) ? ($this->active_status[$key] == true ? 0 : 1) : 1,
                    ]);
                        
                    $modify->active_status=0;
                    $modify->update();
                    $modify=null;
                } else 
                {
                    Exambacklogfeecourse::updateOrCreate(
                        [
                            'examfees_id' => $key,
                            'sem' => $exambacklogfeecourse->sem,
                            'patternclass_id' => $exambacklogfeecourse->patternclass_id,
                        ],
                        [
                            'examfees_id' => $key,
                            'backlogfee' =>$fee ?? 0,
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
        $this->dispatch('alert',type:'success',message:'Exam Fee Updated Successfully !!');

    }

    public function status(Exambacklogfeecourse $exambacklogfeecourse)
    {   
        if($exambacklogfeecourse->active_status)
        {
           $exambacklogfeecourse->active_status=0;
        }
        else 
        {
           $exambacklogfeecourse->active_status=1;
        }
       $exambacklogfeecourse->update();

        $this->dispatch('alert',type:'success',message:'Exam Fee Status Updated Successfully !!');
    }

    public function approve(Exambacklogfeecourse $exambacklogfeecourse)
    {   
        
        if($exambacklogfeecourse->approve_status==1)
        {
           $exambacklogfeecourse->approve_status=0;
            $this->dispatch('alert',type:'success',message:'Exam Fee Not Approved Successfully !!');
        }
        else 
        {
           $exambacklogfeecourse->approve_status=1;
            $this->dispatch('alert',type:'success',message:'Exam Fee Approved Successfully !!');
        }
       $exambacklogfeecourse->update();
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }


    public function delete(Exambacklogfeecourse $exambacklogfeecourse)
    {   
       $exambacklogfeecourse->delete();
        $this->dispatch('alert',type:'success',message:'Exam Fee Soft Deleted Successfully !!');
    }
    
    public function restore($id)
    {   
       $exambacklogfeecourse = Exambacklogfeecourse::withTrashed()->find($id);
       $exambacklogfeecourse->restore();
        $this->dispatch('alert',type:'success',message:'Exam Fee Restored Successfully !!');
    }

    public function forcedelete()
    {   
       $exambacklogfeecourse = Exambacklogfeecourse::withTrashed()->find($this->delete_id);
       $exambacklogfeecourse->forceDelete();
        $this->dispatch('alert',type:'success',message:'Exam Fee Deleted Successfully !!');
    }

    public function render()
    {   
        if($this->mode!=='all')
        {
            $this->semesters = Semester::select('id', 'semester')->where('status', 1)->get();
            $this->patternclasses = Patternclass::select('id', 'class_id', 'pattern_id')->with(['pattern:pattern_name,id','courseclass.classyear:classyear_name,id','courseclass.course:course_name,id'])->where('status', 1)->get();

            if($this->mode=='add')
            {
                $examfeeids = Exambacklogfeecourse::select('examfees_id')->where('patternclass_id', $this->patternclass_id)->where('sem', $this->sem)->get();
            }else
            {
                $examfeeids=null; 
            }

            $this->examfees = Examfeemaster::select('id', 'fee_type')->when($examfeeids, function ($query) use ($examfeeids) {
                    return $query->whereNotIn('id', $examfeeids);
            })->where('active_status', 1)->get();
        }
        
        $exambacklogfeecourses=Exambacklogfeecourse::select('id','backlogfee','sem','approve_status','patternclass_id','examfees_id','active_status','deleted_at')
        ->with(['patternclass.pattern:pattern_name,id','examfee:fee_type,id','patternclass.courseclass.classyear:classyear_name,id','patternclass.courseclass.course:course_name,id'])
        ->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.exam-backlog-fee-course.all-exam-backlog-fee-course',compact('exambacklogfeecourses'))->extends('layouts.user')->section('user');
    }
}
