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
use App\Models\Subjectcategory;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Faculty\SubjectBucket\SubjectBucketExport;

class AllSubjectBucket extends Component
{
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'delete'];
    public $department_id;
    public $patternclass_id;
    public $subject_division;
    public $subjectcategory_id;
    public $subject_categoryno;
    public $subject_id;
    #[Locked]
    public $subjectbucket_id;
    public $academicyear_id;
    public $pattern_id;
    public $course_id;
    public $course_class_id;
    #[Locked]
    public $delete_id;
    public $mode='all';
    public $per_page = 10;
    public $perPage=10;
    public $search='';
    public $sortColumn="subject_categoryno";
    public $sortColumnBy="ASC";
    public $ext;
    public $status;
    public $departments;
    public $subject_categories;
    public $patterns;
    public $courses;
    public $course_classes;
    public $subjects;
    public $academic_years;
    public $isDisabled = true;


    protected function rules()
    {
        return [
            'subject_categoryno' => ['required',],
            'academicyear_id' => ['required',Rule::exists(Academicyear::class,'id')],
            'subject_division' => ['required', 'in:A,B,C,D',],
            'subject_id' => ['required',Rule::exists(Subject::class,'id')],
            'subjectcategory_id' => ['required',Rule::exists(Subjectcategory::class,'id')],
            'department_id' => ['required',Rule::exists(Department::class,'id')],
            'pattern_id' => ['required',Rule::exists(Pattern::class,'id')],
            'course_id' => ['required',Rule::exists(Course::class,'id')],
            'course_class_id' => ['required',Rule::exists(Courseclass::class,'id')],
            'status' => ['required', 'in:0,1',],
        ];
    }

    public function messages()
    {
        return [
            'subject_categoryno.required' => 'The subject category number field is required.',
            'subject_categoryno.required' => 'The subject category number field is required.',
            'academicyear_id.required' => 'The academic year field is required.',
            'academicyear_id.exists' => 'The selected academic year is invalid.',
            'subject_division.required' => 'The subject division field is required.',
            'subject_division.in' => 'The subject division must be one of: A, B, C, D.',
            'subject_id.required' => 'The subject field is required.',
            'subject_id.exists' => 'The selected subject is invalid.',
            'subjectcategory_id.required' => 'The subject category field is required.',
            'subjectcategory_id.exists' => 'The selected subject category is invalid.',
            'department_id.required' => 'The department field is required.',
            'department_id.exists' => 'The selected department is invalid.',
            'pattern_id.required' => 'The pattern field is required.',
            'pattern_id.exists' => 'The selected pattern is invalid.',
            'course_id.required' => 'The course field is required.',
            'course_id.exists' => 'The selected course is invalid.',
            'course_class_id.required' => 'The course class field is required.',
            'course_class_id.exists' => 'The selected course class is invalid.',
            'status.required' => 'The status field is required.',
            'status.in' => 'The status must be either Inactive or Active.',
        ];
    }

    public function resetinput()
    {
         $this->subject_categoryno = null;
         $this->academicyear_id = null;
         $this->subject_division = null;
         $this->subjectcategory_id = null;
         $this->subject_id = null;
         $this->department_id = null;
         $this->pattern_id = null;
         $this->course_id = null;
         $this->status = null;
         $this->course_class_id = null;
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
        $pattern_class = Patternclass::select('id')->where('class_id', $this->course_class_id)->where('pattern_id', $this->pattern_id)->first('id');

        if ($pattern_class) {
            $validatedData['patternclass_id'] = $pattern_class->id;
            $subjectbucket = Subjectbucket::create($validatedData);

            if ($subjectbucket) {
                $this->dispatch('alert',type:'success',message:'Subject bucket Saved Successfully !!');
                $this->setmode('all');
            } else {
                $this->dispatch('alert',type:'error',message:'Something went wrong!!');
            }
        } else {
            $this->dispatch('alert',type:'success',message:'Pattern Class Not Found!!');
        }
    }

    public function edit(Subjectbucket $subjectbucket)
    {
        if ($subjectbucket)
        {
            $this->subjectbucket_id = $subjectbucket->id;
            $this->subject_categoryno= $subjectbucket->subject_categoryno;
            $this->academicyear_id= $subjectbucket->academicyear_id;
            $this->subject_division= $subjectbucket->subject_division;
            $this->subjectcategory_id= $subjectbucket->subjectcategory_id;
            $this->subject_id= $subjectbucket->subject_id;
            $this->department_id= $subjectbucket->department_id;
            $this->status= $subjectbucket->status;
            $this->patternclass_id= $subjectbucket->patternclass_id;
            $this->feach();
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

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function export()
    {
        $filename="Subjectbucket-".time();
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
        $subjectbucket = Subjectbucket::withTrashed()->find($this->delete_id);
        if($subjectbucket){
            $subjectbucket->forceDelete();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Subject Bucket Deleted Successfully !!');
        } else {
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');
        }
        $this->setmode('all');
    }

    public function softdelete($id)
    {
        $subjectbucket = Subjectbucket::withTrashed()->findOrFail($id);
        if ($subjectbucket) {
            $subjectbucket->delete();
            $this->dispatch('alert',type:'success',message:'Subject Bucket Deleted Successfully');
            } else {
                $this->dispatch('alert',type:'error',message:'Subject Bucket Not Found !');
            }
        $this->setmode('all');
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
            $this->subject_id= $subjectbucket->subject->subject_name;
            $this->subject_division= $subjectbucket->subject_division;
            $this->subjectcategory_id= $subjectbucket->subjectcategory->subjectcategory;
            $this->department_id= $subjectbucket->department->dept_name;
            $this->academicyear_id= $subjectbucket->academicyear->year_name;
            $this->status= $subjectbucket->status;
            $this->pattern_id = $subjectbucket->patternclass->pattern->pattern_name;
            $this->course_id =  $subjectbucket->patternclass->courseclass->course->course_name;
            $this->course_class_id =  $subjectbucket->patternclass->courseclass->classyear->classyear_name;
            $this->setmode('view');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');
        }
    }

    public function render()
    {
        if($this->mode !== 'all' ){
            $this->patterns=Pattern::select('id','pattern_name')->where('status',1)->get();
            $this->courses=Course::select('id','course_name')->get();
            $this->course_classes=Courseclass::select('id','course_id','classyear_id')->where('course_id', $this->course_id)->get();
            $this->subject_categories = Subjectcategory::select('id','subjectcategory')->where('active',1)->get();
            $this->academic_years= Academicyear::select('id','year_name')->where('active',1)->get();
            $this->subjects= Subject::select('id','subject_name')->where('status',1)->get();
            $this->departments= Department::select('id','dept_name')->where('status',1)->get();
        }

        $subjectbuckets = Subjectbucket::with('department', 'patternclass', 'subjectcategory', 'subject', 'academicyear')
        ->when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.faculty.subjectbucket.all-subjectbucket',compact('subjectbuckets'))->extends('layouts.faculty')->section('faculty');
    }
}
