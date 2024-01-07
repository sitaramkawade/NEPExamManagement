<?php

namespace App\Exports\user;

use Maatwebsite\Excel\Concerns\FromCollection;

class ExportPattern implements FromCollection
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
        //
    }
}
