<?php

namespace App\Http\Controllers\Student\Razorpay;

use Razorpay\Api\Api;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Examformmaster;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendEmailNotificationJob;

class RazorPayController extends Controller
{
    protected $api;

    public function __construct()
    {
        $this->api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));
    }


    public function student_pay_exam_form_fee(Examformmaster $examformmaster)
    {   
        if($examformmaster)
        {
            DB::beginTransaction();
            try
            {
                $orderdata = [
                    'amount' => ( $examformmaster->totalfee * 100 ),
                    'currency' => env('RAZORPAY_CURRENCY'),
                    'receipt' => 'Student_Exam_Form_Paymnet_'.$examformmaster->id.'_'.$examformmaster->student_id.'_'.time(),
                ];

                $order = $this->api->order->create($orderdata);
                if($order)
                {
                    $transaction= new Transaction;
                    if( $transaction)
                    {
                        $transaction->razorpay_order_id=$order->id;
                        $transaction->amount= $examformmaster->totalfee;
                        $transaction->status='created';
                        $transaction->save();
                        if($transaction)
                        {
                            $examformmaster->transaction_id = $transaction->id;
                            $examformmaster->update();
                        }
                    }
                    // $logo="data:image/x-icon;base64,".base64_encode(file_get_contents(public_path('favicon.ico')));
                    $json_order_data = [
                        "key" =>config('services.razorpay.key'), 
                        "amount"=> $examformmaster->totalfee * 100, 
                        "currency"=> env('RAZORPAY_CURRENCY'),
                        "name"=>preg_replace('/(?<!\ )[A-Z]/', ' $0', config('app.name')), 
                        "description"=> "Student_Exam_Form_Paymnet",
                        "order_id"=> $order->id,
                        "prefill"=> [
                            "name"=> $examformmaster->student->student_name,
                            "email"=>  $examformmaster->student->email,
                            "contact"=> $examformmaster->student->mobile_no
                        ],
                        "notes"=> [
                            "exam_form_id"=> $examformmaster->id,
                            "student_id"=> $examformmaster->student->id,
                            "member_id"=> $examformmaster->student->memid,
                            "address"=> isset($examformmaster->student->getpermanentaddress()->address)? $examformmaster->student->getpermanentaddress()->address:'',
                        ],
                        "theme"=> [
                            "color"=> "#32CD32" //lime
                        ]
                    ];
                    
                    DB::commit();
                    return view('razorpay.confirm_payment',compact('order','json_order_data'))->extends('layouts.student')->section('student');
                }

            } catch (\Razorpay\Api\Errors\Error $e) {
                \Log::error('Order Not Create error: ' . $e->getMessage());
                DB::rollback();
                return redirect()->route('student.dashboard')->with('alert', ['type' => 'error', 'message' => 'Order Not Created.']);
            }
        }

    }



    public function student_verify_exam_form_payment(Request $request)
    {   
        try {

            DB::beginTransaction();

            $transaction = Transaction::where('razorpay_order_id', $request->razorpay_order_id)->first();
            if($transaction)
            {
                $attributes = [
                    'razorpay_order_id' => $request->razorpay_order_id,
                    'razorpay_payment_id' => $request->razorpay_payment_id,
                    'razorpay_signature' => $request->razorpay_signature,
                ];
        
                $this->api->utility->verifyPaymentSignature($attributes);
                
                $payment = $this->api->payment->fetch($request->razorpay_payment_id);
                if($payment)
                {
                    $transaction->razorpay_payment_id = $request->razorpay_payment_id;
                    $transaction->razorpay_signature = $request->razorpay_signature;
                    $transaction->payment_date =  isset($payment['created_at']) ? date_create_from_format('U', $payment['created_at']) : null;
                    $transaction->status='captured'; // Capured
                    $transaction->save();
            
                    $exam_form_master =  $transaction->examformmaster()->first();
                    if( $exam_form_master)
                    {
                        $exam_form_master->feepaidstatus = 1;
                        $exam_form_master->save();
                    }
                }

            }

            $data = ['student_id' =>$exam_form_master->student_id, 'payment_response' => $payment];
            SendEmailNotificationJob::dispatch('sendPaymentNotification', $data);

            DB::commit();

            return redirect()->route('student.dashboard')->with('alert', ['type' => 'success', 'message' => 'Payment Success & Verification Success.']);

            // session()->flash('session-alert', [ ['type' => 'success', 'message' => 'Payment Success & Verification Success.'],]);
            // return response()->json(['redirect_url' => route('student.dashboard')]);
        } 
        catch (SignatureVerificationError $e) 
        {
            DB::rollBack();
            \Log::error('Payment verification error: ' . $e->getMessage());
            return redirect()->route('student.dashboard')->with('alert', ['type' => 'error', 'message' => 'Verification Failed.']);
            // session()->flash('session-alert', [ ['type' => 'error', 'message' => 'Verification Failed.'],]);
            // return response()->json(['redirect_url' => route('student.dashboard')]);
        } 
        catch (\Exception $e) 
        {
            DB::rollBack();
            \Log::error('Payment verification error: ' . $e->getMessage());
            return redirect()->route('student.dashboard')->with('alert', ['type' => 'error', 'message' => 'An error occurred during payment verification.']);
            // session()->flash('session-alert', [ ['type' => 'error', 'message' => 'An error occurred during payment verification.'],]);
            // return response()->json(['redirect_url' => route('student.dashboard')]);
        }
    }

    
    public function student_failed_exam_form_payment(Request $request)
    {   
        
        DB::beginTransaction();
        try 
        { 
            $transaction=Transaction::where('razorpay_order_id',$request->error_razorpay_order_id)->first();
            if( $transaction)
            {
                $transaction->razorpay_payment_id=$request->error_razorpay_payment_id;
                $transaction->status='failed'; // fail
                $transaction->update();

                $student=$transaction->examformmaster()->first();
                if($student)
                {   
                    $data = ['student_id' =>$student->student_id, 'payment_response' => $this->api->payment->fetch($request->error_razorpay_payment_id)];
                    SendEmailNotificationJob::dispatch('sendPaymentNotification', $data);
                }

                DB::commit();
                return redirect()->route('student.dashboard')->with('alert', ['type' => 'error', 'message' => 'Payment Failed.']);
            } 
            else 
            {
                return redirect()->route('student.dashboard')->with('alert', ['type' => 'error', 'message' => 'Transaction not found.']);
            }
        } 
        catch (\Exception $e) 
        {
            DB::rollback(); 

            return redirect()->route('student.dashboard')->with('alert', ['type' => 'error', 'message' => 'An error occurred while processing the payment.']);
        }
    }

    public function student_refund_exam_form(Examformmaster $examformmaster)
    {  
        if(isset($examformmaster->transaction->id))
        {
            $transaction=Transaction::find($examformmaster->transaction->id);
            if($transaction)
            {   
                DB::beginTransaction();
                try 
                { 
                    $refund = $this->api->payment->fetch($transaction->razorpay_payment_id)->refund([
                        'amount' => $transaction->amount*100,
                        'speed' => 'optimum',
                        "receipt"=>"Student_Exam_Form_Fee_Refund_".$examformmaster->id
                    ]);
                    $transaction->razorpay_refund_id= $refund->id;
                    $transaction->status= 'refunded'; // Refund
                    $transaction->update();
                    
                    $data = ['student_id' =>$examformmaster->student_id, 'payment_response' => $this->api->payment->fetch($transaction->razorpay_payment_id)->fetchRefund($refund->id)];
                    SendEmailNotificationJob::dispatch('sendPaymentNotification', $data);
                    
                    DB::commit();
                    
                    return redirect()->route('student.dashboard')->with('alert', ['type' => 'success', 'message' => 'Payment Refund Was Successful. Refund ID: '.$refund->id]);
                } 
                catch (\Razorpay\Api\Error\BadRequest $e) 
                {
                    \Log::error('Payment Already Been Fully Refunded: ' . $e->getMessage());
                    DB::rollback();
                    return redirect()->route('student.dashboard')->with('alert', ['type' => 'info','message' => 'This Payment Has Already Been Fully Refunded.',]);       
                } 
                catch (Exception $e) 
                {         
                    \Log::error('Payment refund error: ' . $e->getMessage());
                    DB::rollback();
                    return redirect()->route('student.dashboard')->with('alert', ['type' => 'error', 'message' => 'An error occurred while processing the refund. Please try again later.']);
                }
            }
        }
    }
}
