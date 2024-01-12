<?php

namespace App\Livewire\Faculty\Subject;
use Excel;
use App\Models\Course;
use App\Models\College;
use App\Models\Pattern;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Semester;
use App\Models\Classyear;
use App\Models\Department;
use App\Models\Courseclass;
use App\Models\Subjecttype;
use App\Models\Patternclass;
use Livewire\WithPagination;
use App\Models\Subjectcategory;
use Illuminate\Validation\Rule;
use App\Exports\Faculty\ExportSubject;
use Doctrine\Inflector\Rules\Patterns;

class AllSubject extends Component
{
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'delete'];
    public $subject_sem;
    public $subjectcategory_id;
    public $subject_no;
    public $subject_code;
    public $subject_shortname;
    public $subject_name;
    public $subjecttype_id;
    public $subjectexam_type;
    public $subject_credit;
    public $subject_maxmarks;
    public $subject_maxmarks_int;
    public $subject_maxmarks_intpract;
    public $subject_maxmarks_ext;
    public $subject_totalpassing;
    public $subject_intpassing;
    public $subject_intpractpassing;
    public $subject_extpassing;
    public $subject_optionalgroup;
    public $patternclass_id;
    public $classyear_id;
    public $department_id;
    public $college_id;

    public $subject_id;
    public $pattern_id;
    public $course_id;
    public $course_class_id;
    public $pattern_class;
    public $course_name;
    public $subject_categories;
    public $subject_types;
    public $subjectexam_types;
    public $pattern_classes;
    public $class_years;
    public $departments;
    public $colleges;
    public $patterns;
    public $courses;
    public $course_classes;
    public $pattern_class_id;

    public $mode='all';
    public $per_page = 10;
    public $delete_id;
    public $perPage=10;
    public $search='';
    public $sortColumn="subject_name";
    public $sortColumnBy="ASC";
    public $ext;
    public $isDisabled = true;

    protected function rules()
    {
        return [
            'subject_sem' => ['required',],
            'subjectcategory_id' => ['required',Rule::exists(Subjectcategory::class,'id')],
            'subject_no' => ['required', 'numeric', 'digits_between:1,10'],
            'subject_code' => ['required', 'string', 'min:1', 'max:10'],
            'subject_shortname' => ['required', 'string', 'max:11',],
            'subject_name' => ['required', 'string', 'max:15',],
            'subjecttype_id' => ['required',Rule::exists(Subjecttype::class,'id')],
            'subjectexam_type' => ['required',],
            'subject_credit' => ['required',],
            'subject_maxmarks' => ['required',],
            'subject_maxmarks_int' => ['required',],
            'subject_maxmarks_intpract' => ['required',],
            'subject_maxmarks_ext' => ['required',],
            'subject_totalpassing' => ['required',],
            'subject_intpassing' => ['required',],
            'subject_intpractpassing' => ['required',],
            'subject_extpassing' => ['required',],
            'subject_optionalgroup' => ['required',],
            'classyear_id' => ['required',Rule::exists(Classyear::class,'id')],
            'department_id' => ['required',Rule::exists(Department::class,'id')],
            'college_id' => ['required',Rule::exists(College::class,'id')],
            'pattern_id' => ['required',Rule::exists(Pattern::class,'id')],
            'course_id' => ['required',Rule::exists(Course::class,'id')],
            'course_class_id' => ['required',Rule::exists(Courseclass::class,'id')],
        ];
    }

    public function messages()
    {
        return [
            'subject_sem.required' => 'Please select the subject.',
            'subjectcategory.required' => 'Please select the subject category.',
            'subject_no.required' => 'Please enter the subject number.',
            'subject_code.required' => 'Please enter the subject code.',
            'subject_shortname.required' => 'Please enter the subject shortname.',
            'subject_name.required' => 'Please enter the subject name.',
            'subjecttype.required' => 'Please select the subject type.',
            'subjectexam_type.required' => 'Please select the subject exam type.',
            'subject_credit.required' => 'Please select the subject credit.',
            'subject_maxmarks.required' => 'Please enter the subject maximum marks.',
            'subject_maxmarks_int.required' => 'Please enter the subjects maximum internal maximum marks.',
            'subject_maxmarks_intpract.required' => 'Please enter the subjects maximum internal practical marks.',
            'subject_maxmarks_ext.required' => 'Please enter subject maximum external marks.',
            'subject_totalpassing.required' => 'Please enter the subjects total passing marks.',
            'subject_intpassing.required' => 'Please enter the subjects internal passing marks.',
            'subject_intpractpassing.required' => 'Please enter the internal practical passing marks.',
            'subject_extpassing.required' => 'Please enter the external passing marks.',
            'subject_optionalgroup.required' => 'Please select the optional group.',
            'patternclass_id.required' => 'Please select the pattern.',
            'classyear_id.required' => 'Please select the class year.',
            'department_id.required' => 'Please select the department.',
            'college_id.required' => 'Please select the college.',
            'pattern_id.required' => 'Please select the pattern.',
            'course_id.required' => 'Please select the course.',
            'course_class_id.required' => 'Please select the course class.',
        ];
    }

    public function resetinput()
    {
         $this->subject_sem=null;
         $this->subjectcategory_id=null;
         $this->subject_no=null;
         $this->subject_code=null;
         $this->subjectexam_type=null;
         $this->subject_shortname=null;
         $this->subject_name=null;
         $this->subjecttype_id=null;
         $this->subject_credit=null;
         $this->subject_maxmarks=null;
         $this->subject_maxmarks_int=null;
         $this->subject_maxmarks_intpract=null;
         $this->subject_maxmarks_ext=null;
         $this->subject_totalpassing=null;
         $this->subject_intpassing=null;
         $this->subject_intpractpassing=null;
         $this->subject_extpassing=null;
         $this->subject_optionalgroup=null;

         $this->patternclass_id=null;
         $this->classyear_id=null;
         $this->department_id=null;
         $this->college_id=null;
         $this->pattern_id=null;
         $this->course_id=null;
         $this->course_class_id=null;
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

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function save()
    {
        $validatedData = $this->validate();
        $pattern_class = Patternclass::select('id')->where('class_id', $this->course_class_id)->where('pattern_id', $this->pattern_id)->first('id');

        if ($pattern_class) {
            $validatedData['patternclass_id'] = $pattern_class->id;
            $subject = Subject::create($validatedData);

            if ($subject) {
                $this->dispatch('alert',type:'success',message:'Subject Saved Successfully !!');
                $this->setmode('all');
            } else {
                $this->dispatch('alert',type:'error',message:'Something went wrong!!');
            }
        } else {
            $this->dispatch('alert',type:'success',message:'Pattern Class Not Found!!');
        }
    }


    public function edit(Subject $subject)
    {
        if ($subject)
        {
            $this->subject_id = $subject->id;
            $this->subject_sem= $subject->subject_sem;
            $this->subjectcategory_id= $subject->subjectcategory_id;
            $this->subject_no= $subject->subject_no;
            $this->subject_code= $subject->subject_code;
            $this->subjectexam_type= $subject->subjectexam_type;
            $this->subject_shortname= $subject->subject_shortname;
            $this->subject_name= $subject->subject_name;
            $this->subjecttype_id= $subject->subjecttype_id;
            $this->subject_credit= $subject->subject_credit;
            $this->subject_maxmarks= $subject->subject_maxmarks;
            $this->subject_maxmarks_int= $subject->subject_maxmarks_int;
            $this->subject_maxmarks_intpract= $subject->subject_maxmarks_intpract;
            $this->subject_maxmarks_ext= $subject->subject_maxmarks_ext;
            $this->subject_totalpassing= $subject->subject_totalpassing;
            $this->subject_intpassing= $subject->subject_intpassing;
            $this->subject_intpractpassing= $subject->subject_intpractpassing;
            $this->subject_extpassing= $subject->subject_extpassing;
            $this->subject_optionalgroup= $subject->subject_optionalgroup;
            $this->patternclass_id= $subject->patternclass_id;
            $this->classyear_id= $subject->classyear_id;
            $this->department_id= $subject->department_id;
            $this->college_id= $subject->college_id;
            $this->feach();
            $this->setmode('edit');
        }
        else{
        $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');
        }
    }

    public function update(Subject $subject)
    {
        $validatedData = $this->validate();
        $pattern_class = Patternclass::select('id')
            ->where('class_id', $this->course_class_id)
            ->where('pattern_id', $this->pattern_id)
            ->first('id');

        if ($subject) {
            if ($pattern_class) {
                $validatedData['patternclass_id'] = $pattern_class->id;
                $subject->fill($validatedData);
                $updated = $subject->save();
                if ($updated) {
                    $this->dispatch('alert',type:'success',message:'Subject Updated Successfully !!');
                    $this->setmode('all');
                } else {
                    $this->dispatch('alert',type:'error',message:'Something went wrong!!');
                }
            } else {
                $this->dispatch('alert',type:'error',message:'Pattern Class Not Found!!');
            }
        }
    }

    public function delete()
    {
        $subject = Subject::withTrashed()->find($this->delete_id);
        if($subject){
            $subject->forceDelete();
            $this->delete_id = null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'"Subject Deleted Successfully !!');
        } else {
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');
        }
    }

    public function softdelete($id)
    {
        $subject = Subject::withTrashed()->findOrFail($id);

        if ($subject) {
            $subject->delete();
            $this->dispatch('alert',type:'success',message:'Subject Deleted Successfully');
            } else {
                $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');
            }
        $this->setmode('all');
    }

    public function restore($id)
    {
        $subject = Subject::withTrashed()->findOrFail($id);

        if ($subject) {
            $subject->restore();
            $this->delete_id = null;
            $this->dispatch('alert',type:'success',message:'Subject Restored Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Subject Not Found');
        }
        $this->setmode('all');
    }

    public function feach()
    {
        $subjects = Subject::all();

        foreach ($subjects as $subject) {
            $pattern_class_id = $subject->patternclass_id;

            $pattern_class = Patternclass::find($pattern_class_id);

            if ($pattern_class) {
                if ($pattern_class->courseclass && $pattern_class->courseclass->course) {
                    $this->course_id = $pattern_class->courseclass->course->id;
                }

                if ($pattern_class->courseclass) {
                    $this->course_class_id = $pattern_class->courseclass->id;
                }

                if ($pattern_class->pattern) {
                    $this->pattern_id = $pattern_class->pattern->id;
                }
            }
        }
    }

    public function mount()
    {
        $this->subject_categories = Subjectcategory::where('active',1)->get();
        $this->subject_types = Subjecttype::where('active',1)->get();
        $this->class_years= Classyear::where('status',1)->get();
        $this->departments= Department::where('status',1)->get();
        $this->colleges= College::where('status',1)->get();
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

    public function export()
    {
        $filename="Subject-".now();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new ExportSubject($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new ExportSubject($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new ExportSubject($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
            break;
        }

    }

    public function status(Subject $subject)
    {
        if( $subject->status==0)
        {
            $subject->status=1;
        }
        else if( $subject->status==1)
        {
            $subject->status=0;
        }
        $subject->update();

        $this->dispatch('alert',type:'success',message:'Subject Status Updated Successfully !!');
    }

    public function view(Subject $subject)
    {
        if ($subject)
        {
            $this->subject_sem= $subject->subject_sem;
            $this->subject_no= $subject->subject_no;
            $this->subject_code= $subject->subject_code;
            $this->subject_shortname= $subject->subject_shortname;
            $this->subject_name= $subject->subject_name;
            $this->subjectexam_type= $subject->subdjectexam_type;
            $this->subject_credit= $subject->subject_credit;
            $this->subject_maxmarks= $subject->subject_maxmarks;
            $this->subject_maxmarks_int= $subject->subject_maxmarks_int;
            $this->subject_maxmarks_intpract= $subject->subject_maxmarks_intpract;
            $this->subject_maxmarks_ext= $subject->subject_maxmarks_ext;
            $this->subject_totalpassing= $subject->subject_totalpassing;
            $this->subject_intpassing= $subject->subject_intpassing;
            $this->subject_intpractpassing= $subject->subject_intpractpassing;
            $this->subject_extpassing= $subject->subject_extpassing;
            $this->subject_optionalgroup= $subject->subject_optionalgroup;
            $subcatId = $subject->subjectcategories()->first();
            $this->subjectcategory_id= $subcatId;
            $subtypeId = $subject->subjecttypes()->first();
            $this->subjecttype_id= $subtypeId;
            $patternId = $subject->patternclass->pattern->first();
            $this->pattern_id= $patternId;
            $courseId =  $subject->patternclass->courseclass->course->first();
            $this->course_id = $courseId;
            $classyearId =  $subject->patternclass->courseclass->classyear->first();
            $this->classyear_id = $classyearId;
            $departmentId = $subject->department->first();
            $this->department_id=  $departmentId;
            $collegeId = $subject->college->first();
            $this->college_id= $subject->college_id;
            $this->setmode('view');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');
        }
    }

    public function render()
    {
        $this->patterns=Pattern::select('id','pattern_name')->where('status',1)->get();
        $this->courses=course::select('id','course_name')->get();
        $this->course_classes=Courseclass::select('id','course_id','classyear_id')->where('course_id', $this->course_id)->get();
        $this->semesters=Semester::select('id','semester','course_type')->where('status',1)->get();
        $subjects = Subject::when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.faculty.subject.all-subject',compact('subjects'))->extends('layouts.faculty')->section('faculty');
    }
}
