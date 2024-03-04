<?php

namespace App\Livewire\User\ExamBuilding;

use Excel;
use App\Models\Exam;
use Livewire\Component;
use App\Models\Building;
use App\Models\Exambuilding;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Exports\User\ExamBuilding\ExportExamBuilding;

class AllExamBuilding extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    public $perPage=10;
    public $search='';
    public $sortColumn="exam_id";
    public $sortColumnBy="ASC";
    public $ext;
    #[Locked] 
    public $delete_id;
    #[Locked] 
    public $edit_id;
    public $exam_id;
    public $building_id;
    public $status;
    public $exam;
    public $building;
    public $mode='all';

    public function rules()
    {
       return [
            'exam_id'=>['required',Rule::exists('exams', 'id')],
            'building_id'=>['required',Rule::exists('buildings', 'id')],  
        ];
    }

    public function messages()
    {   
        $messages = [
            'exam_id.required' => 'The Exam field is required.',
            'exam_id.exists' => 'The selected Programme does not exist.',
            'building_id.required' => 'The Building field is required.',
            'building_id.exists' => 'The selected Programme does not exist.',           
        ];
        return $messages;
    }

    public function resetinput()
    {
        $this->exam_id=null;
        $this->building_id=null;
        $this->status=null;     
    }

    public function add(Exambuilding $exambuilding)
    { 
        $validatedData = $this->validate();
       
        if ($validatedData) {

        $exambuilding->exam_id= $this->exam_id;
        $exambuilding->building_id= $this->building_id;
        $exambuilding->status= $this->status;
        $exambuilding->save();
        $this->dispatch('alert',type:'success',message:'Added Successfully !!'  );
        $this->setmode('all');
        }
    }

    public function edit(Exambuilding $exambuilding ){

        if ($exambuilding) {
            $this->edit_id=$exambuilding->id;
            $this->exam_id = $exambuilding->exam_id;
            $this->building_id = $exambuilding->building_id;
            $this->status = $exambuilding->status;          
            $this->setmode('edit');
        }
    }

    public function update(Exambuilding  $exambuilding){

        $validatedData = $this->validate();
       
        if ($validatedData) {
                   
            $exambuilding->update([
                              
                'exam_id' => $this->exam_id,               
                'building_id' => $this->building_id,               
                'status' => $this->status,                   
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

    public function delete(Exambuilding  $exambuilding)
    {   
        $exambuilding->delete();
        $this->dispatch('alert',type:'success',message:'Exam Building Soft Deleted Successfully !!');
    }

    public function restore($id)
    {   
        $exambuilding = Exambuilding::withTrashed()->find($id);
        $exambuilding->restore();
        $this->dispatch('alert',type:'success',message:'Exam Building Restored Successfully !!');
    }

    public function forcedelete()
    {   
        try
        {
        $exambuilding = Exambuilding::withTrashed()->find($this->delete_id);
        $exambuilding->forceDelete();
        $this->dispatch('alert',type:'success',message:'Block Deleted Successfully !!');
    } catch
    (\Illuminate\Database\QueryException $e) {

        if ($e->errorInfo[1] == 1451) {

            $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
        } 
    }
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

    public function Status(Exambuilding $exambuilding)
    {
        if($exambuilding->status)
        {
            $exambuilding->status=0;
        }
        else
        {
            $exambuilding->status=1;
        }
        $exambuilding->update();
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
        $filename="Exam-Building-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportExamBuilding($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportExamBuilding($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportExamBuilding($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
       
    }
  
    public function render()
    {
        if($this->mode!=='all')
        {
            $this->exam = Exam::where('status',1)->pluck('exam_name','id');
            $this->building = Building::where('status',1)->pluck('building_name','id');
        }

        $exambuildings=Exambuilding::when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.exam-building.all-exam-building',compact('exambuildings'))->extends('layouts.user')->section('user');
    }
}
