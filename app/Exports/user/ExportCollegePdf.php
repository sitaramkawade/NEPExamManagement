<?php

namespace App\Exports\user;

use App\Models\District;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;



class ExportCollegePdf implements FromCollection
{
    protected $search;
    protected $sortColumn;
    protected $sortColumnBy;
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function __construct($search, $sortColumn, $sortColumnBy)
    {
        $this->search = $search;
        $this->sortColumn = $sortColumn;
        $this->sortColumnBy = $sortColumnBy;
    }

    public function collection()
    {
        return College::
        //  with('Colleges')->search($this->search)
       orderBy($this->sortColumn, $this->sortColumnBy)
        ->select('id', 'college_name','college_email','college_address', 'status')
        ->get();
    }

    public function headings(): array
    {
        return ['ID', 'College Name', 'College Email', 'College Address', 'Status'];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->college_name,
            $row->college_email,
            $row->college_address,
            $row->status,
        ];
    }

    public function view(): View
    {
        return view('pdf.college_pdf', [
            'college' => $this->collection(),
        ])->extends('layouts.app')->section('main');
    }

}
