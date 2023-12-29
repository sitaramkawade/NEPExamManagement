<?php

namespace App\Livewire\Faculty\FacultyRoleType;

use Livewire\Component;
use App\Models\Roletype;

class EditRoleType extends Component
{
    public $roletype_name;
    public $roletype_id;

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

    public function messages()
    {
        return [
            'roletype_name.string' => 'Please type the roletype name using letters.',
        ];
    }

    public function edit($id)
    {
        $roletype = Roletype::find($id);
        if ($roletype){
            $this->roletype_name= $roletype->roletype_name;
        }else{
            $this->dispatch('alert',type:'error',message:'Role Type Details Not Found');
        }
    }

    public function update($id)
    {
        $validatedData = $this->validate();
        $roletype = Roletype::find($id);

        if ($roletype) {
            $roletype->update($validatedData);
            $this->dispatch('alert',type:'success',message:'Role Type Updated Successfully');

            return redirect()->route('faculty.view-roletype.faculty');
        }else{
            $this->dispatch('alert',type:'error',message:'Error To Update Role Type');
        }
    }

    public function mount($id)
    {
        $this->edit($id);
        $this->roletype_id = $id;
    }

    public function render()
    {
        return view('livewire.faculty.faculty-role-type.edit-role-type')->extends('layouts.faculty')->section('faculty');
    }
}
