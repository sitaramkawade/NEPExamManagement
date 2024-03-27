<?php

namespace App\Livewire\User\Block;

use Excel;
use App\Models\Block;
use Livewire\Component;
use App\Models\Building;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Exports\User\Block\ExportBlock;

class AllBlock extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;
    #[Locked] 
    public $delete_id;
    #[Locked] 
    public $block_id;
    public $building_id;
    public $classname;
    public $block;
    public $capacity;
    public $noofblocks;
    public $status;
    public $buildings;
    public $mode='all';

    public function rules()
    {
       return [
        'building_id'=>['required',Rule::exists('buildings', 'id')],
        'classname'=>['required','string','max:80'],
        'block'=>['required','string','max:4'],
        'capacity'=>['required','digits_between:1,10'],
        'noofblocks'=>['required','digits_between:1,10'],
        ];
    }

    public function messages()
    {   
        $messages = [
            'building_id.required' => 'The building ID is required.',
            'building_id.exists' => 'The selected building ID is invalid.',
            'classname.required' => 'The class name is required.',
            'classname.string' => 'The class name must be a string.',
            'classname.max' => 'The class name may not be greater than 80 characters.',
            'block.required' => 'The block is required.',
            'block.string' => 'The block must be a string.',
            'block.max' => 'The block may not be greater than 4 characters.',
            'capacity.required' => 'The capacity is required.',
            'capacity.digits_between' => 'The capacity must be between 1 and 10 digits.',
            'noofblocks.required' => 'The number of blocks is required.',
            'noofblocks.digits_between' => 'The number of blocks must be between 1 and 10 digits.',
        ];
        return $messages;
    }

    public function resetinput()
    {
        $this->building_id=null;
        $this->classname=null;
        $this->block=null;
        $this->capacity=null;
        $this->noofblocks=null;
        $this->status=null;     
    }

    public function add(Block $blok)
    { 
        $validatedData = $this->validate();
       
        if ($validatedData) {

        $blok->building_id= $this->building_id;
        $blok->classname= $this->classname;
        $blok->block=  $this->block;
        $blok->capacity=  $this->capacity;
        $blok->noofblocks= $this->noofblocks;
        $blok->status= $this->status;
        $blok->save();
        $this->dispatch('alert',type:'success',message:'Added Successfully !!'  );
        $this->setmode('all');
        }
    }

    public function edit(Block $blok ){

        if ($blok) {
            $this->block_id=$blok->id;
            $this->building_id = $blok->building_id;
            $this->classname = $blok->classname;
            $this->block = $blok->block;
            $this->capacity = $blok->capacity;
            $this->noofblocks = $blok->noofblocks;
            $this->status = $blok->status;          
            $this->setmode('edit');
        }
    }

    public function update(Block  $blok){

        $validatedData = $this->validate();
       
        if ($validatedData) {
                   
            $blok->update([
                              
                'building_id' => $this->building_id,
                'classname' => $this->classname,               
                'block' => $this->block,
                'capacity' => $this->capacity,
                'noofblocks' => $this->noofblocks,                
                'status' => $this->status,                   
            ]);

            $this->dispatch('alert',type:'success',message:'Updated Successfully !!'  );
            $this->setmode('all');        
        }
    }

     
    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function delete(Block  $block)
    {   
        $block->delete();
        $this->dispatch('alert',type:'success',message:'Block Soft Deleted Successfully !!');
    }

    public function restore($id)
    {   
        $block = Block::withTrashed()->find($id);
        $block->restore();
        $this->dispatch('alert',type:'success',message:'Block Restored Successfully !!');
    }

    public function forcedelete()
    {   try
       { 
        $block = Block::withTrashed()->find($this->delete_id);
        $block->forceDelete();
        $this->dispatch('alert',type:'success',message:'Block Deleted Successfully !!');
        }
        catch
        (\Illuminate\Database\QueryException $e) {

            if ($e->errorInfo[1] == 1451) {

                $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
            } 
        }
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

    public function Status(Block $block)
    {
        if($block->status)
        {
            $block->status=0;
        }
        else
        {
            $block->status=1;
        }
        $block->update();
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
        $filename="Block-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportBlock($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportBlock($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportBlock($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
       
    }

    public function render()
    { 
        if($this->mode!=='all')
        {
            $this->buildings = Building::where('status',1)->pluck('building_name','id');
        }

        $blocks=Block::select('id','building_id','classname','block','capacity','noofblocks','status','deleted_at')
        ->with('building:building_name,id')
        ->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.block.all-block',compact('blocks'))->extends('layouts.user')->section('user');    
    }
}
