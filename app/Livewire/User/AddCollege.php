<?php

namespace App\Livewire\User;

use App\Models\College;
use Livewire\Component;

class AddCollege extends Component
{
    public $college_name;
    public $college_address;
    public $college_website_url;
    public $college_email;
    public $college_contact_no;
    public $college_logo_path;
    public $sanstha_id;
    public $university_id;
    public $status;
    public function render()
    {
        return view('livewire.user.add-college')->extends('layouts.user')->section('user');
    }
    public function save(){

        dd($this->all());
    }
    public function add(){

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
    }

}
