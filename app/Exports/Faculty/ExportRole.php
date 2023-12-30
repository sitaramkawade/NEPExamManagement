<?php

namespace App\Exports\Faculty;

use App\Models\Role;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportRole implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
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
        return Role::join('roletypes', 'roles.roletype_id', '=', 'roletypes.id')
        ->join('colleges', 'roles.college_id', '=', 'colleges.id')
        ->with('roletype')->search($this->search)
        ->with('college')->search($this->search)
        ->orderBy($this->sortColumn, $this->sortColumnBy)
        ->select('roles.id', 'roles.role_name', 'roletypes.roletype_name', 'colleges.college_name')
        ->get();
    }

    public function headings(): array
    {
        return ['ID', 'Roletype Name'];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->role_name,
            $row->roletype_name,
            $row->college_name,
        ];
    }
}
