<?php

namespace App\Livewire\User\QuestionPaperBank;

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
    public $faculty_id;
    public $set;
    public $subject_id;
    public $exam_id;
    public $questionbank=[[]];

    // protected function rules()
    // {
    //     return [
    //         // 'subject_id' => ['required','integer',Rule::exists('subjects','id')],   
    //         // 'questionbank.*' => ['required','integer',Rule::exists('subjects','id')],   
    //         // 'questionbank.*' => ['required', 'file', 'mimes:pdf','max:2048'],   
    //         // 'questionbank.*.*' => ['required','integer', Rule::exists('papersets', 'id')],    
    //     ];
    // }

    // protected function messages()
    // {
    //     return [
    //         'papersubmission_id.required' => 'The papersubmission ID field is required.',
    //         'papersubmission_id.exists' => 'The selected papersubmission ID is invalid.',
    //         'exam_id.required' => 'The exam ID field is required.',
    //         'exam_id.exists' => 'The selected exam ID is invalid.',
    //         'set_id.required' => 'The set field is required.',
    //         'set_id.string' => 'The set field must be a string.',
    //         'set_id.max' => 'The set field may not be greater than :max characters.',
    //         'file_path.required' => 'The file path field is required.',
    //         'file_path.max' => 'The file path may not be greater than :max characters.',
    //         'file_name.required' => 'The file name field is required.',
    //         'file_name.string' => 'The file name field must be a string.',
    //         'file_name.max' => 'The file name may not be greater than :max characters.',
    //         'user_id.required' => 'The user ID field is required.',
    //         'user_id.exists' => 'The selected user ID is invalid.',
    //         'faculty_id.required' => 'The faculty ID field is required.',
    //         'faculty_id.exists' => 'The selected faculty ID is invalid.',
    //         'is_used.required' => 'The is used field is required.',
    //     ];
    // }
 
    
    public function delete_question_paper_set_document(Papersubmission $papersubmission ,$questionpaperbank_id)
    {   
        try 
        {
            DB::transaction(function () use ($papersubmission, $questionpaperbank_id) 
            {
                if($papersubmission) 
                {
                    if($papersubmission->questionbanks()->count()===1)
                    {
                        $papersubmission->questionbanks()->withTrashed()->forceDelete();
                        $papersubmission->withTrashed()->forceDelete();
                    }else
                    {
                        $questionbank = $papersubmission->questionbanks()->withTrashed()->where('id',$questionpaperbank_id)->get();
                        if ($questionbank->file_path) 
                        {
                            File::delete($questionbank->file_path);
                        }
                        
                        $questionbank->forceDelete();

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

    public function upload_question_paper_set_document()
    {   
        if(!empty(array_filter($this->questionbank)))
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
                            $papersubmission= Papersubmission::where('exam_id',$this->exam_id)->where('subject_id',$subject_id)->where('faculty_id',$this->faculty_id)->where('user_id',Auth::guard('user')->user()->id)->first();
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
                                    'faculty_id'=>$this->faculty_id,
                                    'user_id'=>Auth::guard('user')->user()->id,
                                    'status'=>1         
                                ]);
                            }

                            $papareset= Paperset::find($set_id);

                            if($papareset)
                            {
                                $questionbanks = Questionpaperbank::create([
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


    public function mount()
    {
        $this->exam_id=Exam::where('status',1)->first()->id;
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

        return view('livewire.user.question-paper-bank.question-paper-cell',compact('is_bank'));
    }
}
