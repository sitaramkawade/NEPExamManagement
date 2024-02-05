<?php

namespace App\Livewire\User\GenerateExamOrder;

use App\Models\Exam;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Examorder;
use Livewire\WithPagination;
use App\Models\ExamPatternclass;

class GenerateExamOrder extends Component
{
    use WithPagination;
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;
    public $exam_name;
    public $patternclass_id;
    public $mode='all';
    public $id;
    public $token;

    public function setmode($mode)
    {
        if($mode=='add')
        {
            $this->resetinput();
        }
        $this->mode=$mode;
    }

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
    }

    

    public function render()
    {

        $examids = Exam::where('status',1)->pluck('id')->toArray();
        
        $panels=ExamPatternclass::whereIn('exam_id',$examids)->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.generate-exam-order.generate-exam-order',compact('panels'))->extends('layouts.user')->section('user');
    }
}
