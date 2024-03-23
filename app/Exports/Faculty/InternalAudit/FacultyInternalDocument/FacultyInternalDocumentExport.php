<?php

namespace App\Exports\Faculty\InternalAudit\FacultyInternalDocument;

use App\Models\Facultyinternaldocument;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class FacultyInternalDocumentExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    protected $search;

    public function __construct($search)
    {
        $this->search = $search;
    }

    public function collection()
    {
        return Facultyinternaldocument::search($this->search)->get(['id','academicyear_id',
        'faculty_id', 'subject_id', 'internaltooldocument_id', 'document_fileName', 'document_filePath', 'departmenthead_id',
        'verifybyfaculty_id', 'verificationremark', 'freeze_by_faculty', 'freeze_by_hod', 'status',]);
    }

    public function headings(): array
    {
        return ['ID', 'Academic Year', 'Faculty Name', 'Subject Name', 'Internal Tool Document Name', 'File Name',
        'File Path', 'Department Head Name', 'Verify By Faculty Name', 'Verification Remark', 'Freeze By Faculty Name',
        'Freeze By HOD Name', 'Status'];
    }

    public function map($row): array
    {
        return [
            $row->id,
            (isset($row->academicyear->year_name) ?  $row->academicyear->year_name : ''),
            (isset($row->faculty->faculty_name) ?  $row->faculty->faculty_name : ''),
            (isset($row->subject->subject_name) ?  $row->subject->subject_name : ''),
            (isset($row->internaltooldocument->internaltooldocumentmaster->doc_name) ?  $row->internaltooldocument->internaltooldocumentmaster->doc_name : ''),
            $row->document_fileName,
            $row->document_filePath,
            (isset($row->faculty->faculty_name) ?  $row->faculty->faculty_name : ''),
            (isset($row->faculty->faculty_name) ?  $row->faculty->faculty_name : ''),
            $row->freeze_by_faculty == 1 ? 'Yes' : 'No',
            $row->freeze_by_hod == 1 ? 'Yes' : 'No',
            $row->status == 1 ? 'Active' : 'Inactive',
        ];
    }
}
