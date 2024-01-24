<?php

namespace App\Livewire\Faculty\HodAppointSubject;

use App\Models\Course;
use App\Models\Faculty;
use App\Models\Pattern;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Courseclass;
use App\Models\Patternclass;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Models\Hodappointsubject;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Faculty\HodAppointSubject\HodAppointSubjectExport;

class AllHodAppointSubject extends Component
{
    use WithPagination;

    public $faculty_id;
    public $subject_id;
    public $patternclass_id;
    public $appointby_id;
    public $status;
    public $pattern_id;
    public $course_id;
    public $course_class_id;
    public $pattern_class;
    public $course_name;

    public $faculties;
    public $subjects;
    public $patterns;
    public $courses;
    public $course_classes;

    public $mode='all';
    public $per_page = 10;

    #[Locked]
    public $hodappointsubject_id;
    #[Locked]
    public $delete_id;


    public $perPage=10;
    public $search='';
    public $sortColumn="faculty_id";
    public $sortColumnBy="ASC";
    public $ext;
    public $isDisabled = true;

    protected function rules()
    {
        return [
            'faculty_id' => ['required', Rule::exists(Faculty::class,'id')],
            'subject_id' => ['required', Rule::exists(Subject::class,'id')],
            'pattern_id' => ['required',Rule::exists(Pattern::class,'id')],
            'course_id' => ['required',Rule::exists(Course::class,'id')],
            'course_class_id' => ['required',Rule::exists(Courseclass::class,'id')],
            'status' => ['required', 'in:0,1',],
        ];
    }

    public function messages()
    {
        return [
            'faculty_id.required' => 'The faculty ID field is required.',
            'faculty_id.exists' => 'The selected faculty is invalid.',
            'subject_id.required' => 'The subject ID field is required.',
            'subject_id.exists' => 'The selected subject is invalid.',
            'pattern_id.required' => 'The pattern ID field is required.',
            'pattern_id.exists' => 'The selected pattern is invalid.',
            'course_id.required' => 'The course ID field is required.',
            'course_id.exists' => 'The selected course is invalid.',
            'course_class_id.required' => 'The course class ID field is required.',
            'course_class_id.exists' => 'The selected course class is invalid.',
            'status.required' => 'The status field is required.',
            'status.in' => 'The status must be either Inactive or Active.',
        ];
    }

    public function resetinput()
    {
        $this->faculty_id=null;
        $this->subject_id=null;
        $this->subject_no=null;
        $this->status=null;
        $this->pattern_id=null;
        $this->course_id=null;
        $this->course_class_id=null;
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

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function save()
    {
        $validatedData = $this->validate();
        $pattern_class = Patternclass::select('id')->where('class_id', $this->course_class_id)->where('pattern_id', $this->pattern_id)->first('id');
        if ($pattern_class) {
            $validatedData['patternclass_id'] = $pattern_class->id;
            // Check the current authentication guard
            $guard = auth()->guard();

            // Set appointby_id based on the guard
            if ($guard->name == 'faculty') {
                $validatedData['appointby_id'] = $guard->id();
            } else {
                // Handle the case when the user is not authenticated or doesn't match any guard
                $validatedData['appointby_id'] = null;
            }
            $hodappointsubject = Hodappointsubject::create($validatedData);
            if ($hodappointsubject) {
                $this->dispatch('alert',type:'success',message:'Subject Appointed Successfully !!');
                $this->setmode('all');
            } else {
                $this->dispatch('alert',type:'error',message:'Something went wrong!!');
            }
        } else {
            $this->dispatch('alert',type:'success',message:'Pattern Class Not Found!!');
        }
    }

    public function edit(Hodappointsubject $hodappointsubject)
    {
        if ($hodappointsubject)
        {
            $this->hodappointsubject_id = $hodappointsubject->id;
            $this->faculty_id= $hodappointsubject->faculty_id;
            $this->subject_id= $hodappointsubject->subject_id;
            $this->appointby_id= $hodappointsubject->appointby_id;
            $this->status= $hodappointsubject->status;
            $this->patternclass_id= $hodappointsubject->patternclass_id;
            $this->feach();
            $this->setmode('edit');
        }
        else{
        $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');
        }
    }

    public function feach()
    {
        $hodappointsubjects = Hodappointsubject::all();

        foreach ($hodappointsubjects as $hodappointsubject) {
            $pattern_class_id = $hodappointsubject->patternclass_id;

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

    public function update(Hodappointsubject $hodappointsubject)
    {
        $validatedData = $this->validate();
        if ($hodappointsubject) {
            $hodappointsubject->update($validatedData);
            $this->dispatch('alert',type:'success',message:'Appointed Subject Updated Successfully');
        }else{
            $this->dispatch('alert',type:'error',message:'Error To Update Appointed Subject');
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

    public function export()
    {
        $filename="HodAppointSubject-".time();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new HodAppointSubjectExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new HodAppointSubjectExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new HodAppointSubjectExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }

    }

    public function changestatus(Hodappointsubject $hodappointsubject)
    {
        if( $hodappointsubject->status==0)
        {
            $hodappointsubject->status=1;
        }
        else if( $hodappointsubject->status==1)
        {
            $hodappointsubject->status=0;
        }
        $hodappointsubject->update();

        $this->dispatch('alert',type:'success',message:'Appointed Subject Status Updated Successfully !!');
    }

    public function delete()
    {
        $hodappointsubject = Hodappointsubject::withTrashed()->find($this->delete_id);
        if($hodappointsubject){
            $hodappointsubject->forceDelete();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Appointed Subject Deleted Successfully !!');
        } else {
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');
        }
        $this->setmode('all');
    }

    public function softdelete($id)
    {
        $hodappointsubject = Hodappointsubject::withTrashed()->findOrFail($id);
        if ($hodappointsubject) {
            $hodappointsubject->delete();
            $this->dispatch('alert',type:'success',message:'Appointed Subject Soft Deleted Successfully');
            } else {
                $this->dispatch('alert',type:'error',message:'Appointed Subject Not Found !');
            }
        $this->setmode('all');
    }

    public function restore($id)
    {
        $hodappointsubject = Hodappointsubject::withTrashed()->find($id);

        if ($hodappointsubject) {
            $hodappointsubject->restore();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Appointed Subject Restored Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Appointed Subject Not Found');
        }
        $this->setmode('all');
    }

    public function view(Hodappointsubject $hodappointsubject)
    {
        if ($hodappointsubject)
        {
            $this->faculty_id = $hodappointsubject->faculty->faculty_name;
            $this->subject_id = $hodappointsubject->subject->subject_name;
            $this->pattern_id = $hodappointsubject->patternclass->pattern->pattern_name;
            $this->course_id =  $hodappointsubject->patternclass->courseclass->course->course_name;
            $this->course_class_id =  $hodappointsubject->patternclass->courseclass->classyear->classyear_name;
            $this->status = $hodappointsubject->status;
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
            $this->faculties=Faculty::select('id','faculty_name')->where('active',1)->get();
            $this->subjects=Subject::select('id','subject_name')->where('status',1)->get();
        }

        $hodappointsubjects = Hodappointsubject::with('faculty','subject', 'patternclass',)
        ->when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.faculty.hodappointsubject.all-hodappointsubject',compact('hodappointsubjects'))->extends('layouts.faculty')->section('faculty');
    }
}
