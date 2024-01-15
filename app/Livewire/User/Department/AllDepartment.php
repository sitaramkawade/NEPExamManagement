<?php

namespace App\Livewire\User\Department;

use Excel;
use App\Models\College;
use Livewire\Component;
use App\Models\Department;
use Livewire\WithPagination;
use App\Exports\User\Department\ExportDepartment;

class AllDepartment extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    public $perPage=10;
    public $search='';
    public $sortColumn="dept_name";
    public $sortColumnBy="ASC";
    public $ext;
    public $delete_id;
    public $mode='all';
    public $dept_name;
    public $short_name;
    public $colleges;
    public $departmenttype;
    public $college_id;
    public $status;
    public $dept_id;
    public $steps=1;
    public $current_step=1;

    
    protected function rules()
    {
        return [
        'dept_name' => ['required','string','max:255'],
        'short_name' => ['required','string','max:255'],
        'departmenttype' => ['required','string','max:255'],
        'college_id' => ['required'],
        'status' => ['required'],
         ];
    }

    public function resetinput()
    {
        $this->dept_name=null;
        $this->short_name=null;
        $this->departmenttype=null;
        $this->college_id=null;
        $this->status=null;   
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

    public function mount()
    {
        $this->colleges = College::all();
           
      
    }
    
    public function add(Department  $dept ){
        
        $validatedData= $this->validate();
       
        if ($validatedData) {

        $dept->dept_name = $this->dept_name;
        $dept->short_name = $this->short_name;
        $dept->departmenttype = $this->departmenttype;
        $dept->college_id = $this->college_id;
        $dept->status = $this->status;
        }
        $dept->save();

        $this->dispatch('alert',type:'success',message:'Added Successfully !!'  );
        $this->setmode('all');
    }

    public function edit(Department $dept){

        if ($dept) {
            $this->dept_id=$dept->id;
            $this->dept_name = $dept->dept_name;     
            $this->short_name = $dept->short_name;
            $this->departmenttype = $dept->departmenttype ;
            $this->college_id = $dept->college_id ;
            $this->status = $dept->status ;
            $this->setmode('edit');
        }
    }

    public function update(Department  $dept){

        $validatedData= $this->validate();
       
        if ($validatedData) {        
            $dept->dept_name= $this->dept_name;
            $dept->short_name= $this->short_name;
            $dept->departmenttype= $this->departmenttype;
            $dept->college_id= $this->college_id;
            $dept->status= $this->status;
        }

        $dept->update();
        $this->dispatch('alert',type:'success',message:'Updated Successfully !!'  );
        $this->setmode('all');
    }

    public function Status(Department $dept)
    {
        if($dept->status)
        {
            $dept->status=0;
        }
        else
        {
            $dept->status=1;
        }
        $dept->update();
    }

    public function export()
    {   
        $filename="Department-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportDepartment($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportDepartment($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportDepartment($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
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
    
    public function render()
    {
        $departments=Department::when($this->search, function ($query, $search) {
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.department.all-department',compact('departments'))->extends('layouts.user')->section('user');
    }
}
