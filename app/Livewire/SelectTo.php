<?php

namespace App\Livewire;

use App\Models\Caste;
use Livewire\Component;

class SelectTo extends Component
{   
    public $selectedOption;
    public $options = [];

    public function mount()
    {
        $this->options = Caste::get('caste_name')->toArray();
    }
    public function render()
    {   
        return view('livewire.select-to');
    }
}
