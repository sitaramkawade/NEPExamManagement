<?php

namespace App\Livewire\Student;

use App\Models\Student;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class StudentDashboard extends Component
{   
    public Student $student;

    
    public function mount()
    {   
        $this->student=Auth::guard('student')->user();

        if($this->student->is_profile_complete===0)
        {
            return $this->redirect('/student/profile',navigate:true);
        }
    }

    public function render()
    {   
       
        return view('livewire.student.student-dashboard')->extends('layouts.student')->section('student');
    }
}
