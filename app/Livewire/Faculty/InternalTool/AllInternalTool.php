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
use App\Exports\Faculty\InternalTool\InternalToolExport;

class AllInternalTool extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'delete'];

    public $toolname;
    public $course_type;
    public $status;
    public $course_types;

    public $internaltoolmaster_id;

    public $document_count=null;
    public $document_inputs = [];
    public $internaldoc_name = [];
    public $is_multiple = [];

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
            'document_count' => ['required', 'integer'],
            'course_type' => ['required', Rule::exists(Coursetypemaster::class, 'course_type')],
        ];

        foreach ($this->document_inputs as $index => $input) {
            $rules["internaldoc_name.$index"] = ['required', 'min:1', 'max:255'];
            $rules["is_multiple.$index"] = ['nullable','boolean'];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'toolname.required' => 'The toolname field is required.',
            'toolname.string' => 'The toolname must be a string.',
            'toolname.min' => 'The toolname must be at least :min characters.',
            'toolname.max' => 'The toolname may not be greater than :max characters.',
            'course_type.required' => 'The course type field is required.',
            'course_type.exists' => 'The selected course type is required.',
            'document_count.required' => 'The document count field is required.',
            'document_count.integer' => 'The document count must be an integer.',
            'internaldoc_name.*.required' => 'Document name is required.',
            'internaldoc_name.*.min' => 'Document name must be at least :min characters.',
            'internaldoc_name.*.max' => 'Document name may not be greater than :max characters.',
            'is_multiple.*.boolean' => 'Is multiple field must be either true or false.',
        ];
    }

    public function resetinput()
    {
        $this->toolname = null;
        $this->course_type = null;
        $this->document_count = null;
        $this->document_inputs = [];
        $this->internaldoc_name = [];
        $this->is_multiple = []; // Reset 'is_multiple' array
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

    public function updatedDocumentCount()
    {
        $this->document_inputs = $this->document_count ? range(1, $this->document_count) : [];
    }

    public function save()
    {
        // Begin a database transaction
        DB::beginTransaction();

        try {
            // Validate the data
            $validatedData = $this->validate();

            // Create a new record in Internaltoolmaster table
            $internalTool = Internaltoolmaster::create($validatedData);

            // Insert document inputs into Internaltooldocument table
            foreach ($validatedData['internaldoc_name'] as $index => $internaldoc_name) {
                // Check if the 'is_multiple' value exists and is not null
                $is_multiple = isset($validatedData['is_multiple'][$index]) ? $validatedData['is_multiple'][$index] : 0;

                Internaltooldocument::create([
                    'internaldoc_name' => $internaldoc_name,
                    'internaltoolmaster_id' => $internalTool->id,
                    'is_multiple' => $is_multiple,
                ]);
            }

            // Commit the transaction
            DB::commit();

            // If everything is successful, dispatch success alert and reset inputs
            $this->dispatch('alert',type:'success',message:'Internal Tool Added Successfully');
            $this->resetinput();
            $this->setmode('all');
        } catch (Exception $e) {
            // If an exception occurs, rollback the transaction
            DB::rollBack();

            // Log the exception or handle it in any other way you prefer
            Log::error($e->getMessage());

            // Dispatch error alert
            $this->dispatch('alert',type:'error',message:'Failed to Add Internal Tool.');
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
        }

        $internaltools_from_view = Internaltoolview::when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);
        $groupedInternalTools = $internaltools_from_view->groupBy('internaltoolmaster_id');
        return view('livewire.faculty.internal-tool.all-internal-tool', compact('internaltools_from_view','groupedInternalTools'))->extends('layouts.faculty')->section('faculty');
    }
}
