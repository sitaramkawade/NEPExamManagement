<?php

namespace App\Livewire\User\ExamTimeTable;

use Livewire\Component;

class SubjectExamTimeTable extends Component
{
    public $mode='all';
    public $sortColumn;
    public $sortColumnBy;

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


    public function render()
    {
        return view('livewire.user.exam-time-table.subject-exam-time-table')->extends('layouts.user')->section('user');
    }
}
