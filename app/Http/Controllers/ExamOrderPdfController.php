<?php

namespace App\Http\Controllers;

use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Examorder;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Examtimetable;
use Illuminate\Support\Carbon;
use App\Models\Exampatternclass;

class ExamOrderPdfController extends Controller
{
    public $token;

    public $examorder;
    public $examtimetables;
  

    public function order($id)
    {

        $examorder=Examorder::find($id);

        if ($examorder && $examorder->token === $this->token) {
            view()->share('pdf.examorder.examorder_pdf',compact('examorder'));

            $pdf = Pdf::loadView('pdf.examorder.examorder_pdf',compact('examorder'))
                ->setOptions(['defaultFont' => 'sans-serif']);

              return $pdf->stream('Exam-Order.pdf');
        } else {
             
            return abort(404);
           
        }
    }

    public function cancelorder(Examorder $examorder)
    {
        if ($examorder && $examorder->token === $this->token) {
            view()->share('pdf.cancelorder.cancelorder_pdf');

            $pdf = Pdf::loadView('pdf.cancelorder.cancelorder_pdf')
                ->setOptions(['defaultFont' => 'sans-serif']);

              return $pdf->stream('Exam-Order.pdf');
        } else {
             
            return abort(404);
           
        }

    }


    public function timetable(Exampatternclass $exampatternclass)
    
    {
          $exam_time_table_data = Examtimetable::where('exam_patternclasses_id' , $exampatternclass->id)->get();
         // dd($exam_time_table_data,$exampatternclass); // Fetch your timetable data here

        // Render the timetable Blade view to HTML
        $html = view('pdf.examtimetable.examtimetable_pdf', ['exam_time_table_data' => $exam_time_table_data])->render();

        // Configure Dompdf options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
 
        $dompdf->setPaper('A4', 'landscape');
     
        $dompdf->render();
   
        $dompdf->stream('exam_timetable.pdf', ['Attachment' => false]);
       
    }

}
