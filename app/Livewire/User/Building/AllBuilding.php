<?php

namespace App\Livewire\User\Building;

use Excel;
use Livewire\Component;
use App\Models\Building;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Exports\User\Building\ExportBuilding;

class AllBuilding extends Component
{
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    #[Locked] 
    public $delete_id;

    public $building_name;
    public $Priority;
    public $status;
    public $mode='all';
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;

    #[Locked] 
    public $building_id;

    public function rules()
    {
        return [
        'building_name' => ['required','string','max:255',Rule::unique('buildings', 'building_name')->ignore($this->building_id,)],
        'Priority' => ['required'],
        'status' => ['required'],     
         ];
    }

    public function messages()
    {   
        $messages = [
            'building_name.required' => 'The Building Name field is required.',
            'building_name.string' => 'The Building Name must be a string.',
            'building_name.max' => 'The  Building Name must not exceed :max characters.',
            'building_name.unique' => 'The Building Name has already been taken.',
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
        $this->building_name= null;
        $this->Priority= null;
        $this->status= null;
       
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

    public function Status(Building $building)
    {
        if($building->status)
        {
            $building->status=0;
        }
        else
        {
            $building->status=1;
        }
        $building->update();
    }

    
    public function add()
    {
        $this->validate();

        $building =  new Building;
        $building->create([
            'building_name' => $this->building_name,
            'Priority' => $this->Priority,
            'status' => $this->status,
            
        ]);
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Building Created Successfully !!');
    }

    public function edit(Building $building){

        if ($building) {
            $this->building_id=$building->id;
            $this->building_name = $building->building_name;
            $this->Priority = $building->Priority;
            $this->status = $building->status;                    
            $this->setmode('edit');
        }
    }

    public function update(Building $building)
    {
        $this->validate();

        $building->update([
            'building_name' => $this->building_name,
            'Priority' => $this->Priority,
            'status' => $this->status,
            
        ]);      
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Building Updated Successfully !!');

    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }


    public function delete(Building  $building)
    {   
        $building->delete();
        $this->dispatch('alert',type:'success',message:'Building Soft Deleted Successfully !!');
    }
    
    public function restore($id)
    {   
        $building = Building::withTrashed()->find($id);
        $building->restore();
        $this->dispatch('alert',type:'success',message:'Building Restored Successfully !!');
    }

    public function forcedelete()
    {   
        $building = Building::withTrashed()->find($this->delete_id);
        $building->forceDelete();
        $this->dispatch('alert',type:'success',message:'Building Deleted Successfully !!');
    }

    public function export()
    {
        $filename="Building-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportBuilding($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportBuilding($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportBuilding($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function render()
    {
        
        $buildings=Building::select('id','building_name','Priority','status','deleted_at')
        ->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.building.all-building',compact('buildings'))->extends('layouts.user')->section('user');
    }
}
