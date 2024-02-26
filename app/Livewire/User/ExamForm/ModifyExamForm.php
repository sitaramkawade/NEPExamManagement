<?php

namespace App\Livewire\User\ExamForm;

use App\Models\Subject;
use Livewire\Component;
use App\Models\Examformmaster;
use App\Models\StudentExamform;
use Illuminate\Validation\Rule;
use App\Models\Studentexamformfee;
use Illuminate\Support\Facades\DB;

class ModifyExamForm extends Component
{   
    public $page=1;

    public $student_name;
    public $mother_name;
    public $course_name;
    public $memid;
    public $application_id;
    public $modify_id;
    #[Locked]
    public $student_exam_form_subjects=[];
    #[Locked]
    public $student_exam_form_fees=[];
    #[Locked]
    public $student_exam_form_extrcredit_subjects=[];
    #[Locked]
    public $subjects_not_selected=[];
    public $remove_subjects=[];
    public $add_subjects=[];
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

        $this->subjects_not_selected=Subject::where('patternclass_id',$exam_form_master->patternclass_id)->whereNotIn('id',$exam_form_master->studentexamforms()->pluck('subject_id'))->get();
    }

    public function modify_form_fee(Examformmaster $exmformmaster)
    {   
        DB::beginTransaction();
        try 
        {   
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

            $total=0;
            foreach ($exmformmaster->studentexamformfees()->get() as $fee)
            {
                $total+=$fee->fee_amount; 
            }

            $exmformmaster->update(['totalfee'=>$total]);

            DB::commit();
            $this->fetch_modify();
            $this->dispatch('alert',type:'success',message:'Exam Form Fees Updated Successfully !!');
        } 
        catch (\Exception $e) 
        {
            DB::rollback();

            $this->dispatch('alert',type:'error',message:'Failed To Update Exam Form Fees !!');
        }
        
    }
    
    public function modify_form_subject(Examformmaster $exmformmaster)
    {   
        DB::beginTransaction();
        try 
        { 
            $subjects =Subject::whereIn('id',array_keys(array_filter($this->add_subjects)))->get();

            $student_exam_forms = [];
            
            foreach ($subjects as $subject) 
            {
                $student_exam_form = [
                    'exam_id' => $exmformmaster->exam_id,
                    'student_id' => $exmformmaster->student_id,
                    'subject_id' => $subject->id,
                    'examformmaster_id' => $exmformmaster->id,
                    'college_id' => $exmformmaster->college_id,
                    'int_status' => 0,
                    'ext_status' => 0,
                    'int_practical_status' => 0,
                    'grade_status' => 0,
                    'practical_status' => 0,
                    'project_status' => 0,
                    'oral_status' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                
                switch ($subject->subject_type) 
                {
                    case 'I':
                        $student_exam_form['int_status'] = 1;
                    break;
                    case 'G':
                        $student_exam_form['grade_status'] = 1;
                    break;
                    case 'IG':
                        $student_exam_form['int_status'] = 1;
                        $student_exam_form['grade_status'] = 1;
                    break;
                    case 'P':
                    case 'IP':
                    case 'IE':
                        $student_exam_form['int_status'] = 1;
                        $student_exam_form['ext_status'] = 1;
                    break;
                    case 'IEG':
                        $student_exam_form['int_status'] = 1;
                        $student_exam_form['ext_status'] = 1;
                        $student_exam_form['grade_status'] = 1;
                    break;
                    case 'IEP':
                        $student_exam_form['int_status'] = 1;
                        $student_exam_form['ext_status'] = 1;
                        $student_exam_form['int_practical_status'] = 1;
                    break;
                }
                    
                $student_exam_forms[] = $student_exam_form;
            }
            $student_exam_form_data = StudentExamform::insert($student_exam_forms);

            $this->add_subjects=[];

            $deletestudentexamformsubject = StudentExamform::where('examformmaster_id',$exmformmaster->id)->whereIn('subject_id', array_keys(array_filter($this->remove_subjects)))->delete();
            
            $this->remove_subjects=[];
            DB::commit();
            $this->fetch_modify();
            $this->dispatch('alert',type:'success',message:'Exam Form Subjects Updated Successfully !!');
        } 
        catch (\Exception $e) 
        {
            DB::rollback();

            $this->dispatch('alert',type:'error',message:'Failed To Update Exam Form Subjects !!');
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
