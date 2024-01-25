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
    public $sortColumn="fee";
    public $sortColumnBy="ASC";
    public $ext;

    public $fee;
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
            'fee' => ['required', 'integer','digits_between:1,11'],
            'sem' => ['required', 'integer','digits_between:1,11'],
            'patternclass_id' => ['required',Rule::exists('pattern_classes', 'id')],
            'examfees_id' => ['required',Rule::exists('examfeemasters', 'id')],
        ];
    }

    public function messages()
    {   
        $messages = [
            'fee.required' => 'The Fee field is required.',
            'fee.integer' => 'The Fee must be an integer.',
            'fee.digits_between' => 'The Fee must be between 1 and 11 digits.',
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
        $this->fee=null;
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

       $examfeecourse =  new Examfeecourse;
       $examfeecourse->create([
            'fee' => $this->fee,
            'sem' => $this->sem,
            'examfees_id' => $this->examfees_id,
            'patternclass_id' => $this->patternclass_id,
            'active_status' => $this->active_status==true?0:1,
        ]);
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Exam Fee Created Successfully !!');
    }


    public function edit(Examfeecourse $examfeecourse)
    {   
        $this->resetinput();
        $this->edit_id= $examfeecourse->id;
        $this->fee=$examfeecourse->fee;
        $this->sem=$examfeecourse->sem;
        $this->examfees_id=$examfeecourse->examfees_id;
        $this->patternclass_id=$examfeecourse->patternclass_id;
        $this->active_status=$examfeecourse->active_status==1?0:true;
  
        $this->setmode('edit');
    }

    public function update(Examfeecourse $examfeecourse)
    {
        $this->validate();

       $examfeecourse->update([
            'fee' => $this->fee,
            'sem' => $this->sem,
            'examfees_id' => $this->examfees_id,
            'patternclass_id' => $this->patternclass_id,
            'active_status' => $this->active_status == true ? 0 : 1,
        ]);
       
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Exam Fee Updated Successfully !!');

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

        $this->dispatch('alert',type:'success',message:'Exam Fee Status Updated Successfully !!');
    }

    public function approve(Examfeecourse $examfeecourse)
    {   
        
        if($examfeecourse->approve_status==1)
        {
           $examfeecourse->approve_status=0;
            $this->dispatch('alert',type:'success',message:'Exam Fee Not Approved Successfully !!');
        }
        else 
        {
           $examfeecourse->approve_status=1;
            $this->dispatch('alert',type:'success',message:'Exam Fee Approved Successfully !!');
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
        $this->dispatch('alert',type:'success',message:'Exam Fee Soft Deleted Successfully !!');
    }
    
    public function restore($id)
    {   
       $examfeecourse = Examfeecourse::withTrashed()->find($id);
       $examfeecourse->restore();
        $this->dispatch('alert',type:'success',message:'Exam Fee Restored Successfully !!');
    }

    public function forcedelete()
    {   
       $examfeecourse = Examfeecourse::withTrashed()->find($this->delete_id);
       $examfeecourse->forceDelete();
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
        
        $examfeecourses=Examfeecourse::select('id','fee','sem','approve_status','patternclass_id','examfees_id','active_status','deleted_at')
        ->with(['patternclass.pattern','examfee','patternclass.courseclass.classyear','patternclass.courseclass.course'])
        ->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.exam-fee-course.all-exam-fee-course',compact('examfeecourses'))->extends('layouts.user')->section('user');
    }
}
