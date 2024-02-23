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
            'course_id' => ['required',Rule::exists(Course::class,'id')],
            'patternclass_id' => ['required',Rule::exists(Patternclass::class,'id')],
            'courseclass_subject_id' => ['required',Rule::exists(Subject::class,'id')],
        ];
    }

    public function messages()
    {
        return [
            'faculty_id.required' => 'The faculty name field is required.',
            'faculty_id.exists' => 'The selected faculty is invalid.',
            'course_id.required' => 'The course name field is required.',
            'course_id.exists' => 'The selected course is invalid.',
            'patternclass_id.required' => 'The course patternclass name field is required.',
            'patternclass_id.exists' => 'The selected patternclass class is invalid.',
            'courseclass_subject_id.required' => 'The subject name field is required.',
            'courseclass_subject_id.exists' => 'The selected subject is invalid.',
        ];
    }

    public function resetinput()
    {
        $this->faculty_id=null;
        $this->course_id=null;
        $this->patternclass_id=null;
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

        // Check if a record already exists for the given subject and pattern class with an active status
        $existing_record = Hodappointsubject::where('patternclass_id', $this->course_class_id)->where('subject_id', $this->courseclass_subject_id)->where('status', 1)->latest('updated_at')->first();

        if ($existing_record) {
            $this->dispatch('alert', type: 'error', message: 'HOD is active and already assigned for that subject');
            return;
        }

            $validatedData['subject_id'] = $this->courseclass_subject_id;

            // Check the current authentication guard
            $guard = auth()->guard();

            // Set appointby_id based on the guard
            if ($guard->name == 'user') {
                $validatedData['appointby_id'] = $guard->id();

                $hodappointsubject = Hodappointsubject::create($validatedData);

                if ($hodappointsubject) {
                    $this->dispatch('alert', type: 'success', message: 'HOD Appointed Successfully !!');
                    $this->setmode('all');
                } else {
                    $this->dispatch('alert', type: 'error', message: 'Something went wrong!!');
                }
            } else {
                // User is not authenticated or doesn't match any guard
                $this->dispatch('alert', type: 'error', message: 'You are not allowed to add HOD. Please log in as a user.');
                $this->setmode('all');
            }
        }



    public function edit(Hodappointsubject $hodappointsubject)
    {
        if ($hodappointsubject)
        {
            $this->hodappointsubject_id = $hodappointsubject->id;
            $this->faculty_id= $hodappointsubject->faculty_id;
            $this->course_id = $hodappointsubject->patternclass->courseclass->course->id;
            $this->patternclass_id= $hodappointsubject->patternclass_id;
            $this->courseclass_subject_id= $hodappointsubject->subject_id;
            $this->setmode('edit');
        }
        else{
        $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');
        }
    }

    public function update(Hodappointsubject $hodappointsubject)
    {
        $validatedData = $this->validate();

        if ($hodappointsubject) {
            // Check if a record already exists for the updated subject and pattern class with an active status
            $existing_record = Hodappointsubject::where('patternclass_id', $this->patternclass_id)->where('subject_id', $this->courseclass_subject_id)->where('status', 1)->where('id', '!=', $hodappointsubject->id)->latest('updated_at')->first();

            if ($existing_record) {
                $this->dispatch('alert', type: 'error', message: 'Hod is already assigned for that subject');
                return;
            }

            $validatedData['subject_id'] = $this->courseclass_subject_id;

            // Check the current authentication guard
            $guard = auth()->guard();

            // Set appointby_id based on the guard
            if ($guard->name == 'user') {
                $validatedData['appointby_id'] = $guard->id();
                $hodappointsubject->update($validatedData);
                $this->dispatch('alert', type: 'success', message: 'Appointed HOD Updated Successfully');
            } else {
                // User is not authenticated or doesn't match any guard
                $this->dispatch('alert', type: 'error', message: 'You are not allowed to update Appointed HOD. Please log in as a user.');
            }
        } else {
            $this->dispatch('alert', type: 'error', message: 'Pattern Class Not Found!!');
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

        $this->dispatch('alert',type:'success',message:'Appointed HOD Status Updated Successfully !!');
    }

    public function delete()
    {
        $hodappointsubject = Hodappointsubject::withTrashed()->find($this->delete_id);
        if($hodappointsubject){
            $hodappointsubject->forceDelete();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Appointed HOD Deleted Successfully !!');
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
            $this->dispatch('alert',type:'success',message:'Appointed HOD Soft Deleted Successfully');
            } else {
                $this->dispatch('alert',type:'error',message:'Appointed HOD Not Found !');
            }
        $this->setmode('all');
    }

    public function restore($id)
    {
        $hodappointsubject = Hodappointsubject::withTrashed()->find($id);

        if ($hodappointsubject) {
            $hodappointsubject->restore();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Appointed HOD Restored Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Appointed HOD Not Found');
        }
        $this->setmode('all');
    }

    public function view(Hodappointsubject $hodappointsubject)
    {
        if ($hodappointsubject)
        {
            $this->faculty_id = isset($hodappointsubject->faculty->faculty_name) ? $hodappointsubject->faculty->faculty_name : '';
            $this->pattern_id = isset($hodappointsubject->patternclass->pattern->pattern_name) ? $hodappointsubject->patternclass->pattern->pattern_name : '';
            $this->course_id = isset($hodappointsubject->patternclass->courseclass->course->course_name) ? $hodappointsubject->patternclass->courseclass->course->course_name : '';
            $pattern = isset($hodappointsubject->patternclass->pattern->pattern_name) ? $hodappointsubject->patternclass->pattern->pattern_name : '';
            $classyear = isset($hodappointsubject->patternclass->courseclass->classyear->classyear_name) ? $hodappointsubject->patternclass->courseclass->classyear->classyear_name : '';
            $course = isset($hodappointsubject->patternclass->courseclass->course->course_name) ? $hodappointsubject->patternclass->courseclass->course->course_name : '';
            $this->patternclass_id = $classyear.' '.$course.' '.$pattern;
            $this->courseclass_subject_id = isset($hodappointsubject->subject->subject_name) ? $hodappointsubject->subject->subject_name : '';

            $this->setmode('view');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');
        }
    }

    public function render()
    {
        if ($this->mode !== 'all') {
            $this->faculties = Faculty::where('active',1)->pluck('faculty_name','id');
            $this->courses = Course::pluck('course_name','id');
            $course_classes = Courseclass::where('course_id', $this->course_id)->pluck('id');
            $this->pattern_classes = Patternclass::select('id', 'class_id', 'pattern_id')
                ->with(['pattern:id,pattern_name', 'courseclass.course:id,course_name', 'courseclass.classyear:id,classyear_name'])
                ->whereIn('class_id', $course_classes)
                ->where('status', 1)
                ->get();

            // If in edit mode, include all subjects associated with the current course class
            if ($this->mode === 'edit') {
                $this->courseclass_subjects = Subject::select('id', 'subject_name')->where('patternclass_id', $this->patternclass_id)->get();
            } else {
                // Exclude subjects that are already assigned and active in Hodappointsubject table
                $existing_subject_ids = Hodappointsubject::where('patternclass_id', $this->patternclass_id)->where('status', 1)->pluck('subject_id')->toArray(); // Only consider active records

                $this->courseclass_subjects = Subject::select('id', 'subject_name')->where('patternclass_id', $this->patternclass_id)->whereNotIn('id', $existing_subject_ids)->get();
            }
        }

        $hodappointsubjects = Hodappointsubject::with('faculty','subject', 'patternclass')->when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.user.hodappointsubject.all-hodappointsubject',compact('hodappointsubjects'))->extends('layouts.user')->section('user');
    }
}
