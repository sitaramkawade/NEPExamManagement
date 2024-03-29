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
            isset($row->subject->subject_name)?$row->subject->subject_name:'',
            (isset($row->exampatternclass->exam->exam_name) ? $row->exampatternclass->exam->exam_name : '-').' '. (isset($row->exampatternclass->patternclass->pattern->pattern_name) ? $row->exampatternclass->patternclass->pattern->pattern_name : '-').' '.(isset($row->exampatternclass->patternclass->courseclass->classyear->classyear_name) ? $row->exampatternclass->patternclass->courseclass->classyear->classyear_name : '-').''.(isset($row->exampatternclass->patternclass->courseclass->course->course_name) ? $row->exampatternclass->patternclass->courseclass->course->course_name : '-'),
            isset($row->examdate)?date('Y-m-d', strtotime($row->examdate)):'',
            isset($row->timetableslot->timeslot)?$row->timetableslot->timeslot:'',
            $row->status == 1 ? 'Active' : 'Inactive',
        ];
    }
}
