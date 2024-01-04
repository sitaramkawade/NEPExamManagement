<?php

namespace App\Livewire\User\Pattern;

use App\Models\Pattern;
use Livewire\Component;
use Livewire\WithPagination;

class ViewPattern extends Component
{
    use withPagination;
    public $perPage=10;
    public $search='';
    public $sortColumn="pattern_name";
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

    public function deletePattern(Pattern $pattern)
    {
        $pattern->delete();
        
        $this->dispatch('alert',type:'success',message:'Deleted Successfully !!'  );
    }
 

    public function render()
    {
        $patterns=Pattern::when($this->search, function ($query, $search) {
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.pattern.view-pattern',compact('patterns'))->extends('layouts.user')->section('user');
    }
}

