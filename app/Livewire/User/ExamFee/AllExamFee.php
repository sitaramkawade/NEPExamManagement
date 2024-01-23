<?php

namespace App\Livewire\User\ExamFee;

use Excel;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Examfeemaster;
use App\Exports\User\ExamFeeMaster\ExamFeeMasterExport;

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
    public $approve_status;
    public $active_status;
    #[Locked] 
    public $edit_id;


    public function rules()
    {
        return [
            'fee_type' => ['required', 'string','max:200','unique:examfeemasters,fee_type,' . ($this->mode == 'edit' ? $this->edit_id : ''),],
        ];
    }

    public function messages()
    {   
        $messages = [
            'fee_type.required' => 'The Query Name field is required.',
            'fee_type.string' => 'The Query Name must be a string.',
            'fee_type.max' => 'The  Query Name must not exceed :max characters.',
            'fee_type.unique' => 'The Query Name has already been taken.',
        ];
        
        return $messages;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
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
        $filename="Exam-Fee-Master-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExamFeeMasterExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExamFeeMasterExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExamFeeMasterExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function add()
    {
        $this->validate();

        $examfee =  new Examfeemaster;
        $examfee->create([
            'fee_type' => $this->fee_type,
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
        $this->active_status=$examfee->active_status==1?0:true;
  
        $this->setmode('edit');
    }

    public function update(Examfeemaster $examfee)
    {
        $this->validate();

        $examfee->update([
            'fee_type' => $this->fee_type,
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
        $exam_fee_masters=Examfeemaster::select('id','fee_type','active_status','deleted_at')->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.exam-fee.all-exam-fee',compact('exam_fee_masters'))->extends('layouts.user')->section('user');
    }
}
