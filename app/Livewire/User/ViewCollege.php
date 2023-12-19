<?php

namespace App\Livewire\User;

use App\Models\College;
use Livewire\Component;

class ViewCollege extends Component
{
    public $colleges = null;

    public function mount()
    {
        $this->colleges = College::get();
    }

    public function render()
    {
        return view('livewire.user.view-college')->extends('layouts.user')->section('user');;
    }
}
