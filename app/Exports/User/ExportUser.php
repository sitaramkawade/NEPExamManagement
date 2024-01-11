<?php

namespace App\Exports\User;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportUser implements FromCollection, WithHeadings, WithMapping
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
        return User::
        search($this->search)->
       orderBy($this->sortColumn, $this->sortColumnBy)
       ->select('id', 'name','email','user_contact_no')
       ->get();
    }

    public function headings(): array
    {
        return ['ID', ' Name',' Email','Contact No'];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->name,
            $row->email,
            $row->user_contact_no,
           
        ];
    }
}