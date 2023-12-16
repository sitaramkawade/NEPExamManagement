<?php

namespace App\Livewire\Faculty;

use App\Models\College;
use App\Models\Faculty;
use Livewire\Component;
use App\Models\Roletype;
use App\Models\Department;
use App\Models\Prefixmaster;
use App\Models\Banknamemaster;
use Illuminate\Validation\Rule;

class RegisterFaculty extends Component
{
    public $steps=2;
    public $current_step=1;

    // step 1
    public $prefix=null;
    public $faculty_name=null;
    public $email=null;
    public $mobile_no=null;
    public $role_id=null;
    public $department_id=null;
    public $college_id=null;
    public $active=null;
    public $faculty_verified=null;

    // step 2
    public $bank_name=null;
    public $account_no=null;
    public $bank_address=null;
    public $branch_name=null;
    public $branch_code=null;
    public $ifsc_code=null;
    public $micr_code=null;
    public $account_type=null;
    public $acc_verified=null;

    public $prefixes=null;
    public $roles=null;
    public $departments=null;
    public $colleges=null;
    public $banknames=null;

    protected function rules()
    {
        $rules = [];
        if ($this->current_step==1){
            $rules = [
                'prefix' => ['required',],
                'faculty_name' => ['required', 'string', 'max:255',],
                'email' => ['required', 'email', 'max:255'],
                'mobile_no' => ['required', 'numeric', 'unique:faculties,mobile_no'],
                'role_id' => ['required',Rule::exists('roles','id')],
                'department_id' => ['required',Rule::exists('departments','id')],
                'college_id' => ['required',Rule::exists('colleges','id')],
                'active' => ['required',],
                'faculty_verified' => ['required',],
            ];
        } elseif($this->current_step == 2){
            $rules = [
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
        return $rules;
    }

    public function messages()
    {
        return [
            'prefix.required' => 'Please select the prefix.',
            'email.required' => 'Please enter the role.',
            'department_id.required' => 'Please select the department.',
            'role_id.required' => 'Please select the role.',
            'college_id.required' => 'Please select the college.',
            'college_id.required' => 'Please select the college.',
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
