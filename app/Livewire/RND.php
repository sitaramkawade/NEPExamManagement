<?php

namespace App\Livewire;

use Mpdf\Mpdf;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;

class RND extends Component
{   

    use WithFileUploads;
    public $pdfFile;


    public function addWatermark(Request $request)
    {
        $pdfFile = $this->pdfFile;

        if ($pdfFile) {
            $watermarkedPdf = $this->addWatermarkToPdf($pdfFile, $request);

            $path = 'pdf/';
            $fileName = 'watermarked.pdf';

            \Storage::disk('public')->put($path . $fileName, $watermarkedPdf);

            $db_path = 'storage/' . $path . $fileName;

            dd($db_path);

            session()->flash('success', 'Watermark added successfully.');
        }

        session()->flash('error', 'Please select a PDF file.');
    }

    private function addWatermarkToPdf($pdfFile, $request)
    {
        $mpdf = new Mpdf();
        $mpdf->SetProtection(array(), 'user', 'Admin');
        $watermark = $request->ip().' - '.date('d/m/Y h:i:s A');

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
            $mpdf->Image($watermarkImagePath, 50, 50, $imageWidth, $imageHeight);
            $mpdf->SetAlpha(1);
            $mpdf->SetWatermarkText($watermark, 0.2);
            $mpdf->showWatermarkText = true;
            $mpdf->SetHTMLFooter('<table width="100%"><tr><td width="33%" style="font-size:10px; text-align-center;">{PAGENO}/{nbpg}</td><td width="33%"></td><td width="33%" style="text-align: right; font-size:10px;"> Date : {DATE j-m-Y}</td></tr></table>');
        }

        return $mpdf->Output('', 'S');
    }

    public function render()
    {   
        return view('livewire.rnd')->extends('layouts.user')->section('user');
    }
}
