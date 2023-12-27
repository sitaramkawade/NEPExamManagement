<?php

namespace App\Livewire\User;

use App\Models\College;
use Livewire\Component;
use Livewire\WithPagination;

class ViewCollege extends Component
{
    use WithPagination;
    
    use WithPagination;
    public $perPage=10;
    public $page = 1;
    public $sno;
    public $search='';
    public $sortColumn="college_name";
    public $sortColumnBy="ASC";
    public $data;


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

   
