<?php

namespace App\Livewire\Faculty\FacultyRole;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class RoleDataTable extends Component
{
    use WithPagination;
    public $perPage=10;
    public $search='';
    public $sortColumn="role_name";
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
        $data = Role::when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.faculty.faculty-role.role-data-table' ,compact('data'))->extends('layouts.faculty')->section('faculty');
    }
}
