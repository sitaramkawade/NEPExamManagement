<?php

namespace App\Livewire\Student;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class StudentDashboard extends Component
{   
    public function mount()
    {   
        if(Auth::guard('student')->user()->is_profile_complete===0)
        {
            return $this->redirect('/student/profile',navigate:true);
        }
    }

    public function render()
    {
        return view('livewire.student.student-dashboard')->extends('layouts.student')->section('student');
    }
}
