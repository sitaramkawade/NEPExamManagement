<?php

namespace App\Livewire\Faculty\FacultyRole;

use App\Models\Role;
use Livewire\Component;

class SoftDeleteRole extends Component
{
    public $role_id;

    public function softdelete($id)
    {
        $role = Role::withTrashed()->find($id);
        if ($role) {
            $role->delete();
            $this->dispatch('alert',type:'success',message:'Role Deleted Successfully');
            } else {
                $this->dispatch('alert',type:'error',message:'Role Not Found !');
            }
        return redirect()->route('faculty.view-role.faculty');
    }

    public function mount($id)
    {
        $this->softdelete($id);
        $this->role_id = $id;
    }

    public function render()
    {
        return view('livewire.faculty.faculty-role.soft-delete-role')->extends('layouts.faculty')->section('faculty');
    }
}
