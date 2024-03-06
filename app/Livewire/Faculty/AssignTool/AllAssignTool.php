<?php

namespace App\Livewire\Faculty\AssignTool;

use App\Models\Course;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Courseclass;
use App\Models\Academicyear;
use App\Models\Patternclass;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Models\Internaltoolmaster;
use App\Models\Internaltoolauditor;
use Illuminate\Support\Facades\Auth;
use App\Models\Facultyinternaldocument;

class AllAssignTool extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'delete'];

    public $academicyear_id;
    public $academicyears;
    public $course_id;
    public $courses;
    public $patternclass_id;
    public $pattern_classes;
    public $subject_id;
    public $subjects;
    public $internaltools;

    public $counter=1;

    public $selected_tools=[];

    #[Locked]
    public $assignedtool_id;
    #[Locked]
    public $delete_id;

    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $mode='all';
    public $ext;

    protected function rules()
    {
        return [
            'academicyear_id' => ['required', Rule::exists(Academicyear::class,'id')],
            'course_id' => ['required', Rule::exists(Course::class,'id')],
            'patternclass_id' => ['required', Rule::exists(Patternclass::class,'id')],
            'subject_id' => ['required', Rule::exists(Subject::class,'id')],
            'selected_tools' => ['required', Rule::exists(Internaltoolmaster::class,'id')],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
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
            'selected_tools.required' => 'The internal tools field is required.',
            'selected_tools.exists' => 'The selected internal tool does not exist.',
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
        $validatedData = $this->validate();
        $assignedToolData = [];

        foreach ($this->selected_tools as $inttooldocid) {
            $assignedToolData[] = [
                'internaltooldocument_id' => $inttooldocid,
                'faculty_id' => Auth::guard('faculty')->user()->id,
                'academicyear_id' => $validatedData['academicyear_id'],
                'subject_id' => $validatedData['subject_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Facultyinternaldocument::insert($assignedToolData);

        $this->dispatch('alert', type: 'success', message: 'Tool Assigned To Subject Successfully');
        $this->resetinput();
        $this->setmode('all'); // Assuming you want to switch back to a specific mode after updating
    }

    public function edit(Facultyinternaldocument $assigned_tool)
    {
        if ($assigned_tool) {
            // Load the data into the Livewire component properties
            $selectedTools = Facultyinternaldocument::where('subject_id', $assigned_tool->subject_id)->get();

            // Extract the IDs from the selected tools
            $this->assignedtool_id = $assigned_tool->id;
            $this->selected_tools = $selectedTools->pluck('internaltooldocument_id')->toArray();
            $this->academicyear_id = $assigned_tool->academicyear_id;
            $this->course_id = $assigned_tool->subject->patternclass->courseclass->course->id;
            $this->patternclass_id = $assigned_tool->subject->patternclass_id;
            $this->subject_id = $assigned_tool->subject_id;

            // Now, you can show the form with the preloaded data for editing
            $this->setmode('edit');
        } else {
            $this->dispatch('alert', type: 'error', message: 'Assigned Internal Tool Not Found');
        }
    }

    public function update(Facultyinternaldocument $assignedtool_id)
    {
        $validatedData = $this->validate();

        // Prepare the data for the update
        $assignedToolData = [];
        foreach ($this->selected_tools as $inttooldocid) {
            $assignedToolData[] = [
                'internaltooldocument_id' => $inttooldocid,
                'faculty_id' => Auth::guard('faculty')->user()->id,
                'academicyear_id' => $validatedData['academicyear_id'],
                'subject_id' => $validatedData['subject_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Delete existing records for the subject
        Facultyinternaldocument::where('subject_id', $validatedData['subject_id'])->forceDelete();

        // Insert new records
        Facultyinternaldocument::insert($assignedToolData);

        // Dispatch success message and reset input
        $this->dispatch('alert', type: 'success', message: 'Assigned Internal Tool Updated Successfully');
        $this->resetinput();
        $this->setmode('all'); // Assuming you want to switch back to a specific mode after updating
    }

    public function softdelete($id)
    {
        $deletedCount = Facultyinternaldocument::where('subject_id', $id)->delete();

        if ($deletedCount > 0) {
            $this->dispatch('alert',type:'success',message:'Assigned Tool Soft Deleted Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Assigned Tool Not Found !');
        }
    }

    public function delete()
    {
        try
        {
            $assigned_tool = Facultyinternaldocument::where('subject_id', $this->delete_id)->forceDelete();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Assigned Tool Deleted Successfully !!');
        } catch (\Illuminate\Database\QueryException $e) {

            if ($e->errorInfo[1] == 1451) {

                $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
            }
        }
    }

    public function restore($id)
    {
        $assigned_tool = Facultyinternaldocument::where('subject_id', $id)->restore();

        if ($assigned_tool) {
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Assigned Tool Restored Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Assigned Tool Not Found');
        }
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

    public function render()
    {
        if($this->mode !== 'all'){
            $internaltool_auditor_patternclass_id = Internaltoolauditor::where('faculty_id',Auth::guard('faculty')->user()->id)->pluck('patternclass_id','academicyear_id');

            $this->academicyears = Academicyear::pluck('year_name','id');
            $this->courses = Course::select('id', 'course_name', 'course_type',)->get();
            $course_classes = Courseclass::where('course_id', $this->course_id)->pluck('id');
            $this->pattern_classes = Patternclass::select('id', 'class_id', 'pattern_id')
                ->with(['pattern:id,pattern_name', 'courseclass.course:id,course_name', 'courseclass.classyear:id,classyear_name'])
                ->whereIn('id', $internaltool_auditor_patternclass_id)
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
                $course = Course::find($this->course_id);
                $this->internaltools = Internaltoolmaster::select('id','toolname')
                    ->where('course_type', $course->course_type)
                    ->where('status', 1)
                    ->get();
            } else {
                $this->internaltools = [];
            }
        }
        $assignedInternalTools = Facultyinternaldocument::with('faculty','subject','academicyear')->when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        $groupedassignedInternalTools = $assignedInternalTools->groupBy('subject_id');
        return view('livewire.faculty.assign-tool.all-assign-tool',compact('assignedInternalTools','groupedassignedInternalTools'))->extends('layouts.faculty')->section('faculty');
    }
}
