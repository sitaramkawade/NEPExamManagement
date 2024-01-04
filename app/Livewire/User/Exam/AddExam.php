<?php

namespace App\Livewire\User\Exam;

use App\Models\Exam;
use Livewire\Component;

class AddExam extends Component
{
    public $current_step=1;
    public $steps=1;
    public $exam_name;
    public $status;
    public $exam_sessions;

    protected function rules()
    {
        return [
        'exam_name' => 'required|string|max:255',
        'status' => 'required',
        'exam_sessions' => 'required',
       
        ];
        }

        public function resetInputFields()
        {
            // Reset the specified properties to their initial state
            $this->reset(['exam_name', 'status' ,'exam_sessions']);
        }

        public function addExam(Exam  $exam){

            $exam->exam_name= $this->exam_name;         
            $exam->status= $this->status==1?0:1;
            $exam->exam_sessions= $this->exam_sessions==1?0:1;
            $exam->save();
            $this->dispatch('alert',type:'success',message:'Added Successfully !!'  );
            $this->resetInputFields();
        }
        


    public function render()
    {
        return view('livewire.user.exam.add-exam')->extends('layouts.user')->section('user');
    }
}
