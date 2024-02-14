<?php

namespace App\Livewire\User\ExamForm;

use Livewire\Component;
use App\Models\Examformmaster;
use Illuminate\Validation\Rule;
use App\Models\Studentexamformfee;
use Illuminate\Support\Facades\DB;

class ModifyExamForm extends Component
{   
    public $page=1;

    public $student_name;
    public $mother_name;
    public $course_name;
    public $done=0;
    public $memid;
    public $application_id;
    public $modify_id;
    public $student_exam_form_subjects=[];
    public $student_exam_form_fees=[];
    public $student_exam_form_extrcredit_subjects=[];
    public $newfees=[];
    public $newtotal=0;

    
    public function rules()
    {   
        return  [
            'application_id' => ['required', 'integer',Rule::exists('examformmasters', 'id')],
        ];
    }

    public function messages()
    {   
        $messages = [
            'application_id.required' => 'The Application ID is required.',
            'application_id.integer' => 'The Application ID must be an integer.',
            'application_id.exists' => 'The Application ID does not exist.',
        ];
        
        return $messages;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function fetch_modify()
    {   

        $this->validate();
        $exam_form_master=Examformmaster::find($this->application_id);
        $temp = ($exam_form_master->patternclass->courseclass->classyear->classyear_name ?? '') . ' ' . ($exam_form_master->patternclass->courseclass->course->course_name ?? '') . ' ' . ($exam_form_master->patternclass->pattern->pattern_name ?? '');
        $this->modify_id=$exam_form_master->id;
        $this->mother_name=$exam_form_master->student->mother_name;
        $this->course_name=$temp;
        $this->memid=$exam_form_master->student->memid;
        $this->student_name=$exam_form_master->student->student_name;
        $this->student_exam_form_subjects= $exam_form_master->studentexamforms()->get();
        $this->student_exam_form_fees= $exam_form_master->studentexamformfees()->get();
        $this->student_exam_form_extrcredit_subjects= $exam_form_master->studentextracreditexamforms()->get();
        $this->page=2;

        foreach ($this->student_exam_form_fees as $examformfee)
        {
            $this->newfees[$examformfee->examfees_id]=$examformfee->fee_amount; 
            $this->newtotal =$this->newtotal +$examformfee->fee_amount;
        }
    }

    public function modify_form(Examformmaster $exmformmaster)
    {   
        DB::beginTransaction();
        try 
        {   
            $this->done=0;
            // Update Modified Fee
            foreach ($this->newfees as $feeid => $newfee) {
                if($newfee=='')
                {
                    $newfee=0;
                }

                $existingFee = $exmformmaster->studentexamformfees()->where('examfees_id', $feeid)->first();

                if ($existingFee && $newfee != $existingFee->fee_amount) {
                    $existingFee->update(['fee_amount' => $newfee]);
                }
            }

            // Calculate Total Fee
            $total=0;
            foreach ($exmformmaster->studentexamformfees()->get() as $fee)
            {
                $total+=$fee->fee_amount; 
            }

            // Update Total Fee
            $exmformmaster->update(['totalfee'=>$total]);

            DB::commit();
            $this->done=1;
            $this->dispatch('alert',type:'success',message:'Exam Form Updated Successfully !!');

        } catch (\Exception $e) 
        {
            DB::rollback();

            $this->dispatch('alert',type:'error',message:'Exam Form Updated Failed Transaction Rollback Successfully !!');
        }

        
    }
    

    public function deleteexamform(Examformmaster $exmformmaster)
    { 
        $exmformmaster->update(['printstatus'=>0]);
        $this->dispatch('alert',type:'success',message:'Exam Form Deleted Successfully !!');
    }

    public function render()
    {   
        $this->newtotal=0;
        foreach( $this->newfees as $nfee)
        {
            $this->newtotal =$this->newtotal + (int)$nfee;
        }

        return view('livewire.user.exam-form.modify-exam-form')->extends('layouts.user')->section('user');
    }
}
