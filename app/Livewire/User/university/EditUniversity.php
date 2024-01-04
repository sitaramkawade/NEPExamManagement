<?php

namespace App\Livewire\User\university;

use Livewire\Component;
use App\Models\University;
use Livewire\WithFileUploads;

class EditUniversity extends Component
{
    use WithFileUploads;

    public $steps=1;
    public $current_step=1;
    public $university_name;
    public $university_address;
    public $university_website_url;
    public $university_email;
    public $university_contact_no;
    public $university_logo_path;
    public $university_logo_path_old;
    public $status;
    public $university_id;

    protected function rules()
    {
        return [
            'university_name' => ['required','string', 'max:255',],
            'university_address' => ['required','string', 'max:255',],
            'university_website_url' => ['required','string', 'max:255',],
            'university_email' => ['required','email', 'string',],
            'university_contact_no' => ['required','numeric','digits:10'],
            'university_logo_path' => ['required','max:1024','mimes:jpeg,pdf,jpg'],
            
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
         $this->university_name=null;
         $this->university_email=null;
         $this->university_address=null;
         $this->university_contact_no=null;
         $this->university_website_url=null;
         $this->university_logo_path_old=null;
         $this->status=null;
       
    }

    public function messages()
    {
        return [
            'university_name.string' =>'Please enter a college name as string',
            'university_email.email' =>'Please enter a valid email address',
            'university_address.required' =>'Please enter a college address',
            'university_contact_no.required' =>'Please enter a Mobile number',
            'university_website_url.required' =>'Please enter a valid website url',
            'university_logo_path.required' =>'Please Choose image',
         
        ];
    }

    
    public function mount($id)
    {
        $this->edit($id);
        $this->university_id = $id;
       
    }

    public function edit($id){

        $university = University::find($id);
      

        if ($university) {
            $this->university_id=$university->id;
            $this->university_name = $university->university_name;
            $this->university_email = $university->university_email;
            $this->university_contact_no = $university->university_contact_no;
            $this->university_website_url = $university->university_website_url;
            $this->university_logo_path_old = $university->university_logo_path;
            $this->university_address = $university->university_address;
            $this->status = $university->status==0?true:0;
           
        }
    }

    public function updateUniversity(University  $university){

        $validatedData = $this->validate();
       
        if ($validatedData) {
          
            $university->update([
                
                
                'university_name' => $this->university_name,
                'university_email' => $this->university_email,
                'university_address' => $this->university_address,
                'university_contact_no' => $this->university_contact_no,
                'university_website_url' => $this->university_website_url,
                'university_logo_path' => $this->university_logo_path,
                'status' => $this->status==1?0:1,
                     
            ]);
          

            $this->dispatch('alert',type:'success',message:'Updated Successfully !!'  );
            return $this->redirect('/user/view_university',navigate:true);
           
    }
    }


    public function render()
    {
        return view('livewire.user.university.edit-university')->extends('layouts.user')->section('user');
    }
}
