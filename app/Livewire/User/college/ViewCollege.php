<?php

namespace App\Livewire\User\college;

use Excel;
use App\Models\College;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\user\ExportCollege;

class ViewCollege extends Component
{
    
    use WithPagination;
    public $perPage=10;
    public $search='';
    public $sortColumn="college_name";
    public $sortColumnBy="ASC";
    public $ext;


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
 
    public function export()
    {   
        $filename="College-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportCollege($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportCollege($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportCollege($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
       
    }
       


    public function deleteCollege(College $college)
    {
        $college->delete();
       
        $this->dispatch('alert',type:'success',message:'Deleted Successfully !!'  );
    }

    public function render()
    {   
        $colleges=College::when($this->search, function ($query, $search) {
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);
        
        return view('livewire.user.college.view-college',compact('colleges'))->extends('layouts.user')->section('user');
    }

}

   