<?php

namespace App\Livewire\User;

use App\Models\Sanstha;
use Livewire\Component;

class EditSanstha extends Component
{

    public $current_step=1;
    public $steps=1;
    public $sanstha_name;
    public $sanstha_chairman_name;
    public $sanstha_address;
    public $sanstha_contact_no;
    public $sanstha_website_url;
    public $status;

    protected function rules()
    {
        return [
            'sanstha_name' => ['required','string', 'max:255',],
            'sanstha_chairman_name' => ['required','string', 'max:255',],
            'sanstha_address' => ['required','string', 'max:255',],
            'sanstha_website_url' => ['required','string', 'max:255',],
            'sanstha_contact_no' => ['required','numeric','digits:10'],
           
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
         $this->sanstha_name=null;
         $this->sanstha_chairman_name=null;
         $this->sanstha_address=null;
         $this->sanstha_contact_no=null;
         $this->sanstha_website_url=null;
         $this->status=null;
       
    }

    public function messages()
    {
        return [
            'sanstha_name.string' =>'Please enter a college name as string',
            'sanstha_chairman_name.string' =>'Please enter a college name as string',
            'sanstha_address.required' =>'Please enter a college address',
            'sanstha_contact_no.required' =>'Please enter a Mobile number',
            'sanstha_website_url.required' =>'Please enter a valid website url',
            
        ];
    }

    public function mount($id)
    {

       
        $this->edit($id);
        $this->sanstha_id = $id;
      
    }

    public function edit($id){

        $sanstha = Sanstha::find($id);
      

        if ($sanstha) {
            $this->sanstha_id=$sanstha->id;
            $this->sanstha_name = $sanstha->sanstha_name;
            $this->sanstha_chairman_name = $sanstha->sanstha_chairman_name;
            $this->sanstha_contact_no = $sanstha->sanstha_contact_no;
            $this->sanstha_website_url = $sanstha->sanstha_website_url;
            $this->sanstha_address = $sanstha->sanstha_address;
            $this->status = $sanstha->status==0?true:0;          
            
        }
    }

    public function updateSanstha(Sanstha  $sanstha){

        $validatedData = $this->validate();
       
        if ($validatedData) {
          
            $sanstha->update([
                
                
                'sanstha_name' => $this->sanstha_name,
                'sanstha_chairman_name' => $this->sanstha_chairman_name,               
                'sanstha_address' => $this->sanstha_address,
                'sanstha_contact_no' => $this->sanstha_contact_no,
                'sanstha_website_url' => $this->sanstha_website_url,                
                'status' => $this->status==1?0:1,
                     
            ]);
          

            $this->dispatch('alert',type:'success',message:'Updated Successfully !!'  );
            return $this->redirect('/user/view_Sanstha',navigate:true);
           
    }
    }

    


    public function render()
    {
        return view('livewire.user.edit-sanstha')->extends('layouts.user')->section('user');
    }
}
