<?php

namespace App\Livewire\Student\StudentExamForm;


use App\Models\Subject;
use Livewire\Component;
use App\Models\Admissiondata;
use App\Models\CurrentclassStudents;
use Illuminate\Support\Facades\Auth;


class StudentExamForm extends Component
{  
    public $medium_instruction;
    public $abcid;

    public  $internals=[];
    public  $externals=[];
    public  $practicals=[];
    public  $grades=[];
    public  $projects=[];

    // Check Subject checkboxes 
    public function check_subject_checkboxs($subjects)
    {
        foreach($subjects as $subjects)
        {   
            if( $subjects->subjectexam_type=="IE")
            {
                $this->internals[$subjects->id]=true;
                $this->externals[$subjects->id]=true;
            }
            
            if( $subjects->subjectexam_type=="IEP")
            {
                $this->internals[$subjects->id]=true;
                $this->externals[$subjects->id]=true;
                $this->practicals[$subjects->id]=true;
            }

            if( $subjects->subjectexam_type=="IEG")
            {
                $this->internals[$subjects->id]=true;
                $this->externals[$subjects->id]=true;
                $this->grades[$subjects->id]=true;
            }

            if( $subjects->subjectexam_type=="IEP")
            {
                $this->internals[$subjects->id]=true;
                $this->externals[$subjects->id]=true;
                $this->practicals[$subjects->id]=true;
            }
            
            if( $subjects->subjectexam_type=="IP")
            {
                $this->internals[$subjects->id]=true;
                $this->practicals[$subjects->id]=true;
            }

            if( $subjects->subjectexam_type=="IG")
            {
                $this->internals[$subjects->id]=true;
                $this->grades[$subjects->id]=true;
            }
            
            if( $subjects->subjectexam_type=="I")
            {
                $this->internals[$subjects->id]=true;
            }

            if( $subjects->subjectexam_type=="P")
            {
                $this->projects[$subjects->id]=true;
            }

            if( $subjects->subjectexam_type=="G")
            {
                $this->grades[$subjects->id]=true;
            }
        }
    }

    // Get SEM 1 Subjects For Fist Year
    public function get_sem_1_subjects()
    {   
        $subjectids = Admissiondata::select('subject_id')->where('patternclass_id',Auth::guard('student')->user()->patternclass_id)->get();
        return  Subject::where('subject_sem',1)->whereIn('id',$subjectids)->where('patternclass_id',Auth::guard('student')->user()->patternclass_id)->get();
    }

    // Get SEM Wise Subjects
    public function get_sem_subjects($sem)
    {
        return Subject::where('subject_sem',$sem)->where('patternclass_id',Auth::guard('student')->user()->patternclass_id)->get();
    }

    // Exam Form Save
    public function student_exam_form_save()
    {   

    }


    public function render()
    {   
        $current_class=CurrentclassStudents::where('patternclass_id',Auth::guard('student')->user()->patternclass_id)->where('student_id',Auth::guard('student')->user()->id)->get();
       if($current_class->isEmpty())
       {    
            // Subject For First Sem
            $regular_subjects = $this->get_sem_1_subjects();
       }else
       {
            $regular_subjects=[];
       }
        foreach ($current_class as $classRecord) {
            if ($classRecord->sem == 1) {
                $regular_subjects = $this->get_sem_subjects(1);

            } elseif($classRecord->sem == 2) {
                $regular_subjects = $this->get_sem_subjects(2);
            }
             elseif($classRecord->sem == 3) {
                $regular_subjects = $this->get_sem_subjects(4);
            }
             elseif($classRecord->sem == 4) {
                $regular_subjects = $this->get_sem_subjects(5);
            }
             elseif($classRecord->sem == 5) {
                $regular_subjects = $this->get_sem_subjects(6);
            }else
            {
                $regular_subjects = $this->get_sem_subjects(2);
            }
        }

        $this->check_subject_checkboxs($regular_subjects);
        
        $backlog_subjects= [];
        $this->check_subject_checkboxs($backlog_subjects);
        $extra_credit_subjects= [];
        return view('livewire.student.student-exam-form.student-exam-form',compact('regular_subjects','backlog_subjects','extra_credit_subjects'))->extends('layouts.student')->section('student');
    }
}
