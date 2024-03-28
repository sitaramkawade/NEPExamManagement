<?php

namespace App\Jobs\User;

use App\Mail\MyTestMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendExamOrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;
    
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to(trim($this->details['email']))
        ->cc(['exam.unit@sangamnercollege.edu.in', 'coeautonoumous@sangamnercollege.edu.in'])
        ->send(new MyTestMail($this->details));

    }
}
