<?php

namespace App\Livewire\Faculty\SubjectType;

use Livewire\Component;
use App\Models\Subjecttype;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Faculty\SubjectType\SubjectTypeExport;

class AllSubjectType extends Component
{
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'delete'];
    public $subjecttype_id;
    public $type_name;
    public $type_shortname;
    public $active;

    public $mode='all';
    public $per_page = 10;
    public $delete_id;

    public $perPage=10;
    public $search='';
    public $sortColumn="type_name";
    public $sortColumnBy="ASC";
    public $ext;
    public $isDisabled = true;


    protected function rules()
    {
        return [
            'type_name' => ['required', 'string', 'min:2','max:255',],
            'type_shortname' => ['required', 'string', 'min:2','max:10',],
            'active' => ['required', 'in:0,1',],
        ];
    }

    public function messages()
    {
        return [
            'type_name.required' => 'The type name is required.',
            'type_name.string' => 'The type name must be a string.',
            'type_name.min' => 'The type name must be at least :min characters.',
            'type_name.max' => 'The type name must not exceed :max characters.',

            'type_shortname.required' => 'The type short name is required.',
            'type_shortname.string' => 'The type short name must be a string.',
            'type_shortname.min' => 'The type short name must be at least :min characters.',
            'type_shortname.max' => 'The type short name must not exceed :max characters.',

            'active.required' => 'The status is required.',
            'active.in' => 'The status must be either Inactive or Active.',
        ];
    }

    public function resetinput()
    {
         $this->type_name = null;
         $this->type_shortname = null;
         $this->status = null;
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
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
        $subjecttype = Subjecttype::create($validatedData);
        if ($subjecttype) {
            $this->dispatch('alert',type:'success',message:'Subject Type Added Successfully');
            $this->resetinput();
            $this->setmode('all');
        } else {
            $this->dispatch('alert',type:'error',message:'Failed to Add Subject Type.');
        }
    }

    public function edit(Subjecttype $subjecttype)
    {
        if ($subjecttype){
            $this->subjecttype_id = $subjecttype->id;
            $this->type_name= $subjecttype->type_name;
            $this->type_shortname= $subjecttype->type_shortname;
            $this->active= $subjecttype->active;
        }else{
            $this->dispatch('alert',type:'error',message:'Subject Type Details Not Found');
        }
        $this->setmode('edit');
    }

    public function update(Subjecttype $subjecttype)
    {
        $validatedData = $this->validate();
        if ($subjecttype) {
            $subjecttype->update($validatedData);
            $this->dispatch('alert',type:'success',message:'Subject Type Updated Successfully');
        }else{
            $this->dispatch('alert',type:'error',message:'Error To Update Subject Type');
        }
        $this->setmode('all');
    }

    public function delete()
    {
        $subjecttype = Subjecttype::withTrashed()->find($this->delete_id);
        if($subjecttype){
            $subjecttype->forceDelete();
            $this->delete_id = null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Subject Type Deleted Successfully !!');
        } else {
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');
        }
    }

    public function softdelete($id)
    {
        $subjecttype = Subjecttype::withTrashed()->find($id);
        if ($subjecttype) {
            $subjecttype->delete();
            $this->dispatch('alert',type:'success',message:'Subject Type Deleted Successfully');
            } else {
                $this->dispatch('alert',type:'error',message:'Subject Type Not Found !');
            }
        $this->setmode('all');
    }

    public function restore($id)
    {
        $subjecttype = Subjecttype::withTrashed()->find($id);

        if ($subjecttype) {
            $subjecttype->restore();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Subject Type Restored Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Subject Type Not Found');
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
        $filename="Roletype-".time();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new SubjectTypeExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new SubjectTypeExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new SubjectTypeExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }

    }

    public function changestatus(Subjecttype $subjecttype)
    {
        if( $subjecttype->active==0)
        {
            $subjecttype->active=1;
        }
        else if( $subjecttype->active==1)
        {
            $subjecttype->active=0;
        }
        $subjecttype->update();

        $this->dispatch('alert',type:'success',message:'Subject Type Status Updated Successfully !!');
    }

    public function view(Subjecttype $subjecttype)
    {
        if ($subjecttype){
            $this->type_name= $subjecttype->type_name;
            $this->type_shortname= $subjecttype->type_shortname;
            $this->active= $subjecttype->active;
        }else{
            $this->dispatch('alert',type:'error',message:'Subject Type Details Not Found');
        }
        $this->setmode('view');
    }

    public function render()
    {
        $subjecttypes = Subjecttype::when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.faculty.subject-type.all-subject-type',compact('subjecttypes'))->extends('layouts.faculty')->section('faculty');
    }
}
