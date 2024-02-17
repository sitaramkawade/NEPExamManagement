<?php

namespace App\Livewire\User\Programme;

use Excel;
use Livewire\Component;
use App\Models\Programme;
use Livewire\WithPagination;
use App\Exports\User\Progarmme\ProgrammeExport;

class AllProgramme extends Component
{   
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    #[Locked] 
    public $delete_id;

    public $mode='all';
    public $perPage=10;
    public $search='';
    public $sortColumn="programme_name";
    public $sortColumnBy="ASC";
    public $ext;

    public $programme_name;
    public $active;
    #[Locked] 
    public $edit_id;


    public function rules()
    {
        return [
            'programme_name' => ['required', 'string','max:100','unique:programmes,programme_name,' . ($this->mode == 'edit' ? $this->edit_id : ''),],
        ];
    }

    public function messages()
    {   
        $messages = [
            'programme_name.required' => 'The Programme Name field is required.',
            'programme_name.string' => 'The Programme Name must be a string.',
            'programme_name.max' => 'The  Programme Name must not exceed :max characters.',
            'programme_name.unique' => 'The Programme Name has already been taken.',
        ];
        
        return $messages;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->programme_name=null;
        $this->active=null;
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
        $filename="Programme-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ProgrammeExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ProgrammeExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ProgrammeExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function add()
    {
        $this->validate();

        $programme =  new Programme;
        $programme->create([
            'programme_name' => $this->programme_name,
            'active' => $this->active==true?0:1,
        ]);
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Programme Created Successfully !!');
    }


    public function edit(Programme $programme)
    {   
        $this->resetinput();
        $this->edit_id=$programme->id;
        $this->programme_name= $programme->programme_name;
        $this->active=$programme->active==1?0:true;
  
        $this->setmode('edit');
    }

    public function update(Programme $programme)
    {
        $this->validate();

        $programme->update([
            'programme_name' => $this->programme_name,
            'active' => $this->active == true ? 0 : 1,
        ]);
       
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Programme Updated Successfully !!');

    }

    public function status(Programme $programme)
    {   
        if( $programme->active)
        {
            $programme->active=0;
        }
        else 
        {
            $programme->active=1;
        }
        $programme->update();

        $this->dispatch('alert',type:'success',message:'Programme Status Updated Successfully !!');
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }


    public function delete(Programme  $programme)
    {   
        $programme->delete();
        $this->dispatch('alert',type:'success',message:'Programme Soft Deleted Successfully !!');
    }
    
    public function restore($id)
    {   
        $programme = Programme::withTrashed()->find($id);
        $programme->restore();
        $this->dispatch('alert',type:'success',message:'Programme Restored Successfully !!');
    }

    public function forcedelete()
    {  
        try 
        {
            $programme = Programme::withTrashed()->find($this->delete_id);
            $programme->forceDelete();
            $this->dispatch('alert',type:'success',message:'Programme Deleted Successfully !!');
            
        } catch (\Illuminate\Database\QueryException $e) {

            if ($e->errorInfo[1] == 1451) {

                $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
            } 
        } 
    }

    public function render()
    {   
        $programmes=Programme::select('id','programme_name','active','deleted_at')->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.programme.all-programme',compact('programmes'))->extends('layouts.user')->section('user');
    }
}
