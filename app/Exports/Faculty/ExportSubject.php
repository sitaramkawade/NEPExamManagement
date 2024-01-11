<?php

namespace App\Exports\Faculty;

use App\Models\Subject;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportSubject implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
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
        return Subject::with(['subjectcategories','subjecttypes','patternclass', 'patternclass', 'classyear', 'department', 'college', ])->search($this->search)->orderBy($this->sortColumn, $this->sortColumnBy)
        ->get(['id','subject_name','subject_credit','department_id','patternclass_id','college_id',]);
    }

    public function headings(): array
    {
        return ['ID', 'Subject Name', 'Subject Credit', 'Department', 'Pattern','Course', 'Course Class', 'College Name'];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->subject_name,
            $row->subject_credit,
            $row->department->dept_name,
            $row->patternclass->pattern->pattern_name,
            $row->patternclass->courseclass->course->course_name,
            $row->patternclass->courseclass->classyear->classyear_name,
            $row->college->college_name,
        ];
    }
}
