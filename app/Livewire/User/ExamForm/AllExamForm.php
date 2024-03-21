<?php

namespace App\Livewire\User\ExamForm;

use Excel;
use App\Models\Exam;
use Livewire\Component;
use App\Models\Transaction;
use App\Models\Academicyear;
use App\Models\Patternclass;
use Livewire\WithPagination;
use App\Models\Examformmaster;
use App\Exports\User\ExamForm\ExamFormExport;

class AllExamForm extends Component
{   
    use WithPagination;


    public $mode='all';
    public $perPage=10;
    public $search='';
    public $sortColumn="transactions.payment_date";
    public $sortColumnBy="ASC";
    public $ext;
    public $academicyear_id;
    public $exam_id;
    public $patternclass_id;
    public $fee_status;
    public $payment_status;
    public $academic_years=[];
    public $exams=[];
    public $patternclasses=[];


    public function sort_column($column)
    {
        if( $this->sortColumn === $column)
        {
            $this->sortColumnBy=($this->sortColumnBy=="ASC")?"DESC":"ASC";
            return;
        }
        $this->sortColumn=$column;
        $this->sortColumnBy=="ASC";
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function export()
    {
        $filename="Exam-Form-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExamFormExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExamFormExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExamFormExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }




    public function mount()
    {   
        $this->academic_years=Academicyear::all();
        $this->exams=Exam::all();
        $this->patternclasses =Patternclass::all();
    }

    public function clear()
    {   
        $this->exam_id=null;
        $this->patternclass_id=null;
        $this->academicyear_id=null;
        $this->fee_status=null;
        $this->payment_status=null;
        $this->search=null;
    }

    public function render()
    {   
        $exam_form_masters = Examformmaster::with('transaction')
        ->leftJoin('transactions', 'examformmasters.transaction_id', '=', 'transactions.id')
        ->when($this->payment_status, function ($query, $payment_status) {
            $query->whereHas('transaction', function ($subQuery) use ($payment_status) {
                $subQuery->where('status', $payment_status);
            });
        })
        ->when($this->exam_id, function ($query) {
          
            $query->where('exam_id',$this->exam_id);
            
        })
        ->when($this->patternclass_id, function ($query) {
          
            $query->where('patternclass_id',$this->patternclass_id);
            
        })
        ->when($this->fee_status, function ($query, $fee_status) {
            if($fee_status==1)
            {
                $query->where('feepaidstatus', 1);
            }elseif($fee_status==2)
            {
                $query->whereNot('feepaidstatus',1);
            }
        })
        ->when($this->academicyear_id, function ($query, $yearid) {
            $query->whereIn('exam_id', function ($subQuery) use ($yearid) {
                $subQuery->select('id')->from('exams')->where('academicyear_id', $yearid);
            });
        })
        ->when($this->search, function ($query, $search) { $query->search($search);})->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);
       
    
 
        return view('livewire.user.exam-form.all-exam-form',compact('exam_form_masters'))->extends('layouts.user')->section('user');
    }

}
