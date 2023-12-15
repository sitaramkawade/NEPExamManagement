<?php

namespace App\Livewire\Student\Profile;

use App\Models\Student;
use Livewire\Component;
use App\Models\Gendermaster;
use App\Models\CasteCategory;
use App\Models\Studentprofile;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class MultiStepStudentProfile extends Component
{   
    public $steps = 4;
    public $current_step = 1;
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

    public function rules()
    {
        $rules = [];

        if ($this->current_step == 1) {
            $rules = [
                'memid' => ['required','numeric','min:1','digits_between:4,10'],
            ];
        } elseif ($this->current_step == 2) {
            $rules = [
                // 'student_name' => ['required','string','max:255','digits_between:4,10'],
                // 'email' => ['required','email','string','max:255'],
                // 'mobile_no' => ['required','numeric','digits:10'],
                'mother_name' => ['required','string','max:255'],
                'adharnumber' => ['required','numeric','digits:12'],
                'father_name' => ['required','string','max:255'],
                'gender' => ['required','string','max:2'],
                'date_of_birth' => ['required','date'],
                'nationality' => ['required','string','max:25'],
                'caste_category_id' => ['required','numeric'],
                'is_noncreamylayer' => ['required','numeric','min:0','max:1'],
                'is_handicap' => ['required','numeric','min:0','max:1'],
            ];
        } elseif ($this->current_step == 3) {
            $rules = [
                'abcid' => 'required',
                'aadhar_card_no' => 'required',
                'mother_name' => 'required',
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
        $this->dispatch('alert',type:'success',message:'Step One : Member ID Saved Successfully!!');  
    }

    public function student_information_form()
    {   
        $this->validate();
        Auth::guard('student')->user()->update([
            'mother_name'=>$this->mother_name,
            'aadhar_card_no'=>$this->adharnumber,
        ]);
        Auth::guard('student')->user()->studentprofile()->updateOrCreate([
            'student_id'=>Auth::guard('student')->user()->id,
            'student_name_on_adharcard'=>Auth::guard('student')->user()->student_name,
            'father_name'=>$this->father_name,
            'gender'=>$this->gender,
            'date_of_birth'=>$this->date_of_birth,
            'nationality'=>$this->nationality,
            'caste_category_id'=>$this->caste_category_id,
            'is_noncreamylayer'=>$this->is_noncreamylayer,
            'is_handicap'=>$this->is_handicap,
        ]);
        $this->dispatch('alert',type:'success',message:'Step Tow : Student Information Saved Successfully!!');  
        $this->current_step = 3;
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
