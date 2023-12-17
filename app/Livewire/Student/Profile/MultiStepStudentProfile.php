<?php

namespace App\Livewire\Student\Profile;

use App\Models\State;
use App\Models\Taluka;
use App\Models\Country;
use App\Models\Student;
use App\Models\Village;
use Livewire\Component;
use App\Models\District;
use App\Models\Gendermaster;
use App\Models\CasteCategory;
use Livewire\WithFileUploads;
use App\Models\Studentaddress;
use App\Models\Studentprofile;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class MultiStepStudentProfile extends Component
{   
    use WithFileUploads;
    public $steps = 6;
    public $current_step = 5;
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
    public $can_update=0;
    // step 4
    public $countries;
    public $states;
    public $talukas;
    public $districts;
    public $country_id;
    public $state_id;
    public $district_id;
    public $taluka_id=null;
    public $pincode;
    public $village;
    public $address;
    public $is_same=0;
    public $countries_2;
    public $states_2;
    public $talukas_2;
    public $districts_2;
    public $country_id_2;
    public $state_id_2;
    public $district_id_2=null;
    public $taluka_id_2;
    public $pincode_2;
    public $village_2;
    public $address_2;

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
                'profile_photo_path' =>[$this->can_update==1?'nullable':'required','max:250','mimes:png,jpg,jpeg'],
                'sign_photo_path' => [$this->can_update==1?'nullable':'required','max:50','mimes:png,jpg,jpeg'],
            ];
        }elseif ($this->current_step == 4) {
            if($this->is_same)
            {
                $rules = [
                    'pincode' =>['required','numeric','digits:6'],
                    'taluka_id' =>['required','numeric',Rule::exists('talukas', 'id')],
                    'address' =>['required','string','max:400'],
                    'village' =>['required','string','max:255'],
                    'country_id' =>['required'],
                    'district_id' =>['required'],
                    'state_id' =>['required'],
                ];
            }else
            {
                $rules = [
                    'pincode' =>['required','numeric','digits:6'],
                    'taluka_id' =>['required','numeric',Rule::exists('talukas', 'id')],
                    'address' =>['required','string','max:400'],
                    'village' =>['required','string','max:255'],
                    'pincode_2' =>['required','numeric','digits:6'],
                    'taluka_id_2' =>['required','numeric',Rule::exists('talukas', 'id')],
                    'address_2' =>['required','string','max:400'],
                    'village_2' =>['required','string','max:255'],
                    'country_id' =>['required'],
                    'district_id' =>['required'],
                    'state_id' =>['required'],
                    'country_id_2' =>['required'],
                    'district_id_2' =>['required'],
                    'state_id_2' =>['required'],
                ];
            }
        }

        return $rules;
    }

    public function messages()
    {
        return [
            // step 1
            'memid.required' => 'Member ID is required.',
            'memid.numeric' => 'Member ID must be a number.',
            'memid.min' => 'Member ID must be greater than or equal to :min.',
            'memid.digits_between' => 'Member ID must be between :min and :max digits.',
            // step 2
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
            // step 3
            'profile_photo_path.required' => 'The Student Photo field is required.',
            'profile_photo_path.mimes' => 'The Student Photo extension must be :mimes .',
            'profile_photo_path.max' => 'The Student Photo Size must :max KB.',
            'sign_photo_path.required' => 'The Student Photo field is required.',
            'sign_photo_path.mimes' => 'The Student Photo extension must be :mimes .',
            'sign_photo_path.max' => 'The Student Photo Size must :max KB.',
            // step 4
            'pincode.required' => 'The Pincode field is required.',
            'pincode.numeric' => 'The Pincode must be a number.',
            'pincode.digits' => 'The Pincode must be exactly 6 digits.',
            'taluka_id.required' => 'The Taluka field is required.',
            'taluka_id.numeric' => 'The Taluka must be a number.',
            'taluka_id.exists' => 'The selected Taluka is invalid.',
            'address.required' => 'The Address field is required.',
            'address.string' => 'The Address must be a string.',
            'address.max' => 'The Address may not be greater than :max characters.',
            'village.required' => 'The Village field is required.',
            'village.string' => 'The Village must be a string.',
            'village.max' => 'The Village may not be greater than :max characters.',
            'pincode_2.required' => 'The Pincode field is required.',
            'pincode_2.numeric' => 'The Pincode must be a number.',
            'pincode_2.digits' => 'The Pincode must be exactly 6 digits.',
            'taluka_id_2.required' => 'The Taluka field is required.',
            'taluka_id_2.numeric' => 'The Taluka must be a number.',
            'taluka_id_2.exists' => 'The selected Taluka is invalid.',
            'address_2.required' => 'The Address field is required.',
            'address_2.string' => 'The Address must be a string.',
            'address_2.max' => 'The Address may not be greater than :max characters.',
            'village_2.required' => 'The Village field is required.',
            'village_2.string' => 'The Village must be a string.',
            'village_2.max' => 'The Village may not be greater than :max characters.',
            'country_id.required' => 'The Country field is required.',
            'district_id.required' => 'The District field is required.',
            'state_id.required' => 'The State field is required.',
            'country_id_2.required' => 'The Country field is required.',
            'district_id_2.required' => 'The District field is required.',
            'state_id_2.required' => 'The State field is required.',
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
        $this->dispatch('alert',type:'success',message:'Step One : Member ID Saved Successfully !!');  
        $this->current_step = 2;
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

    public function address_form()
    {
        $this->validate();


        if($this->is_same)
        {
            Auth::guard('student')->user()->studentaddress()->updateOrCreate(
                [   
                    'student_id'=>Auth::guard('student')->user()->id,
                    'is_same' => 1, 
                ],
                [
                    'taluka_id'=>$this->taluka_id,
                    'pincode'=>$this->pincode,
                    'village_name'=>$this->village,
                    'locality_name'=>$this->village,
                    'address'=>$this->address,
                    'is_same'=>1,
                    'address_type' => 1,
                    'is_completed'=>1,
                ]
            ); 
            $this->dispatch('alert',type:'success',message:'Step Four : Student Address Saved Successfully !!');  
        }else
        {
            Auth::guard('student')->user()->studentaddress()->updateOrCreate(
                [   
                    'student_id'=>Auth::guard('student')->user()->id, 
                    'address_type' => 1
                ],
                [
                    'taluka_id' => $this->taluka_id,
                    'pincode' => $this->pincode,
                    'village_name' => $this->village,
                    'locality_name' => $this->village,
                    'address' => $this->address,
                    'is_same' => 0,
                    'address_type' => 1,
                    'is_completed' => 1,
                ]
            );
            
            Auth::guard('student')->user()->studentaddress()->updateOrCreate(
                [   
                    'student_id'=>Auth::guard('student')->user()->id,
                    'address_type' => 2
                ],
                [
                    'taluka_id' => $this->taluka_id_2,
                    'pincode' => $this->pincode_2,
                    'village_name' => $this->village_2,
                    'locality_name' => $this->village_2,
                    'address' => $this->address_2,
                    'is_same' => 0,
                    'address_type' => 2,
                    'is_completed' => 1,
                ]
            );
            $this->dispatch('alert',type:'success',message:'Step Four : Student Current And Permanent Address Saved Successfully !!');  
        }
        $this->current_step = 5;
    }

    public function choose_course_form()
    {   
       
    }

    
    public function back()
    {   
        $this->feach();
        $this->current_step--;
    }

    public function mount()
    {
       $this->feach();
    }

    public function feach()
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
            if(isset($student_profile->sign_photo_path) && isset($student_profile->profile_photo_path))
            {
                $this->can_update=1;
            }
        }
        $student_addres_1= Studentaddress::where('student_id',$student->id)->where('is_same',1)->first();
        if($student_addres_1)
        {   
            $taluka1=Taluka::find($student_addres_1->taluka_id);
            if($taluka1)
            {   
                $this->is_same=1;
                $this->country_id=$taluka1->district->state->country->id;
                $this->state_id=$taluka1->district->state->id;
                $this->district_id=$taluka1->district->id;
                $this->taluka_id=$taluka1->id;
            }
            $this->pincode=$student_addres_1->pincode;
            $this->village=$student_addres_1->village_name;
            $this->address=$student_addres_1->address;
        }

        $student_addres_2= Studentaddress::where('student_id',$student->id)->where('is_same',0)->where('address_type',1)->first();
        if($student_addres_2)
        {   
            $this->is_same=0;
            $taluka2=Taluka::find($student_addres_2->taluka_id);
            if($taluka2)
            {   
                $this->country_id=$taluka2->district->state->country->id;
                $this->state_id=$taluka2->district->state->id;
                $this->district_id=$taluka2->district->id;
                $this->taluka_id=$taluka2->id;
            }
            $this->pincode=$student_addres_2->pincode;
            $this->village=$student_addres_2->village_name;
            $this->address=$student_addres_2->address;
        }

        $student_addres_3= Studentaddress::where('student_id',$student->id)->where('is_same',0)->where('address_type',2)->first();
        if($student_addres_3)
        {   $this->is_same=0;
            $taluka3=Taluka::find($student_addres_3->taluka_id);
            if($taluka3)
            {
                $this->country_id_2=$taluka3->district->state->country->id;
                $this->state_id_2=$taluka3->district->state->id;
                $this->district_id_2=$taluka3->district->id;
                $this->taluka_id_2=$taluka3->id;
            }
            $this->pincode_2=$student_addres_3->pincode;
            $this->village_2=$student_addres_3->village_name;
            $this->address_2=$student_addres_3->address;
        }
    }

    public function render()
    {   
       
        if($this->current_step==2)
        {
            $this->genders=Gendermaster::where('is_active',1)->get();
            $this->cast_categories=CasteCategory::where('is_active',1)->get();
        }

        if($this->current_step==4)
        {
            $this->countries = Country::all();
            $this->states = State::where('country_id', $this->country_id)->get();
            $this->districts = District::where('state_id', $this->state_id)->get();
            $this->talukas = Taluka::where('district_id', $this->district_id)->get();

            if($this->is_same===0)
            {
                $this->countries_2 = Country::all();
                $this->states_2 = State::where('country_id', $this->country_id_2)->get();
                $this->districts_2 = District::where('state_id', $this->state_id_2)->get();
                $this->talukas_2 = Taluka::where('district_id', $this->district_id_2)->get();
            }
        }

        return view('livewire.student.profile.multi-step-student-profile');
    }
}
