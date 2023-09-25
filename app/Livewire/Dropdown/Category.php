<?php

namespace App\Livewire\Dropdown;

use App\Models\Caste;
use App\Models\CasteCategory;
use Livewire\Component;

class Category extends Component
{ 
    public $selectedCategory="";
    public $selectedcaste="";
    public $castes="";
    public function render()
    {
      
        return view('livewire.dropdown.category',[
                'categories'=>CasteCategory::all(),
                'selectedcaste'=>"",
        ]);
    }
    public function updatedSelectedCategory( $category_id){

        $this->castes=Caste::where('caste_category_id',$category_id)
        ->where('is_active','1')
        ->get();
       $this->reset('selectedcaste'); 
        

    }
   
}
