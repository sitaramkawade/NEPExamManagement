<?php

namespace App\Livewire\Faculty\InternalAudit\UploadDocumentRow;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Facultyinternaldocument;

class UploadDocumentRow extends Component
{
    use WithFileUploads;

    public $faculty_internal_document_data;
    public $document_to_upload;

    protected function rules()
    {
        return [
            'document_to_upload' => ['required', 'file', 'max:1024', 'mimes:png,jpg,jpeg,pdf'],
        ];
    }

    public function messages()
    {
        return [
            'document_to_upload.required' => 'The document is required.',
            'document_to_upload.file' => 'The document must be a file.',
            'document_to_upload.max' => 'The document must not exceed 1 MB.',
            'document_to_upload.mimes' => 'The document must be a PNG, JPG, JPEG, or PDF file.',
        ];
    }

    public function resetinput()
    {
        $this->document_to_upload = null;
    }

    public function save(Facultyinternaldocument $faculty_internal_document_data)
    {
        $validatedData = $this->validate();
        $document = $this->document_to_upload;
        if (!empty($document)) {
            // Check if the record exists
            if ($faculty_internal_document_data) {
                // Year Name
                $year_name = isset($faculty_internal_document_data->academicyear->year_name) ? $faculty_internal_document_data->academicyear->year_name : 'YN';

                // Patternclass ID
                $patternclass_id = isset($faculty_internal_document_data->subject->patternclass->id) ? $faculty_internal_document_data->subject->patternclass->id : 'PC';

                // Faculty Name
                $faculty_name = isset($faculty_internal_document_data->faculty->faculty_name) ? $faculty_internal_document_data->faculty->faculty_name : 'FN';

                // Subject Code
                $subject_code = isset($faculty_internal_document_data->subject->subject_code) ? $faculty_internal_document_data->subject->subject_code : 'SC';

                // Tool Name
                $tool_name = isset($faculty_internal_document_data->internaltooldocument->internaltoolmaster->toolname) ? $faculty_internal_document_data->internaltooldocument->internaltoolmaster->toolname : 'TN';

                // Document Name
                $doc_name = isset($faculty_internal_document_data->internaltooldocument->internaltooldocumentmaster->doc_name) ? $faculty_internal_document_data->internaltooldocument->internaltooldocumentmaster->doc_name : 'DN';

                // Path To Store
                $path = 'internal-audit/' . $year_name . '/' . $faculty_name . '/' . $subject_code .'_'. $patternclass_id . '/';

                // Generate a unique file name for each document
                $fileName = $doc_name . '.' . $this->document_to_upload->getClientOriginalExtension();

                // Upload the document
                $document->storeAs($path, $fileName, 'public');

                    // Update the record with the file information for each document
                    $faculty_internal_document_data->update([
                        'document_fileName' => $fileName,
                        'document_filePath' => 'storage/' . $path . $fileName,
                        'updated_at' => now(),
                        'status' => 1,
                    ]);

                $this->resetinput();
                $this->dispatch('alert', type: 'success', message: 'Document Uploaded Successfully');
                $this->dispatch('form-submitted');
            } else {
                $this->dispatch('alert', type: 'error', message: 'Failed To Upload Document!');
            }
        } else {
            $this->dispatch('alert', type: 'info', message: 'Please wait document is still loading!');
        }
    }

    public function mount($facultyinternaldocument)
    {
        $this->faculty_internal_document_data = $facultyinternaldocument;
    }

    public function render()
    {
        return view('livewire.faculty.internal-audit.upload-document-row.upload-document-row')->extends('layouts.faculty')->section('faculty');
    }
}
