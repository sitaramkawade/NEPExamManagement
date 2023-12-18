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
use App\Models\Facultybankaccount;

class EditFaculty extends Component
{

    public $prefix;
    public $faculty_name;
    public $email;
    public $mobile_no;
    public $role_id;
    public $department_id;
    public $college_id;
    public $active;
    public $faculty_verified;

    public $bank_name;
    public $account_no;
    public $bank_address;
    public $branch_name;
    public $branch_code;
    public $ifsc_code;
    public $micr_code;
    public $account_type;
    public $acc_verified;

    public $prefixes;
    public $roles;
    public $departments;
    public $colleges;
    public $banknames;

    public $faculty_id;

    protected function rules()
    {
        return [
            'prefix' => ['required',],
            'faculty_name' => ['required', 'string', 'max:255',],
            'email' => ['required', 'email', 'string',],
            'mobile_no' => ['required', 'numeric','digits:10'],
            'role_id' => ['required',Rule::exists(Roletype::class,'id')],
            'department_id' => ['required',Rule::exists(Department::class,'id')],
            'college_id' => ['required',Rule::exists(College::class,'id')],
            // 'active' => ['required',],
            // 'faculty_verified' => ['required',],
            'account_no' => ['required', 'numeric', 'unique:facultybankaccounts,account_no' ,'digits_between:8,16',],
            'bank_address' => ['required', 'string', 'max:255',],
            'bank_name' => ['required', 'string', 'max:255',],
            'branch_name' => ['required', 'string', 'max:255',],
            'branch_code' => ['required', 'numeric', 'digits:4',],
            'ifsc_code' => ['required', 'string', 'size:11',],
            'micr_code' => ['required', 'numeric', 'digits:9',],
            'account_type' => ['required', 'in:C,S',],
            // 'acc_verified' => ['required', ],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
         $this->prefix=null;
         $this->faculty_name=null;
         $this->email=null;
         $this->mobile_no=null;
         $this->role_id=null;
         $this->department_id=null;
         $this->college_id=null;

         $this->bank_name=null;
         $this->account_no=null;
         $this->bank_address=null;
         $this->branch_name=null;
         $this->branch_code=null;
         $this->ifsc_code=null;
         $this->micr_code=null;
         $this->account_type=null;
    }

    public function messages()
    {
        return [
            'prefix.required' => 'Please select the prefix.',
            'faculty_name.string' => 'Please enter the faculty name as a string.',
            'email.required' => 'Please enter the faculty email.',
            'email.email' => 'Please enter a valid email address.',
            'mobile_no.required' => 'Please enter the mobile number.',
            'role_id.required' => 'Please select the role.',
            'department_id.required' => 'Please select the department.',
            'college_id.required' => 'Please select the college.',
            'active.required' => 'Please specify the active status.',
            'account_no.required' => 'Please enter the faculty account number.',
            'bank_address.required' => 'Please enter the bank address.',
            'bank_name.required' => 'Please enter the bank name.',
            'branch_name.required' => 'Please enter the branch name.',
            'branch_code.required' => 'Please enter the branch code.',
            'ifsc_code.required' => 'Please enter the IFSC code.',
            'micr_code.required' => 'Please enter the MICR code.',
            'account_type.required' => 'Please select the account type.',
        ];
    }

    public function edit($id)
    {
        $faculty = Faculty::find($id);
        if ($faculty)
        {
            $this->prefix= $faculty->prefix;
            $this->faculty_name= $faculty->faculty_name;
            $this->email= $faculty->email;
            $this->mobile_no= $faculty->mobile_no;
            $this->role_id= $faculty->role_id;
            $this->department_id= $faculty->department_id;
            $this->college_id= $faculty->college_id;

            $bankdetails = Facultybankaccount:: where('faculty_id',$id)->first();
            if($bankdetails){
                $this->bank_name= $bankdetails->bank_name;
                $this->account_no= $bankdetails->account_no;
                $this->bank_address= $bankdetails->bank_address;
                $this->branch_name= $bankdetails->branch_name;
                $this->branch_code= $bankdetails->branch_code;
                $this->ifsc_code= $bankdetails->ifsc_code;
                $this->micr_code= $bankdetails->micr_code;
                $this->account_type= $bankdetails->account_type;
            }else{
                $this->dispatch('alert',type:'error',message:'Bank Details Not Found');
            }
        }
    }

    public function update($id)
    {
        $validatedData = $this->validate();
        $faculty = Faculty::find($id);

        if ($faculty) {
            $faculty->update($validatedData);
            $faculty->facultybankaccount()->updateOrCreate([], $validatedData);

            $this->dispatch('alert',type:'success',message:'Faculty Updated Successfully');
            return redirect()->route('faculty.view.faculty');
        }else{
            $this->dispatch('alert',type:'error',message:'Error To Update Faculty');
        }
    }

    public function mount($id)
    {
        $this->prefixes = Prefixmaster::where('is_active',1)->get();
        $this->banknames = Banknamemaster::where('is_active',1)->get();
        $this->roles= Roletype::where('status',1)->get();
        $this->departments= Department::where('status',1)->get();
        $this->colleges= College::where('status',1)->get();
        $this->edit($id);
        $this->faculty_id = $id;
    }

    public function render()
    {
        return view('livewire.faculty.edit-faculty')->extends('layouts.faculty')->section('faculty');
    }
}
