<?php

namespace App\Livewire\User\ClassYear;

use Excel;
use Livewire\Component;
use App\Models\Classyear;
use Livewire\WithPagination;
use App\Exports\User\ClassYear\ClassYearExport;

class AllClassYear extends Component
{   
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    #[Locked] 
    public $delete_id;

    public $mode='all';
    public $perPage=10;
    public $search='';
    public $sortColumn="classyear_name";
    public $sortColumnBy="ASC";
    public $ext;

    public $classyear_name;
    public $class_degree_name;
    public $status;
    #[Locked] 
    public $edit_id;


    public function rules()
    {
        return [
            'classyear_name' => ['required', 'string','max:255','unique:classyears,classyear_name,' . ($this->mode == 'edit' ? $this->edit_id : ''),],
            'class_degree_name' => ['required', 'string','max:100'],
        ];
    }

    public function messages()
    {   
        $messages = [
            'classyear_name.required' => 'The Class Year Name field is required.',
            'classyear_name.string' => 'The Class Year Name must be a string.',
            'classyear_name.max' => 'The  Class Year Name must not exceed :max characters.',
            'classyear_name.unique' => 'The Class Year Name has already been taken.',

            'class_degree_name.required' => 'The Class Degree Name field is required.',
            'class_degree_name.string' => 'The Class Degree Name must be a string.',
            'class_degree_name.max' => 'The  Class Degree Name must not exceed :max characters.',
        ];
        
        return $messages;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->classyear_name=null;
        $this->status=null;
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
        $filename="Class-Year-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ClassYearExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
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

        $class_year =  new Classyear;
        $class_year->create([
            'classyear_name' => $this->classyear_name,
            'class_degree_name' => $this->class_degree_name,
            'status' => $this->status==true?0:1,
        ]);
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Class Year Created Successfully !!');
    }


    public function edit(Classyear $class_year)
    {   
        $this->resetinput();
        $this->edit_id=$class_year->id;
        $this->classyear_name= $class_year->classyear_name;
        $this->class_degree_name= $class_year->class_degree_name;
        $this->status=$class_year->status==1?0:true;
  
        $this->setmode('edit');
    }

    public function update(Classyear $class_year)
    {
        $this->validate();

        $class_year->update([
            'classyear_name' => $this->classyear_name,
            'class_degree_name' => $this->class_degree_name,
            'status' => $this->status == true ? 0 : 1,
        ]);
       
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Class Year Updated Successfully !!');

    }

    public function changestatus(Classyear $class_year)
    {   
        if( $class_year->status)
        {
            $class_year->status=0;
        }
        else 
        {
            $class_year->status=1;
        }
        $class_year->update();

        $this->dispatch('alert',type:'success',message:'Class Year Status Updated Successfully !!');
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }


    public function delete(Classyear  $class_year)
    {   
        $class_year->delete();
        $this->dispatch('alert',type:'success',message:'Class Year Soft Deleted Successfully !!');
    }
    
    public function restore($id)
    {   
        $class_year = Classyear::withTrashed()->find($id);
        $class_year->restore();
        $this->dispatch('alert',type:'success',message:'Class Year Restored Successfully !!');
    }

    public function forcedelete()
    {   
        $class_year = Classyear::withTrashed()->find($this->delete_id);
        $class_year->forceDelete();
        $this->dispatch('alert',type:'success',message:'Class Year Deleted Successfully !!');
    }

    public function render()
    {   
        $class_years=Classyear::select('id','classyear_name','class_degree_name','status','deleted_at')->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.class-year.all-class-year',compact('class_years'))->extends('layouts.user')->section('user');
    }
}
