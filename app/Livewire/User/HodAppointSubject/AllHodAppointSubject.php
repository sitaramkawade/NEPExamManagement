<?php

namespace App\Livewire\User\HodAppointSubject;

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
use App\Exports\User\HodAppointSubject\HodAppointSubjectExport;

class AllHodAppointSubject extends Component
{
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'delete'];

    public $faculty_id;
    public $patternclass_id;
    public $appointby_id;
    public $pattern_id;
    public $course_id;
    public $course_class_id;
    public $courseclass_subject_id;
    public $pattern_class;
    public $course_name;

    public $faculties;
    public $patterns;
    public $courses;
    public $course_classes;
    public $pattern_classes;
    public $courseclass_subjects;

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
            'pattern_id' => ['required',Rule::exists(Pattern::class,'id')],
            'course_id' => ['required',Rule::exists(Course::class,'id')],
            'course_class_id' => ['required',Rule::exists(Courseclass::class,'id')],
            'courseclass_subject_id' => ['required',Rule::exists(Subject::class,'id')],
        ];
    }

    public function messages()
    {
        return [
            'faculty_id.required' => 'The faculty name field is required.',
            'faculty_id.exists' => 'The selected faculty is invalid.',
            'pattern_id.required' => 'The pattern name field is required.',
            'pattern_id.exists' => 'The selected pattern is invalid.',
            'course_id.required' => 'The course name field is required.',
            'course_id.exists' => 'The selected course is invalid.',
            'course_class_id.required' => 'The course class name field is required.',
            'course_class_id.exists' => 'The selected course class is invalid.',
            'courseclass_subject_id.required' => 'The subject name field is required.',
            'courseclass_subject_id.exists' => 'The selected subject is invalid.',
        ];
    }

    public function resetinput()
    {
        $this->faculty_id=null;
        $this->pattern_id=null;
        $this->course_id=null;
        $this->course_class_id=null;
        $this->courseclass_subject_id=null;
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

        // Check if a record already exists for the given subject and pattern class
        $courseclass_subject = Hodappointsubject::where('patternclass_id', $this->course_class_id)->where('subject_id', $this->courseclass_subject_id)->first();

        if ($courseclass_subject) {
            $this->dispatch('alert', type: 'error', message: 'Hod is already assigned for that subject');
            return;
        }

        // Find the pattern class
        $pattern_class = Patternclass::select('id')->where('class_id', $this->course_class_id)->where('pattern_id', $this->pattern_id)->first();

        if ($pattern_class) {
            $validatedData['patternclass_id'] = $pattern_class->id;
            $validatedData['subject_id'] = $this->courseclass_subject_id;

            // Check the current authentication guard
            $guard = auth()->guard();

            // Set appointby_id based on the guard
            if ($guard->name == 'user') {
                $validatedData['appointby_id'] = $guard->id();
                $hodappointsubject = Hodappointsubject::create($validatedData);

                if ($hodappointsubject) {
                    $this->dispatch('alert', type: 'success', message: 'Hod Appointed Successfully !!');
                    $this->setmode('all');
                } else {
                    $this->dispatch('alert', type: 'error', message: 'Something went wrong!!');
                }
            } else {
                // User is not authenticated or doesn't match any guard
                $this->dispatch('alert', type: 'error', message: 'You are not allowed to add Hod. Please log in as a user.');
                $this->setmode('all');
            }
        } else {
            $this->dispatch('alert', type: 'error', message: 'Pattern Class Not Found!!');
        }
    }


    public function edit(Hodappointsubject $hodappointsubject)
    {
        if ($hodappointsubject)
        {
            $this->hodappointsubject_id = $hodappointsubject->id;
            $this->faculty_id= $hodappointsubject->faculty_id;
            $this->appointby_id= $hodappointsubject->appointby_id;
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
            // Check the current authentication guard
            $guard = auth()->guard();

            // Set appointby_id based on the guard
            if ($guard->name == 'user') {
                $validatedData['appointby_id'] = $guard->id();
                $hodappointsubject->update($validatedData);
                $this->dispatch('alert', type: 'success', message: 'Appointed Hod Updated Successfully');
            } else {
                // User is not authenticated or doesn't match any guard
                $this->dispatch('alert', type: 'error', message: 'You are not allowed to update Appointed Hod. Please log in as a user.');
            }
        } else {
            $this->dispatch('alert', type: 'error', message: 'Error To Update Appointed Hod');
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

        $this->dispatch('alert',type:'success',message:'Appointed Hod Status Updated Successfully !!');
    }

    public function delete()
    {
        $hodappointsubject = Hodappointsubject::withTrashed()->find($this->delete_id);
        if($hodappointsubject){
            $hodappointsubject->forceDelete();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Appointed Hod Deleted Successfully !!');
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
            $this->dispatch('alert',type:'success',message:'Appointed Hod Soft Deleted Successfully');
            } else {
                $this->dispatch('alert',type:'error',message:'Appointed Hod Not Found !');
            }
        $this->setmode('all');
    }

    public function restore($id)
    {
        $hodappointsubject = Hodappointsubject::withTrashed()->find($id);

        if ($hodappointsubject) {
            $hodappointsubject->restore();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Appointed Hod Restored Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Appointed Hod Not Found');
        }
        $this->setmode('all');
    }

    public function view(Hodappointsubject $hodappointsubject)
    {
        if ($hodappointsubject)
        {
            $this->faculty_id = $hodappointsubject->faculty->faculty_name;
            $this->pattern_id = $hodappointsubject->patternclass->pattern->pattern_name;
            $this->course_id =  $hodappointsubject->patternclass->courseclass->course->course_name;
            $this->course_class_id =  $hodappointsubject->patternclass->courseclass->classyear->classyear_name;
            $this->courseclass_subject_id =  $hodappointsubject->subject->subject_name;
            $this->setmode('view');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');
        }
    }

    public function render()
    {
        if($this->mode !== 'all' ){
            $this->faculties=Faculty::select('id','faculty_name')->where('active',1)->get();
            $this->patterns=Pattern::select('id','pattern_name')->where('status',1)->get();
            $this->courses=Course::select('id','course_name')->get();
            $course_classes=Courseclass::where('course_id', $this->course_id)->pluck('id')->toArray();
            $this->pattern_classes=Patternclass::select('id','class_id','pattern_id')->whereIn('class_id', $course_classes)->where('pattern_id', $this->pattern_id)->get();
            $this->courseclass_subjects=Subject::select('id', 'subject_name',)->where('patternclass_id',$this->course_class_id)->get();
        }

        $hodappointsubjects = Hodappointsubject::with('faculty','subject', 'patternclass',)
        ->when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.user.hodappointsubject.all-hodappointsubject',compact('hodappointsubjects'))->extends('layouts.user')->section('user');
    }
}
