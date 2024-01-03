<?php

namespace App\Exports\Faculty;

use App\Models\Subject;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportSubject implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
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
        $subjects = Subject::query()->with(['subjectcategory','subjecttype', 'patternclass','classyear','department','college',])
        ->select('subjects.id', 'subjects.subject_name', 'subjectcategories.subjectcategory' , 'subjecttypes.type_name', 'patternclasses.id' , 'classyears.classyear_name' , 'departments.dept_name' ,'colleges.college_name')
        ->where(function ($query) {
        $query->whereHas('subjectcategory', fn ($q) => $q->search($this->search))
        ->orWhereHas('subjecttype', fn ($q) => $q->search($this->search))
        ->orWhereHas('patternclass', fn ($q) => $q->search($this->search))
        ->orWhereHas('classyear', fn ($q) => $q->search($this->search))
        ->orWhereHas('department', fn ($q) => $q->search($this->search))
        ->orWhereHas('college', fn ($q) => $q->search($this->search));
    })
    ->orderBy($this->sortColumn, $this->sortColumnBy)
    ->get();
    }

    public function headings(): array
    {
        return ['ID', 'Subject Name', 'Subject Category', 'Subject Type', 'Pattern Class','Class Year', 'Department Name', 'College Name'];
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
