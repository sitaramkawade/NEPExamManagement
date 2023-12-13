<?php

namespace App\Livewire\Faculty;

use App\Models\College;
use App\Models\Faculty;
use Livewire\Component;
use App\Models\Roletype;
use App\Models\Gendermaster;
use App\Models\CasteCategory;
use App\Models\Departmenttype;

class ViewFaculty extends Component
{
    public $faculty_name=null;
    public $email=null;
    public $gender=null;
    public $genders=null;
    public $mobile_no=null;
    public $date_of_birth=null;
    public $category_id=null;
    public $category=null;
    public $categories=null;
    public $pan=null;
    public $current_address=null;
    public $permanant_address=null;
    public $profile_photo_path=null;
    public $unipune_id=null;
    public $qualification=null;
    public $role_id=null;
    public $roles=null;
    public $department_id=null;
    public $departments=null;
    public $college_id=null;
    public $colleges=null;
    public $active=null;
    public $faculty_verified=null;

    public function add()
    {
        Faculty::create([
            'faculty_name' => $this->faculty_name,
            'email' => $this->email,
            'mobile_no' => $this->mobile_no,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'category' => $this->category,
            'pan' => $this->pan,
            'current_address' => $this->current_address,
            'permanant_address' => $this->permanant_address,
            'profile_photo' => $this->profile_photo_path,
            'unipune_id' => $this->unipune_id,
            'qualification' => $this->qualification,
            'role_id' => $this->role_id,
            'college_id' => $this->college_id,
            'department_id' => $this->department_id,
            'college_id' => $this->college_id,
            'active' => $this->active,
            'faculty_verified' => $this->faculty_verified,
        ]);

    }

    public function mount()
    {
        $this->genders = Gendermaster::where('is_active',1)->get();
        $this->categories= CasteCategory::where('is_active',1)->get();
        $this->roles= Roletype::where('status',1)->get();
        $this->departments= Departmenttype::where('status',1)->get();
        $this->colleges= College::where('status',1)->get();
    }

    public function render()
    {
        return view('livewire.faculty.faculty')->extends('layouts.faculty')->section('faculty');
    }
}
