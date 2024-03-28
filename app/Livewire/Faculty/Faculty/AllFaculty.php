<?php

namespace App\Livewire\Faculty\Faculty;

use App\Models\Role;
use App\Models\College;
use App\Models\Faculty;
use Livewire\Component;
use App\Models\Department;
use App\Models\Prefixmaster;
use Livewire\WithPagination;
use App\Models\Banknamemaster;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Faculty\Faculty\FacultyExport;


class AllFaculty extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'delete'];

    public $prefix;
    public $faculty_name;
    public $email;
    public $mobile_no;
    public $role_id;
    public $department_id;
    public $college_id;
    public $active;
    public $bank_name;
    public $account_no;
    public $bank_address;
    public $branch_name;
    public $branch_code;
    public $ifsc_code;
    public $micr_code;
    public $account_type;
    public $prefixes;
    public $roles;
    public $departments;
    public $colleges;
    public $banknames;
    public $facultybank_id;

    #[Locked]
    public $faculty_id;
    #[Locked]
    public $delete_id;


    public $mode='all';
    public $perPage=10;
    public $search='';
    public $sortColumn="faculty_name";
    public $sortColumnBy="ASC";
    public $ext;


    protected function rules()
    {
        return [
            'prefix' => ['required',],
            'faculty_name' => ['required', 'string', 'max:255',],
            'email' => ['required', 'email', 'string','unique:faculties,email,'.($this->mode=='edit'? $this->faculty_id :'')],
            'mobile_no' => ['required', 'numeric','digits:10'],
            'role_id' => ['required',Rule::exists(Role::class,'id')],
            'department_id' => ['required',Rule::exists(Department::class,'id')],
            'college_id' => ['required',Rule::exists(College::class,'id')],

            'account_no' => ['required', 'numeric','digits_between:8,16','unique:facultybankaccounts,account_no,'.($this->mode=='edit'? $this->facultybank_id :'')],
            'bank_address' => ['required', 'string', 'max:255',],
            'bank_name' => ['required', 'string', 'max:255',],
            'branch_name' => ['required', 'string', 'max:255',],
            'branch_code' => ['required', 'numeric', 'digits:4',],
            'ifsc_code' => ['required', 'string', 'size:11',],
            'micr_code' => ['required', 'numeric', 'digits:9',],
            'account_type' => ['required', 'in:C,S',],

        ];
    }

    public function messages()
    {
        return [
        'prefix.required' => 'The prefix field is required.',
        'faculty_name.required' => 'The faculty name field is required.',
        'faculty_name.string' => 'The faculty name must be a string.',
        'faculty_name.max' => 'The faculty name must not exceed 255 characters.',
        'email.required' => 'The email field is required.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'The email address is already taken.',
        'mobile_no.required' => 'The mobile number field is required.',
        'mobile_no.numeric' => 'The mobile number must be numeric.',
        'mobile_no.digits' => 'The mobile number must be 10 digits.',
        'role_id.required' => 'The role field is required.',
        'role_id.exists' => 'The selected role is invalid.',
        'department_id.required' => 'The department field is required.',
        'department_id.exists' => 'The selected department is invalid.',
        'college_id.required' => 'The college field is required.',
        'college_id.exists' => 'The selected college is invalid.',
        'account_no.required' => 'The account number field is required.',
        'account_no.numeric' => 'The account number must be numeric.',
        'account_no.digits_between' => 'The account number must be between 8 and 16 digits.',
        'account_no.unique' => 'The account number is already taken.',
        'bank_address.required' => 'The bank address field is required.',
        'bank_address.string' => 'The bank address must be a string.',
        'bank_name.required' => 'The bank name field is required.',
        'bank_name.string' => 'The bank name must be a string.',
        'branch_name.required' => 'The branch name field is required.',
        'branch_name.string' => 'The branch name must be a string.',
        'branch_code.required' => 'The branch code field is required.',
        'branch_code.numeric' => 'The branch code must be numeric.',
        'branch_code.digits' => 'The branch code must be 4 digits.',
        'ifsc_code.required' => 'The IFSC code field is required.',
        'ifsc_code.string' => 'The IFSC code must be a string.',
        'ifsc_code.size' => 'The IFSC code must be 11 characters.',
        'micr_code.required' => 'The MICR code field is required.',
        'micr_code.numeric' => 'The MICR code must be numeric.',
        'micr_code.digits' => 'The MICR code must be 9 digits.',
        'account_type.required' => 'The account type field is required.',
        'account_type.in' => 'The account type must be either "CURRENT" or "SAVINGS".',
        ];
    }

    public function resetinput()
    {
         $this->prefix=null;
         $this->faculty_name=null;
         $this->email=null;
         $this->mobile_no=null;
         $this->role_id=null;
         $this->department_id=null;
         $this->college_id=null;

         $this->bank_name=null;
         $this->account_no=null;
         $this->bank_address=null;
         $this->branch_name=null;
         $this->branch_code=null;
         $this->ifsc_code=null;
         $this->micr_code=null;
         $this->account_type=null;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function setmode($mode)
    {
        if($mode=='add')
        {
            $this->resetinput();
        }
        if($mode=='edit')
        {
            $this->resetValidation();
        }
        $this->mode=$mode;
    }

    public function save()
    {
        $validatedData = $this->validate();

        $faculty = Faculty::create($validatedData);
        if ($faculty) {
            $faculty->facultybankaccount()->create($validatedData);
            $this->dispatch('alert',type:'success',message:'Faculty Registered Successfully');
            $this->setmode('all');
        } else {
            $this->dispatch('alert',type:'error',message:'Faculty Registration Unsucessful');
        }
    }

    public function edit(Faculty $faculty)
    {
        if ($faculty)
        {
            $this->faculty_id = $faculty->id;
            $this->prefix= $faculty->prefix;
            $this->faculty_name= $faculty->faculty_name;
            $this->email= $faculty->email;
            $this->mobile_no= $faculty->mobile_no;
            $this->role_id= $faculty->role_id;
            $this->department_id= $faculty->department_id;
            $this->college_id= $faculty->college_id;

            $bankdetails = $faculty->facultybankaccount()->first();
            if($bankdetails){
                $this->facultybank_id= $bankdetails->id;
                $this->bank_name= $bankdetails->bank_name;
                $this->account_no= $bankdetails->account_no;
                $this->bank_address= $bankdetails->bank_address;
                $this->branch_name= $bankdetails->branch_name;
                $this->branch_code= $bankdetails->branch_code;
                $this->ifsc_code= $bankdetails->ifsc_code;
                $this->micr_code= $bankdetails->micr_code;
                $this->account_type= $bankdetails->account_type;
            }else{
                $this->dispatch('alert',type:'error',message:'Bank Details Not Found');
            }
            $this->setmode('edit');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');
        }
    }

    public function update(Faculty $faculty)
    {
        $validatedData = $this->validate();

        if ($faculty) {
            $faculty->update($validatedData);
            $faculty->facultybankaccount()->updateOrCreate([], $validatedData);

            $this->dispatch('alert',type:'success',message:'Faculty Updated Successfully');
            $this->setmode('all');
            $this->resetinput();
        }else{
            $this->dispatch('alert',type:'error',message:'Error To Update Faculty');
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function delete()
    {
        try {
            $faculty = Faculty::withTrashed()->find($this->delete_id);

            if ($faculty) {
                if ($faculty->profile_photo_path && File::exists($faculty->profile_photo_path)) {
                    File::delete($faculty->profile_photo_path);
                }

                $faculty->forceDelete();

                $faculty->facultybankaccount()->delete();

                $this->delete_id = null;
                $this->dispatch('alert',type:'success',message:'Faculty Deleted Successfully !!');
            } else {
                $this->dispatch('alert',type:'error',message:'Faculty not found.');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1451) {
                $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
            } else {

                $this->dispatch('alert',type:'error',message:'An error occurred while deleting the faculty record.');
                \Log::error($e->getMessage());
            }
        }
    }


    public function softdelete($id)
    {
        $faculty = Faculty::withTrashed()->findOrFail($id);

        if ($faculty) {
            $bankAccount = $faculty->facultybankaccount()->withTrashed()->first();
            if ($bankAccount) {
                $bankAccount->delete();
            }
            $faculty->delete();
            $this->dispatch('alert',type:'success',message:'Faculty Deleted Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Faculty Not Found !');
        }
    }

    public function restore($id)
    {
        $faculty = Faculty::withTrashed()->findOrFail($id);

        if ($faculty) {
            $faculty->restore();

            $bankDetails = $faculty->facultybankaccount()->onlyTrashed()->get();

            if ($bankDetails->isNotEmpty()) {
                foreach ($bankDetails as $bankDetail) {
                    $bankDetail->restore();
                }
            }

            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Faculty Restored Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Faculty Not Found');
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
        $filename="Faculty-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new FacultyExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new FacultyExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new FacultyExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }

    }

    public function changestatus(Faculty $faculty)
    {
        if( $faculty->active==0)
        {
            $faculty->active=1;
        }
        else if( $faculty->active==1)
        {
            $faculty->active=0;
        }
        $faculty->update();

        $this->dispatch('alert',type:'success',message:'Faculty Status Updated Successfully !!');
    }

    public function view(Faculty $faculty)
    {
        if ($faculty)
        {
            $this->prefix= $faculty->prefix;
            $this->faculty_name= $faculty->faculty_name;
            $this->email= $faculty->email;
            $this->mobile_no= $faculty->mobile_no;
            $this->department_id = isset($faculty->department->dept_name) ? $faculty->department->dept_name : '';
            $this->role_id = isset($faculty->role->role_name) ? $faculty->role->role_name : '';
            $this->college_id = isset($faculty->college->college_name) ? $faculty->college->college_name : '';

            $bankdetails = $faculty->facultybankaccount()->first();
            if($bankdetails){
                $this->facultybank_id= $bankdetails->id;
                $this->bank_name= $bankdetails->bank_name;
                $this->account_no= $bankdetails->account_no;
                $this->bank_address= $bankdetails->bank_address;
                $this->branch_name= $bankdetails->branch_name;
                $this->branch_code= $bankdetails->branch_code;
                $this->ifsc_code= $bankdetails->ifsc_code;
                $this->micr_code= $bankdetails->micr_code;
                $this->account_type= $bankdetails->account_type;
            }else{
                $this->dispatch('alert',type:'error',message:'Bank Details Not Found');
            }
            $this->setmode('view');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');
        }
    }

    public function render()
    {
        if($this->mode !== 'all'){
            $this->prefixes = Prefixmaster::select('id','prefix','prefix_shortform')->where('is_active',1)->get();
            $this->banknames = Banknamemaster::select('id','bank_name','bank_shortform')->where('is_active',1)->get();
            $this->roles= Role::select('id','role_name',)->get();
            $this->departments= Department::select('id','dept_name',)->where('status',1)->get();
            $this->colleges= College::select('id','college_name',)->where('status',1)->get();
        }
        $authFaculty = auth('faculty')->user();
        $faculties = Faculty::with(['role', 'department', 'college'])->when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.faculty.faculty.all-faculty',compact(['faculties','authFaculty']))->extends('layouts.faculty')->section('faculty');
    }
}
