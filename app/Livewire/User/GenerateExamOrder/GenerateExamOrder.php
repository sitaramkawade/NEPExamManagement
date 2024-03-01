<?php

namespace App\Livewire\User\GenerateExamOrder;

use Carbon\Carbon;
use App\Models\Exam;
use App\Models\Faculty;
use Livewire\Component;
use App\Models\Examorder;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ExamPatternclass;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;

class GenerateExamOrder extends Component
{
    use WithPagination;
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;
    public $exam_name;
    public $patternclass_id;
    public $mode='all';
    public $id;
    public $token;

    public function setmode($mode)
    {
        $this->mode=$mode;
    }

    public function generateExamPanel($id)
    {     
        $semesters = [1, 3, 5];
        // dd($id);
        $exampatternclass = ExamPatternclass::find($id);  
    //  dd($exampatternclass->patternclass->subjects);
        $panels = collect();
         foreach ($exampatternclass->patternclass->subjects->whereIn('subject_sem', $semesters) as $subject) {
            //   dd($subject);
            //  dd($subject->exampanels);
            foreach($subject->exampanels->where('active_status','1') as $pannel )    
            
             {
                // dd($pannel);
                $token = Str::random(64);
                $panels->add([
                    'exampanel_id' => $pannel->id,
                    'exam_patternclass_id' => $id,
                    'email_status' => '0',
                    'description' => 'a',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                 
                ]);
                
            }
        }
 
        $exampatternclass->order()->insert($panels->toArray());

        $this->dispatch('alert',type:'success',message:'Order Created Successfully !!'  );
        $this->setmode('all');
    }

    public function SendMail($id)
    {
        ini_set('max_execution_time', 1800); 
        $exampatterntclass = ExamPatternclass::find($id);
        $examOrderIds = $exampatterntclass->examorder->where('email_status', '0')->pluck('id')->toArray();

        //Queue::push(new SendEmailJob($examOrderIds));
        SendEmailJob::dispatch($examOrderIds);


        $this->dispatch('alert',type:'success',message:'Emails have been sent successfully !!'  );
        $this->setmode('all');
 
    }

    public function render()
    {

        $examids = Exam::where('status',1)->pluck('id')->toArray();
        
        $panels=ExamPatternclass::whereIn('exam_id',$examids)->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->paginate($this->perPage);

        return view('livewire.user.generate-exam-order.generate-exam-order',compact('panels'))->extends('layouts.user')->section('user');
    }
}
