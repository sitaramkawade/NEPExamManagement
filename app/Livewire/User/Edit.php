<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\College;
use App\Models\Sanstha;
use App\Models\University;

class Edit extends Component
{ use WithFileUploads;

    public $steps=1;
    public $current_step=1;
    public $college_name;
    public $college_address;
    public $college_website_url;
    public $college_email;
    public $college_contact_no;
    public $college_logo_path;
    public $sanstha_id;
    public $sansthas;
    public $university_id;
    public $universities;
    public $status;
    public $btn_add = false;

   


    


    public function mount($college_name)
    {
        $college = College::find($college_name);

        if ($college) {
            $this->college_name = $college->college_name;
            $this->college_email = $college->college_email;
            $this->college_contact_no = $college->college_contact_no;
            $this->college_website_url = $college->college_website_url;
            $this->college_logo_path = $college->college_logo_path;
            $this->college_address = $college->college_address;
            $this->sanstha_id = $college->sanstha_id;
            $this->university_id = $college->university_id;
            $this->status = $college->status;
            
        }

        $this->sansthas = Sanstha::get('sanstha_name', 'id');
        $this->universities = University::get('university_name', 'id');
    }

    public function updateCollege(){

        $college = College::find($this->college_name);

        if ($college) {
            $college->update([
                'college_name' => $this->college_name,
                'college_email' => $this->college_email,
                'college_address' => $this->college_address,
                'college_contact_no' => $this->college_contact_no,
                'college_website_url' => $this->college_website_url,
                'college_logo_path' => $this->college_logo_path,
                'sanstha_id' => $this->sanstha_id,
                'university_id' => $this->university_id,
                'status' => $this->status,
               
                
            ]);
            session()->flash('message', 'College information updated successfully.');
            $this->reset(); // Clear input fields after update
    }
    }


    public function render()
    {
        return view('livewire.user.edit')->extends('layouts.user')->section('user');
    }
}
