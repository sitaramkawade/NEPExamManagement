<?php

namespace App\Livewire\User\Exam;
use Excel;
use App\Models\Exam;
use Livewire\Component;
use App\Models\Academicyear;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Exports\User\Exam\ExportExam;


class AllExam extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;
    public $mode='all';
    #[Locked] 
    public $exam_id;
    public $current_step=1;
    public $steps=1;
    public $exam_name;
    public $status;
    public $exam_sessions;
    public $academicyear_id;
    public $academics;
    #[Locked] 
    public $delete_id;
 

    protected function rules()
    {
        return [
        'exam_name' => ['required','string','max:100'],
        'academicyear_id' => ['required',Rule::exists('academicyears', 'id')],
        'status' => ['required'],
        'exam_sessions' => ['required'],
        ];
    }

    public function messages()
    {   
        $messages = [
        'exam_name.required' => 'The exam name is required.',
        'exam_name.string' => 'The exam name must be a string.',
        'exam_name.max' => 'The exam name may not be greater than 100 characters.',
        'academicyear_id.required' => 'The academic year ID is required.',
        'academicyear_id.exists' => 'The selected academic year ID is invalid.',
        'status.required' => 'The status is required.',
        'exam_sessions.required' => 'At least one exam session is required.',
        ];
        return $messages;
    }

    public function resetinput()
    {
        $this->exam_name=null;
        $this->academicyear_id=null;
        $this->status=null;
        $this->exam_sessions=null;
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

    public function add(Exam  $exam)
    {      
        $validatedData = $this->validate();

        if ($validatedData) 
        {
            $exam->exam_name= $this->exam_name;         
            $exam->academicyear_id= $this->academicyear_id;         
            $exam->status= $this->status;
            $exam->exam_sessions= $this->exam_sessions;
            $exam->save();
            $this->dispatch('alert',type:'success',message:'Added Successfully !!'  );
            $this->setmode('all');
        }
    }

    public function edit(Exam $exam)
    {
        if ($exam) 
        {
            $this->exam_id=$exam->id;
            $this->exam_name = $exam->exam_name;
            $this->academicyear_id = $exam->academicyear_id;
            $this->status = $exam->status;          
            $this->exam_sessions = $exam->exam_sessions;          
            $this->setmode('edit');
        }
    }

    public function update(Exam $exam)
    {
        $validatedData = $this->validate();      
        if ($validatedData) {
                   
            $exam->update([                         
                'exam_name' => $this->exam_name,              
                'academicyear_id' => $this->academicyear_id,              
                'status' => $this->status,  
                'exam_sessions' => $this->exam_sessions,                    
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
        try
        {
            $exam = Exam::withTrashed()->find($this->delete_id);
            $exam->forceDelete();
            $this->dispatch('alert',type:'success',message:'Exam Deleted Successfully !!');
        } catch
        (\Illuminate\Database\QueryException $e) 
            {
            if ($e->errorInfo[1] == 1451) 
            {
                $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
            } 
        }
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
        $this->academics=Academicyear::select('year_name','id')->where('active',1)->get();

        $exams=Exam::select('id','exam_name','exam_sessions','academicyear_id','status','deleted_at')
        ->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.exam.all-exam',compact('exams'))->extends('layouts.user')->section('user');
    }
}
