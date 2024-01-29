<?php

namespace App\Livewire\User\ExamFeeCourse;

use Excel;
use App\Models\Course;
use Livewire\Component;
use App\Models\Semester;
use App\Models\Courseclass;
use App\Models\Patternclass;
use Livewire\WithPagination;
use App\Models\Examfeecourse;
use App\Models\Examfeemaster;
use App\Models\Applyfeemaster;
use App\Models\Formtypemaster;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Exports\User\ExamFeeCourse\ExamFeeCourseExport;

class AllExamFeeCourse extends Component
{
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    #[Locked] 
    public $delete_id;

    public $mode='all';
    public $perPage=10;
    public $search='';
    public $sortColumn="patternclass_id";
    public $sortColumnBy="ASC";
    public $ext;

    public $fees=[];
    public $active_status=[];
    public $sem;
    public $patternclass_id;
    public $examfees_id;
    public $approve_status;
    public $semesters;
    public $patternclasses;
    public $examfees;
    public $form_type_id;
    public $apply_fee_id;
    public $applyfees;
    public $formtypes;
    public $courses;
    public $courseclasses;
    public $course_id;
    public $course_class_id;
    public $is_sem=0;
    public $is_course=0;
    public $is_course_class=0;
    #[Locked] 
    public $edit_id;


    public function rules()
    {
        $rules = [
            'form_type_id' => ['required'],
            'apply_fee_id' => ['required'],
        ];

        if($this->is_sem)
        {
            $rules['sem'] = ['required', 'integer','digits_between:1,11'];
        }

        if($this->is_course)
        {
            $rules['course_id'] = ['required',Rule::exists('courses', 'id')];
        }

        if($this->is_course_class)
        {
            $rules['course_class_id'] = ['required',Rule::exists('course_classes', 'id')];
        }

        if(count($this->examfees) >0)
        {   
            foreach ($this->examfees as $fee) {
                $rules["fees.".$fee->id] = ['nullable','integer', 'digits_between:1,11'];

            }
        }

        return $rules;
    }

    public function messages()
    {   
        $messages = [
            'sem.required' => 'The SEM field is required.',
            'sem.integer' => 'The SEM must be an integer.',
            'sem.digits_between' => 'The SEM must be between 1 and 11 digits.',
            'form_type_id.required' => 'The Form Type field is required.',
            'apply_fee_id.required' => 'The Apply Fee field is required.',
            'course_id.required' => 'The Course field is required.',
            'course_id.exists' => 'The selected Course is invalid.',
            'course_class_id.required' => 'The Course Class field is required.',
            'course_class_id.exists' => 'The selected Course Class is invalid.',
        ];
        if(count($this->examfees) >0)
        {
            foreach ($this->examfees as $fee) {
                $messages["fees.".$fee->id.".required"] = "The ".$fee->fee_name." Fee field is required.";
                $messages["fees.".$fee->id.".integer"] = "The ".$fee->fee_name."Fee must be an integer.";
                $messages["fees.".$fee->id.".digits_between"] = "The ".$fee->fee_name." Fee must be between :min and :max digits.";

            }   
        }    

        return $messages;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->sem=null;
        $this->fees=[];
        $this->active_status=[];
        $this->patternclass_id=null;
        $this->approve_status=null;
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

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function setmode($mode)
    {
        if($mode=='add')
        {
            $this->resetinput();
        }
        $this->mode=$mode;
    }

    public function export()
    {
        $filename="Exam-Fee-Course".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExamFeeCourseExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExamFeeCourseExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExamFeeCourseExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function add()
    {   
        $this->validate();

        if ($this->is_course && $this->is_course_class) {
            DB::transaction(function () {

                $courseClass = Courseclass::find($this->course_class_id);
                $sems = [];
        
                if (isset($courseClass->classyear->classyear_name) && in_array($courseClass->classyear->classyear_name, ["F.Y.", "I"])) {
                    $sems = [1, 2];
                } elseif (isset($courseClass->classyear->classyear_name) && in_array($courseClass->classyear->classyear_name, ["S.Y.", "II"])) {
                    $sems = [3, 4];
                } elseif (isset($courseClass->classyear->classyear_name) && $courseClass->classyear->classyear_name == "T.Y.") {
                    $sems = [5, 6];
                } 
                    
                $sem_semesters = Semester::whereIn('semester', $sems)->where('status', 1)->get();

                $patternClasses = $courseClass->patternclasses->where('status', 1);
        
                foreach ($patternClasses as $patternclass) {
                    foreach ($sem_semesters as $sem_one) {
                        foreach ($this->fees as $key => $fee) {
                            if (isset($key) && $fee !== "" && $fee !== null) {
                                $activeStatus = isset($this->active_status[$key]) ? ($this->active_status[$key] == true ? 0 : 1) : 1;
                                Examfeecourse::create([
                                    'examfees_id' => $key,
                                    'fee' => $fee == "" ? 0 : $fee,
                                    'sem' => $sem_one->semester,
                                    'patternclass_id' => $patternclass->id,
                                    'active_status' => $activeStatus,
                                ]);
                            }
                        }
                    }
                } 
               
            });
        }elseif ($this->is_course) {
            DB::transaction(function () {
                $course = Course::with('courseclasses.patternclasses')->find($this->course_id);
                if ($course) {
                    $courseClasses = $course->courseclasses()->get();
                    $semesters = Semester::where('status', 1)->get();
                    foreach($courseClasses as $courseClass)
                    {
                        $patternClasses = $courseClass->patternclasses->where('status', 1);
                        foreach ($patternClasses as $patternclass) 
                        {
                            foreach ($semesters as $sem) 
                            {
                                foreach ($this->fees as $key => $fee) 
                                {
                                    if (isset($key) && $fee !== "" && $fee !== null) 
                                    {
                                        $activeStatus = isset($this->active_status[$key]) ? ($this->active_status[$key] == true ? 0 : 1) : 1;
                                        Examfeecourse::create([
                                            'examfees_id' => $key,
                                            'fee' => $fee == "" ? 0 : $fee,
                                            'sem' => $sem->semester,
                                            'patternclass_id' => $patternclass->id,
                                            'active_status' => $activeStatus,
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                }
            });
        }


        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Exam Fee Course Created Successfully !!');
    }


    public function edit(Examfeecourse $examfeecourse)
    {   
        $this->resetinput();
        $this->edit_id= $examfeecourse->id;
        $this->patternclass_id=$examfeecourse->patternclass_id;
        $this->sem=$examfeecourse->sem;
        
        $examfeecourses=Examfeecourse::where('patternclass_id',$examfeecourse->patternclass_id)->where('sem',$examfeecourse->sem)->get();
        foreach($examfeecourses as $fee)
        {   
            $this->fees[$fee->examfees_id]=$fee->fee;
            $this->active_status[$fee->examfees_id]=$fee->active_status==1?false:true;
        }
  
        $this->setmode('edit');
    }

    public function update(Examfeecourse $examfeecourse)
    {
        $this->validate();

        foreach ($this->fees as $key => $fee) {
            if (isset($key) && $fee !== "" && $fee !== null)
            {   
                $modify = Examfeecourse::where('sem',$this->sem)->where('patternclass_id',$this->patternclass_id)->where('examfees_id', $key)->latest()->first();

                if (isset($modify) && $modify->fee != $fee) 
                {
                    Examfeecourse::create([
                        'examfees_id' => $key,
                        'fee' => $fee ?? 0,
                        'sem' => $this->sem,
                        'patternclass_id' => $this->patternclass_id,
                        'active_status' => isset($this->active_status[$key]) ? ($this->active_status[$key] == true ? 0 : 1) : 1,
                    ]);
                        
                    $modify->active_status=0;
                    $modify->update();
                    $modify=null;
                } else 
                {
                    Examfeecourse::updateOrCreate(
                        [
                            'examfees_id' => $key,
                            'sem' => $examfeecourse->sem,
                            'patternclass_id' => $examfeecourse->patternclass_id,
                        ],
                        [
                            'examfees_id' => $key,
                            'fee' =>$fee ?? 0,
                            'sem' => $this->sem,
                            'patternclass_id' => $this->patternclass_id,
                            'active_status' =>  isset($this->active_status[$key]) ? ($this->active_status[$key] == true ? 0 : 1) : 1,
                        ]
                    );
                }
            }
        }
        $activeStatus=null;
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Exam Fee Course Updated Successfully !!');
    }

    public function status(Examfeecourse $examfeecourse)
    {   
        if($examfeecourse->active_status)
        {
           $examfeecourse->active_status=0;
        }
        else 
        {
           $examfeecourse->active_status=1;
        }
       $examfeecourse->update();

        $this->dispatch('alert',type:'success',message:'Exam Fee Course Status Updated Successfully !!');
    }

    public function approve(Examfeecourse $examfeecourse)
    {   
        
        if($examfeecourse->approve_status==1)
        {
            $examfeecourse->approve_status=0;
            $this->dispatch('alert',type:'success',message:'Exam Fee Course Not Approved Successfully !!');
        }
        else 
        {
            $examfeecourse->approve_status=1;
            $this->dispatch('alert',type:'success',message:'Exam Fee Course Approved Successfully !!');
        }
       $examfeecourse->update();
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }


    public function delete(Examfeecourse $examfeecourse)
    {   
        $examfeecourse->delete();
        $this->dispatch('alert',type:'success',message:'Exam Fee Course Soft Deleted Successfully !!');
    }
    
    public function restore($id)
    {   
        $examfeecourse = Examfeecourse::withTrashed()->find($id);
        $examfeecourse->restore();
        $this->dispatch('alert',type:'success',message:'Exam Fee Course Restored Successfully !!');
    }

    public function forcedelete()
    {   
        $examfeecourse = Examfeecourse::withTrashed()->find($this->delete_id);
        $examfeecourse->forceDelete();
        $this->dispatch('alert',type:'success',message:'Exam Fee Course Deleted Successfully !!');
    }

    public function render()
    {   
        if ($this->apply_fee_id) {
            $sem = Applyfeemaster::find($this->apply_fee_id);
            if ($sem && $sem->name === "Subject & SEM Wise") {
                $this->is_sem = 1;
                $this->is_course = 0;
                $this->is_course_class = 0;
            }

            if ($sem && $sem->name === "Course Wise") {

                $this->is_course = 1;
                $this->is_course_class = 0;
                $this->is_sem = 0;
                if($this->course_id)
                {   
                    $cour=Course::find($this->course_id);
                    if(isset($cour->coursecategory->course_category) && $cour->coursecategory->course_category=='Professional')
                    {
                        if(count($this->examfees) >0)
                        {
                            foreach ($this->examfees as $fee) {
                                $this->fees[$fee->id]=$fee->default_professional_fee;

                            }   
                        }   
                    }
                    if(isset($cour->coursecategory->course_category) && $cour->coursecategory->course_category=='Non Professional')
                    {
                        if(count($this->examfees) >0)
                        {
                            foreach ($this->examfees as $fee) {
                                $this->fees[$fee->id]=$fee->default_non_professional_fee;

                            }   
                        }   
                    }
                }
               
            }

            if ($sem && $sem->name === "Class Wise") {
                $this->is_course = 1;
                $this->is_course_class = 1;
                $this->is_sem = 0;
                if($this->course_id)
                {   
                    $cour=Course::find($this->course_id);
                    if(isset($cour->coursecategory->course_category) && $cour->coursecategory->course_category=='Professional')
                    {
                        if(count($this->examfees) >0)
                        {
                            foreach ($this->examfees as $fee) {
                                $this->fees[$fee->id]=$fee->default_professional_fee;

                            }   
                        }   
                    }
                    if(isset($cour->coursecategory->course_category) && $cour->coursecategory->course_category=='Non Professional')
                    {
                        if(count($this->examfees) >0)
                        {
                            foreach ($this->examfees as $fee) {
                                $this->fees[$fee->id]=$fee->default_non_professional_fee;

                            }   
                        }   
                    }
                }  
            }
        }


        if($this->mode!=='all')
        {   
            $this->applyfees=Applyfeemaster::select('id','name')->get();
            $this->formtypes=Formtypemaster::select('id','form_name')->get();
            $this->semesters = Semester::select('id', 'semester')->where('status', 1)->get();
            $this->courses = Course::select('id', 'course_name')->get();
            $this->courseclasses= Courseclass::select('id', 'course_id','classyear_id')->with(['course:course_name,id','classyear:classyear_name,id'])->where('course_id',$this->course_id)->get();

            

            // if($this->mode=='add')
            // {
            //     $examfeeids = Examfeecourse::select('examfees_id')->where('patternclass_id', $this->patternclass_id)->where('sem', $this->sem)->get();
            // }else
            // {
            //     $examfeeids=null; 
            // }

            $this->examfees = Examfeemaster::select('id', 'fee_name')->when($this->form_type_id, function ($query) {
                    return $query->where('form_type_id', $this->form_type_id);
            })->where('active_status', 1)->get();
        }
        
        $examfeecourses=Examfeecourse::select('id','fee','sem','approve_status','patternclass_id','examfees_id','active_status','deleted_at')
        ->with(['patternclass.pattern:pattern_name,id','examfee:fee_name,id','patternclass.courseclass.classyear:classyear_name,id','patternclass.courseclass.course:course_name,id'])
        ->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.exam-fee-course.all-exam-fee-course',compact('examfeecourses'))->extends('layouts.user')->section('user');
    }
}
