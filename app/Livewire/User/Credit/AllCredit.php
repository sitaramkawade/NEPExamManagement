<?php

namespace App\Livewire\User\Credit;

use Excel;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Subjectcredit;
use App\Exports\User\Credit\ExportCredit;

class AllCredit extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    public $perPage=10;
    public $search='';
    public $sortColumn="credit";
    public $sortColumnBy="ASC";
    public $ext;  
    public $credit;  
    public $marks;  
    public $passing;  
    #[Locked] 
    public $delete_id;
    #[Locked] 
    public $credit_id;
    public $mode='all';
    public $steps=1;
    public $current_step=1;

    
    public function rules()
    {
        return [
        'credit' => ['required','numeric','between:0.00,9999.99'],
        'marks' =>  ['required','numeric','between:0.00,9999.99'],
        'passing' => ['required','max:5'],

         ];
    }

    public function messages()
    {   
        $messages = [
            'credit.required' => 'The Credit field is required.',
            'marks.required' => 'The Marks field is required.',
            'passing.required' => 'The Passing field is required.',    
        ];
        return $messages;
    }

    public function resetinput()
    {
        $this->credit=null;
        $this->marks=null;
        $this->passing=null;
      
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

    public function add(Subjectcredit  $credits ){
        
        $validatedData= $this->validate();
       
        if ($validatedData) {

        $credits->credit = $this->credit;
        $credits->marks = $this->marks;
        $credits->passing = $this->passing;
       
        }
        $credits->save();

        $this->dispatch('alert',type:'success',message:'Added Successfully !!'  );
        $this->setmode('all');
    }

    public function edit(Subjectcredit $credits){

        if ($credits) {
            $this->credit_id=$credits->id;
            $this->credit = $credits->credit;     
            $this->marks = $credits->marks;
            $this->passing = $credits->passing ;
            $this->setmode('edit');
        }
    }

    public function update(Subjectcredit  $credits){

        $validatedData= $this->validate();
       
        if ($validatedData) {        
            $credits->credit= $this->credit;
            $credits->marks= $this->marks;
            $credits->passing= $this->passing;
        }

        $credits->update();
        $this->dispatch('alert',type:'success',message:'Updated Successfully !!'  );
        $this->setmode('all');
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function delete(Subjectcredit  $credits)
    {   
        $credits->delete();
        $this->dispatch('alert',type:'success',message:'Credit Soft Deleted Successfully !!');
    }

    public function restore($id)
    {   
        $credits = Subjectcredit::withTrashed()->find($id);
        $credits->restore();
        $this->dispatch('alert',type:'success',message:'Credit Restored Successfully !!');
    }

    public function forcedelete()
    {  
        try
        {
        $credits = Subjectcredit::withTrashed()->find($this->delete_id);
        $credits->forceDelete();
        $this->dispatch('alert',type:'success',message:'Credit Deleted Successfully !!');
        } catch
        (\Illuminate\Database\QueryException $e) {
    
            if ($e->errorInfo[1] == 1451) {
    
                $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
            } 
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
        $filename="Credit-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportCredit($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportCredit($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportCredit($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function render()
    {
        $SubCredits=Subjectcredit::when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.credit.all-credit',compact('SubCredits'))->extends('layouts.user')->section('user');
    }
}
