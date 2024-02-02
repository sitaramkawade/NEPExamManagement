<?php

namespace App\Livewire\Student\StudentExamForm;


use App\Models\Subject;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class StudentExamForm extends Component
{  
    public $medium_instruction;
    public $abcid;

    public function render()
    {   
        $regular_subjects = Subject::where('patternclass_id',Auth::guard('student')->user()->patternclass_id)->get();
        $backlog_subjects= Subject::where('patternclass_id',Auth::guard('student')->user()->patternclass_id)->limit(1)->get();
        $extra_credit_subjects= Subject::where('patternclass_id',Auth::guard('student')->user()->patternclass_id)->limit(5)->get();
        return view('livewire.student.student-exam-form.student-exam-form',compact('regular_subjects','backlog_subjects','extra_credit_subjects'))->extends('layouts.student')->section('student');
    }
}
