<?php

namespace App\Exports\Faculty\FacultyRoleType;

use App\Models\Roletype;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class FacultyRoleTypeExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
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
        return Roletype::search($this->search)->orderBy($this->sortColumn, $this->sortColumnBy)->get(['id','roletype_name',]);
    }

    public function headings(): array
    {
        return ['ID', 'Roletype Name'];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->roletype_name,
        ];
    }
}
