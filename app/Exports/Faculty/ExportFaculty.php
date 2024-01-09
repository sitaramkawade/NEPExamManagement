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

    public function collection()
    {
        // return Faculty::join('roles', 'faculties.role_id', '=', 'roles.id')
        // ->with('role')->search($this->search)
        // ->orderBy($this->sortColumn, $this->sortColumnBy)
        // ->select('faculties.id', 'faculties.faculty_name','faculties.email', 'faculties.mobile_no', 'roles.role_name')
        // ->get();

       return  Faculty::with('role')->get();
    }

    public function headings(): array
    {
        return ['ID', 'Faculty Name', 'Faculty Email', 'Faculty Mobile Number', 'Role Name'];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->faculty_name,
            $row->email,
            $row->mobile_no,
            $row->role_name,
        ];
    }
}
