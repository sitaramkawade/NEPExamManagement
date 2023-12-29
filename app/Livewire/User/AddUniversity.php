<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\University;
use Livewire\WithFileUploads;

class AddUniversity extends Component
{
    use WithFileUploads;
    public $current_step=1;
    public $steps=1;
    public $university_name;
    public $university_address;
    public $university_website_url;
    public $university_email;
    public $university_contact_no;
    public $university_logo_path;
    public $status;

    protected function rules()
    {
        return [
        'university_name' => 'required|string|max:255',
        'university_address' => 'required|string|max:255',
        'university_website_url' => 'required|string|max:255',
        'university_email' => 'required|unique:users,email',
        'university_contact_no' => 'required|max:10',
        'university_logo_path' =>'required','max:250','mimes:png,jpg,jpeg',
        ];
        }

        public function add(){

            $university= new University;
    
           
            $university->university_name= $this->university_name;
            $university->university_address=  $this->university_address;
            $university->university_website_url=  $this->university_website_url;
            $university->university_email= $this->university_email;
            $university->university_contact_no= $this->university_contact_no;
            $university->university_logo_path= $this->university_logo_path;
             $university->status= $this->status==1?0:1;
            
    
            if ($this->university_logo_path) {
               
                $path = 'user/profile/photo/';
                
                $fileName = 'user-' . time(). '.' . $this->university_logo_path->getClientOriginalExtension();
                
               
                $this->university_logo_path->storeAs($path, $fileName, 'public');
              
                $university->university_logo_path = 'storage/' . $path . $fileName;
                $this->reset('university_logo_path');
            }
            
            $university->save();
    
            $this->dispatch('alert',type:'success',message:'Added Successfully !!'  );
           
        }
        

    public function render()
    {
        return view('livewire.user.add-university')->extends('layouts.user')->section('user');
    }
}
