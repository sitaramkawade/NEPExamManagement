<?php

namespace App\Livewire\User\ExamForm;

use App\Models\Course;
use App\Models\Pattern;
use Livewire\Component;
use App\Models\Courseclass;
use App\Models\Patternclass;
use Livewire\WithPagination;
use App\Models\Examformmaster;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Locked;

class InwardExamForm extends Component
{   
    use WithPagination;
    
    public $page=1;
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $course_id;
    public $list_by;

    public $student_name;
    public $mother_name;
    public $course_name;
    public $memid;
    public $application_id;
    #[Locked]
    public $inward_id;

    public $patternclass_id;
    public $courses=[];
    public $pattern_classes=[];
    public $student_exam_form_fees=[];
    public $student_exam_form_subjects=[];
    public $student_exam_form_extrcredit_subjects=[];


    public function rules()
    {   
        $rules = [
            'course_id' => ['required', 'integer',Rule::exists('courses', 'id')],
            'patternclass_id' => ['required', 'integer',Rule::exists('pattern_classes', 'id')],
            'list_by' => ['required', 'in:o,m'],
        ];

        if($this->list_by=='o'){
            $rules['application_id']=['required', 'integer',Rule::exists('examformmasters', 'id')->where(function ($query) {
                return $query->where('patternclass_id', $this->patternclass_id);
            })];
        }

        return $rules;
    }

    public function messages()
    {   
        $messages = [
            'application_id.required' => 'The Application ID is required.',
            'application_id.integer' => 'The Application ID must be an integer.',
            'application_id.exists' => 'The Application ID does not exist For This Pattern Class.',

            'course_id.required' => 'The Course is required.',
            'course_id.integer' => 'The Course must be an integer.',
            'course_id.exists' => 'The selected Course does not exist.',

            'patternclass_id.required' => 'The Pattern Class is required.',
            'patternclass_id.integer' => 'The Pattern Class must be an integer.',
            'patternclass_id.exists' => 'The selected Pattern Class does not exist.',

            'list_by.required' => 'The List By field is required.',
            'list_by.in' => 'The List By field must be valid',
        ];
        
        return $messages;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {   
        $this->page=1;
        $this->inward_id=null;
        $this->search=null;
        $this->course_id=null;
        $this->application_id=null;
        $this->list_by=null;
        $this->patternclass_id=null;
        $this->courses=[];
        $this->pattern_classes=[];
        $this->student_name=null;
        $this->mother_name=null;
        $this->course_name=null;
        $this->memid=null;
        $this->student_exam_form_fees=[];
        $this->student_exam_form_subjects=[];
        $this->student_exam_form_extrcredit_subjects=[];
    }

    public function sort_column($column)
    {
        if( $this->sortColumn === $column)
        {
            $this->sortColumnBy=($this->sortColumnBy=="ASC")?"DESC":"ASC";
            return;
        }
        $this->sortColumn=$column;
        $this->sortColumnBy=="ASC";
    }

    public function setpage($page)
    {   
        $this->page=$page;
    }


    public function inward_class_form()
    {   
        $this->validate();
        $this->page=2;

    }

    
    public function procced_to_approve($id)
    {   
        $this->application_id=null;
        $exam_form_master=Examformmaster::find($id);
        $this->inward_id=$exam_form_master->id;
        $temp = ($exam_form_master->patternclass->courseclass->classyear->classyear_name ?? '') . ' ' . ($exam_form_master->patternclass->courseclass->course->course_name ?? '') . ' ' . ($exam_form_master->patternclass->pattern->pattern_name ?? '');
        $this->mother_name=$exam_form_master->student->mother_name;
        $this->course_name=$temp;
        $this->memid=$exam_form_master->student->memid;
        $this->student_name=$exam_form_master->student->student_name;
        $this->student_exam_form_fees=$exam_form_master->studentexamformfees()->get();
        $this->student_exam_form_subjects=$exam_form_master->studentexamforms()->get();
        $this->student_exam_form_extrcredit_subjects=$exam_form_master->studentextracreditexamforms()->get();
        $this->page=3;
    }
    
    public function inward_form(Examformmaster $exam_form_master)
    {   
        $exam_form_master->inwardstatus=1;
        $exam_form_master->inwarddate=now();
        $exam_form_master->update();
        $this->application_id=null;
        $this->inward_id=null;
        $this->dispatch('alert',type:'success',message:'Exam Form Inward Successfully !!');
        if($this->list_by=='o')
        {
            $this->page=1;
        }else
        {
            $this->page=2;
        }
    }

    public function verify(Examformmaster $exam_form_master)
    {   
        $exam_form_master->verified_at=now();
        $exam_form_master->update();
        $this->application_id=null;
        $this->inward_id=null;
        $this->dispatch('alert',type:'success',message:'Exam Form Verified Successfully !!');
        if($this->list_by=='o')
        {
            $this->page=1;
        }else
        {
            $this->page=2;
        }
    }

    public function render()
    {   
        $exam_form_master_inwards=collect([]);
        $exam_form_masters=collect([]);
        if($this->page==1)
        {
            $this->courses=Course::select('course_name','id')->get();
            if($this->course_id)
            {
               $courseclassids=Courseclass::select('id')->where('course_id',$this->course_id)->pluck('id')->toArray();
               $this->pattern_classes=Patternclass::select('id','pattern_id','class_id')->with('courseclass.course:course_name,special_subject,id','courseclass.classyear:classyear_name,id','pattern:pattern_name,id')->whereIn('class_id',$courseclassids)->get();
            }
        }elseif($this->page==2)
        {   
            if($this->patternclass_id && $this->list_by=="m")
            {
                $exam_form_masters=Examformmaster::where('printstatus',1)->where('inwardstatus',0)->where('patternclass_id',$this->patternclass_id)->when($this->search, function ($query, $search) {
                    $query->search($search);
                })->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);
               
                $exam_form_master_inwards=Examformmaster::where('printstatus',1)->where('inwardstatus',1)->where('patternclass_id',$this->patternclass_id)->when($this->search, function ($query, $search) {
                    $query->search($search);
                })->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

            }elseif($this->patternclass_id && $this->list_by=="o" && $this->application_id)
            {
                $exam_form_masters = Examformmaster::where('printstatus',1)->where('inwardstatus',0)->where('patternclass_id', $this->patternclass_id)->where('id',$this->application_id)->first();
                if($exam_form_masters)
                {   
                    $this->page=3;
                    $this->procced_to_approve($exam_form_masters->id);
                }
            }
        }

        return view('livewire.user.exam-form.inward-exam-form',compact('exam_form_masters','exam_form_master_inwards'))->extends('layouts.user')->section('user');
    }
}
