<?php

namespace App\Livewire\User\GenerateExamOrder;

use Carbon\Carbon;
use App\Models\Exam;
use App\Models\Faculty;
use Livewire\Component;
use App\Models\Semester;
use App\Models\Examorder;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Exampatternclass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;

class GenerateExamOrder extends Component
{
    use WithPagination;
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $sub_sem;
    public $sub_sem2=[];
    public $semesters=[];
    public $semester=[];
    public $exam_name;
    public $patternclass_id;
    public $mode='all';
    public $id;
    public $token;

    public function setmode($mode)
    {
        $this->mode=$mode;
    }

    public function generateExamPanel(Exampatternclass $exampatternclass)
    {     
        $panels = collect();

         foreach ($exampatternclass->patternclass->subjects->whereIn('subject_sem', $this->semester) as $subject) 
        {     
            foreach($subject->exampanels as $pannel )
            {                   
                $exam_order_data = [];
                $token = Str::random(30);
        
                $panels = [
                'user_id'=>Auth::guard('user')->user()->id,
                'exampanel_id' => $pannel->id,
                'exam_patternclass_id' => $exampatternclass->id,
                'email_status' => '0',
                'description' => '',
                'token'=>  $token,
                'created_at' => now(),
                'updated_at' => now(),                 
                ];
                    
                $exam_order_data[] = Examorder::create($panels);               
            }        
        }

        $this->dispatch('alert',type:'success',message:'Order Created Successfully !!'  );
        $this->setmode('all');
    }

    public function SendMail($id)
    {
        ini_set('max_execution_time', 1800); 
        $exampatterntclass = Exampatternclass::find($id);
        $examOrderIds = $exampatterntclass->examorder->where('email_status', '0')->pluck('id')->toArray();

        SendEmailJob::dispatch($examOrderIds);

        $this->dispatch('alert',type:'success',message:'Emails have been sent successfully !!'  );
        $this->setmode('all');
    }

    public function render()
    {
        $this->semesters=Semester::where('status',1)->pluck('semester','id');
        $examids = Exam::where('status',1)->pluck('id')->toArray();
        
        $exampatternclasses=Exampatternclass::whereIn('exam_id',$examids)->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->paginate($this->perPage);

        return view('livewire.user.generate-exam-order.generate-exam-order',compact('exampatternclasses'))->extends('layouts.user')->section('user');
    }
}
