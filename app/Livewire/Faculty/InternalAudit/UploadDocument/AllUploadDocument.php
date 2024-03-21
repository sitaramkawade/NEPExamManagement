<?php

namespace App\Livewire\Faculty\InternalAudit\UploadDocument;

use Livewire\Component;
use App\Models\Academicyear;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Facultyinternaldocument;

class AllUploadDocument extends Component
{
    protected $listeners = ['delete-confirmed'=>'delete','form-submitted' => 'render'];
    public $academicyear_id;
    public $academicyears;
    public $patternclass_id;
    public $pattern_classes=[];
    public $subject_id;
    public $subjects=[];
    public $facultyinternaldocuments=[];
    public $uploaded_documents=[];

    #[Locked]
    public $delete_id;

    public function updated($propertyName, $value)
    {
        if($propertyName == 'academicyear_id'){
            $this->loadPatternClasses();

        }elseif($propertyName == 'patternclass_id'){
            $this->loadSubjects($value);
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
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
        ->where('status', 0)
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


    public function loadSubjects($value)
    {
        $user_id = Auth::guard('faculty')->user()->id;

        $this->subjects = Facultyinternaldocument::where('faculty_id', $user_id)->where('status', 0)
            ->whereHas('subject', function ($query) use ($value) {
                $query->where('patternclass_id', $value);
            })
            ->with(['subject' => function ($query) {
                $query->select('id', 'subject_name', 'subject_code');
            }])
            ->get()
            ->pluck('subject', 'subject.id');
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
