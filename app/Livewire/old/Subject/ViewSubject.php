<?php

namespace App\Livewire\Faculty\Subject;

use Livewire\Component;

class ViewSubject extends Component
{
    public function render()
    {
        return view('livewire.faculty.subject.view-subject')->extends('layouts.faculty')->section('faculty');
    }
}
