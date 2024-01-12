<?php

namespace App\Livewire\User\PatternClass;
use Excel;
use App\Models\Pattern;
use Livewire\Component;
use App\Models\Courseclass;
use App\Models\Patternclass;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Exports\User\PatternClass\PatternClassExport;

class AllPatternClass extends Component
{   
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'forcedelete'];
    #[Locked] 
    public $delete_id;

    public $mode='all';
    public $perPage=10;
    public $search='';
    public $sortColumn="id";
    public $sortColumnBy="ASC";
    public $ext;

    public $class_id;
    public $pattern_id;
    public $status;
    public $sem1_total_marks;
    public $sem2_total_marks;
    public $sem1_credits;
    public $sem2_credits;
    public $sem1_totalnosubjects;
    public $sem2_totalnosubjects;
    public $patterns;
    public $course_classes;
    #[Locked] 
    public $edit_id;


    public function rules()
    {
        return [
            'sem1_total_marks' => ['required', 'numeric'],
            'sem2_total_marks' => ['required', 'numeric'],
            'sem1_credits' => ['required', 'numeric'],
            'sem2_credits' => ['required', 'numeric'],
            'sem1_totalnosubjects' => ['required', 'numeric'],
            'sem2_totalnosubjects' => ['required', 'numeric'],
            'class_id' => ['required', 'numeric', Rule::exists('course_classes', 'id')],
            'pattern_id' => ['required', 'numeric', Rule::exists('patterns', 'id')],
        ];
    }

    public function messages()
    {   
        $messages = [
            'sem1_total_marks.required' => 'Semester 1 Total Marks are required.',
            'sem2_total_marks.required' => 'Semester 2 Total Marks are required.',
            'sem1_credits.required' => 'Semester 1 Credits are required.',
            'sem2_credits.required' => 'Semester 2 Credits are required.',
            'sem1_totalnosubjects.required' => 'Total Subjects in Semester 1 is required.',
            'sem2_totalnosubjects.required' => 'Total Subjects in Semester 2 is required.',
            'class_id.required' => 'Course Class is required.',
            'class_id.numeric' => 'Course Class must be a numeric value.',
            'class_id.exists' => 'The selected Course Class does not exist.',
            'pattern_id.required' => 'Pattern is required.',
            'pattern_id.numeric' => 'Pattern must be a numeric value.',
            'pattern_id.exists' => 'The selected pattern does not exist.',
        ];
        
        return $messages;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->edit_id=null;
        $this->class_id=null;
        $this->pattern_id=null;
        $this->status=null;
        $this->sem1_total_marks=null;
        $this->sem2_total_marks=null;
        $this->sem1_credits=null;
        $this->sem2_credits=null;
        $this->sem1_totalnosubjects=null;
        $this->sem2_totalnosubjects=null;
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

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function setmode($mode)
    {
        if($mode=='add')
        {
            $this->resetinput();
        }
        $this->mode=$mode;
    }

    public function export()
    {
        $filename="Pattern-Class-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new PatternClassExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new PatternClassExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new PatternClassExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }
    }

    public function add()
    {
        $this->validate();

       $pattern_class =  new Patternclass;
       $pattern_class->create([
            'class_id' => $this->class_id,
            'pattern_id' => $this->pattern_id,
            'status' => $this->status==true?0:1,
            'sem1_total_marks' => $this->sem1_total_marks,
            'sem2_total_marks' => $this->sem2_total_marks,
            'sem1_credits' => $this->sem1_credits,
            'sem2_credits' => $this->sem2_credits,
            'sem1_totalnosubjects' => $this->sem1_totalnosubjects,
            'sem2_totalnosubjects' => $this->sem2_totalnosubjects,
        ]);
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Course Created Successfully !!');
    }


    public function edit(Patternclass $pattern_class)
    {   
        $this->resetinput();
        $this->edit_id=$pattern_class->id;
        $this->class_id=$pattern_class->class_id;
        $this->pattern_id=$pattern_class->pattern_id;
        $this->status=$pattern_class->status==1?0:true;
        $this->sem1_total_marks=$pattern_class->sem1_total_marks;
        $this->sem2_total_marks=$pattern_class->sem2_total_marks;
        $this->sem1_credits=$pattern_class->sem1_credits;
        $this->sem2_credits=$pattern_class->sem2_credits;
        $this->sem1_totalnosubjects=$pattern_class->sem1_totalnosubjects;
        $this->sem2_totalnosubjects=$pattern_class->sem2_totalnosubjects;
        $this->setmode('edit');
    }

    public function update(Patternclass $pattern_class)
    {
        $this->validate();

       $pattern_class->update([
            'class_id' => $this->class_id,
            'pattern_id' => $this->pattern_id,
            'status' => $this->status==true?0:1,
            'sem1_total_marks' => $this->sem1_total_marks,
            'sem2_total_marks' => $this->sem2_total_marks,
            'sem1_credits' => $this->sem1_credits,
            'sem2_credits' => $this->sem2_credits,
            'sem1_totalnosubjects' => $this->sem1_totalnosubjects,
            'sem2_totalnosubjects' => $this->sem2_totalnosubjects,
        ]);
       
        $this->resetinput();
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Course Updated Successfully !!');

    }


    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }


    public function delete(Patternclass $pattern_class)
    {   
       $pattern_class->delete();
        $this->dispatch('alert',type:'success',message:'Course Soft Deleted Successfully !!');
    }
    
    public function restore($id)
    {   
       $pattern_class = Patternclass::withTrashed()->find($id);
       $pattern_class->restore();
        $this->dispatch('alert',type:'success',message:'Course Restored Successfully !!');
    }

    public function forcedelete()
    {   
       $pattern_class = Patternclass::withTrashed()->find($this->delete_id);
       $pattern_class->forceDelete();
        $this->dispatch('alert',type:'success',message:'Course Deleted Successfully !!');
    }

    public function changestatus(Patternclass $pattern_class)
    {   
        if( $pattern_class->status)
        {
            $pattern_class->status=0;
        }
        else 
        {
            $pattern_class->status=1;
        }
        $pattern_class->update();

        $this->dispatch('alert',type:'success',message:'Class Year Status Updated Successfully !!');
    }


    public function render()
    {   

        if($this->mode!=='all')
        {
            $this->patterns=Pattern::select('pattern_name','id')->get();
            $this->course_classes=Courseclass::select('classyear_id ','course_id','id')->get();
        }

       $pattern_classes=Patternclass::when($this->search, function ($query, $search) {
            $query->search($search);
        })->withTrashed()->orderBy($this->sortColumn, $this->sortColumnBy)->paginate($this->perPage);

        return view('livewire.user.pattern-class.all-pattern-class',compact('pattern_classes'))->extends('layouts.user')->section('user');
    }
}
