<?php

namespace App\Livewire\Faculty\FacultyRole;

use App\Models\Role;
use App\Models\College;
use Livewire\Component;
use App\Models\Roletype;
use Illuminate\Validation\Rule;

class AddRole extends Component
{
    public $role_name;
    public $roletype_id;
    public $college_id;

    public $roletypes;
    public $colleges;


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

    public function resetinput()
    {
         $this->role_name=null;
         $this->roletype_id=null;
         $this->college_id=null;
    }

    public function messages()
    {
        return [
            'role_name.string' => 'Please type the role name using letters.',
            'roletype_id.required' => 'Please select the role.',
            'college_id.required' => 'Please select the college.',
        ];
    }

    public function add()
    {
        $validatedData = $this->validate();
        $role = Role::create($validatedData);
        if ($role) {
            $role->create($validatedData);
            $this->dispatch('alert',type:'success',message:'Role Added Successfully');
            $this->resetinput();
        } else {
            $this->dispatch('alert',type:'error',message:'Failed to Add Role. Please try again.');
        }
    }

    public function mount()
    {
        $this->roletypes = Roletype::all();
        $this->colleges= College::where('status',1)->get();
    }

    public function render()
    {
        return view('livewire.faculty.faculty-role.add-role')->extends('layouts.faculty')->section('faculty');
    }
}
