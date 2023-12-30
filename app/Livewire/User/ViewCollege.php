<?php

namespace App\Livewire\User;

use Excel;
use App\Models\College;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\user\ExportCollege;

class ViewCollege extends Component
{
    
    use WithPagination;
    public $perPage=10;
    public $page = 1;
    public $sno;
    public $search='';
    public $sortColumn="college_name";
    public $sortColumnBy="ASC";
    public $data;
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
       


    public function mount()
    {
      
    }

    public function deleteCollege($id)
    {
        College::find($id)->delete();
        $this->mount();
        $this->dispatch('alert',type:'success',message:'Deleted Successfully !!'  );
    }

    public function render()
    {   
        $colleges=College::when($this->search, function ($query, $search) {
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);
        
        return view('livewire.user.view-college',compact('colleges'))->extends('layouts.user')->section('user');
    }

}

   
