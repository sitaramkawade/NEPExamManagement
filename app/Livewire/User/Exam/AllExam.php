<?php

namespace App\Livewire\User\Exam;
use Excel;
use App\Models\Exam;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\User\Exam\ExportExam;


class AllExam extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    public $perPage=10;
    public $search='';
    public $sortColumn="exam_name";
    public $sortColumnBy="ASC";
    public $ext;
    public $mode='all';
    public $exam_id;
    public $current_step=1;
    public $steps=1;
    public $exam_name;
    public $status;
    public $exam_sessions;
    #[Locked] 
    public $delete_id;
 

    protected function rules()
    {
        return [
        'exam_name' => ['required','string','max:100'],
        'status' => ['required'],
        'exam_sessions' => ['required'],
        ];
    }

    public function messages()
    {   
        $messages = [
            'exam_name.required' => 'The Exam Name field is required.',
            'exam_name.string' => 'The Exam Name must be a string.',
            'exam_name.max' => 'The  Exam Name must not exceed :max characters.',
            'exam_sessions.required' => 'The Exam Session field is required.',
        ];
        return $messages;
        }

    public function resetinput()
    {
        $this->exam_name=null;
        $this->status=null;
        $this->exam_sessions=null;
    }

    public function resetInputFields()
    {
        // Reset the specified properties to their initial state
        $this->reset(['exam_name', 'status' ,'exam_sessions']);
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function setmode($mode)
    {
        if($mode=='add')
        {
            $this->resetinput();
        }
        $this->mode=$mode;
    }

    public function add(Exam  $exam){
        
        $validatedData = $this->validate();
       
        if ($validatedData) {

        $exam->exam_name= $this->exam_name;         
        $exam->status= $this->status;
        $exam->exam_sessions= $this->exam_sessions==1?0:1;
        $exam->save();
        $this->dispatch('alert',type:'success',message:'Added Successfully !!'  );
        $this->setmode('all');
    }
}

    public function edit(Exam $exam){

        if ($exam) {
            $this->exam_id=$exam->id;
            $this->exam_name = $exam->exam_name;
            $this->status = $exam->status;          
            $this->exam_sessions = $exam->exam_sessions;          
            $this->setmode('edit');
        }
    }

    public function update(Exam $exam){

        $validatedData = $this->validate();
       
        if ($validatedData) {
                   
            $exam->update([
                              
                'exam_name' => $this->exam_name,              
                'status' => $this->status,  
                'exam_sessions' => $this->exam_sessions==1?0:1,                    
            ]);
          
            $this->dispatch('alert',type:'success',message:'Updated Successfully !!'  );
            $this->setmode('all');          
    }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }
    
    
    public function delete(Exam  $exam)
    {   
        $exam->delete();
        $this->dispatch('alert',type:'success',message:'Exam Soft Deleted Successfully !!');
    }
    
    public function restore($id)
    {   
        $exam = Exam::withTrashed()->find($id);
        $exam->restore();
        $this->dispatch('alert',type:'success',message:'Exam Restored Successfully !!');
    }
    
    public function forcedelete()
    {  
        $exam = Exam::withTrashed()->find($this->delete_id);
        $exam->forceDelete();
        $this->dispatch('alert',type:'success',message:'Exam Deleted Successfully !!');
    }


    public function Status(Exam $exam)
    {
        if($exam->status)
        {
            $exam->status=0;
        }
        else
        {
            $exam->status=1;
        }
        $exam->update();
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

    public function export()
    {   
        $filename="Exam-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportExam($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportExam($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportExam($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }     
    }

    public function render()
    {
        $exams=Exam::when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.exam.all-exam',compact('exams'))->extends('layouts.user')->section('user');
    }
}
