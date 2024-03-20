<?php

namespace App\Exports\Faculty\InternalAudit\HodAssignTool;

use App\Models\Facultyinternaldocument;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class HodAssignToolExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
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
        return Facultyinternaldocument::with(['faculty','subject','academicyear','internaltooldocumentmaster','internaltooldocument','departmenthead'])->search($this->search)->orderBy($this->sortColumn, $this->sortColumnBy)
        ->get(['id','academicyear_id','faculty_id','subject_id','internaltooldocument_id','status']);
    }

    public function headings(): array
    {
        return ['ID', 'Academic Year', 'Faculty Name', 'Subject Name', 'Document Name', 'Status'];
    }

    public function map($row): array
    {
        return [
            $row->id,
            (isset($row->academicyear->year_name) ? $row->academicyear->year_name : ''),
            (isset($row->faculty->faculty_name) ?  $row->faculty->faculty_name : ''),
            (isset($row->subject->subject_name) ?  $row->subject->subject_name : ''),
            (isset($row->internaltooldocumentmaster->doc_name) ?  $row->internaltooldocumentmaster->doc_name : ''),
            $row->status == 1 ? 'Uploaded' : 'Not Uploaded',
        ];
    }
}
