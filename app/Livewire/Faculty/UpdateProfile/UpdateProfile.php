<?php

namespace App\Livewire\Faculty\UpdateProfile;

use App\Models\College;
use App\Models\Faculty;
use Livewire\Component;
use App\Models\Roletype;
use App\Models\Department;
use App\Models\Gendermaster;
use App\Models\Castecategory;
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
            $rules = [
                // 'prefix' => ['required',],
                'date_of_birth' => ['required', 'date', 'before_or_equal:today'],
                'gender' => ['required',],
                'pan' => ['required','unique:faculties,pan', 'string', 'size:10'],
                'permanant_address' => ['required',],
                'current_address' => ['required',],
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
            $faculty = Faculty::find($this->faculty_id); // Fetch faculty model by ID or however you retrieve it

            // Conditionally apply 'required' rule for 'profile_photo_path'
            if (!$faculty || !$faculty->profile_photo_path) {
                $rules['profile_photo_path'] = ['required'];
            } else {
                // If a profile photo already exists, no 'required' rule for 'profile_photo_path'
                $rules['profile_photo_path'] = [];
            }
            return $rules;
        }

        public function updated($propertyName)
        {
            $this->validateOnly($propertyName);
        }

        public function messages()
        {
            return [
                'date_of_birth.required' => 'Please provide your date of birth.',
                'date_of_birth.date' => 'Invalid date format for date of birth.',
                'date_of_birth.before_or_equal' => 'The date of birth must be before or equal to today.',
                'gender.required' => 'Please select your gender.',
                'pan.required' => 'Please provide your PAN number.',
                'pan.unique' => 'The PAN number has already been taken.',
                'pan.string' => 'Invalid PAN format.',
                'pan.size' => 'The PAN number must be exactly 10 characters long.',
                'permanant_address.required' => 'Please provide your permanent address.',
                'current_address.required' => 'Please provide your current address.',
                'college_id.required' => 'Please select your college.',
                'college_id.exists' => 'The selected college is invalid.',
            ];
        }


        public function show(Faculty $faculty)
        {
            if($faculty){
                $this->faculty_id= $faculty->id;
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

        public function updateProfile(Faculty $faculty)
        {
            $validatedData = $this->validate($this->rules());

            if ($faculty && $validatedData) {
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
                        File::delete(public_path($faculty->profile_photo_path));
                    }

                    $path = 'faculty/profile/photo/';
                    $fileName = 'faculty-' . time() . '.' . $this->profile_photo_path->getClientOriginalExtension();
                    $this->profile_photo_path->storeAs($path, $fileName, 'public');
                    $dataToUpdate['profile_photo_path'] = 'storage/' . $path . $fileName;
                }

                $faculty->update($dataToUpdate);

                $this->dispatch('alert', type: 'success', message: 'Faculty Profile Updated Successfully');

                return redirect()->route('faculty.updateprofile');
            } else {
               $this->dispatch('alert', type: 'error', message: 'Error Updating Profile');
            }
        }

        public function mount()
        {
            $faculty = Auth::guard('faculty')->user();
            $this->show($faculty);
            $this->genders = Gendermaster::where('is_active',1)->get();
            $this->cast_categories = Castecategory::where('is_active',1)->get();
            $this->colleges= College::where('status',1)->get();
        }

        public function render()
        {
            return view('livewire.faculty.update-profile.update-profile')->extends('layouts.faculty')->section('faculty');
        }
    }
