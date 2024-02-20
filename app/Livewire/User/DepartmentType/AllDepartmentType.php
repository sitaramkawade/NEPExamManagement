<?php

namespace App\Livewire\User\DepartmentType;

use Excel;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Departmenttype;
use App\Exports\User\DepartmentType\ExportDepartmentType;

class AllDepartmentType extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;
    public $departmenttype;
    public $description;
    public $status;
    public $mode='all';
    public $steps=1;
    public $current_step=1;
    #[Locked] 
    public $delete_id;
    #[Locked] 
    public $dept_id;

    public function rules()
    {
        return [
        'departmenttype' => ['required','string','max:255'],
        'description' => ['required','string','max:255'],
        'status' => ['required'],
         ];
    }

    public function messages()
    {   
        $messages = [
            'departmenttype.required' => 'The Department Type field is required.',
            'departmenttype.string' => 'The Department Type must be a string.',
            'departmenttype.max' => 'The  Department Type must not exceed :max characters.',
            'description.required' => 'The Short Name field is required.',
            'description.string' => 'The Short Name must be a string.',
            'description.max' => 'The  Short Name must not exceed :max characters.',
        ];
        return $messages;
    }

    public function resetinput()
    {
        $this->departmenttype=null;
        $this->description=null;
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

    public function add(Departmenttype  $dept ){
        
        $validatedData= $this->validate();
       
        if ($validatedData) {

        $dept->departmenttype = $this->departmenttype;
        $dept->description = $this->description;
        $dept->status = $this->status;
        }
        $dept->save();

        $this->dispatch('alert',type:'success',message:'Added Successfully !!'  );
        $this->setmode('all');
    }

    public function edit(Departmenttype $dept){

        if ($dept) {
            $this->dept_id=$dept->id;
            $this->departmenttype = $dept->departmenttype ;
            $this->description = $dept->description ;
            $this->status = $dept->status ;
            $this->setmode('edit');
        }
    }

    public function update(Departmenttype  $dept){

        $validatedData= $this->validate();
       
        if ($validatedData) {        
            $dept->departmenttype= $this->departmenttype;
            $dept->description= $this->description;
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

    public function delete(Departmenttype  $dept)
    {   
        $dept->delete();
        $this->dispatch('alert',type:'success',message:'Department Type Soft Deleted Successfully !!');
    }

    public function restore($id)
    {   
        $dept = Departmenttype::withTrashed()->find($id);
        $dept->restore();
        $this->dispatch('alert',type:'success',message:'Department Type Restored Successfully !!');
    }

    public function forcedelete()
    {  
        try
        {
        $dept = Departmenttype::withTrashed()->find($this->delete_id);
        $dept->forceDelete();
        $this->dispatch('alert',type:'success',message:'Department Type Deleted Successfully !!');
    } catch
    (\Illuminate\Database\QueryException $e) {

        if ($e->errorInfo[1] == 1451) {

            $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
        } 
    }
    }

    public function Status(Departmenttype $dept)
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
        $filename="Departmenttype-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportDepartmentType($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportDepartmentType($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportDepartmentType($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }  
    }

    public function render()
    {
        $departmenttypes=Departmenttype::select('id','departmenttype','description','status','deleted_at')
        ->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);


        return view('livewire.user.department-type.all-department-type',compact('departmenttypes'))->extends('layouts.user')->section('user');
    }
}
