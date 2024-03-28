<?php

namespace App\Livewire\User\PaperSubmission;

use Excel;
use App\Models\Exam;
use App\Models\User;
use App\Models\Faculty;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Department;
use App\Models\Patternclass;
use Livewire\WithPagination;
use App\Models\Papersubmission;
use Illuminate\Validation\Rule;
use App\Mail\User\PaperSubmitted;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Jobs\User\PaperSubmissionJob;
use App\Exports\User\Papersubmission\ExportPaperSubmission;

class AllPaperSubmission extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'forcedelete'];

    public $mode='add';
    public $per_page = 10;
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;

    public $exam_id;
    public $subject_id;
    public $noofsets;
    public $faculty_id;
    public $department_id;
    public $user_id;
    public $status;
    public $patternclass_id;
    public $exams;
    public $patternclasses;
    public $subjects=[];
    public $faculties=[];
    public $users;
    public $departments;
    public $facultydata;

    #[Locked]
    public $paper_id;
    #[Locked]
    public $delete_id;

    public function rules()
    {
        return [
            'subject_id' => ['required',Rule::exists(Subject::class,'id')],
            'noofsets' => ['required','numeric'],
         ];
    }

    public function resetinput()
    {       
        $this->subject_id=null;   
        $this->noofsets=null;          
        $this->patternclass_id=null;       
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function setmode($mode)
    {
        if($mode=='add')
        {
            $this->resetinput();
        }
        if($mode=='edit')
        {
            $this->resetValidation();
        }
        $this->mode=$mode;
    }

    public function save()
    {
        $validatedData= $this->validate();
        if($validatedData)
        {
            $exam=Exam::where('status',1)->first();
            if( $exam)
            {
                $papersubmission = Papersubmission::create([
                'exam_id' => $exam->id,
                'subject_id' => $this->subject_id,
                'noofsets' => $this->noofsets,
                'user_id' =>  Auth::guard('user')->user()->id,
                'faculty_id' =>  $this->facultydata->faculty_id,
                'status' => 1
                ]);
                PaperSubmissionJob::dispatch($papersubmission);
            }
        

            $details = [
                'subject' => 'Hello',
                'title' => 'Acknowledgment regarding manuscript submission (Sangamner College Mail Notification)',
                'body' => 'This is sample content we have added for this test mail',
                'papersubmission' => $papersubmission->id,
            ];
    
            Mail::to(trim($this->facultydata->faculty->email))
            ->cc(['exam.unit@sangamnercollege.edu.in'])
            ->send(new PaperSubmitted($details));

            $this->setmode('add');
            $this->dispatch('alert',type:'success',message:'Paper Submission Added Successfully !!'  );
        }
    }

    public function edit()
    {
        $papersubmission=new Papersubmission;
        $this->paper_id=$papersubmission->id;
        $this->exam_id = $papersubmission->exam_id;
        $this->subject_id = $papersubmission->subject_id;
        $this->noofsets = $papersubmission->noofsets;
        $this->status = $papersubmission->status;
            
        $this->setmode('edit');
    }

    public function update(Papersubmission $papersubmission)
    {
        $papersubmission = Papersubmission::update([
            'exam_id' => $this->exam_id,
            'subject_id' => $this->subject_id,
            'noofsets' => $this->noofsets,
            'user_id' =>  Auth::guard('user')->user()->id,
            'faculty_id' =>  $this->facultydata->faculty_id,
            'status' => $this->status,
            ]);                   
        $this->dispatch('alert',type:'success',message:'Paper Submission Updated Successfully !!'  );
        $this->setmode('all');
    }

    public function Status(Papersubmission $papersubmission)
    {
        if($papersubmission->status)
        {
            $papersubmission->status=0;
        }
        else
        {
            $papersubmission->status=1;
        }
        $papersubmission->update();
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function delete(Papersubmission $papersubmission)
    {   
        $papersubmission->delete();
        $this->dispatch('alert',type:'success',message:'Paper Submission Soft Deleted Successfully !!');
    }

    public function restore($id)
    {   
        $papersubmission = Papersubmission::withTrashed()->find($id);
        $papersubmission->restore();
        $this->dispatch('alert',type:'success',message:'Paper Submission Restored Successfully !!');
    }

    public function forcedelete()
    {  try
        {
            $papersubmission = Papersubmission::withTrashed()->find($this->delete_id);
            $papersubmission->forceDelete();
            $this->dispatch('alert',type:'success',message:'Paper Submission Deleted Successfully !!');
        } catch
            (\Illuminate\Database\QueryException $e) {  
            if ($e->errorInfo[1] == 1451) {
    
                $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
            } 
        }
    }
 
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

    public function export()
    {   
        $filename="Papersubmission-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportPaperSubmission($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportPaperSubmission($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportPaperSubmission($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        } 
    }
  
    public function render()
    {
            $this->exams=Exam::where('status',1)->pluck('exam_name','id');
            $this->patternclasses=Patternclass::select('id','class_id','pattern_id')->with(['pattern:pattern_name,id','courseclass.course:course_name,id','courseclass.classyear:classyear_name,id'])->where('status',1)->get();           

            if($this->patternclass_id)
            {
                $this->subjects = Subject::where('status', 1)->where('patternclass_id', $this->patternclass_id)->pluck('subject_name', 'id');
            }

            if($this->subject_id)
            {
               $subject= Subject::find($this->subject_id);
               if($subject)
                {
                    $this->facultydata = $subject->exampanels->where('examorderpost_id', '1')->where('active_status', '1')->first();
                    //  dd($this->facultydata);
                }
            }
        

        $papersubmissions=Papersubmission::select('id','exam_id','subject_id','faculty_id','user_id','noofsets','status','deleted_at')
        ->with(['exam:exam_name,id','subject:subject_name,id','faculty:faculty_name,id','user:name,id'])
        ->when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.paper-submission.all-paper-submission',compact('papersubmissions'))->extends('layouts.user')->section('user');
    }
}
