<?php

namespace App\Livewire\Faculty\FacultyRoleType;

use Livewire\Component;
use App\Models\Roletype;

class SoftDeleteRoleType extends Component
{
    public $roletype_id;

    public function softdelete($id)
    {
        $roletype = Roletype::withTrashed()->find($id);
        if ($roletype) {
            $roletype->delete();
            $this->dispatch('alert',type:'success',message:'Role Type Deleted Successfully');
            } else {
                $this->dispatch('alert',type:'error',message:'Role Type Not Found !');
            }
        return redirect()->route('faculty.view-roletype.faculty');
    }

    public function mount($id)
    {
        $this->softdelete($id);
        $this->roletype_id = $id;
    }

    public function render()
    {
        return view('livewire.faculty.faculty-role-type.soft-delete-role-type')->extends('layouts.faculty')->section('faculty');
    }
}
