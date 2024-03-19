<?php

namespace App\Livewire\User\ExamFormStatistics;

use App\Models\Exam;
use Livewire\Component;

class ExamFormStatistics extends Component
{

    public function render()
    {
        $exam = Exam::where('status', 1)->first();
        return view('livewire.user.exam-form-statistics.exam-form-statistics',compact('exam'))->extends('layouts.user')->section('user');
    }
}
