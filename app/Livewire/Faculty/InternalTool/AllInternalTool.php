<?php

namespace App\Livewire\Faculty\InternalTool;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Models\Coursetypemaster;
use App\Models\Internaltoolview;
use App\Models\Internaltoolmaster;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Internaltooldocument;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Internaltooldocumentmaster;
use App\Exports\Faculty\InternalTool\InternalToolExport;

class AllInternalTool extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'delete'];

    public $toolname;
    public $course_type;
    public $status;
    public $course_types;

    #[Locked]
    public $delete_id;
    #[Locked]
    public $internaltool_id;

    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $mode='all';
    public $per_page = 10;
    public $ext;

    public function rules()
    {
        $rules = [
            'toolname' => ['required', 'string', 'min:2', 'max:255'],
            'course_type' => ['required', Rule::exists(Coursetypemaster::class, 'course_type')],
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'toolname.required' => 'The tool name field is required.',
            'toolname.string' => 'The tool name must be a string.',
            'toolname.min' => 'The tool name must be at least :min characters.',
            'toolname.max' => 'The tool name may not be greater than :max characters.',
            'course_type.required' => 'The course type field is required.',
            'course_type.exists' => 'The selected course type is invalid.',
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
        $internal_tool = Internaltoolmaster::create($validatedData);
        if ($internal_tool) {
            $this->dispatch('alert',type:'success',message:'Internal Tool Added Successfully');
            $this->resetinput();
            $this->setmode('all');
        } else {
            $this->dispatch('alert',type:'error',message:'Failed to Add Internal Tool. Please try again.');
        }
    }

    public function edit(Internaltoolmaster $internal_tool)
    {
        if ($internal_tool){
            $this->internaltool_id = $internal_tool->id;
            $this->toolname= $internal_tool->toolname;
            $this->course_type= $internal_tool->course_type;
        }else{
            $this->dispatch('alert',type:'error',message:'Internal tool Details Not Found');
        }
        $this->setmode('edit');
    }

    public function update(Internaltoolmaster $internal_tool)
    {
        $validatedData = $this->validate();
        if ($internal_tool) {
            $internal_tool->update($validatedData);
            $this->dispatch('alert',type:'success',message:'Internal tool Updated Successfully');
        }else{
            $this->dispatch('alert',type:'error',message:'Error To Update Internal tool');
        }
        $this->setmode('all');
    }

    public function delete()
    {
        try
        {
            $internal_tool = Internaltoolmaster::withTrashed()->find($this->delete_id);
            $internal_tool->forceDelete();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Internal Tool Deleted Successfully !!');
        } catch (\Illuminate\Database\QueryException $e) {

            if ($e->errorInfo[1] == 1451) {

                $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
            }
        }
    }

    public function softdelete($id)
    {
        $internal_tool = Internaltoolmaster::withTrashed()->find($id);
        if ($internal_tool) {
            $internal_tool->delete();
            $this->dispatch('alert',type:'success',message:'Internal Tool Soft Deleted Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Internal Tool Not Found !');
        }
    }

    public function restore($id)
    {
        $internal_tool = Internaltoolmaster::withTrashed()->find($id);

        if ($internal_tool) {
            $internal_tool->restore();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Internal Tool Restored Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Internal Tool Not Found');
        }
        $this->setmode('all');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function export()
    {
        $filename="InternalTool-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new InternalToolExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new InternalToolExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new InternalToolExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function changestatus(Internaltoolmaster $internal_tool)
    {
        if( $internal_tool->status==0)
        {
            $internal_tool->status=1;
        }
        else if( $internal_tool->status==1)
        {
            $internal_tool->status=0;
        }
        $internal_tool->update();

        $this->dispatch('alert',type:'success',message:'Internal Tool Status Updated Successfully !!');
    }

    public function view(Internaltoolmaster $internal_tool)
    {
        if ($internal_tool){
            $this->toolname= $internal_tool->toolname;
            $this->course_type= $internal_tool->course_type;
        }else{
            $this->dispatch('alert',type:'error',message:'Internal Tool Details Not Found');
        }
        $this->setmode('view');
    }

    public function render()
    {
        if($this->mode !== 'all'){
            $this->course_types = Coursetypemaster::pluck('course_type','id');
            $this->internaltool_documents = Internaltooldocumentmaster::pluck('doc_name','id');
        }

        $internal_tools = Internaltoolmaster::when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.faculty.internal-tool.all-internal-tool',compact('internal_tools'))->extends('layouts.faculty')->section('faculty');
    }
}
