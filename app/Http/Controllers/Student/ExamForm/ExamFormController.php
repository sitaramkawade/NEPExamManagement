<?php

namespace App\Http\Controllers\Student\ExamForm;

use PDF;
use App\Models\Exam;
use DNS1D;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExamFormController extends Controller
{
    public function print_preview_exam_form()
    {   
        $student = Auth::guard('student')->user();
        $active_exam = Exam::select('id')->Where('status',1)->first();
        if($active_exam)
        {
            $exam_form_master=$student->examformmasters->where('exam_id', $active_exam->id)->first();
            if($exam_form_master)
            {   
                if($exam_form_master->printstatus==0)
                {   
                    $flag=1;
                    $pdf = PDF::loadView('pdf.student.exam_form.print_exam_form_pdf', compact('exam_form_master','flag'))->setPaper('a4', 'portrait')->setOptions(['images' => true, 'defaultFont' => 'sans-serif']);
                    $pdf->output();
                    $canvas = $pdf->getDomPDF()->getCanvas();
                    $canvas->set_opacity(.2,"Multiply");
                    $canvas->page_text($canvas->get_width()/5,  $canvas->get_height()/2, 'Print Preview', null, 70, array(0,0,0),2,2,-30);
                    return $pdf->stream('exam_form_preview.pdf');
                }
            }
        }
    }

    public function print_final_exam_form()
    {   
        $student = Auth::guard('student')->user();
        $active_exam = Exam::select('id')->Where('status',1)->first();
        if($active_exam)
        {
            $exam_form_master=$student->examformmasters->where('exam_id', $active_exam->id)->first();
            if($exam_form_master)
            {   
                if($exam_form_master->printstatus==0)
                {   
                    $exam_form_master->update(['printstatus'=>1]);
                }
                
                $pdf = PDF::loadView('pdf.student.exam_form.print_exam_form_pdf', compact('exam_form_master'))->setPaper('a4', 'portrait')->setOptions(['images' => true, 'defaultFont' => 'sans-serif']);
                $pdf->output();
                return $pdf->stream('exam_form.pdf');
            }
        }
    }


    public function print_exam_form_fee_recipet()
    {   
        $student = Auth::guard('student')->user();
        $active_exam = Exam::select('id')->Where('status',1)->first();
        if($active_exam)
        {
            $exam_form_master=$student->examformmasters->where('exam_id', $active_exam->id)->first();
            if($exam_form_master)
            {

                $pdf = PDF::loadView('pdf.student.exam_form.print_exam_form_fee_recipet', compact('exam_form_master'))->setPaper('A4');
                return $pdf->download('exam_form_fee_recipet.pdf');
            }
        }
    }
}
