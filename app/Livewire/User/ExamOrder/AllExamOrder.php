<?php

namespace App\Livewire\User\ExamOrder;

use Excel;
use Livewire\Component;
use App\Mail\MyTestMail;
use App\Models\Examorder;
use App\Models\Exampanel;
use App\Jobs\SendEmailJob;
use App\Jobs\BulkCancelJob;
use App\Jobs\ResendMailJob;
use App\Jobs\CancelOrderJob;
use Livewire\WithPagination;
use App\Mail\CancelOrderMail;
use Illuminate\Validation\Rule;
use App\Models\Exampatternclass;
use Illuminate\Support\Facades\Mail;
use App\Exports\User\ExamOrder\ExportExamOrder;

class AllExamOrder extends Component
{
    use WithPagination;
    #[Locked] 
    public $delete_id;
    
    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;
    public $mode='all';
    public $exampanel_id;
    public $exampatternclasses;
    public $exampanels;
    public $exam_patternclass_id;
    public $description;
    public $email_status;

    #[Locked] 
    public $edit_id;

    public function rules()
    {
        return [
        'exampanel_id' => ['required',Rule::exists('exam_panels', 'id')],
        'exam_patternclass_id' => ['required',Rule::exists('exam_patternclasses', 'id')],
        'description' => ['required','string','max:50'],     
         ];
    }

    public function messages()
    {   
        $messages = [
            'exampanel_id.required' => 'The Exam Panel field is required.',
            'exampanel_id.exists' => 'The selected Exam Panel  is invalid.',
            'exam_patternclass_id.required' => 'The Exam Patter Class field is required.',
            'exam_patternclass_id.exists' => 'The selected Exam Patter Class  is invalid.',
            'description.required'=> 'The Description field is required.',
            'description.string'=> 'The Description  must be a string.',
            'description.max'=> 'The Description must not exceed :max characters.',
        ];
        return $messages;
    }

    public function resetinput()
    {
        $this->exampanel_id=null;
        $this->exam_patternclass_id=null;
        $this->description=null;
        $this->email_status=null;
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

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function delete(Examorder  $examorder)
    {   
        $examorder->delete();
        $this->dispatch('alert',type:'success',message:'Exam Order Soft Deleted Successfully !!');
    }

    public function restore($id)
    {   
        $examorder = Examorder::withTrashed()->find($id);
        $examorder->restore();
        $this->dispatch('alert',type:'success',message:'Exam Order Restored Successfully !!');
    }

    public function forcedelete()
    {  
        try
        {
        $examorder = Examorder::withTrashed()->find($this->delete_id);
        $examorder->forceDelete();
        $this->dispatch('alert',type:'success',message:'Exam Order Deleted Successfully !!');
    } catch
    (\Illuminate\Database\QueryException $e) {

        if ($e->errorInfo[1] == 1451) {

            $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
        } 
    }
    }

    public function Status(Examorder $examorder)
    {
        if($examorder->email_status)
        {
            $examorder->email_status=0;
        }
        else
        {
            $examorder->email_status=1;
        }
        $examorder->update();
    }

   Public function cancelOrder(Examorder $examorder)
   {

         $examOrderIds=$examorder;
         CancelOrderJob::dispatch([$examOrderIds]);
            
         $this->dispatch('alert',type:'success',message:'Emails have been sent successfully !!'  );

   }

   public function resendMail(Examorder $examorder)
    {
        $examOrderIds=$examorder->id;
        SendEmailJob::dispatch([$examOrderIds]);

        $this->dispatch('alert',type:'success',message:'Emails have been resent successfully !!'  );
        // $url=route('user.examorder', ['id' => $examorder->id,'token' =>$examorder->token]);
 
        // $details = [
        //     'subject'=>'Hello',
        //     'title' => 'Your Appoinment for Examination Work (Sangamner College Mail Notification)',
        //     'body' => 'This is sample content we have added for this test mail',
        //     'examorder_id'=> $examorder->id,
        //     'url'=>$url,
        // ];
    
        // Mail::to(trim($examorder->exampanel->faculty->email))
        //  ->cc(['exam.unit@sangamnercollege.edu.in','coeautonoumous@sangamnercollege.edu.in'])
        // ->send(new \App\Mail\MyTestMail($details));
    }

    public function bulkResend()
    {

        $examorders=Examorder::where('email_status',1)->get();
       
        $examOrderIds=$examorders;
        SendEmailJob::dispatch([$examOrderIds]);
        $this->dispatch('alert',type:'success',message:'Emails have been resent successfully !!'  );

        // dd($this->dispatch);
    }

    public function bulkCancel()
    {
        $examorders=Examorder::where('email_status',1)->get();
        $examOrderIds=$examorders;
        CancelOrderJob::dispatch([$examOrderIds]);
        $this->dispatch('alert',type:'success',message:'Emails have been sent successfully !!'  );
       
    }

    public function bulkDelete()
    {

        $examOrders = Examorder::withTrashed()->where('email_status', 0)->forcedelete();
        // $examOrders->delete();

        $this->dispatch('alert',type:'success',message:'Exam Order have been Deleted !!'  );      
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
        if($this->mode!=='all')
        {
            $this->exampanels = Exampanel::select('id','faculty_id','subject_id','examorderpost_id')->with(['faculty:id,faculty_name','subject:id,subject_name','examorderpost:id,post_name'])->get();
            $this->exampatternclasses = Exampatternclass::select('id','exam_id','patternclass_id')->get();                    
        }

        $examorders=Examorder::select('id','exampanel_id','exam_patternclass_id','description','email_status','deleted_at')
        ->with(['exampatternclass.patternclass.pattern:id,pattern_name','exampatternclass.patternclass.courseclass.classyear:classyear_name,id','exampatternclass.patternclass.courseclass.course:course_name,id','exampanel.faculty:id,faculty_name','exampanel.subject:id,subject_name','exampanel.examorderpost:id,post_name'])
        -> when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.exam-order.all-exam-order',compact('examorders'))->extends('layouts.user')->section('user');
    }
}
