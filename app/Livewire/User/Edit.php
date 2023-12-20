<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
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



    public function mount()
    {
        $this->sansthas = Sanstha::get('sanstha_name', 'id');
        $this->universities = University::get('university_name', 'id');
    }
    public function render()
    {
        return view('livewire.user.edit')->extends('layouts.user')->section('user');
    }
}
