<?php

namespace App\Livewire\Faculty\FacultyRole;

use Livewire\Component;

class ViewRole extends Component
{
    public function render()
    {
        return view('livewire.faculty.faculty-role.view-role')->extends('layouts.faculty')->section('faculty');
    }
}
