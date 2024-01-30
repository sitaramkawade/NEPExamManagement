<?php

namespace App\Livewire\User\AdmissionData;

use Excel;
use App\Models\User;
use App\Models\College;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Department;
use App\Models\Academicyear;
use App\Models\Patternclass;
use Livewire\WithPagination;
use App\Models\Admissiondata;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Exports\User\AdmissionData\AdmissionDataExport;
use App\Imports\User\AdmissionData\AdmissionDataImport;

class AllAdmissionData extends Component
{  
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'forcedelete','refreshAllAdmissionData' => '$refresh'];
    #[Locked] 
    public $delete_id;
    #[Locked] 
    public $edit_id;

    public $mode='all';
    public $perPage=10;
    public $search='';
    public $sortColumn="stud_name";
    public $sortColumnBy="ASC";
    public $importfile;
    public $ext;

    public $patternclass_id;
    public $subject_id;
    public $stud_name;
    public $memid;
    public $pattern_classes;
    public $subjects;




    public function rules()
    {


        return [
            'patternclass_id' => ['required', 'integer', Rule::exists('pattern_classes', 'id')],
            'subject_id' => ['required', 'integer', Rule::exists('subjects', 'id')],
            'stud_name' => ['required', 'string','max:100'],
            'memid' => ['required', 'integer'],
            // 'memid' => ['required', 'integer','digits_between:1,11',Rule::unique('admissiondatas', 'memid')->ignore($this->edit_id, 'id')],
        ];
    }

    public function messages()
    {   
        return [
            'patternclass_id.required' => 'The Pattern Class field is required.',
            'patternclass_id.integer' => 'The Pattern Class must be a number.',
            'patternclass_id.exists' => 'The selected Pattern Class is invalid.',
            'subject_id.required' => 'The Subject field is required.',
            'subject_id.integer' => 'The Subject must be a number.',
            'subject_id.exists' => 'The selected Subject is invalid.',
            'stud_name.required' => 'The Student Name field is required.',
            'stud_name.string' => 'The Student Name must be a string.',
            'stud_name.max' => 'The Student Name may not be greater than :max characters.',
            'memid.required' => 'The Member ID field is required.',
            'memid.integer' => 'The  Member ID must be an integer.',
            'memid.digits_between' => 'The Member ID must be between :min and :max digits.',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->patternclass_id=null;
        $this->subject_id=null;
        $this->stud_name=null;
        $this->memid=null;
        $this->edit_id =null;
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
        $filename="Admission-Data-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new AdmissionDataExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new AdmissionDataExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new AdmissionDataExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function import()
    {   
        $this->validate([
            'importfile' => ['required', 'file', 'mimes:xlsx,csv'],
        ], [
            'importfile.required' => 'Please Select A File To Import.',
            'importfile.file' => 'The Selected File Is Not Valid.',
            'importfile.mimes' => 'Only XLSX Or CSV Files Are Allowed.',
        ]);

        Excel::import(new AdmissionDataImport, $this->importfile);
        $this->importfile=null;
        $this->dispatch('alert',type:'success',message:'Admission Data Imported Successfully !!');
    }

    public function add()
    {
        $this->validate();
        $academic_year=Academicyear::where('active',1)->first();
        if($academic_year)
        {
            $admission_data = new Admissiondata;
            $admission_data->create([
               'user_id'=> Auth::guard('user')->user()->id,
               'college_id'=> Auth::guard('user')->user()->college_id,
               'academicyear_id'=> $academic_year->id,
               'patternclass_id'=> $this->patternclass_id,
               'subject_id'=> $this->subject_id,
               'stud_name'=> $this->stud_name,
               'memid'=> $this->memid,
            ]);
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Admission Data Entry Created Successfully !!');

        }else{
            $this->dispatch('alert',type:'error',message:'Academic Year Not Found !!');
        }
        
    }


    public function edit(Admissiondata $admission_data)
    {   
        $this->resetinput();
        $this->edit_id=$admission_data->id;

        $this->patternclass_id=$admission_data->patternclass_id;
        $this->subject_id=$admission_data->subject_id;
        $this->stud_name=$admission_data->stud_name;
        $this->memid=$admission_data->memid;
        $this->setmode('edit');
    }

    public function update(Admissiondata $admission_data)
    {
        $this->validate();
        $academic_year=Academicyear::where('active',1)->first();
        if($academic_year)
        {
            $admission_data->fill([
                'user_id'=> Auth::guard('user')->user()->id,
                'college_id'=> Auth::guard('user')->user()->college_id,
                'academicyear_id'=> $academic_year->id,
                'patternclass_id'=> $this->patternclass_id,
                'subject_id'=> $this->subject_id,
                'stud_name'=> $this->stud_name,
                'memid'=> $this->memid,
            ]);
            $admission_data->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Admission Data Entry Updated Successfully !!');
        }else
        {
            $this->dispatch('alert',type:'error',message:'Academic Year Not Found !!');
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }


    public function delete(Admissiondata  $admission_data)
    {   
        $admission_data->delete();
        $this->dispatch('alert',type:'success',message:'Admission Data Entry Soft Deleted Successfully !!');
    }
    
    public function restore($id)
    {   
        $admission_data = Admissiondata::withTrashed()->find($id);
        $admission_data->restore();
        $this->dispatch('alert',type:'success',message:'Admission Data Entry Restored Successfully !!');
    }

    public function forcedelete()
    {   
        $admission_data = Admissiondata::withTrashed()->find($this->delete_id);
        $admission_data->forceDelete();
        $this->dispatch('alert',type:'success',message:'Admission Data Entry Deleted Successfully !!');
    }

    public function render()
    {   
        $admissionDataQuery = Admissiondata::with(['college:college_name,id', 'academicyear:year_name,id', 'patternclass.courseclass.course:course_name,id', 'patternclass.pattern:pattern_name,id','patternclass.courseclass.classyear:classyear_name,id', 'subject:subject_name,id', 'user:name,id'])
        ->when($this->search, function ($query, $search) {
                $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy);

        if ($this->mode !== 'all' || $this->mode !== 'import') 
        {
            $this->pattern_classes = Patternclass::select('class_id', 'pattern_id', 'id')->with(['courseclass.course:course_name,id', 'pattern:pattern_name,id','courseclass.classyear:classyear_name,id'])->get();
            $this->subjects = Subject::select('subject_name', 'id')->when($this->patternclass_id, function ($query) {
                return $query->where('patternclass_id', $this->patternclass_id);
            })->where('status', 1)->get();
        }

        $admission_datas = $admissionDataQuery->paginate($this->perPage);

        return view('livewire.user.admission-data.all-admission-data', compact('admission_datas'))->extends('layouts.user')->section('user');
    }
}
