<?php

namespace App\Livewire\User\StrongRoom;

use App\Models\Exam;
use Livewire\Component;
use App\Models\Paperset;
use Livewire\WithPagination;
use App\Models\Examtimetable;
use App\Models\Papersubmission;
use Illuminate\Validation\Rule;
use App\Models\Questionpaperbank;
use Illuminate\Support\Facades\DB;

class StrongRoom extends Component
{   
    use WithPagination;

    public $perPage=10;
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
        $this->validate();

        DB::beginTransaction();

        try 
        {
            $exam = Exam::where('status', 1)->first();
            if($exam)
            {
                Questionpaperbank::where('exam_id', $exam->id)->where('set_id', $this->set_id)->update(['is_used' => 1]);
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
        $exam=Exam::where('status',1)->first();

        // $tempa = $exam->exampatternclasses()->where('launch_status', 1)->pluck('id');

        // $temp=Examtimetable::whereIn('exam_patternclasses_id', $tempa)->get();
        // dd($temp);

        $set_ids=Questionpaperbank::where('exam_id',$exam->id)->whereNot('is_used',1)->pluck('set_id');
        $pappersets=Paperset::whereIn('id',$set_ids)->get();
        $papersubmissions=Papersubmission::where('exam_id',$exam->id)->where('is_confirmed',1)->paginate($this->perPage);
        return view('livewire.user.strong-room.strong-room',compact('papersubmissions','exam','pappersets'))->extends('layouts.user')->section('user');
    }
}
