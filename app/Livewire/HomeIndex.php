<?php

namespace App\Livewire;

use App\Models\Notice;
use Livewire\Component;
use Livewire\WithPagination;

class HomeIndex extends Component
{   
    use WithPagination;
    public function render()
    {   
        $guest_notices=Notice::where('is_active',1)->whereIn('type', [0, 4])->paginate(10);
        return view('livewire.home-index',compact('guest_notices'))->extends('layouts.guest')->section('guest');
    }
}
