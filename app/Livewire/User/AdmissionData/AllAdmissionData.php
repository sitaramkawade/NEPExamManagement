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
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Exports\User\AdmissionData\AdmissionDataExport;
use App\Imports\User\AdmissionData\AdmissionDataImport;

class AllAdmissionData extends Component
{  
    use WithPagination;
    use WithFileUploads;

    protected $listeners = ['delete-confirmed'=>'forcedelete'];
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

    public $college_id;
    public $department_id;
    public $academicyear_id;
    public $patternclass_id;
    public $subject_id;
    public $user_id;
    public $stud_name;
    public $memid;
    public $subject_code;
    public $pattern_classes;
    public $users;
    public $subjects;
    public $academic_years;
    public $departments;
    public $colleges;



    public function rules()
    {


        return [
            'college_id' => ['required', 'numeric', Rule::exists('colleges', 'id')],
            'department_id' => ['required', 'numeric', Rule::exists('departments', 'id')],
            'academicyear_id' => ['required', 'numeric',Rule::exists('academicyears', 'id')],
            'patternclass_id' => ['required', 'numeric', Rule::exists('pattern_classes', 'id')],
            'subject_id' => ['required', 'numeric', Rule::exists('subjects', 'id')],
            'user_id' => ['required', 'numeric', Rule::exists('users', 'id')],
            'subject_code' => ['required', 'string','max:100'],
            'stud_name' => ['required', 'string','max:100'],
            'memid' => ['required', 'integer','digits_between:1,11'],
        ];
    }

    public function messages()
    {   
        return [
            'college_id.required' => 'The College field is required.',
            'college_id.numeric' => 'The College must be a number.',
            'college_id.exists' => 'The selected College is invalid.',
            'department_id.required' => 'The Department field is required.',
            'department_id.numeric' => 'The Department must be a number.',
            'department_id.exists' => 'The selected Department is invalid.',
            'academicyear_id.required' => 'The Academic Year field is required.',
            'academicyear_id.numeric' => 'The Academic Year must be a number.',
            'academicyear_id.exists' => 'The selected Academic Year is invalid.',
            'patternclass_id.required' => 'The Pattern Class field is required.',
            'patternclass_id.numeric' => 'The Pattern Class must be a number.',
            'patternclass_id.exists' => 'The selected Pattern Class is invalid.',
            'subject_id.required' => 'The Subject field is required.',
            'subject_id.numeric' => 'The Subject must be a number.',
            'subject_id.exists' => 'The selected Subject is invalid.',
            'user_id.required' => 'The User field is required.',
            'user_id.numeric' => 'The User must be a number.',
            'user_id.exists' => 'The selected User is invalid.',
            'subject_code.required' => 'The Subject Code field is required.',
            'subject_code.string' => 'The Subject Code must be a string.',
            'subject_code.max' => 'The subject Code may not be greater than :max characters.',
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

        if($propertyName=='memid'){
            $this->uploaded_documents=[];
        }
    }
    public function resetinput()
    {
        $this->subject_code=null;
        $this->college_id=null;
        $this->department_id=null;
        $this->academicyear_id=null;
        $this->patternclass_id=null;
        $this->subject_id=null;
        $this->user_id=null;
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

        $admission_data = new Admissiondata;
        $admission_data->create([
           'subject_code'=> $this->subject_code,
           'college_id'=> $this->college_id,
           'department_id'=> $this->department_id,
           'academicyear_id'=> $this->academicyear_id,
           'patternclass_id'=> $this->patternclass_id,
           'subject_id'=> $this->subject_id,
           'user_id'=> $this->user_id,
           'stud_name'=> $this->stud_name,
           'memid'=> $this->memid,
        ]);

        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Admission Data Entry Created Successfully !!');
    }


    public function edit(Admissiondata $admission_data)
    {   
        $this->resetinput();
        $this->edit_id=$admission_data->id;
        $this->subject_code=$admission_data->subject_code;
        $this->college_id=$admission_data->college_id;
        $this->department_id=$admission_data->department_id;
        $this->academicyear_id=$admission_data->academicyear_id;
        $this->patternclass_id=$admission_data->patternclass_id;
        $this->subject_id=$admission_data->subject_id;
        $this->user_id=$admission_data->user_id;
        $this->stud_name=$admission_data->stud_name;
        $this->memid=$admission_data->memid;
        $this->setmode('edit');
    }

    public function update(Admissiondata $admission_data)
    {
        $this->validate();
         $admission_data->fill([
           'subject_code'=> $this->subject_code,
           'college_id'=> $this->college_id,
           'department_id'=> $this->department_id,
           'academicyear_id'=> $this->academicyear_id,
           'patternclass_id'=> $this->patternclass_id,
           'subject_id'=> $this->subject_id,
           'user_id'=> $this->user_id,
           'stud_name'=> $this->stud_name,
           'memid'=> $this->memid,
        ]);
        $admission_data->update();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Admission Data Entry Updated Successfully !!');

    }

    public function status(Admissiondata $admission_data)
    {   
        if( $admission_data->status==0)
        {   
            $admission_data->status=1;
        }
        else if( $admission_data->status==1)
        {   
            $admission_data->status=4;
        }
        
        $admission_data->verified_by= Auth::guard('user')->user()->id;
        $admission_data->update();

        $this->dispatch('alert',type:'success',message:'Helpline Query Status Updated Successfully !!');
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

        $this->pattern_classes=Patternclass::select('class_id','pattern_id','id')->get();
        $this->users=User::select('name','id')->where('is_active',1)->get();
        $this->subjects=Subject::select('subject_name','id')->where('status',1)->get();
        $this->academic_years=Academicyear::select('year_name','id')->where('active',1)->get();
        $this->departments=Department::select('dept_name','id')->where('status',1)->get();
        $this->colleges=College::select('college_name','id')->where('status',1)->get();

        $admission_datas=Admissiondata::when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);
        return view('livewire.user.admission-data.all-admission-data', compact('admission_datas'))->extends('layouts.user')->section('user');
    }
}
