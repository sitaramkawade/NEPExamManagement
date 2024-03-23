<?php

namespace App\Livewire\User\QuestionPaperBank;

use App\Models\Exam;
use App\Models\User;
use App\Models\Faculty;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Paperset;
use App\Models\Examorder;
use App\Models\Exampanel;
use App\Models\Patternclass;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Papersubmission;
use Illuminate\Validation\Rule;
use App\Models\Questionpaperbank;
use Illuminate\Support\Facades\Auth;


class AllQuestionPaperBank extends Component
{

    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'forcedelete'];

    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;


    public $faculty_id;
    public $sets;

    public function sort_column($column)
    {
        if( $this->sortColumn === $column)
        {
            $this->sortColumnBy=($this->sortColumnBy=="ASC")?"DESC":"ASC";
            return;
        }
        $this->sortColumn=$column;
        $this->sortColumnBy=="ASC";
    }


    
    public function confirm_uploaded_paper_sets()
    {   

    }

    public function render()
    {   
        $this->faculty_id=null;
        $this->sets=Paperset::select('set_name','id')->get();   
        $exampanel_ids=Examorder::pluck('exampanel_id');
        $exampanels= Exampanel::whereIn('id',$exampanel_ids);
        $faculty= $exampanels->where('examorderpost_id',1)->where('active_status',1)->first();
        if($faculty){ $this->faculty_id=$faculty->id; }
        $subject_ids = $exampanels->pluck('subject_id');
        $subjects=Subject::whereIn('id', $subject_ids)->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);
        return view('livewire.user.question-paper-bank.all-question-paper-bank',compact('subjects'))->extends('layouts.user')->section('user');
    }
}
