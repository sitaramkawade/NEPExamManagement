<?php

namespace App\Livewire\User\Exam;
use Excel;
use App\Models\Exam;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\User\ExportExam;

class AllExam extends Component
{
    use WithPagination;
    public $perPage=10;
    public $search='';
    public $sortColumn="exam_name";
    public $sortColumnBy="ASC";
    public $ext;
    public $mode;
    public $exam_id;

    public $current_step=1;
    public $steps=1;
    public $exam_name;
    public $status;
    public $exam_sessions;

    protected function rules()
    {
        return [
        'exam_name' => ['required','string','max:255'],
        'status' => ['required'],
        'exam_sessions' => ['required'],
        ];
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

        $exam->exam_name= $this->exam_name;         
        $exam->status= $this->status==1?0:1;
        $exam->exam_sessions= $this->exam_sessions==1?0:1;
        $exam->save();
        $this->dispatch('alert',type:'success',message:'Added Successfully !!'  );
        $this->resetInputFields();
    }

    public function edit($id){

        $exam = Exam::find($id);

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
                'status' => $this->status==1?0:1,  
                'exam_sessions' => $this->exam_sessions==1?0:1,                    
            ]);
          
            $this->dispatch('alert',type:'success',message:'Updated Successfully !!'  );
            $this->setmode('all');          
    }
    }

    public function deleteExam(Exam $exam)
    {
        $exam->delete();
       
        $this->dispatch('alert',type:'success',message:'Deleted Successfully !!'  );
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
        })->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.exam.all-exam',compact('exams'))->extends('layouts.user')->section('user');
    }
}