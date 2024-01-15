<?php

namespace App\Exports\User\Department;

use App\Models\Department;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportDepartment implements FromCollection ,WithHeadings, WithMapping
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
        return Department::
        search($this->search)
      ->orderBy($this->sortColumn, $this->sortColumnBy)
      ->select('id', 'dept_name','short_name','departmenttype','college_id','status')
      ->get();
    }

    public function headings(): array
    {
        return ['ID', 'Department Name','Short Name','Department Type', 'College','Status'];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->dept_name,
            $row->short_name,
            $row->departmenttype,
            isset($row->college->college_name)?$row->college->college_name:'',
            $row->status == 1 ? 'Active' : 'Inactive',
        ];
    }
}
