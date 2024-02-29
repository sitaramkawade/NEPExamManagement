<?php

namespace App\Livewire\Faculty\DepartmentPrefix;

use App\Models\Pattern;
use Livewire\Component;
use App\Models\Department;
use App\Models\DeptPrefix;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Faculty\DepartmentPrefix\DepartmentPrefixExport;

class AllDepartmentPrefix extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'delete'];

    public $dept_id;
    public $pattern_id;
    public $prefix;
    public $postfix;

    public $departments;
    public $patterns;

    #[Locked]
    public $delete_id;
    #[Locked]
    public $deptprefix_id;

    public $perPage=10;
    public $search='';
    public $sortColumn="dept_id";
    public $sortColumnBy="ASC";
    public $mode='all';
    public $per_page = 10;
    public $ext;

    protected function rules()
    {
        return [
            'dept_id' => ['required', Rule::exists(Department::class,'id')],
            'pattern_id' => ['required', Rule::exists(Pattern::class,'id')],
            'prefix' => ['required', 'string', 'min:1','max:3',],
            'postfix' => ['required', 'string', 'min:1','max:1',],
        ];
    }

    public function messages()
    {
        return [
            'dept_id.required' => 'The department ID is required.',
            'dept_id.exists' => 'The selected department ID is invalid.',
            'pattern_id.required' => 'The pattern ID is required.',
            'pattern_id.exists' => 'The selected pattern ID is invalid.',
            'prefix.required' => 'The prefix is required.',
            'prefix.string' => 'The prefix must be a string.',
            'prefix.min' => 'The prefix must be at least :min characters.',
            'prefix.max' => 'The prefix may not be greater than :max characters.',
            'postfix.required' => 'The postfix is required.',
            'postfix.string' => 'The postfix must be a string.',
            'postfix.min' => 'The postfix must be at least :min characters.',
            'postfix.max' => 'The postfix may not be greater than :max characters.',
        ];
    }

    public function resetinput()
    {
        $this->dept_id = null;
        $this->pattern_id = null;
        $this->prefix = null;
        $this->postfix = null;
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
        $validatedData['prefix'] = strtoupper($validatedData['prefix']);
        $validatedData['postfix'] = strtoupper($validatedData['postfix']);
        $deptprefix = DeptPrefix::create($validatedData);
        if ($deptprefix) {
            $this->dispatch('alert',type:'success',message:'Department Prefix Added Successfully');
            $this->resetinput();
            $this->setmode('all');
        } else {
            $this->dispatch('alert',type:'error',message:'Failed to Add Department Prefix. Please try again.');
        }
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function edit(DeptPrefix $deptprefix)
    {
        if ($deptprefix){
            $this->deptprefix_id = $deptprefix->id;
            $this->dept_id = $deptprefix->dept_id;
            $this->pattern_id = $deptprefix->pattern_id;
            $this->prefix = $deptprefix->prefix;
            $this->postfix = $deptprefix->postfix;
        }else{
            $this->dispatch('alert',type:'error',message:'Department Prefix Details Not Found');
        }
        $this->setmode('edit');
    }

    public function update(DeptPrefix $deptprefix)
    {
        $validatedData = $this->validate();
        $validatedData['prefix'] = strtoupper($validatedData['prefix']);
        $validatedData['postfix'] = strtoupper($validatedData['postfix']);
        if ($deptprefix) {
            $deptprefix->update($validatedData);
            $this->dispatch('alert',type:'success',message:'Department Prefix Updated Successfully');
        }else{
            $this->dispatch('alert',type:'error',message:'Error To Update Department Prefix');
        }
        $this->setmode('all');
    }

    public function delete()
    {
        try
        {
            $deptprefix = DeptPrefix::withTrashed()->find($this->delete_id);
            $deptprefix->forceDelete();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Department Prefix Deleted Successfully !!');
        } catch (\Illuminate\Database\QueryException $e) {

            if ($e->errorInfo[1] == 1451) {

                $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
            }
        }
    }

    public function softdelete($id)
    {
        $deptprefix = DeptPrefix::withTrashed()->find($id);
        if ($deptprefix) {
            $deptprefix->delete();
            $this->dispatch('alert',type:'success',message:'Department Prefix Soft Deleted Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Department Prefix Not Found !');
        }
    }

    public function restore($id)
    {
        $deptprefix = DeptPrefix::withTrashed()->find($id);

        if ($deptprefix) {
            $deptprefix->restore();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Department Prefix Restored Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Department Prefix Not Found');
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

    public function export()
    {
        $filename="DepartmentPrefix-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new DepartmentPrefixExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new DepartmentPrefixExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new DepartmentPrefixExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function view(DeptPrefix $deptprefix)
    {
        if ($deptprefix){
            $this->dept_id = isset($deptprefix->department->dept_name) ? $deptprefix->department->dept_name : '';
            $this->pattern_id = isset($deptprefix->pattern->pattern_name) ? $deptprefix->pattern->pattern_name : '';
            $this->prefix = $deptprefix->prefix;
            $this->postfix = $deptprefix->postfix;
        }else{
            $this->dispatch('alert',type:'error',message:'Subject Type Details Not Found');
        }
        $this->setmode('view');
    }

    public function render()
    {
        if($this->mode !== 'all' ){
            $this->patterns=Pattern::where('status',1)->pluck('pattern_name','id');
            $this->departments = Department::where('status',1)->pluck('dept_name','id');
        }
        $deptprefixes = DeptPrefix::when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.faculty.department-prefix.all-department-prefix',compact('deptprefixes'))->extends('layouts.faculty')->section('faculty');
    }
}
