<?php

namespace App\Livewire\User\ExamFee;

use Excel;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Examfeemaster;
use App\Models\Applyfeemaster;
use App\Models\Formtypemaster;
use Illuminate\Validation\Rule;
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
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;

    public $fee_name;
    public $default_professional_fee;
    public $default_non_professional_fee;
    public $form_type_id;
    public $formtypes;
    public $apply_fee_id;
    public $applyfees;
    public $remark;
    public $approve_status;
    public $active_status;
    #[Locked] 
    public $edit_id;


    public function rules()
    {
        return [
            'fee_name' => ['required', 'string','max:200','unique:examfeemasters,fee_name,' . ($this->mode == 'edit' ? $this->edit_id : ''),],
            'remark' => ['nullable', 'string','max:50'],
            'default_professional_fee' => ['nullable', 'integer','digits_between:1,11'],
            'default_non_professional_fee' => ['nullable', 'integer','digits_between:1,11'],
            'form_type_id' => ['required', 'integer',Rule::exists('formtypemasters', 'id')],
            'apply_fee_id' => ['required', 'integer',Rule::exists('applyfeemasters', 'id')],
        ];
    }

    public function messages()
    {   
        $messages = [
            'fee_name.required' => 'The Fee Name field is required.',
            'fee_name.string' => 'The Fee Name must be a string.',
            'fee_name.max' => 'The Fee Name must not exceed :max characters.',
            'fee_name.unique' => 'The Fee Name has already been taken.',
            'remark.required' => 'The Remark field is required.',
            'remark.string' => 'The Remark must be a string.',
            'remark.max' => 'The  Remark must not exceed :max characters.',
            'default_professional_fee.required' => 'The Default Professional Course Fee field is required.',
            'default_professional_fee.integer' => 'The Default Professional Course Fee must be an integer.',
            'default_professional_fee.digits_between' => 'The Default Professional Course Fee must be between :min and :max digits.',
            'default_non_professional_fee.required' => 'The Default Non Professional Course Fee field is required.',
            'default_non_professional_fee.integer' => 'The Default Non Professional Course Fee must be an integer.',
            'default_non_professional_fee.digits_between' => 'The Default Non Professional Course Fee must be between :min and :max digits.',
            'form_type_id.required' => 'The Form Type field is required.',
            'form_type_id.integer' => 'The Form Type must be an integer.',
            'form_type_id.exists' => 'The selected Form Type does not exist.',
            'apply_fee_id.required' => 'The Apply Fee field is required.',
            'apply_fee_id.integer' => 'The Apply Fee must be an integer.',
            'apply_fee_id.exists' => 'The selected Apply Fee does not exist.',
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
        $this->fee_name=null;
        $this->default_professional_fee=null;
        $this->default_non_professional_fee=null;
        $this->form_type_id=null;
        $this->apply_fee_id=null;
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
            'fee_name' => $this->fee_name,
            'default_professional_fee' => $this->default_professional_fee,
            'default_non_professional_fee' => $this->default_non_professional_fee,
            'form_type_id' => $this->form_type_id,
            'apply_fee_id' => $this->apply_fee_id,
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
        $this->fee_name= $examfee->fee_name;
        $this->default_professional_fee= $examfee->default_professional_fee;
        $this->default_non_professional_fee= $examfee->default_non_professional_fee;
        $this->form_type_id= $examfee->form_type_id;
        $this->apply_fee_id= $examfee->apply_fee_id;
        $this->remark= $examfee->remark;
        $this->active_status=$examfee->active_status==1?0:true;
  
        $this->setmode('edit');
    }

    public function update(Examfeemaster $examfee)
    {
        $this->validate();

        $examfee->update([
            'fee_name' => $this->fee_name,
            'default_professional_fee' => $this->default_professional_fee,
            'default_non_professional_fee' => $this->default_non_professional_fee,
            'form_type_id' => $this->form_type_id,
            'apply_fee_id' => $this->apply_fee_id,
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
        try 
        {
            $examfee = Examfeemaster::withTrashed()->find($this->delete_id);
            $examfee->forceDelete();
            $this->dispatch('alert',type:'success',message:'Exam Fee Deleted Successfully !!');
        } catch (\Illuminate\Database\QueryException $e) {

            if ($e->errorInfo[1] == 1451) {

                $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
            } 
        }
    }

    public function render()
    {   
        if($this->mode!=='all')
        {
            $this->formtypes=Formtypemaster::select('id','form_name')->get();
            $this->applyfees=Applyfeemaster::select('id','name')->get();
        }
        $exam_fee_masters=Examfeemaster::select('id','fee_name','default_professional_fee','default_non_professional_fee','form_type_id','apply_fee_id','remark','approve_status','active_status','deleted_at')->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.exam-fee.all-exam-fee',compact('exam_fee_masters'))->extends('layouts.user')->section('user');
    }
}
