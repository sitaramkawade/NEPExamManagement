<?php

namespace App\Livewire\User\HelplineDocument;

use Excel;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Locked;
use App\Models\Studenthelplinequery;
use App\Models\Studenthelplinedocument;
use App\Exports\User\HelplineDocumnet\HelplineDocumentExport;

class AllHelplineDocument extends Component
{   
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    #[Locked] 
    public $delete_id;

    public $mode='all';
    public $perPage=10;
    public $search='';
    public $sortColumn="student_helpline_query_id";
    public $sortColumnBy="ASC";
    public $ext;

    public $student_helpline_queries;
    public $student_helpline_query_id;
    public $document_name;
    public $is_active;
    #[Locked] 
    public $edit_id;


    public function rules()
    {
        return [
            'student_helpline_query_id' => ['required', 'numeric', Rule::exists('student_helpline_queries', 'id')],
            'document_name' => ['required', 'string','max:255', Rule::unique('student_helpline_documents')
            ->ignore($this->mode=='edit'?$this->edit_id:'')->where(function ($query){
                return $query->where('student_helpline_query_id',$this->student_helpline_query_id);
            })],
        ];
    }

    public function messages()
    {   
        $messages = [
            'document_name.required' => 'The Document Name field is required.',
            'document_name.string' => 'The Document Name must be a string.',
            'document_name.max' => 'The Document Name must not exceed :max characters.',
            'document_name.unique' => 'The Document Name must be unique for the selected Query.',
            'student_helpline_query_id.required' => 'The Query is required.',
            'student_helpline_query_id.numeric' => 'The Query must be a number.',
            'student_helpline_query_id.exists' => 'The selected Query does not exist.',
        ];
        
        return $messages;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->student_helpline_query_id=null;
        $this->document_name=null;
        $this->is_active=null;
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

    public function setmode($mode)
    {
        if($mode=='add')
        {
            $this->resetinput();
        }
        $this->mode=$mode;
    }

    public function export()
    {
        $filename="Helpline-Document-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new HelplineDocumentExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new HelplineDocumentExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new HelplineDocumentExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function add()
    {
        $this->validate();

        $helpline_query_document =  new Studenthelplinedocument;
        $helpline_query_document->create([
            'student_helpline_query_id' => $this->student_helpline_query_id ,
            'document_name' => $this->document_name ,
            'is_active' => $this->is_active==true?0:1,
        ]);
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Helpline Document Created Successfully !!');
    }


    public function edit(Studenthelplinedocument $helpline_query_document)
    {   
        $this->resetinput();
        $this->edit_id=$helpline_query_document->id;
        $this->student_helpline_query_id = $helpline_query_document->student_helpline_query_id ;
        $this->document_name=$helpline_query_document->document_name;
        $this->is_active=$helpline_query_document->is_active==1 ? 0 : true ;
  
        $this->setmode('edit');
    }

    public function update(Studenthelplinedocument $helpline_query_document)
    {
        $this->validate();

        $helpline_query_document->update([
            'student_helpline_query_id' => $this->student_helpline_query_id ,
            'document_name' => $this->document_name ,
            'is_active' => $this->is_active==true ? 0 : 1,
        ]);
       
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Helpline Document Updated Successfully !!');

    }

    public function status(Studenthelplinedocument $helpline_query_document)
    {   
        if( $helpline_query_document->is_active)
        {
            $helpline_query_document->is_active=0;
        }
        else 
        {
            $helpline_query_document->is_active=1;
        }
        $helpline_query_document->update();

        $this->dispatch('alert',type:'success',message:'Helpline Document Status Updated Successfully !!');
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }


    public function delete(Studenthelplinedocument  $helpline_query_document)
    {   
        $helpline_query_document->delete();
        $this->dispatch('alert',type:'success',message:'Helpline Document Soft Deleted Successfully !!');
    }
    
    public function restore($id)
    {   
        $helpline_query_document = Studenthelplinedocument::withTrashed()->find($id);
        $helpline_query_document->restore();
        $this->dispatch('alert',type:'success',message:'Helpline Document Restored Successfully !!');
    }

    public function forcedelete()
    {   
        $helpline_query_document = Studenthelplinedocument::withTrashed()->find($this->delete_id);
        $helpline_query_document->forceDelete();
        $this->dispatch('alert',type:'success',message:'Helpline Document Deleted Successfully !!');
    }

    public function render()
    {   
        $this->student_helpline_queries=Studenthelplinequery::where('is_active',1)->get();

        $student_helpline_documents=Studenthelplinedocument::select('id','student_helpline_query_id','document_name','deleted_at','is_active')->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.helpline-document.all-helpline-document',compact('student_helpline_documents'))->extends('layouts.user')->section('user');
    }

}
