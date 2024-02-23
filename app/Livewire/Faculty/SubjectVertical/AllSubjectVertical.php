<?php

namespace App\Livewire\Faculty\SubjectVertical;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Subjectvertical;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\SubjectBucketTypeMaster;
use App\Exports\Faculty\SubjectVertical\SubjectVerticalExport;

class AllSubjectVertical extends Component
{
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'delete'];

    #[Locked]
    public $subjectvertical_id;
    #[Locked]
    public $delete_id;

    public $subject_vertical;
    public $subjectvertical_shortname;
    public $subjectbuckettype_id;
    public $subjectbucket_types;
    public $is_active;

    public $perPage=10;
    public $search='';
    public $sortColumn="subject_vertical";
    public $sortColumnBy="ASC";
    public $mode='all';
    public $ext;
    public $isDisabled = true;

    protected function rules()
    {
        return [
            'subject_vertical' => ['required', 'string', 'max:255',],
            'subjectvertical_shortname' => ['required', 'string', 'max:10',],
            'subjectbuckettype_id' => ['required', Rule::exists(SubjectBucketTypeMaster::class,'id')],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function messages()
    {
        return [
            'subject_vertical.required' => 'The subject vertical is required.',
            'subject_vertical.string' => 'The subject vertical must be a string.',
            'subject_vertical.max' => 'The subject vertical must not exceed 255 characters.',

            'subjectvertical_shortname.required' => 'The short name for the subject vertical is required.',
            'subjectvertical_shortname.string' => 'The short name must be a string.',
            'subjectvertical_shortname.max' => 'The short name must not exceed 10 characters.',

            'subjectbuckettype_id.required' => 'The subject bucket type is required.',
            'subjectbuckettype_id.string' => 'The subject bucket type must be a string.',
            'subjectbuckettype_id.max' => 'The subject bucket type must not exceed 50 characters.',
        ];
    }

    public function resetinput()
    {
         $this->subject_vertical = null;
         $this->subjectvertical_shortname = null;
         $this->subjectbuckettype_id = null;
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
        $subjectvertical = Subjectvertical::create($validatedData);
        if ($subjectvertical) {
            $this->dispatch('alert',type:'success',message:'Subject Vertical Added Successfully');
            $this->resetinput();
            $this->setmode('all');
        } else {
            $this->dispatch('alert',type:'error',message:'Failed to Add Subject Vertical. Please try again.');
        }
    }

    public function edit(Subjectvertical $subjectvertical)
    {
        if ($subjectvertical){
            $this->subjectvertical_id = $subjectvertical->id;
            $this->subject_vertical= $subjectvertical->subject_vertical;
            $this->subjectvertical_shortname= $subjectvertical->subjectvertical_shortname;
            $this->subjectbuckettype_id= $subjectvertical->subjectbuckettype_id;
        }else{
            $this->dispatch('alert',type:'error',message:'Subject Vertical Details Not Found');
        }
        $this->setmode('edit');
    }

    public function update(Subjectvertical $subjectvertical)
    {
        $validatedData = $this->validate();
        if ($subjectvertical) {
            $subjectvertical->update($validatedData);
            $this->dispatch('alert',type:'success',message:'Subject Vertical Updated Successfully');
        }else{
            $this->dispatch('alert',type:'error',message:'Error To Update Subject Vertical');
        }
        $this->setmode('all');
    }

    public function delete()
    {
        try
        {
            $subjectvertical = Subjectvertical::withTrashed()->find($this->delete_id);
            $subjectvertical->forceDelete();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Subject Vertical Deleted Successfully !!');
        } catch (\Illuminate\Database\QueryException $e) {

            if ($e->errorInfo[1] == 1451) {

                $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
            }
        }
    }

    public function softdelete($id)
    {
        $subjectvertical = Subjectvertical::withTrashed()->find($id);
        if ($subjectvertical) {
            $subjectvertical->delete();
            $this->dispatch('alert',type:'success',message:'Subject Vertical Deleted Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Subject Vertical Not Found !');
        }
    }

    public function restore($id)
    {
        $subjectvertical = Subjectvertical::withTrashed()->find($id);

        if ($subjectvertical) {
            $subjectvertical->restore();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Subject Vertical Restored Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Subject Vertical Not Found');
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
        $filename="SubjectVerticals-".time();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new SubjectVerticalExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new SubjectVerticalExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new SubjectVerticalExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }

    }

    public function status(Subjectvertical $subjectvertical)
    {
        if( $subjectvertical->is_active==0)
        {
            $subjectvertical->is_active=1;
        }
        else if( $subjectvertical->is_active==1)
        {
            $subjectvertical->is_active=0;
        }
        $subjectvertical->update();

        $this->dispatch('alert',type:'success',message:'Subject Vertical Status Updated Successfully !!');
    }

    public function view(Subjectvertical $subjectvertical)
    {
        if ($subjectvertical){
            $this->subject_vertical= $subjectvertical->subject_vertical;
            $this->subjectvertical_shortname= $subjectvertical->subjectvertical_shortname;
            $this->subjectbuckettype_id= isset($subjectvertical->buckettype->buckettype_name) ? $subjectvertical->buckettype->buckettype_name : '';
        }else{
            $this->dispatch('alert',type:'error',message:'Subject Vertical Details Not Found');
        }
        $this->setmode('view');
    }

    public function render()
    {
        $subjectverticals=collect([]);

        if($this->mode==='all'){

            $this->subjectbucket_types = SubjectBucketTypeMaster::pluck('buckettype_name','id');

            $subjectverticals = Subjectvertical::when($this->search, function($query, $search){
                $query->search($search);
            })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        }
        return view('livewire.faculty.subject-vertical.all-subject-vertical',compact('subjectverticals'))->extends('layouts.faculty')->section('faculty');
    }
}
