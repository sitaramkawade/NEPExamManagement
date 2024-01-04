<?php

namespace App\Livewire\User\Exam;

use App\Models\Exam;
use Livewire\Component;

class EditExam extends Component
{
    public $current_step=1;
    public $steps=1;
    public $exam_name;
    public $status;
    public $exam_sessions;
    public $id;

    protected function rules()
    {
        return [
        'exam_name' => 'required|string|max:255',
        'status' => 'required',
        'exam_sessions' => 'required',
       
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetInputFields()
    {
        // Reset the specified properties to their initial state
        $this->reset(['exam_name', 'status' ,'exam_sessions']);
    }

    public function mount($id)
    {
        $this->edit($id);
    }

    public function edit($id){

        $exam = Exam::find($id);

        if ($exam) {
         
            $this->exam_name = $exam->exam_name;
            $this->status = $exam->status;          
            $this->exam_sessions = $exam->exam_sessions;          
            
        }
    }

    public function updateExam(Exam $exam){

        $validatedData = $this->validate();
       
        if ($validatedData) {
                   
            $exam->update([
                              
                'exam_name' => $this->exam_name,              
                'status' => $this->status==1?0:1,
                'exam_sessions' => $this->exam_sessions==1?0:1,
                     
            ]);
          

            $this->dispatch('alert',type:'success',message:'Updated Successfully !!'  );
            // return $this->redirect('/user/viewExam',navigate:true);
           
    }
    }

    public function render()
    {
        return view('livewire.user.exam.edit-exam')->extends('layouts.user')->section('user');
    }
}
