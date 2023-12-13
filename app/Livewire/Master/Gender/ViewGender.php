<?php

namespace App\Livewire\Master\Gender;

use Livewire\Component;
use App\Models\Gendermaster;
use Livewire\WithPagination;

class ViewGender extends Component
{   
    use WithPagination;

    public function mount()
    { 
    }
    public function render()
    {   
        $genders=Gendermaster::where('is_active',1)->paginate(10);
        return view('livewire.master.gender.view-gender',compact('genders'))->extends('layouts.guest')->section('guest');
    }
}
