<?php

namespace App\Livewire\Student\Profile;

use App\Models\Student;
use Livewire\Component;

class MultiStepStudentProfile extends Component
{   
    public $prn;
    public $abcid;
    public $aadhar_card_no;
    public $mother_name;
    public $steps=4;
    public $current_step=1;
    public $student_id;


    public function step_1()
    {   
        $this->validate(['prn'=>['required']]);
        $student=Student::find( $this->student_id);
        $student->prn=$this->prn;
        $student->update();
        $this->current_step=2;
    }


    public function step_2()
    {   
        $this->validate(['abcid'=>['required']]);
        $student=Student::find( $this->student_id);
        $student->abcid=$this->abcid;
        $student->update();
        $this->current_step=3;
    }

    public function step_3()
    {   
        $this->validate(['aadhar_card_no'=>['required']]);
        $student=Student::find( $this->student_id);
        $student->aadhar_card_no=$this->aadhar_card_no;
        $student->update();
        $this->current_step=4;
    }

    public function step_4()
    {   
        $this->validate(['mother_name'=>['required']]);
        $student=Student::find( $this->student_id);
        $student->mother_name=$this->mother_name;
        $student->update();
        $this->current_step=5;
    }

    public function fetch()
    {
        $student=Student::find(auth()->guard('student')->user()->id);
        $this->student_id=$student->id;
        $this->prn= $student->prn;
        $this->abcid= $student->abcid;
        $this->aadhar_card_no= $student->aadhar_card_no;
        $this->mother_name= $student->mother_name;
    }

    public function mount()
    {
        $this->fetch();
    }
    public function back()
    {
        $this->fetch();

   
            $this->current_step--;

    }

    public function render()
    {   
        return view('livewire.student.profile.multi-step-student-profile');
    }
}
