<?php

namespace App\Livewire\User\CourseClass;

use Excel;
use App\Models\Course;
use App\Models\College;
use Livewire\Component;
use App\Models\Classyear;
use App\Models\Courseclass;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Exports\User\CourseClass\CourseClassExport;

class AllCourseClass extends Component
{   
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    #[Locked] 
    public $delete_id;

    public $mode='all';
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;

    public $nextyearclass_id;
    public $classyear_id;
    public $college_id;
    public $course_id;

    public $colleges;
    public $class_years;
    public $courses;
    public $next_classess;
    #[Locked] 
    public $edit_id;


    public function rules()
    {
        return [
            'college_id' => ['required', 'integer', Rule::exists('colleges', 'id')],
            'course_id' => ['required', 'integer', Rule::exists('courses', 'id')],
            'classyear_id' => ['required', 'integer', Rule::exists('classyears', 'id')],
            'nextyearclass_id' => ['nullable', 'integer', Rule::exists('course_classes', 'id')],
        ];
    }

    public function messages()
    {   
        $messages = [
            'college_id.required' => 'The College is required.',
            'college_id.integer' => 'The College must be a number.',
            'college_id.exists' => 'The selected College is invalid.',

            'course_id.required' => 'The Course is required.',
            'course_id.integer' => 'The Course must be a number.',
            'course_id.exists' => 'The Selected Course is invalid.',
            'course_id.unique' => 'The Combination of College and Course must be unique.',

            'classyear_id.required' => 'The Class Year is required.',
            'classyear_id.integer' => 'The Class Year must be a number.',
            'classyear_id.exists' => 'The selected Class Year is invalid.',

            'nextyearclass_id.required' => 'The Next Year Class is required.',
            'nextyearclass_id.integer' => 'The Next Year Class must be a number.',
            'nextyearclass_id.exists' => 'The selected Next Year Class is'
        ];
        
        return $messages;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->edit_id=null;
        $this->nextyearclass_id= null;
        $this->classyear_id=null;
        $this->college_id=null;
        $this->course_id=null;
    }

    public function sort_column($column)
    {
        if( $this->sortColumn === $column)
        {
            $this->sortColumnBy=($this->sortColumnBy=="ASC")?"DESC":"ASC";
            return;
        }
        $this->sortColumn=$column;
        $this->sortColumnBy=="ASC";
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function setmode($mode)
    {
        if($mode=='add')
        {
            $this->resetinput();
        }
        $this->mode=$mode;
    }

    public function export()
    {
        $filename="Course-Class-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new CourseClassExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new CourseClassExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new CourseClassExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function add()
    {
        $this->validate();

       $course_class =  new Courseclass;
       $course_class->create([
            'nextyearclass_id' => $this->nextyearclass_id,
            'classyear_id' => $this->classyear_id,
            'college_id' => $this->college_id,
            'course_id' => $this->course_id,
        ]);
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Course Created Successfully !!');
    }


    public function edit(Courseclass $course_class)
    {   
        $this->resetinput();
        $this->edit_id=$course_class->id;
        $this->nextyearclass_id=$course_class->nextyearclass_id;
        $this->classyear_id=$course_class->classyear_id;
        $this->college_id=$course_class->college_id;
        $this->course_id=$course_class->course_id;
        $this->setmode('edit');
    }

    public function update(Courseclass $course_class)
    {
        $this->validate();

       $course_class->update([
            'nextyearclass_id' => $this->nextyearclass_id,
            'classyear_id' => $this->classyear_id,
            'college_id' => $this->college_id,
            'course_id' => $this->course_id,
        ]);
       
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Course Updated Successfully !!');

    }


    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }


    public function delete(Courseclass $course_class)
    {   
       $course_class->delete();
        $this->dispatch('alert',type:'success',message:'Course Soft Deleted Successfully !!');
    }
    
    public function restore($id)
    {   
       $course_class = Courseclass::withTrashed()->find($id);
       $course_class->restore();
        $this->dispatch('alert',type:'success',message:'Course Restored Successfully !!');
    }

    public function forcedelete()
    {   
       $course_class = Courseclass::withTrashed()->find($this->delete_id);
       $course_class->forceDelete();
        $this->dispatch('alert',type:'success',message:'Course Deleted Successfully !!');
    }

    public function render()
    {   

        if($this->mode!=='all')
        {
            $this->next_classess=Courseclass::where('course_id',$this->course_id)->get();
            $this->class_years=Classyear::select('classyear_name','id')->where('status',1)->get();
            $this->courses =Course::select('course_name','id')->get();
            $this->colleges =College::select('college_name','id')->where('status',1)->get();
        }

       $course_classes=Courseclass::with(['classyear', 'course', 'courseclass.classyear', 'courseclass.course', 'college'])->select('id','course_id','nextyearclass_id', 'college_id','deleted_at')->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.course-class.all-course-calss',compact('course_classes'))->extends('layouts.user')->section('user');
    }
}
