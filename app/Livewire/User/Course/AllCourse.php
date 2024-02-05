<?php

namespace App\Livewire\User\Course;

use Excel;
use App\Models\Course;
use App\Models\College;
use Livewire\Component;
use App\Models\Programme;
use Livewire\WithPagination;
use App\Models\Coursecategory;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Exports\User\Course\CourseExport;

class AllCourse extends Component
{   
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    #[Locked] 
    public $delete_id;

    public $mode='all';
    public $perPage=10;
    public $search='';
    public $sortColumn="course_name";
    public $sortColumnBy="ASC";
    public $ext;

    public $course_name;
    public $course_code;
    public $fullname;
    public $course_type;
    public $special_subject;
    public $course_category_id;
    public $college_id;
    public $programme_id;
    public $colleges;
    public $programmes;
    public $courescategories;
    #[Locked] 
    public $edit_id;


    public function rules()
    {
        return [
            'college_id' => ['required', 'integer', Rule::exists('colleges', 'id')],
            'programme_id' => ['required', 'integer', Rule::exists('programmes', 'id')],
            'course_name' => ['required', 'string','max:100',Rule::unique('courses', 'course_name')->ignore($this->edit_id, 'id')],
            'course_code' => ['required', 'string','max:50',Rule::unique('courses', 'course_code')->ignore($this->edit_id, 'id'),],
            'fullname' => ['required', 'string','max:100'],
            'course_type' => ['required', 'string','max:20'],
            'special_subject' => ['required', 'string','max:100'],
            'course_category_id' => ['required', 'integer', Rule::exists('coursecategories', 'id')],
        ];
    }

    public function messages()
    {   
        $messages = [
            'course_name.required' => 'The Course Name field is required.',
            'course_name.string' => 'The Course Name must be a string.',
            'course_name.max' => 'The  Course Name must not exceed :max characters.',
            'course_name.unique' => 'The Course Name has already been taken.',
            'college_id.required' => 'The College field is required.',
            'college_id.exists' => 'The selected College does not exist.',
            'programme_id.required' => 'The Programme field is required.',
            'programme_id.exists' => 'The selected Programme does not exist.',
            'course_code.required' => 'The Course Code is required.',
            'course_code.string' => 'The Course Code must be a string.',
            'course_code.max' => 'The Course Code must not exceed :max characters.',
            'course_code.unique' => 'The Course Code has already been taken.',
            'fullname.required' => 'The Full Name is required.',
            'fullname.string' => 'The Full Name must be a string.',
            'fullname.max' => 'The Full Name must not exceed :max characters.',
            'course_type.required' => 'The Course Type is required.',
            'course_type.string' => 'The Course Type must be a string.',
            'course_type.max' => 'The Course Type must not exceed :max characters.',
            'special_subject.required' => 'The Special Subject is required.',
            'special_subject.string' => 'The Special Subject must be a string.',
            'special_subject.max' => 'The Special Subject must not exceed :max characters.',
            'course_category_id.required' => 'The Course Category is required.',
            'course_category_id.integer' => 'The Course Category must be a Integer.',
            'course_category_id.between' => 'The Course Category  must be between Professional Or Non Professional.',
            'course_category_id.exists' => 'The selected Course Category does not exist.',
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
        $this->course_name= null;
        $this->course_code=null;
        $this->fullname=null;
        $this->course_type=null;
        $this->special_subject=null;
        $this->course_category_id=null;
        $this->college_id=null;
        $this->programme_id=null;
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
        $filename="Course-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new CourseExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new CourseExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new CourseExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function add()
    {
        $this->validate();

        $course =  new Course;
        $course->create([
            'course_name' => $this->course_name,
            'course_code' => $this->course_code,
            'fullname' => $this->fullname,
            'course_type' => $this->course_type,
            'special_subject' => $this->special_subject,
            'course_category_id' => $this->course_category_id,
            'college_id' => $this->college_id,
            'programme_id' => $this->programme_id,
        ]);
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Course Created Successfully !!');
    }


    public function edit(Course $course)
    {   
        $this->resetinput();
        $this->edit_id=$course->id;
        $this->course_name= $course->course_name;
        $this->course_code=$course->course_code;
        $this->fullname=$course->fullname;
        $this->course_type=$course->course_type;
        $this->special_subject=$course->special_subject;
        $this->course_category_id=$course->course_category_id;
        $this->college_id=$course->college_id;
        $this->programme_id=$course->programme_id;
  
        $this->setmode('edit');
    }

    public function update(Course $course)
    {
        $this->validate();

        $course->update([
            'course_name' => $this->course_name,
            'course_code' => $this->course_code,
            'fullname' => $this->fullname,
            'course_type' => $this->course_type,
            'special_subject' => $this->special_subject,
            'course_category_id' => $this->course_category_id,
            'college_id' => $this->college_id,
            'programme_id' => $this->programme_id,
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


    public function delete(Course  $course)
    {   
        $course->delete();
        $this->dispatch('alert',type:'success',message:'Course Soft Deleted Successfully !!');
    }
    
    public function restore($id)
    {   
        $course = Course::withTrashed()->find($id);
        $course->restore();
        $this->dispatch('alert',type:'success',message:'Course Restored Successfully !!');
    }

    public function forcedelete()
    {   
        $course = Course::withTrashed()->find($this->delete_id);
        $course->forceDelete();
        $this->dispatch('alert',type:'success',message:'Course Deleted Successfully !!');
    }

    public function render()
    {   
        $courses=Course::where('college_id',Auth::guard('user')->user()->college_id)->with('programme:programme_name,id','college:college_name,id')->select( 'id','course_name','course_code','fullname','special_subject','course_type','course_category_id','college_id','programme_id','deleted_at')->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);
        
        if($this->mode!=='all')
        {
            $this->colleges=College::select('college_name','id')->where('status',1)->get();
            $this->programmes =Programme::select('programme_name','id')->where('active',1)->get();
            $this->courescategories =Coursecategory::select('course_category','id')->get();
        }

        return view('livewire.user.course.all-course',compact('courses'))->extends('layouts.user')->section('user');
    }
}
