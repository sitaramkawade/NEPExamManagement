<?php

namespace App\Livewire\User;

use App\Models\College;
use Livewire\Component;
use Livewire\WithPagination;

class ViewCollege extends Component
{
    use WithPagination;
    
    public $colleges = null;

    public function mount()
    {
        $this->colleges = College::all();
    }

    public function render()
    {
      
        return view('livewire.user.view-college')->extends('layouts.user')->section('user');
        $this->colleges = College::paginate(10);
    }

    public function deleteCollege($id)
    {
        College::find($id)->delete();
        $this->mount();
        $this->dispatch('alert',type:'success',message:'Deleted Successfully !!'  );
    }
}
