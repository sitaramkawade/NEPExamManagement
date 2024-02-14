<?php

namespace App\Livewire\Faculty\AssignSubject;

use App\Models\Course;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Department;
use App\Models\Courseclass;
use App\Models\Academicyear;
use App\Models\Patternclass;
use Livewire\WithPagination;
use App\Models\Subjectbucket;
use App\Models\Subjectcategory;

class AllAssignSubject extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'delete'];

    public $subjectcategory_id;
    public $subject_categories;
    public $department_id;
    public $departments;
    public $course_id;
    public $courses;
    public $patternclass_id;
    public $pattern_classes;
    public $subjects;
    public $pattern_id;
    public $course_class_id;

    #[Locked]
    public $subject_id;
    #[Locked]
    public $delete_id;

    public $perPage=10;
    public $search='';
    public $sortColumn="subject_id";
    public $sortColumnBy="ASC";
    public $mode='all';
    public $ext;
    public $isDisabled = true;

    protected function rules()
    {
        return [
            'department_id' => ['required',],
            'patternclass_id' => ['required',],
            'subjectcategory_id' => ['required',],
            'subject_id' => ['required',],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->department_id=null;
        $this->course_id=null;
        $this->patternclass_id=null;
        $this->subjectcategory_id=null;
        $this->subject_id=null;
        $this->academicyear_id=null;
    }

    public function messages()
    {
        return [
            'department_id.required' => 'The department field is required.',
            'patternclass_id.required' => 'The patternclass field is required.',
            'subjectcategory_id.required' => 'The subject category field is required.',
            'subjectcategory_id.required' => 'The subject category field is required.',
            'subject_id.required' => 'The subject field is required.',
        ];
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function setmode($mode)
    {
        if($mode=='add')
        {
            $this->resetinput();
        }
        if($mode=='edit')
        {
            $this->resetValidation();
        }
        $this->mode=$mode;
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

    public function save()
    {
        $validatedData = $this->validate();
        $activeAcademicYearId = Academicyear::where('active', 1)->value('id');
        $validatedData['academicyear_id'] = $activeAcademicYearId;
        $assignsubject = Subjectbucket::create($validatedData);
        if ($assignsubject) {
            $this->dispatch('alert',type:'success',message:'Subject Assigned Successfully');
            $this->resetinput();
            $this->setmode('all');
        } else {
            $this->dispatch('alert',type:'error',message:'Failed To Assign Subject. Please try again.');
        }
    }

    public function edit(Subjectbucket $assignsubject)
    {
        if ($assignsubject){
            $this->assignsubject_id = $assignsubject->id;
            $this->department_id= $assignsubject->department_id;
            $this->subjectcategory_id= $assignsubject->subjectcategory_id;
            $this->academicyear_id= $assignsubject->academicyear_id;
            $this->feach();
        }else{
            $this->dispatch('alert',type:'error',message:'Assigned Subject Details Not Found');
        }
        $this->setmode('edit');
    }
    public function feach()
    {
        $subjectbuckets = Subjectbucket::all();

        foreach ($subjectbuckets as $subjectbucket) {
            $pattern_class_id = $subjectbucket->patternclass_id;

            $pattern_class = Patternclass::find($pattern_class_id);

            if ($pattern_class) {
                if ($pattern_class->courseclass && $pattern_class->courseclass->course) {
                    $this->course_id = $pattern_class->courseclass->course->id;
                }

                if ($pattern_class->courseclass) {
                    $this->course_class_id = $pattern_class->courseclass->id;
                }

                if ($pattern_class->pattern) {
                    $this->pattern_id = $pattern_class->pattern->id;
                }
            }
        }
    }

    public function update(Subjectbucket $assignsubject)
    {
        $validatedData = $this->validate();
        if ($assignsubject) {
            $assignsubject->update($validatedData);
            $this->dispatch('alert',type:'success',message:'Assigned Subject Updated Successfully');
        }else{
            $this->dispatch('alert',type:'error',message:'Error To Update Assigned Subject');
        }
        $this->setmode('all');
    }

    public function delete()
    {
        $assignsubject = Subjectbucket::withTrashed()->find($this->delete_id);
        if($assignsubject){
            $assignsubject->forceDelete();
            $this->delete_id = null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Assigned Subject Deleted Successfully !!');
        } else {
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');
        }
    }

    public function softdelete($id)
    {
        $assignsubject = Subjectbucket::withTrashed()->find($id);
        if ($assignsubject) {
            $assignsubject->delete();
            $this->dispatch('alert',type:'success',message:'Assigned Subject Deleted Successfully');
            } else {
                $this->dispatch('alert',type:'error',message:'Assigned Subject Not Found !');
            }
        $this->setmode('all');
    }

    public function restore($id)
    {
        $assignsubject = Subjectbucket::withTrashed()->find($id);

        if ($assignsubject) {
            $assignsubject->restore();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Assigned Subject Restored Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Assigned Subject Not Found');
        }
        $this->setmode('all');
    }

    // public function export()
    // {
    //     $filename="RoleType-".time();
    //     switch ($this->ext) {
    //         case 'xlsx':
    //             return Excel::download(new FacultyRoleTypeExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
    //         break;
    //         case 'csv':
    //             return Excel::download(new FacultyRoleTypeExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
    //         break;
    //         case 'pdf':
    //             return Excel::download(new FacultyRoleTypeExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
    //         break;
    //     }
    // }

    public function status(Subjectbucket $assignsubject)
    {
        if( $assignsubject->status==0)
        {
            $assignsubject->status=1;
        }
        else if( $assignsubject->status==1)
        {
            $assignsubject->status=0;
        }
        $assignsubject->update();

        $this->dispatch('alert',type:'success',message:'Assigned Subject Status Updated Successfully !!');
    }

    // public function view(Subjectbucket $assignsubject)
    // {
    //     if ($assignsubject){
    //         $this->roletype_name= $assignsubject->roletype_name;
    //     }else{
    //         $this->dispatch('alert',type:'error',message:'Role Type Details Not Found');
    //     }
    //     $this->setmode('view');
    // }

    public function render()
    {
        if($this->mode !== 'all' ){
            $this->subject_categories = Subjectcategory::select('id','subjectcategory')->where('is_active',1)->get();
            $this->departments = Department::select('id','dept_name')->where('status',1)->get();
            $this->courses = Course::select('id', 'course_name')->get();
            $course_classes = Courseclass::where('course_id', $this->course_id)->pluck('id');
            $this->pattern_classes = Patternclass::select('id', 'class_id', 'pattern_id')
                ->with(['pattern:id,pattern_name', 'courseclass.course:id,course_name', 'courseclass.classyear:id,classyear_name'])
                ->whereIn('class_id', $course_classes)
                ->where('status', 1)
                ->get();
            $subjectbucket_subjects = Subjectbucket::select('subject_id')->where('status',1)->get();
            $this->subjects = Subject::select('id','subject_name')->where('subjectcategory_id',$this->subjectcategory_id)->whereIn('id',$subjectbucket_subjects)->where('status',1)->get();
        }
        $assignsubjects = Subjectbucket::when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.faculty.assign-subject.all-assign-subject',compact('assignsubjects'))->extends('layouts.faculty')->section('faculty');
    }
}
