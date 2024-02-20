<?php

namespace App\Livewire\User\Ratehead;

use Excel;
use Livewire\Component;
use App\Models\Ratehead;
use Livewire\WithPagination;
use App\Exports\User\Ratehead\ExportRatehead;

class AllRateHead extends Component
{
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    #[Locked] 
    public $delete_id;

    public $mode='all';
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;

    public $headname;
    public $type;
    public $noofcredit;
    public $course_type;
    public $amount;
    public $status; 
    #[Locked] 
    public $edit_id;

    public function rules()
    {
        return [
        'headname' => ['required','string'],
        'type' => ['required','string','max:2'],      
        'noofcredit' => ['required','numeric','max:11'],      
        'course_type' => ['required','string','max:20'],      
        'amount' => ['required','numeric','digits_between:8,2'],      
         ];
    }

    public function messages()
    {   
        $messages = [
            'headname.required' => 'The Head Name field is required.',
            'headname.string' => 'The Head Name must be a string.',
            'headname.max' => 'The  Head Name must not exceed :max characters.',
            'type.required' => 'The type field is required.',
            'type.string' => 'The type must be a string.',
            'type.max' => 'The  type must not exceed :max characters.',
            'course_type.required' => 'The Course type field is required.',
            'course_type.string' => 'The Course type must be a string.',
            'course_type.max' => 'The Course type must not exceed :max characters.',
            'noofcredit.required' => 'The No of Credit field is required.',
            'noofcredit.numeric' => 'The No of Credit must be a numeric.',
            'noofcredit.max' => 'The  No of Credit must not exceed :max characters.',
            'amount.required' => 'The amount field is required.',
            'amount.numeric' => 'The amount must be a numeric.',
             'amount.digits_between' => 'The  amount must not exceed :digits_between characters.',
             ];
        return $messages;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->edit_id=null;
        $this->headname= null;
        $this->type=null;
        $this->noofcredit=null;
        $this->course_type=null;
        $this->amount=null;
        $this->status=null;
       
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
        $filename="Rate-head-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportRatehead($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportRatehead($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportRatehead($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function add()
    {
        $this->validate();

       $ratehead =  new Ratehead;
       $ratehead->create([
            'headname' => $this->headname,
            'type' => $this->type,
            'noofcredit' => $this->noofcredit,
            'course_type' => $this->course_type,
            'amount' => $this->amount,
            'status' => $this->status,
        ]);
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Rate Head Created Successfully !!');
    }

    public function edit(Ratehead $ratehead)
    {   
        $this->resetinput();
        $this->edit_id=$ratehead->id;
        $this->headname=$ratehead->headname;
        $this->type=$ratehead->type;   
        $this->noofcredit=$ratehead->noofcredit;   
        $this->course_type=$ratehead->course_type;   
        $this->amount=$ratehead->amount;   
        $this->status=$ratehead->status;   
        $this->setmode('edit');
    }

    public function update(Ratehead $ratehead)
    {
        $this->validate();

       $ratehead->update([
            'headname' => $this->headname,
            'type' => $this->type,
            'noofcredit' => $this->noofcredit,
            'course_type' => $this->course_type,
            'amount' => $this->amount,
            'status' => $this->status,
        ]);
       
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Ratehead Updated Successfully !!');

    }

    public function Status(Ratehead $ratehead)
    {
        if($ratehead->status)
        {
            $ratehead->status=0;
        }
        else
        {
            $ratehead->status=1;
        }
        $ratehead->update();
    }


    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function delete(Ratehead  $ratehead)
    {   
        $ratehead->delete();
        $this->dispatch('alert',type:'success',message:'Ratehead Soft Deleted Successfully !!');
    }


    public function restore($id)
    {   
       $ratehead = Ratehead::withTrashed()->find($id);
       $ratehead->restore();
        $this->dispatch('alert',type:'success',message:'Ratehead Restored Successfully !!');
    }

    public function forcedelete()
    {  
        try
       {  
       $ratehead = Ratehead::withTrashed()->find($this->delete_id);
       $ratehead->forceDelete();
        $this->dispatch('alert',type:'success',message:'Ratehead Deleted Successfully !!');
     } catch
    (\Illuminate\Database\QueryException $e) {

        if ($e->errorInfo[1] == 1451) {

            $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
        } 
    }
    }

    
    public function render()
    {
        $rateheads=Ratehead::when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.ratehead.all-rate-head',compact('rateheads'))->extends('layouts.user')->section('user');
    }
}
