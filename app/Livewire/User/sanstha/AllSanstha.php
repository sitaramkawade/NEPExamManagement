<?php

namespace App\Livewire\User\Sanstha;

use Excel;
use App\Models\Sanstha;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\user\ExportSanstha;

class AllSanstha extends Component
{
    use WithPagination;
    public $mode;
    public $perPage=10;
    public $search='';
    public $sortColumn="sanstha_name";
    public $sortColumnBy="ASC";
    public $ext;

    public $steps=1;
    public $current_step=1;
    public $sanstha_name;
    public $sanstha_address;
    public $sanstha_chairman_name;
    public $sanstha_website_url;
    public $sanstha_contact_no;
    public $status;
    public $sanstha_id;

    protected function rules()
    {
        return [
        'sanstha_name' => ['required','string','max:255'],
        'sanstha_chairman_name' => ['required','string','max:255'],
        'sanstha_address' => ['required','string','max:255'],
        'sanstha_website_url' =>[ 'required','string','max:255'],
        'sanstha_contact_no' => ['required','max:10'],   
        ];
    }

    public function resetinput()
    {
         $this->sanstha_name=null;
         $this->sanstha_chairman_name=null;
         $this->sanstha_address=null;
         $this->sanstha_website_url=null;
         $this->sanstha_contact_no=null;
    }

    public function resetInputFields()
    {
        // Reset the specified properties to their initial state
        $this->reset(['sanstha_name', 'sanstha_chairman_name','sanstha_address','sanstha_contact_no','sanstha_website_url','status']);
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

    public function add(){

        $sanstha= new Sanstha;
        $sanstha->sanstha_name= $this->sanstha_name;
        $sanstha->sanstha_chairman_name= $this->sanstha_chairman_name;
        $sanstha->sanstha_address=  $this->sanstha_address;
        $sanstha->sanstha_website_url=  $this->sanstha_website_url;
        $sanstha->sanstha_contact_no= $this->sanstha_contact_no;
        $sanstha->status= $this->status==1?0:1;
        $sanstha->save();

        $this->dispatch('alert',type:'success',message:'Added Successfully !!'  );
        $this->resetInputFields();
    }

    public function deleteSanstha(Sanstha $sanstha)
    {

        if ($sanstha) {
            // Delete the Sanstha and its related colleges
            $sanstha->colleges()->delete();
            $sanstha->delete();
            $this->dispatch('alert',type:'success',message:'Deleted Successfully !!'  );

        }
    }

    public function edit(Sanstha $sanstha ){

        if ($sanstha) {
            $this->sanstha_id=$sanstha->id;
            $this->sanstha_name = $sanstha->sanstha_name;
            $this->sanstha_chairman_name = $sanstha->sanstha_chairman_name;
            $this->sanstha_contact_no = $sanstha->sanstha_contact_no;
            $this->sanstha_website_url = $sanstha->sanstha_website_url;
            $this->sanstha_address = $sanstha->sanstha_address;
            $this->status = $sanstha->status;          
            $this->setmode('edit');
        }
    }

    public function update(Sanstha  $sanstha){

        $validatedData = $this->validate();
       
        if ($validatedData) {
                   
            $sanstha->update([
                              
                'sanstha_name' => $this->sanstha_name,
                'sanstha_chairman_name' => $this->sanstha_chairman_name,               
                'sanstha_address' => $this->sanstha_address,
                'sanstha_contact_no' => $this->sanstha_contact_no,
                'sanstha_website_url' => $this->sanstha_website_url,                
                'status' => $this->status,
                     
            ]);

            $this->dispatch('alert',type:'success',message:'Updated Successfully !!'  );
            $this->setmode('all');        
    }
    }

    public function export()
    {   
        $filename="Sanstha-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportSanstha($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportSanstha($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportSanstha($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
       
    }


    public function render()
    {
        $sansthas=Sanstha::when($this->search, function ($query, $search) {
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.sanstha.all-sanstha',compact('sansthas'))->extends('layouts.user')->section('user');
    }
}
