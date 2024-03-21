<?php

namespace App\Livewire\User\ExamFormStatistics;

use App\Models\Exam;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Examformmaster;
use App\Models\Exampatternclass;
use App\Models\Studentexamformfee;

class ExamFormFeeHeadReport extends Component
{       

    use WithPagination;
    public $perPage=10;
    public $pattern_class_id;

    public function clear()
    {    
        $this->pattern_class_id=null;
    }
    
    public function render()
    {       
        if($this->pattern_class_id)
        {
            $this->resetPage();
        }
        $active_exam=Exam::where('status',1)->first();
        if($active_exam)
        {
            $exampatternclasses =Exampatternclass::where('exam_id', $active_exam->id)->pluck('patternclass_id','id');
            $exam_pattern_classes =Exampatternclass::where('exam_id', $active_exam->id)->when($this->pattern_class_id, function ($query) { $query->where('patternclass_id', $this->pattern_class_id); })->paginate($this->perPage);
        }else
        {
            $exampatternclasses=$exam_pattern_classes = collect();
            $this->dispatch('alert',type:'info',message:'Active Exam Not Found !!'  );
        }

        return view('livewire.user.exam-form-statistics.exam-form-fee-head-report',compact('exam_pattern_classes','active_exam','exampatternclasses'))->extends('layouts.user')->section('user');
    }
}
