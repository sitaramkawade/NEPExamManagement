<?php

namespace App\Livewire\User\ExamPatternClass;

use Excel;
use App\Models\Exam;
use Livewire\Component;
use App\Models\Capmaster;
use App\Models\Patternclass;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Models\ExamPatternclass;
use App\Models\ExamExamPatternclass;
use App\Exports\User\ExamPatternClass\ExamPatternClassExport;

class AllExamPatternClass extends Component
{   
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    #[Locked] 
    public $delete_id;

    public $mode='all';
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;

    public $exam_id;
    public $patternclass_id;
    public $capmaster_id;
    public $result_date;
    public $start_date;
    public $end_date;
    public $latefee_date;
    public $intmarksstart_date;
    public $intmarksend_date;
    public $finefee_date;
    public $capscheduled_date;
    public $papersettingstart_date;
    public $papersubmission_date;
    public $placeofmeeting;
    public $description;
    public $launch_status;

    public  $exams;
    public  $pattern_classes;
    public  $capmasters;
    #[Locked] 
    public $edit_id;


    public function rules()
    {
        return [
            'launch_status' => ['required'],
            'result_date' => ['nullable', 'date'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
            'latefee_date' => ['nullable', 'date'],
            'intmarksstart_date' => ['nullable', 'date'],
            'intmarksend_date' => ['nullable', 'date'],
            'finefee_date' => ['nullable', 'date'],
            'capscheduled_date' => ['nullable', 'date'],
            'papersettingstart_date' => ['nullable', 'date'],
            'papersubmission_date' => ['nullable', 'date'],
            'placeofmeeting' => ['nullable', 'string','max:100'],
            'description' => ['nullable', 'string','max:50'],
            'patternclass_id' => ['required', 'integer', Rule::exists('pattern_classes', 'id'), Rule::unique('exam_patternclasses')->where(function ($query) {
                return $query->where('exam_id', $this->exam_id);
            })],
            'exam_id' => ['required', 'integer', Rule::exists('exams', 'id')],
            'capmaster_id' => ['nullable', 'integer', Rule::exists('capmasters', 'id')],
        ];
    }

    public function messages()
    {   
        $messages = [
            'result_date.required' => 'The Result Date field is required.',
            'result_date.date' => 'The Result Date must be a valid Date.',
            'start_date.required' => 'The Start Date field is required.',
            'start_date.date' => 'The Start Date must be a valid Date.',
            'end_date.required' => 'The End Date field is required.',
            'end_date.date' => 'The End Date must be a valid Date.',
            'latefee_date.required' => 'The Late Fee Date field is required.',
            'latefee_date.date' => 'The Late Fee Date must be a valid Date.',
            'intmarksstart_date.required' => 'The Internal Marks Start Date field is required.',
            'intmarksstart_date.date' => 'The Internal Marks Start Date must be a valid Date.',
            'intmarksend_date.required' => 'The Internal Marks End Date field is required.',
            'intmarksend_date.date' => 'The Internal Marks End Date must be a valid Date.',
            'finefee_date.required' => 'The Fine Fee Date field is required.',
            'finefee_date.date' => 'The Fine Fee Date must be a valid Date.',
            'capscheduled_date.required' => 'The CAP Scheduled Date field is required.',
            'capscheduled_date.date' => 'The CAP Scheduled Date must be a valid Date.',
            'papersettingstart_date.required' => 'The Paper Setting Start Date field is required.',
            'papersettingstart_date.date' => 'The Paper Setting Start Date must be a valid Date.',
            'papersubmission_date.required' => 'The Paper Submission Date field is required.',
            'papersubmission_date.date' => 'The Paper Submission Date must be a valid Date.',
            'placeofmeeting.required' => 'The Place Of Meeting field is required.',
            'placeofmeeting.string' => 'The Place Of Meeting must be a string.',
            'placeofmeeting.max' => 'The Place Of Meeting must not exceed :max characters.',
            'description.required' => 'The Description Field is required.',
            'description.string' => 'The Description must be a string.',
            'description.max' => 'The Description must not exceed :max characters.',
            'patternclass_id.required' => 'The Pattern Class field is required.',
            'patternclass_id.integer' => 'The Pattern Class must be a number.',
            'patternclass_id.exists' => 'The selected Pattern Class is invalid.',
            'capmaster_id.required' => 'The CAP field is required.',
            'capmaster_id.integer' => 'The CAP must be a number.',
            'capmaster_id.exists' => 'The selected CAP is invalid.',
            'exam_id.required' => 'The Exam field is required.',
            'exam_id.integer' => 'The Exam must be a number.',
            'exam_id.exists' => 'The selected Exam is invalid.',
            'patternclass_id.unique' => 'The Pattern Class Has already Been Taken For This Exam.',
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
        $this->exam_id=null;
        $this->patternclass_id=null;
        $this->result_date=null;
        $this->launch_status=null;
        $this->start_date=null;
        $this->end_date=null;
        $this->latefee_date=null;
        $this->intmarksstart_date=null;
        $this->intmarksend_date=null;
        $this->finefee_date=null;
        $this->capmaster_id=null;
        $this->capscheduled_date=null;
        $this->papersettingstart_date=null;
        $this->papersubmission_date=null;
        $this->placeofmeeting=null;
        $this->description=null;
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
        $filename="Exam-Pattern-Class-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExamPatternClassExport ($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExamPatternClassExport ($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExamPatternClassExport ($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function add()
    {
        $this->validate();

       $exam_pattern_class =  new ExamPatternclass;
       $exam_pattern_class->create([
            'exam_id'=>$this->exam_id,
            'patternclass_id'=>$this->patternclass_id,
            'result_date'=>$this->result_date,
            'launch_status'=>$this->launch_status,
            'start_date'=>$this->start_date,
            'end_date'=>$this->end_date,
            'latefee_date'=>$this->latefee_date,
            'intmarksstart_date'=>$this->intmarksstart_date,
            'intmarksend_date'=>$this->intmarksend_date,
            'finefee_date'=>$this->finefee_date,
            'capmaster_id'=>$this->capmaster_id,
            'capscheduled_date'=>$this->capscheduled_date,
            'papersettingstart_date'=>$this->papersettingstart_date,
            'papersubmission_date'=>$this->papersubmission_date,
            'placeofmeeting'=>$this->placeofmeeting,
            'description'=>$this->description,
        ]);
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Exam Pattern Class Created Successfully !!');
    }


    public function edit(Exampatternclass $exam_pattern_class)
    {   
        $this->resetinput();
        $this->edit_id=$exam_pattern_class->id;
        $this->exam_id=$exam_pattern_class->exam_id;
        $this->patternclass_id=$exam_pattern_class->patternclass_id;
        $this->result_date=$exam_pattern_class->result_date;
        $this->launch_status=$exam_pattern_class->launch_status;
        $this->start_date = date('Y-m-d', strtotime($exam_pattern_class->start_date));
        $this->end_date=date('Y-m-d', strtotime($exam_pattern_class->end_date));
        $this->latefee_date=date('Y-m-d', strtotime($exam_pattern_class->latefee_date));
        $this->intmarksstart_date=date('Y-m-d', strtotime($exam_pattern_class->intmarksstart_date));
        $this->intmarksend_date=date('Y-m-d', strtotime($exam_pattern_class->intmarksend_date));
        $this->finefee_date=date('Y-m-d', strtotime($exam_pattern_class->finefee_date));
        $this->capmaster_id=$exam_pattern_class->capmaster_id;
        $this->capscheduled_date=$exam_pattern_class->capscheduled_date;
        $this->papersettingstart_date=$exam_pattern_class->papersettingstart_date;
        $this->papersubmission_date=$exam_pattern_class->papersubmission_date;
        $this->placeofmeeting=$exam_pattern_class->placeofmeeting;
        $this->description=$exam_pattern_class->description;
        $this->setmode('edit');
    }

    public function update(ExamPatternclass $exam_pattern_class)
    {
        $this->validate();

       $exam_pattern_class->update([
            'exam_id'=>$this->exam_id,
            'patternclass_id'=>$this->patternclass_id,
            'result_date'=>$this->result_date,
            'launch_status'=>$this->launch_status,
            'start_date'=>$this->start_date,
            'end_date'=>$this->end_date,
            'latefee_date'=>$this->latefee_date,
            'intmarksstart_date'=>$this->intmarksstart_date,
            'intmarksend_date'=>$this->intmarksend_date,
            'finefee_date'=>$this->finefee_date,
            'capmaster_id'=>$this->capmaster_id,
            'capscheduled_date'=>$this->capscheduled_date,
            'papersettingstart_date'=>$this->papersettingstart_date,
            'papersubmission_date'=>$this->papersubmission_date,
            'placeofmeeting'=>$this->placeofmeeting,
            'description'=>$this->description,
        ]);
       
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Exam Pattern Class Updated Successfully !!');

    }


    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }


    public function delete(ExamPatternclass $exam_pattern_class)
    {   
       $exam_pattern_class->delete();
        $this->dispatch('alert',type:'success',message:'Exam Pattern Class Soft Deleted Successfully !!');
    }
    
    public function restore($id)
    {   
       $exam_pattern_class = ExamPatternclass::withTrashed()->find($id);
       $exam_pattern_class->restore();
        $this->dispatch('alert',type:'success',message:'Exam Pattern Class Restored Successfully !!');
    }

    public function forcedelete()
    {   
       $exam_pattern_class = ExamPatternclass::withTrashed()->find($this->delete_id);
       $exam_pattern_class->forceDelete();
        $this->dispatch('alert',type:'success',message:'Exam Pattern Class Deleted Successfully !!');
    }

    public function changestatus(ExamPatternclass $exam_pattern_class)
    {   
        if( $exam_pattern_class->launch_status)
        {
            $exam_pattern_class->launch_status=0;
        }
        else 
        {
            $exam_pattern_class->launch_status=1;
        }
        $exam_pattern_class->update();

        $this->dispatch('alert',type:'success',message:'Exam Pattern Class Status Updated Successfully !!');
    }


    public function render()
    {   
        if($this->mode!=='all')
        {
            $this->exams=Exam::select('id','exam_name')->where('status',1)->get();
            $this->pattern_classes=Patternclass::select('id','class_id','pattern_id')->with(['pattern:pattern_name,id','courseclass.course:course_name,id','courseclass.classyear:classyear_name,id'])->where('status',1)->get();
            $this->capmasters=Capmaster::select('id','cap_name')->get();
        }

       $pattern_exam_classes=ExamPatternclass::select('exam_id','patternclass_id','result_date','launch_status','start_date','end_date','latefee_date','intmarksstart_date','intmarksend_date','finefee_date','capmaster_id','capscheduled_date','papersettingstart_date','papersubmission_date','placeofmeeting','description',)
       ->with(['exam:exam_name,id','patternclass.courseclass.course:course_name,id','capmaster:cap_name,id'])->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.exam-pattern-class.all-exam-pattern-class',compact('pattern_exam_classes'))->extends('layouts.user')->section('user');
    }

}
