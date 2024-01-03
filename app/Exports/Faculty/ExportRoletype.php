<?php

namespace App\Exports\Faculty;

use App\Models\Roletype;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportRoletype implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
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
        return Roletype::where(function ($query) {
            $query->where('id', 'like', '%' . $this->search . '%')
                  ->orWhere('roletype_name', 'like', '%' . $this->search . '%');
        })
        ->orderBy($this->sortColumn, $this->sortColumnBy)
        ->select('id', 'roletype_name')
        ->get();
    }

    public function headings(): array
    {
        return ['ID', 'Role Name', 'Role Type'];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->role_name,
            $row->roletype_name,
        ];
    }
}
