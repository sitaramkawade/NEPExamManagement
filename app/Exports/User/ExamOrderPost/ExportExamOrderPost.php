<?php

namespace App\Exports\User\ExamOrderPost;

use App\Models\ExamOrderPost;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportExamOrderPost implements FromCollection,WithHeadings, WithMapping
{ protected $search;
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
        return ExamOrderPost::
        search($this->search)->
       orderBy($this->sortColumn, $this->sortColumnBy)
       ->select('id', 'post_name','start_date','end_date','status')
       ->get();
    }

    public function headings(): array
    {
        return ['ID', ' Post Name','Start Date' , 'End Date' ,'Status'];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->post_name,
            isset($row->start_date)?date('Y-m-d', strtotime($row->start_date)):'',
            isset($row->end_date)?date('Y-m-d', strtotime($row->end_date)):'',
            $row->status == 1 ? 'Active' : 'Inactive',
        ];
    }
}
