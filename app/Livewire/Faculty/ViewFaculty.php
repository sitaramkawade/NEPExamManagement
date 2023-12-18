<?php

namespace App\Livewire\Faculty;

use App\Models\Faculty;
use Livewire\Component;

class ViewFaculty extends Component
{
    public $faculties = null;

    public function mount()
    {
        $this->faculties = Faculty::where('active',1)->get();
    }

    public function render()
    {
        return view('livewire.faculty.view-faculty')->extends('layouts.faculty')->section('faculty');
    }
}
