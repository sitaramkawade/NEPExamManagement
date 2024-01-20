<?php

namespace App\Exports\User\AdmissionData;

use App\Models\Admissiondata;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AdmissionDataExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
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
        return Admissiondata::search($this->search)
        ->orderBy($this->sortColumn, $this->sortColumnBy)
        ->get();
    }

    public function headings(): array
    {
        return ['ID', 'Member ID', 'Student','Subject Code','Subject','User','Pattern Class','Academic Year','Department', 'College'];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->memid??'-',
            $row->stud_name??'-',
            $row->subject_code??'-',
            isset($row->subject->subject_name) ? $row->subject->subject_name : '-',
            isset($row->user->name) ? $row->user->name : '-',
            (isset($row->patternclass->courseclass->classyear->classyear_name ) ? $row->patternclass->courseclass->classyear->classyear_name : '-').''.(isset($row->patternclass->courseclass->course->course_name) ? $row->patternclass->courseclass->course->course_name : '-'),
            isset($row->academicyear->year_name) ? $row->academicyear->year_name : '-',
            isset($row->department->dept_name) ? $row->department->dept_name : '-',
            isset($row->college->college_name) ? $row->college->college_name : '-',
        ];
    }
}