<?php

namespace App\Livewire\User\Home;

use Livewire\Component;

class UserHome extends Component
{
    public function render()
    {
        return view('livewire.user.home.user-home')->extends('layouts.user')->section('user');
    }
}
