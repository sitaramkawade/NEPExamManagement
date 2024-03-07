<?php

namespace App\Livewire\User\ExamPanel;

use Excel;
use App\Models\Faculty;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Exampanel;
use App\Models\Patternclass;
use Livewire\WithPagination;
use App\Models\Examorderpost;
use Illuminate\Validation\Rule;
use App\Exports\User\ExamPanel\ExportExamPanel;

class AllExamPanel extends Component
{
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    #[Locked] 
    public $delete_id;

    public $mode='all';
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;
    public $faculty_id;
    public $examorderpost_id;
    public $subject_id;
    public $description;
    public $faculties;
    public $subjects=[];
    public $examorderposts;
    public $active_status;
    public $patternclasses;
    public $patternclass_id;

    #[Locked] 
    public $edit_id;

    public function rules()
    {
        return  [
            'faculty_id' => ['required',Rule::exists('faculties', 'id')],
            'examorderpost_id' => ['required',Rule::exists('exam_order_posts', 'id')],
            'subject_id' => ['required',Rule::exists('subjects', 'id')],
            'description' => ['required','string','max:50'],
        ];
    }

    public function messages()
    {   
        $messages = [
            'faculty_id.required' => 'The Faculty field is required.',
            'faculty_id.exists' => 'The selected Faculty is invalid.',
            'examorderpost_id.required' => 'The Exam Order Post field is required.',
            'examorderpost_id.exists' => 'The selected Exam Order Post is invalid.',
            'subject_id.required' => 'The Subject field is required.',
            'subject_id.exists' => 'The selected Subject is invalid.',
        ];
        return $messages;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->edit_id=null;
        $this->faculty_id= null;
        $this->examorderpost_id=null;
        $this->subject_id=null;
        $this->description=null;
        $this->active_status=null;
        $this->patternclass_id=null;
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
        $filename="Exam-Panel-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportExamPanel($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportExamPanel($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportExamPanel($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function add()
    {
        $this->validate();

        $existingRecord = Exampanel::where('examorderpost_id', 1)
         ->where('subject_id', $this->subject_id)
         ->where('active_status', 1)
         ->first();
        //  dd($existingRecord);

         if ($existingRecord) {
            // Update the status of the existing record to inactive
            $existingRecord->update(['active_status' => 0]);
        }

        $exampanel = new Exampanel();
        $exampanel->faculty_id = $this->faculty_id;
        $exampanel->examorderpost_id = $this->examorderpost_id;
        $exampanel->subject_id = $this->subject_id;
        $exampanel->description = $this->description;
        $exampanel->active_status = 1;
        $exampanel->save();

        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Exam Panel Created Successfully !!');
    }

    public function edit(Exampanel $exampanel)
    {   
        $this->resetinput();
        $this->edit_id=$exampanel->id;
        $this->faculty_id= $exampanel->faculty_id;
        $this->examorderpost_id= $exampanel->examorderpost_id;
        $this->subject_id= $exampanel->subject_id;
        $this->description= $exampanel->description;
        $this->active_status= $exampanel->active_status;    
        $this->setmode('edit');
    }

    public function update(Exampanel $exampanel)
    {
        $this->validate();

        $exampanel->update([
            'faculty_id' => $this->faculty_id,
            'examorderpost_id'=>$this->examorderpost_id,
            'subject_id'=>$this->subject_id,
            'description'=>$this->description,
            'active_status'=>$this->active_status,
           
        ]);
       
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Exam Panel Updated Successfully !!');

    }

    public function Status(Exampanel $exampanel)
    {
        if($exampanel->active_status)
        {
            $exampanel->active_status=0;
        }
        else
        {
            $exampanel->active_status=1;
        }
        $exampanel->update();
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function delete(Exampanel  $exampanel)
    {   
        $exampanel->delete();
        $this->dispatch('alert',type:'success',message:'Exam Panel Soft Deleted Successfully !!');
    }

    public function restore($id)
    {   
        $exampanel = Exampanel::withTrashed()->find($id);
        $exampanel->restore();
        $this->dispatch('alert',type:'success',message:'Exam Order Post Restored Successfully !!');
    }

    public function forcedelete()
    {   
        try
        {
        $exampanel = Exampanel::withTrashed()->find($this->delete_id);
        $exampanel->forceDelete();
        $this->dispatch('alert',type:'success',message:'Exam Order Post Deleted Successfully !!');
    } catch
    (\Illuminate\Database\QueryException $e) {

        if ($e->errorInfo[1] == 1451) {

            $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
        } 
    }
    }


    
    public function render()
    {
        
        if($this->mode!=='all')
        {
            $this->faculties = Faculty::where('active',1)->pluck('faculty_name', 'id');
            $this->examorderposts = Examorderpost::where('status', 1)->pluck('post_name', 'id');
            $this->patternclasses=Patternclass::select('id','class_id','pattern_id')->with(['pattern:pattern_name,id','courseclass.course:course_name,id','courseclass.classyear:classyear_name,id'])->where('status',1)->get();
        }

        if($this->patternclass_id)
        {
            $this->subjects = Subject::where('status', 1)->where('patternclass_id', $this->patternclass_id)->pluck('subject_name', 'id');
        }

        $panels=Exampanel::select('id','faculty_id','subject_id','examorderpost_id','description','active_status','deleted_at')
        ->where('active_status',1)
        ->with(['faculty:faculty_name,id','subject:subject_name,id','examorderpost:post_name,id'])
        ->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.exam-panel.all-exam-panel',compact('panels'))->extends('layouts.user')->section('user');
    }
}
