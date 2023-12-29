<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class SelectTo extends Component
{
    public $options;
    public $search = '';
    public $key;
    public $value;
    public $table;

    public function mount($table, $key ,$value)
    {
        $this->table = $table;
        $this->key = $key;
        $this->value = $value;

    }

    public function render()
    {   
        
        $Options =DB::table($this->table)->select($this->key ,$this->value)->get();
        return view('livewire.select-to', compact('Options'));
    }

}