<?php

namespace App\Livewire\Faculty\SubjectBucket;

use App\Models\Course;
use App\Models\Pattern;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Department;
use App\Models\Courseclass;
use App\Models\Academicyear;
use App\Models\Patternclass;
use Livewire\WithPagination;
use App\Models\Subjectbucket;
use App\Models\Subjectvertical;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Faculty\SubjectBucket\SubjectBucketExport;

class AllSubjectBucket extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'delete'];

    public $department_id;
    public $patternclass_id;
    public $subjectvertical_id;
    public $subject_division;
    public $subject_id;
    public $pattern_id;
    public $academicyear_id;
    public $course_id;
    public $departments;
    public $subject_verticals;
    public $patterns;
    public $courses;
    public $pattern_classes;
    public $subjects;
    public $academic_years;

    #[Locked]
    public $delete_id;
    #[Locked]
    public $subjectbucket_id;

    public $mode='all';
    public $perPage=10;
    public $search='';
    public $sortColumn="subject_id";
    public $sortColumnBy="ASC";
    public $ext;



    protected function rules()
    {
        return [
            'department_id' => ['required',Rule::exists(Department::class,'id')],
            'course_id' => ['required',Rule::exists(Course::class,'id')],
            'pattern_id' => ['required',Rule::exists(Pattern::class,'id')],
            'patternclass_id' => ['required',Rule::exists(Patternclass::class,'id')],
            'subject_id' => ['required',Rule::exists(Subject::class,'id')],
            'subjectvertical_id' => ['required',Rule::exists(Subjectvertical::class,'id')],
        ];
    }

    public function messages()
    {
        return [
            'department_id.required' => 'The department field is required.',
            'department_id.exists' => 'The selected department is invalid.',
            'pattern_id.required' => 'The pattern field is required.',
            'pattern_id.exists' => 'The pattern field is invalid.',
            'course_id.required' => 'The course field is required.',
            'course_id.exists' => 'The selected course is invalid.',
            'patternclass_id.required' => 'The patternclass class field is required.',
            'patternclass_id.exists' => 'The selected patternclass class is invalid.',
            'subject_id.required' => 'The subject field is required.',
            'subject_id.exists' => 'The selected subject is invalid.',
            'subjectvertical_id.required' => 'The subject vertical field is required.',
            'subjectvertical_id.exists' => 'The selected subject vertical is invalid.',
        ];
    }

    public function resetinput()
    {
        $this->department_id = null;
        $this->subjectvertical_id = null;
        $this->pattern_id = null;
        $this->course_id = null;
        $this->patternclass_id = null;
        $this->subject_id = null;
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
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

    public function save()
    {
        $validatedData = $this->validate();

        $activeAcademicYearId = Academicyear::where('active', 1)->value('id');
        $validatedData['academicyear_id'] = $activeAcademicYearId;
        $subjectbucket = Subjectbucket::create($validatedData);

        if ($subjectbucket) {
            $this->dispatch('alert',type:'success',message:'Subject bucket Saved Successfully !!');
            $this->setmode('all');
        } else {
            $this->dispatch('alert',type:'error',message:'Something went wrong!!');
        }
    }

    public function edit(Subjectbucket $subjectbucket)
    {
        if ($subjectbucket)
        {
            $this->subjectbucket_id = $subjectbucket->id;
            $this->department_id= $subjectbucket->department_id;
            $this->subjectvertical_id= $subjectbucket->subjectvertical_id;
            $this->pattern_id= $subjectbucket->patternclass->pattern->id;
            $this->course_id = $subjectbucket->patternclass->courseclass->course->id;
            $this->patternclass_id= $subjectbucket->patternclass_id;
            $this->subject_id= $subjectbucket->subject_id;
            $this->setmode('edit');
        }
        else{
        $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');
        }
    }

    public function update(Subjectbucket $subjectbucket)
    {
        $validatedData = $this->validate();
        if ($subjectbucket) {
            $subjectbucket->update($validatedData);
            $this->dispatch('alert',type:'success',message:'Subject Bucket Updated Successfully');
        }else{
            $this->dispatch('alert',type:'error',message:'Error To Update Subject Bucket');
        }
        $this->setmode('all');
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

    public function export()
    {
        $filename="Subjectbucket-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new SubjectBucketExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new SubjectBucketExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new SubjectBucketExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }

    }

    public function changestatus(Subjectbucket $subjectbucket)
    {
        if( $subjectbucket->status==0)
        {
            $subjectbucket->status=1;
        }
        else if( $subjectbucket->status==1)
        {
            $subjectbucket->status=0;
        }
        $subjectbucket->update();

        $this->dispatch('alert',type:'success',message:'Subjectbucket Status Updated Successfully !!');
    }

    public function delete()
    {
        try
        {
            $subjectbucket = Subjectbucket::withTrashed()->find($this->delete_id);
            $subjectbucket->forceDelete();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Subject Bucket Deleted Successfully !!');
        } catch (\Illuminate\Database\QueryException $e) {

            if ($e->errorInfo[1] == 1451) {

                $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
            }
        }
    }

    public function softdelete($id)
    {
        $subjectbucket = Subjectbucket::withTrashed()->findOrFail($id);
        if ($subjectbucket) {
            $subjectbucket->delete();
            $this->dispatch('alert',type:'success',message:'Subject Bucket Soft Deleted Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Subject Bucket Not Found !');
        }
    }

    public function restore($id)
    {
        $subjectbucket = Subjectbucket::withTrashed()->find($id);

        if ($subjectbucket) {
            $subjectbucket->restore();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Subject Bucket Restored Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Subject Bucket Not Found');
        }
        $this->setmode('all');
    }

    public function view(Subjectbucket $subjectbucket)
    {
        if ($subjectbucket)
        {
            $this->subject_id= isset($subjectbucket->subject->subject_name) ? $subjectbucket->subject->subject_name : '';
            $this->subject_division= $subjectbucket->subject_division;
            $this->subjectvertical_id= isset($subjectbucket->subjectvertical->subject_vertical) ? $subjectbucket->subjectvertical->subject_vertical : '';
            $this->course_id = isset($subjectbucket->patternclass->courseclass->course->course_name) ? $subjectbucket->patternclass->courseclass->course->course_name : '';
            $this->department_id= isset($subjectbucket->department->dept_name) ? $subjectbucket->department->dept_name : '';
            $this->pattern_id= isset($subjectbucket->patternclass->pattern->pattern_name) ? $subjectbucket->patternclass->pattern->pattern_name : '';
            $this->academicyear_id= isset($subjectbucket->academicyear->year_name) ? $subjectbucket->academicyear->year_name : '';
            $pattern = isset($subjectbucket->patternclass->pattern->pattern_name) ? $subjectbucket->patternclass->pattern->pattern_name : '';
            $classyear = isset($subjectbucket->patternclass->courseclass->classyear->classyear_name) ? $subjectbucket->patternclass->courseclass->classyear->classyear_name : '';
            $course = isset($subjectbucket->patternclass->courseclass->course->course_name) ? $subjectbucket->patternclass->courseclass->course->course_name : '';
            $this->patternclass_id = $classyear.' '.$course.' '.$pattern;
            $this->setmode('view');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');
        }
    }

    public function render()
    {
        if($this->mode !== 'all' ){
            $this->patterns=Pattern::where('status',1)->pluck('pattern_name','id');
            $this->courses = Course::pluck('course_name','id');
            $course_classes = Courseclass::where('course_id', $this->course_id)->pluck('id');
            $this->pattern_classes = Patternclass::select('id', 'class_id', 'pattern_id')
                ->with(['pattern:id,pattern_name', 'courseclass.course:id,course_name', 'courseclass.classyear:id,classyear_name'])
                ->where('pattern_id', $this->pattern_id)
                ->whereIn('class_id', $course_classes)
                ->where('status', 1)
                ->get();

            $this->subject_verticals = Subjectvertical::where('is_active',1)->pluck('subject_vertical','id');

            if($this->subjectvertical_id){
                $this->subjects = Subject::select('id', 'subject_name')->where('subjectvertical_id', $this->subjectvertical_id)->where('status', 1)->get();
            }else{
                $this->subjects=[];
            }

            $this->departments = Department::where('status',1)->pluck('dept_name','id');
        }

        $subjectbuckets = Subjectbucket::with('department:id,dept_name', 'patternclass', 'subjectvertical:id,subject_vertical', 'subject:id,subject_name', 'academicyear:id,year_name')
        ->when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.faculty.subjectbucket.all-subjectbucket',compact('subjectbuckets'))->extends('layouts.faculty')->section('faculty');
    }
}
