<?php

namespace App\Livewire\User\ExamForm;

use Excel;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Examformmaster;
use App\Exports\User\ExamForm\ExamFormExport;

class AllExamForm extends Component
{   
    use WithPagination;


    public $mode='all';
    public $perPage=10;
    public $search='';
    public $sortColumn="patternclass_id";
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
        $filename="Exam-Form-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExamFormExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExamFormExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExamFormExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }




    public function render()
    {   
        $exam_form_masters =Examformmaster::when($this->search, function ($query, $search) {
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.exam-form.all-exam-form',compact('exam_form_masters'))->extends('layouts.user')->section('user');
    }

}
