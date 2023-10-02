<?php

namespace App\Http\Controllers\Faculty\head;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Subject;
use App\Models\Subjectbucket;
use App\Models\Subjectcategory;
use App\Models\Subjecttype;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class SubjectController extends Controller
{
    public function index()
    {  
        $head_department_ids=Auth::user()->departments->pluck('pivot.department_id');

        $subjects=Subject::whereIn('department_id',$head_department_ids)
        ->get();
        return view("faculty.subject.index",compact('subjects','head_department_ids'));
    }
    public function create($id)
    {
        $head_department_ids=Auth::user()->departments->pluck('pivot.department_id');
        if(!$head_department_ids->contains($id))
        return redirect()->route('admin.subject.showsubject')
        ->with('success','Wrong Department !!!!!');
        
        $dept=Department::where('id',$id)->get(); 
        $subjectcategories=Subjectcategory::all();
        $subjecttypes=Subjecttype::all();
        return view("faculty.subject.create",compact('dept','subjectcategories','subjecttypes','head_department_ids'));
     
    }
    public function store(Request $request,$id)
    { 
        
        $head_department_ids=Auth::user()->departments->pluck('pivot.department_id');
        if(!$head_department_ids->contains($id))
        return redirect()->route('admin.subject.showsubject')
        ->with('success','Wrong Department !!!!!');
        $deptid=$id;
        if(!isset($request['patternclass_id']) && isset($request['classyear_id']))
        {
        Validator::make($request->all(), [
            
            'subject_name' => ['required', 'string', 'max:255'],
            'subject_code' => ['required', 'string','max:255'],
            'subject_shortname'=> ['required','string','max:255' ],
            'subject_sem'=>['required','numeric'],
            'subjectcategory_id' => ['required','numeric'],
            'subjecttype_id' => ['required','numeric'],
            'subjectexam_type' => ['required'],
            'subject_credit' => ['required','numeric'],
            'subject_maxmarks' => ['required','numeric'],
            'subject_maxmarks_int' => ['required','numeric'],
            'subject_maxmarks_intpract' => ['required','numeric'],
            'subject_maxmarks_ext' => ['required','numeric'],
            'subject_totalpassing'=> ['required','numeric'],
            'subject_intpassing' => ['required','numeric'],
            'subject_intpractpassing' => ['required','numeric'],
            'subject_extpassing'=> ['required','numeric'],
            'classyear_id'=> ['required','numeric'],

            
        ])->validate();
       
 
       $subject= Subject::create([
        'subject_name'=>  $request['subject_name'],
        'subject_code' =>  $request['subject_code'],
        'subject_shortname'=>  $request['subject_shortname'],
        'subject_sem'=>$request['subject_sem'],
        'subjectcategory_id'=>  $request['subjectcategory_id'],
        'subjecttype_id'=>  $request['subjecttype_id'],
        'subjectexam_type' =>  $request['subjectexam_type'],
        'subject_credit'=>  $request['subject_credit'],
        'subject_maxmarks'=>  $request['subject_maxmarks'],
        'subject_maxmarks_int' =>  $request['subject_maxmarks_int'],
        'subject_maxmarks_intpract' =>  $request['subject_maxmarks_intpract'],
        'subject_maxmarks_ext' =>  $request['subject_maxmarks_ext'],
        'subject_totalpassing'=>  $request['subject_totalpassing'],
        'subject_intpassing' =>  $request['subject_intpassing'],
        'subject_intpractpassing' =>  $request['subject_intpractpassing'],
        'subject_extpassing'=>  $request['subject_extpassing'],
        'department_id'=>$deptid,
            //'college_id'=>$request['college'],
        'classyear_id'=> $request['classyear_id'],
            
        ]);
    }//if
    else if(isset($request['patternclass_id']) && !(isset($request['classyear_id'])))
    {
    Validator::make($request->all(), [
        
        'subject_name' => ['required', 'string', 'max:255'],
        'subject_code' => ['required', 'string','max:255'],
        'subject_shortname'=> ['required','string','max:255' ],
        'subject_sem'=>['required','numeric'],
        'subjectcategory_id' => ['required','numeric'],
        'subjecttype_id' => ['required','numeric'],
        'subjectexam_type' => ['required'],
        'subject_credit' => ['required','numeric'],
        'subject_maxmarks' => ['required','numeric'],
        'subject_maxmarks_int' => ['required','numeric'],
        'subject_maxmarks_intpract' => ['required','numeric'],
        'subject_maxmarks_ext' => ['required','numeric'],
        'subject_totalpassing'=> ['required','numeric'],
        'subject_intpassing' => ['required','numeric'],
        'subject_intpractpassing' => ['required','numeric'],
        'subject_extpassing'=> ['required','numeric'],
        'patternclass_id'=> ['required','numeric'],

        
    ])->validate();
   

   $subject= Subject::create([
    'subject_name'=>  $request['subject_name'],
    'subject_code' =>  $request['subject_code'],
    'subject_shortname'=>  $request['subject_shortname'],
    'subject_sem'=>$request['subject_sem'],
    'subjectcategory_id'=>  $request['subjectcategory_id'],
    'subjecttype_id'=>  $request['subjecttype_id'],
    'subjectexam_type' =>  $request['subjectexam_type'],
    'subject_credit'=>  $request['subject_credit'],
    'subject_maxmarks'=>  $request['subject_maxmarks'],
    'subject_maxmarks_int' =>  $request['subject_maxmarks_int'],
    'subject_maxmarks_intpract' =>  $request['subject_maxmarks_intpract'],
    'subject_maxmarks_ext' =>  $request['subject_maxmarks_ext'],
    'subject_totalpassing'=>  $request['subject_totalpassing'],
    'subject_intpassing' =>  $request['subject_intpassing'],
    'subject_intpractpassing' =>  $request['subject_intpractpassing'],
    'subject_extpassing'=>  $request['subject_extpassing'],
    'department_id'=>$deptid,
        //'college_id'=>$request['college'],
    'patternclass_id'=> $request['patternclass_id'],
        
    ]);
}//if
    //dd($request->all());
        return redirect()->route('admin.subject.showsubject')
        ->with('success','Subject Created successfully.');
    
    }
    public function active_subject($id)
    { 
        $subject=Subject::find($id);
        $subject->update([
           'status'=> '0',
            
        ]);
        return redirect()->route('admin.subject.showsubject');
    }
    public function deactive_subject($id)
    { 
        $subject=Subject::find($id);
        $subject->update([
           'status'=> '1',
            
        ]);
        return redirect()->route('admin.subject.showsubject');
    }
    public function delete($id)
    { 
        $subject=Subject::find($id);
        $subject->update([
           'status'=> '0',
            
        ]);
        return redirect()->route('admin.subject.showsubject');
     }
   public function  alldetails($id)
    { 
        $subject=Subject::find($id);
        return view('faculty.subject.show',compact('subject'));
    }
    public function create_subject_bucket($id)
    {
        $head_department_ids=Auth::user()->departments->pluck('pivot.department_id');
        if(!$head_department_ids->contains($id))
        return redirect()->route('admin.subject.showsubject')
        ->with('success','Wrong Department !!!!!');
        
        $dept=Department::where('id',$id)->get(); 
        $subjectcategories=Subjectcategory::where('active','2')->get();
        $subjecttypes=Subjecttype::all();
        return view("faculty.subject.subjectbucket",compact('dept','subjectcategories','subjecttypes','head_department_ids'));
     
    }
    public function store_subject_bucket(Request $request,$id)
    { 
        $head_department_ids=Auth::user()->departments->pluck('pivot.department_id');
        //dd($head_department_ids);
        if(!$head_department_ids->contains($id))
        return redirect()->route('admin.subject.showsubject')
        ->with('success','Wrong Department !!!!!');
        $deptid=$id;
//dd($request['subject_categoryno']);
        Validator::make($request->all(), [
            'subject_categoryno'=>['required','numeric'],
            'subjectcategory_id' => ['required','numeric'],
            'subject_id' => ['required','numeric'],
            //'academicyear_id' => ['required','numeric'],
            //'department_id'=> ['required','numeric'],
            'patternclass_id'=> ['required','numeric'],
        ])->validate();

       $subjectbucket= Subjectbucket::create([
        'subject_categoryno'=>  $request['subject_categoryno'],
        'subjectcategory_id'=>  $request['subjectcategory_id'],
        'subject_id'=>  $request['subject_id'],
        'academicyear_id' =>  1,//$request['academicyear_id'],
        'department_id'=>$deptid,
            //'college_id'=>$request['college'],
        'patternclass_id'=> $request['patternclass_id'],
            
        ]);
        //dd($subjectbucket);
        return redirect()->route('admin.subject.showsubject');
    }
}
