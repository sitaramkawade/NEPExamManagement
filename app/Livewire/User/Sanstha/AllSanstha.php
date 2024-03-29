<?php

namespace App\Livewire\User\Sanstha;

use Excel;
use App\Models\Sanstha;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\User\Sanstha\ExportSanstha;


class AllSanstha extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    public $mode='all';
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
    #[Locked] 
    public $delete_id;

    protected function rules()
    {
        return [
        'sanstha_name' => ['required','string','max:255'],
        'sanstha_chairman_name' => ['required','string','max:50'],
        'sanstha_address' => ['required','string','max:255'],
        'sanstha_website_url' =>[ 'required','string','max:50'],
        'sanstha_contact_no' => ['required','max:20'],   
        ];
    }

    public function messages()
    {   
        $messages = [
            'sanstha_name.required' => 'The Sanstha Name field is required.',
            'sanstha_name.string' => 'The Sanstha Name must be a string.',
            'sanstha_name.max' => 'The  Sanstha Name must not exceed :max characters.',
            'sanstha_chairman_name.required' => 'The Sanstha Chairman Name field is required.',
            'sanstha_chairman_name.string' => 'The Sanstha Chairman Name must be a string.',
            'sanstha_chairman_name.max' => 'The  Sanstha Chairman Name must not exceed :max characters.',
            'sanstha_address.required' => 'The Sanstha Address field is required.',
            'sanstha_address.string' => 'The Sanstha Address must be a string.',
            'sanstha_address.max' => 'The  Sanstha Address must not exceed :max characters.',
            'sanstha_website_url.required' => 'The Sanstha Website Url field is required.',
            'sanstha_website_url.max' => 'The Sanstha Website Url not exceed :max characters.',
            'sanstha_contact_no.required' => 'The Sanstha Contact Number field is required.',
        ];
        return $messages;
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
        
        $validatedData = $this->validate();
       
        if ($validatedData) {

        $sanstha= new Sanstha;
        $sanstha->sanstha_name= $this->sanstha_name;
        $sanstha->sanstha_chairman_name= $this->sanstha_chairman_name;
        $sanstha->sanstha_address=  $this->sanstha_address;
        $sanstha->sanstha_website_url=  $this->sanstha_website_url;
        $sanstha->sanstha_contact_no= $this->sanstha_contact_no;
        $sanstha->status= $this->status==1?0:1;
        $sanstha->save();

        $this->dispatch('alert',type:'success',message:'Added Successfully !!'  );
        $this->setmode('all');
    }
}

public function deleteconfirmation($id)
{
    $this->delete_id=$id;
    $this->dispatch('delete-confirmation');
}


public function delete(Sanstha  $sanstha)
{   
    $sanstha->delete();
    $this->dispatch('alert',type:'success',message:'Sanstha Soft Deleted Successfully !!');
}

public function restore($id)
{   
    $sanstha = Sanstha::withTrashed()->find($id);
    $sanstha->restore();
    $this->dispatch('alert',type:'success',message:'Sanstha Restored Successfully !!');
}

public function forcedelete()
{  
    $sanstha = Sanstha::withTrashed()->find($this->delete_id);
    $sanstha->forceDelete();
    $this->dispatch('alert',type:'success',message:'Sanstha Deleted Successfully !!');
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

    public function Status(Sanstha $sanstha)
    {
        if($sanstha->status)
        {
            $sanstha->status=0;
        }
        else
        {
            $sanstha->status=1;
        }
        $sanstha->update();
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
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.sanstha.all-sanstha',compact('sansthas'))->extends('layouts.user')->section('user');
    }
}
