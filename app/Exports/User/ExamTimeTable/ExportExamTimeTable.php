<?php

namespace App\Exports\User\ExamTimeTable;

use App\Models\ExamTimetable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportExamTimeTable implements FromCollection, WithHeadings, WithMapping
{
    protected $search;
    protected $sortColumn;
    protected $sortColumnBy;

    public function __construct($search, $sortColumn, $sortColumnBy)
    {
        $this->search = $search;
        $this->sortColumn = $sortColumn;
        $this->sortColumnBy = $sortColumnBy;
    }

    public function collection()
    {
        return ExamTimetable::
        search($this->search)
      ->orderBy($this->sortColumn, $this->sortColumnBy)
      ->select('id', 'subject_id','exam_patternclasses_id','examdate','timeslot_id','status')
      ->get();
    }

    public function headings(): array
    {
        return ['ID', 'Subject','Exam Pattern Class','Exam Date','Time Slot','Status'];
    }

    public function map($row): array
    {
        return [
            $row->id,
            isset($row->subject->subject_id)?$row->subject->subject_id:'',
            isset($row->timetableslot->timeslot_id)?$row->timetableslot->timeslot_id:'',
            (isset($row->patternclass->pattern->pattern_name) ? $row->patternclass->pattern->pattern_name : '-').' '.(isset($row->patternclass->courseclass->classyear->classyear_name) ? $row->patternclass->courseclass->classyear->classyear_name : '-').''.(isset($row->patternclass->courseclass->course->course_name) ? $row->patternclass->courseclass->course->course_name : '-'),
            isset($row->examdate)?date('Y-m-d', strtotime($row->examdate)):'',
            $row->status == 1 ? 'Active' : 'Inactive',
        ];
    }
}
