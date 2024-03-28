<?php

namespace App\Livewire\Faculty\QuestionPaperBank;

use App\Models\Exam;
use Livewire\Component;
use App\Models\Paperset;
use Livewire\WithFileUploads;
use App\Models\Papersubmission;
use Illuminate\Validation\Rule;
use App\Models\Questionpaperbank;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class QuestionPaperCell extends Component
{
    use WithFileUploads;
    protected $listeners = ['refreshChild'=>'render'];
    public $set;
    public $subject_id;
    public $exam_id;
    public $questionbank=[];

    public function mount()
    {
        $this->exam_id=Exam::where('status',1)->first()->id;
    }

    public function rules()
    {   

        $rules = [];

        if($this->set)
        {   
            $rules["questionbank.".$this->subject_id.'.'.$this->set->id] = ['required', 'file', 'mimes:pdf','max:2048'];
        }

        return $rules;
    }

    public function messages()
    {   
        $messages = [];

        if($this->set)
        {   
            $messages["questionbank.".$this->subject_id.'.'.$this->set->id.'.required'] = "Required.";
            $messages["questionbank.".$this->subject_id.'.'.$this->set->id.'.file'] = "Must be file.";
            $messages["questionbank.".$this->subject_id.'.'.$this->set->id.'.mimes'] = "Must be .pdf";
            $messages["questionbank.".$this->subject_id.'.'.$this->set->id.'.max'] = "Must be less than 2048KB.";
        }

        return $messages ;
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
 

    public function upload_question_paper_set_document()
    {   
        $this->validate();
        if(count($this->questionbank)==1)
        {
            if($this->exam_id)
            {   
                try 
                {
                    DB::beginTransaction();
                    foreach ($this->questionbank as $subject_id => $array) 
                    {
                        foreach ($array as $set_id => $file) 
                        {
                            $papersubmission= Papersubmission::where('exam_id',$this->exam_id)->where('subject_id',$subject_id)->first();
                            if($papersubmission)
                            { 
                                $papersubmission->update(['noofsets'=>$papersubmission->noofsets+1,]);
                            }
                            else
                            {
                                $papersubmission= Papersubmission::create([
                                    'exam_id'=>$this->exam_id,
                                    'subject_id'=>$subject_id,
                                    'noofsets'=>1,
                                    'chairman_id'=>Auth::guard('faculty')->user()->id,
                                    'status'=>0,         
                                    'is_online'=>1         
                                ]);
                            }

                            $papareset= Paperset::find($set_id);

                            if($papareset)
                            {
                                $questionbanks = Questionpaperbank::create([
                                    'exam_id'=>$this->exam_id,
                                    'papersubmission_id'=>$papersubmission->id,
                                    'set_id'=>$set_id,
                                    'file_name'=>$papersubmission->subject->subject_name.'-'.$papareset->set_name,
                                    'chairman_id'=>Auth::guard('faculty')->user()->id,
                                    'is_used'=>0,
                                ]);

                                if ($file !== null) 
                                {
                                    $path = 'user/file/';
                                    $fileName = 'paperset-' . time() . '.' . $file->getClientOriginalExtension();
                                    $file->storeAs($path, $fileName, 'public');
                                    $questionbanks->update([ 'file_path'=>'storage/' . $path . $fileName,]);
                                }
                            }

                        }
                    }
                    DB::commit();

                    $this->questionbank=[[]];
                    $this->dispatch('alert',type:'success',message:'Question Paper Set Uploaded Successfully !!'  );
                } 
                catch (Exception $e) 
                {
                    DB::rollBack();
                    $this->dispatch('alert',type:'error',message:'Failed To Upload Question Paper Set !!'  );
                }
            }
        }else
        {
            $this->dispatch('alert',type:'info',message:'Please Upload At Lest One Question Paper Set !!'  );
        }
    }


    public function delete_question_paper_set_document(Papersubmission $papersubmission ,$questionpaperbank_id)
    {   
        try 
        {
            DB::transaction(function () use ($papersubmission, $questionpaperbank_id) 
            {
                if($papersubmission) 
                {
                    if($papersubmission->questionbanks()->withTrashed()->count()===1)
                    {   
                        $questionbank =Questionpaperbank::withTrashed()->find($questionpaperbank_id);
                        if($questionbank)
                        {

                            if (isset($questionbank->file_path)) 
                            {
                                File::delete($questionbank->file_path);
                            }
                                
                            $questionbank->forceDelete();
                        }

                        $papersubmission->withTrashed()->forceDelete();
                    }else
                    {
                        $questionbank =Questionpaperbank::withTrashed()->find($questionpaperbank_id);
                        if($questionbank)
                        {

                            if (isset($questionbank->file_path)) 
                            {
                                File::delete($questionbank->file_path);
                            }
                                
                            $questionbank->forceDelete();
                        }

                        $papersubmission->update([
                            'noofsets'=>$papersubmission->noofsets-1
                        ]);
                    }
                }

                $this->dispatch('alert',type:'success',message:'Question Paper Set Deleted Successfully !!'  );
            });

        } catch (Exception $e) 
        {

            DB::rollBack();

            $this->dispatch('alert',type:'error',message:' Failed To Delete Question Paper Set !!'  );
        }
    }

    public function render()
    {
        $pap =Papersubmission::where('subject_id', $this->subject_id)->where('exam_id', $this->exam_id)->first();
    
        if ($pap) 
        {
            $is_bank = $pap->questionbanks()->where('set_id', $this->set->id)->first();
        } else 
        {
          $is_bank = false;
        }

        return view('livewire.faculty.question-paper-bank.question-paper-cell',compact('is_bank'));
    }
}
