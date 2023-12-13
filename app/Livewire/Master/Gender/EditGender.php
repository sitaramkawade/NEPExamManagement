<?php

namespace App\Livewire\Master\Gender;

use Livewire\Component;
use App\Models\Gendermaster;

class EditGender extends Component
{   
    public function mount(Gendermaster $gendermaster)
    {
        dd($gendermaster);
    }
    public function render()
    {
        return view('livewire.master.gender.edit-gender');
    }
}
