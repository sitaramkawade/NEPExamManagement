<?php

namespace App\Livewire\User\ExamTimeTable;

use Excel;
use App\Models\Subject;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ExamTimetable;
use App\Models\Timetableslot;
use Illuminate\Validation\Rule;
use App\Models\ExamPatternclass;
use App\Exports\User\ExamTimeTable\ExportExamTimeTable;

class AllExamTimeTable extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;
    public $mode='all';
    public $subject_id;
    public $exam_patternclasses_id;
    public $exam_pattern_classes;
    public $exampatternclasses;
    public $examdate;
    public $timeslot_id;
    public $status;
    public $time_id;
    public $subjects;
    public $timeslots;
    public $pattern_classes;
    public $current_step=1;
    public $steps=1;
    #[Locked] 
    public $delete_id;

    
    public function rules()
    {
        return [
        'subject_id' => ['required',Rule::exists('subjects', 'id')],
        'exam_patternclasses_id' => ['required',Rule::exists('exam_patternclasses', 'id')],
        'timeslot_id' => ['required',Rule::exists('timetableslots', 'id')],
        'examdate' => ['nullable', 'date'],
       
         ];
    }

    public function messages()
    {   
        $messages = [
            'subject_id.required' => 'The Subject field is required.',
            'subject_id.exists' => 'The selected Subject  is invalid.',
            'exam_patternclasses_id.required' => 'The Exam Patter Class field is required.',
            'exam_patternclasses_id.exists' => 'The selected Exam Patter Class  is invalid.',
            'timeslot_id.required' => 'The Time Slot field is required.',
            'timeslot_id.exists' => 'The selected Time Slot  is invalid.',
            'examdate.required' => 'The Exam Date field is required.',
            'examdate.date' => 'The Exam Date must be a valid Date.',
        ];
        return $messages;
    }

    
    public function resetinput()
    {
        $this->subject_id=null;
        $this->exam_patternclasses_id=null;
        $this->timeslot_id=null;
        $this->examdate=null;
        $this->is_default=null;
    }


    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function setmode($mode)
    {
        if($mode=='add')
        {
            $this->resetinput();
        }
        $this->mode=$mode;
    }

    public function add(ExamTimetable  $examTimeTable ){
        
        $validatedData= $this->validate();
       
        if ($validatedData) {

        $examTimeTable->subject_id= $this->subject_id;
        $examTimeTable->exam_patternclasses_id=  $this->exam_patternclasses_id;
        $examTimeTable->timeslot_id=  $this->timeslot_id;
        $examTimeTable->examdate= $this->examdate;
        $examTimeTable->status= $this->status;
        }
        $examTimeTable->save();

        $this->dispatch('alert',type:'success',message:'Added Successfully !!'  );
        $this->setmode('all');
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

   
    public function delete(ExamTimetable  $examTimeTable)
    {   
        $examTimeTable->delete();
        $this->dispatch('alert',type:'success',message:'Exam Time Table Soft Deleted Successfully !!');
    }

    public function restore($id)
    {   
        $examTimeTable = ExamTimetable::withTrashed()->find($id);
        $examTimeTable->restore();
        $this->dispatch('alert',type:'success',message:'Exam Time Table Restored Successfully !!');
    }

    public function forcedelete()
    {  
        $examTimeTable = ExamTimetable::withTrashed()->find($this->delete_id);
        $examTimeTable->forceDelete();
        $this->dispatch('alert',type:'success',message:'Exam Time Table Deleted Successfully !!');
    }

    public function Status(ExamTimetable $examTimeTable)
    {
        if($examTimeTable->status)
        {
            $examTimeTable->status=0;
        }
        else
        {
            $examTimeTable->status=1;
        }
        $examTimeTable->update();
    }

    public function edit(ExamTimetable $examTimeTable){

        if ($examTimeTable) {
            $this->time_id=$examTimeTable->id;
            $this->subject_id = $examTimeTable->subject_id;     
            $this->exam_patternclasses_id = $examTimeTable->exam_patternclasses_id;     
            $this->timeslot_id = $examTimeTable->timeslot_id;
            $this->examdate = $examTimeTable->examdate ;
            $this->status = $examTimeTable->status ;
            $this->setmode('edit');
        }
    }

    public function update(ExamTimetable  $examTimeTable){

        $validatedData= $this->validate();
       
        if ($validatedData) {        
            $examTimeTable->subject_id= $this->subject_id;
            $examTimeTable->exam_patternclasses_id= $this->exam_patternclasses_id;
            $examTimeTable->timeslot_id= $this->timeslot_id;
            $examTimeTable->examdate= $this->examdate;
            $examTimeTable->status= $this->status;
        }

        $examTimeTable->update();
        $this->dispatch('alert',type:'success',message:'Updated Successfully !!'  );
        $this->setmode('all');
    }

    public function export()
    {   
        $filename="Exam-Time-Table-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportExamTimeTable($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportExamTimeTable($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportExamTimeTable($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
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
        if($this->mode!=='all')
        {
            $this->subjects = Subject::select('id','subject_name')->where('status',1)->get();
            $this->exampatternclasses = ExamPatternclass::select('id','exam_id','patternclass_id')->get();             
            $this->timeslots = Timetableslot::select('id','timeslot')->where('isactive',1)->get();         
        }
        
        $ExamTimeTables=ExamTimetable::select('id','subject_id','timeslot_id','examdate','exam_patternclasses_id','status','deleted_at')
        ->with(['exampatternclass.patternclass.pattern','exampatternclass.patternclass.courseclass.classyear','exampatternclass.patternclass.courseclass.course'])
        -> when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.exam-time-table.all-exam-time-table',compact('ExamTimeTables'))->extends('layouts.user')->section('user');
    }
}
