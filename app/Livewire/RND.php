<?php

namespace App\Livewire;

use App\Models\Subject;
use Livewire\Component;
use App\Models\Patternclass;

class RND extends Component
{   
    public $subject_id;
    public $patternclass_id;
    public $subject_id2=[];
    public $subject_id3=[];
    public $subjects=[];
    public $patternclasses=[];

    public function render()
    {   
        $this->patternclasses=Subject::pluck('subject_name', 'id');
        $this->subjects = Subject::where('status', 1)->where('patternclass_id',$this->patternclass_id)->pluck('subject_name', 'id');
        return view('livewire.rnd')->extends('layouts.user')->section('user');
    }
}
