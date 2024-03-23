<?php

namespace App\Livewire\User\QuestionPaperBank;

use App\Models\Exam;
use App\Models\User;
use App\Models\Faculty;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Paperset;
use App\Models\Examorder;
use App\Models\Exampanel;
use App\Models\Patternclass;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Papersubmission;
use Illuminate\Validation\Rule;
use App\Models\Qestionpaperbank;
use Illuminate\Support\Facades\Auth;


class AllQuestionPaperBank extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'forcedelete'];

    public $mode='add';
    public $per_page = 10;
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;

    public $papersubmission_id;
    public $exam_id;
    public $set_id;
    public $file_path;
    public $file_name;
    public $user_id;
    public $faculty_id;
    public $is_used;
    public $questionbank=[];
    
    public $subject_id;
    public $subjects;
    public $sets;

    #[Locked]
    public $bank_id;
    #[Locked]
    public $delete_id;

    public function rules()
    {
        return [
            'papersubmission_id' => ['required',],       
            'set_id' => ['required',Rule::exists(Paperset::class,'id')],
            'file_path' => ['required','file', 'mimes:pdf'], 
            'is_used' => ['required'],
         ];
    }

    public function messages()
    {
    return [
        'papersubmission_id.required' => 'The papersubmission ID field is required.',
        'papersubmission_id.exists' => 'The selected papersubmission ID is invalid.',
        'exam_id.required' => 'The exam ID field is required.',
        'exam_id.exists' => 'The selected exam ID is invalid.',
        'set_id.required' => 'The set field is required.',
        'set_id.string' => 'The set field must be a string.',
        'set_id.max' => 'The set field may not be greater than :max characters.',
        'file_path.required' => 'The file path field is required.',
        'file_path.max' => 'The file path may not be greater than :max characters.',
        'file_name.required' => 'The file name field is required.',
        'file_name.string' => 'The file name field must be a string.',
        'file_name.max' => 'The file name may not be greater than :max characters.',
        'user_id.required' => 'The user ID field is required.',
        'user_id.exists' => 'The selected user ID is invalid.',
        'faculty_id.required' => 'The faculty ID field is required.',
        'faculty_id.exists' => 'The selected faculty ID is invalid.',
        'is_used.required' => 'The is used field is required.',
    ];
    }
 

    public function resetinput()
    {
        $this->papersubmission_id = null;
        $this->exam_id = null;
        $this->set_id = null;
        $this->file_path = null;
        $this->file_name = null;
        $this->user_id = null;
        $this->faculty_id = null;
        $this->is_used = null;

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

    // public function add(Qestionpaperbank  $bank)
    // {   

    //     dd('hello');
    //     $exam=Exam::where('status',1)->first();
    //     if( $exam)
    //     {
    //        $papersubmission= Papersubmission::create([
    //         'exam_id'=>$exam->id,
    //         'subject_id'=>349,
    //         'noofsets'=>3,
    //         'faculty_id'=>$this->faculty_id,
    //         'user_id'=>Auth::guard('user')->user()->id,
    //         'status'=>1         
    //         ]);

    //         $bank->exam_id= $exam->id;
    //         $bank->papersubmission_id=$papersubmission->id;
    //         $bank->user_id= Auth::guard('user')->user()->id;
    //         $bank->set_id= 1;
    //         $bank->file_name=$papersubmission->subject->subject_name.'-'.$bank->paperset->set_name;
    //         $bank->faculty_id= $this->faculty_id;
    //         $bank->is_used= 1;
           
    //         if ($this->file_path !== null) {
    //             $path = 'user/file/';
    //             $fileName = 'paperset-' . time() . '.' . $this->file_path->getClientOriginalExtension();
    //             $this->file_path->storeAs($path, $fileName, 'public');
    //             $bank->file_path = 'storage/' . $path . $fileName;
    //             $this->reset('file_path');
    //         }
          
    
    //         $bank->save();
           
    //         $this->dispatch('alert',type:'success',message:'Question Bank Added Successfully !!'  );
    //     }
    //     else{
    //         $this->dispatch('alert',type:'info',message:'Active Exam not found'  );
    //     }
       
        
    // }


    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }
 
    public function delete(Qestionpaperbank  $bank)
    {   
        $bank->delete();
        $this->dispatch('alert',type:'success',message:'Question Bank Deleted Successfully !!');
    }

    public function restore($id)
    {   
        $bank = Qestionpaperbank::withTrashed()->find($id);
        $bank->restore();
        $this->dispatch('alert',type:'success',message:'Question Bank Restored Successfully !!');
    }

    public function forcedelete()
    {  try
        {
        $bank = Qestionpaperbank::withTrashed()->find($this->delete_id);
        $bank->forceDelete();
        $this->dispatch('alert',type:'success',message:'Question Bank Deleted Successfully !!');
        } catch
        (\Illuminate\Database\QueryException $e) {
    
            if ($e->errorInfo[1] == 1451) {
    
                $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
            } 
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
    
    public function render()
    {
        $exampanel_ids=Examorder::pluck('exampanel_id');

        $exampanels= Exampanel::whereIn('id',$exampanel_ids);

        $subject_ids = $exampanels->pluck('subject_id');
        $this->subjects=Subject::whereIn('id', $subject_ids)->get();

        $faculty= $exampanels->where('examorderpost_id', '1')->where('active_status', '1')->first();
        if($faculty)
        {
            $this->faculty_id=$faculty->id;
        }
        else{
            $this->faculty_id=null;
        }

      
        $this->sets=Paperset::select('set_name','id')->get();     

        $banks=Qestionpaperbank::select('id','papersubmission_id','exam_id','faculty_id','user_id','file_path','file_name','set_id','is_used','deleted_at')
        ->with(['exam:exam_name,id','faculty:faculty_name,id','user:name,id','papersubmission.subject:subject_name,id'])
        ->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);
       
        return view('livewire.user.question-paper-bank.all-question-paper-bank',compact('banks'))->extends('layouts.user')->section('user');
    }
}
