<?php

namespace App\Livewire\User\ExamPanel;

use Excel;
use App\Models\Faculty;
use App\Models\Subject;
use Livewire\Component;
use App\Models\ExamPanel;
use Livewire\WithPagination;
use App\Models\ExamOrderPost;
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
    public $subjects;
    public $examorderposts;
    public $active_status;

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

        $exampanel =  new ExamPanel;
        $exampanel->create([
            'faculty_id' => $this->faculty_id,
            'examorderpost_id'=>$this->examorderpost_id,
            'subject_id'=>$this->subject_id,
            'description'=>$this->description,
            'active_status'=>$this->active_status,          
        ]);
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Exam Panel Created Successfully !!');
    }

    public function edit(ExamPanel $exampanel)
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

    public function update(ExamPanel $exampanel)
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

    public function Status(ExamPanel $exampanel)
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

    public function delete(ExamPanel  $exampanel)
    {   
        $exampanel->delete();
        $this->dispatch('alert',type:'success',message:'Exam Panel Soft Deleted Successfully !!');
    }

    public function restore($id)
    {   
        $exampanel = ExamPanel::withTrashed()->find($id);
        $exampanel->restore();
        $this->dispatch('alert',type:'success',message:'Exam Order Post Restored Successfully !!');
    }

    public function forcedelete()
    {   
        $exampanel = ExamPanel::withTrashed()->find($this->delete_id);
        $exampanel->forceDelete();
        $this->dispatch('alert',type:'success',message:'Exam Order Post Deleted Successfully !!');
    }


    
    public function render()
    {
        
        if($this->mode!=='all')
        {
            $this->faculties = Faculty::select('id', 'faculty_name')->get();
            $this->examorderposts = ExamOrderPost::select('id', 'post_name')->where('status', 1)->get();
            $this->subjects = Subject::select('id', 'subject_name')->where('status', 1)->get();
        }

        $panels=ExamPanel::select('id','faculty_id','subject_id','examorderpost_id','description','active_status','deleted_at')
        ->with(['faculty:faculty_name,id','subject:subject_name,id','examorderpost:post_name,id'])
        ->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.exam-panel.all-exam-panel',compact('panels'))->extends('layouts.user')->section('user');
    }
}
