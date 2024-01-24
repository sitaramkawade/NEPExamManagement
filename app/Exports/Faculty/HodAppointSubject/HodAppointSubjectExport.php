<?php

namespace App\Exports\Faculty\HodAppointSubject;

use App\Models\Hodappointsubject;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class HodAppointSubjectExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
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
        return Hodappointsubject::with(['faculty','subject',])->search($this->search)->orderBy($this->sortColumn, $this->sortColumnBy)
         ->get(['id','faculty_id','subject_id','status',]);
    }

    public function headings(): array
    {
        return ['ID', 'Faculty Name', 'Subject Name', 'Status',];
    }

    public function map($row): array
    {
        return [
            $row->id,
            (isset($row->faculty->faculty_name) ? $row->faculty->faculty_name : ''),
            (isset($row->subject->subject_name) ? $row->subject->subject_name : ''),
            $row->status == 1 ? 'Active' : 'Inactive',
        ];
    }
}
