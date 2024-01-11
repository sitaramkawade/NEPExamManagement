<?php

namespace App\Livewire\Faculty\FacultyRole;

use App\Models\Role;
use App\Models\College;
use Livewire\Component;
use App\Models\Roletype;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Exports\Faculty\ExportRole;
use Maatwebsite\Excel\Facades\Excel;

class AllFacultyRole extends Component
{
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'delete'];
    public $role_name;
    public $roletype_id;
    public $college_id;
    public $roletypes;
    public $colleges;
    public $mode='all';
    public $role_id;
    public $delete_id;

    public $perPage=10;
    public $search='';
    public $sortColumn="role_name";
    public $sortColumnBy="ASC";
    public $ext;

    protected function rules()
    {
        return [
            'role_name' => ['required', 'string', 'max:255',],
            'roletype_id' => ['required',Rule::exists(Roletype::class,'id')],
            'college_id' => ['required',Rule::exists(College::class,'id')],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
         $this->role_name=null;
         $this->roletype_id=null;
         $this->college_id=null;
    }

    public function messages()
    {
        return [
            'role_name.string' => 'Please type the role name using letters.',
            'roletype_id.required' => 'Please select the role.',
            'college_id.required' => 'Please select the college.',
        ];
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

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function save()
    {
        $validatedData = $this->validate();
        $role = Role::create($validatedData);
        if ($role) {
            $this->dispatch('alert',type:'success',message:'Role Added Successfully');
            $this->setmode('all');
        } else {
            $this->dispatch('alert',type:'error',message:'Failed to Add Role. Please try again.');
        }
    }

    public function edit(Role $role)
    {
        if ($role){
            $this->role_id = $role->id;
            $this->role_name= $role->role_name;
            $this->roletype_id= $role->roletype_id;
            $this->college_id= $role->college_id;
        }else{
            $this->dispatch('alert',type:'error',message:'Role Details Not Found');
        }
        $this->setmode('edit');
    }

    public function update(Role $role)
    {
        $validatedData = $this->validate();

        if ($role) {
            $role->update($validatedData);
            $this->dispatch('alert',type:'success',message:'Role Updated Successfully');
            $this->setmode('all');
            $this->resetinput();
        }else{
            $this->dispatch('alert',type:'error',message:'Error To Update Role');
        }
    }

    public function delete()
    {
        $role = Role::withTrashed()->find($this->delete_id);
        if($role){
            $role->forceDelete();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'"Role Deleted Successfully !!');
        } else {
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');
        }
        $this->setmode('all');
    }

    public function softdelete($id)
    {
        $role = Role::withTrashed()->findOrFail($id);
        if ($role) {
            $role->delete();
            $this->dispatch('alert',type:'success',message:'Role Deleted Successfully');
            } else {
                $this->dispatch('alert',type:'error',message:'Role Not Found !');
            }
        $this->setmode('all');
    }

    public function restore($id)
    {
        $role = Role::withTrashed()->find($id);

        if ($role) {
            $role->restore();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Role Restored Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Role Not Found');
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
        $filename="Role-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportRole($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportRole($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportRole($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }

    }

    public function mount()
    {
        $this->roletypes = Roletype::all();
        $this->colleges= College::where('status',1)->get();
    }

    public function render()
    {
        $roles = Role::when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.faculty.faculty-role.all-faculty-role' ,compact('roles'))->extends('layouts.faculty')->section('faculty');
    }
}
