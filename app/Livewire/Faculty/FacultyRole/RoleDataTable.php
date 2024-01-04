<?php

namespace App\Livewire\Faculty\FacultyRole;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\Faculty\ExportRole;
use Maatwebsite\Excel\Facades\Excel;

class RoleDataTable extends Component
{
    use WithPagination;
    public $perPage=10;
    public $search='';
    public $sortColumn="role_name";
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
        $filename="Role-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportRole($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportRole($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportRole($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }

    }

    public function render()
    {
        $data = Role::when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.faculty.faculty-role.role-data-table' ,compact('data'))->extends('layouts.faculty')->section('faculty');
    }
}
