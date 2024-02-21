<?php

namespace App\Livewire\Faculty\ExamPanel;

use App\Models\Faculty;
use App\Models\Subject;
use Livewire\Component;
use App\Models\ExamPanel;
use App\Models\Department;
use App\Models\Patternclass;
use Livewire\WithPagination;
use App\Models\ExamOrderPost;
use Illuminate\Validation\Rule;
use App\Models\Hodappointsubject;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Faculty\ExamPanel\ExamPanelExport;

class ViewExamPanel extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $post_id;

    public $selected_faculties=[];
    public $faculty_id;
    public $patternclass_id;
    public $subject_id;
    public $department_id;

    public $pattern_classes;
    public $posts;
    public $subjects;
    public $departments;
    public $faculties;

    #[Locked]
    public $exampanel_id;
    #[Locked]
    public $delete_id;

    public $perPage=10;
    public $per_page = 10;
    public $search='';
    public $mode='add';
    public $isDisabled = true;
    public $sortColumn="faculty_id";
    public $sortColumnBy="ASC";
    public $ext;

    protected function rules()
    {
        return [
            'patternclass_id' => ['required', 'integer', Rule::exists(Patternclass::class,'id'),],
            'subject_id' => ['required', Rule::exists(Subject::class,'id')],
            'department_id' => ['required', Rule::exists(Department::class,'id')],
            'post_id' => ['required', Rule::exists(ExamOrderPost::class,'id')],
            'selected_faculties' => ['required', ],
            'selected_faculties' => ['required', 'max:50'],
        ];
    }

    public function resetinput()
    {
        $this->patternclass_id=null;
        $this->subject_id=null;
        $this->department_id=null;
        $this->post_id=null;
        $this->selected_faculties=null;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function messages()
    {
        return [
            'patternclass_id.required' => 'The Class field is required.',
            'patternclass_id.integer' => 'The Class must be an integer.',
            'patternclass_id.exists' => 'The selected Class is invalid.',

            'subject_id.required' => 'The Subject field is required.',
            'subject_id.exists' => 'The selected Subject is invalid.',
            'subject_id.integer' => 'The Subject must be an integer.',

            'department_id.required' => 'The Department field is required.',
            'department_id.integer' => 'The Department must be an integer.',
            'department_id.exists' => 'The selected Department is invalid.',

            'post_id.required' => 'The Post field is required.',
            'post_id.integer' => 'The Post must be an integer.',
            'post_id.exists' => 'The selected Post is invalid.',

            'selected_faculties.required' => 'Please select at least one faculty.',
        ];
    }

    public function save()
    {
        $validatedData = $this->validate();

        $exampanelData = [];

        foreach ($this->selected_faculties as $facultyid) {
            $exampanelData[] = [
                'faculty_id' => $facultyid,
                'examorderpost_id' => $validatedData['post_id'],
                'subject_id' => $validatedData['subject_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert ExamPanel records in one shot
        ExamPanel::insert($exampanelData);

        $this->dispatch('alert', type: 'success', message: 'Exam Panels Added Successfully');
        $this->resetinput();
    }

    public function edit(ExamPanel $exampanel)
    {
        if ($exampanel) {
            // Load the data into the Livewire component properties
            $selectedFaculties = ExamPanel::where('subject_id', $exampanel->subject_id)->get();

            // Extract the IDs from the selected faculties
            $this->selected_faculties = $selectedFaculties->pluck('faculty_id')->toArray(); // Assuming faculty_id is the correct column name

            $this->patternclass_id = $exampanel->subject->patternclass_id;
            $this->subject_id = $exampanel->subject_id;
            $this->post_id = $exampanel->examorderpost_id;
            $this->department_id = $exampanel->faculty->department_id; // Assuming department_id is the correct column name

            // Load all faculties associated with the ExamPanel
            $allFaculties = Faculty::where('department_id', $this->department_id)->where('active', 1)->get();
            $this->faculties = $allFaculties->pluck('id')->toArray();

            // Now, you can show the form with the preloaded data for editing
            $this->setmode('edit');
        } else {
            $this->dispatch('alert', type: 'error', message: 'Exam Panel not found');
        }
    }

    public function update()
    {
        $validatedData = $this->validate();

        $exampanelData = [];

        foreach ($this->selected_faculties as $facultyid) {
            $exampanelData[] = [
                'faculty_id' => $facultyid,
                'examorderpost_id' => $validatedData['post_id'],
                'subject_id' => $validatedData['subject_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Update ExamPanel records in one shot
        ExamPanel::where('examorderpost_id', $validatedData['post_id'])->delete(); // Delete existing records
        ExamPanel::insert($exampanelData); // Insert new records

        $this->dispatch('alert', type: 'success', message: 'Exam Panels Updated Successfully');
        $this->resetinput();
        $this->setmode('add'); // Assuming you want to switch back to create mode after updating
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

    public function softdelete($id)
    {
        $exampanel_faculty = ExamPanel::withTrashed()->find($id);

        if ($exampanel_faculty) {
            $exampanel_faculty->delete();
            $this->dispatch('alert',type:'success',message:'Faculty Soft Deleted From Exam Panel Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Faculty Not Found In Exam Panel !');
        }
    }

    public function delete()
    {
        try
        {
            $exampanel_faculty = ExamPanel::withTrashed()->find($this->delete_id);
            $exampanel_faculty->forceDelete();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Faculty Deleted From Exam Panel Successfully !!');
        } catch (\Illuminate\Database\QueryException $e) {

            if ($e->errorInfo[1] == 1451) {

                $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
            }
        }
    }

    public function restore($id)
    {
        $exampanel_faculty = ExamPanel::withTrashed()->find($id);

        if ($exampanel_faculty) {
            $exampanel_faculty->restore();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Exam Panel Faculty Restored Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Exam Panel Faculty Not Found');
        }
    }

    public function view(ExamPanel $exampanel)
    {
        if ($exampanel){
            $this->patternclass_id = (isset($exampanel->subject->patternclass->pattern->pattern_name) ? $exampanel->subject->patternclass->pattern->pattern_name : '') . ' ' .
            (isset($exampanel->subject->patternclass->courseclass->classyear->classyear_name) ? $exampanel->subject->patternclass->courseclass->classyear->classyear_name : '') . ' ' .
            (isset($exampanel->subject->patternclass->courseclass->course->course_name) ? $exampanel->subject->patternclass->courseclass->course->course_name : '');
            $this->subject_id = isset($exampanel->subject->subject_name) ? $exampanel->subject->subject_name : '';
            $this->post_id = isset($exampanel->examorderpost->post_name) ? $exampanel->examorderpost->post_name : '';
            $this->department_id = isset($exampanel->faculty->department->dept_name) ? $exampanel->faculty->department->dept_name : '';
            $this->faculty_id = isset($exampanel->faculty->faculty_name) ? $exampanel->faculty->faculty_name : '';
        }else{
            $this->dispatch('alert',type:'error',message:'Exam Panel Details Not Found');
        }
        $this->setmode('view');
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
        $filename="ExamPanel-".time();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExamPanelExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExamPanelExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExamPanelExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function render()
    {
        $auth_faculty = auth('faculty')->user();

        $appointed_subjects = Hodappointsubject::where('faculty_id', $auth_faculty->id)->where('status', 1)->pluck('subject_id')->toArray();
        $patternclass_id = Subject::whereIn('id', $appointed_subjects)->pluck('patternclass_id')->toArray();

        $this->pattern_classes = Patternclass::whereIn('id', $patternclass_id)->select('id', 'class_id', 'pattern_id')->with(['pattern:pattern_name,id', 'courseclass.course:course_name,id', 'courseclass.classyear:classyear_name,id'])->where('status', 1)->get();
        $this->posts=ExamOrderPost::select('id','post_name')->where('status',1)->get();

        $this->subjects = Subject::whereIn('id', $appointed_subjects)->select('id', 'subject_name')->where('patternclass_id', $this->patternclass_id)->where('status', 1)->get();

        $this->departments = Department::select('id','dept_name')->where('id',$auth_faculty->department_id)->where('status',1)->get();

        $this->faculties = Faculty::select('id','faculty_name')->where('department_id', $this->department_id)->where('active',1)->whereNotNull('department_id')->get();

        $examPanels = ExamPanel::with('subject', 'faculty', 'examorderpost')->withTrashed()->whereIn('subject_id', $appointed_subjects)->paginate($this->perPage);
        $groupedExamPanels = $examPanels->groupBy('subject_id');

        return view('livewire.faculty.exam-panel.view-exam-panel', compact('groupedExamPanels','examPanels'))->extends('layouts.faculty')->section('faculty');
    }
}
