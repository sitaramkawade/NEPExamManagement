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

            $watermarkedPdf = $this->addWatermarkToPdf($pdfFile);

            return response()->streamDownload(function () use ($watermarkedPdf) {
                echo $watermarkedPdf;
            }, 'watermarked.pdf');
        }
        
        return back()->with('error', 'Please select a PDF file.');
    }

    private function addWatermarkToPdf($pdfFile)
    {
        $mpdf = new Mpdf();

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
        }
        
        return $mpdf->Output('', 'S');
    }
}
