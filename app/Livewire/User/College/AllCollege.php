<?php

namespace App\Livewire\User\College;

use Excel;
use App\Models\College;
use App\Models\Sanstha;
use Livewire\Component;
use App\Models\University;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Exports\User\College\CollegeExport;
use App\Exports\User\College\ExportCollege;


class AllCollege extends Component
{   
    use WithFileUploads;
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;
    public $steps=1;
    public $current_step=1;
    public $college_id;
    public $college_name;
    public $college_address;
    public $college_website_url;
    public $college_email;
    public $college_contact_no;
    public $college_logo_path;
    public $college_logo_path_old;
    public $sanstha_id;
    public $sansthas;
    public $university_id;
    public $universities;
    public $status;
    public $can_update=0;
    #[Locked] 
    public $delete_id;
    public $is_default;
    public $mode='all';
  

    public function rules()
    {
        return [
        'college_name' => ['required','string','max:255'],
        'college_address' => ['required','string','max:255'],
        'college_website_url' => ['required','string','max:100'],
        'college_email' => ['required','email'],
        'college_contact_no' => ['required','numeric'],
        'college_logo_path' =>[($this->can_update==1?'nullable':'required'),'max:250','mimes:png,jpg,jpeg'],
        'sanstha_id' => ['required',Rule::exists('sansthas', 'id')],
        'university_id' => ['required',Rule::exists('universities', 'id')],
       
         ];
    }

    public function messages()
    {   
        $messages = [
            'college_name.required' => 'The College Name field is required.',
            'college_name.string' => 'The College Name must be a string.',
            'college_name.max' => 'The  College Name must not exceed :max characters.',
            'college_address.required' => 'The College Address field is required.',
            'college_address.string' => 'The College Address must be a string.',
            'college_address.max' => 'The  College Address must not exceed :max characters.',
            'college_email.required' => 'The  College Email  field is required.',
            'college_website_url.required' => 'The  College Website Url field is required.',
            'college_contact_no.required' => 'The  College Contact Number field is required.',
            'college_logo_path.required' => 'The  College Logo is required.',
            'sanstha_id.required' => 'The Sanstha field is required.',
            'sanstha_id.exists' => 'The selected Programme does not exist.',
            'university_id.required' => 'The Sanstha field is required.',
            'university_id.exists' => 'The selected Programme does not exist.',
        ];
        return $messages;
    }

    

    public function resetinput()
    {
        $this->college_name=null;
        $this->college_address=null;
        $this->college_website_url=null;
        $this->college_email=null;
        $this->college_contact_no=null;
        $this->college_logo_path=null;
        $this->sanstha_id=null;
        $this->university_id=null;
        $this->status=null;
        $this->is_default=null;
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function setmode($mode)
    {
        if($mode=='add')
        {
            $this->resetinput();
        }
        $this->mode=$mode;
    }


    public function add(College  $college ){
        
        $validatedData= $this->validate();
       
        if ($validatedData) {

        $college->college_name= $this->college_name;
        $college->college_address=  $this->college_address;
        $college->college_website_url=  $this->college_website_url;
        $college->college_email= $this->college_email;
        $college->college_contact_no= $this->college_contact_no;
        $college->sanstha_id= $this->sanstha_id;
        $college->university_id= $this->university_id;
        $college->status= $this->status;
        $college->is_default= $this->is_default==1?0:1;
        
        if ($this->college_logo_path) {
            $path = 'user/profile/photo/';           
            $fileName = 'user-' . time(). '.' . $this->college_logo_path->getClientOriginalExtension();
            $this->college_logo_path->storeAs($path, $fileName, 'public');
            $college->college_logo_path = 'storage/' . $path . $fileName;
            $this->reset('college_logo_path');
        }
        
        $college->save();

        $this->dispatch('alert',type:'success',message:'Added Successfully !!'  );
        $this->setmode('all');
    }
    }

    public function mount()
    {
        $this->sansthas = Sanstha::all();
        $this->universities = University::all();        
      
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

   
    public function delete(College  $college)
    {   
        $college->delete();
        $this->dispatch('alert',type:'success',message:'College Soft Deleted Successfully !!');
    }

    public function restore($id)
    {   
        $college = College::withTrashed()->find($id);
        $college->restore();
        $this->dispatch('alert',type:'success',message:'College Restored Successfully !!');
    }

    public function forcedelete()
    {  
        $college = College::withTrashed()->find($this->delete_id);
        $college->forceDelete();
        $this->dispatch('alert',type:'success',message:'College Deleted Successfully !!');
    }

    public function Status(College $college)
    {
        if($college->status)
        {
            $college->status=0;
        }
        else
        {
            $college->status=1;
        }
        $college->update();
    }

    public function edit(College $college){

        if ($college) {
            if($college->college_logo_path){
                $this->can_update=1;
            }
            $this->college_id=$college->id;
            $this->college_name = $college->college_name;
            $this->college_email = $college->college_email;
            $this->college_contact_no = $college->college_contact_no;
            $this->college_website_url = $college->college_website_url;
            $this->college_logo_path_old = $college->college_logo_path;
            $this->college_address = $college->college_address;
            $this->sanstha_id = $college->sanstha_id;
            $this->university_id = $college->university_id;
            $this->status = $college->status ;
            $this->is_default = $college->is_default==0?true:0 ;
            $this->setmode('edit');
        }
    }

    public function updateCollege(College  $college){

        $validatedData= $this->validate();
       
        if ($validatedData) {        
            $college->college_name= $this->college_name;
            $college->college_address=  $this->college_address;
            $college->college_website_url=  $this->college_website_url;
            $college->college_email= $this->college_email;
            $college->college_contact_no= $this->college_contact_no;
            $college->sanstha_id= $this->sanstha_id;
            $college->university_id= $this->university_id;
            $college->status= $this->status;
            $college->is_default= $this->is_default==1?0:1;
        
        if ($this->college_logo_path) {
           
            $path = 'user/profile/photo/';           
            $fileName = 'user-' . time(). '.' . $this->college_logo_path->getClientOriginalExtension();
            $this->college_logo_path->storeAs($path, $fileName, 'public');
            $college->college_logo_path = 'storage/' . $path . $fileName;
            $this->reset('college_logo_path');
        }
            $college->update();

            $this->dispatch('alert',type:'success',message:'Updated Successfully !!'  );
            $this->setmode('all');
        }
    
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
        $filename="College-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new CollegeExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new CollegeExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new CollegeExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
       
    }
       


    public function render()

    {
        $this->sansthas=Sanstha::select('sanstha_name','id')->where('status',1)->get();
        $this->universities=University::select('university_name','id')->where('status',1)->get();

        $colleges=College::select('id','college_name','college_email','college_address','college_website_url','college_contact_no','sanstha_id','university_id','college_logo_path','status','deleted_at')
       ->with(['sanstha:sanstha_name,id','university:university_name,id'])
        ->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.college.all-college',compact('colleges'))->extends('layouts.user')->section('user');
    }
}
