<?php

namespace App\Livewire\Dropdown;

use App\Models\Country;
use App\Models\District;
use App\Models\State;
use App\Models\Taluka as ModelsTaluka;
use Livewire\Component;

class Taluka extends Component
{
    public $selectedCountry,$selectedState="",$selectedDistrict="";
 

    public $selectedTaluka="";
    public $states,$districts,$talukas;
     
    public function render()
    {

       
        return view('livewire.dropdown.taluka',
        ['countries'=> Country::all(),
        ]
    
    );
    }
    public function updatedSelectedCountry( $country_id){
 
        $this->states=State::where('country_id',$country_id)         
        ->get();
        $this->reset('selectedState','selectedDistrict','selectedTaluka'); 
     
        

    }
    public function updatedSelectedState( $state_id){

        $this->districts=District::where('state_id',$state_id)       
        ->get();
        $this->reset( 'selectedDistrict','selectedTaluka'); 
        

    }
    public function updatedSelectedDistrict( $district_id){
      
        $this->talukas=ModelsTaluka::where('district_id',$district_id)      
        ->get();
 
        $this->reset(  'selectedTaluka'); 

    }
    public function test(){
        dd("test");
    }
   
}
