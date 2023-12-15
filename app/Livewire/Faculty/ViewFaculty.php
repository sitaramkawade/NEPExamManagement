<?php

namespace App\Livewire\Faculty;

use Livewire\Component;

class ViewFaculty extends Component
{
    public function render()
    {
        return view('livewire.faculty.view-faculty')->extends('layouts.faculty')->section('faculty');
    }
}
