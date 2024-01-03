<?php

namespace App\Livewire\Student;

use App\Models\Boarduniversity;
use App\Models\Educationalcourse;
use Livewire\Component;
use Illuminate\Support\MessageBag;
 
// use App\Http\Requests\StoreStudenteducationRequest;

class Education extends Component
{
     
    public $obtained_marks;
    public $total_marks;
    public $percentage;
    public $eduactionalcourses;
    public $boards;
    public function mount(){
      $this->eduactionalcourses= Educationalcourse::all();
      $this->boards=  Boarduniversity::all();
    }
   
    public function render()
    {
       
       

        return view('livewire.student.education',);
    }
    public function updatedObtainedmarks($val){
      if($this->total_marks>0 && $this->obtained_marks<=$this->total_marks){
        $this->percentage=round(($this->obtained_marks/$this->total_marks)*100,2);
      }else
      $this->percentage=0;
    }
    public function updatedTotalmarks($val){
        
         
        if($this->total_marks>0 && $this->obtained_marks<=$this->total_marks){
            $this->percentage=round(($this->obtained_marks/$this->total_marks)*100,2);
          }else
          $this->percentage=0;
    }
   
}
