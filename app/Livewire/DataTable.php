<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\District;
use Livewire\WithPagination;

class DataTable extends Component
{   
    use WithPagination;
    public $perPage=10;
    public $search='';
    public $sortColumn="district_name";
    public $sortColumnBy="ASC";


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


    public function render()
    {   

        $data = District::when($this->search, function ($query, $search) {
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.data-table' ,compact('data'))->extends('layouts.student')->section('student');
    }
}
