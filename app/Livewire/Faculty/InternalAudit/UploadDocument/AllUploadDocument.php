<?php

namespace App\Livewire\Faculty\InternalAudit\UploadDocument;

use Livewire\Component;
use App\Models\Academicyear;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Facultyinternaldocument;
use App\Exports\Faculty\InternalAudit\FacultyInternalDocument\FacultyInternalDocumentExport;

class AllUploadDocument extends Component
{
    protected $listeners = ['delete-confirmed'=>'delete','form-submitted' => 'render', 'freeze-confirmed' => 'freeze'];

    public $academicyear_id;
    public $academicyears;

    public $semester_id;
    public $semesters=[];

    public $patternclass_id;
    public $pattern_classes=[];

    public $subject_id;
    public $subjects=[];

    public $facultyinternaldocuments=[];
    public $uploaded_documents=[];

    public $ext;
    public $search='';

    #[Locked]
    public $delete_id;
    #[Locked]
    public $freeze_id;

    public function updated($propertyName, $value)
    {
        if($propertyName == 'academicyear_id'){
            $this->loadPatternClasses();

        }elseif($propertyName == 'patternclass_id'){
            $this->loadSemesters($value);

        }elseif($propertyName == 'semester_id'){
            $this->loadSubjects($value);

        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function freezeconfirmation($id)
    {
        $this->freeze_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function loadPatternClasses()
    {
        $user_id = Auth::guard('faculty')->user()->id;

        $documents_data = Facultyinternaldocument::with([
            'subject.patternclass.courseclass.classyear:id,classyear_name',
            'subject.patternclass.courseclass.course:id,course_name',
            'subject.patternclass.pattern:id,pattern_name'
        ])
        ->where('faculty_id', $user_id)
        ->get();

        $this->pattern_classes = $documents_data->unique('subject.patternclass_id')->mapWithKeys(function ($item) {
            return [
                $item['subject']['patternclass']['id'] => [
                    'classyear_name' => $item['subject']['patternclass']['courseclass']['classyear']['classyear_name'],
                    'course_name' => $item['subject']['patternclass']['courseclass']['course']['course_name'],
                    'pattern_name' => $item['subject']['patternclass']['pattern']['pattern_name'],
                ]
            ];
        });
    }

    public function loadSemesters($patternclass_id)
    {
        $user_id = Auth::guard('faculty')->user()->id;

        $documents_data = Facultyinternaldocument::whereHas('subject', function ($query) use ($patternclass_id) {
                $query->where('patternclass_id', $patternclass_id);
            })
            ->with(['subject' => function ($query) {
                $query->select('id', 'patternclass_id', 'subject_sem');
            }])
            ->where('faculty_id', $user_id)
            ->get();
        $this->semesters = $documents_data->pluck('subject.subject_sem')->unique();
    }

    public function loadSubjects($semester)
    {
        $user_id = Auth::guard('faculty')->user()->id;

        $this->subjects = Facultyinternaldocument::where('faculty_id', $user_id)
            ->whereHas('subject', function ($query) use ($semester) {
                $query->where('subject_sem', $semester);
            })
            ->with(['subject:id,subject_name,subject_code'])
            ->get()
            ->pluck('subject', 'id')->unique();
    }

    public function freezeTool(Facultyinternaldocument $facultyinternaldocument)
    {
        if( $facultyinternaldocument->freeze_by_faculty==0)
        {
            $facultyinternaldocument->freeze_by_faculty=1;
        }
        else if( $facultyinternaldocument->freeze_by_faculty==1)
        {
            $facultyinternaldocument->freeze_by_faculty=0;
        }
        $facultyinternaldocument->update();

        $this->dispatch('alert',type:'success',message:'Tool Freezed Successfully !!');
    }

    public function export()
    {
        $filename="FacultyInternalDocument-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new FacultyInternalDocumentExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new FacultyInternalDocumentExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new FacultyInternalDocumentExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function mount()
    {
        $this->academicyears = Academicyear::where('is_doc_year',1)->where('active',1)->pluck('year_name','id');
    }

    public function delete()
    {
        try {
            $inttool_doc = Facultyinternaldocument::withTrashed()->find($this->delete_id);

            // Delete the associated image
            if ($inttool_doc->document_fileName) {
                File::delete($inttool_doc->document_filePath);
            }

            // Update the columns to null instead of force deleting
            $inttool_doc->update([
                'document_fileName' => null,
                'document_filePath' => null,
                'status' => 0,
                'updated_at' => now(),
            ]);

            $this->delete_id = null;
            $this->dispatch('alert', type: 'success', message: 'Internal Tool Document Deleted Successfully !!');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1451) {
                $this->dispatch('alert', type: 'error', message: 'This record is associated with another data. You cannot delete it !!');
            }
        }
    }

    public function render()
    {
        if ($this->subject_id) {
            $this->facultyinternaldocuments = Facultyinternaldocument::where('faculty_id',Auth::guard('faculty')->user()->id)
            ->with(['internaltooldocumentmaster:id,doc_name',])
            ->where('subject_id',$this->subject_id)
            ->where('academicyear_id',$this->academicyear_id)
            ->where('status',0)
            ->get();
        } else {
            $this->facultyinternaldocuments = [];
        }

        if ($this->subject_id) {
            $this->uploaded_documents = Facultyinternaldocument::where('faculty_id', Auth::guard('faculty')->user()->id)
            ->with(['internaltooldocumentmaster:id,doc_name'])
            ->where('subject_id', $this->subject_id)
            ->where('academicyear_id', $this->academicyear_id)
            ->where('status', 1)
            ->whereNotNull('document_fileName')
            ->whereNotNull('document_filePath')
            ->get();
        } else {
            $this->uploaded_documents = [];
        }

        return view('livewire.faculty.internal-audit.upload-document.all-upload-document')->extends('layouts.faculty')->section('faculty');
    }
}
