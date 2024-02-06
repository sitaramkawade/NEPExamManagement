<?php

namespace App\Livewire\User\AcademicYear;

use Excel;
use Livewire\Component;
use App\Models\Academicyear;
use Livewire\WithPagination;
use App\Exports\User\AcademicYear\AcademicYearExport;

class AllAcademicYear extends Component
{
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    #[Locked] 
    public $delete_id;

    public $mode='all';
    public $perPage=10;
    public $search='';
    public $sortColumn="year_name";
    public $sortColumnBy="DESC";
    public $ext;

    public $year_name;
    public $active;
    #[Locked] 
    public $edit_id;


    public function rules()
    {
        return [
            'year_name' => ['required', 'string','max:40','unique:academicyears,year_name,' . ($this->mode == 'edit' ? $this->edit_id : ''),],
        ];
    }

    public function messages()
    {   
        $messages = [
            'year_name.required' => 'The Academic Year field is required.',
            'year_name.string' => 'The Academic Year must be a string.',
            'year_name.max' => 'The Academic Year must not exceed :max characters.',
            'year_name.unique' => 'The Academic Year has already been taken.',
        ];
        
        return $messages;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->year_name=null;
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
        $filename="Academic-Year-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new AcademicYearExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new AcademicYearExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new AcademicYearExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function add()
    {   
        $this->validate();
        Academicyear::query()->update(['active' => 0]);
        $academic_year =  new Academicyear;
        $academic_year->year_name=$this->year_name;
        $academic_year->active = $this->active==true?0:1;
        $academic_year->save();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Academic Year Created Successfully !!');
    }


    public function edit(Academicyear $academic_year)
    {   
        $this->resetinput();
        $this->edit_id=$academic_year->id;
        $this->year_name= $academic_year->year_name;
        $this->active=$academic_year->active==1?0:true;
        $this->setmode('edit');
    }

    public function update(Academicyear $academic_year)
    {
        $this->validate();
        Academicyear::query()->update(['active' => 0]);
        $academic_year->update([
            'year_name' => $this->year_name,
            'active' => $this->active == true ? 0 : 1,
        ]);
       
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Academic Year Updated Successfully !!');

    }

    public function status(Academicyear $academic_year)
    {   
        if( $academic_year->active)
        {
            $academic_year->active=0;
        }
        else 
        {   
            Academicyear::query()->update(['active' => 0]);
            $academic_year->active=1;
        }
        $academic_year->update();

        $this->dispatch('alert',type:'success',message:'Academic Year Status Updated Successfully !!');
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }


    public function delete(Academicyear  $academic_year)
    {   
        $academic_year->delete();
        $this->dispatch('alert',type:'success',message:'Academic Year Soft Deleted Successfully !!');
    }
    
    public function restore($id)
    {   
        $academic_year = Academicyear::withTrashed()->find($id);
        $academic_year->restore();
        $this->dispatch('alert',type:'success',message:'Academic Year Restored Successfully !!');
    }

    public function forcedelete()
    {   
        $academic_year = Academicyear::withTrashed()->find($this->delete_id);
        $academic_year->forceDelete();
        $this->dispatch('alert',type:'success',message:'Academic Year Deleted Successfully !!');
    }

    public function render()
    {   
        $academic_years=Academicyear::select('id','year_name','active','deleted_at')->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.academic-year.all-academic-year',compact('academic_years'))->extends('layouts.user')->section('user');
    }
}
