<?php

namespace App\Livewire\Faculty\FacultyRoleType;

use Livewire\Component;
use App\Models\Roletype;
use Livewire\WithPagination;

class RoleTypeDataTable extends Component
{

    use WithPagination;
    public $perPage=10;
    public $search='';
    public $sortColumn="roletype_name";
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
        $data = Roletype::when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.faculty.faculty-role-type.role-type-data-table' ,compact('data'))->extends('layouts.faculty')->section('faculty');
    }
}
