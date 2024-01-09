<?php

namespace App\Livewire\Faculty\Subject;

use App\Models\Course;
use App\Models\College;
use App\Models\Pattern;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Classyear;
use App\Models\Department;
use App\Models\Courseclass;
use App\Models\Subjecttype;
use App\Models\Patternclass;
use App\Models\Subjectcategory;
use Illuminate\Validation\Rule;
use Doctrine\Inflector\Rules\Patterns;

class AllSubject extends Component
{
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

    public $mode='all';
    public $per_page = 10;
    public $delete_id;
    public $perPage=10;
    public $search='';
    public $sortColumn="subject_name";
    public $sortColumnBy="ASC";
    public $ext;

    protected function rules()
    {
        return [
            'subject_sem' => ['required',],
            'subjectcategory_id' => ['required',Rule::exists(Subjectcategory::class,'id')],
            'subject_no' => ['required', 'numeric', 'digits_between:1,10'],
            'subject_code' => ['required', 'string', 'min:1', 'max:10'],
            'subject_shortname' => ['required', 'string', 'max:11',],
            'subject_name' => ['required', 'string', 'max:11',],
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
        ];
    }

    public function resetinput()
    {
         $this->subject_sem=null;
         $this->subjectcategory_id=null;
         $this->subject_no=null;
         $this->subject_code=null;
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
        $subject = Subject::create($validatedData);
        if ($subject) {
            $this->dispatch('alert',type:'success',message:'Subject Added Successfully');
        } else {
            $this->dispatch('alert',type:'error',message:'Faculty Registration Unsucessful');
        }
    }

    // public function edit(Subject $subject)
    // {
    //     if ($subject)
    //     {
    //         $this->faculty_id = $faculty->id;
    //         $this->prefix= $faculty->prefix;
    //         $this->faculty_name= $faculty->faculty_name;
    //         $this->email= $faculty->email;
    //         $this->mobile_no= $faculty->mobile_no;
    //         $this->role_id= $faculty->role_id;
    //         $this->department_id= $faculty->department_id;
    //         $this->college_id= $faculty->college_id;

    //         $bankdetails = $faculty->facultybankaccount()->first();
    //         if($bankdetails){
    //             $this->facultybank_id= $bankdetails->id;
    //             $this->bank_name= $bankdetails->bank_name;
    //             $this->account_no= $bankdetails->account_no;
    //             $this->bank_address= $bankdetails->bank_address;
    //             $this->branch_name= $bankdetails->branch_name;
    //             $this->branch_code= $bankdetails->branch_code;
    //             $this->ifsc_code= $bankdetails->ifsc_code;
    //             $this->micr_code= $bankdetails->micr_code;
    //             $this->account_type= $bankdetails->account_type;
    //         }else{
    //             $this->dispatch('alert',type:'error',message:'Bank Details Not Found');
    //         }
    //         $this->setmode('edit');
    //     }else{
    //         $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');
    //     }
    // }

    // public function update(Faculty $faculty)
    // {
    //     $validatedData = $this->validate();

    //     if ($faculty) {
    //         $faculty->update($validatedData);
    //         $faculty->facultybankaccount()->updateOrCreate([], $validatedData);

    //         $this->dispatch('alert',type:'success',message:'Faculty Updated Successfully');
    //         $this->setmode('all');
    //         $this->resetinput();
    //     }else{
    //         $this->dispatch('alert',type:'error',message:'Error To Update Faculty');
    //     }
    // }

    // public function softdelete($id)
    // {
    //     $faculty = Faculty::withTrashed()->findOrFail($id);

    //     if ($faculty) {
    //         $bankAccount = $faculty->facultybankaccount()->withTrashed()->first();
    //         if ($bankAccount) {
    //             $bankAccount->delete();
    //         }
    //         $faculty->delete();
    //         $this->dispatch('alert',type:'success',message:'Faculty Deleted Successfully');
    //         } else {
    //             $this->dispatch('alert',type:'error',message:'Faculty Not Found !');
    //         }
    //         $this->setmode('all');
    // }

    // public function restore($id)
    // {
    //     $faculty = Faculty::withTrashed()->findOrFail($id);

    //     if ($faculty) {
    //         $faculty->restore();

    //         $bankDetails = $faculty->facultybankaccount()->onlyTrashed()->get();

    //         if ($bankDetails->isNotEmpty()) {
    //             foreach ($bankDetails as $bankDetail) {
    //                 $bankDetail->restore();
    //             }
    //         }

    //         $this->delete_id = null;
    //         $this->dispatch('alert',type:'success',message:'Faculty Restored Successfully');
    //     } else {
    //         $this->dispatch('alert',type:'error',message:'Faculty Not Found');
    //     }
    //     $this->setmode('all');
    // }

    public function feach()
    {
        $this->pattern_class_id=$student->patternclass_id;
        if($pattern_class=Patternclass::find($subject->patternclass_id))
            {
                if($pattern_class)
                {
                    if($pattern_class->courseclass->course)
                    {
                        $this->course_id=$pattern_class->courseclass->course->id;
                    }
                    if($pattern_class->courseclass)
                    {
                        $this->course_class_id=$pattern_class->courseclass->id;
                    }
                    if($pattern_class->pattern)
                    {
                        $this->pattern_id= $pattern_class->pattern->id;
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

    public function render()
    {
        $this->patterns=Pattern::select('id','pattern_name')->where('status',1)->get();
        $this->courses=course::select('id','course_name')->get();
        $this->course_classes=Courseclass::select('id','course_id','classyear_id')->where('course_id', $this->course_id)->get();

        return view('livewire.faculty.subject.all-subject')->extends('layouts.faculty')->section('faculty');
    }
}
