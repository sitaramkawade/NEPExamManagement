<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpdf\Mpdf;


class WatermarkController extends Controller
{

    public function index()
    {
        return view('test-pdf');
    }


    public function addWatermark(Request $request)
    {
        $pdfFile = $request->file('pdf_file');
        
        if ($pdfFile) {

            $watermarkedPdf = $this->addWatermarkToPdf($pdfFile,$request);

            return response()->streamDownload(function () use ($watermarkedPdf) {
                echo $watermarkedPdf;
            }, 'watermarked.pdf');
        }
        
        return back()->with('error', 'Please select a PDF file.');
    }

    // private function addWatermarkToPdf($pdfFile,$request)
    // {
    //     $mpdf = new Mpdf();
    //      Protection
    //     $mpdf->SetProtection(array('copy','print','modify','annot-forms','fill-forms','extract','assemble','print-highres'), 'user', 'Admin');
    //     $ip_adress=$request->server('REMOTE_ADDR');

    //     $watermarkImagePath = public_path('img/shikshan-logo.png');
    
    //     if (!file_exists($watermarkImagePath)) {
            
    //         return false;
    //     }

    //     $pages = $mpdf->SetSourceFile($pdfFile->getPathname());
    //     for ($i = 1; $i <= $pages; $i++) {
    //         $mpdf->AddPage();
    //         $tplIdx = $mpdf->ImportPage($i);
    //         $mpdf->UseTemplate($tplIdx, 0, 0, null, null, true);
    //         $imageWidth = 200;
    //         $imageHeight = 100;
    //         $opacity = 0.2;
    //         $mpdf->SetAlpha($opacity);
    //         $mpdf->Image($watermarkImagePath,50, 50, $imageWidth, $imageHeight);
    //         $mpdf->SetAlpha(1);
    //     }
        
    //     return $mpdf->Output('', 'S');
    // }


  

   
    

    private function addWatermarkToPdf($pdfFile,$request)
    {
        $mpdf = new Mpdf();
        // $mpdf->SetProtection(array('copy','print','modify','annot-forms','fill-forms','extract','assemble','print-highres'), 'user', 'Admin');
        $mpdf->SetProtection(array(), 'user', 'Admin');
        $watermark=$request->ip('REMOTE_ADDR').' - '.date('d/m/Y h:i:s A');


        $watermarkImagePath = public_path('img/shikshan-logo.png');
    
        if (!file_exists($watermarkImagePath)) {
            
            return false;
        }

        $pages = $mpdf->SetSourceFile($pdfFile->getPathname());
        for ($i = 1; $i <= $pages; $i++) {
            $mpdf->AddPage();
            $tplIdx = $mpdf->ImportPage($i);
            $mpdf->UseTemplate($tplIdx, 0, 0, null, null, true);
            $imageWidth = 200;
            $imageHeight = 100;
            $opacity = 0.2;
            $mpdf->SetAlpha($opacity);
            $mpdf->Image($watermarkImagePath,50, 50, $imageWidth, $imageHeight);
            $mpdf->SetAlpha(1);
            $mpdf->SetWatermarkText($watermark,0.2);
            $mpdf->showWatermarkText = true;
            $mpdf->SetHTMLFooter('<table width="100%"><tr><td width="33%" style="font-size:10px; text-align-center;">{PAGENO}/{nbpg}</td><td width="33%"></td><td width="33%" style="text-align: right; font-size:10px;"> Date : {DATE j-m-Y}</td></tr></table>');

        }
        
        return $mpdf->Output('', 'S');
    }











}
