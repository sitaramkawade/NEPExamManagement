<?php

namespace App\Livewire\User\Cgpa;

use Excel;
use App\Models\Cgpa;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\User\Cgpa\ExportCgpa;

class AllCgpa extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    public $perPage=10;
    public $search='';
    public $sortColumn="max_gp";
    public $sortColumnBy="ASC";
    public $ext;    
    public $max_gp;    
    public $min_gp;    
    public $grade;    
    public $description;    
    public $cgpa_id;    

    public $delete_id;
    public $mode='all';
    public $steps=1;
    public $current_step=1;

    protected function rules()
    {
        return [
        'max_gp' => ['required','numeric'],
        'min_gp' => ['required','numeric'],
        'grade' => ['required'],
        'description' => ['required'],  
         ];
    }

    public function resetinput()
    {
        $this->max_gp=null;
        $this->min_gp=null;
        $this->grade=null;
        $this->description=null;
      
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

    public function add(Cgpa  $cgpa ){
        
        $validatedData= $this->validate();
       
        if ($validatedData) {

        $cgpa->max_gp = $this->max_gp;
        $cgpa->min_gp = $this->min_gp;
        $cgpa->grade = $this->grade;
        $cgpa->description = $this->description;
        }
        $cgpa->save();

        $this->dispatch('alert',type:'success',message:'Added Successfully !!'  );
        $this->setmode('all');
    }

    public function edit(Cgpa $cgpa){

        if ($cgpa) {
            $this->cgpa_id=$cgpa->id;
            $this->max_gp = $cgpa->max_gp;     
            $this->min_gp = $cgpa->min_gp;
            $this->grade = $cgpa->grade ;
            $this->description = $cgpa->description ;
            $this->setmode('edit');
        }
    }

    
    public function update(Cgpa  $cgpa){

        $validatedData= $this->validate();
       
        if ($validatedData) {        
            $cgpa->max_gp= $this->max_gp;
            $cgpa->min_gp= $this->min_gp;
            $cgpa->grade= $this->grade;
            $cgpa->description= $this->description;
        }

        $cgpa->update();
        $this->dispatch('alert',type:'success',message:'Updated Successfully !!'  );
        $this->setmode('all');
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function delete(Cgpa  $cgpa)
    {   
        $cgpa->delete();
        $this->dispatch('alert',type:'success',message:'Course Soft Deleted Successfully !!');
    }

    public function restore($id)
    {   
        $cgpa = Cgpa::withTrashed()->find($id);
        $cgpa->restore();
        $this->dispatch('alert',type:'success',message:'Course Restored Successfully !!');
    }

    public function forcedelete()
    {  
        $cgpa = cgpa::withTrashed()->find($this->delete_id);
        $cgpa->forceDelete();
        $this->dispatch('alert',type:'success',message:'Course Deleted Successfully !!');
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
        $filename="Class-Year-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportCgpa($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportCgpa($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportCgpa($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }
    
    public function render()
    {
        $cgpas=Cgpa::when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);
        return view('livewire.user.cgpa.all-cgpa',compact('cgpas'))->extends('layouts.user')->section('user');
    }
}
