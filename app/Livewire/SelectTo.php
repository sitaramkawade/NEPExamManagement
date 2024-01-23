<?php

namespace App\Livewire;

use Livewire\Component;

class SelectTo extends Component
{
    public $district_id;
    public $district_id2;


    public function save()
    {  
        dd($this->district_id,$this->district_id2);
    } 
    public function render()
    {   
        return view('livewire.select-to')->extends('layouts.student')->section('student');
    }

}