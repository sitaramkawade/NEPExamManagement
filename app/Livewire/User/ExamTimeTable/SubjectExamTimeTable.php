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

class SubjectExamTimeTable extends Component
{
    public $mode='all';
    public $perPage=10;
    public $sortColumn="id";
    public $sortColumnBy="ASC";

    #[Locked]
    public $subjects=[];
    public $subjectbucket_id;
    public $subject_id;
    #[Locked]
    public $subject_categories=[];
    public $subjectcategory_id;
    #[Locked]
    public $exampatternclasses=[];
    public $patternclass_ids;

    #[Locked]
    public $timeslots=[];
    public $timeslot_id;
    public $timeslot_ids = []; 

    public $examdates = []; // Array to store exam dates
    public $examdate;

    public function resetinput()
    {
        // $this->subjectbucket_id=null;
        // $this->exam_patternclasses_id=null;
        // $this->timeslot_id=null;
        // $this->examdate=null;
        // $this->is_default=null;
        // $this->timeslot_ids=[];
        // $this->examdates=[];
        
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

        $exam_time_table =[];
        //   dd(($this->examdates));
        foreach ($this->examdates as $subjectbucket_id => $examdate) {
           
            //  dd($subjectbucket_id );
            $exam_time_table[] = [
                'subjectbucket_id' => $subjectbucket_id,
                'exam_patternclasses_id' =>$this->exampatternclasses->first()->id,  
                'examdate' => $examdate,
                'timeslot_id' => $this->timeslot_ids[$subjectbucket_id], 
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            //   dd($subjectbucket_id);
    }
      

        // Insert data into the database
        $exam_time_table_data = ExamTimetable::insert($exam_time_table);
        // dd($exam_time_table_data);
      
       $this->dispatch('alert',type:'success',message:'Exam Time Table Created Successfully !!'  );
       $this->setmode('all');  

    }

    public function edit(ExamTimetable $examtimetable)
    {
       
        // $examtimetables=ExamTimetable::where('exam_patternclasses_id',$exampatternclass->id)->get();
       
       
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
                $patternclass_ids=Subjectbucket::where('subject_id',$this->subject_id)->pluck('patternclass_id');
          //  dd( $patternclass_ids);
                if($patternclass_ids)
                {
                     $this->exampatternclasses = ExamPatternclass::select( 'patternclass_id', 'id')->with(['patternclass.pattern:pattern_name,id','patternclass.courseclass.course:course_name,id','patternclass.courseclass.classyear:classyear_name,id'])->whereIn('patternclass_id', $patternclass_ids)->get();
                    //dd( $this->exampatternclasses);
                }

            }
        }

        $examtimetables=ExamTimetable::select('id','subjectbucket_id')
       ->with(['subjectbucket.subject:subject_name,id'])
       ->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);
    //    dd($examtimetables);

       // $exampatternclasses = Subjectbucket::select('subjectbucket_id','id')->withTrashed();
        //dd( $this->exampatternclasses);
        
        return view('livewire.user.exam-time-table.subject-exam-time-table',compact('examtimetables'))->extends('layouts.user')->section('user');
    }
}
