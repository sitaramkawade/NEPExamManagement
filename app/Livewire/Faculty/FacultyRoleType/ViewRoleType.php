<?php

namespace App\Livewire\Faculty\FacultyRoleType;

use Livewire\Component;

class ViewRoleType extends Component
{
    public function render()
    {
        return view('livewire.faculty.faculty-role-type.view-role-type')->extends('layouts.faculty')->section('faculty');
    }
}
