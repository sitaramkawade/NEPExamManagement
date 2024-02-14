<?php

namespace App\Http\Controllers\Student\Razorpay;

use Razorpay\Api\Api;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Examformmaster;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RazorPayController extends Controller
{
    protected $api;

    public function __construct()
    {
        $this->api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));
    }


    public function student_pay_exam_form_fee(Examformmaster $examformmaster)
    {   
        if($examformmaster)
        {
            
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
                        $transaction->status=1;
                        $transaction->save();
                        if($transaction)
                        {
                            $examformmaster->transaction_id = $transaction->id;
                            $examformmaster->update();
                        }
                    }
    
                    $json_order_data = [
                        "key" =>env('RAZORPAY_KEY_ID'), 
                        "amount"=> $examformmaster->totalfee * 100, 
                        "currency"=> env('RAZORPAY_CURRENCY'),
                        "name"=>preg_replace('/(?<!\ )[A-Z]/', ' $0', config('app.name')), 
                        "description"=> "Student_Exam_Form_Paymnet",
                        "image"=>asset('favicon.ico'),
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
        
                    return view('razorpay.confirm_payment',compact('order','json_order_data'))->extends('layouts.student')->section('student');
                }

            } catch (\Razorpay\Api\Errors\Error $e) {
                
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
        
                $transaction->razorpay_payment_id = $request->razorpay_payment_id;
                $transaction->razorpay_signature = $request->razorpay_signature;
                $transaction->status = 3; // Capured
                $transaction->save();
        
                $exam_form_master =  $transaction->examformmaster()->first();
                if( $exam_form_master)
                {
                    $exam_form_master->feepaidstatus = 1;
                    $exam_form_master->save();
                }
            
            }


            // $student = Student::find($exam_form_master->student_id);
            // if ($student) {
            //     $student->notify(new PaymentSuccessNotification($this->api->payment->fetch($request->razorpay_payment_id)));
            // }

            DB::commit();

            return redirect()->route('student.dashboard')->with('alert', ['type' => 'success', 'message' => 'Payment Success & Verification Success.']);

        } 
        catch (SignatureVerificationError $e) 
        {
            DB::rollBack();
            return redirect()->route('student.dashboard')->with('alert', ['type' => 'error', 'message' => 'Verification Failed.']);
        } 
        catch (\Exception $e) 
        {
            DB::rollBack();
            \Log::error('Payment verification error: ' . $e->getMessage());
            return redirect()->route('student.dashboard')->with('alert', ['type' => 'error', 'message' => 'An error occurred during payment verification.']);
        }
    }

    
    public function student_failed_exam_form_payment(Request $request)
    {   
      $transaction=Transaction::where('razorpay_order_id',$request->error_razorpay_order_id)->first();
      if( $transaction)
      {
        $transaction->razorpay_payment_id=$request->error_razorpay_payment_id;
        $transaction->status=5; // fail
        $transaction->update();

        // $student =Student::find($temp);
        // $student->notify(new PaymentFailNotification($this->api->payment->fetch($request->error_razorpay_payment_id)));

        return redirect()->route('student.dashboard')->with('alert', ['type' => 'error', 'message' => 'Payment Failed.']);
      }
    }

    public function student_refund_exam_form(Examformmaster $examformmaster)
    {  

        if(isset($examformmaster->transaction->id))
        {

            $transaction=Transaction::find($examformmaster->transaction->id);
            if($transaction)
            {
                try { 
    
                    $refund = $this->api->payment->fetch($transaction->razorpay_payment_id)->refund([
                        'amount' => $transaction->amount*100,
                        'speed' => 'optimum',
                        "receipt"=>"Student_Exam_Form_Fee_Refund_".$examformmaster->id
                    ]);
    
                    $transaction->razorpay_refund_id= $refund->id;
                    $transaction->status=4; // Refund
                    $transaction->update();
                    
                    // $student =Student::find($exam_form_master->student_id);
                    // $student->notify(new PaymentRefundNotification($this->api->payment->fetch($transaction->razorpay_payment_id)->fetchRefund($refund->id)));
                   
    
                    return redirect()->route('student.dashboard')->with('alert', ['type' => 'success', 'message' => 'Payment Refund Was Successful. Refund ID: '.$refund->id]);
               
                } catch (\Razorpay\Api\Error\BadRequest $e) {
    
                    return redirect()->route('student.dashboard')->with('alert', ['type' => 'info','message' => 'This Payment Has Already Been Fully Refunded.',]);
            
                } catch (Exception $e) {
    
                    return redirect()->route('student.dashboard')->with('alert', ['type' => 'error', 'message' => 'An error occurred while processing the refund. Please try again later.']);
                }
            }
        }
      
    }

}
