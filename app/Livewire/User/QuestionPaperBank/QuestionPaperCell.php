<?php

namespace App\Livewire\User\QuestionPaperBank;

use App\Models\Exam;
use Livewire\Component;
use App\Models\Paperset;
use Livewire\WithFileUploads;
use App\Models\Papersubmission;
use App\Models\Qestionpaperbank;
use Illuminate\Support\Facades\Auth;

class QuestionPaperCell extends Component
{
    use WithFileUploads;
    public $faculty_id;
    public $set;
    public $subject_id;
    public $exam_id;
    public $questionbank=[];

    public function rules()
    {
        return [     
            'file_path' => ['required','file', 'mimes:pdf'], 
         ];
    }

    public function upload_document()
    {
        // dd($this->set,$this->faculty_id, $this->subject_id);
      
        if($this->exam_id)
        {
          
                foreach ($this->questionbank as $set_id => $file) 
                {
                  $papersubmission= Papersubmission::where('exam_id',$this->exam_id)->where('subject_id',$this->subject_id)->where('faculty_id',$this->faculty_id)->where('user_id',Auth::guard('user')->user()->id)->first();
                  if($papersubmission)
                  { 
                    $papersubmission->update([
                        'noofsets'=>$papersubmission->noofsets+1,    
                    ]);

                  }else
                  {
                    $papersubmission= Papersubmission::create([
                        'exam_id'=>$this->exam_id,
                        'subject_id'=>$this->subject_id,
                        'noofsets'=>1,
                        'faculty_id'=>$this->faculty_id,
                        'user_id'=>Auth::guard('user')->user()->id,
                        'status'=>1         
                    ]);
                  }

                   $papareset= Paperset::find($set_id);

                   $questionbanks = Qestionpaperbank::create([
                        'exam_id'=>$this->exam_id,
                        'papersubmission_id'=>$papersubmission->id,
                        'user_id'=>Auth::guard('user')->user()->id,
                        'set_id'=>$set_id,
                        'file_name'=>$papersubmission->subject->subject_name.'-'.$papareset->set_name,
                        'faculty_id'=>$this->faculty_id,
                        'is_used'=>1,
                    ]);

                    if ($file !== null) 
                    {
                        $path = 'user/file/';
                        $fileName = 'paperset-' . time() . '.' . $file->getClientOriginalExtension();
                        $file->storeAs($path, $fileName, 'public');
                        $questionbanks->update([ 'file_path'=>'storage/' . $path . $fileName,]);
                    }
                    $this->questionbank=[];
                    $this->dispatch('alert',type:'success',message:'Question Bank Added Successfully !!'  );
                }
        }
    }

    public function mount()
    {
        $this->exam_id=Exam::where('status',1)->first()->id;
    }

    public function render()
    {
        
        return view('livewire.user.question-paper-bank.question-paper-cell');
    }
}
