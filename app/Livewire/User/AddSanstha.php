<?php

namespace App\Livewire\User;

use App\Models\Sanstha;
use Livewire\Component;

class AddSanstha extends Component
{

    public $steps=1;
    public $current_step=1;
    public $sanstha_name;
    public $sanstha_address;
    public $sanstha_chairman_name;
    public $sanstha_website_url;
    public $sanstha_contact_no;
    public $status;

    protected function rules()
    {
        return [
        'sanstha_name' => 'required|string|max:255',
        'sanstha_chairman_name' => 'required|string|max:255',
        'sanstha_address' => 'required|string|max:255',
        'sanstha_website_url' => 'required|string|max:255',
        'sanstha_contact_no' => 'required|max:10',   
        ];
    }

    public function resetInputFields()
    {
        // Reset the specified properties to their initial state
        $this->reset(['sanstha_name', 'sanstha_chairman_name','sanstha_address','sanstha_contact_no','sanstha_website_url','status']);
    }

    public function addSanstha(){

        $sanstha= new Sanstha;

       
        $sanstha->sanstha_name= $this->sanstha_name;
        $sanstha->sanstha_chairman_name= $this->sanstha_chairman_name;
        $sanstha->sanstha_address=  $this->sanstha_address;
        $sanstha->sanstha_website_url=  $this->sanstha_website_url;
        $sanstha->sanstha_contact_no= $this->sanstha_contact_no;
        $sanstha->status= $this->status==1?0:1;
        $sanstha->save();

        $this->dispatch('alert',type:'success',message:'Added Successfully !!'  );
        $this->resetInputFields();
    }




    public function render()
    {
        return view('livewire.user.add-sanstha')->extends('layouts.user')->section('user');
    }
}
