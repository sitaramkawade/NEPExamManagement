<?php

namespace App\Livewire\User\SubjectOrder;

use Livewire\Component;

class GenerateSubjectOrder extends Component
{
    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;
    public $department_id;
    public $departments;
    public $faculty_id;
    public $faculties=[];
    public $patternclass_id;
    public $patternclasses;
    public $subject_id;
    public $subjects=[];
    public $examorderpost_id;
    public $examorderposts;
    public $exam_patternclass_id;
    public $exampatternclasses;
    public $description;
    public $mode='add';

    
    public function render()
    {
        $panels=Exampanel::select('id','faculty_id','subject_id','examorderpost_id','description','active_status','deleted_at')
        ->with(['faculty:faculty_name,id','subject:subject_name,id','examorderpost:post_name,id'])
        ->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.subject-order.generate-subject-order')->extends('layouts.user')->section('user');
    }
}
