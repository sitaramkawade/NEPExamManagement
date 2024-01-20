<?php

namespace App\Livewire\User\Pattern;

use Excel;
use App\Models\College;
use App\Models\Pattern;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Exports\User\Pattern\ExportPattern;


class AllPattern extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    public $perPage=10; 
    public $search='';
    public $sortColumn="pattern_name";
    public $sortColumnBy="ASC";
    public $ext;

    public $mode='all';
    public $current_step=1;
    public $steps=1;
    public $pattern_name;
    public $pattern_startyear;
    public $pattern_valid;
    public $status;
    public $college_id ;
    public $colleges;
    public $pattern_id;
    #[Locked] 
    public $delete_id;
 
    public function rules()
    {
        return [
        'pattern_name' => ['required','string','max:50'],
        'pattern_startyear' => ['required','string','max:4'],
        'pattern_valid' =>[ 'required','string','max:4'],
        'status' => ['required'],
        'college_id' => ['required',Rule::exists('colleges', 'id')],      
        ];
    }

    public function messages()
    {   
        $messages = [
            'pattern_name.required' => 'The Pattern Name field is required.',
            'pattern_name.string' => 'The Pattern Name must be a string.',
            'pattern_name.max' => 'The  Pattern Name must not exceed :max characters.',
            'pattern_startyear.required' => 'The Pattern Name field is required.',
            'pattern_valid.required' => 'The Pattern Name field is required.',
            'college_id.required' => 'The College field is required.',
            'college_id.exists' => 'The selected Programme does not exist.',
        ];
        return $messages;
    }

    public function resetinput()
    {
         $this->pattern_name=null;
         $this->pattern_startyear=null;
         $this->pattern_valid=null;
         $this->status=null;
         $this->college_id=null;
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

    public function resetInputFields()
    {
        // Reset the specified properties to their initial state
        $this->reset(['pattern_name', 'pattern_startyear' ,'pattern_valid','status','college_id']);
    }

    public function mount()
    {
        $this->colleges = College::all();    
    }

    public function add(){

        $validatedData = $this->validate();
       
        if ($validatedData) {
        $pattern= new Pattern;    
        $pattern->pattern_name= $this->pattern_name;
        $pattern->pattern_startyear= $this->pattern_startyear;
        $pattern->pattern_valid= $this->pattern_valid;
        $pattern->college_id= $this->college_id;      
        $pattern->status= $this->status;
        $pattern->save();

        $this->dispatch('alert',type:'success',message:'Added Successfully !!'  );
        $this->setmode('all');
    }
    }
    
    public function Status(Pattern $pattern)
    {
        if($pattern->status)
        {
            $pattern->status=0;
        }
        else
        {
            $pattern->status=1;
        }
        $pattern->update();
    }
    
    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }
    
    
    public function delete(Pattern  $pattern)
    {   
        $pattern->delete();
        $this->dispatch('alert',type:'success',message:'Pattern Soft Deleted Successfully !!');
    }
    
    public function restore($id)
    {   
        $pattern = Pattern::withTrashed()->find($id);
        $pattern->restore();
        $this->dispatch('alert',type:'success',message:'Pattern Restored Successfully !!');
    }
    
    public function forcedelete()
    {  
        $pattern = Pattern::withTrashed()->find($this->delete_id);
        $pattern->forceDelete();
        $this->dispatch('alert',type:'success',message:'Pattern Deleted Successfully !!');
    }

    public function edit(Pattern $pattern){
        
        if($pattern)
        { 
            $this->pattern_id=$pattern->id;
            $this->pattern_name=$pattern->pattern_name;
            $this->pattern_startyear=$pattern->pattern_startyear;
            $this->pattern_valid=$pattern->pattern_valid;
            $this->status=$pattern->status;
            $this->college_id=$pattern->college_id;
            $this->setmode('edit');
        }
    }

    public function update(Pattern  $pattern){
       
        $validatedData= $this->validate();
        if ($validatedData) {        
            $pattern->update([
                'pattern_name' => $this->pattern_name,
                'pattern_startyear' => $this->pattern_startyear,
                'pattern_valid' => $this->pattern_valid,
                'college_id' => $this->college_id,
                'status' => $this->status,                  
            ]);
            $this->dispatch('alert',type:'success',message:'Updated Successfully !!'  );
            $this->setmode('all');
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
        $filename="Pattern-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportPattern($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportPattern($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportPattern($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
       
    }


    public function render()
    {   
        $this->colleges=College::select('college_name','id')->where('status',1)->get();
        $patterns=Pattern::when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.pattern.all-pattern',compact('patterns'))->extends('layouts.user')->section('user');
    }
}
