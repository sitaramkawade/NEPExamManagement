<?php

namespace App\Livewire\User\Department;

use Excel;
use App\Models\College;
use Livewire\Component;
use App\Models\Department;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Exports\User\Department\ExportDepartment;

class AllDepartment extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;
    public $mode='all';
    public $dept_name;
    public $short_name;
    public $colleges;
    public $departmenttype;
    public $college_id;
    public $status;
    #[Locked] 
    public $dept_id;
    public $steps=1;
    public $current_step=1;
    #[Locked] 
    public $delete_id;

    
    public function rules()
    {
        return [
        'dept_name' => ['required','string','max:50'],
        'short_name' => ['required','string','max:50'],
        'departmenttype' => ['required','string','max:255'],
        'college_id' => ['required',Rule::exists('colleges', 'id')],
        'status' => ['required'],
         ];
    }

    public function messages()
    {   
        $messages = [
            'dept_name.required' => 'The Department Name field is required.',
            'dept_name.string' => 'The Department Name must be a string.',
            'dept_name.max' => 'The  Department Name must not exceed :max characters.',
            'short_name.required' => 'The Short Name field is required.',
            'short_name.string' => 'The Short Name must be a string.',
            'short_name.max' => 'The  Short Name must not exceed :max characters.',
            'departmenttype.required' => 'The Department Type field is required.',
            'college_id.required' => 'The College field is required.',
            'college_id.exists' => 'The selected Programme does not exist.',
        ];
        return $messages;
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

    
    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }
    
    
    public function delete(Department  $dept)
    {   
        $dept->delete();
        $this->dispatch('alert',type:'success',message:'Department Soft Deleted Successfully !!');
    }
    
    public function restore($id)
    {   
        $dept = Department::withTrashed()->find($id);
        $dept->restore();
        $this->dispatch('alert',type:'success',message:'Department Restored Successfully !!');
    }
    
    public function forcedelete()
    {  
        $dept = Department::withTrashed()->find($this->delete_id);
        $dept->forceDelete();
        $this->dispatch('alert',type:'success',message:'Department Deleted Successfully !!');
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
        $this->colleges=College::select('college_name','id')->where('status',1)->get();

        $departments=Department::select('id','dept_name','short_name','departmenttype','college_id','status','deleted_at')
       ->with('college:college_name,id')
        ->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.department.all-department',compact('departments'))->extends('layouts.user')->section('user');
    }
}
