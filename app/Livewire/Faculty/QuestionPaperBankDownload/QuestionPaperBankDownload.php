<?php

namespace App\Livewire\Faculty\QuestionPaperBankDownload;

use Carbon\Carbon;
use App\Models\Exam;
use Livewire\Component;
use App\Models\Paperset;
use Livewire\WithPagination;
use App\Models\Examtimetable;
use App\Models\Subjectbucket;
use App\Models\Timetableslot;
use App\Models\Papersubmission;

class QuestionPaperBankDownload extends Component
{   
    use WithPagination;
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;
    
    public function render()
    {   
        $currentDateTime = Carbon::now();
        $intervalInMinutes =120;
        $startTime = \DateTime::createFromFormat('H:i:s',  $currentDateTime->toTimeString())->format('H:i:s.u');
        $endTime = \DateTime::createFromFormat('H:i:s', $currentDateTime->addMinutes($intervalInMinutes)->toTimeString())->format('H:i:s.u');

        $pappersets = Paperset::get();
        $papersubmissions = collect();

        $exam = Exam::where('status', 1)->first();
        if ($exam) 
        {   
            $timeslot_ids = Timetableslot::whereBetween('start_time', [$startTime, $endTime])->pluck('id');
            $exam_patternclass_ids = $exam->exampatternclasses()->where('launch_status', 1)->pluck('id');
            $bucket_ids = Examtimetable::whereIn('timeslot_id', $timeslot_ids)->whereIn('exam_patternclasses_id', $exam_patternclass_ids)->whereDate('examdate',date('Y-m-d'))->pluck('subjectbucket_id');
            $subject_ids =Subjectbucket::whereIn('id',$bucket_ids)->pluck('subject_id');
            $papersubmissions = Papersubmission::where('is_confirmed', 1)->whereIn('subject_id', $subject_ids)->paginate($this->perPage);
        }

        return view('livewire.faculty.question-paper-bank-download.question-paper-bank-download', compact('papersubmissions', 'exam', 'pappersets'))->extends('layouts.faculty')->section('faculty');
    }
}
