<?php

namespace App\Exports\Faculty;

use App\Models\Faculty;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportFaculty implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
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

    // public function collection()
    // {
    //     return Faculty::join('roles', 'faculties.role_id', '=', 'roles.id')
    //     ->with('role')->search($this->search)
    //     ->orderBy($this->sortColumn, $this->sortColumnBy)
    //     ->select('faculties.id', 'faculties.faculty_name','faculties.email', 'faculties.mobile_no', 'roles.role_name')
    //     ->get();
    // }

    public function collection()
    {
        return Faculty::with(['role','department','college','facultybankaccount'])->search($this->search)->orderBy($this->sortColumn, $this->sortColumnBy)
        ->get(['id', 'prefix', 'faculty_name', 'email', 'mobile_no', 'college_id', 'department_id', 'role_id', 'date_of_birth', 'gender', 'category', 'pan', 'current_address', 'permanant_address', 'unipune_id', 'qualification']);
    }

    public function headings(): array
    {
        return ['ID', 'Prefix', 'Faculty Name', 'Faculty Email', 'Faculty Mobile Number',
        'College Name', 'Department Name', 'Role Name', 'Date of birth', 'Gender',
        'Category', 'Pan', 'Current Address', 'Permanant Address','Unipune ID', 'Qualification',];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->Prefix,
            $row->faculty_name,
            $row->email,
            $row->mobile_no,
            $row->college->college_name,
            $row->department->dept_name,
            $row->role->role_name,
            $row->date_of_birth,
            $row->gender,
            $row->category,
            $row->pan,
            $row->current_address,
            $row->permanant_address,
            $row->unipune_id,
            $row->qualification,
        ];
    }
}
