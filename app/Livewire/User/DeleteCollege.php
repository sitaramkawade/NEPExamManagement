<?php

namespace App\Livewire\User;

use Livewire\Component;

class DeleteCollege extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id=$id;
    }

    public function deleteCollege()
    {
        $college = College::find($this->id);

        if ($college) {
            $college->delete();
            session()->flash('message', 'College deleted successfully.');
        } else {
            session()->flash('message', 'College not found.');
        }
    }
    public function render()
    {
        return view('livewire.user.delete-college')->extends('layouts.user')->section('user');
    }
}
