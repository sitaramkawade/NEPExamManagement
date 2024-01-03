<?php

namespace App\Livewire\Faculty\FacultyRoleType;

use Livewire\Component;
use App\Models\Roletype;

class RestoreRoleType extends Component
{
    public $delete_id;

    public function restoreRoletype($id)
    {
        $roletype = Roletype::withTrashed()->find($id);

        if ($roletype) {
            $roletype->restore();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Role Type Restored Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Role Type Not Found');
        }
        return redirect()->route('faculty.view-roletype.faculty');
    }

    public function mount($id)
    {
        $this->restoreRoletype($id);
    }

    public function render()
    {
        return view('livewire.faculty.faculty-role-type.restore-role-type')->extends('layouts.faculty')->section('faculty');
    }
}
