<?php

namespace App\Livewire\User\AdmissionData;

use Excel;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Patternclass;
use Livewire\WithFileUploads;
use App\Models\Subjectcategory;
use App\Imports\User\AdmissionData\AdmissionDataImport;

class AdmissionDataImportComponent extends Component
{   
    use WithFileUploads;

    protected $listeners = ['subjectCategoryChanged'];
    public $importfile;
    public $patternclass_id;
    public $subjects=[];
    public $subject_ids=[];
    public $subject_id;
    public $subjectcategory_id;
    public $mode="import";



    public function import()
    {
        $filters = [];

        if ($this->patternclass_id && $this->subjectcategory_id && $this->subject_id) {
            $filters = [];
            $filters['patternclass_id'] = $this->patternclass_id;
        
            $patternClass = Patternclass::find($this->patternclass_id);
        
            if ($patternClass) {
                if ($this->subjectcategory_id && $this->subject_id) {
                    $filters['subject_ids'] = $patternClass->subjects()->where('subjectcategory_id', $this->subjectcategory_id)->where('id', $this->subject_id)->pluck('id')->toArray();
                }
            }

            if(empty($filters['subject_ids']))
            {
                $this->dispatch('alert',type:'info',message:'Admission Data Not Found for Current Filters !!');
                return false;
            }
        }elseif ($this->patternclass_id && $this->subjectcategory_id) {
            $filters = [];
            $filters['patternclass_id'] = $this->patternclass_id;
        
            $patternClass = Patternclass::find($this->patternclass_id);
        
            if ($patternClass) {
                if ($this->subjectcategory_id) {
                    $filters['subject_ids'] = $patternClass->subjects()->where('subjectcategory_id', $this->subjectcategory_id)->pluck('id')->toArray();
                }
            }

            if(empty($filters['subject_ids']))
            {
                $this->dispatch('alert',type:'info',message:'Admission Data Not Found for Current Filters !!');
                return false;
            }
        }elseif ($this->patternclass_id) {
            $filters = [];
            $filters['patternclass_id'] = $this->patternclass_id;

            $patternClass = Patternclass::find($this->patternclass_id);

            if ($patternClass) {
                $filters['subject_ids'] = $patternClass->subjects()->pluck('id')->toArray();
            }
            
            if(empty($filters['subject_ids']))
            {
                $this->dispatch('alert',type:'info',message:'Admission Data Not Found for Current Filters !!');
                return false;
            }
        }

        if ($this->importfile) {
            $import = new AdmissionDataImport($filters);
            Excel::import($import, $this->importfile->getRealPath());

            $this->dispatch('alert',type:'success',message:'Admission Data Imported Successfully !!');
            $this->mode='all';
            // return $this->redirect('/user/admissiondatas',navigate:true);
        } else {
            $this->dispatch('alert',type:'info',message:'Please choose a file to Import !!');
        }
    }

    public function render()
    {   
        $patternclasses = Patternclass::select('class_id', 'pattern_id', 'id')->with(['pattern','courseclass.course','courseclass.classyear'])->get();
        $subject_categories = Subjectcategory::select('subjectcategory', 'id')->whereIn('active', [1, 2])->get();
        $this->subjects = Subject::select('subject_name', 'id')->where('status', 1)->when($this->patternclass_id, function ($query) {
            return $query->where('patternclass_id', $this->patternclass_id);
        })->when($this->subjectcategory_id, function ($query) {
            return $query->where('subjectcategory_id', $this->subjectcategory_id);
        })->get();

        return view('livewire.user.admission-data.admission-data-import-component',compact('patternclasses','subject_categories'));
    }
}
