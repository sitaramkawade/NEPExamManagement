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
    public $sortColumn="backlogfee";
    public $sortColumnBy="ASC";
    public $ext;

    public $backlogfee;
    public $sem;
    public $patternclass_id;
    public $examfees_id;
    public $approve_status;
    public $active_status;
    public $semesters;
    public $patternclasses;
    public $examfees;
    #[Locked] 
    public $edit_id;


    public function rules()
    {
        return [
            'backlogfee' => ['required', 'integer','digits_between:1,11'],
            'sem' => ['required', 'integer','digits_between:1,11'],
            'patternclass_id' => ['required',Rule::exists('pattern_classes', 'id')],
            'examfees_id' => ['required',Rule::exists('examfeemasters', 'id')],
        ];
    }

    public function messages()
    {   
        $messages = [
            'backlogfee.required' => 'The Backlog Fee field is required.',
            'backlogfee.integer' => 'The Backlog  Fee must be an integer.',
            'backlogfee.digits_between' => 'The Backlog  Fee must be between 1 and 11 digits.',
            'sem.required' => 'The SEM field is required.',
            'sem.integer' => 'The SEM must be an integer.',
            'sem.digits_between' => 'The SEM must be between 1 and 11 digits.',
            'patternclass_id.required' => 'The Pattern Class field is required.',
            'patternclass_id.exists' => 'The selected Pattern Class is invalid.',
            'examfees_id.required' => 'The Exam Fee field is required.',
            'examfees_id.exists' => 'The selected Exam Fee is invalid.',
        ];
        
        return $messages;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->sem=null;
        $this->backlogfee=null;
        $this->examfees_id=null;
        $this->patternclass_id=null;
        $this->approve_status=null;
        $this->active_status=null;
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

       $exambacklogfeecourse =  new Exambacklogfeecourse;
       $exambacklogfeecourse->create([
            'backlogfee' => $this->backlogfee,
            'sem' => $this->sem,
            'examfees_id' => $this->examfees_id,
            'patternclass_id' => $this->patternclass_id,
            'active_status' => $this->active_status==true?0:1,
        ]);
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Exam Fee Created Successfully !!');
    }


    public function edit(Exambacklogfeecourse $exambacklogfeecourse)
    {   
        $this->resetinput();
        $this->edit_id= $exambacklogfeecourse->id;
        $this->backlogfee=$exambacklogfeecourse->backlogfee;
        $this->sem=$exambacklogfeecourse->sem;
        $this->examfees_id=$exambacklogfeecourse->examfees_id;
        $this->patternclass_id=$exambacklogfeecourse->patternclass_id;
        $this->active_status=$exambacklogfeecourse->active_status==1?0:true;
  
        $this->setmode('edit');
    }

    public function update(Exambacklogfeecourse $exambacklogfeecourse)
    {
        $this->validate();

       $exambacklogfeecourse->update([
            'backlogfee' => $this->backlogfee,
            'sem' => $this->sem,
            'examfees_id' => $this->examfees_id,
            'patternclass_id' => $this->patternclass_id,
            'active_status' => $this->active_status == true ? 0 : 1,
        ]);
       
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
            $this->semesters=Semester::select('id','semester')->where('status',1)->get();
            $this->patternclasses=Patternclass::select('id','class_id','pattern_id')->where('status',1)->get();
            $this->examfees=Examfeemaster::select('id','fee_type')->where('active_status',1)->get();
        }
        
        $exambacklogfeecourses=Exambacklogfeecourse::select('id','backlogfee','sem','approve_status','patternclass_id','examfees_id','active_status','deleted_at')
        ->with(['patternclass.pattern','examfee','patternclass.courseclass.classyear','patternclass.courseclass.course'])
        ->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.exam-backlog-fee-course.all-exam-backlog-fee-course',compact('exambacklogfeecourses'))->extends('layouts.user')->section('user');
    }
}
