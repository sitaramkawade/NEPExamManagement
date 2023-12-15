<?php

namespace App\Livewire\User;

use App\Models\College;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddCollege extends Component
{
    use WithFileUploads;

    public $college_name;
    public $college_address;
    public $college_website_url;
    public $college_email;
    public $college_contact_no;
    public $college_logo_path;
    public $sanstha_id;
    public $university_id;
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
        'college_logo_path'=>'required|file|mimes:png,jpg|max:10240',
        'sanstha_id' => 'required',   
        'university_id' => 'required', 
        'status'=>'required'  
                       
        ];
        }

    public function render()
    {
        return view('livewire.user.add-college')->extends('layouts.user')->section('user');
    }
    public function save(){

        dd($this->all());
    }
    public function add(){
        $this->validate(); 
        $college= new College;
       
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
        $this->btn_add = true;
//Remove fields after submiting the college info
        $this->reset(['college_name','college_address','college_website_url','college_email','college_contact_no','college_logo_path','sanstha_id','university_id','status']);
    }

}
