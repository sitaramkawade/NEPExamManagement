<?php

namespace App\Livewire\Faculty\InternalAudit\UploadDocument;

use App\Models\Course;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Courseclass;
use App\Models\Academicyear;
use App\Models\Patternclass;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Http\UploadedFile;
use App\Models\Internaltoolmaster;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Facultyinternaldocument;


class AllUploadDocument extends Component
{
    use WithFileUploads;
    protected $listeners = ['delete-confirmed'=>'delete'];

    public $academicyear_id=4;
    public $academicyears;
    public $course_id=21;
    public $courses;
    public $patternclass_id=113;
    public $pattern_classes;
    public $subject_id=1907;
    public $subjects;

    // public $academicyear_id;
    // public $academicyears;
    // public $course_id;
    // public $courses;
    // public $patternclass_id;
    // public $pattern_classes;
    // public $subject_id;
    // public $subjects;

    public $documents_to_upload=[];
    public $counter = 1;
    #[Locked]
    public $delete_id;
    #[Locked]
    public $uploaddoc_id;

    public $mode='all';


    protected function rules()
    {
        return [
            'academicyear_id' => ['required', Rule::exists(Academicyear::class,'id')],
            'course_id' => ['required', Rule::exists(Course::class,'id')],
            'patternclass_id' => ['required', Rule::exists(Patternclass::class,'id')],
            'subject_id' => ['required', Rule::exists(Subject::class,'id')],
            // 'selected_tools' => ['required', Rule::exists(Internaltoolmaster::class,'id')],
        ];
    }

    public function messages()
    {
        return [
            'academicyear_id.required' => 'The academic year ID field is required.',
            'academicyear_id.exists' => 'The selected academic year does not exist.',
            'course_id.required' => 'The course ID field is required.',
            'course_id.exists' => 'The selected course does not exist.',
            'patternclass_id.required' => 'The pattern class ID field is required.',
            'patternclass_id.exists' => 'The selected pattern class does not exist.',
            'subject_id.required' => 'The subject ID field is required.',
            'subject_id.exists' => 'The selected subject does not exist.',
            // 'selected_tools.required' => 'The internal tools field is required.',
            // 'selected_tools.exists' => 'The selected internal tool does not exist.',
        ];
    }

    public function resetinput()
    {
        $this->academicyear_id=null;
        $this->course_id=null;
        $this->patternclass_id=null;
        $this->subject_id=null;
        $this->selected_tools=null;
    }

    public function save()
    {
        foreach ($this->documents_to_upload as $key => $document) {
            $fileName = 'document-' . time().'-'.$key.'.' .  $document->getClientOriginalExtension();
            dd($fileName);
        }
    }

    public function render()
    {
        if($this->mode == 'all'){
            $this->academicyears = Academicyear::pluck('year_name','id');
            $this->courses = Course::select('id', 'course_name', 'course_type',)->get();
            $course_classes = Courseclass::where('course_id', $this->course_id)->pluck('id');
            $this->pattern_classes = Patternclass::select('id', 'class_id', 'pattern_id')
                ->with(['pattern:id,pattern_name', 'courseclass.course:id,course_name', 'courseclass.classyear:id,classyear_name'])
                ->whereIn('class_id', $course_classes)
                ->where('status', 1)
                ->get();

            if($this->patternclass_id){
                $this->subjects = Subject::select('id', 'subject_name')
                ->with(['subjectvertical:id,subject_vertical',])
                ->where('patternclass_id', $this->patternclass_id)
                ->where('status', 1)
                ->get();
            }else{
                $this->subjects=[];
            }

            if ($this->subject_id) {
                $this->documents_to_upload = Facultyinternaldocument::where('faculty_id',Auth::guard('faculty')->user()->id)
                ->where('subject_id',$this->subject_id)
                ->where('academicyear_id',$this->academicyear_id)
                ->get();
            } else {
                $this->documents_to_upload = [];
            }
        }
        return view('livewire.faculty.internal-audit.upload-document.all-upload-document')->extends('layouts.faculty')->section('faculty');
    }
}
