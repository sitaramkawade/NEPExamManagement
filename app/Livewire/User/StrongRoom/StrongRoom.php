<?php

namespace App\Livewire\User\StrongRoom;

use Carbon\Carbon;
use App\Models\Exam;
use Livewire\Component;
use App\Models\Paperset;
use Livewire\WithPagination;
use App\Models\Examtimetable;
use App\Models\Subjectbucket;
use App\Models\Timetableslot;
use App\Models\Papersubmission;
use Illuminate\Validation\Rule;
use App\Models\Questionpaperbank;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class StrongRoom extends Component
{   
    use WithPagination;

    public $perPage=10;
    
    public $question_bank=[];
    public $set_id;
    public function rules()
    {
        return [
            'set_id' => ['required', 'integer', Rule::exists('papersets', 'id')],
        ];
    }

    public function messages()
    {   
        $messages = [
            'set_id.required' => 'Set is required.',
            'set_id.integer' => 'Set must be a integer value.',
            'set_id.exists' => 'The selected Set does not exist.',
        ];
        
        return $messages;
    }

   
    public function approve_papaer_set()
    {   

        if(empty($this->question_bank))
        {
            $this->dispatch('alert',type:'info',message:'Please Select Question Paper Set  !!'  );
            return false;
        }

        DB::beginTransaction();

        try 
        {
            $exam = Exam::where('status', 1)->first();
            if($exam)
            {
                Questionpaperbank::whereIn('id', array_keys(array_filter($this->question_bank)))->update(['exam_date'=>date('Y-m-d'),'is_used' => 1]);
                DB::commit();
                $this->dispatch('alert',type:'success',message:'Question Paper Set Selected Successfully !!'  );
            }
          
        } catch (\Exception $e) {
            DB::rollBack();
            $this->dispatch('alert',type:'error',message:'Failed To Select Question Paper Set  !!'  );
        }
    }

    public function render()
    {   

        $currentDateTime = Carbon::now();
        $intervalInMinutes =120;
        $startTime = \DateTime::createFromFormat('H:i:s',  $currentDateTime->toTimeString())->format('H:i:s.u');
        $endTime = \DateTime::createFromFormat('H:i:s', $currentDateTime->addMinutes($intervalInMinutes)->toTimeString())->format('H:i:s.u');

        $pappersets = Paperset::get();
        $papersubmissions = collect();

        $exam = Exam::where('status', 1)->first();
        if ($exam) 
        {   
            $timeslot_ids=Timetableslot::whereBetween('start_time',[$startTime, $endTime])->pluck('id');
            $exam_patternclass_ids = $exam->exampatternclasses()->where('launch_status', 1)->pluck('id');
            $bucket_ids = Examtimetable::whereIn('timeslot_id', $timeslot_ids)->whereIn('exam_patternclasses_id', $exam_patternclass_ids)->whereDate('examdate',date('Y-m-d'))->pluck('subjectbucket_id');
            $subject_ids =Subjectbucket::whereIn('id',$bucket_ids)->pluck('subject_id');
            $papersubmissions = Papersubmission::where('is_confirmed', 1)->whereIn('subject_id', $subject_ids)->paginate($this->perPage);
        }

        return view('livewire.user.strong-room.strong-room', compact('papersubmissions', 'exam', 'pappersets'))->extends('layouts.user')->section('user');
    }

}
