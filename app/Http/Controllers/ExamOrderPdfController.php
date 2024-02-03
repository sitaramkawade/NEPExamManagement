<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Examorder;
use Illuminate\Http\Request;



class ExamOrderPdfController extends Controller
{
    public $token;
    public $examorder;
  

    public function order($id)
    {

         $examorder = Examorder::find($id);

        //  dd($id);

        if ($examorder && $examorder->token === $this->token) {
            view()->share('pdf.examorder_pdf',compact('examorder'));

            $pdf = Pdf::loadView('pdf.examorder_pdf',compact('examorder'))
                ->setOptions(['defaultFont' => 'sans-serif']);

              return $pdf->stream('Exam-Order.pdf');
        } else {
            abort(404);
        }
    }
}
