<?php

namespace App\Livewire\Faculty\FacultyRoleType;

use Livewire\Component;
use App\Models\Roletype;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Faculty\ExportRoletype;

class RoleTypeDataTable extends Component
{

    use WithPagination;
    public $perPage=10;
    public $search='';
    public $sortColumn="roletype_name";
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
        $filename="Roletype-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportRoletype($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportRoletype($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportRoletype($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }

    }

    public function render()
    {
        $data = Roletype::when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.faculty.faculty-role-type.role-type-data-table' ,compact('data'))->extends('layouts.faculty')->section('faculty');
    }
}
