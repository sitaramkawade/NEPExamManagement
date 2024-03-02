<?php

namespace App\Livewire\Faculty\FacultyRoleType;

use Livewire\Component;
use App\Models\Roletype;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Faculty\FacultyRoleType\FacultyRoleTypeExport;

class AllFacultyRoleType extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'delete'];

    public $roletype_name;

    #[Locked]
    public $roletype_id;
    #[Locked]
    public $delete_id;

    public $perPage=10;
    public $search='';
    public $sortColumn="roletype_name";
    public $sortColumnBy="ASC";
    public $mode='all';
    public $ext;

    protected function rules()
    {
        return [
            'roletype_name' => ['required', 'string', 'max:255',],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->roletype_name=null;
    }

    public function messages()
    {
        return [
        'roletype_name.required' => 'The role type name field is required.',
        'roletype_name.string' => 'The role type name must be a string.',
        'roletype_name.max' => 'The role type name must not exceed 255 characters.',
        ];
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function setmode($mode)
    {
        if($mode=='add')
        {
            $this->resetinput();
        }
        if($mode=='edit')
        {
            $this->resetValidation();
        }
        $this->mode=$mode;
    }

    public function save()
    {
        $validatedData = $this->validate();
        $roletype = Roletype::create($validatedData);
        if ($roletype) {
            $this->dispatch('alert',type:'success',message:'Role Type Added Successfully');
            $this->resetinput();
            $this->setmode('all');
        } else {
            $this->dispatch('alert',type:'error',message:'Failed to Add Role Type. Please try again.');
        }
    }

    public function edit(Roletype $roletype)
    {
        if ($roletype){
            $this->roletype_id = $roletype->id;
            $this->roletype_name= $roletype->roletype_name;
        }else{
            $this->dispatch('alert',type:'error',message:'Role Type Details Not Found');
        }
        $this->setmode('edit');
    }

    public function update(Roletype $roletype)
    {
        $validatedData = $this->validate();
        if ($roletype) {
            $roletype->update($validatedData);
            $this->dispatch('alert',type:'success',message:'Role Type Updated Successfully');
        }else{
            $this->dispatch('alert',type:'error',message:'Error To Update Role Type');
        }
        $this->setmode('all');
    }

    public function delete()
    {
        try
        {
            $roletype = Roletype::withTrashed()->find($this->delete_id);
            $roletype->forceDelete();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Roletype Deleted Successfully !!');
        } catch (\Illuminate\Database\QueryException $e) {

            if ($e->errorInfo[1] == 1451) {

                $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
            }
        }
    }

    public function softdelete($id)
    {
        $roletype = Roletype::withTrashed()->find($id);
        if ($roletype) {
            $roletype->delete();
            $this->dispatch('alert',type:'success',message:'Role Type Soft Deleted Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Role Type Not Found !');
        }
    }

    public function restore($id)
    {
        $roletype = Roletype::withTrashed()->find($id);

        if ($roletype) {
            $roletype->restore();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Role Type Restored Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Role Type Not Found');
        }
        $this->setmode('all');
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

    public function export()
    {
        $filename="RoleType-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new FacultyRoleTypeExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new FacultyRoleTypeExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new FacultyRoleTypeExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function status(Roletype $roletype)
    {
        if( $roletype->status==0)
        {
            $roletype->status=1;
        }
        else if( $roletype->status==1)
        {
            $roletype->status=0;
        }
        $roletype->update();

        $this->dispatch('alert',type:'success',message:'Roletype Status Updated Successfully !!');
    }

    public function view(Roletype $roletype)
    {
        if ($roletype){
            $this->roletype_name= $roletype->roletype_name;
        }else{
            $this->dispatch('alert',type:'error',message:'Role Type Details Not Found');
        }
        $this->setmode('view');
    }


    public function render()
    {
        $roletypes = Roletype::when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.faculty.faculty-roletype.all-faculty-roletype',compact('roletypes'))->extends('layouts.faculty')->section('faculty');
    }
}
