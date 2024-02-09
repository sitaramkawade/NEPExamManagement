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
use App\Models\Subjectcredit;
use App\Models\Subjectcategory;
use App\Models\Subjectexamtype;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\SubjectExamTypeMaster;
use Doctrine\Inflector\Rules\Patterns;
use App\Exports\Faculty\Subject\SubjectExport;

class AllSubject extends Component
{
    use WithPagination;

    protected $listeners = ['delete-confirmed'=>'delete'];
    public $subject_sem;
    public $subjectcategory_id;

    public $subject_order;
    public $subject_code;
    public $subject_name_prefix;

    public $subject_name;
    public $subjecttype_id;
    public $subjectexam_type=null;
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
    public $is_panel;
    public $no_of_sets;
    public $classyear_id;
    public $department_id;
    public $college_id;

    #[Locked]
    public $subject_id;
    public $pattern_id;
    public $course_id;
    public $course_class_id;
    public $pattern_class;
    public $course_name;
    public $subject_categories;
    public $subject_types;
    public $subjectexam_types;
    public $subject_credits;
    public $pattern_classes;
    public $class_years;
    public $departments;
    public $colleges;
    public $patterns;
    public $courses;
    public $semesters;
    public $course_classes;
    public $pattern_class_id;

    public $type = ['IE'=>0,'IP'=>0,'IG'=>0,'I'=>0,'P'=>0,'G'=>0,'IEP'=>0,'IEG'=>0,'E'=>0];

    public $mode='all';
    public $per_page = 10;
    #[Locked]
    public $delete_id;
    public $perPage=10;
    public $search='';
    public $sortColumn="subject_name";
    public $sortColumnBy="ASC";
    public $ext;
    public $isDisabled = true;

    protected function rules()
    {
        $rules = [
            'subject_sem' => ['required', Rule::exists(Semester::class,'id')],
            'subjectcategory_id' => ['required', Rule::exists(Subjectcategory::class,'id')],
            'subject_code' => ['required', 'string', 'min:1', 'max:50'],
            'subject_name_prefix' => ['required', 'string', 'min:1', 'max:50'],
            'subject_name' => ['required', 'string','min:1', 'max:100',],
            'subject_order' => ['required','numeric',
                Rule::unique('subjects')->where(function ($query) {
                    return $query->where('patternclass_id', $this->patternclass_id);
                })->ignore($this->subject_id ?? null),
            ],
            'subjecttype_id' => ['required',Rule::exists(Subjecttype::class,'id')],
            'subjectexam_type' => ['required',Rule::exists(Subjectexamtype::class,'id')],
            'subject_credit' => ['required',Rule::exists(Subjectcredit::class,'id')],
            'is_panel' => ['required','numeric','in:0,1'],
            'no_of_sets' => ['required','numeric','in:1,2,3'],
            'classyear_id' => ['required',Rule::exists(Classyear::class,'id')],
            // 'pattern_id' => ['required',Rule::exists(Pattern::class,'id')],
            // 'course_id' => ['required',Rule::exists(Course::class,'id')],
            // 'course_class_id' => ['required',Rule::exists(Courseclass::class,'id')],
        ];
        if($this->type['IE']){
            $rules ['subject_maxmarks'] = ['required'];
            $rules ['subject_maxmarks_int'] = ['required'];
            $rules ['subject_maxmarks_ext'] = ['required'];
            $rules ['subject_totalpassing'] = ['required'];
            $rules ['subject_intpassing'] = ['required'];
            $rules ['subject_extpassing'] = ['required'];
        }elseif($this->type['IP']){
            $rules ['subject_maxmarks'] = ['required'];
            $rules ['subject_maxmarks_int'] = ['required'];
            $rules ['subject_maxmarks_intpract'] = ['required'];
            $rules ['subject_intpractpassing'] = ['required'];
            $rules ['subject_intpassing'] = ['required'];
            $rules ['subject_totalpassing'] = ['required'];
        }elseif($this->type['IG']){
            $rules ['subject_maxmarks'] = ['required'];
            $rules ['subject_maxmarks_int'] = ['required'];
            $rules ['subject_intpassing'] = ['required'];
            $rules ['subject_totalpassing'] = ['required'];
        }elseif($this->type['I']){
            $rules ['subject_maxmarks'] = ['required'];
            $rules ['subject_maxmarks_int'] = ['required'];
            $rules ['subject_intpassing'] = ['required'];
            $rules ['subject_totalpassing'] = ['required'];
        }elseif($this->type['IEP']){
            $rules ['subject_maxmarks'] = ['required'];
            $rules ['subject_maxmarks_int'] = ['required'];
            $rules ['subject_maxmarks_intpract'] = ['required'];
            $rules ['subject_maxmarks_ext'] = ['required'];
            $rules ['subject_totalpassing'] = ['required'];
            $rules ['subject_intpassing'] = ['required'];
            $rules ['subject_intpractpassing'] = ['required'];
            $rules ['subject_extpassing'] = ['required'];
        }elseif($this->type['IEG']){
            $rules ['subject_maxmarks'] = ['required'];
            $rules ['subject_maxmarks_int'] = ['required'];
            $rules ['subject_maxmarks_ext'] = ['required'];
            $rules ['subject_totalpassing'] = ['required'];
            $rules ['subject_intpassing'] = ['required'];
            $rules ['subject_extpassing'] = ['required'];
        }
        return $rules;
    }


    public function messages()
    {
        return [
            'subject_sem.required' => 'The subject semester field is required.',
            'subject_sem.integer' => 'The semester must be an integer.',
            'subject_sem.exists' => 'The selected semester invalid.',
            'subjectcategory_id.required' => 'The subject category field is required.',
            'subjectcategory_id.integer' => 'The subject category must be an integer.',
            'subjectcategory_id.exists' => 'The selected subject category is invalid.',
            'subject_code.required' => 'The subject code field is required.',
            'subject_code.string' => 'The subject code must be a string.',
            'subject_code.min' => 'The subject code must be at least 1 character.',
            'subject_code.max' => 'The subject code must not exceed 50 characters.',
            'subject_name_prefix.required' => 'The subject name prefix field is required.',
            'subject_name_prefix.string' => 'The subject name prefix must be a string.',
            'subject_name_prefix.min' => 'The subject name prefix must be at least 1 character.',
            'subject_name_prefix.max' => 'The subject name prefix must not exceed 50 characters.',
            'subject_name.required' => 'The subject name field is required.',
            'subject_name.string' => 'The subject name must be a string.',
            'subject_name.max' => 'The subject name must not exceed 100 characters.',
            'subject_order.required' => 'The subject order field is required.',
            'subject_order.numeric' => 'The subject order must be a numeric value.',
            'subject_order.unique' => 'The subject order must be unique within the same pattern class.',
            'subjecttype_id.required' => 'The subject type field is required.',
            'subjecttype_id.exists' => 'The selected subject type is invalid.',
            'subjectexam_type.required' => 'The subject exam type field is required.',
            'subjectexam_type.exists' => 'The selected subject exam type is invalid.',
            'subject_credit.required' => 'The subject credit field is required.',
            'subject_credit.exists' => 'The selected subject credit is invalid.',
            'subject_maxmarks.required' => 'The subject maximum marks field is required.',
            'subject_maxmarks_int.required' => 'The subject maximum internal marks field is required.',
            'subject_maxmarks_intpract.required' => 'The subject maximum internal practical marks field is required.',
            'subject_maxmarks_ext.required' => 'The subject maximum external marks field is required.',
            'subject_totalpassing.required' => 'The subject total passing marks field is required.',
            'subject_intpassing.required' => 'The subject internal passing marks field is required.',
            'subject_intpractpassing.required' => 'The subject internal practical passing marks field is required.',
            'subject_extpassing.required' => 'The subject external passing marks field is required.',
            'is_panel.required' => 'The subject exam panel field is required.',
            'is_panel.numeric' => 'The subject exam panel field must be a number.',
            'is_panel.in' => 'The subject exam panel field must be either Yes or No.',
            'no_of_sets.required' => 'The number of sets field is required.',
            'no_of_sets.numeric' => 'The number of sets field must be a number.',
            'no_of_sets.in' => 'The number of sets field must be either 1, 2, or 3.',
            'classyear_id.required' => 'The class year field is required.',
            'classyear_id.exists' => 'The selected class year is invalid.',
            // 'subject_optionalgroup.required' => 'The subject optional group field is required.',
            // 'department_id.required' => 'The department field is required.',
            // 'department_id.exists' => 'The selected department is invalid.',
            // 'college_id.required' => 'The college field is required.',
            // 'college_id.exists' => 'The selected college is invalid.',

            'pattern_id.required' => 'The pattern field is required.',
            'pattern_id.exists' => 'The selected pattern is invalid.',
            'course_id.required' => 'The course field is required.',
            'course_id.exists' => 'The selected course is invalid.',
            'course_class_id.required' => 'The course class field is required.',
            'course_class_id.exists' => 'The selected course class is invalid.',
        ];
    }

    public function resetinput()
    {
        $this->subject_order=null;
        $this->subject_code=null;
        $this->subject_name_prefix=null;
        $this->subject_name=null;
        $this->subjecttype_id=null;
        $this->subjectexam_type=null;
        $this->subject_credit=null;
        $this->is_panel=null;
        $this->no_of_sets=null;
        $this->subject_maxmarks=null;
        $this->subject_maxmarks_int=null;
        $this->subject_maxmarks_intpract=null;
        $this->subject_maxmarks_ext=null;
        $this->subject_totalpassing=null;
        $this->subject_intpassing=null;
        $this->subject_intpractpassing=null;
        $this->subject_extpassing=null;
        $this->subject_optionalgroup=null;
        $this->classyear_id=null;
        $this->department_id=null;
        $this->college_id=null;

        $this->subject_sem=null;
        $this->subjectcategory_id=null;
        $this->patternclass_id=null;
        $this->pattern_id=null;
        $this->course_id=null;
        $this->course_class_id=null;
    }

    public function resetinputspecific()
    {
        $this->subject_order=null;
        $this->subject_code=null;
        $this->subject_name_prefix=null;
        $this->subject_name=null;
        $this->subjecttype_id=null;
        $this->subjectexam_type=null;
        $this->subject_credit=null;
        $this->is_panel=null;
        $this->no_of_sets=null;
        $this->subject_maxmarks=null;
        $this->subject_maxmarks_int=null;
        $this->subject_maxmarks_intpract=null;
        $this->subject_maxmarks_ext=null;
        $this->subject_totalpassing=null;
        $this->subject_intpassing=null;
        $this->subject_intpractpassing=null;
        $this->subject_extpassing=null;
        $this->subject_optionalgroup=null;
        $this->classyear_id=null;
        $this->department_id=null;
        $this->college_id=null;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function setmode($mode)
    {
        if($mode=='add'){
            $this->resetinput();
        }elseif('all'){
            $this->resetinput();
        }
        if($mode=='edit'){
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

        $pattern_class = Patternclass::where('class_id', $this->course_class_id)->where('pattern_id', $this->pattern_id)->select('id')->first();
        $exam_type = Subjectexamtype::find($this->subjectexam_type);

        if (!$pattern_class) {
            $this->dispatch('alert', type: 'success', message: 'Pattern Class Not Found!!');
            return;
        }

        // Set user_id and faculty_id based on the current authentication guard
        $guard = Auth::user('faculty');

        $validatedData['patternclass_id'] = $pattern_class->id;
        $validatedData['subjectexam_type'] = $exam_type->examtype;
        $validatedData['faculty_id'] = $guard ? $guard->id : null;
        $validatedData['department_id'] = $guard ? $guard->department_id : null;
        $validatedData['college_id'] = $guard ? $guard->college_id : null;


        $subject = Subject::create($validatedData);

        if ($subject) {
            $this->dispatch('alert', type: 'success', message: 'Subject Saved Successfully !!');
            $this->type = ['IE'=>0,'IP'=>0,'IG'=>0,'I'=>0,'P'=>0,'G'=>0,'IEP'=>0,'IEG'=>0,'E'=>0];
            $this->resetinputspecific();
        } else {
            $this->dispatch('alert', type: 'error', message: 'Something went wrong!!');
        }
    }


    public function edit(Subject $subject)
    {

        if ($subject)
        {
            $this->subject_id = $subject->id;
            $this->subject_sem= $subject->subject_sem;
            $this->subjectcategory_id= $subject->subjectcategory_id;
            $this->subject_order= $subject->subject_order;
            $this->subject_code= $subject->subject_code;
            $this->subject_name_prefix= $subject->subject_name_prefix;
            $this->subjectexam_type= $subject->subjectexam_type;
            $this->subject_name= $subject->subject_name;
            $this->subjecttype_id= $subject->subjecttype_id;
            $this->subject_credit= $subject->subject_credit;
            $this->is_panel= $subject->is_panel;
            $this->no_of_sets= $subject->no_of_sets;
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
        $pattern_class = Patternclass::select('id')->where('class_id', $this->course_class_id)->where('pattern_id', $this->pattern_id)->first('id');

        if ($subject) {
            if ($pattern_class) {
                $validatedData['patternclass_id'] = $pattern_class->id;
                $exam_type = Subjectexamtype::find($this->subjectexam_type);
                $validatedData['subjectexam_type'] = $exam_type->examtype;
                // Check the current authentication guard
                $guard = Auth::user('faculty');

                // Set user_id and faculty_id based on the guard
                if ($guard) {
                    $validatedData['faculty_id'] = $guard->id;
                    $validatedData['department_id'] = $guard->department_id;
                    $validatedData['college_id'] = $guard->college_id;
                } else {
                    $validatedData['faculty_id'] = null;
                    $validatedData['department_id'] = null;
                    $validatedData['college_id'] = null;
                }
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
            $this->dispatch('alert',type:'success',message:'Subject Deleted Successfully !!');
        } else {
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');
        }
    }

    public function softdelete($id)
    {
        $subject = Subject::withTrashed()->findOrFail($id);

        if ($subject) {
            $subject->delete();
            $this->dispatch('alert',type:'success',message:'Subject Soft Deleted Successfully !!');
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
            $this->dispatch('alert',type:'success',message:'Subject Restored Successfully !!');
        } else {
            $this->dispatch('alert',type:'error',message:'Subject Not Found !!');
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
        $filename="Subject-".time();
        switch ($this->ext) {
            case 'xlsx':
                return Excel::download(new SubjectExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.xlsx');
            break;
            case 'csv':
                return Excel::download(new SubjectExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.csv');
            break;
            case 'pdf':
                return Excel::download(new SubjectExport($this->search, $this->sortColumn, $this->sortColumnBy), $filename.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF,);
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
            $this->subjectcategory_id = isset($subject->subjectcategories->subjectcategory) ? $subject->subjectcategories->subjectcategory : '';
            $this->subject_order= $subject->subject_order;
            $this->subject_code= $subject->subject_code;
            $this->subject_name_prefix= $subject->subject_name_prefix;
            $this->subject_name= $subject->subject_name;
            $this->subjecttype_id = isset($subject->subjecttypes->type_name) ? $subject->subjecttypes->type_name : '';
            $this->subjectexam_type= $subject->subjectexam_type;
            $this->subject_credit= $subject->subject_credit;
            $this->pattern_id = isset($subject->patternclass->pattern->pattern_name) ? $subject->patternclass->pattern->pattern_name : '';
            $this->course_id =  isset($subject->patternclass->courseclass->course->course_name) ? $subject->patternclass->courseclass->course->course_name : '';
            $this->classyear_id =  isset($subject->patternclass->courseclass->classyear->classyear_name) ? $subject->patternclass->courseclass->classyear->classyear_name : '';
            $this->department_id = isset($subject->department->dept_name) ? $subject->department->dept_name : '';
            $this->college_id = isset($subject->college->college_name) ? $subject->college->college_name : '';
            $this->is_panel= $subject->is_panel;
            $this->no_of_sets= $subject->no_of_sets;
            $this->subject_maxmarks= $subject->subject_maxmarks;
            $this->subject_maxmarks_int= $subject->subject_maxmarks_int;
            $this->subject_maxmarks_intpract= $subject->subject_maxmarks_intpract;
            $this->subject_maxmarks_ext= $subject->subject_maxmarks_ext;
            $this->subject_totalpassing= $subject->subject_totalpassing;
            $this->subject_intpassing= $subject->subject_intpassing;
            $this->subject_intpractpassing= $subject->subject_intpractpassing;
            $this->subject_extpassing= $subject->subject_extpassing;
            // $this->subject_optionalgroup= $subject->subject_optionalgroup;
            $this->setmode('view');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');
        }
    }

    public function render()
    {
        if($this->mode !== 'all' ){
            $this->patterns=Pattern::select('id','pattern_name')->where('status',1)->get();
            $this->courses=Course::select('id','course_name')->get();
            if($this->course_id){
                $this->course_classes=Courseclass::select('id','course_id','classyear_id')->where('course_id', $this->course_id)->get();
            }else{
                $this->course_classes=[];
            }
            $this->semesters=Semester::select('id','semester',)->where('status',1)->get();
            $this->subject_categories = Subjectcategory::select('id','subjectcategory')->where('is_active',1)->get();
            $this->subject_types = Subjecttype::select('id','type_name')->where('active',1)->get();

            if($this->subjecttype_id){
                $this->subjectexam_types = SubjectExamTypeMaster::with(['subjectexamtype',])->select('id','examtype_id')->where('subjecttype_id', $this->subjecttype_id)->get();
            }else{
                $this->subjectexam_types=[];
            }

            $this->subject_credits = Subjectcredit::select('id','credit')->get();
            $this->class_years= Classyear::select('id','classyear_name')->where('status',1)->get();
            $this->departments= Department::select('id','dept_name')->where('status',1)->get();
            $this->colleges= College::select('id','college_name')->where('status',1)->get();
        }
        if($this->course_class_id && $this->pattern_id){
            $pattern_class = Patternclass::where('class_id', $this->course_class_id)->where('pattern_id', $this->pattern_id)->select('id')->first();
        }else{
            $pattern_class=[];
        }

        if ($pattern_class) {
            $maxSubjectOrder = 0;
            $maxSubjectOrder = Subject::where('patternclass_id', $pattern_class->id)->where('subject_sem', 1)->max('subject_order');
            // Increment the maximum subject order by one
            $maxSubjectOrder += 1;
            // Assign the new subject order value to the property
            $this->subject_order = $maxSubjectOrder;
        }
        if($this->subjectexam_type){
            $examtypes=Subjectexamtype::find($this->subjectexam_type);
            switch ($examtypes->examtype) {
                case 'IE':
                    $this->type = ['IE'=>1,'IP'=>0,'IG'=>0,'I'=>0,'P'=>0,'G'=>0,'IEP'=>0,'IEG'=>0,'E'=>0];
                    break;
                case 'IP':
                    $this->type = ['IE'=>0,'IP'=>1,'IG'=>0,'I'=>0,'P'=>0,'G'=>0,'IEP'=>0,'IEG'=>0,'E'=>0];
                    break;
                case 'IG':
                    $this->type = ['IE'=>0,'IP'=>0,'IG'=>1,'I'=>0,'P'=>0,'G'=>0,'IEP'=>0,'IEG'=>0,'E'=>0];
                    break;
                case 'I':
                    $this->type = ['IE'=>0,'IP'=>0,'IG'=>0,'I'=>1,'P'=>0,'G'=>0,'IEP'=>0,'IEG'=>0,'E'=>0];
                    break;
                case 'P':
                    $this->type = ['IE'=>0,'IP'=>0,'IG'=>0,'I'=>0,'P'=>1,'G'=>0,'IEP'=>0,'IEG'=>0,'E'=>0];
                    break;
                case 'G':
                    $this->type = ['IE'=>0,'IP'=>0,'IG'=>0,'I'=>0,'P'=>0,'G'=>1,'IEP'=>0,'IEG'=>0,'E'=>0];
                    break;
                case 'IEP':
                    $this->type = ['IE'=>0,'IP'=>0,'IG'=>0,'I'=>0,'P'=>0,'G'=>0,'IEP'=>1,'IEG'=>0,'E'=>0];
                    break;
                case 'IEG':
                    $this->type = ['IE'=>0,'IP'=>0,'IG'=>0,'I'=>0,'P'=>0,'G'=>0,'IEP'=>0,'IEG'=>1,'E'=>0];
                    break;
                case 'E':
                    $this->type = ['IE'=>0,'IP'=>0,'IG'=>0,'I'=>0,'P'=>0,'G'=>0,'IEP'=>0,'IEG'=>0,'E'=>1];
                    break;
            }
        }

        $subjects = Subject::with(['college', 'subjectcategories', 'department', 'subjecttypes', 'patternclass', 'classyear',])->when($this->search, function($query, $search){
            $query->search($search);
        })->orderBy($this->sortColumn, $this->sortColumnBy)->withTrashed()->paginate($this->perPage);
        return view('livewire.faculty.subject.all-subject',compact('subjects'))->extends('layouts.faculty')->section('faculty');
    }
}
