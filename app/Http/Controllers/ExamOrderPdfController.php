<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Examorder;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ExamPatternclass;

class ExamOrderPdfController extends Controller
{
    public $token;

    public $examorder;
  

    public function order($id)
    {

        $examorder=Examorder::find($id);

        if ($examorder && $examorder->token === $this->token) {
            view()->share('pdf.examorder_pdf',compact('examorder'));

            $pdf = Pdf::loadView('pdf.examorder_pdf',compact('examorder'))
                ->setOptions(['defaultFont' => 'sans-serif']);

              return $pdf->download('Exam-Order.pdf');
        } else {
             
            return abort(404);
           
        }
    }

    

}
