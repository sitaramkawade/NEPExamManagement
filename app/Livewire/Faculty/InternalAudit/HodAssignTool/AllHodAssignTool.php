<?php

namespace App\Livewire\Faculty\InternalAudit\HodAssignTool;

use Livewire\Component;
use App\Models\Academicyear;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Facultyinternaldocument;
use App\Exports\Faculty\InternalAudit\HodAssignTool\HodAssignToolExport;

class AllHodAssignTool extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'delete'];

    public $academicyear_id;
    public $academicyears;
    public $faculty_id;
    public $faculties;
    public $subject_id;
    public $subjects;
    public $internaltooldocument_id;
    public $tool_name;
    public $internaltooldocuments;
    public $document_fileName;
    public $document_fileNames;
    public $document_filePath;
    public $document_filePaths;
    public $departmenthead_id;
    public $departmentheads;
    public $verifybyfaculty_id;
    public $verifybyfaculties;
    public $verificationremark;
    public $verificationremarks;
    public $status;

    #[Locked]
    public $faculty_internal_document_id;
    #[Locked]
    public $delete_id;

    public $perPage=10;
    public $search='';
    public $sortColumn="academicyear_id";
    public $sortColumnBy="ASC";
    public $mode='all';
    public $ext;

    // protected function rules()
    // {
    //     return [
    //         'academicyear_id' => ['required',],
    //         'faculty_id' => ['required', ],
    //         'subject_id' => ['required', ],
    //         'internaltooldocument_id' => ['required', ],
    //         'document_fileName' => ['required', ],
    //         'document_filePath' => ['required', ],
    //         'departmenthead_id' => ['required', ],
    //         'verifybyfaculty_id' => ['required', ],
    //         'verificationremark' => ['required', ],
    //     ];
    // }

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    // public function resetinput()
    // {
    //     $this->academicyear_id=null;
    //     $this->faculty_id=null;
    //     $this->subject_id=null;
    //     $this->internaltooldocument_id=null;
    //     $this->document_fileName=null;
    //     $this->document_filePath=null;
    //     $this->departmenthead_id=null;
    //     $this->verifybyfaculty_id=null;
    //     $this->verificationremark=null;
    // }

    // public function messages()
    // {
    //     return [
    //         'academicyear_id.required' => 'The academic year name field is required.',
    //         'faculty_id.required' => 'The faculty field is required.',
    //         'subject_id.required' => 'The subject field is required.',
    //         'internaltooldocument_id.required' => 'The internal tool document field is required.',
    //         'document_fileName.required' => 'The document name field is required.',
    //         'document_filePath.required' => 'The document file path field is required.',
    //         'departmenthead_id.required' => 'The department head field is required.',
    //         'verifybyfaculty_id.required' => 'The verify by faculty name field is required.',
    //         'verificationremark.required' => 'The verification remark field is required.',
    //     ];
    // }

    // public function deleteconfirmation($id)
    // {
    //     $this->delete_id=$id;
    //     $this->dispatch('delete-confirmation');
    // }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }

    // public function save()
    // {
    //     $validatedData = $this->validate();
    //     $faculty_internal_document = Facultyinternaldocument::create($validatedData);
    //     if ($faculty_internal_document) {
    //         $this->dispatch('alert',type:'success',message:'Faculty Internal Tool Document Added Successfully');
    //         $this->resetinput();
    //         $this->setmode('all');
    //     } else {
    //         $this->dispatch('alert',type:'error',message:'Failed to Add Faculty Internal Tool Document. Please try again.');
    //     }
    // }

    // public function edit(Facultyinternaldocument $faculty_internal_document)
    // {
    //     if ($faculty_internal_document){
    //         $this->faculty_internal_document_id = $faculty_internal_document->id;
    //         $this->academicyear_id=$faculty_internal_document->academicyear_id;
    //         $this->faculty_id=$faculty_internal_document->faculty_id;
    //         $this->subject_id=$faculty_internal_document->subject_id;
    //         $this->internaltooldocument_id=$faculty_internal_document->internaltooldocument_id;
    //         $this->document_fileName=$faculty_internal_document->document_fileName;
    //         $this->document_filePath=$faculty_internal_document->document_filePath;
    //         $this->departmenthead_id=$faculty_internal_document->departmenthead_id;
    //         $this->verifybyfaculty_id=$faculty_internal_document->verifybyfaculty_id;
    //         $this->verificationremark=$faculty_internal_document->verificationremark;
    //     }else{
    //         $this->dispatch('alert',type:'error',message:'Faculty Internal Tool Document Details Not Found');
    //     }
    //     $this->setmode('edit');
    // }

    // public function update(Facultyinternaldocument $faculty_internal_document)
    // {
    //     $validatedData = $this->validate();
    //     if ($faculty_internal_document) {
    //         $faculty_internal_document->update($validatedData);
    //         $this->dispatch('alert',type:'success',message:'Faculty Internal Tool Document Updated Successfully');
    //     }else{
    //         $this->dispatch('alert',type:'error',message:'Error To Update Faculty Internal Tool Document');
    //     }
    //     $this->setmode('all');
    // }

    public function delete()
    {
        try
        {
            $faculty_internal_document = Facultyinternaldocument::withTrashed()->find($this->delete_id);
            $faculty_internal_document->forceDelete();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Faculty Internal Tool Document Deleted Successfully !!');
        } catch (\Illuminate\Database\QueryException $e) {

            if ($e->errorInfo[1] == 1451) {

                $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
            }
        }
    }

    public function softdelete($id)
    {
        $faculty_internal_document = Facultyinternaldocument::withTrashed()->find($id);
        if ($faculty_internal_document) {
            $faculty_internal_document->delete();
            $this->dispatch('alert',type:'success',message:'Faculty Internal Tool Document Soft Deleted Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Faculty Internal Tool Document Not Found !');
        }
    }

    public function restore($id)
    {
        $faculty_internal_document = Facultyinternaldocument::withTrashed()->find($id);

        if ($faculty_internal_document) {
            $faculty_internal_document->restore();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Faculty Internal Tool Document Restored Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Faculty Internal Tool Document Not Found');
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
        $filename="HodAssignTools-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new HodAssignToolExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new HodAssignToolExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new HodAssignToolExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    // public function status(Facultyinternaldocument $faculty_internal_document)
    // {
    //     if( $faculty_internal_document->status==0)
    //     {
    //         $faculty_internal_document->status=1;
    //     }
    //     else if( $faculty_internal_document->status==1)
    //     {
    //         $faculty_internal_document->status=0;
    //     }
    //     $faculty_internal_document->update();

    //     $this->dispatch('alert',type:'success',message:'Faculty Internal Tool Document Status Updated Successfully !!');
    // }

    public function view(Facultyinternaldocument $faculty_internal_document)
    {
        if ($faculty_internal_document){
            $this->academicyear_id= $faculty_internal_document->academicyear->year_name;
            $this->tool_name= $faculty_internal_document->internaltooldocument->internaltoolmaster->toolname;
            $this->faculty_id= $faculty_internal_document->faculty->faculty_name;
            $this->subject_id= $faculty_internal_document->subject->subject_name;
            $this->departmenthead_id = $faculty_internal_document->faculty->faculty_name;
            $this->verifybyfaculty_id = $faculty_internal_document->faculty->faculty_name;
            $this->verificationremark = $faculty_internal_document->verificationremark;
            $this->status = $faculty_internal_document->status;
            $this->internaltooldocuments= Facultyinternaldocument::where('subject_id',$faculty_internal_document->subject_id)->get();
        }else{
            $this->dispatch('alert',type:'error',message:'Faculty Internal Tool Document Details Not Found');
        }
        $this->setmode('view');
    }

    public function mount()
    {
        $this->academicyears = Academicyear::where('is_doc_year',1)->get();
    }

    public function render()
    {
        $faculty_internal_documents = Facultyinternaldocument::with(['faculty:faculty_name,id','subject:subject_code,subject_name,id','academicyear:year_name,id','internaltooldocument.internaltooldocumentmaster:doc_name,id',])->when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.faculty.internal-audit.hod-assign-tool.all-hod-assign-tool',compact('faculty_internal_documents'))->extends('layouts.faculty')->section('faculty');
    }
}
