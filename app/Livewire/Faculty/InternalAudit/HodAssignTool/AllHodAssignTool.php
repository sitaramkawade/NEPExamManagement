<?php

namespace App\Livewire\Faculty\InternalAudit\HodAssignTool;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Internaltoolmaster;
use App\Models\DocumentAcademicYear;
use App\Models\Internaltooldocument;
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

    public function resetinput()
    {
        $this->academicyear_id=null;
    }

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

    public function all_document_uploaded($internal_tool_master_id)
    {
        // Find records in Facultyinternaldocument table for the given internal tool master ID
        $faculty_internal_documents = Facultyinternaldocument::whereHas('internaltooldocument', function ($query) use ($internal_tool_master_id) {
            $query->where('internaltoolmaster_id', $internal_tool_master_id);
        })->get();

        // Check if any of the fields are not nullable for any record
        foreach ($faculty_internal_documents as $document) {
            // List of fields to check for nullability
            $fieldsToCheck = ['document_fileName', 'document_filePath',]; // Add your field names here

            // Iterate through each field and check if it's not nullable
            foreach ($fieldsToCheck as $field) {
                // If the field is not nullable, return true immediately
                if (!is_null($document->$field)) {
                    return true;
                }
            }
        }

        // If no non-nullable field was found, return false
        return false;
    }


    public function freeze_tool($internal_tool_master_id)
    {
        $result = $this->all_document_uploaded($internal_tool_master_id);
       if($result){
            // Find the IDs of all Facultyinternaldocument records related to the given internal_tool_master_id
            $internal_tool_document_ids = Facultyinternaldocument::whereHas('internaltooldocument', function ($query) use ($internal_tool_master_id) {
                $query->where('internaltoolmaster_id', $internal_tool_master_id);
            })->get()->pluck('id');

            // Update the freeze_by_hod column for the fetched records
            Facultyinternaldocument::whereIn('id', $internal_tool_document_ids)
                ->update(['freeze_by_hod' => 1]);

            $this->dispatch('alert',type:'success',message:'Tool Freezed Successfully !!');
       }else{
            $this->dispatch('alert',type:'info',message:'Some of tool document is not uploaded !!');
       }
    }

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

    public function show_freeze_button($internal_tool_master_id)
    {
        // Find the IDs of all Facultyinternaldocument records related to the given internal_tool_master_id
        $uploaded_document_count = Facultyinternaldocument::whereHas('internaltooldocument', function ($query) use ($internal_tool_master_id) {
            $query->where('internaltoolmaster_id', $internal_tool_master_id)
                ->whereNotNull('document_fileName')
                ->whereNotNull('document_filePath')
                ->where('freeze_by_hod', '0');
        })->count();

        $total_document_count = Internaltooldocument::whereHas('internaltoolmaster', function ($query) use ($internal_tool_master_id) {
            $query->where('id', $internal_tool_master_id);
        })->count();

        // Return true if the counts match, false otherwise
        return ($uploaded_document_count === $total_document_count);
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

    // public function export()
    // {
    //     $filename="HodAssignTools-".now();
    //     switch ($this->ext) {
    //         case 'xlsx':
    //             return Excel::download(new HodAssignToolExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
    //         break;
    //         case 'csv':
    //             return Excel::download(new HodAssignToolExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
    //         break;
    //         case 'pdf':
    //             return Excel::download(new HodAssignToolExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
    //         break;
    //     }
    // }

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
            $this->academicyear_id = (isset($faculty_internal_document->academicyear->year_name) ?  $faculty_internal_document->academicyear->year_name : '');
            $this->tool_name= (isset($faculty_internal_document->internaltooldocument->internaltoolmaster->toolname) ?  $faculty_internal_document->internaltooldocument->internaltoolmaster->toolname : '');
            $this->faculty_id= (isset($faculty_internal_document->faculty->faculty_name) ?  $faculty_internal_document->faculty->faculty_name : '');
            $this->subject_id= (isset($faculty_internal_document->subject->subject_name) ?  $faculty_internal_document->subject->subject_name : '');
            $this->departmenthead_id = (isset($faculty_internal_document->departmenthead->faculty->faculty_name) ?  $faculty_internal_document->departmenthead->faculty->faculty_name : '');
            $this->verifybyfaculty_id = (isset($faculty_internal_document->verifybyfaculty->faculty_name) ?  $faculty_internal_document->verifybyfaculty->faculty_name : '');
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
        $this->academicyears = DocumentAcademicYear::where('active',1)->get();
    }

    public function render()
    {
        // Initialize variables
        $faculty_internal_documents = collect();
        $groupedInternalDocuments = collect();

        // Check the mode
        if ($this->mode !== 'view') {
            // Check if academic year ID is set
            if ($this->academicyear_id !== null) {
                // Reset page and load records based on the academic year ID
                $this->resetPage();
                $faculty_internal_documents = Facultyinternaldocument::where('academicyear_id', $this->academicyear_id)
                    ->with(['faculty:faculty_name,id','subject:subject_code,subject_name,id','academicyear:year_name,id','internaltooldocument.internaltooldocumentmaster:doc_name,id'])
                    ->withTrashed()
                    ->paginate($this->perPage);
                $groupedInternalDocuments = $faculty_internal_documents->groupBy('subject_id');
            } else {
                // Load all records if academic year ID is not set
                $faculty_internal_documents = Facultyinternaldocument::with(['faculty:faculty_name,id','subject:subject_code,subject_name,id','academicyear:year_name,id','internaltooldocument.internaltooldocumentmaster:doc_name,id'])
                    ->withTrashed()
                    ->paginate($this->perPage);
                $groupedInternalDocuments = $faculty_internal_documents->groupBy('subject_id');
            }
        } else {
            // Load all records if mode is 'view'
            $faculty_internal_documents = Facultyinternaldocument::with(['faculty:faculty_name,id','subject:subject_code,subject_name,id','academicyear:year_name,id','internaltooldocument.internaltooldocumentmaster:doc_name,id',])->withTrashed()->paginate($this->perPage);
            $groupedInternalDocuments = $faculty_internal_documents->groupBy('subject_id');

            // Check if no records found
            if ($faculty_internal_documents->isEmpty()) {
                $this->dispatch('alert', ['type' => 'info', 'message' => 'Records Not Found This Academic Year !!']);
            }
        }

        // Return the view with the data
        return view('livewire.faculty.internal-audit.hod-assign-tool.all-hod-assign-tool', compact('faculty_internal_documents', 'groupedInternalDocuments'))->extends('layouts.faculty')->section('faculty');
    }

}
