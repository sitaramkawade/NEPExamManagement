<?php

namespace App\Livewire;

use Excel;

use Livewire\Component;
use App\Models\District;
use Livewire\WithPagination;
use App\Exports\ExportDistrict;

class DataTable extends Component
{
    use WithPagination;
    public $perPage=10;
    public $search='';
    public $sortColumn="district_name";
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
        $filename="District-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportDistrict($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportDistrict($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportDistrict($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }

    }


    public function render()
    {

        $data = District::select('id','district_name','district_code','state_id')->when($this->search, function ($query, $search) {
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.data-table' ,compact('data'))->extends('layouts.student')->section('student');
    }
}
