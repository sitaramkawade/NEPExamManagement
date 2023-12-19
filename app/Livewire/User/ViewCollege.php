<?php

namespace App\Livewire\User;

use App\Models\College;
use Livewire\Component;

class ViewCollege extends Component
{
    public $colleges = null;

    public function mount()
    {
        $this->colleges = College::get('college_name','college_email','college_address','college_contact_no');
    }

    public function render()
    {
        return view('livewire.user.view-college')->extends('layouts.user')->section('user');;
    }
}
