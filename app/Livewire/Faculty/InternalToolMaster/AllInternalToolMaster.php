<?php

namespace App\Livewire\Faculty\InternalToolMaster;

use Livewire\Component;
use Livewire\WithPagination;

class AllInternalToolMaster extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'delete'];

    public $toolname;
    public $course_type;
    public $status;

    #[Locked]
    public $delete_id;
    #[Locked]
    public $internaltool_id;

    public $perPage=10;
    public $search='';
    public $sortColumn="type_name";
    public $sortColumnBy="ASC";
    public $mode='all';
    public $per_page = 10;
    public $ext;

    protected function rules()
    {
        return [
            'toolname' => ['required', 'string', 'min:2', 'max:255',],
            'course_type' => ['required',],
        ];
    }

    public function messages()
    {
        return [
            'toolname.required' => 'The toolname field is required.',
            'toolname.string' => 'The toolname must be a string.',
            'toolname.min' => 'The toolname must be at least :min characters.',
            'toolname.max' => 'The toolname may not be greater than :max characters.',
            'course_type.required' => 'The course type field is required.',
        ];
    }

    public function resetinput()
    {
         $this->toolname = null;
         $this->course_type = null;
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
        dd($validatedData);
        $subjecttype = Subjecttype::create($validatedData);
        if ($subjecttype) {
            $this->dispatch('alert',type:'success',message:'Subject Type Added Successfully');
            $this->resetinput();
            $this->setmode('all');
        } else {
            $this->dispatch('alert',type:'error',message:'Failed to Add Subject Type.');
        }
    }

    public function render()
    {
        return view('livewire.faculty.internal-tool-master.all-internal-tool-master')->extends('layouts.faculty')->section('faculty');
    }
}
