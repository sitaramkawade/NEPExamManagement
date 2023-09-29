<?php

namespace App\Livewire\Student;

use App\Models\Addresstype;
use App\Models\Country;
use App\Models\District;
use App\Models\State;
use App\Models\Studentaddress;
use App\Models\Taluka;
use App\Models\Village;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Rule; 
use  Illuminate\Support\Facades\DB;
class Address extends Component
{
      
    public $selectedCountry=[];
    public $selectedState=[],$selectedDistrict=[],$selectedTalukas=[];
    public $c_village_name=[], $c_pincode=[], $c_address=[];
 
 public $present=false;
//     #[Rule('required', message: 'Please Provide a valid Village Name')]
//     public $c_village_name;
//     #[Rule('required', message: 'Please provide  a  Pincode')]
//     public $c_pincode;
//     #[Rule('required', message: 'Please provide  a valid Address')]
//         public $c_address;
//     #[Rule('required', message: 'Please Select a Taluka Name')]
//     public $c_taluka_id;
  
 
    public $village ;
    public $states=[],$districts=[],$talukas=[];
    public $todos;

    public $addresstypes=null;
    public $statesp,$districtsp,$talukasp="",$villagep,$p_address,$p_pincode,$p_taluka_id,$p_village_name;
    public function mount(Studentaddress $sa){
       
        if(Auth::user()->studentaddress){
           
            $this->addresstypes=Addresstype::whereNotIn('id',Auth::user()->studentaddress->pluck('addresstype_id'))->get();
        }else
                $this->addresstypes=Addresstype::all();
                 
 
               $this->districts=$this->talukas=$this->states=Addresstype::all()->pluck('0','id');

            

    }
    public function render()
    {
        
        return view('livewire.student.address',
        ['countries'=> Country::all(),
                // 'allstates'=>State::paginate(10),
        ]);
    }

   

    public function updatedSelectedCountry( $country_id){

               
     
  
        $this->states[explode('.',$country_id)[0]]=State::where('country_id',explode('.',$country_id)[1])         
        ->get();
       
     
        

       
    } 
    
    
    
    
    public function updatedSelectedState( $state_id){

        
        $this->districts[explode('.',$state_id)[0]]=District::where('state_id',explode('.',$state_id)[1])   
        ->get();
 
       // $this->reset( 'selectedDistrict',); 
        

    }
     
    public function updatedSelectedDistrict( $district_id){
         
        $this->talukas[explode('.',$district_id)[0]]=Taluka::where('district_id',explode('.',$district_id)[1])           
        ->get();
  
       // $this->reset(  ); 

    }
   
    public function updatedSelectedTaluka( $taluka_id){
      
        $this->village=Village::where('taluka_id',$taluka_id)      
        ->get();
 
     

    }
   

    
    public function save(){
       
           foreach($this->addresstypes as $addresstype )
           {

            
            Auth::user()->studentaddress()->create([
            'taluka_id'=>$this->selectedTalukas[$this->present?1:$addresstype->id],
           'village_name'=> $this->c_village_name[$this->present?1:$addresstype->id],
            'pincode'=>$this->c_pincode[$this->present?1:$addresstype->id],
            'address'=>  $this->c_address[$this->present?1:$addresstype->id],
            'addresstype_id'=>$addresstype->id,
            ]);

           }
           return  redirect('/student/AddressDetails')->with('success', 'Address successfully created.');
   
    }


 
 
}
