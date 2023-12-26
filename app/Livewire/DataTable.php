<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\District;
use Livewire\WithPagination;

class DataTable extends Component
{   
    use WithPagination;
    public $perPage=10;
    public $page = 1;
    public $sno;
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
        $data=District::join('states', 'districts.state_id', '=', 'states.id')->where(function ($query) {
            $query->where('districts.district_name', 'like', "%{$this->search}%")->Orwhere('districts.district_code', 'like', "%{$this->search}%")->orWhere('states.state_name', 'like', "%{$this->search}%");
        })->orderBy($this->sortColumn,$this->sortColumnBy)->paginate($this->perPage);
        $this->sno = ($this->page - 1) * 10 + 1;
        return view('livewire.data-table' ,compact('data'))->extends('layouts.student')->section('student');
    }
}
