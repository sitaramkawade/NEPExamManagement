<?php

namespace App\Jobs;

use App\Mail\MyTestMail;
use App\Models\Examorder;
use Illuminate\Bus\Queueable;
use App\Models\Exampatternclass;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $examOrderIds;

    public function __construct($examOrderIds)
    {
        $this->examOrderIds = $examOrderIds;
       
    }

    public function handle(): void
    {
        foreach ($this->examOrderIds as $examOrderId) {
          
            $examOrder = Examorder::find($examOrderId);
           if($examOrder)
            {
             $url = url('user/exam/order/'.$examOrder->id.'/'.$examOrder->token);
                
                $details = [
                    'subject' => 'Hello',
                    'title' => 'Your Appointment for Cancel Examination Work (Sangamner College Mail Notification)',
                    'body' => 'This is sample content we have added for this test mail',
                    'examorder_id' => $examOrder->id,
                    'url' => $url,
                ];

                Mail::to(trim($examOrder->exampanel->faculty->email))
                ->cc(['exam.unit@sangamnercollege.edu.in', 'coeautonoumous@sangamnercollege.edu.in'])
                ->send(new MyTestMail($details));

            }
        }   
        
    }
}

