<?php

namespace App\Livewire\User\TimeTableSlot;

use Excel;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Timetableslot;
use App\Exports\User\TimeTableSlot\TimeTableSlotExport;

class AllTimeTableSlot extends Component
{   
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    #[Locked] 
    public $delete_id;

    public $mode='all';
    public $perPage=10;
    public $search='';
    public $sortColumn="timeslot";
    public $sortColumnBy="ASC";
    public $ext;

    public $slot;
    public $timeslot;
    public $isactive;
    #[Locked] 
    public $edit_id;


    public function rules()
    {
        return [
            'timeslot' => ['required', 'string','max:80','unique:timetableslots,timeslot,' . ($this->mode == 'edit' ? $this->edit_id : ''),],
            'slot' => ['required', 'integer', 'digits_between:1,10'],
        ];
    }

    public function messages()
    {   
        $messages = [
            'timeslot.required' => 'The Time Slot field is required.',
            'timeslot.string' => 'The Time Slot must be a string.',
            'timeslot.max' => 'The  Time Slot must not exceed :max characters.',
            'timeslot.unique' => 'The Time Slot has already been taken.',
            'slot.required' => 'The Slot field is required.',
            'slot.integer' => 'The slot must be an integer.',
            'slot.digits_between' => 'The slot must be between :min and :max digits.',
        ];
        
        return $messages;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->slot=null;
        $this->timeslot=null;
        $this->isactive=null;
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
        $filename="Time-Table-Slot-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new TimeTableSlotExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new TimeTableSlotExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new TimeTableSlotExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function add()
    {
        $this->validate();

        $time_table_slot =  new Timetableslot;
        $time_table_slot->create([
            'slot' => $this->slot,
            'timeslot' => $this->timeslot,
            'isactive' => $this->isactive==true?0:1,
        ]);
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Time Table Slot Created Successfully !!');
    }


    public function edit(Timetableslot $time_table_slot)
    {   
        $this->resetinput();
        $this->edit_id=$time_table_slot->id;
        $this->slot= $time_table_slot->slot;
        $this->timeslot= $time_table_slot->timeslot;
        $this->isactive=$time_table_slot->isactive==1?0:true;
  
        $this->setmode('edit');
    }

    public function update(Timetableslot $time_table_slot)
    {
        $this->validate();

        $time_table_slot->update([
            'slot' => $this->slot,
            'timeslot' => $this->timeslot,
            'isactive' => $this->isactive == true ? 0 : 1,
        ]);
       
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Time Table Slot Updated Successfully !!');

    }

    public function status(Timetableslot $time_table_slot)
    {   
        if( $time_table_slot->isactive)
        {
            $time_table_slot->isactive=0;
        }
        else 
        {
            $time_table_slot->isactive=1;
        }
        $time_table_slot->update();

        $this->dispatch('alert',type:'success',message:'Time Table Slot Status Updated Successfully !!');
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }


    public function delete(Timetableslot  $time_table_slot)
    {   
        $time_table_slot->delete();
        $this->dispatch('alert',type:'success',message:'Time Table Slot Soft Deleted Successfully !!');
    }
    
    public function restore($id)
    {   
        $time_table_slot = Timetableslot::withTrashed()->find($id);
        $time_table_slot->restore();
        $this->dispatch('alert',type:'success',message:'Time Table Slot Restored Successfully !!');
    }

    public function forcedelete()
    {   
        try 
        {
            $time_table_slot = Timetableslot::withTrashed()->find($this->delete_id);
            $time_table_slot->forceDelete();
            $this->dispatch('alert',type:'success',message:'Time Table Slot Deleted Successfully !!');
            
        } catch (\Illuminate\Database\QueryException $e) {

            if ($e->errorInfo[1] == 1451) {

                $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
            } 
        }
    }

    public function render()
    {   
        $time_table_slots =Timetableslot::select('id','slot','timeslot','isactive','deleted_at')->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.time-table-slot.all-time-table-slot',compact('time_table_slots'))->extends('layouts.user')->section('user');
    }
}
