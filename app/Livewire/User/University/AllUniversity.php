<?php

namespace App\Livewire\User\University;

use Excel;
use Livewire\Component;
use App\Models\University;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Exports\User\University\ExportUniversity;


class AllUniversity extends Component
{
    use WithFileUploads;
    public $mode='all';
    public $current_step=1;
    public $steps=1;
    public $university_name;
    public $university_address;
    public $university_website_url;
    public $university_email;
    public $university_contact_no;
    public $university_logo_path;
    public $university_logo_path_old;
    public $university_id;
    public $status;
    use WithPagination;
    public $perPage=10; 
    public $search='';
    public $sortColumn="university_name";
    public $sortColumnBy="ASC";
    public $ext;

    protected function rules()
    {
        return [
        'university_name' => ['required','string','max:255'],
        'university_address' => ['required','string','max:255'],
        'university_website_url' =>['required','string','max:255'],
        'university_email' => ['required','email'],
        'university_contact_no' =>[ 'required','max:10'],
        'university_logo_path' =>['required','max:250','mimes:png,jpg,jpeg'],
        ];
    }

    public function resetinput()
    {
         $this->university_name=null;
         $this->university_address=null;
         $this->university_website_url=null;
         $this->university_email=null;
         $this->university_contact_no=null;
         $this->university_logo_path=null;
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
        $this->mode=$mode;
    }

    public function resetInputFields()
    {
        // Reset the specified properties to their initial state
        $this->reset(['university_name', 'university_address','university_website_url','university_address',
        'university_email','university_contact_no','university_logo_path']);
    }
    
    public function add(){
        $validatedData= $this->validate();

        if ($validatedData) { 

        $university= new University;
        $university->university_name= $this->university_name;
        $university->university_address=  $this->university_address;
        $university->university_website_url=  $this->university_website_url;
        $university->university_email= $this->university_email;
        $university->university_contact_no= $this->university_contact_no;
        $university->status= $this->status;
        
        if ($this->university_logo_path) {
           
            $path = 'user/profile/photo/';         
            $fileName = 'user-' . time(). '.' . $this->university_logo_path->getClientOriginalExtension();               
            $this->university_logo_path->storeAs($path, $fileName, 'public');         
            $university->university_logo_path = 'storage/' . $path . $fileName;
            $this->reset('university_logo_path');
        }
        
        $university->save();

        $this->dispatch('alert',type:'success',message:'Added Successfully !!'  );
        $this->setmode('all');
       
    }
}
    
    public function delete( University  $university )
    {
      
        if ($university) {
         
            $university->colleges()->delete();
            $university->delete();
            $this->dispatch('alert',type:'success',message:'Deleted Successfully !!' );

        }
    }

    public function edit(University $university){


        if ($university) {
            $this->university_id=$university->id;
            $this->university_name = $university->university_name;
            $this->university_email = $university->university_email;
            $this->university_contact_no = $university->university_contact_no;
            $this->university_website_url = $university->university_website_url;
            $this->university_logo_path_old = $university->university_logo_path;
            $this->university_address = $university->university_address;
            $this->status = $university->status;
            $this->setmode('edit');
           
        }
    }

    public function update(University  $university){

        $validatedData= $this->validate();

       
        if ($validatedData) {        
            $university->university_name= $this->university_name;
            $university->university_email=  $this->university_email;
            $university->university_contact_no=  $this->university_contact_no;
            $university->university_website_url= $this->university_website_url;
            $university->university_address= $this->university_address;
            $university->status= $this->status;
        
        if ($this->university_logo_path) {
           
            $path = 'user/profile/photo/';           
            $fileName = 'user-' . time(). '.' . $this->university_logo_path->getClientOriginalExtension();
            $this->university_logo_path->storeAs($path, $fileName, 'public');
            $university->university_logo_path = 'storage/' . $path . $fileName;
            $this->reset('university_logo_path');
        }
            $university->update();

            $this->dispatch('alert',type:'success',message:'Updated Successfully !!'  );
            $this->setmode('all');
        }
    
    }

    public function Status(University $university)
    {
        if($university->status)
        {
            $university->status=0;
        }
        else
        {
            $university->status=1;
        }
        $university->update();
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
        $filename="University-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportUniversity($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportUniversity($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportUniversity($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
       
    }

    public function render()
    {
        $universities=University::when($this->search, function ($query, $search) {
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.university.all-university',compact('universities'))->extends('layouts.user')->section('user');
    }
}
