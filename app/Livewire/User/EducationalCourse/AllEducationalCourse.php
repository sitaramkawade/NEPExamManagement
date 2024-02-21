<?php

namespace App\Livewire\User\EducationalCourse;

use Excel;
use Livewire\Component;
use App\Models\Programme;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Models\Educationalcourse;
use App\Exports\User\EducationalCourse\ExportEducationalCourse;


class AllEducationalCourse extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;
    public $delete_id;
    public $programme_id;
    public $course_id;
    public $course_name;
    public $is_active;
    public $programs;
    public $mode='all';
    public $steps=1;
    public $current_step=1;

    public function rules()
    {
        return [
        'course_name' => ['required','string','max:255'],
        'programme_id' => ['required',Rule::exists('programmes', 'id')],
        'is_active' => ['required'], 
         ];
    }

    public function messages()
    {   
        $messages = [
            'course_name.required' => 'The Course Name field is required.',
            'course_name.string' => 'The Course Name must be a string.',
            'course_name.max' => 'The  Course Name must not exceed :max characters.',
            'programme_id.required' => 'The Programme field is required.',
            'programme_id.exists' => 'The selected Programme does not exist.',
        ];
        return $messages;
    }

    public function resetinput()
    {
        $this->course_name=null;
        $this->programme_id=null;
        $this->is_active=null;
      
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function setmode($mode)
    {
        if($mode=='add')
        {
            $this->resetinput();
        }
        $this->mode=$mode;
    }

    public function add(Educationalcourse  $educationalCourse ){
        
        $validatedData= $this->validate();
       
        if ($validatedData) {

        $educationalCourse->course_name= $this->course_name;
        $educationalCourse->programme_id=  $this->programme_id;
        $educationalCourse->is_active=  $this->is_active;
        }
        $educationalCourse->save();

        $this->dispatch('alert',type:'success',message:'Added Successfully !!'  );
        $this->setmode('all');
    }

    public function Status(Educationalcourse $educationalCourse)
    {
        if($educationalCourse->is_active)
        {
            $educationalCourse->is_active=0;
        }
        else
        {
            $educationalCourse->is_active=1;
        }
        $educationalCourse->update();
    }

    public function edit(Educationalcourse $educationalCourse){

        if ($educationalCourse) {
            $this->course_id=$educationalCourse->id;
            $this->course_name = $educationalCourse->course_name;     
            $this->programme_id = $educationalCourse->programme_id;
            $this->is_active = $educationalCourse->is_active ;
            $this->setmode('edit');
        }
    }

    public function update(Educationalcourse  $educationalCourse){

        $validatedData= $this->validate();
       
        if ($validatedData) {        
            $educationalCourse->course_name= $this->course_name;
            $educationalCourse->programme_id= $this->programme_id;
            $educationalCourse->is_active= $this->is_active;
        }

        $educationalCourse->update();
        $this->dispatch('alert',type:'success',message:'Updated Successfully !!'  );
        $this->setmode('all');
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function delete(Educationalcourse  $educationalCourse)
    {   
        $educationalCourse->delete();
        $this->dispatch('alert',type:'success',message:'Educational Course Soft Deleted Successfully !!');
    }

    public function restore($id)
    {   
        $educationalCourse = Educationalcourse::withTrashed()->find($id);
        $educationalCourse->restore();
        $this->dispatch('alert',type:'success',message:'Educational Course Restored Successfully !!');
    }

    public function forcedelete()
    {  
        try
        { 
        $educationalCourse = Educationalcourse::withTrashed()->find($this->delete_id);
        $educationalCourse->forceDelete();
        $this->dispatch('alert',type:'success',message:'Course Deleted Successfully !!');
    } catch
    (\Illuminate\Database\QueryException $e) {

        if ($e->errorInfo[1] == 1451) {

            $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
        } 
    }
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

    public function export()
    {   
        $filename="EducationalCourses-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportEducationalCourse($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportEducationalCourse($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportEducationalCourse($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function render()
    {
        $this->programs=Programme::where('active',1)->pluck('programme_name','id');
        
        $educationalCourses=Educationalcourse::select('id','course_name','programme_id','is_active','deleted_at')
        ->with(['programme:programme_name,id'])
        ->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.educational-course.all-educational-course',compact('educationalCourses'))->extends('layouts.user')->section('user');
    }
}
