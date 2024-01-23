<?php

namespace App\Livewire\Faculty\FacultyHead;

use App\Models\Faculty;
use Livewire\Component;
use App\Models\Department;
use App\Models\Facultyhead;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Faculty\FacultyHead\FacultyHeadExport;

class AllFacultyHead extends Component
{
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'delete'];
    public $faculty_id;
    public $department_id;
    public $status;

    #[Locked]
    public $facultyhead_id;

    public $faculties;
    public $departments;

    public $mode='all';
    public $per_page = 10;

    #[Locked]
    public $delete_id;

    public $perPage=10;
    public $search='';
    public $sortColumn="faculty_id";
    public $sortColumnBy="ASC";
    public $ext;
    public $isDisabled = true;

    protected function rules()
    {
        return [
            'faculty_id' => ['required',Rule::exists(Faculty::class,'id')],
            'department_id' => ['required',Rule::exists(Department::class,'id')],
            'status' => ['required', 'in:0,1',],
        ];
    }

    public function messages()
    {
        return [
            'faculty_id.required' => 'Please select a faculty.',
            'faculty_id.exists' => 'The selected faculty is invalid.',
            'department_id.required' => 'Please select a department.',
            'department_id.exists' => 'The selected department is invalid.',
            'status.required' => 'Please select a status.',
            'status.in' => 'The status must be either Inactive or Active.',
        ];
    }

    public function resetinput()
    {
         $this->faculty_id = null;
         $this->department_id = null;
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

    public function updatedSearch()
    {
        $this->resetPage();
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
        $facultyhead = Facultyhead::create($validatedData);
        if ($facultyhead) {
            $this->dispatch('alert',type:'success',message:'Faculty Head Added Successfully');
            $this->resetinput();
            $this->setmode('all');
        } else {
            $this->dispatch('alert',type:'error',message:'Failed to Add Faculty Head. Please try again.');
        }
    }

    public function edit(Facultyhead $facultyhead)
    {
        if ($facultyhead){
            $this->facultyhead_id = $facultyhead->id;
            $this->faculty_id = $facultyhead->faculty_id;
            $this->department_id= $facultyhead->department_id;
            $this->status= $facultyhead->status;
        }else{
            $this->dispatch('alert',type:'error',message:'Faculty Head Details Not Found');
        }
        $this->setmode('edit');
    }

    public function update(Facultyhead $facultyhead)
    {
        $validatedData = $this->validate();
        if ($facultyhead) {
            $facultyhead->update($validatedData);
            $this->dispatch('alert',type:'success',message:'Faculty Head Updated Successfully');
        }else{
            $this->dispatch('alert',type:'error',message:'Error To Update Faculty Head');
        }
        $this->setmode('all');
    }

    public function delete()
    {
        $facultyhead = Facultyhead::withTrashed()->find($this->delete_id);
        if($facultyhead){
            $facultyhead->forceDelete();
            $this->delete_id = null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Faculty Head Deleted Successfully !!');
        } else {
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');
        }
    }

    public function softdelete($id)
    {
        $facultyhead = Facultyhead::withTrashed()->find($id);
        if ($facultyhead) {
            $facultyhead->delete();
            $this->dispatch('alert',type:'success',message:'Faculty Head Deleted Successfully');
            } else {
                $this->dispatch('alert',type:'error',message:'Faculty Head Not Found !');
            }
        $this->setmode('all');
    }

    public function restore($id)
    {
        $facultyhead = Facultyhead::withTrashed()->find($id);

        if ($facultyhead) {
            $facultyhead->restore();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Faculty Head Restored Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Faculty Head Not Found');
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

    public function export()
    {
        $filename="FacultyHead-".time();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new FacultyHeadExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new FacultyHeadExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new FacultyHeadExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }

    }

    public function changestatus(Facultyhead $facultyhead)
    {
        if( $facultyhead->status==0)
        {
            $facultyhead->status=1;
        }
        else if( $facultyhead->status==1)
        {
            $facultyhead->status=0;
        }
        $facultyhead->update();

        $this->dispatch('alert',type:'success',message:'Faculty Head Status Updated Successfully !!');
    }

    public function view(Facultyhead $facultyhead)
    {
        if ($facultyhead){
            $this->faculty_id= isset($facultyhead->faculty->faculty_name) ? $facultyhead->faculty->faculty_name : '';
            $this->department_id= isset($facultyhead->department->dept_name) ? $facultyhead->department->dept_name : '';
            $this->status= $facultyhead->status;
        }else{
            $this->dispatch('alert',type:'error',message:'Faculty Head Details Not Found');
        }
        $this->setmode('view');
    }

    public function render()
    {
        if($this->mode !== 'all'){
            $this->departments= Department::select('id','dept_name',)->where('status',1)->get();
            $this->faculties= Faculty::select('id','faculty_name',)->where('active',1)->get();
        }
        $facultyheads = Facultyhead::with(['department', 'faculty'])->when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.faculty.faculty-head.all-faculty-head',compact('facultyheads'))->extends('layouts.faculty')->section('faculty');
    }
}
