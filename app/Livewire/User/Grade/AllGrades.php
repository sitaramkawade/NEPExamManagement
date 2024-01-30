<?php

namespace App\Livewire\User\Grade;

use Excel;
use App\Models\Grade;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\User\Grade\ExportGrade;

class AllGrades extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;
    #[Locked] 
    public $delete_id;
    public $max_percentage;
    public $min_percentage;
    public $grade_point;
    public $grade_name;
    #[Locked] 
    public $grade_id;
    public $description;
    public $is_active;
    public $mode='all';
    public $steps=1;
    public $current_step=1;

    protected function rules()
    {
        return [
        'max_percentage' => ['required',],
        'min_percentage' => ['required'],
        'grade_point' => ['required'],
        'grade_name' => ['required','max:5'],
        'description' => ['required','max:50'],
        'is_active' => ['required'],
       
         ];
    }

    public function messages()
    {   
        $messages = [
            'max_percentage.required' => 'The Maximum Percentage field is required.',
            'min_percentage.required' => 'The Minimum Percentage field is required.',
            'grade_point.required' => 'The Grade Point field is required.',
            'grade_name.required' => 'The Grade Name Field is required',
            'grade_name.max' => 'The Grade must not exceed :max characters.',
            'description.required' => 'The Description field is required.',
            'description.max' => 'The Description must not exceed :max characters.',
        ];
        return $messages;
    }

    public function resetinput()
    {
        $this->max_percentage=null;
        $this->min_percentage=null;
        $this->grade_point=null;
        $this->grade_name=null;
        $this->description=null;
        $this->is_active=null;     
    }

    public function add()
    { 
        $validatedData = $this->validate();
       
        if ($validatedData) {

        $grade= new Grade;
        $grade->max_percentage= $this->max_percentage;
        $grade->min_percentage= $this->min_percentage;
        $grade->grade_point=  $this->grade_point;
        $grade->grade_name=  $this->grade_name;
        $grade->description= $this->description;
        $grade->is_active= $this->is_active==1?0:1;
        $grade->save();

        $this->dispatch('alert',type:'success',message:'Added Successfully !!'  );
        $this->setmode('all');
        }
    }

    public function edit(Grade $grade ){

        if ($grade) {
            $this->grade_id=$grade->id;
            $this->max_percentage = $grade->max_percentage;
            $this->min_percentage = $grade->min_percentage;
            $this->grade_point = $grade->grade_point;
            $this->grade_name = $grade->grade_name;
            $this->description = $grade->description;
            $this->is_active = $grade->is_active;          
            $this->setmode('edit');
        }
    }

    public function update(Grade  $grade){

        $validatedData = $this->validate();
       
        if ($validatedData) {
                   
            $grade->update([
                              
                'max_percentage' => $this->max_percentage,
                'min_percentage' => $this->min_percentage,               
                'grade_point' => $this->grade_point,
                'grade_name' => $this->grade_name,
                'description' => $this->description,                
                'is_active' => $this->is_active,
                     
            ]);

            $this->dispatch('alert',type:'success',message:'Updated Successfully !!'  );
            $this->setmode('all');        
        }
    }

    
    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function delete(Grade  $grade)
    {   
        $grade->delete();
        $this->dispatch('alert',type:'success',message:'Grade Soft Deleted Successfully !!');
    }

    public function restore($id)
    {   
        $grade = Grade::withTrashed()->find($id);
        $grade->restore();
        $this->dispatch('alert',type:'success',message:'Grade Restored Successfully !!');
    }

    public function forcedelete()
    {   
        $grade = Grade::withTrashed()->find($this->delete_id);
        $grade->forceDelete();
        $this->dispatch('alert',type:'success',message:'Grade Deleted Successfully !!');
    }


    
    public function export()
    {   
        $filename="Grade-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportGrade($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportGrade($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportGrade($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
       
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

    public function Status(Grade $grade)
    {
        if($grade->is_active)
        {
            $grade->is_active=0;
        }
        else
        {
            $grade->is_active=1;
        }
        $grade->update();
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


    public function render()
    {
        $grades=Grade::select('id','max_percentage','min_percentage','grade_point','grade_name','description','is_active','deleted_at')
        ->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.grade.all-grades',compact('grades'))->extends('layouts.user')->section('user');
    }
}
