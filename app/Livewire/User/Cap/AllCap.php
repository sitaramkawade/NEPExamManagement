<?php

namespace App\Livewire\User\Cap;

use Excel;
use App\Models\Exam;
use App\Models\College;
use Livewire\Component;
use App\Models\Capmaster;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Exports\User\Cap\CapExport;

class AllCap extends Component
{   
      
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    #[Locked] 
    public $delete_id;

    public $mode='all';
    public $perPage=10;
    public $search='';
    public $sortColumn="cap_name";
    public $sortColumnBy="ASC";
    public $ext;

    public $cap_name;
    public $place;
    public $exam_id;
    public $college_id ;
    public $exams;
    public $colleges;
    public $status;
    #[Locked] 
    public $edit_id;


    public function rules()
    {
        return [
            'college_id' => ['required', 'integer', Rule::exists('colleges', 'id')],
            'exam_id' => ['required', 'integer', Rule::exists('exams', 'id')],
            'cap_name' => ['required', 'string','max:255',Rule::unique('capmasters', 'cap_name')->ignore($this->edit_id, 'id')],
            'place' => ['nullable', 'string','max:255'],
        ];
    }

    public function messages()
    {   
        $messages = [
            'college_id.required' => 'The College  field is required.',
            'college_id.integer' => 'The College  must be a integer value.',
            'college_id.exists' => 'The selected College  is invalid.',
            
            'exam_id.required' => 'The Exam field is required.',
            'exam_id.integer' => 'The Exam must be a integer value.',
            'exam_id.exists' => 'The selected Exam is invalid.',
            
            'cap_name.required' => 'The CAP Name field is required.',
            'cap_name.string' => 'The CAP Name must be a string.',
            'cap_name.max' => 'The CAP Name may not be greater than :max characters.',
            'cap_name.unique' => 'The CAP Name has already been taken.',
            
            'place.required' => 'The Place field is required.',
            'place.string' => 'The Place must be a string.',
            'place.max' => 'The Place may not be greater than :max characters.',
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
        $this->cap_name= null;
        $this->place= null;
        $this->exam_id=null;
        $this->status=null;
        $this->college_id=null;
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
        $filename="Cap-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new CapExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new CapExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new CapExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function add()
    {
        $this->validate();

        $cap =  new Capmaster;
        $cap->create([
            'cap_name' => $this->cap_name,
            'place' => $this->place,
            'status' => $this->status == true ? 0 : 1,
            'college_id' => $this->college_id,
            'exam_id' => $this->exam_id,
        ]);
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Cap Created Successfully !!');
    }


    public function edit(Capmaster $cap)
    {   
        $this->resetinput();
        $this->edit_id=$cap->id;
        $this->cap_name= $cap->cap_name;
        $this->status=$cap->status==1?0:true;
        $this->place=$cap->place;
        $this->college_id=$cap->college_id;
        $this->exam_id=$cap->exam_id;
  
        $this->setmode('edit');
    }

    public function update(Capmaster $cap)
    {
        $this->validate();

        $cap->update([
            'cap_name' => $this->cap_name,
            'place' => $this->place,
            'status' => $this->status == true ? 0 : 1,
            'college_id' => $this->college_id,
            'exam_id' => $this->exam_id,
        ]);
       
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Cap Updated Successfully !!');

    }


    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }


    public function delete(Capmaster  $cap)
    {   
        $cap->delete();
        $this->dispatch('alert',type:'success',message:'Cap Soft Deleted Successfully !!');
    }
    
    public function restore($id)
    {   
        $cap = Capmaster::withTrashed()->find($id);
        $cap->restore();
        $this->dispatch('alert',type:'success',message:'Cap Restored Successfully !!');
    }

    public function forcedelete()
    {   
        $cap = Capmaster::withTrashed()->find($this->delete_id);
        $cap->forceDelete();
        $this->dispatch('alert',type:'success',message:'Cap Deleted Successfully !!');
    }


    public function updatestatus(Capmaster $cap)
    {   
        if( $cap->status)
        {
            $cap->status=0;
        }
        else 
        {
            $cap->status=1;
        }
        $cap->update();

        $this->dispatch('alert',type:'success',message:'Helpline Query Status Updated Successfully !!');
    }

    public function render()
    {   

        if($this->mode!=='all')
        {
            $this->colleges=College::select('college_name','id')->where('status',1)->get();
            $this->exams =Exam::select('exam_name','id')->where('status',1)->get();
        }

        $caps=Capmaster::with('college:college_name,id')->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.cap.all-cap',compact('caps'))->extends('layouts.user')->section('user');
    }

}
