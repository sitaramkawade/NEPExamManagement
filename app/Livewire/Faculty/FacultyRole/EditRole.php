<?php

namespace App\Livewire\Faculty\FacultyRole;

use App\Models\Role;
use App\Models\College;
use Livewire\Component;
use App\Models\Roletype;
use Illuminate\Validation\Rule;

class EditRole extends Component
{
    public $role_name;
    public $roletype_id;
    public $college_id;

    public $roletypes;
    public $colleges;
    public $role_id;

    protected function rules()
    {
        return [
            'role_name' => ['required', 'string', 'max:255',],
            'roletype_id' => ['required',Rule::exists(Roletype::class,'id')],
            'college_id' => ['required',Rule::exists(College::class,'id')],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function messages()
    {
        return [
            'role_name.string' => 'Please type the role name using letters.',
            'roletype_id.required' => 'Please select the role.',
            'college_id.required' => 'Please select the college.',
        ];
    }

    public function edit($id)
    {
        $role = Role::find($id);
        if ($role){
            $this->role_name= $role->role_name;
            $this->roletype_id= $role->roletype_id;
            $this->college_id= $role->college_id;
        }else{
            $this->dispatch('alert',type:'error',message:'Role Details Not Found');
        }
    }

    public function update($id)
    {
        $validatedData = $this->validate();
        $role = Role::find($id);

        if ($role) {
            $role->update($validatedData);
            $this->dispatch('alert',type:'success',message:'Role Updated Successfully');

            return redirect()->route('faculty.view-role.faculty');
        }else{
            $this->dispatch('alert',type:'error',message:'Error To Update Role');
        }
    }

    public function mount($id)
    {
        $this->roletypes = Roletype::all();
        $this->colleges= College::where('status',1)->get();
        $this->edit($id);
        $this->role_id = $id;
    }

    public function render()
    {
        return view('livewire.faculty.faculty-role.edit-role')->extends('layouts.faculty')->section('faculty');
    }
}
