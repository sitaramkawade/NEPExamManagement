<?php

namespace App\Livewire;

use App\Models\Subject;
use Livewire\Component;

class RND extends Component
{   
    public $subject_id;
    public $subject_id2=[];
    public $subjects=[];

    public function render()
    {   
        $this->subjects = Subject::where('status', 1)->pluck('subject_name', 'id');
        return view('livewire.rnd')->extends('layouts.app')->section('main');
    }
}
