<?php

namespace App\Exports;

use App\Models\District;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportDistrict implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
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
        return District::join('states', 'districts.state_id', '=', 'states.id')
        ->with('state')->search($this->search)
        ->orderBy($this->sortColumn, $this->sortColumnBy)
        ->select('districts.id', 'districts.district_code', 'districts.district_name', 'states.state_name')
        ->get();
    }

    public function headings(): array
    {
        return ['ID', 'District Code', 'District Name', 'State Name'];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->district_code,
            $row->district_name,
            $row->state_name,
        ];
    }
}
