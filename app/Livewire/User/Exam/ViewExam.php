<?php

namespace App\Livewire\User\Exam;

use App\Models\Exam;
use Livewire\Component;
use Livewire\WithPagination;

class ViewExam extends Component
{
    use WithPagination;
    public $perPage=10;
    public $search='';
    public $sortColumn="exam_name";
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

    public function deleteExam(Exam $exam)
    {
        $exam->delete();
       
        $this->dispatch('alert',type:'success',message:'Deleted Successfully !!'  );
    }
   
    public function render()
    {
        $exams=Exam::when($this->search, function ($query, $search) {
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.exam.view-exam',compact('exams'))->extends('layouts.user')->section('user');
    }
}
