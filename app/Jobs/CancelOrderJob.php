<?php

namespace App\Jobs;

use App\Mail\MyTestMail;
use App\Models\Examorder;
use App\Mail\CancelOrderMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CancelOrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $examOrderIds;

    public function __construct($examOrderIds)
    {
        $this->examOrderIds = $examOrderIds;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->examOrderIds as $examOrderId) {
          
            $examOrders = Examorder::find($examOrderId);

            foreach($examOrders as $examOrder)
        {
            $url = route('user.cancelorder', ['id' => $examOrder->id, 'token' => $examOrder->token]);
    
            $details = [
                'subject' => 'Hello',
                'title' => 'Your Appointment for Cancel Examination Work (Sangamner College Mail Notification)',
                'body' => 'This is sample content we have added for this test mail',
                'examorder_id' => $examOrder->id,
                'url' => $url,
            ];

            Mail::to(trim($examOrder->exampanel->faculty->email))
            ->cc(['exam.unit@sangamnercollege.edu.in', 'coeautonoumous@sangamnercollege.edu.in'])
            ->send(new CancelOrderMail($details));

        }
        }
    }
}
