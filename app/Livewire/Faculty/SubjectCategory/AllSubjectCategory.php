<?php

namespace App\Livewire\Faculty\SubjectCategory;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Subjectcategory;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Faculty\SubjectCategory\SubjectCategoryExport;

class AllSubjectCategory extends Component
{
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'delete'];

    #[Locked]
    public $subjectcategory_id;
    #[Locked]
    public $delete_id;

    public $subjectcategory;
    public $subjectcategory_shortname;
    public $subjectbucket_type;
    public $is_active;

    public $perPage=10;
    public $search='';
    public $sortColumn="subjectcategory";
    public $sortColumnBy="ASC";
    public $mode='all';
    public $ext;
    public $isDisabled = true;

    protected function rules()
    {
        return [
            'subjectcategory' => ['required', 'string', 'max:255',],
            'subjectcategory_shortname' => ['required', 'string', 'max:10',],
            'subjectbucket_type' => ['required', 'string', 'max:50',],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function messages()
    {
        return [
            'subjectcategory.required' => 'The subject category is required.',
            'subjectcategory.string' => 'The subject category must be a string.',
            'subjectcategory.max' => 'The subject category must not exceed 255 characters.',

            'subjectcategory_shortname.required' => 'The short name for the subject category is required.',
            'subjectcategory_shortname.string' => 'The short name must be a string.',
            'subjectcategory_shortname.max' => 'The short name must not exceed 10 characters.',

            'subjectbucket_type.required' => 'The subject bucket type is required.',
            'subjectbucket_type.string' => 'The subject bucket type must be a string.',
            'subjectbucket_type.max' => 'The subject bucket type must not exceed 50 characters.',
        ];
    }

    public function resetinput()
    {
         $this->subjectcategory = null;
         $this->subjectcategory_shortname = null;
         $this->subjectbucket_type = null;
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
        $subjectcategory = Subjectcategory::create($validatedData);
        if ($subjectcategory) {
            $this->dispatch('alert',type:'success',message:'Subject Category Added Successfully');
            $this->resetinput();
            $this->setmode('all');
        } else {
            $this->dispatch('alert',type:'error',message:'Failed to Subject Category. Please try again.');
        }
    }

    public function edit(Subjectcategory $subjectcategory)
    {
        if ($subjectcategory){
            $this->subjectcategory_id = $subjectcategory->id;
            $this->subjectcategory= $subjectcategory->subjectcategory;
            $this->subjectcategory_shortname= $subjectcategory->subjectcategory_shortname;
            $this->subjectbucket_type= $subjectcategory->subjectbucket_type;
        }else{
            $this->dispatch('alert',type:'error',message:'Subject Category Details Not Found');
        }
        $this->setmode('edit');
    }

    public function update(Subjectcategory $subjectcategory)
    {
        $validatedData = $this->validate();
        if ($subjectcategory) {
            $subjectcategory->update($validatedData);
            $this->dispatch('alert',type:'success',message:'Subject Category Updated Successfully');
        }else{
            $this->dispatch('alert',type:'error',message:'Error To Update Subject Category');
        }
        $this->setmode('all');
    }

    public function delete()
    {
        $subjectcategory = Subjectcategory::withTrashed()->find($this->delete_id);
        if($subjectcategory){
            $subjectcategory->forceDelete();
            $this->delete_id = null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Subject Category Deleted Successfully !!');
        } else {
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');
        }
    }

    public function softdelete($id)
    {
        $subjectcategory = Subjectcategory::withTrashed()->find($id);
        if ($subjectcategory) {
            $subjectcategory->delete();
            $this->dispatch('alert',type:'success',message:'Subject Category Deleted Successfully');
            } else {
                $this->dispatch('alert',type:'error',message:'Subject Category Not Found !');
            }
        $this->setmode('all');
    }

    public function restore($id)
    {
        $subjectcategory = Subjectcategory::withTrashed()->find($id);

        if ($subjectcategory) {
            $subjectcategory->restore();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Subject Category Restored Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Subject Category Not Found');
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
        $filename="SubjectCategories-".time();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new SubjectCategoryExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new SubjectCategoryExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new SubjectCategoryExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }

    }

    public function status(Subjectcategory $subjectcategory)
    {
        if( $subjectcategory->is_active==0)
        {
            $subjectcategory->is_active=1;
        }
        else if( $subjectcategory->is_active==1)
        {
            $subjectcategory->is_active=0;
        }
        $subjectcategory->update();

        $this->dispatch('alert',type:'success',message:'Subject Category Status Updated Successfully !!');
    }

    public function view(Subjectcategory $subjectcategory)
    {
        if ($subjectcategory){
            $this->subjectcategory= $subjectcategory->subjectcategory;
            $this->subjectcategory_shortname= $subjectcategory->subjectcategory_shortname;
            $this->subjectbucket_type= $subjectcategory->subjectbucket_type;
        }else{
            $this->dispatch('alert',type:'error',message:'Subject Category Details Not Found');
        }
        $this->setmode('view');
    }

    public function render()
    {
        $subjectcategories = Subjectcategory::when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.faculty.subject-category.all-subject-category',compact('subjectcategories'))->extends('layouts.faculty')->section('faculty');
    }
}