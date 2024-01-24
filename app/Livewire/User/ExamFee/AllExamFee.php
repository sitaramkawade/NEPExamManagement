<?php

namespace App\Livewire\User\ExamFee;

use Excel;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Examfeemaster;
use App\Exports\User\ExamFee\ExamFeeExport;

class AllExamFee extends Component
{   
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    #[Locked] 
    public $delete_id;

    public $mode='all';
    public $perPage=10;
    public $search='';
    public $sortColumn="fee_type";
    public $sortColumnBy="ASC";
    public $ext;

    public $fee_type;
    public $remark;
    public $approve_status;
    public $active_status;
    #[Locked] 
    public $edit_id;


    public function rules()
    {
        return [
            'fee_type' => ['required', 'string','max:200','unique:examfeemasters,fee_type,' . ($this->mode == 'edit' ? $this->edit_id : ''),],
            'remark' => ['nullable', 'string','max:50'],
        ];
    }

    public function messages()
    {   
        $messages = [
            'fee_type.required' => 'The Fee Type field is required.',
            'fee_type.string' => 'The Fee Type must be a string.',
            'fee_type.max' => 'The  Fee Type must not exceed :max characters.',
            'fee_type.unique' => 'The Fee Type has already been taken.',
            'remark.required' => 'The Remark field is required.',
            'remark.string' => 'The Remark must be a string.',
            'remark.max' => 'The  Remark must not exceed :max characters.',
        ];
        
        return $messages;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->remark=null;
        $this->fee_type=null;
        $this->active_status=null;
        $this->approve_status=null;
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
        $filename="Exam-Fee-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExamFeeExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExamFeeExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExamFeeExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function add()
    {
        $this->validate();

        $examfee =  new Examfeemaster;
        $examfee->create([
            'fee_type' => $this->fee_type,
            'remark' => $this->remark,
            'active_status' => $this->active_status==true?0:1,
        ]);
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Exam Fee Created Successfully !!');
    }


    public function edit(Examfeemaster $examfee)
    {   
        $this->resetinput();
        $this->edit_id=$examfee->id;
        $this->fee_type= $examfee->fee_type;
        $this->remark= $examfee->remark;
        $this->active_status=$examfee->active_status==1?0:true;
  
        $this->setmode('edit');
    }

    public function update(Examfeemaster $examfee)
    {
        $this->validate();

        $examfee->update([
            'fee_type' => $this->fee_type,
            'remark' => $this->remark,
            'active_status' => $this->active_status == true ? 0 : 1,
        ]);
       
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Exam Fee Updated Successfully !!');

    }

    public function status(Examfeemaster $examfee)
    {   
        if( $examfee->active_status)
        {
            $examfee->active_status=0;
        }
        else 
        {
            $examfee->active_status=1;
        }
        $examfee->update();

        $this->dispatch('alert',type:'success',message:'Exam Fee Status Updated Successfully !!');
    }

    public function approve(Examfeemaster $examfee)
    {   
        
        if( $examfee->approve_status==1)
        {
            $examfee->approve_status=0;
            $this->dispatch('alert',type:'success',message:'Exam Fee Not Approved Successfully !!');
        }
        else 
        {
            $examfee->approve_status=1;
            $this->dispatch('alert',type:'success',message:'Exam Fee Approved Successfully !!');
        }
        $examfee->update();
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }


    public function delete(Examfeemaster  $examfee)
    {   
        $examfee->delete();
        $this->dispatch('alert',type:'success',message:'Exam Fee Soft Deleted Successfully !!');
    }
    
    public function restore($id)
    {   
        $examfee = Examfeemaster::withTrashed()->find($id);
        $examfee->restore();
        $this->dispatch('alert',type:'success',message:'Exam Fee Restored Successfully !!');
    }

    public function forcedelete()
    {   
        $examfee = Examfeemaster::withTrashed()->find($this->delete_id);
        $examfee->forceDelete();
        $this->dispatch('alert',type:'success',message:'Exam Fee Deleted Successfully !!');
    }

    public function render()
    {   
        $exam_fee_masters=Examfeemaster::select('id','fee_type','remark','approve_status','active_status','deleted_at')->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.exam-fee.all-exam-fee',compact('exam_fee_masters'))->extends('layouts.user')->section('user');
    }
}
