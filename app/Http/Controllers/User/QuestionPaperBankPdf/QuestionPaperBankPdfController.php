<?php

namespace App\Http\Controllers\User\QuestionPaperBankPdf;

use Mpdf\Mpdf;
use Illuminate\Http\Request;
use App\Models\Questionpaperbank;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestionPaperBankPdfController extends Controller
{
    public function preview_question_paper(Request $request)
    {   
        $questionpaperbank =Questionpaperbank::find($request->questionpaperbank);

        if($questionpaperbank->papersubmission->is_confirmed!==1 && $questionpaperbank->user_id === Auth::guard('user')->user()->id)
        {
            if(file_exists($questionpaperbank->file_path))
            {
                return response()->file($questionpaperbank->file_path);
            }
            else
            {
                return abort(404);
            }

        }else
        {
            return abort(403);
        }
    }

    public function download_question_paper(Request $request)
    {   
        $questionpaperbank = Questionpaperbank::find($request->questionpaperbank);
    
        if($questionpaperbank && $questionpaperbank->papersubmission->is_confirmed == 1 && $questionpaperbank->user_id === Auth::guard('user')->user()->id)
        {
            if(file_exists($questionpaperbank->file_path))
            {   
                $apply_watermark_and_download_pdf = true;

                if(!$apply_watermark_and_download_pdf)
                {
                    $file_path = $questionpaperbank->file_path;

                    return response()->download($file_path);
                }
                else
                {
                    $watermarkedPdf = $this->addWatermarkToPdfFromPath($questionpaperbank->file_path, $request);
                    if ($watermarkedPdf) {
                        return response()->streamDownload(function () use ($watermarkedPdf) {
                            echo $watermarkedPdf;
                        }, 'watermarked.pdf');
                    } else {
    
                        return abort(500, 'Failed to add watermark to PDF');
                    }
                }

            }
            else
            {
                return abort(404, 'PDF file not found');
            }
        }
        else
        {
            return abort(403, 'Unauthorized access');
        }
    }
   
    public function addWatermarkToPdfFromPath($pdfPath, $request)
    {
        $mpdf = new Mpdf();
        $mpdf->SetProtection(array(), 'user', 'Admin');
        $watermark = $request->ip('REMOTE_ADDR') . ' - ' . date('d/m/Y h:i:s A');
        $watermarkImagePath = public_path('img/shikshan-logo.png');
    
        if (!file_exists($watermarkImagePath)) {
            return false;
        }

        $mpdf->SetSourceFile($pdfPath);
    
        $pages = $mpdf->SetSourceFile($pdfPath);
        $tplId = [];

        for ($i = 1; $i <= $pages; $i++) {
            $tplId[$i] = $mpdf->ImportPage($i);
        }
    
        foreach ($tplId as $tplidx) {
            $mpdf->UseTemplate($tplidx);
            $imageWidth = 200;
            $imageHeight = 100;
            $opacity = 0.2;
            $mpdf->SetAlpha($opacity);
            $mpdf->Image($watermarkImagePath, 50, 50, $imageWidth, $imageHeight);
            $mpdf->SetAlpha(1);
            $mpdf->SetWatermarkText($watermark, 0.2);
            $mpdf->showWatermarkText = true;
    
            $mpdf->SetHTMLFooter('<table width="100%"><tr><td width="33%" style="font-size:10px; text-align-center;">{PAGENO}/{nbpg}</td><td width="33%"></td><td width="33%" style="text-align: right; font-size:10px;"> Date : {DATE j-m-Y}</td></tr></table>');
            $mpdf->AddPage();
        }
    
        return $mpdf->Output('', 'S');
    }
}
