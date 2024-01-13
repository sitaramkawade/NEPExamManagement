<?php

namespace App\Livewire\User\College;

use Excel;
use App\Models\College;
use App\Models\Sanstha;
use Livewire\Component;
use App\Models\University;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Exports\User\College\CollegeExport;


class AllCollege extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $perPage=10;
    public $search='';
    public $sortColumn="college_name";
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
    public $is_default;
    public $mode='all';
  
    protected function rules()
    {
        return [
        'college_name' => ['required','string','max:255'],
        'college_address' => ['required','string','max:255'],
        'college_website_url' => ['required','string','max:255'],
        'college_email' => ['required','email'],
        'college_contact_no' => ['required','max:10'],
        'college_logo_path' =>['required','max:250','mimes:png,jpg,jpeg'],
        'sanstha_id' => ['required'],
        'university_id' => ['required'],
       
         ];
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

    public function deleteCollege(College $college)
    {
        if ($college) {
            // Delete the colleges and its related patterns
            $college->patterns()->delete();
            $college->delete();
            $this->mount();
            $this->dispatch('alert',type:'success',message:'Deleted Successfully !!'  );

        }
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
        $colleges=College::when($this->search, function ($query, $search) {
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.college.all-college',compact('colleges'))->extends('layouts.user')->section('user');
    }
}
