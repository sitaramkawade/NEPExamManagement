<?php

namespace App\Livewire\Faculty;

use App\Models\College;
use App\Models\Faculty;
use Livewire\Component;
use App\Models\Roletype;
use App\Models\Department;
use App\Models\Gendermaster;
use App\Models\CasteCategory;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Models\Facultybankaccount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UpdateProfile extends Component
{
        use WithFileUploads;

        public $faculty_id;
        public $prefix;
        public $faculty_name;
        public $email;
        public $mobile_no;
        public $college_id;
        public $department_id;
        public $role_id;

        public $bank_name;
        public $account_no;
        public $bank_address;
        public $branch_name;
        public $branch_code;
        public $ifsc_code;
        public $micr_code;
        public $account_type;
        public $profile_photo_path_old;

        public $date_of_birth;
        public $gender;
        public $category;
        public $pan;
        public $current_address;
        public $permanant_address;
        public $profile_photo_path;
        public $unipune_id;
        public $qualification;

        public $cast_categories;

        public $prefixes;
        public $roles;
        public $genders;
        public $departments;
        public $colleges;
        public $banknames;
        public $faculty;

        public $isDisabled = true;

        protected function rules()
        {
            return [
                'prefix' => ['required',],
                'date_of_birth' => ['required','unique:faculties,pan', 'string', 'size:10',],
                'gender' => ['required',],
                'pan' => ['required',],
                'permanant_address' => ['required',],
                'current_address' => ['required',],
                'profile_photo_path' => ['required',],
                'college_id' => ['required',Rule::exists(College::class,'id')],
                // 'account_no' => ['required', 'numeric', 'unique:facultybankaccounts,account_no' ,'digits_between:8,16',],
                // 'bank_address' => ['required', 'string', 'max:255',],
                // 'bank_name' => ['required', 'string', 'max:255',],
                // 'branch_name' => ['required', 'string', 'max:255',],
                // 'branch_code' => ['required', 'numeric', 'digits:4',],
                // 'ifsc_code' => ['required', 'string', 'size:11',],
                // 'micr_code' => ['required', 'numeric', 'digits:9',],
                // 'account_type' => ['required', 'in:C,S',],
                // 'faculty_name' => ['required', 'string', 'max:255',],
                // 'email' => ['required', 'email', 'string',],
                // 'mobile_no' => ['required', 'numeric','digits:10'],
                // 'role_id' => ['required',Rule::exists(Roletype::class,'id')],
                // 'department_id' => ['required',Rule::exists(Department::class,'id')],
            ];
        }

        public function updated($propertyName)
        {
            $this->validateOnly($propertyName);
        }

        public function messages()
        {
            return [
                'date_of_birth.required' => 'Please enter date of birth.',
                'gender.required' => 'Please select the gender.',
                'current_address.required' => 'Please enter the current address.',
                'permanant_address.required' => 'Please enter the permanant address.',
                'profile_photo_path.required' => 'Please choose the profile photo.',
                'college_id.required' => 'Please select the college.',
                // 'prefix.required' => 'Please select the prefix.',
                // 'faculty_name.string' => 'Please enter the faculty name as a string.',
                // 'email.required' => 'Please enter the faculty email.',
                // 'email.email' => 'Please enter a valid email address.',
                // 'mobile_no.required' => 'Please enter the mobile number.',
                // 'role_id.required' => 'Please select the role.',
                // 'department_id.required' => 'Please select the department.',
                // 'account_no.required' => 'Please enter the faculty account number.',
                // 'bank_address.required' => 'Please enter the bank address.',
                // 'bank_name.required' => 'Please enter the bank name.',
                // 'branch_name.required' => 'Please enter the branch name.',
                // 'branch_code.required' => 'Please enter the branch code.',
                // 'ifsc_code.required' => 'Please enter the IFSC code.',
                // 'micr_code.required' => 'Please enter the MICR code.',
                // 'account_type.required' => 'Please select the account type.',
            ];
        }


        public function show($faculty)
        {
            if($faculty){
                $this->prefix= $faculty->prefix;
                $this->faculty_name= $faculty->faculty_name;
                $this->email= $faculty->email;
                $this->mobile_no= $faculty->mobile_no;
                $this->date_of_birth= $faculty->date_of_birth;
                $this->gender= $faculty->gender;
                $this->pan= $faculty->pan;
                $this->category= $faculty->category;
                $this->current_address= $faculty->current_address;
                $this->permanant_address= $faculty->permanant_address;
                $this->college_id= $faculty->college_id;
                $this->qualification= $faculty->qualification;
                $this->unipune_id= $faculty->unipune_id;
                $this->profile_photo_path_old=$faculty->profile_photo_path;
                $departmentId = $faculty->department()->first();
                $this->department_id = $departmentId;
                $roleId = $faculty->role()->first();
                $this->role_id = $roleId;

                $bankdetails = $faculty->facultybankaccount()->first();
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

        public function updateProfile()
    {
        $faculty = Auth::guard('faculty')->user();

        if ($faculty) {
            $dataToUpdate = [
                'mobile_no' => $this->mobile_no,
                'date_of_birth' => $this->date_of_birth,
                'gender' => $this->gender,
                'pan' => $this->pan,
                'category' => $this->category,
                'current_address' => $this->current_address,
                'permanant_address' => $this->permanant_address,
                'qualification' => $this->qualification,
                'unipune_id' => $this->unipune_id,
                'college_id' => $this->college_id,
            ];

            if ($this->profile_photo_path) {
                if ($faculty->profile_photo_path) {
                    File::delete($faculty->profile_photo_path);
                }
                $path = 'faculty/profile/photo/';
                $fileName = 'faculty-' . time(). '.' . $this->profile_photo_path->getClientOriginalExtension();
                $this->profile_photo_path->storeAs($path, $fileName, 'public');
                $faculty->profile_photo_path = 'storage/' . $path . $fileName;
                $this->reset('profile_photo_path');
            }

            $faculty->update($dataToUpdate);

            $this->dispatch('alert', type: 'success', message: 'Faculty Profile Updated Successfully');
            return redirect()->route('faculty.update-profile.faculty');
        } else {
            $this->dispatch('alert', type: 'error', message: 'Error Updating Profile');
        }
    }


        public function mount()
        {
            $faculty = Auth::guard('faculty')->user();
            $this->genders = Gendermaster::where('is_active',1)->get();
            $this->cast_categories = CasteCategory::where('is_active',1)->get();
            $this->colleges= College::where('status',1)->get();
            $this->show($faculty);

        }

        public function render()
        {
            return view('livewire.faculty.update-profile')->extends('layouts.faculty')->section('faculty');
        }
    }
