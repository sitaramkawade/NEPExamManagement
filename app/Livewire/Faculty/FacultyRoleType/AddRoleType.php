<?php

namespace App\Livewire\Faculty\FacultyRoleType;

use Livewire\Component;
use App\Models\Roletype;

class AddRoleType extends Component
{
    public $roletype_name;

    protected function rules()
    {
        return [
            'roletype_name' => ['required', 'string', 'max:255',],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->roletype_name=null;
    }

    public function messages()
    {
        return [
            'roletype_name.string' => 'Please type the role type name using letters.',
        ];
    }

    public function add()
    {
        $validatedData = $this->validate();
        $roletype = Roletype::create($validatedData);
        if ($roletype) {
            $this->dispatch('alert',type:'success',message:'Role Type Added Successfully');
            $this->resetinput();
        } else {
            $this->dispatch('alert',type:'error',message:'Failed to Add Role Type. Please try again.');
        }
    }


    public function render()
    {
        return view('livewire.faculty.faculty-role-type.add-role-type')->extends('layouts.faculty')->section('faculty');
    }
}
