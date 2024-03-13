<?php

namespace App\Livewire\Faculty\InternalAudit\InternalToolDocument;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Models\Internaltoolmaster;
use App\Models\Internaltooldocument;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Internaltooldocumentmaster;
use App\Exports\Faculty\InternalAudit\InternalToolDocument\InternalToolDocumentExport;

class AllInternalToolDocument extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'delete'];

    public $internaltooldocuments;
    public $internaltoolmaster_id;
    public $internaltoolmasters;
    public $is_multiple;
    public $status;

    #[Locked]
    public $delete_id;
    #[Locked]
    public $internaltooldoc_id;

    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $mode='all';
    public $per_page = 10;
    public $ext;


    protected function rules()
    {
        return [
            'internaltoolmaster_id' => ['required', Rule::exists(Internaltoolmaster::class,'id') ],
            'internaltooldoc_id' => ['required', Rule::exists(Internaltooldocumentmaster::class,'id') ],
            'is_multiple' => ['nullable', 'boolean'],
        ];
    }


    public function messages()
    {
        return [
            'internaltoolmaster_id.required' => 'The internal tool master ID is required.',
            'internaltoolmaster_id.exists' => 'The selected internal tool master does not exist.',
            'internaltooldoc_id.required' => 'The internal tool document ID is required.',
            'internaltooldoc_id.exists' => 'The selected internal tool document does not exist.',
            'is_multiple.boolean' => 'The is multiple field is required.',
        ];
    }

    public function resetinput()
    {
        $this->internaltooldoc_id  = null;
        $this->internaltoolmaster_id  = null;
        $this->is_multiple  = null;
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
        $validatedData['is_multiple'] = $validatedData['is_multiple'] ? 1 : 0;
        $internaltool_document = Internaltooldocument::create($validatedData);
        if ($internaltool_document) {
            $this->dispatch('alert',type:'success',message:'Internal Tool Document Added Successfully');
            $this->resetinput();
            $this->setmode('all');
        } else {
            $this->dispatch('alert',type:'error',message:'Failed to Add Internal Tool Document. Please try again.');
        }
    }

    public function edit(Internaltooldocument $internaltool_document)
    {
        if ($internaltool_document){
            $this->internaltooldoc_id = $internaltool_document->id;
            $this->internaltoolmaster_id = $internaltool_document->internaltoolmaster_id;
            $this->internaltooldoc_id= $internaltool_document->internaltooldoc_id;
            $this->is_multiple = $internaltool_document->is_multiple == 1 ? true : false;
        }else{
            $this->dispatch('alert',type:'error',message:'Internal Tool Document Details Not Found');
        }
        $this->setmode('edit');
    }

    public function update(Internaltooldocument $internaltool_document)
    {
        $validatedData = $this->validate();
        $validatedData['is_multiple'] = $validatedData['is_multiple'] == true ? 1 : 0;
        if ($internaltool_document) {
            $internaltool_document->update($validatedData);
            $this->dispatch('alert',type:'success',message:'Internal Tool Document Updated Successfully');
        }else{
            $this->dispatch('alert',type:'error',message:'Error To Update Internal Tool Document');
        }
        $this->setmode('all');
    }

    public function delete()
    {
        try
        {
            $internaltool_document = Internaltooldocument::withTrashed()->find($this->delete_id);
            $internaltool_document->forceDelete();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Internal Tool Document Deleted Successfully !!');
        } catch (\Illuminate\Database\QueryException $e) {

            if ($e->errorInfo[1] == 1451) {

                $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
            }
        }
    }

    public function softdelete($id)
    {
        $internaltool_document = Internaltooldocument::withTrashed()->find($id);
        if ($internaltool_document) {
            $internaltool_document->delete();
            $this->dispatch('alert',type:'success',message:'Internal Tool Document Soft Deleted Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Internal Tool Document Not Found !');
        }
    }

    public function restore($id)
    {
        $internaltool_document = Internaltooldocument::withTrashed()->find($id);

        if ($internaltool_document) {
            $internaltool_document->restore();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Internal Tool Document Restored Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Internal Tool Document Not Found');
        }
        $this->setmode('all');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function export()
    {
        $filename="InternalToolDocuments-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new InternalToolDocumentExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new InternalToolDocumentExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new InternalToolDocumentExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function changestatus(Internaltooldocument $internaltool_document)
    {
        if( $internaltool_document->status==0)
        {
            $internaltool_document->status=1;
        }
        else if( $internaltool_document->status==1)
        {
            $internaltool_document->status=0;
        }
        $internaltool_document->update();

        $this->dispatch('alert',type:'success',message:'Internal Tool Document Status Updated Successfully !!');
    }

    public function view(Internaltooldocument $internaltool_document)
    {
        if ($internaltool_document){
            $this->internaltooldoc_id= isset($internaltool_document->internaltooldocumentmaster->doc_name) ? $internaltool_document->internaltooldocumentmaster->doc_name : '';
            $this->internaltoolmaster_id= isset($internaltool_document->internaltoolmaster->toolname) ? $internaltool_document->internaltoolmaster->toolname : '';
            $this->is_multiple = $internaltool_document->is_multiple == 1 ? 'Yes' : 'No';
        }else{
            $this->dispatch('alert',type:'error',message:'Internal Tool Details Not Found');
        }
        $this->setmode('view');
    }

    public function render()
    {
        if($this->mode !== 'all'){
            $this->internaltooldocuments = Internaltooldocumentmaster::pluck('doc_name','id');
            $this->internaltoolmasters = Internaltoolmaster::pluck('toolname','id');
        }

        $internaltool_docs = Internaltooldocument::with(['internaltooldocumentmaster:doc_name,id','internaltoolmaster:toolname,id'])->when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.faculty.internal-audit.internal-tool-document.all-internal-tool-document',compact('internaltool_docs'))->extends('layouts.faculty')->section('faculty');
    }
}
