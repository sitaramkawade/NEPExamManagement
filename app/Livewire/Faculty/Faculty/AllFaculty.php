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
use App\Exports\Faculty\ExportFaculty;

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
    public $faculty_verified;

    public $bank_name;
    public $account_no;
    public $bank_address;
    public $branch_name;
    public $branch_code;
    public $ifsc_code;
    public $micr_code;
    public $account_type;
    public $acc_verified;

    public $prefixes;
    public $roles;
    public $departments;
    public $colleges;
    public $banknames;

    public $faculty_id;
    public $facultybank_id;
    public $mode='all';
    public $per_page = 10;
    public $delete_id;

    public $perPage=10;
    public $search='';
    public $sortColumn="faculty_name";
    public $sortColumnBy="ASC";
    public $ext;
    public $isDisabled = true;

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
            // 'active' => ['required',],
            // 'faculty_verified' => ['required',],
            'account_no' => ['required', 'numeric','digits_between:8,16','unique:facultybankaccounts,account_no,'.($this->mode=='edit'? $this->facultybank_id :'')],
            'bank_address' => ['required', 'string', 'max:255',],
            'bank_name' => ['required', 'string', 'max:255',],
            'branch_name' => ['required', 'string', 'max:255',],
            'branch_code' => ['required', 'numeric', 'digits:4',],
            'ifsc_code' => ['required', 'string', 'size:11',],
            'micr_code' => ['required', 'numeric', 'digits:9',],
            'account_type' => ['required', 'in:C,S',],
            // 'acc_verified' => ['required', ],
        ];
    }

    public function messages()
    {
        return [
            'prefix.required' => 'Please select the prefix.',
            'faculty_name.string' => 'Please enter the faculty name as a string.',
            'email.required' => 'Please enter the faculty email.',
            'email.email' => 'Please enter a valid email address.',
            'mobile_no.required' => 'Please enter the mobile number.',
            'role_id.required' => 'Please select the role.',
            'department_id.required' => 'Please select the department.',
            'college_id.required' => 'Please select the college.',
            'active.required' => 'Please specify the active status.',
            'account_no.required' => 'Please enter the faculty account number.',
            'bank_address.required' => 'Please enter the bank address.',
            'bank_name.required' => 'Please enter the bank name.',
            'branch_name.required' => 'Please enter the branch name.',
            'branch_code.required' => 'Please enter the branch code.',
            'ifsc_code.required' => 'Please enter the IFSC code.',
            'micr_code.required' => 'Please enter the MICR code.',
            'account_type.required' => 'Please select the account type.',
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
        $faculty = Faculty::withTrashed()->find($this->delete_id);
        if($faculty){
            if($faculty->profile_photo_path){
                File::delete($faculty->profile_photo_path);
            }
            $faculty->forceDelete();
            $faculty->facultybankaccount()->forceDelete();
            $this->delete_id = null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'"Faculty Deleted Successfully !!');
        } else {
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');
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
            $this->setmode('all');
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

    // public function mount()
    // {
    //     $this->prefixes = Prefixmaster::where('is_active',1)->get();
    //     $this->banknames = Banknamemaster::where('is_active',1)->get();
    //     $this->roles= Role::all();
    //     $this->departments= Department::where('status',1)->get();
    //     $this->colleges= College::where('status',1)->get();
    // }

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
                return Excel::download(new ExportFaculty($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportFaculty($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportFaculty($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }

    }

    public function status(Faculty $faculty)
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
            $departmentId = $faculty->department()->first();
            $this->department_id = $departmentId;
            $roleId = $faculty->role()->first();
            $this->role_id = $roleId;
            $collegeId = $faculty->college()->first();
            $this->college_id= $collegeId;

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

        $faculties = Faculty::when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.faculty.faculty.all-faculty',compact('faculties'))->extends('layouts.faculty')->section('faculty');
    }
}
