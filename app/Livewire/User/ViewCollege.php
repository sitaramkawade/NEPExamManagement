<?php

namespace App\Livewire\User;

use App\Models\College;
use Livewire\Component;
use Livewire\WithPagination;

class ViewCollege extends Component
{
    use WithPagination;
    


    public function mount()
    {
      
    }

    public function render()
    {
        $colleges = College::paginate(10);
        return view('livewire.user.view-college',compact('colleges'))->extends('layouts.user')->section('user');
        
    }

    public function deleteCollege($id)
    {
        College::find($id)->delete();
        $this->mount();
        $this->dispatch('alert',type:'success',message:'Deleted Successfully !!'  );
    }
}
