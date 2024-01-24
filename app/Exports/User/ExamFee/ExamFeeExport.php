<?php

namespace App\Exports\User\ExamFee;

use App\Models\Examfeemaster;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExamFeeExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
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
        return Examfeemaster::search($this->search)
        ->orderBy($this->sortColumn, $this->sortColumnBy)
        ->select('id', 'fee_type','remark','approve_status','active_status')
        ->get();
    }

    public function headings(): array
    {
        return ['ID', 'Fee Type', 'Remark','Approved','Status'];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->fee_type,
            $row->remark,
            $row->approve_status == 1 ? 'Yes' : 'No',
            $row->active_status == 1 ? 'Active' : 'Inactive',
        ];
    }
}