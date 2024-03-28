<?php

namespace App\Jobs\User;

use App\Models\Student;
use Illuminate\Support\Facades\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Notifications\Payment\PaymentNotification;

class SendEmailNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $task;
    protected $data;

    public function __construct($task, $data)
    {
        $this->task = $task;
        $this->data = $data;
    }

    public function handle()
    {   
        $task = $this->task;

        switch ($task) {
            case 'sendPaymentNotification':
                $this->sendPaymentNotification($this->data);
                break;
            case 'sendOrderNotification':
                $this->sendOrderNotification($this->data);
                break;
        }
    }

    public function sendPaymentNotification($data)
    {
        $student = Student::find($data['student_id']);
        
        if ($student) {
            $student->notify(new PaymentNotification($data['payment_response']));
        }
    }

    public function sendOrderNotification($data)
    {
        //
    }
}
