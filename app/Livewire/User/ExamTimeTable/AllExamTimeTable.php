<?php

namespace App\Livewire\User\ExamTimeTable;

use Excel;
use App\Models\Exam;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Semester;
use Livewire\WithPagination;
use App\Models\ExamTimetable;
use App\Models\Subjectbucket;
use App\Models\Timetableslot;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use App\Models\ExamPatternclass;
use Illuminate\Support\Facades\DB;
use App\Exports\User\ExamTimeTable\ExportExamTimeTable;

class AllExamTimeTable extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;
    public $mode='all';
    public $sem;
    public $semesters;
    public $subjects=[];
    public $exam_pattern_class_id;
    public $timeslot_id;
    public $subjectbucket_id;
    public $timeslots=[];
    public $timeslot_ids=[];
    public $examdates=[];
    public $pattern_classes;
    #[Locked] 
    public $delete_id;
    #[Locked] 
    public $time_id;
    public $isEditing = false;

    
    public function rules()
    {
        return [

        'exam_pattern_class_id' => ['required',Rule::exists('exam_patternclasses', 'id')],
        'timeslot_id' => ['required',Rule::exists('timetableslots', 'id')],
        'examdates.*' => ['nullable', 'date'],
       
         ];
    }

    public function messages()
    {   
        $messages = [
           
            'exam_patternclasses_ids.required' => 'The Exam Patter Class field is required.',
            'exam_patternclasses_ids.exists' => 'The selected Exam Patter Class  is invalid.',
            'timeslot_id.required' => 'The Time Slot field is required.',
            'timeslot_id.exists' => 'The selected Time Slot  is invalid.',
            'examdate.required' => 'The Exam Date field is required.',
            'examdate.date' => 'The Exam Date must be a valid Date.',
        ];
        return $messages;
    }

    
    public function resetinput()
    {
        $this->subjectbucket_id=null;
        $this->sem=null;
        $this->exam_patternclasses_id=null;
        $this->timeslot_id=null;
        $this->examdate=null;
        $this->is_default=null;
        $this->timeslot_ids=[];
        $this->examdates=[];
        
    }


    public function updated($property)
    {
        $this->validateOnly($property);
        if($property=='sem')
        {
            if($this->sem)
            {
               $this->create($this->exam_pattern_class_id);
            }    
        }
    }

    public function setmode($mode)
    {
        if($mode=='add')
        {
            $this->resetinput();
        }
        $this->mode=$mode;
    }
    

    public function create(ExamPatternclass  $exampatternclass ){
        
        $this->exam_pattern_class_id=$exampatternclass;
        $this->semesters=Semester::where('status',1)->get();

        $this->subjects = Subjectbucket::
        where('patternclass_id', $exampatternclass->patternclass_id)
        ->where('status', 1)
        ->when($this->sem, function ($query, $sem) {
            $query->whereHas('subject', function ($q) use ($sem) {
                $q->where('subject_sem', $sem);
            });
        })
        ->get();

        foreach ($this->subjects as $subjectbucket) {
            $subjectName = $subjectbucket->subject->subject_name;
            // dd($subjectName);
        }

        $this->timeslots=TimeTableslot::where('isactive',1)->pluck('timeslot','id');
        $this->setmode('add');
     
    }


    
    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

   
    public function delete(ExamPatternclass  $exampatternclass)
    {   
        $exampatternclass->delete();
        $this->dispatch('alert',type:'success',message:'Exam Time Table Soft Deleted Successfully !!');
    }

    public function restore($id)
    {   
        $exampatternclass = ExamPatternclass::withTrashed()->find($id);
        $exampatternclass->restore();
        $this->dispatch('alert',type:'success',message:'Exam Time Table Restored Successfully !!');
    }
    
    public function forcedelete()
    {  
        try
        {
        $examTimeTable = ExamTimetable::withTrashed()->find($this->delete_id);
        $examTimeTable->forceDelete();
        $this->dispatch('alert',type:'success',message:'Exam Time Table Deleted Successfully !!');
    } catch
         (\Illuminate\Database\QueryException $e) {

        if ($e->errorInfo[1] == 1451) {

            $this->dispatch('alert',type:'error',message:'This record is associated with another data. You cannot delete it !!');
        } 
    }
    }
    
    public function Status(ExamTimetable $examTimeTable)
    {
        if($examTimeTable->status)
        {
            $examTimeTable->status=0;
        }
        else
        {
            $examTimeTable->status=1;
        }
        $examTimeTable->update();
    }

    public function add(ExamPatternclass  $exampatternclass )
    {
        DB::beginTransaction();
         try 
        {
            $exam_time_table =[];

         //   dd($this->examdates);
             foreach( $this->examdates as $subjectbucket_id => $examdate)
            {
                $exam_time_table[]=[
                    'subjectbucket_id'=>$subjectbucket_id,
                    'exam_patternclasses_id'=>$exampatternclass->id,
                    'examdate'=>$examdate,
                    'timeslot_id'=>$this->timeslot_ids[$subjectbucket_id],
                    'status'=>1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];

            }
            $exam_time_table_data = ExamTimetable::insert($exam_time_table);
            DB::commit();
            $this->dispatch('alert',type:'success',message:'Exam Time Table Created Successfully !!'  );
            $this->resetinput();
            $this->setmode('all');
            $this->isEditing = true;
        }
        catch (\Exception $e) 
        {
            DB::rollback();
    
            $this->dispatch('alert',type:'error',message:'Exam Time Table Creating Error !!'  );
        }
    }
    

    public function edit(ExamPatternclass $exampatternclass)
    {
          $this->resetinput();
          $examtimetables=ExamTimetable::where('exam_patternclasses_id',$exampatternclass->id)->get();
          $this->time_id=$exampatternclass->id;
          $this->sem=Subject::where('id',$examtimetables[0]->subjectbucket_id)->first()->subject_sem;
          $this->exam_pattern_class_id = $exampatternclass->id;
          $this->semesters=Semester::where('status',1)->get();
          $this->subjects = Subjectbucket::
          where('patternclass_id', $exampatternclass->patternclass_id)
          ->where('status', 1)
          ->when($this->sem, function ($query, $sem) {
              $query->whereHas('subject', function ($q) use ($sem) {
                  $q->where('subject_sem', $sem);
              });
          })
          ->get();
  
          foreach ($this->subjects as $subjectbucket) {
              $subjectName = $subjectbucket->subject->subject_name;
              // dd($subjectName);
          }
          $this->timeslots=TimeTableslot::where('isactive',1)->pluck('timeslot','id');
         
        foreach($examtimetables as $examtimetable)
        {
            $this->timeslot_ids[$examtimetable->subjectbucket_id]=$examtimetable->timeslot_id;
            $this->examdates[$examtimetable->subjectbucket_id]=$examtimetable->examdate;
            // dd(  $this->examdates);

        }
        $this->setmode('edit');
    
    }

    public function update(ExamPatternclass $exampatternclass)
    {
        // Begin a database transaction
        DB::beginTransaction();
    
        try {
            foreach ($this->examdates as $subjectbucket_id => $examdate) {
                // Update exam timetable records matching the condition
                ExamTimetable::where('subjectbucket_id', $subjectbucket_id)
                             ->where('exam_patternclasses_id', $exampatternclass->id)
                             ->update([
                                 'examdate' => $examdate,
                                 'timeslot_id' => $this->timeslot_ids[$subjectbucket_id],
                                 'status' => 1,
                             ]);
            }

            DB::commit();
    
            $this->dispatch('alert',type:'success',message:'Exam Time Table Updated Successfully !!'  );
            $this->resetinput();
            $this->setmode('all');
            $this->isEditing = false;
    
        } catch (\Exception $e) {
           
            DB::rollback();
    
            $this->dispatch('alert',type:'error',message:'Exam Time Table Updating Error !!'  );
        }
    }

    public function export()
    {   
        $filename="Exam-Time-Table-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportExamTimeTable($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportExamTimeTable($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportExamTimeTable($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
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

    public function render()
     {
      
        $this->semesters=Semester::where('status',1)->get();
        if($this->timeslot_id)
        {
            foreach ($this->subjects as $value) {
                $this->timeslot_ids[$value->id]=$this->timeslot_id;
            }
        }
    
        $examids = Exam::where('status',1)->pluck('id')->toArray();
  
        $exampatternclasses=ExamPatternclass::whereIn('exam_id',$examids)
       -> when($this->search, function ($query, $search) {
          $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.exam-time-table.all-exam-time-table',compact('exampatternclasses'))->extends('layouts.user')->section('user');
    }
}
