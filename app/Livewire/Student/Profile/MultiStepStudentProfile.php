<?php

namespace App\Livewire\Student\Profile;

use App\Models\Student;
use Livewire\Component;
use App\Models\Gendermaster;
use App\Models\CasteCategory;
use Livewire\WithFileUploads;
use App\Models\Studentprofile;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class MultiStepStudentProfile extends Component
{   
    use WithFileUploads;
    public $steps = 4;
    public $current_step = 3;
    public $student_id;
    public $genders;
    public $cast_categories;

    // step 1
    public $memid;
    // step 2
    public $student_name;
    public $email;
    public $mobile_no;
    public $father_name;
    public $mother_name;
    public $gender;
    public $date_of_birth;
    public $nationality;
    public $adharnumber;
    public $caste_category_id;
    public $is_noncreamylayer;
    public $is_handicap;
    // step 3
    public $profile_photo_path;
    public $profile_photo_path_old;
    public $sign_photo_path;
    public $sign_photo_path_old;

    public function rules()
    {
        $rules = [];

        if ($this->current_step == 1) {
            $rules = [
                'memid' => ['required','numeric','min:1','digits_between:4,10'],
            ];
        } elseif ($this->current_step == 2) {
            $rules = [
                // 'student_name' => ['required','string','max:255'],
                // 'email' => ['required','email','string','max:255'],
                // 'mobile_no' => ['required','numeric','digits:10'],
                'mother_name' => ['required','string','max:255'],
                'adharnumber' => ['required','numeric','digits:12'],
                'father_name' => ['required','string','max:255'],
                'gender' => ['required','string','max:1'],
                'date_of_birth' => ['required','date'],
                'nationality' => ['required','string','max:25'],
                'caste_category_id' => ['required','numeric',Rule::exists('caste_categories', 'id')],
                'is_noncreamylayer' => ['required','numeric','min:0','max:1'],
                'is_handicap' => ['required','numeric','min:0','max:1'],
            ];
        } elseif ($this->current_step == 3) {
            $rules = [
                'profile_photo_path' =>['required','max:250','mimes:png,jpg,jpeg'],
                'sign_photo_path' => ['required','max:50','mimes:png,jpg,jpeg'],
            ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'memid.required' => 'Member ID is required.',
            'memid.numeric' => 'Member ID must be a number.',
            'memid.min' => 'Member ID must be greater than or equal to :min.',
            'memid.digits_between' => 'Member ID must be between :min and :max digits.',

            'student_name.required' => 'The Student name field is required.',
            'student_name.string' => 'The Student name must be a string.',
            'student_name.max' => 'The Student name must not exceed 255 characters.',

            
            'email.required' => 'The Email field is required.',
            'email.email' => 'Please Enter a valid Email address.',
            'email.string' => 'The Email must be a string.',
            'email.max' => 'The Email must not exceed 255 characters.',
            
            'mobile_no.required' => 'The Mobile Number field is required.',
            'mobile_no.numeric' => 'The Mobile Number must be a number.',
            'mobile_no.digits' => 'The Mobile Number must be 10 digits.',
            
            'mother_name.required' => 'The Mother Name field is required.',
            'mother_name.string' => 'The Mother Name must be a string.',
            'mother_name.max' => 'The Mother Name must not exceed 255 characters.',
            
            'adharnumber.required' => 'The Aadhar Number field is required.',
            'adharnumber.numeric' => 'The Aadhar Number must be a number.',
            'adharnumber.digits' => 'The Aadhar Number must be 12 digits.',
            
            'father_name.required' => 'The Father Name field is required.',
            'father_name.string' => 'The Father Name must be a string.',
            'father_name.max' => 'The Father Name must not exceed 255 characters.',
            
            'gender.required' => 'The Gender field is required.',
            'gender.string' => 'The Gender must be a string.',
            'gender.max' => 'The Gender must not exceed 2 characters.',
            
            'date_of_birth.required' => 'The Date Of Birth field is required.',
            'date_of_birth.date' => 'Please enter a valid Date Of Birth.',
            
            'nationality.required' => 'The Nationality field is required.',
            'nationality.string' => 'The Nationality must be a string.',
            'nationality.max' => 'The Nationality must not exceed 25 characters.',
            
            'caste_category_id.required' => 'The Caste Category field is required.',
            'caste_category_id.numeric' => 'The Caste Category must be a number.',
            'caste_category_id.exists' => 'The selected Caste Category is invalid.',
            
            'is_noncreamylayer.required' => 'The Non-Creamy Layer field is required.',
            'is_noncreamylayer.numeric' => 'The Non-Creamy Layer must be a number.',
            'is_noncreamylayer.min' => 'The Non-Creamy Layer must be at least 0.',
            'is_noncreamylayer.max' => 'The Non-Creamy Layer must be at most 1.',
            
            'is_handicap.required' => 'The Handicap field is required.',
            'is_handicap.numeric' => 'The Handicap must be a number.',
            'is_handicap.min' => 'The Handicap must be at least 0.',
            'is_handicap.max' => 'The Handicap must be at most 1.',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function member_id_form()
    {   
        $this->validate();
        Auth::guard('student')->user()->update(['memid'=>$this->memid]);
        $this->current_step = 2;
        $this->dispatch('alert',type:'success',message:'Step One : Member ID Saved Successfully !!');  
    }

    public function student_information_form()
    {   
        $this->validate();
        Auth::guard('student')->user()->update([
            'mother_name'=>$this->mother_name,
            'aadhar_card_no'=>$this->adharnumber,
        ]);
        Auth::guard('student')->user()->studentprofile()->updateOrCreate(
            [   'student_id'=>Auth::guard('student')->user()->id ],
            [
                'student_name_on_adharcard'=>Auth::guard('student')->user()->student_name,
                'father_name'=>$this->father_name,
                'gender'=>$this->gender,
                'date_of_birth'=>$this->date_of_birth,
                'nationality'=>$this->nationality,
                'caste_category_id'=>$this->caste_category_id,
                'is_noncreamylayer'=>$this->is_noncreamylayer,
                'is_handicap'=>$this->is_handicap,
            ]
        ); 
        $this->dispatch('alert',type:'success',message:'Step Tow : Student Information Saved Successfully !!');  
        $this->current_step = 3;
    }

    public function photo_upload()
    {   
        $this->validate();
        $studentProfile = Studentprofile::where('student_id', Auth::guard('student')->user()->id)->first();

        if (!$studentProfile) {
            $this->dispatch('alert',type:'error',message:'Student Profile Not Found !!');  
            return;
        }
    
        if ($this->profile_photo_path) {
            if ($studentProfile->profile_photo_path) {
                File::delete($studentProfile->profile_photo_path);
            }
    
            $path = 'uploads/student/profile/photo/';
            $fileName = 'student-' . time(). '.' . $this->profile_photo_path->getClientOriginalExtension();
            $this->profile_photo_path->storeAs($path, $fileName, 'public');
            $studentProfile->profile_photo_path = 'storage/' . $path . $fileName;
            $this->reset('profile_photo_path');
        }
    
        if ($this->sign_photo_path) {
            if ($studentProfile->sign_photo_path) {
                File::delete($studentProfile->sign_photo_path);
            }
    
            $path = 'uploads/student/profile/sign/';
            $fileName = 'student-' . time(). '.' . $this->sign_photo_path->getClientOriginalExtension();
            $this->sign_photo_path->storeAs($path, $fileName, 'public');
            $studentProfile->sign_photo_path = 'storage/' . $path . $fileName;
            $this->reset('sign_photo_path');
        }
    
        $studentProfile->update();
        $this->dispatch('alert',type:'success',message:'Step Three : Student Photo And Sign Saved Successfully !!');  
        $this->current_step = 4;
    }

    public function fetch()
    {
        $student=Auth::guard('student')->user();
        $this->memid=$student->memid;
        $this->student_name=$student->student_name;
        $this->email=$student->email;
        $this->mobile_no=$student->mobile_no;
        $this->adharnumber=$student->aadhar_card_no;
        $this->mother_name=$student->mother_name;

        $student_profile= Studentprofile::where('student_id',$student->id)->first();
        if($student_profile)
        {
            $this->father_name=$student_profile->father_name;
            $this->gender=$student_profile->gender;
            $this->date_of_birth=$student_profile->date_of_birth;
            $this->nationality=$student_profile->nationality;
            $this->caste_category_id=$student_profile->caste_category_id;
            $this->is_noncreamylayer=$student_profile->is_noncreamylayer;
            $this->is_handicap=$student_profile->is_handicap;
            $this->profile_photo_path_old=$student_profile->profile_photo_path;
            $this->sign_photo_path_old=$student_profile->sign_photo_path;
        }

    }

    public function mount()
    {   
        $this->genders=Gendermaster::where('is_active',1)->get();
        $this->cast_categories=CasteCategory::where('is_active',1)->get();
        $this->fetch();
    }

    public function back()
    {
        $this->fetch();
        $this->current_step--;

    }

    public function render()
    {   
        return view('livewire.student.profile.multi-step-student-profile');
    }
}
