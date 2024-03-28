<?php

namespace App\Livewire\User\PaperSet;

use Excel;
use Livewire\Component;
use App\Models\Paperset;
use Livewire\WithPagination;
use App\Exports\User\Paperset\ExportPaperSet;

class AllPaperSet extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'forcedelete'];

    public $mode='all';
    public $per_page = 10;
    public $perPage=10;
    public $search='';
    public $sortColumn="set_name";
    public $sortColumnBy="ASC";
    public $ext;
    public $set_name;

    #[Locked]
    public $paper_id;
    #[Locked]
    public $delete_id;

    public function rules()
    {
        return [
        'set_name' => ['required','string','max:1'],
        ];
    }

    public function messages()
    {   
        $messages = [
            'set_name.required' => 'The Set Name field is required.',
            'set_name.string' => 'The Set Name must be a char.',
            'set_name.max' => 'The  Set Name must not exceed :max characters.',
        ];
        return $messages;
    }
    
    public function resetinput()
    {
        $this->set_name=null;  
    }

    public function setmode($mode)
    {
        if($mode=='add')
        {
            $this->resetinput();
        }
        $this->mode=$mode;
    }

    public function save(Paperset  $paperset ){
        
        $validatedData= $this->validate();
       
        if ($validatedData) {

        $paperset->set_name= $this->set_name;
        $paperset->save();

        $this->dispatch('alert',type:'success',message:'Paper Set Added Successfully !!'  );
        $this->setmode('all');
        }
    }

    public function edit(Paperset $paperset)
    {
            $this->paper_id=$paperset->id;
            $this->set_name = $paperset->set_name;
            
            $this->setmode('edit');
    }

    public function update(Paperset  $paperset)
    {
        $paperset->update([
        $paperset->set_name= $this->set_name
        ]);
        $this->dispatch('alert',type:'success',message:'Paper Set Updated Successfully !!'  );
        $this->setmode('all');
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

   
    public function delete(Paperset  $paperset)
    {   
        $paperset->delete();
        $this->dispatch('alert',type:'success',message:'Paper Set Soft Deleted Successfully !!');
    }

    public function restore($id)
    {   
        $paperset = Paperset::withTrashed()->find($id);
        $paperset->restore();
        $this->dispatch('alert',type:'success',message:'Paper Set Restored Successfully !!');
    }

    public function forcedelete()
    {  try
        {
            $paperset = Paperset::withTrashed()->find($this->delete_id);
            $paperset->forceDelete();
            $this->dispatch('alert',type:'success',message:'Paper Set Deleted Successfully !!');
            } catch
            (\Illuminate\Database\QueryException $e) {
    
            if ($e->errorInfo[1] == 1451) {
    
                $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
            } 
        }
    }

    public function export()
    {   
        $filename="Paperset-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportPaperSet($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportPaperSet($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportPaperSet($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
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
    
    public function render()
    {
        $papersets=Paperset::select('id','set_name','deleted_at')->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);
        return view('livewire.user.paper-set.all-paper-set',compact('papersets'))->extends('layouts.user')->section('user');
    }
}
