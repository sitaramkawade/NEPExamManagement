<?php

namespace App\Livewire\Faculty;

use App\Models\College;
use App\Models\Faculty;
use Livewire\Component;
use App\Models\Roletype;
use App\Models\Department;
use App\Models\Prefixmaster;
use App\Models\Banknamemaster;

class RegisterFaculty extends Component
{
    public $prefix=null;
    public $prefixes=null;
    public $faculty_name=null;
    public $email=null;
    public $mobile_no=null;
    public $role_id=null;
    public $roles=null;
    public $department_id=null;
    public $departments=null;
    public $college_id=null;
    public $colleges=null;
    public $active=null;
    public $faculty_verified=null;

    public $bank_name=null;
    public $banknames=null;
    public $account_no=null;
    public $bank_address=null;
    public $branch_name=null;
    public $branch_code=null;
    public $ifsc_code=null;
    public $micr_code=null;
    public $account_type=null;
    public $acc_verified=null;


    protected function rules()
    {
        return [
            'prefix' => ['required',],
            'faculty_name' => ['required', 'string', 'max:255',],
            'email' => ['required', 'email', 'max:255'],
            'mobile_no' => ['required', 'numeric', 'unique:faculties,mobile_no'],
            'role_id' => ['required',],
            'department_id' => ['required',],
            'college_id' => ['required',],
            'active' => ['required',],
            'faculty_verified' => ['required',],
            'account_no' => ['required', 'numeric', 'unique:facultybankaccounts,account_no'],
            'bank_address' => ['required', 'string', 'max:255',],
            'bank_name' => ['required', ],
            'branch_name' => ['required', 'string', 'max:255',],
            'branch_code' => ['required', 'string', 'max:255',],
            'ifsc_code' => ['required', 'string', 'max:255',],
            'micr_code' => ['required', 'string', 'max:255',],
            'account_type' => ['required', ],
            'acc_verified' => ['required', ],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
         $this->$prefix=null;
         $this->$faculty_name=null;
         $this->$email=null;
         $this->$mobile_no=null;
         $this->$role_id=null;
         $this->$department_id=null;
         $this->$college_id=null;
         $this->$active=null;
         $this->$faculty_verified=null;
         $this->$bank_name=null;
         $this->$account_no=null;
         $this->$bank_address=null;
         $this->$branch_name=null;
         $this->$branch_code=null;
         $this->$ifsc_code=null;
         $this->$micr_code=null;
         $this->$account_type=null;
         $this->$acc_verified=null;
    }

    public function add()
    {
        $validatedData = $this->validate();

        $faculty = Faculty::create($validatedData);

        if ($faculty) {
            $faculty->facultybankaccount()->create($validatedData);
            session()->flash('message', 'Details added successfully.');
            $this->resetinput();
        } else {
            session()->flash('error', 'Failed to add details.');
        }
    }

    public function mount()
    {

        $this->prefixes = Prefixmaster::where('is_active',1)->get();
        $this->banknames = Banknamemaster::where('is_active',1)->get();
        $this->roles= Roletype::where('status',1)->get();
        $this->departments= Department::where('status',1)->get();
        $this->colleges= College::where('status',1)->get();
    }

    public function render()
    {
        return view('livewire.faculty.register-faculty')->extends('layouts.faculty')->section('faculty');
    }
}
