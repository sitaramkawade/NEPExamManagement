<?php

namespace App\Livewire\Faculty\InternalToolAuditor;

use App\Models\Course;
use App\Models\Faculty;
use Livewire\Component;
use App\Models\Courseclass;
use App\Models\Academicyear;
use App\Models\Patternclass;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Models\Internaltoolauditor;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Faculty\InternalToolAuditor\InternalToolAuditorExport;

class AllInternalToolAuditor extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'delete'];

    public $faculty_id;
    public $faculties;
    public $academicyear_id;
    public $evaluationdate;
    public $status;

    public $course_id;
    public $courses;

    public $patternclass_id;
    public $pattern_classes;

    #[Locked]
    public $delete_id;
    #[Locked]
    public $internaltool_auditor_id;


    public $perPage=10;
    public $search='';
    public $sortColumn="patternclass_id";
    public $sortColumnBy="ASC";
    public $mode='all';
    public $per_page = 10;
    public $ext;


    public function rules()
    {
        return [
            'course_id' => ['required',Rule::exists(Course::class,'id')],
            'patternclass_id' => ['required',Rule::exists(Patternclass::class,'id')],
            'faculty_id' => ['required',Rule::exists(Faculty::class,'id')],
            'evaluationdate' => ['required', 'date'],
        ];
    }

    public function messages()
    {
        $messages = [
            'course_id.required' => 'The course field is required.',
            'course_id.exists' => 'The selected course is invalid.',
            'patternclass_id.required' => 'The pattern class field is required.',
            'patternclass_id.exists' => 'The selected pattern class is invalid.',
            'faculty_id.required' => 'The faculty field is required.',
            'faculty_id.exists' => 'The selected faculty is invalid.',
            'evaluationdate.required' => 'The evaluation date field is required.',
            'evaluationdate.date' => 'The evaluation date must be a valid date.',
        ];
        return $messages;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->edit_id=null;
        $this->course_id=null;
        $this->patternclass_id=null;
        $this->faculty_id=null;
        $this->evaluationdate=null;
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
        $filename="Notice-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new InternalToolAuditorExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new InternalToolAuditorExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new InternalToolAuditorExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function save()
    {
        $validatedData = $this->validate();
        $academicyear = Academicyear::where('active',1)->pluck('id')->first();
        $validatedData['academicyear_id'] = $academicyear;
        $internaltool_auditor = Internaltoolauditor::create($validatedData);
        if ($internaltool_auditor) {
            $this->dispatch('alert',type:'success',message:'Internal Tool Auditor Assigned Successfully');
            $this->resetinput();
            $this->setmode('all');
        } else {
            $this->dispatch('alert',type:'error',message:'Failed to Assign Internal Tool Auditor.');
        }
    }

    public function edit(Internaltoolauditor $internaltool_auditor)
    {
        if ($internaltool_auditor){
            $this->internaltool_auditor_id = $internaltool_auditor->id;
            $this->course_id = $internaltool_auditor->patternclass->courseclass->course->id;
            $this->patternclass_id= $internaltool_auditor->patternclass_id;
            $this->faculty_id= $internaltool_auditor->faculty_id;
            $this->evaluationdate= date('Y-m-d', strtotime($internaltool_auditor->evaluationdate));
        }else{
            $this->dispatch('alert',type:'error',message:'Internal tool Details Not Found');
        }
        $this->setmode('edit');
    }

    public function update(Internaltoolauditor $internaltool_auditor)
    {
        $validatedData = $this->validate();
        if ($internal_tool) {
            $internal_tool->update($validatedData);
            $this->dispatch('alert',type:'success',message:'Internal tool Updated Successfully');
        }else{
            $this->dispatch('alert',type:'error',message:'Error To Update Internal tool');
        }
        $this->setmode('all');
    }

    public function render()
    {
        if($this->mode !== 'all' ){
            $this->courses = Course::pluck('course_name','id');
            $course_classes = Courseclass::where('course_id', $this->course_id)->pluck('id');
            $this->pattern_classes = Patternclass::select('id', 'class_id', 'pattern_id')
                ->with(['pattern:id,pattern_name', 'courseclass.course:id,course_name', 'courseclass.classyear:id,classyear_name'])
                ->whereIn('class_id', $course_classes)
                ->where('status', 1)
                ->get();
            $department = Auth::guard('faculty')->user()->department_id;
            $this->faculties = Faculty::select('id','faculty_name')->where('department_id',$department)->get();
        }
        $internaltool_auditors = Internaltoolauditor::when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.faculty.internal-tool-auditor.all-internal-tool-auditor',compact('internaltool_auditors'))->extends('layouts.faculty')->section('faculty');
    }
}
