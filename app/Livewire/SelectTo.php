<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class SelectTo extends Component
{
    public $options;
    public $filter = '';
    public $key;
    public $value;
    public $table;
    public $district_id;

    // public function mount($table, $key ,$value)
    // {
    //     $this->table = $table;
    //     $this->key = $key;
    //     $this->value = $value;

    // }
    
    public function selectDistrict($districtId)
{
    $this->district_id = $districtId;
    $this->emit('districtSelected', $districtId);
}

    public function render()
    {   
        $this->table = 'districts';
        $this->key = 'id';
        $this->value = 'district_name';

        $this->options =DB::table($this->table)->select($this->key ,$this->value)->where($this->value, 'LIKE', '%' . $this->filter . '%')->get();

        return view('livewire.select-to')->extends('layouts.student')->section('student');
    }

}