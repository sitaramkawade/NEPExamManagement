<?php

namespace App\Exports\Faculty\InternalAudit\AssignTool;

use App\Models\Facultyinternaldocument;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AssignToolExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
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
        return Facultyinternaldocument::with(['faculty','subject','academicyear',])->search($this->search)->orderBy($this->sortColumn, $this->sortColumnBy)
        ->get(['id','faculty_id', 'internaltooldocument_id', 'subject_id', 'academicyear_id', 'status',]);
    }

    public function headings(): array
    {
        return ['ID', 'Subject Name', 'Pattern Name', 'Class Year', 'Course Name', 'Document Name',  'Academic Year', 'Status' ];
    }

    public function map($row): array
    {
        return [
            $row->id,
            (isset($row->subject->subject_name) ?  $row->subject->subject_name : ''),
            (isset($row->subject->patternclass->pattern->pattern_name) ?  $row->subject->patternclass->pattern->pattern_name : ''),
            (isset($row->subject->patternclass->courseclass->classyear->classyear_name) ?  $row->subject->patternclass->courseclass->classyear->classyear_name : ''),
            (isset($row->subject->patternclass->courseclass->course->course_name) ?  $row->subject->patternclass->courseclass->course->course_name : ''),
            (isset($row->internaltooldocumentmaster->doc_name) ?  $row->internaltooldocumentmaster->doc_name : ''),
            (isset($row->academicyear->year_name) ?  $row->academicyear->year_name : ''),
            $row->status == 1 ? 'Active' : 'Inactive',
        ];
    }
}
