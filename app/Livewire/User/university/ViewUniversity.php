<?php

namespace App\Livewire\User\university;

use Excel;
use App\Models\College;
use Livewire\Component;
use App\Models\University;
use Livewire\WithPagination;
use App\Exports\user\ExportUniversity;

class ViewUniversity extends Component
{
    use WithPagination;
    public $perPage=10; 
    public $search='';
    public $sortColumn="university_name";
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
        $filename="University-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportUniversity($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportUniversity($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportUniversity($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
       
    }
    
  

    public function deleteUniversity( University  $university )
    {
      
        if ($university) {
            // Delete the Sanstha and its related colleges
            $university->university()->delete();
            $university->delete();
            $this->mount();
            $this->dispatch('alert',type:'success',message:'Deleted Successfully !!'  );

        }
    }

    
    

    public function render()
    {
        $universities=University::when($this->search, function ($query, $search) {
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);
        return view('livewire.user.university.view-university',compact('universities'))->extends('layouts.user')->section('user');
    }
}
