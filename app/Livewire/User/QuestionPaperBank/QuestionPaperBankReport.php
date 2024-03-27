<?php

namespace App\Livewire\User\QuestionPaperBank;

use Excel;
use App\Models\Exam;
use Livewire\Component;
use App\Models\Paperset;
use Livewire\WithPagination;
use App\Models\Examformmaster;
use Illuminate\Support\Facades\View;
use App\Exports\User\QuestionPaperBank\QuestionPaperBankExport;

class QuestionPaperBankReport extends Component
{   
    use WithPagination;
  
    
    public $perPage=10;
    public $ext;

    
    #[Renderless]
    public function export()
    {
        $filename="Question_Paper_Bank_Report-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new QuestionPaperBankExport, $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new QuestionPaperBankExport, $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new QuestionPaperBankExport, $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,['landscape' => true]);
            break;
        }
    }

    public function render()
    {   
        $papersets=Paperset::get();
        $exam=Exam::where('status',1)->first();
        // $exam_form_masters =Examformmaster::where('exam_id',$exam->id)->paginate($this->perPage);
        $exam_form_masters =Examformmaster::where('exam_id',$exam->id)->get();
        return view('livewire.user.question-paper-bank.question-paper-bank-report',compact('papersets','exam','exam_form_masters'))->extends('layouts.user')->section('user');
    }
}
