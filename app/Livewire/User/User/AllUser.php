<?php

namespace App\Livewire\User\User;

use Excel;
use App\Models\Role;
use App\Models\User;
use App\Models\College;
use Livewire\Component;
use App\Models\Department;
use Livewire\WithPagination;
use App\Exports\User\User\ExportUser;


class AllUser extends Component
{
  
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    public $perPage=10;
    public $search='';
    public $sortColumn="name";
    public $sortColumnBy="ASC";
    public $ext;
    public $steps=1;
    public $current_step=1;
    public $name;
    public $email;
    public $college_id;
    public $department_id;
    public $password;
    public $user_contact_no;
    public $remember_token;
    public $colleges;
    public $departments;
    public $user_id;
    public $is_active;
    public $role_id;
    public $roles;
    public $mode='all';
    #[Locked] 
    public $delete_id;

    protected function rules()
    {
        return [
        'name' => ['required','string','max:255'],
        'email' => ['required','email'],
        'password'=>['required','min:8'],
        'college_id'=>['required'],
        'department_id'=>['required'],
        'role_id'=>['required'],
        'is_active'=>['required'],
        'user_contact_no'=>['required'],
        ];
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function resetinput()
    {
        $this->name=null;
        $this->email=null;
        $this->password=null;
        $this->college_id=null;
        $this->department_id=null;
        $this->remember_token=null;
        $this->user_contact_no=null;
        $this->role_id=null;
        $this->is_active=null;
    }

    public function setmode($mode)
    {
        if($mode=='add')
        {
            $this->resetinput();
        }
        $this->mode=$mode;
    }

    
    public function add(User  $user ){
        
        $validatedData= $this->validate();
        
        if ($validatedData) {
            
            $user->name= $this->name;
            $user->email= $this->email;
            $user->password= $this->password;
            $user->remember_token= $this->remember_token;
            $user->college_id= $this->college_id;
            $user->department_id= $this->department_id;
            $user->role_id= $this->role_id;
            $user->is_active= $this->is_active;
            $user->user_contact_no= $this->user_contact_no;
            -
            $user->save();
            
            $this->dispatch('alert',type:'success',message:'Added Successfully !!'  );
            $this->setmode('all');
        }
    }
    
    public function edit(User $user ){
        
        if ($user) {
            $this->user_id=$user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->user_contact_no = $user->user_contact_no;
            $this->college_id = $user->college_id;
            $this->department_id = $user->department_id;          
            $this->role_id=$user->role_id;        
            $this->is_active = $user->is_active;          
            $this->setmode('edit');
        }
    }
    
    public function update(User  $user){
        
        $validatedData = $this->validate();
        
        if ($validatedData) {
            
            $user->update([
                
                'name' => $this->name,
                'email' => $this->email,               
                'password' => $this->password,
                'user_contact_no' => $this->user_contact_no,
                'college_id' => $this->college_id,                
                'department_id' => $this->department_id,
                'role_id'=>$this->role_id,
                'is_active' => $this->is_active,
                
            ]);
            
            $this->dispatch('alert',type:'success',message:'Updated Successfully !!'  );
            $this->setmode('all');        
        }
    }
    
    
    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }
    
    
    public function delete(User  $user)
    {   
        $user->delete();
        $this->dispatch('alert',type:'success',message:'User Soft Deleted Successfully !!');
    }

    public function restore($id)
    {   
        $user = User::withTrashed()->find($id);
        $user->restore();
        $this->dispatch('alert',type:'success',message:'User Restored Successfully !!');
    }
    
    public function forcedelete()
    {  
        try
       { 
        $user = User::withTrashed()->find($this->delete_id);
        $user->forceDelete();
        $this->dispatch('alert',type:'success',message:'User Deleted Successfully !!');
    } catch
    (\Illuminate\Database\QueryException $e) {
   
           if ($e->errorInfo[1] == 1451) {
   
               $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
            } 
        }
    }

    public function Status(User $user)
    {
        if($user->is_active)
        {
            $user->is_active=0;
        }
        else
        {
            $user->is_active=1;
        }
        $user->update();
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

    public function export()
    {   
        $filename="User-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportUser($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
                break;
                case 'csv':
                    return Excel::download(new ExportUser($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
                    break;
                    case 'pdf':
                return Excel::download(new ExportUser($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
        
    }
    
    public function mount()
    {
        $this->colleges = College::all();
        $this->departments = Department::all();  
        $this->roles=Role::all();
    }

    public function render()
    {
        $this->colleges=College::where('status',1)->pluck('college_name','id');
        $this->departments=Department::where('status',1)->pluck('dept_name','id');
        $this->roles=Role::pluck('role_name','id');

        $users=User::when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.user.all-user',compact('users'))->extends('layouts.user')->section('user');
    }
}
