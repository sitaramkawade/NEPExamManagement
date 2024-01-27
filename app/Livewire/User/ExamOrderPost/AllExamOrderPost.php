<?php

namespace App\Livewire\User\ExamOrderPost;

use Excel;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ExamOrderPost;
use App\Exports\User\ExamOrderPost\ExportExamOrderPost;

class AllExamOrderPost extends Component
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
    public $post_name;
    public $start_date;
    public $end_date;
    public $status;

    #[Locked] 
    public $post_id;

    public function rules()
    {
        return [
            'post_name' => ['required', 'string','max:50'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
            
             ];
    }

    public function messages()
    {   
        $messages = [
            'post_name.required' => 'The Post Name is required.',
            'post_name.string' => 'The Post Name must be a string.',
            'post_name.max' => 'The Post Name must not exceed :max characters.',
            'start_date.required' => 'The Start Date field is required.',
            'start_date.date' => 'The Start Date must be a valid Date.',
            'end_date.required' => 'The End Date field is required.',
            'end_date.date' => 'The End Date must be a valid Date.',
           
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
        $this->post_name= null;
        $this->start_date=null;
        $this->end_date=null;
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
        $filename="Course-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportExamOrderPost($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportExamOrderPost($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportExamOrderPost($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function add()
    {
        $this->validate();

        $examorderpost =  new ExamOrderPost;
        $examorderpost->create([
            'post_name' => $this->post_name,
            'start_date'=>$this->start_date,
            'end_date'=>$this->end_date,
            'status'=>$this->status,
        
           
        ]);
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Exam Order Post Created Successfully !!');
    }

    public function edit(ExamOrderPost $examorderpost)
    {   
        $this->resetinput();
        $this->post_id=$examorderpost->id;
        $this->post_name= $examorderpost->post_name;
        $this->start_date = date('Y-m-d', strtotime($examorderpost->start_date));
        $this->end_date=date('Y-m-d', strtotime($examorderpost->end_date));
        $this->status= $examorderpost->status;
      
        $this->setmode('edit');
    }

    public function update(ExamOrderPost $examorderpost)
    {
        $this->validate();

        $examorderpost->update([
            'post_name' => $this->post_name,
            'start_date'=>$this->start_date,
            'end_date'=>$this->end_date,
            'status'=>$this->status,
           
        ]);
       
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Exam Order Post Updated Successfully !!');

    }

    public function Status(ExamOrderPost $examorderpost)
    {
        if($examorderpost->status)
        {
            $examorderpost->status=0;
        }
        else
        {
            $examorderpost->status=1;
        }
        $examorderpost->update();
    }


    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function delete(ExamOrderPost  $examorderpost)
    {   
        $examorderpost->delete();
        $this->dispatch('alert',type:'success',message:'Exam Order Post Soft Deleted Successfully !!');
    }

    public function restore($id)
    {   
        $examorderpost = ExamOrderPost::withTrashed()->find($id);
        $examorderpost->restore();
        $this->dispatch('alert',type:'success',message:'Exam Order Post Restored Successfully !!');
    }

    public function forcedelete()
    {   
        $examorderpost = ExamOrderPost::withTrashed()->find($this->delete_id);
        $examorderpost->forceDelete();
        $this->dispatch('alert',type:'success',message:'Exam Order Post Deleted Successfully !!');
    }
    
    public function render()
    {
        $Posts=ExamOrderPost::when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);
        
        return view('livewire.user.exam-order-post.all-exam-order-post',compact('Posts'))->extends('layouts.user')->section('user');
    }
}
