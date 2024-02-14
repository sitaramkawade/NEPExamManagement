<?php

namespace App\Mail;

use App\Models\Examorder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details; 

    /**
     * Create a new message instance.
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        $e=Examorder::find($this->details['examorder_id']);
       $url=$this->details['url'];
          
        return $this->markdown('emails.examorder')
        ->subject('Your Appointment for the Exam Work')
        ->with([
            'examorder' => $e,
            'url'=>$url,
        ]);
    }
  
}
