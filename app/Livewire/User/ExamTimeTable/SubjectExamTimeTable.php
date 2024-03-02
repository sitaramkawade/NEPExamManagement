<?php

namespace App\Livewire\User\ExamTimeTable;

use Carbon\Carbon;
use App\Models\Exam;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Patternclass;
use App\Models\ExamTimetable;
use App\Models\Subjectbucket;
use App\Models\Timetableslot;
use App\Models\Subjectcategory;
use App\Models\ExamPatternclass;
use Illuminate\Support\Facades\DB;

class SubjectExamTimeTable extends Component
{
    public $mode='all';
    public $perPage=10;
    public $sortColumn="id";
    public $sortColumnBy="ASC";

    #[Locked]
    public $subjects=[];
    public $subjectbucket_id;
    public $subject_bucket_ids = [];
    public $subject_id;
    #[Locked]
    public $subject_categories=[];
    public $subjectcategory_id;
    #[Locked]
    public $exampatternclasses=[];
    public $patternclass_ids;
    public $exam_patternclasses_id;

    #[Locked]
    public $timeslots=[];
    public $timeslot_id;
    public $timeslot_ids = []; 
    public $time_id;

    public $examdates = []; // Array to store exam dates
    public $examdate;

    public function resetinput()
    {
        $this->subject_id=null;
        $this->subjectcategory_id=null;
        $this->exam_patternclasses_id=null;
        $this->timeslot_id=null;
        $this->examdate=null;
        $this->timeslot_ids=[];
        $this->examdates=[];
        
    }

    public function setmode($mode)
    {
        if($mode=='add')
        {
            $this->resetinput();
        }
        $this->mode=$mode;
    }
 
    public function add(ExamTimetable $examtimetable)
    {
        DB::beginTransaction();

        try {
            $exam_time_tables = [];
        
            foreach ($this->examdates as $exam_pattern_class_id => $examdate) {
                $exam_time_tables[] = [
                    'exam_patternclasses_id' =>$exam_pattern_class_id,  
                    'subjectbucket_id' => $this->subject_bucket_ids[$exam_pattern_class_id],
                    'examdate' => $examdate,
                    'timeslot_id' => $this->timeslot_ids[$exam_pattern_class_id],
                    'status' => 1,
                    'created_at' => now(), 
                    'updated_at' => now(),
                ];
            }
        
            $exam_time_table_data = ExamTimetable::insert($exam_time_tables);
            DB::commit();
            $this->dispatch('alert',type:'success',message:'Exam Time Table Created Successfully !!'  );
            $this->resetinput();
            $this->setmode('all');     
        
            $this->dispatch('success', 'Exam Time Table Created Successfully !!');
         } catch (\Exception $e) 
            {
                DB::rollback();
        
                $this->dispatch('alert',type:'error',message:'Exam Time Table Creating Error !!'  );
            }
    }

    public function edit(ExamTimetable $examtimetable)
    {
        // dd($examtimetable);
      
        $this->resetinput();

        $this->time_id=$examtimetable->id;
        $this->subject_id=$examtimetable->subjectbucket->subject->subject_name;
        $this->exam_patternclasses_id=$examtimetable->exampatternclass->patternclass->courseclass->course->course_name;
        $this->examdate=$examtimetable->examdate;
        $this->timeslot_id=$examtimetable->timeslot_id;
        // dd( $this->timeslot_id);
        $this->setmode('edit');
      
    }

    public function update(ExamTimetable $examtimetable)
    {
        $examtimetable->examdate= $this->examdate;
        $examtimetable->timeslot_id= $this->timeslot_id;
        $examtimetable->update();
        $this->dispatch('alert',type:'success',message:'Updated Successfully !!'  );
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

 

    public function render()
    {
        
        if($this->mode=='add')
        {
            $this->subject_categories = Subjectcategory::whereIn('active', [1, 2])->pluck('subjectcategory', 'id');
            $this->timeslots=TimeTableslot::where('isactive',1)->pluck('timeslot','id');

            if($this->timeslot_id)
            {
                foreach ($this->exampatternclasses as $value) {
                    $this->timeslot_ids[$value->id]=$this->timeslot_id;
                }
            }
            if($this->examdate)
            {
                foreach ($this->exampatternclasses as $value) {
                    $this->examdates[$value->id]=$this->examdate;
                }
            }

           
            if($this->subjectcategory_id)
            {
                $this->subjects = Subject::where('status', 1)->where('subjectcategory_id', $this->subjectcategory_id)->pluck('subject_name', 'id');
            }

            if($this->subject_id)
            {  
                $patternclass_ids = Subjectbucket::where('subject_id', $this->subject_id)->pluck('patternclass_id');
                if ($patternclass_ids->isNotEmpty()) {
                    $this->exampatternclasses = ExamPatternclass::with([
                        'patternclass.pattern:id,pattern_name',
                        'patternclass.courseclass.course:id,course_name',
                        'patternclass.courseclass.classyear:id,classyear_name',
                    ])->whereIn('patternclass_id', $patternclass_ids)->get();

                    foreach ($this->exampatternclasses as $exampatternclass) {
                        $subject_bucket_id = Subjectbucket::where('patternclass_id', $exampatternclass->patternclass_id)->pluck('id')->first();
                        if ($subject_bucket_id !== null) {
                            $this->subject_bucket_ids[$exampatternclass->id] = $subject_bucket_id;
                        }
                    }
                }

            }
        }

        $this->timeslots=TimeTableslot::where('isactive',1)->pluck('timeslot','id');

        $examtimetables=ExamTimetable::select('id','subjectbucket_id','exam_patternclasses_id','examdate','timeslot_id')->with(['subjectbucket.subject:subject_name,id','exampatternclass.patternclass.pattern:pattern_name,id','exampatternclass.patternclass.courseclass.classyear:classyear_name,id','exampatternclass.patternclass.courseclass.course:course_name,id','timetableslot:timeslot,id'])->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

       // $exampatternclasses = Subjectbucket::select('subjectbucket_id','id')->withTrashed();
        //dd( $this->exampatternclasses);
        
        return view('livewire.user.exam-time-table.subject-exam-time-table',compact('examtimetables'))->extends('layouts.user')->section('user');
    }
}
