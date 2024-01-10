<?php

namespace App\Livewire\Faculty\FacultyRoleType;

use Livewire\Component;
use App\Models\Roletype;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Faculty\ExportRoletype;

class AllFacultyRoletype extends Component
{
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'delete'];
    public $roletype_name;
    public $roletype_id;
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
            'roletype_name.string' => 'Please type the role type name using letters.',
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
        $roletype = Roletype::withTrashed()->find($this->delete_id);
        if($roletype){
            $roletype->forceDelete();
            $this->delete_id = null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'"Roletype Deleted Successfully !!');
        } else {
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');
        }
    }

    public function softdelete($id)
    {
        $roletype = Roletype::withTrashed()->find($id);
        if ($roletype) {
            $roletype->delete();
            $this->dispatch('alert',type:'success',message:'Role Type Deleted Successfully');
            } else {
                $this->dispatch('alert',type:'error',message:'Role Type Not Found !');
            }
        $this->setmode('all');
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
        $filename="Roletype-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportRoletype($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportRoletype($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportRoletype($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }

    }

    public function render()
    {
        $roletypes = Roletype::when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.faculty.faculty-roletype.all-faculty-roletype',compact('roletypes'))->extends('layouts.faculty')->section('faculty');
    }
}
