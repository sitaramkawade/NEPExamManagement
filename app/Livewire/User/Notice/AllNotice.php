<?php

namespace App\Livewire\User\Notice;

use Excel;
use App\Models\User;
use App\Models\Notice;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Exports\User\Notice\NoticeExport;

class AllNotice extends Component
{   
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    #[Locked] 
    public $delete_id;

    public $mode='all';
    public $perPage=10;
    public $search='';
    public $sortColumn="title";
    public $sortColumnBy="ASC";
    public $ext;

    public $user_id;
    public $type;
    public $start_date;
    public $end_date;
    public $title;
    public $description;
    public $is_active;

    // public  $users;
    #[Locked] 
    public $edit_id;


    public function rules()
    {
        return [
            'type' => ['required', 'integer','between:0,4'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
            'title' => ['required', 'string','max:100'],
            'description' => ['nullable', 'string','max:1000'],
            // 'user_id' => ['required', 'integer', Rule::exists('users', 'id')],

        ];
    }

    public function messages()
    {   
        $messages = [
            'type.nullable' => 'The Notice Type Field must be either null or have a valid integer value.',
            'type.between' => 'The Notice Type field must be between :min and :max .',
            'start_date.nullable' => 'The Start Date field must be either null or have a valid date format.',
            'end_date.nullable' => 'The End Date field must be either null or have a valid date format.',
            'title.required' => 'The Title field is required.',
            'title.string' => 'The Title must be a valid string.',
            'title.max' => 'The Title must not exceed :max characters.',
            'description.nullable' => 'The description field must be either null or have a valid string value.',
            'description.string' => 'The description must be a valid string.',
            'description.max' => 'The description must not exceed :max characters.',
            // 'user_id.required' => 'The User  field is required.',
            // 'user_id.integer' => 'The User must be a valid integer value.',
            // 'user_id.exists' => 'The selected User is invalid, please choose a valid User.',
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
        $this->user_id=null;
        $this->type=null;
        $this->is_active=null;
        $this->start_date=null;
        $this->end_date=null;
        $this->title=null;
        $this->description=null;
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
        $filename="Notice-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new NoticeExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new NoticeExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new NoticeExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function add()
    {
        $this->validate();

      $notice =  new Notice;
      $notice->create([
            'user_id'=>auth()->guard('user')->user()->id,
            'type'=>$this->type,
            'is_active' => $this->is_active==true?0:1,
            'start_date'=>$this->start_date,
            'end_date'=>$this->end_date,
            'title'=>$this->title,
            'title'=>$this->title,
            'description'=>$this->description,
        ]);
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Notice Created Successfully !!');
    }


    public function edit(Notice $notice)
    {   
        $this->resetinput();
        $this->edit_id=$notice->id;
        $this->type=$notice->type;
        $this->start_date = date('Y-m-d', strtotime($notice->start_date));
        $this->end_date=date('Y-m-d', strtotime($notice->end_date));
        $this->title=$notice->title;
        $this->is_active=$notice->is_active==1?0:true;
        $this->description=$notice->description;
        $this->setmode('edit');
    }

    public function update(Notice$notice)
    {
        $this->validate();

      $notice->update([
            'user_id'=>auth()->guard('user')->user()->id,
            'type'=>$this->type,
            'is_active' => $this->is_active==true?0:1,
            'start_date'=>$this->start_date,
            'end_date'=>$this->end_date,
            'title'=>$this->title,
            'title'=>$this->title,
            'description'=>$this->description,
        ]);
       
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Notice Updated Successfully !!');

    }


    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }


    public function delete(Notice$notice)
    {   
        $notice->delete();
        $this->dispatch('alert',type:'success',message:'Notice Soft Deleted Successfully !!');
    }
    
    public function restore($id)
    {   
        $notice = Notice::withTrashed()->find($id);
        $notice->restore();
        $this->dispatch('alert',type:'success',message:'Notice Restored Successfully !!');
    }

    public function forcedelete()
    {   
        $notice = Notice::withTrashed()->find($this->delete_id);
        $notice->forceDelete();
        $this->dispatch('alert',type:'success',message:'Notice Deleted Successfully !!');
    }

    public function changestatus(Notice$notice)
    {   
        if($notice->is_active)
        {
           $notice->is_active=0;
        }
        else 
        {
           $notice->is_active=1;
        }
       $notice->update();

        $this->dispatch('alert',type:'success',message:'Notice Status Updated Successfully !!');
    }


    public function render()
    {    
        $notices=Notice::select('id','title','type','start_date','end_date','user_id','description','is_active','deleted_at')->with('user')->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.notice.all-notice',compact('notices'))->extends('layouts.user')->section('user');
    }
}
