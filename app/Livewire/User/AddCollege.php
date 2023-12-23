<?php

namespace App\Livewire\User;

use App\Models\College;
use Livewire\Component;
use App\Models\Sanstha;
use App\Models\University;
use Livewire\WithFileUploads;

class AddCollege extends Component
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
    public $sign_photo_path;
    public $sanstha_id;
    public $sansthas;
    public $university_id;
    public $universities;
    public $status;
    public $btn_add = false;


    protected function rules()
    {
        return [
        'college_name' => 'required|string|max:255',
        'college_address' => 'required|string|max:255',
        'college_website_url' => 'required|string|max:255',
        'college_email' => 'required|unique:users,email',
        'college_contact_no' => 'required|max:10',
        'college_logo_path' =>'required','max:250','mimes:png,jpg,jpeg',
        'sanstha_id' => 'required',
        'university_id' => 'required',
        'status'=>'required'
        ];
        }

    public function add(){

        $college= new College;

        if ($this->college_logo_path) {
            if ($college->college_logo_path) {
                File::delete($college->college_logo_path);
            }
            $path = 'user/profile/photo/';
            $fileName = 'user-' . time(). '.' . $this->college_logo_path->getClientOriginalExtension();
            $this->college_logo_path->storeAs($path, $fileName, 'public');
          
            $college->college_logo_path = 'storage/' . $path . $fileName;
            $this->reset('college_logo_path');
        }
        $college->college_name= $this->college_name;
        $college->college_address=  $this->college_address;
        $college->college_website_url=  $this->college_website_url;
        $college->college_email= $this->college_email;
        $college->college_contact_no= $this->college_contact_no;
        $college->college_logo_path= $this->college_logo_path;
        $college->sanstha_id= $this->sanstha_id;
        $college->university_id= $this->university_id;
        $college->status= $this->status;
        $college->save();

        $this->dispatch('alert',type:'success',message:'Added Successfully !!'  );
       
    }
    

    public function mount()
    {
        $this->sansthas = Sanstha::all();
        $this->universities = University::all();
    }

    

    public function render()
    {
        return view('livewire.user.add-college')->extends('layouts.user')->section('user');
    }

}
