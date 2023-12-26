<?php

namespace App\Livewire\Faculty;

use App\Models\Faculty;
use Livewire\Component;
use Livewire\WithPagination;

class FacultyDataTable extends Component
{
    use WithPagination;
    public $perPage=10;
    public $sno;
    public $search='';
    public $sortColumn="faculty_name";
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
        $data = Faculty::with('role')->withTrashed()->where(function ($query) {
            $query->where('faculties.faculty_name', 'like', "%{$this->search}%")->orWhere('faculties.role_id', 'like', "%{$this->search}%")->orWhereHas('role', function ($subQuery) {
                $subQuery->where('role_name', 'like', "%{$this->search}%");
            });
        })
        ->orderBy($this->sortColumn, $this->sortColumnBy)
        ->paginate($this->perPage);
        return view('livewire.faculty.faculty-data-table' ,compact('data'))->extends('layouts.faculty')->section('faculty');
    }
}
