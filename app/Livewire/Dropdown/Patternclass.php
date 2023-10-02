<?php

namespace App\Livewire\Dropdown;

use App\Models\Classyear;
use App\Models\Course;
use App\Models\Department;
use App\Models\Subjectcategory;
use Livewire\Component;

class Patternclass extends Component
{
    public $dept;
     
    public $classyears;
    public $selectedCategory;
    public $courses;
    public $visibility;
    public function mount($deptid)
    {
        $this->dept=Department::find($deptid);
        $this->visibility=null;
        
    }
    public function render()
    {
     //dd($this->courses);//->first()->course_classes->first()->patterns);
     return view('livewire.dropdown.patternclass',[
        'subjectcategories'=>Subjectcategory::where('active','!=','0')
        ->get()
     ]);
    }
    public function updatedSelectedCategory($id)
    {
        $this->visibility=Subjectcategory::where('id',$id)->first()->active;
            if($this->visibility==1)//department classes
            { 
              
                    $this->courses=Course::with(['course_classes.patterns'])
                    ->where('special_subject',$this->dept->dept_name)
                    ->get();
                
            }
            else if($this->visibility==2)//all classes
            {
                
               $this->classyears=Classyear::all();
            }
    }
}
