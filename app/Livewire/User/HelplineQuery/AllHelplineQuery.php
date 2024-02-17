<?php

namespace App\Livewire\User\HelplineQuery;

use Excel;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Locked;
use App\Models\Studenthelplinequery;
use App\Models\Studenthelplinequeryquery;
use App\Exports\User\HelplineQuery\HelplineQueryExport;

class AllHelplineQuery extends Component
{   
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    #[Locked] 
    public $delete_id;

    public $mode='all';
    public $perPage=10;
    public $search='';
    public $sortColumn="query_name";
    public $sortColumnBy="ASC";
    public $ext;

    public $query_name;
    public $is_active;
    #[Locked] 
    public $edit_id;


    public function rules()
    {
        return [
            'query_name' => ['required', 'string','max:255','unique:student_helpline_queries,query_name,' . ($this->mode == 'edit' ? $this->edit_id : ''),],
        ];
    }

    public function messages()
    {   
        $messages = [
            'query_name.required' => 'The Query Name field is required.',
            'query_name.string' => 'The Query Name must be a string.',
            'query_name.max' => 'The  Query Name must not exceed :max characters.',
            'query_name.unique' => 'The Query Name has already been taken.',
        ];
        
        return $messages;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->query_name=null;
        $this->is_active=null;
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
        $filename="Helpline-Query-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new HelplineQueryExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new HelplineQueryExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new HelplineQueryExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function add()
    {
        $this->validate();

        $helpline_query =  new Studenthelplinequery;
        $helpline_query->create([
            'query_name' => $this->query_name,
            'is_active' => $this->is_active==true?0:1,
        ]);
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Helpline Query Created Successfully !!');
    }


    public function edit(Studenthelplinequery $helpline_query)
    {   
        $this->resetinput();
        $this->edit_id=$helpline_query->id;
        $this->query_name= $helpline_query->query_name;
        $this->is_active=$helpline_query->is_active==1?0:true;
  
        $this->setmode('edit');
    }

    public function update(Studenthelplinequery $helpline_query)
    {
        $this->validate();

        $helpline_query->update([
            'query_name' => $this->query_name,
            'is_active' => $this->is_active == true ? 0 : 1,
        ]);
       
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Helpline Query Updated Successfully !!');

    }

    public function status(Studenthelplinequery $helpline_query)
    {   
        if( $helpline_query->is_active)
        {
            $helpline_query->is_active=0;
        }
        else 
        {
            $helpline_query->is_active=1;
        }
        $helpline_query->update();

        $this->dispatch('alert',type:'success',message:'Helpline Query Status Updated Successfully !!');
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }


    public function delete(Studenthelplinequery  $helpline_query)
    {   
        $helpline_query->delete();
        $this->dispatch('alert',type:'success',message:'Helpline Query Soft Deleted Successfully !!');
    }
    
    public function restore($id)
    {   
        $helpline_query = Studenthelplinequery::withTrashed()->find($id);
        $helpline_query->restore();
        $this->dispatch('alert',type:'success',message:'Helpline Query Restored Successfully !!');
    }

    public function forcedelete()
    {   
        try 
        {
            $helpline_query = Studenthelplinequery::withTrashed()->find($this->delete_id);
            $helpline_query->forceDelete();
            $this->dispatch('alert',type:'success',message:'Helpline Query Deleted Successfully !!');
            
        } catch (\Illuminate\Database\QueryException $e) {

            if ($e->errorInfo[1] == 1451) {

                $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
            } 
        }
    }

    public function render()
    {   
        $student_helpline_queries=Studenthelplinequery::select('id','query_name','is_active','deleted_at')->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.helpline-query.all-helpline-query',compact('student_helpline_queries'))->extends('layouts.user')->section('user');
    }
}
