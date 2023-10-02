<?php

namespace App\Livewire\Dropdown;

use App\Models\Course;
use App\Models\Department;
use App\Models\Patternclass;
use App\Models\Subject;
use App\Models\Subjectcategory;
use Livewire\Component;

class Patternclassbucket extends Component
{
    public $dept;
    public $subjectcategories;
    public $selectedCategory;
    public $selectedPatternclass;
    public $subjects;
    public function mount($deptid)
    {
        $this->dept=Department::find($deptid);
        //$this->subjectcategories=Subjectcategory::where('active','2')
        //->get();
    }
    public function render()
    {
        return view('livewire.dropdown.patternclassbucket',[
        'courses'=>Course::with(['course_classes.patterns'])
            ->where('special_subject',$this->dept->dept_name)
            ->get(),
        ]);
    }
    public function updatedSelectedPatternclass($id)
    {// dd($id);
        $this->reset('subjectcategories'); 
        $this->subjectcategories=Subjectcategory::where('active','2')
        ->get(); 
        //dd($this->subjectcategories);
        $this->reset('selectedCategory'); 
    }
    public function updatedSelectedCategory($id)
    {       //dd($this->selectedPatternclass);
            $patternclass=Patternclass::find($this->selectedPatternclass);
            //dd($patternclass);
            $classidyear=$patternclass->courseclass->classyear_id;
            $this->subjects=Subject::where('classyear_id',$classidyear)
            ->where('subjectcategory_id',$id)->get();
            //dd( $this->subjects);
    }
}
