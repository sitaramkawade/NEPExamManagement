<?php

namespace App\Livewire\User;

use App\Models\College;
use Livewire\Component;
use App\Models\University;
use Livewire\WithPagination;

class ViewUniversity extends Component
{
    use WithPagination;
    public $perPage=10;
    public $page = 1;
    public $sno;
    public $search='';
    public $sortColumn="sanstha_name";
    public $sortColumnBy="ASC";
    public $data;
    public $universities;

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

    
    public function mount()
    {
        $this->universities = University::all();
    }

    public function deleteUniversity($id)
    {
        $university = University::find($id);

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
        return view('livewire.user.view-university')->extends('layouts.user')->section('user');
    }
}
