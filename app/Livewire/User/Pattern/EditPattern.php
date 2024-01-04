<?php

namespace App\Livewire\User\Pattern;

use App\Models\College;
use App\Models\Pattern;
use Livewire\Component;
use App\Livewire\User\Pattern\EditPattern;

class EditPattern extends Component
{
    public $current_step=1;
    public $steps=1;
    public $pattern_name;
    public $pattern_startyear;
    public $pattern_valid;
    public $status;
    public $college_id;
    public $college_name;
    public $colleges;
    public $id;

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

        public function updated($propertyName)
        {
            $this->validateOnly($propertyName);
        }

        
    public function resetInputFields()
    {
        $this->reset(['pattern_name', 'pattern_startyear' ,'pattern_valid','status','college_id']);
    }
    

    public function mount($id)
    {
        $this->edit($id);
        $this->colleges = College::all();
    }

     public function edit($id){
        $pattern=Pattern::find($id);
        
        if($pattern)
        {
            $this->pattern_name=$pattern->pattern_name;
            $this->pattern_startyear=$pattern->pattern_startyear;
            $this->pattern_valid=$pattern->pattern_valid;
            $this->status=$pattern->status;
            $this->college_id=$pattern->college_id;
        }
    }

    public function updatePattern(Pattern  $pattern){

        $validatedData = $this->validate();
       
        if ($validatedData) {
          
            $pattern->update([
                
                
                'pattern_name' => $this->pattern_name,
                'pattern_startyear' => $this->pattern_startyear,
                'pattern_valid' => $this->pattern_valid,
                'college_id' => $this->college_id,
                'status' => $this->status==1?0:1,
                     
            ]);
          

            $this->dispatch('alert',type:'success',message:'Updated Successfully !!'  );
            // return $this->redirect('/user/viewPattern',navigate:true);
           
    }
    }



    public function render()
    {
        return view('livewire.user.pattern.edit-pattern')->extends('layouts.user')->section('user');
    }
}
