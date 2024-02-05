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

              return $pdf->stream('Exam-Order.pdf');
        } else {
             
            return abort(404);
           
        }
    }

    public function generateExamPanel($id)
    
    {
        $semesters = [1, 3, 5];
 
        // dd($id);
        $exampatternclass = ExamPatternclass::find($id);  
        //  dd($exampatternclass->patternclass->subjects);
        $panels = collect();
       

         foreach ($exampatternclass->patternclass->subjects->whereIn('subject_sem', $semesters) as $subject) {
             
            foreach($subject->exampanels->where('active_status','1') as $pannel)
             {
                //dd($pannel);
                $token = Str::random(64);
                $panels->add([
                    'exampanel_id' => $pannel->id,
                    'exam_patternclass_id' => $id,
                    'email_status' => '0',
                    'description' => $token,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                 
                ]);
            }
        }
 
        $exampatternclass->order()->insert($panels->toArray());

         session()->flash('success', 'Panel Generated');

         return redirect()->back();
    }

}
