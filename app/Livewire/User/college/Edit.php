<?php

namespace App\Livewire\User\college;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\College;
use App\Models\Sanstha;
use App\Models\University;

class Edit extends Component
{
     use WithFileUploads;

    public $steps=1;
    public $current_step=1;
  
    public $college_name;
    public $college_address;
    public $college_website_url;
    public $college_email;
    public $college_contact_no;
    public $college_logo_path;
    public $college_logo_path_old;
    public $sanstha_id;
    public $sansthas;
    public $university_id;
    public $universities;
    public $status;
    public $college_id;


    protected function rules()
    {
        return [
            'college_name' => ['required','string', 'max:255',],
            'college_address' => ['required','string', 'max:255',],
            'college_website_url' => ['required','string', 'max:255',],
            'college_email' => ['required','email', 'string',],
            'college_contact_no' => ['required','numeric','digits:10'],
            'college_logo_path' => ['required','max:1024','mimes:jpeg,pdf,jpg'],
            'sanstha_id' => ['required',],
            'university_id' => ['required',],
           
        ];
    }

    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
         $this->college_name=null;
         $this->college_email=null;
         $this->college_address=null;
         $this->college_contact_no=null;
         $this->college_website_url=null;
         $this->college_logo_path_old=null;
         $this->sanstha_id=null;
         $this->university_id=null;
         $this->status=null;
       
    }


    public function messages()
    {
        return [
            'college_name.string' =>'Please enter a college name as string',
            'college_email.email' =>'Please enter a valid email address',
            'college_address.required' =>'Please enter a college address',
            'college_contact_no.required' =>'Please enter a Mobile number',
            'college_website_url.required' =>'Please enter a valid website url',
            'college_logo_path.required' =>'Please Choose image',
            'college_sanstha_id.required' =>'Please enter a sanstha',
            'college_university_id.required' =>'Please enter a university',
        ];
    }
   
    public function mount($id)
    {

       
        $this->edit($id);
        $this->college_id = $id;
        $this->sansthas = Sanstha::all();
        $this->universities = University::all();
    }

    public function edit($id){

        $college = College::find($id);
      

        if ($college) {
            $this->college_id=$college->id;
            $this->college_name = $college->college_name;
            $this->college_email = $college->college_email;
            $this->college_contact_no = $college->college_contact_no;
            $this->college_website_url = $college->college_website_url;
            $this->college_logo_path_old = $college->college_logo_path;
            $this->college_address = $college->college_address;
            $this->sanstha_id = $college->sanstha_id;
            $this->university_id = $college->university_id;
            $this->status = $college->status ;
          
           
            
        }
    }

    public function updateCollege(College  $college){

        $validatedData = $this->validate();
       
        if ($validatedData) {
          
            $college->update([
                
                
                'college_name' => $this->college_name,
                'college_email' => $this->college_email,
                'college_address' => $this->college_address,
                'college_contact_no' => $this->college_contact_no,
                'college_website_url' => $this->college_website_url,
                'college_logo_path' => $this->college_logo_path,
            
                'sanstha_id' => $this->sanstha_id,
                'university_id' => $this->university_id,
                'status' => $this->status==1?0:1,
                     
            ]);
          

            $this->dispatch('alert',type:'success',message:'Updated Successfully !!'  );
            return $this->redirect('/user/view_college',navigate:true);
           
    }
    }


    public function render()
    {
        return view('livewire.user.college.edit')->extends('layouts.user')->section('user');
    }
}
