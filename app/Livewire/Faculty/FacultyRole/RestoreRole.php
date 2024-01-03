<?php

namespace App\Livewire\Faculty\FacultyRole;

use App\Models\Role;
use Livewire\Component;

class RestoreRole extends Component
{
    public $delete_id;

    public function restoreRole($id)
    {
        $role = Role::withTrashed()->find($id);

        if ($role) {
            $role->restore();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Role Restored Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Role Not Found');
        }
        return redirect()->route('faculty.view-role.faculty');
    }

    public function mount($id)
    {
        $this->restoreRole($id);
    }

    public function render()
    {
        return view('livewire.faculty.faculty-role.restore-role')->extends('layouts.faculty')->section('faculty');
    }
}
