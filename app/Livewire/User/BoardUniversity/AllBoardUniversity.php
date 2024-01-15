<?php

namespace App\Livewire\User\BoardUniversity;

use Excel;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Boarduniversity;
use App\Exports\User\BoardUniversity\BoardUniversityExport;

class AllBoardUniversity extends Component
{   
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    #[Locked] 
    public $delete_id;

    public $mode='all';
    public $perPage=10;
    public $search='';
    public $sortColumn="boarduniversity_name";
    public $sortColumnBy="ASC";
    public $ext;

    public $boarduniversity_name;
    public $is_active;
    #[Locked] 
    public $edit_id;


    public function rules()
    {
        return [
            'boarduniversity_name' => ['required', 'string','max:255','unique:boarduniversities,boarduniversity_name,' . ($this->mode == 'edit' ? $this->edit_id : ''),],
        ];
    }

    public function messages()
    {   
        $messages = [
            'boarduniversity_name.required' => 'The Board University Name field is required.',
            'boarduniversity_name.string' => 'TheBoard University Name must be a string.',
            'boarduniversity_name.max' => 'The  Board University Name must not exceed :max characters.',
            'boarduniversity_name.unique' => 'The Board University Name has already been taken.',
        ];
        
        return $messages;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->boarduniversity_name=null;
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
        $filename="Board-University-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new BoardUniversityExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new BoardUniversityExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new BoardUniversityExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function add()
    {
        $this->validate();

        $board_university =  new Boarduniversity;
        $board_university->create([
            'boarduniversity_name' => $this->boarduniversity_name,
            'is_active' => $this->is_active==true?0:1,
        ]);
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Board University Created Successfully !!');
    }


    public function edit(Boarduniversity $board_university)
    {   
        $this->resetinput();
        $this->edit_id=$board_university->id;
        $this->boarduniversity_name= $board_university->boarduniversity_name;
        $this->is_active=$board_university->is_active==1?0:true;
  
        $this->setmode('edit');
    }

    public function update(Boarduniversity $board_university)
    {
        $this->validate();

        $board_university->update([
            'boarduniversity_name' => $this->boarduniversity_name,
            'is_active' => $this->is_active == true ? 0 : 1,
        ]);
       
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Board University Updated Successfully !!');

    }

    public function status(Boarduniversity $board_university)
    {   
        if( $board_university->is_active)
        {
            $board_university->is_active=0;
        }
        else 
        {
            $board_university->is_active=1;
        }
        $board_university->update();

        $this->dispatch('alert',type:'success',message:'Board University Status Updated Successfully !!');
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }


    public function delete(Boarduniversity  $board_university)
    {   
        $board_university->delete();
        $this->dispatch('alert',type:'success',message:'Board University Soft Deleted Successfully !!');
    }
    
    public function restore($id)
    {   
        $board_university = Boarduniversity::withTrashed()->find($id);
        $board_university->restore();
        $this->dispatch('alert',type:'success',message:'Board University Restored Successfully !!');
    }

    public function forcedelete()
    {   
        $board_university = Boarduniversity::withTrashed()->find($this->delete_id);
        $board_university->forceDelete();
        $this->dispatch('alert',type:'success',message:'Board University Deleted Successfully !!');
    }

    public function render()
    {   
        $board_universities=Boarduniversity::select('id','boarduniversity_name','is_active','deleted_at')->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.board-university.all-board-university',compact('board_universities'))->extends('layouts.user')->section('user');
    }
}
