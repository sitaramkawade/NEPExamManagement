<?php

namespace App\Exports\user;

use App\Models\University;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportUniversity implements FromCollection
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
        return University::
        //  with('Colleges')->search($this->search)
       orderBy($this->sortColumn, $this->sortColumnBy)
        ->select('id', 'university_name','university_email','university_address','university_website_url', 'status')
        ->get();
    }

    public function headings(): array
    {
        return ['ID', 'University Name','University Email','University Address','University website url','status'];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->university_name,
            $row->university_email,
            $row->university_address,
            $row->university_address,
            $row->status,
        ];
    }

}
