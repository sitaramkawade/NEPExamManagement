<?php

namespace App\Livewire\User\Pattern;

use App\Models\College;
use App\Models\Pattern;
use Livewire\Component;

class AddPattern extends Component

{
    public $current_step=1;
    public $steps=1;
    public $pattern_name;
    public $pattern_startyear;
    public $pattern_valid;
    public $status;
    public $college_id ;
    public $colleges;

    protected function rules()
    {
        return [
        'pattern_name' => 'required|string|max:255',
        'pattern_startyear' => 'required|string|max:4',
        'pattern_valid' => 'required|string|max:4',
        'status' => 'required|',
        'college_id' => 'required|',
        
        ];
        }

    public function resetInputFields()
    {
        // Reset the specified properties to their initial state
        $this->reset(['pattern_name', 'pattern_startyear' ,'pattern_valid','status','college_id']);
    }

    public function addPattern(){

        $pattern= new Pattern;

       
        $pattern->pattern_name= $this->pattern_name;
        $pattern->pattern_startyear= $this->pattern_startyear;
        $pattern->pattern_valid= $this->pattern_valid;
        $pattern->college_id= $this->college_id;
       
        $pattern->status= $this->status==1?0:1;
        $pattern->save();

        $this->dispatch('alert',type:'success',message:'Added Successfully !!'  );
        $this->resetInputFields();
    }

    public function mount()
    {
        $this->colleges = College::all();
       
    }

    

    public function render()
    {
        return view('livewire.user.pattern.add-pattern')->extends('layouts.user')->section('user');
    }
}
