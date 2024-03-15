<?php

namespace App\Livewire\Faculty\InternalAudit\UploadDocument;

use App\Models\Course;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Courseclass;
use App\Models\Academicyear;
use App\Models\Patternclass;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Http\UploadedFile;
use App\Models\Internaltoolmaster;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Facultyinternaldocument;


class AllUploadDocument extends Component
{
    use WithFileUploads;
    protected $listeners = ['delete-confirmed'=>'delete'];

    // public $academicyear_id=4;
    // public $academicyears;
    // public $course_id=21;
    // public $courses;
    // public $patternclass_id=113;
    // public $pattern_classes;
    // public $subject_id=1907;
    // public $subjects;

    public $isUploading = false;
    public $fileLoaded = false;

    public $academicyear_id;
    public $academicyears;
    public $course_id;
    public $courses;
    public $patternclass_id;
    public $pattern_classes=[];
    public $subject_id;
    public $subjects=[];

    public $file=[];

    public $documents_to_upload=[];

    public $uploaded_documents=[];

    public $counter_one = 1;
    public $counter_two = 1;

    #[Locked]
    public $delete_id;
    #[Locked]
    public $uploaddoc_id;

    public $mode='all';


    protected function rules()
    {
        return [
            'file' => ['required','file', 'max:1024','mimes:png,jpg,jpeg']
        ];
    }

    public function messages()
    {
        return [
            'file.required' => 'The file field is required.',
            'file.file' => 'The selected file is invalid.',
            'file.max' => 'The file must not be greater than 1024 kilobytes (1 MB).',
            'file.mimes' => 'The file must be a PNG, JPG, or JPEG image.',
        ];
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function updated($propertyName, $value)
    {
        if($propertyName == 'academicyear_id'){
            $this->loadPatternClasses();

        }elseif($propertyName == 'patternclass_id'){
            $this->loadSubjects($value);
        }
    }

    public function loadPatternClasses()
    {
        $documents_data = Facultyinternaldocument::with('subject.patternclass','academicyear:id,year_name',)
        ->where('faculty_id', Auth::guard('faculty')->user()->id)
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
        $subjects = Facultyinternaldocument::where('faculty_id', Auth::guard('faculty')->user()->id)
            ->where('status', 0)
            ->whereHas('subject', function ($query) use ($value) {
                $query->where('patternclass_id', $value);
            })
            ->with('subject:id,subject_name,subject_code')
            ->get()
            ->mapWithKeys(function ($document) {
                return [$document->subject->id => [
                    'subject_name' => $document->subject->subject_name,
                    'subject_code' => $document->subject->subject_code
                ]];
            });

        $this->subjects = $subjects;
    }


    // public function resetinput()
    // {
    //     $this->academicyear_id=null;
    //     $this->course_id=null;
    //     $this->patternclass_id=null;
    //     $this->subject_id=null;
    //     $this->selected_tools=null;
    // }

    public function save(Facultyinternaldocument $facultyinternaldocument)
    {
        if (!empty($this->file)) {
            // Check if the record exists
            if ($facultyinternaldocument) {
                // Year Name
                $year_name = isset($facultyinternaldocument->academicyear->year_name) ? $facultyinternaldocument->academicyear->year_name : 'YN';

                // Patternclass ID
                $patternclass_id = isset($facultyinternaldocument->subject->patternclass->id) ? $facultyinternaldocument->subject->patternclass->id : 'PC';

                // Faculty Name
                $faculty_name = isset($facultyinternaldocument->faculty->faculty_name) ? $facultyinternaldocument->faculty->faculty_name : 'FN';

                // Subject Code
                $subject_code = isset($facultyinternaldocument->subject->subject_code) ? $facultyinternaldocument->subject->subject_code : 'SC';

                // Tool Name
                $tool_name = isset($facultyinternaldocument->internaltooldocument->internaltoolmaster->toolname) ? $facultyinternaldocument->internaltooldocument->internaltoolmaster->toolname : 'TN';

                // Document Name
                $doc_name = isset($facultyinternaldocument->internaltooldocument->internaltooldocumentmaster->doc_name) ? $facultyinternaldocument->internaltooldocument->internaltooldocumentmaster->doc_name : 'DN';

                // Path To Store
                $path = 'internal-audit/' . $year_name . '/' . $faculty_name . '/' . $subject_code .'_'. $patternclass_id . '/';

                // Iterate through each file
                foreach ($this->file as $document) {
                    // Generate a unique file name for each document
                    $fileName = $doc_name . '.' . $document->getClientOriginalExtension();

                    // Upload the document
                    $document->storeAs($path, $fileName, 'public');

                    // Update the record with the file information for each document
                    $facultyinternaldocument->update([
                        'document_fileName' => $fileName,
                        'document_fileTitle' => 'storage/' . $path . $fileName,
                        'updated_at' => now(),
                        'status' => 1,
                    ]);
                }
                $this->dispatch('alert', type: 'success', message: 'Document Uploaded Successfully');
            } else {
                $this->dispatch('alert', type: 'error', message: 'Failed To Upload Document!');
            }
        } else {
            $this->dispatch('alert', type: 'info', message: 'Please wait document is still loading!');
        }
    }

    public function delete()
    {
        try {
            $inttool_doc = Facultyinternaldocument::withTrashed()->find($this->delete_id);

            // Delete the associated image
            if ($inttool_doc->document_fileName) {
                File::delete($inttool_doc->document_fileTitle); // Adjust the column name and storage method accordingly
            }

            // Reset the temporary URL
            unset($this->file[$this->delete_id]);

            // Update the columns to null instead of force deleting
            $inttool_doc->update([
                'document_fileName' => null,
                'document_fileTitle' => null,
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

    public function mount()
    {
        // $documents_data = Facultyinternaldocument::with('subject.patternclass','academicyear:id,year_name',)
        //     ->where('faculty_id', Auth::guard('faculty')->user()->id)
        //     ->where('status', 0)
        //     ->get();

        $this->academicyears = Academicyear::where('is_doc_year',1)->pluck('year_name','id');
        // $this->pattern_classes = $documents_data->pluck('subject.patternclass_id')->unique();
        // $this->subjects =  $documents_data->pluck('subject.subject_name','subject.id');

    }

    public function render()
    {
        if($this->mode == 'all'){

            if ($this->subject_id) {
                $this->documents_to_upload = Facultyinternaldocument::where('faculty_id',Auth::guard('faculty')->user()->id)
                ->with(['internaltooldocumentmaster:id,doc_name',])
                ->where('subject_id',$this->subject_id)
                ->where('academicyear_id',$this->academicyear_id)
                ->where('status',0)
                ->get();
            } else {
                $this->documents_to_upload = [];
            }

            if ($this->subject_id) {
                $this->uploaded_documents = Facultyinternaldocument::where('faculty_id', Auth::guard('faculty')->user()->id)
                ->with(['internaltooldocumentmaster:id,doc_name'])
                ->where('subject_id', $this->subject_id)
                ->where('academicyear_id', $this->academicyear_id)
                ->where('status', 1)
                ->whereNotNull('document_fileName')
                ->whereNotNull('document_fileTitle')
                ->get();
            } else {
                $this->uploaded_documents = [];
            }
        }
        return view('livewire.faculty.internal-audit.upload-document.all-upload-document')->extends('layouts.faculty')->section('faculty');
    }
}
