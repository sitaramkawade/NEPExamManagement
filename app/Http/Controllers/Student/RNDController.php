<?php

namespace App\Http\Controllers\Student;

use PDF;
use Exception;
use Carbon\Carbon;
use App\Models\Exam;
use App\Models\Subject;
use App\Models\Pendigfees;
use App\Models\CourseClass;
use App\Models\Studentmark;
use App\Models\PatternClass;
use Illuminate\Http\Request;
use App\Models\Admissiondata;
use App\Models\Examfeecourse;
use App\Models\Examformmaster;
use App\Models\Studentaddress;
use App\Models\Studentprofile;
use App\Models\ExamPatternclass;
use App\Models\Extracreditsubject;
use App\Models\Studentexamformfee;
use App\Models\Photocopyexammaster;
use App\Models\PreviousexamStudent;
use App\Http\Controllers\Controller;
use App\Models\Exambacklogfeecourse;
use Illuminate\Support\Facades\Auth;
use App\Models\Internalmarksextracreditbatch;

class StudentController extends Controller
{
    private $yearresult = null;



    // public function dashboard()
    // {
    //     $printstatus = $currentprintstatus = 0;
    //     $efm = -1;
    //     $currentexam = Exam::Where('status', '1')->get();

    //     $examdata = null;

    //     if (Auth::guard('student')->check()) {
    //         $student = Auth::guard('student')->user();

    //         if (!is_null($student->examformmaster->where('exam_id', $currentexam->first()->id)->first())) {
    //             //exam form already logic
    //             if ($student->examformmaster->where('exam_id', $currentexam->first()->id)->first()->inwardstatus == 1) {
    //                 $msg = 'Exam Form already Inwarded!!!';

    //                 $printstatus = 1;
    //                 $efm = 1;
    //                 $currentprintstatus = 1;
    //                 return view('student.dashboard', compact('efm', 'printstatus', 'currentprintstatus', 'msg', 'currentexam'));
    //             }


    //             $msg = "";
    //             $msg1 = "";
    //             $msg2 = "";
    //             if (Auth::guard('student')->user()->checkpc()) {  //dd("OK");
    //                 $msg = 'Please contact to Exam Department for pending fees Rs.' . Auth::guard('student')->user()->checkpc();
    //             }
    //             $pendingfee = Pendigfees::where('memid', $student->memid)
    //                 ->where('feepaidstatus', '1')
    //                 ->get();
    //             $pendingstudfee = $pendingfee->sum('actual_fee') - $pendingfee->sum('paid_fee');
    //             if ($pendingfee->sum('actual_fee') > $pendingfee->sum('paid_fee'))
    //                 $msg1 = "Please Contact to Accounts Department for your pending dues is Rs- " . $pendingstudfee . ".";

    //             if ($student->studdocumentpendings->where('status', '0')->count() > 0)
    //                 $msg2 = "Please Contact to Admission Section for your Pending Documents (TC).";
    //             if ($student->examformmaster->where('exam_id', $currentexam->first()->id)->first()->printstatus == 0) {
    //                 $printstatus = 1;
    //                 $efm = 1;
    //                 $currentprintstatus = 0;
    //                 return view('student.dashboard', compact('efm', 'printstatus', 'currentprintstatus', 'msg', 'msg1', 'msg2', 'currentexam'));

    //             }
    //             if ($msg != "" || $msg1 != "" || $msg2 != "") {
    //                 $printstatus = 1;
    //                 $efm = 1;
    //                 $currentprintstatus = 1;
    //                 return view('student.dashboard', compact('efm', 'printstatus', 'currentprintstatus', 'msg', 'msg1', 'msg2', 'currentexam'));
    //             }
    //         }

    //         $printstatus = 0;

    //         $pc = $student->patternclass_id;


    //         if ((Auth::guard('student')->user()->checkprn()) or (!is_null(Auth::guard('student')->user()->studentprofile))) {
    //             $data2 = $student->currentclassstudents()->last();
    //             $current_class_inward_students = $student->currentclassstudents()->where('pfstatus', '!=', '-1')->where('markssheetprint_status', '!=', '-1');

    //             if (is_null($data2)) //first year sem-I
    //             {
    //                 $examdata = $student->patternclass->exams()->where('launch_status', '1')->first(); //->get();

    //             } else {
    //                 switch ($data2->sem) {
    //                     case 1:
    //                         $examdata = $data2->patternclass->exams()->where('launch_status', '1')->first();
    //                         $pc = $data2->patternclass_id;
    //                         break;

    //                     case 2:

    //                         $Sem1Data = $student->studentresults->where('sem', $data2->sem - 1)->last();
    //                         $Sem2Data = $student->studentresults->where('sem', $data2->sem)->last();
    //                         if (is_null($Sem1Data) && is_null($Sem2Data)) //direct to 2nd year admission
    //                         {
    //                             if ($data2->markssheetprint_status = -1) {
    //                                 $course_id = $student->patternclass->coursepatternclasses->course_id;
    //                                 //dd($course_id);
    //                                 $cc = CourseClass::where('course_id', $course_id)->select('id')->get();
    //                                 //echo "<br>".$cc;
    //                                 $pc1 = PatternClass::whereIn('class_id', $cc)->where('id', '!=', $data2->patternclass_id)->first();
    //                                 $pc = $pc1->id; //patternclass_id

    //                                 $examdata = $pc1->exams()->where('launch_status', '1')->first();
    //                                 // echo "<br>EXAMDATA".$examdata;
    //                             }
    //                         } else if (!is_null($Sem1Data) && !is_null($Sem2Data)) {
    //                             $this->yearresult = $student->getyearresult_examform($Sem1Data, $Sem2Data, $data2);
    //                             //dd($this->yearresult);
    //                             if ($this->yearresult == 0) //fail repeater student
    //                             {
    //                                 $examdata = $data2->patternclass->exams()->where('launch_status', '1')->first();
    //                                 $pc = $data2->patternclass_id;
    //                             } else //regular admitted student
    //                             {
    //                                 $course_id = $student->patternclass->coursepatternclasses->course_id;
    //                                 //dd($course_id);
    //                                 $cc = CourseClass::where('course_id', $course_id)->select('id')->get();
    //                                 // dd($cc);
    //                                 $pc1 = PatternClass::whereIn('class_id', $cc)
    //                                     ->where('pattern_id', '2')
    //                                     ->where('id', '!=', $data2->patternclass_id)->first();
    //                                 //dd($pc1->id);
    //                                 $pc = $pc1->id; //patternclass_id

    //                                 $examdata = $pc1->exams()->where('launch_status', '1')->first();

    //                             }
    //                         } else if ((!is_null($Sem1Data) || !is_null($Sem2Data))) {


    //                             $examdata = $data2->patternclass->exams()->where('launch_status', '1')->first();
    //                             $pc = $data2->patternclass_id;
    //                         }
    //                         break;
    //                     case 3:
    //                         $examdata = $data2->patternclass->exams()->where('launch_status', '1')->first();
    //                         $pc = $data2->patternclass_id;
    //                         //dd("OK");
    //                         break;
    //                     case 4:
    //                         //dd($current_class_inward_students->count());
    //                         if ($current_class_inward_students->isEmpty()) {
    //                             $course_id = $student->patternclass->coursepatternclasses->course_id;
    //                             //dd($course_id);
    //                             $cc = CourseClass::where('course_id', $course_id)->select('id')->get();
    //                             //echo "<br>".$cc;
    //                             $pc1 = PatternClass::whereIn('class_id', $cc)->where('id', '!=', $data2->patternclass_id)->first();
    //                             $pc = $pc1->id; //patternclass_id

    //                             $examdata = $pc1->exams()->where('launch_status', '1')->first();


    //                         }
    //                         if ($current_class_inward_students->count() == 4) {
    //                             $Sem1Data = $student->studentresults->where('sem', 1)->last();
    //                             $Sem2Data = $student->studentresults->where('sem', 2)->last();

    //                             if (!(is_null($Sem1Data) && is_null($Sem2Data))) {
    //                                 $this->yearresult = $student->getyearresult_examform($Sem1Data, $Sem2Data, $data2);

    //                                 if ($this->yearresult != 1) //fail repeater student
    //                                 {
    //                                     $examdata = $data2->patternclass->exams()->where('launch_status', '1')->first();
    //                                     $pc = $data2->patternclass_id;
    //                                 } else {
    //                                     $Sem3Data = $student->studentresults->where('sem', 3)->last();
    //                                     $Sem4Data = $student->studentresults->where('sem', 4)->last();
    //                                     if (!(is_null($Sem3Data) && is_null($Sem4Data))) {
    //                                         $this->yearresult = $student->getyearresult_examform($Sem3Data, $Sem4Data, $data2);
    //                                         //dd($this->yearresult);
    //                                         if ($this->yearresult == 0) //fail repeater student
    //                                         {
    //                                             $examdata = $data2->patternclass->exams()->where('launch_status', '1')->first();
    //                                             $pc = $data2->patternclass_id;
    //                                         } else if ($this->yearresult != 0 && $student->patternclass->coursepatternclasses->course->course_type == "PG") {
    //                                             $examdata = $data2->patternclass->exams()->where('launch_status', '1')->first();
    //                                             $pc = $data2->patternclass_id;
    //                                         } else {
    //                                             $course_id = $student->patternclass->coursepatternclasses->course_id;

    //                                             $cc = CourseClass::where('course_id', $course_id)->select('id')->get();

    //                                             $pc1 = PatternClass::whereIn('class_id', $cc)->where('id', $data2->patternclass_id + 1)->first();
    //                                             $pc = $pc1->id; //patternclass_id

    //                                             $examdata = $pc1->exams()->where('launch_status', '1')->first();

    //                                         }
    //                                     }
    //                                 }
    //                             }
    //                         } else if ($current_class_inward_students->count() == 2) {
    //                             $Sem1Data = $student->studentresults->where('sem', $data2->sem - 1)->last();
    //                             $Sem2Data = $student->studentresults->where('sem', $data2->sem)->last();
    //                             if (!(is_null($Sem1Data) && is_null($Sem2Data))) {
    //                                 $this->yearresult = $student->getyearresult_examform($Sem1Data, $Sem2Data, $data2);

    //                                 if ($this->yearresult == 0) //fail repeater student
    //                                 {
    //                                     $examdata = $data2->patternclass->exams()->where('launch_status', '1')->first();
    //                                     $pc = $data2->patternclass_id;
    //                                 } else //regular admitted student
    //                                 {
    //                                     $course_id = $student->patternclass->coursepatternclasses->course_id;

    //                                     $cc = CourseClass::where('course_id', $course_id)->select('id')->get();

    //                                     $pc1 = PatternClass::whereIn('class_id', $cc)->where('id', $data2->patternclass_id + 1)->first();
    //                                     $pc = $pc1->id; //patternclass_id

    //                                     $examdata = $pc1->exams()->where('launch_status', '1')->first();

    //                                 }
    //                             }
    //                         }

    //                         break;
    //                     case 5:
    //                         $examdata = $data2->patternclass->exams()->where('launch_status', '1')->first();
    //                         $pc = $data2->patternclass_id;
    //                         break;
    //                     case 6:
    //                         $examdata = $data2->patternclass->exams()->where('launch_status', '1')->first();
    //                         $pc = $data2->patternclass_id;
    //                         break;
    //                 }

    //             }

    //             if (!is_null($examdata))  //if not null exam is launch for patterclass
    //             {
    //                 $efm = $student->checkexamform($student->id, $examdata->id);

    //                 $examfeec = Examfeecourse::where('patternclass_id', $pc)->get();//examfeecourses
    //                 // dd("LL".$efm." ".$examfeec);
    //                 if ($examfeec->Isempty())
    //                     $efm = -1;
    //             } else
    //                 $efm = -1;//exam not launch

    //             if (!$student->currentclassstudents()->Isempty()) {
    //                 if ($student->currentclassstudents()->last()->pfstatus != -1)//previous class entry
    //                 {
    //                     $printstatus = 1;
    //                     $currentprintstatus = 0;

    //                 }
    //             } else
    //                 $printstatus = 2;
    //             $currentprintstatus = 0;

    //             if (!$student->examformmaster->Isempty()) {  //do not delete profile bcoz exam form fillup or sy student giving exam

    //                 $printstatus = 1; //$student->examformmaster->first()->printstatus; 

    //                 if ($efm == 0)
    //                     $currentprintstatus = 0;
    //                 else {
    //                     if ($student->examformmaster->where('exam_id', $currentexam->first()->id)->first())
    //                         $currentprintstatus = $student->examformmaster->where('exam_id', $currentexam->first()->id)->first()->printstatus;
    //                 }

    //             }
    //         } else
    //             $efm = -2;

    //         return view('student.dashboard', compact('efm', 'printstatus', 'currentprintstatus', 'currentexam'));
    //     }
    // }


    // public function deleteprofile($id)
    // {
    //     $printstatus = $currentprintstatus = 0;
    //     Studentprofile::where('student_id', $id)->delete();
    //     Studentaddress::where('student_id', $id)->delete();
    //     PreviousexamStudent::where('student_id', $id)->delete();

    //     //return view('student.dashboard');
    //     $student = Auth::guard('student')->user();


    //     if (Auth::guard('student')->check()) {
    //         $printstatus = 0;
    //         $student = Auth::guard('student')->user();
    //         $pc = $student->patternclass_id;

    //         //if(!is_null(Auth::guard('student')->user()->studentprofile))
    //         if ((Auth::guard('student')->user()->checkprn()) or (!is_null(Auth::guard('student')->user()->studentprofile))) {
    //             $data2 = $student->currentclassstudents()->last();
    //             //dd($data2);
    //             if (is_null($data2)) { //first year sem-I
    //                 $examdata = $student->patternclass->exams()->where('launch_status', '1')->first(); //->get();

    //             } else {
    //                 // echo $data2;
    //                 if ($data2->sem % 2 != 0)  //sem=1->2,3->4,5->6
    //                 {
    //                     //$sem=$data2->sem+1;
    //                     $examdata = $data2->patternclass->exams()->where('launch_status', '1')->first();
    //                     $pc = $data2->patternclass_id;
    //                 } else {

    //                     //sem=3 and 5

    //                     $course_id = $student->patternclass->coursepatternclasses->course_id;

    //                     $cc = CourseClass::where('course_id', $course_id)->select('id')->get();

    //                     $pc1 = PatternClass::whereIn('class_id', $cc)->where('id', '!=', $data2->patternclass_id)->first();
    //                     $pc = $pc1->id; //patternclass_id

    //                     $examdata = $pc1->exams()->where('launch_status', '1')->first();


    //                 }
    //                 //dd("LLLLL");
    //             }
    //             if (!is_null($examdata)) {
    //                 $efm = $student->checkexamform($student->id, $examdata->id);

    //                 $examfeec = Examfeecourse::where('patternclass_id', $pc)->get(); //examfeecourses
    //                 // dd("LL".$pc." ".$examfeec);
    //                 if ($examfeec->Isempty())
    //                     $efm = -1;
    //             } else
    //                 $efm = -1; //exam not launch

    //             if (!$student->currentclassstudents()->Isempty()) {
    //                 if ($student->currentclassstudents()->last()->pfstatus != -1) {
    //                     $printstatus = 1;
    //                     $currentprintstatus = 0;
    //                 }
    //             }
    //             if (!$student->examformmaster->Isempty()) {  //do not delete profile bcoz exam form fillup or sy student giving exam
    //                 //dd("PP");
    //                 $printstatus = 1; //$student->examformmaster->first()->printstatus; 

    //                 $currentprintstatus = $student->examformmaster->last()->printstatus;
    //             }

    //             //dd($inwardstatus); 
    //         } else
    //             $efm = -2;
    //         // dd($examdata."==".$efm);
    //         return view('student.dashboard', compact('efm', 'printstatus', 'currentprintstatus'));
    //     }
    // }

    // public function savecourseenroll(Request $request)
    // {
    //     $request->validate([
    //         'classpattern_id' => 'required',
    //         'pre_course_name' => 'required',
    //         'pre_boarduni_name' => 'required',
    //         'pre_marks_obtained' => 'required',
    //         'pre_marks_outof' => 'required',
    //         'pre_passout_month' => 'required',
    //         'pre_passout_year' => 'required',
    //         'pre_class_grade' => 'required',
    //         'pre_seat_no' => 'required'

    //     ]);
    //     //dd("Stor");
    //     $student = Auth::guard('student')->user();
    //     //if($request->student_type==1)//new student
    //     {
    //         $patternclass_id = $request->input('classpattern_id');


    //         $values = array('patternclass_id' => $patternclass_id);
    //         $student->update($values);


    //         $pre_course_name = $request->input('pre_course_name');
    //         $pre_boarduni_name = $request->input('pre_boarduni_name');
    //         $pre_marks_obtained = $request->input('pre_marks_obtained');
    //         $pre_marks_outof = $request->input('pre_marks_outof');
    //         $pre_passout_month = $request->input('pre_passout_month');
    //         $pre_passout_year = $request->input('pre_passout_year');
    //         $pre_class_grade = $request->input('pre_class_grade');
    //         $pre_seat_no = $request->input('pre_seat_no');
    //         $values = array(
    //             'pre_course_name' => $pre_course_name,
    //             'pre_boarduni_name' => $pre_boarduni_name,
    //             'pre_marks_obtained' => $pre_marks_obtained,
    //             'pre_marks_outof' => $pre_marks_outof,
    //             'pre_passout_month' => $pre_passout_month,
    //             'pre_passout_year' => $pre_passout_year,
    //             'pre_class_grade' => $pre_class_grade,
    //             'pre_seat_no' => $pre_seat_no
    //         );
    //         try {
    //             $data = $student->previousexamstudent;
    //             if ($data)
    //                 $student->previousexamstudent()->update($values);
    //             else
    //                 $student->previousexamstudent()->create($values);
    //         } catch (Exception $e) {
    //         }


    //         return redirect()->route('student.studentprofile');


    //     }
    // }


    // public function studentprofile()
    // {
    //     $student = Auth::guard('student')->user();
    //     $data = $student->studentprofile;
    //     $data1 = $student->studentaddress;

    //     return view("student.studentprofile", compact('data', 'data1'));
    // }
    // public function saveprofiledetails(Request $request)
    // {

    //     $savefilename = null;
    //     $student = Auth::guard('student')->user();

    //     $data = $student->studentprofile;
    //     if (is_null($data)) {

    //         $request->validate([
    //             'memid' => 'required', //|unique:students,memid',
    //             'father_name' => 'required',
    //             'mother_name' => 'required',
    //             'gender' => 'required',
    //             'dob' => 'required|date',
    //             'nationality' => 'required',
    //             'adharno' => 'required',
    //             'category' => 'required',
    //             'is_noncreamylayer' => 'required',
    //             'is_handicap' => 'required',
    //             'profile_photo_path' => 'required|mimes:png,jpg,jpeg |max:250',
    //             'sign_photo_path' => 'required|mimes:png,jpg,jpeg |max:50',
    //             'c_address' => 'required',
    //             'address' => 'required',
    //         ]);
    //         $savefilename = $student->id . ".jpg";

    //         $profile_photo_path = $request->file('profile_photo_path')->storeAs('public/images/photo', $savefilename);
    //         $sign_photo_path = $request->file('sign_photo_path')->storeAs('public/images/sign', $savefilename);
    //     } else {
    //         if (is_null($request->file('profile_photo_path')) and (is_null($request->file('sign_photo_path')))) {   //dd("already profile ");
    //             $request->validate([
    //                 'memid' => 'required',
    //                 'father_name' => 'required',
    //                 'mother_name' => 'required',
    //                 'gender' => 'required',
    //                 'dob' => 'required|date',
    //                 'nationality' => 'required',
    //                 'adharno' => 'required',
    //                 'category' => 'required',
    //                 'is_noncreamylayer' => 'required',
    //                 'is_handicap' => 'required',
    //                 'c_address' => 'required',
    //                 'address' => 'required',
    //             ]);
    //             $savefilename = $data->profile_photo_path;
    //         } else if (!is_null($request->file('profile_photo_path')) and (is_null($request->file('sign_photo_path')))) {   //dd("profile photo change");
    //             $request->validate([
    //                 'memid' => 'required',
    //                 'father_name' => 'required',
    //                 'mother_name' => 'required',
    //                 'gender' => 'required',
    //                 'dob' => 'required|date',
    //                 'nationality' => 'required',
    //                 'adharno' => 'required',
    //                 'category' => 'required',
    //                 'is_noncreamylayer' => 'required',
    //                 'is_handicap' => 'required',
    //                 'c_address' => 'required',
    //                 'address' => 'required',
    //             ]);
    //             //  $savefilename=$data->profile_photo_path;
    //             $savefilename = $student->id . ".jpg";
    //             $profile_photo_path = $request->file('profile_photo_path')->storeAs('public/images/photo', $savefilename);
    //             //dd($profile_photo_path);
    //         } else if (is_null($request->file('profile_photo_path')) and (!is_null($request->file('sign_photo_path')))) {  //dd("sign change");
    //             $request->validate([
    //                 'memid' => 'required',
    //                 'father_name' => 'required',
    //                 'mother_name' => 'required',
    //                 'gender' => 'required',
    //                 'dob' => 'required|date',
    //                 'nationality' => 'required',
    //                 'adharno' => 'required',
    //                 'category' => 'required',
    //                 'is_noncreamylayer' => 'required',
    //                 'is_handicap' => 'required',
    //                 'c_address' => 'required',
    //                 'address' => 'required',
    //             ]);
    //             $savefilename = $data->profile_photo_path;
    //             $sign_photo_path = $request->file('sign_photo_path')->storeAs('public/images/sign', $savefilename);
    //         } else {  //dd("profile  and sign change");
    //             $request->validate([
    //                 'memid' => 'required',
    //                 'father_name' => 'required',
    //                 'mother_name' => 'required',
    //                 'gender' => 'required',
    //                 'dob' => 'required|date',
    //                 'nationality' => 'required',
    //                 'adharno' => 'required',
    //                 'category' => 'required',
    //                 'is_noncreamylayer' => 'required',
    //                 'is_handicap' => 'required',
    //                 'profile_photo_path' => 'required|mimes:png,jpg,jpeg |max:250',
    //                 'sign_photo_path' => 'required|mimes:png,jpg,jpeg |max:50',
    //                 'c_address' => 'required',
    //                 'address' => 'required',
    //             ]);
    //             $savefilename = $student->id . ".jpg";

    //             $profile_photo_path = $request->file('profile_photo_path')->storeAs('public/images/photo', $savefilename);
    //             $sign_photo_path = $request->file('sign_photo_path')->storeAs('public/images/sign', $savefilename);
    //         }
    //     }


    //     $memid = $request->input('memid');

    //     $father_name = $request->input('father_name');

    //     $mother_name = $request->input('mother_name');

    //     $gender = $request->input('gender');
    //     $dob = $request->input('dob');
    //     $nationality = $request->input('nationality');
    //     $adharno = $request->input('adharno');
    //     $category = $request->input('category');
    //     $is_noncreamylayer = $request->input('is_noncreamylayer');
    //     $is_handicap = $request->input('is_handicap');




    //     $values = array(
    //         'father_name' => $father_name,
    //         'gender' => $gender,
    //         'dob' => $dob,
    //         'nationality' => $nationality,
    //         'adharno' => $adharno,
    //         'category' => $category,
    //         'is_noncreamylayer' => $is_noncreamylayer,
    //         'is_handicap' => $is_handicap,
    //         'profile_photo_path' => $savefilename,
    //         'sign_photo_path' => $savefilename
    //     );

    //     try {
    //         if (is_null($student->studentprofile))
    //             $student->studentprofile()->create($values);
    //         else
    //             $student->studentprofile()->update($values);
    //     } catch (Exception $e) {
    //         dd($e);
    //     }

    //     try {
    //         $student->update(['memid' => $memid, 'mother_name' => $mother_name]);
    //     } catch (Exception $e) {
    //     }
    //     //insert address
    //     $address = $request->input('address');
    //     $pincode = $request->input('pincode');
    //     $district = $request->input('district');
    //     $state = $request->input('state');
    //     $taluka = $request->input('taluka');
    //     $village_name = $request->input('village_name');
    //     //  $locality_name=$request->input('locality_name');
    //     $c_address = $request->input('c_address');
    //     $c_pincode = $request->input('c_pincode');
    //     $c_district = $request->input('c_district');
    //     $c_state = $request->input('c_state');
    //     $c_taluka = $request->input('c_taluka');
    //     $c_village_name = $request->input('c_village_name');
    //     //  $c_locality_name=$request->input('c_locality_name');

    //     $values = array(
    //         'address' => $address,
    //         'pincode' => $pincode,
    //         'district' => $district,
    //         'state' => $state,
    //         'taluka' => $taluka,
    //         'village_name' => $village_name,

    //         'c_address' => $c_address,
    //         'c_pincode' => $c_pincode,
    //         'c_district' => $c_district,
    //         'c_state' => $c_state,
    //         'c_taluka' => $c_taluka,
    //         'c_village_name' => $c_village_name
    //     );

    //     try {
    //         if (is_null($student->studentaddress))
    //             $student->studentaddress()->create($values);
    //         else
    //             $student->studentaddress()->update($values);
    //     } catch (Exception $e) {
    //         dd($e);
    //     }



    //     return redirect()->route('student.dashboard');
    // }


    public function examform(Request $request)
    {
        $oddevensixsem = false;
        $examsession = null;
        $extracreditsub = null;
        $backsubjectid = null;
        $subjectdata = null;
        $backsubjectpreviousem = null;

        $student = Auth::guard('student')->user();
        $currentexam = Exam::Where('status', '1')->get();
        $examsession = $currentexam->first()->exam_sessions;

        $data2 = $student->currentclassstudents()->last(); 

        $current_class_inward_students = $student->currentclassstudents()->where('pfstatus', '!=',-1)->where('markssheetprint_status', '!=',-1);

        if ($request->input('examform') == "Exam Form")
        {
            if (is_null($data2)) //first year sem-I
            {
                $memberid = $student->memid; //123;

                $adsubjectdata = Admissiondata::where('memid', $memberid)->where('patternclass_id', $student->patternclass_id)->get();
                if (!$adsubjectdata->isEmpty()) 
                {
                    if ($adsubjectdata->last()->academicyear_id == $currentexam->first()->academicyear_id) 
                    {

                        if ($examsession != 2)
                        {
                            $subjectdata = Subject::whereIn('id', $adsubjectdata->pluck('subject_id'))->where('subject_sem', '1')->get();

                        }
                        else 
                        {

                            $backsubjectpreviousem = Subject::whereIn('id', $adsubjectdata->pluck('subject_id'))->where('subject_sem', 1)->get();
                            $subjectdata = Subject::whereIn('id', $adsubjectdata->pluck('subject_id'))->where('subject_sem', 2)->get();
                        }
                        $backsubject = null;
                        $excrsubid = $student->intextracreditbatchseatnoallocations->where('grade', '=', 'NA')->pluck('subject_id');

                        $extracreditsub = Extracreditsubject::where('isactive', '1')->where('course_type', $student->patternclass->coursepatternclasses->course->course_type)->get();
                        $totalextracredit = $extracreditsub->pluck('subject_credit')->sum();

                        return view("student.examform1", compact('student', 'subjectdata', 'backsubject', 'examsession', 'extracreditsub', 'backsubjectpreviousem', 'totalextracredit', 'oddevensixsem'));
                    } 
                    else 
                    {
                        //No admission in current  year
                        return back()->with('success', 'No admission in the current year !!!!!');
                    }
                } 
                else
                {
                    return back()->with('success', 'Invalid Member ID please Update your profile !!!!!');
                }
            } 
            else 
            {
                switch ($data2->sem) 
                {
                    case 1:

                        $memberid = $student->memid; //123;
                        $adsubjectdata = Admissiondata::where('memid', $memberid)->where('patternclass_id', $data2->patternclass_id)->get();

                        if (!$adsubjectdata->isEmpty()) 
                        {
                            if ($adsubjectdata->last()->academicyear_id == $currentexam->first()->academicyear_id) 
                            { 

                                $subjectdata = Subject::whereIn('id', $adsubjectdata->pluck('subject_id'))->where('subject_sem', $data2->sem + 1)->get();
                                $backsubject = null;
                                $subdata = $student->studentmarks()->with('subject')->pluck('subject_id');
                                $backsubject = Subject::whereIn('id', $subdata)->where('patternclass_id', $data2->patternclass_id)->get();
                              
                            } else 
                            {
                                //fail student
                                $subjectdata = null;
                                $subjectdataprevious = Subject::whereIn('id', $adsubjectdata->pluck('subject_id'))->where('subject_sem', $data2->sem + 1)->get();
                                $a = $subjectdataprevious->pluck('id');

                                $backsubjectpreviousem = null;

                                $backsubjectpreviousem = Subject::whereIn('id', $a)->get();

                            }
                        } else
                        {
                            return back()->with('success', 'Invalid Member ID please Update your profile !!!!!');
                        }

                    break;
                    case 2:

                        $memberid = $student->memid; //123;

                        $adsubjectdata = Admissiondata::where('memid', $memberid)->where('patternclass_id', $data2->patternclass_id + 1)->get();

                        if (!$adsubjectdata->isEmpty()) 
                        {
                            if ($adsubjectdata->last()->academicyear_id == $currentexam->first()->academicyear_id) 
                            {

                                $Sem1Data = $student->studentresults->where('sem', $data2->sem - 1)->last();
                                $Sem2Data = $student->studentresults->where('sem', $data2->sem)->last();
                                if (is_null($Sem1Data) && is_null($Sem2Data)) //direct to 2nd year admission
                                {
                                    if ($data2->markssheetprint_status = -1) 
                                    {
                                        $subjectdata = Subject::whereIn('id', $adsubjectdata->pluck('subject_id'))->where('subject_sem', $data2->sem + 1)->get();
                                        $backsubject = null;
                                        $subdata = $student->studentmarks()->with('subject')->pluck('subject_id');
                                        $backsubject = Subject::whereIn('id', $subdata)->where('patternclass_id', $data2->patternclass_id)->get();
                                     
                                    }
                                } else if (!(is_null($Sem1Data) && is_null($Sem2Data))) 
                                {

                                    $this->yearresult = $student->getyearresult_examform($Sem1Data, $Sem2Data, $data2);

                                    if ($this->yearresult == 0) //fail student
                                    {
                                        $subjectdata = null;
                                        $backsubject = null;
                                        $subdata = $student->studentmarks()->with('subject')->pluck('subject_id');
                                        $backsubject = Subject::whereIn('id', $subdata)->where('patternclass_id', $data2->patternclass_id)->get();
                                    } 
                                    else //regular admitted student
                                    {
                                        if ($examsession == 2) 
                                        {
                                            $backsubjectpreviousem = Subject::whereIn('id', $adsubjectdata->pluck('subject_id'))->where('subject_sem', $data2->sem + 1)->get();
                                           
                                            $subjectdata = Subject::whereIn('id', $adsubjectdata->pluck('subject_id'))->where('subject_sem', $data2->sem + 2)->get(); 
                                        } else 
                                        {
                                            $subjectdata = Subject::whereIn('id', $adsubjectdata->pluck('subject_id'))->where('subject_sem', $data2->sem + 1)->get();
                                            $backsubject = null;
                                            $subdata = $student->studentmarks()->with('subject')->pluck('subject_id');
                                            $backsubject = Subject::whereIn('id', $subdata)->where('patternclass_id', $data2->patternclass_id)->get();
                                        }
                                     
                                    }
                                }
                            } else 
                            {
                                //fail student
                                $subjectdata = null;
                                $backsubject = null;
                                $subdata = $student->studentmarks()->with('subject')->pluck('subject_id');
                                $backsubject = Subject::whereIn('id', $subdata)->where('patternclass_id', $data2->patternclass_id)->get();
                            }
                        }
                        else 
                        {
                            $subjectdata = null;
                            $backsubject = null;
                            $subdata = $student->studentmarks()->with('subject')->pluck('subject_id');
                            $backsubject = Subject::whereIn('id', $subdata)->where('patternclass_id', $data2->patternclass_id)->get();
                            if ($subdata->isEmpty())
                            {

                                return back()->with('success', 'Invalid Member ID please Update your profile !!!!!');
                            }
                        }
                    break;
                    case 3:
                        $memberid = $student->memid; //123;

                        $adsubjectdata = Admissiondata::where('memid', $memberid)->where('patternclass_id', $data2->patternclass_id)->get();
                  
                        if (!$adsubjectdata->isEmpty()) 
                        {
                            if ($adsubjectdata->last()->academicyear_id == $currentexam->first()->academicyear_id) 
                            { 

                                $subjectdata = Subject::whereIn('id', $adsubjectdata->pluck('subject_id'))->where('subject_sem', $data2->sem + 1)->get();
                                $backsubject = null;
                                $subdata = $student->studentmarks()->with('subject')->pluck('subject_id');
                                $backsubject = Subject::whereIn('id', $subdata)->get();
                              
                            } else 
                            {
                                //fail student
                                $subjectdata = null;
                                $subjectdataprevious = Subject::whereIn('id', $adsubjectdata->pluck('subject_id'))->where('subject_sem', $data2->sem + 1)->get();
                                $a = $subjectdataprevious->pluck('id');
                                $backsubjectpreviousem = null;
                                $backsubjectpreviousem = Subject::whereIn('id', $a)->get();
                               
                            }
                        } 
                        else
                        {
                            return back()->with('success', 'Invalid Member ID please Update your profile !!!!!');
                        }

                    break;
                    case 4:
                        $memberid = $student->memid;
                        $adsubjectdata = Admissiondata::where('memid', $memberid)->where('patternclass_id', $data2->patternclass_id + 1)->get();

                        if (!$adsubjectdata->isEmpty()) 
                        { 
                            if ($adsubjectdata->last()->academicyear_id == $currentexam->first()->academicyear_id) 
                            {
                                if ($current_class_inward_students->isEmpty()) 
                                {
                                    $subjectdata = Subject::whereIn('id', $adsubjectdata->pluck('subject_id'))->where('subject_sem', $data2->sem + 1)->get();
                                    $backsubject = null;
                                    $subdata = $student->studentmarks()->with('subject')->pluck('subject_id');
                                    $backsubject = Subject::whereIn('id', $subdata)->where('patternclass_id', $data2->patternclass_id)->get();
                                }

                                if ($current_class_inward_students->count() == 4) 
                                {
                                    $Sem1Data = $student->studentresults->where('sem', 1)->last();
                                    $Sem2Data = $student->studentresults->where('sem', 2)->last();
                                    if (!(is_null($Sem1Data) && is_null($Sem2Data))) 
                                    {
                                        $this->yearresult = $student->getyearresult_examform($Sem1Data, $Sem2Data, $data2);

                                        if ($this->yearresult != 1) //fail repeater student
                                        {
                                            $subjectdata = null;
                                            $backsubject = null;
                                            $subdata = $student->studentmarks()->with('subject')->pluck('subject_id');
                                            $backsubject = Subject::whereIn('id', $subdata)->where('patternclass_id', $data2->patternclass_id)->get();
                                        }
                                        else 
                                        {
                                            $Sem3Data = $student->studentresults->where('sem', 3)->last();
                                            $Sem4Data = $student->studentresults->where('sem', 4)->last();
                                            if (!(is_null($Sem3Data) && is_null($Sem4Data))) 
                                            {
                                                $this->yearresult = $student->getyearresult_examform($Sem3Data, $Sem4Data, $data2);

                                                if ($this->yearresult == 0) //fail repeater student
                                                {
                                                    $subjectdata = null;
                                                    $backsubject = null;
                                                    $subdata = $student->studentmarks()->with('subject')->pluck('subject_id');
                                                    $backsubject = Subject::whereIn('id', $subdata)->where('patternclass_id', $data2->patternclass_id)->get();
                                                } 
                                                else //regular admitted student
                                                {
                                                    if ($examsession == 2) 
                                                    {
                                                        $oddevensixsem = true;
                                                        $backsubjectpreviousem = Subject::whereIn('id', $adsubjectdata->pluck('subject_id'))->where('subject_sem', $data2->sem + 1)->get();
                                                       
                                                        $subjectdata = Subject::whereIn('id', $adsubjectdata->pluck('subject_id'))->where('subject_sem', $data2->sem + 2)->get(); 
                                                    } else 
                                                    {
                                                        $subjectdata = Subject::whereIn('id', $adsubjectdata->pluck('subject_id'))->where('subject_sem', $data2->sem + 1)->get();
                                                        $backsubject = null;
                                                        $subdata = $student->studentmarks()->with('subject')->pluck('subject_id');
                                                        $backsubject = Subject::whereIn('id', $subdata)->where('patternclass_id', $data2->patternclass_id)->get();
                                                       
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                if ($current_class_inward_students->count() == 2) 
                                {
                                    $Sem1Data = $student->studentresults->where('sem', $data2->sem - 1)->last();
                                    $Sem2Data = $student->studentresults->where('sem', $data2->sem)->last();
                                    if (!(is_null($Sem1Data) && is_null($Sem2Data))) 
                                    {

                                        $this->yearresult = $student->getyearresult_examform($Sem1Data, $Sem2Data, $data2);

                                        if ($this->yearresult == 0) //fail repeater student
                                        {
                                            $subjectdata = null;
                                            $backsubject = null;
                                            $subdata = $student->studentmarks()->with('subject')->pluck('subject_id');
                                            $backsubject = Subject::whereIn('id', $subdata)->where('patternclass_id', $data2->patternclass_id)->get();
                                        } else //regular admitted student
                                        {
                                            $subjectdata = Subject::whereIn('id', $adsubjectdata->pluck('subject_id'))->get();
                                            $backsubject = null;
                                            $subdata = $student->studentmarks()->with('subject')->pluck('subject_id');
                                            $backsubject = Subject::whereIn('id', $subdata)->where('patternclass_id', $data2->patternclass_id)->get();
                                        }
                                    } 
                                    else 
                                    {
                                        //fail student
                                        $subjectdata = null;
                                        $backsubject = null;
                                        $subdata = $student->studentmarks()->with('subject')->pluck('subject_id');
                                        $backsubject = Subject::whereIn('id', $subdata)->where('patternclass_id', $data2->patternclass_id)->get();
                                    }
                                }
                            } 
                            else 
                            {
                                $subjectdata = null;
                                $backsubject = null;
                                $subdata = $student->studentmarks()->with('subject')->pluck('subject_id');
                                $backsubject = Subject::whereIn('id', $subdata)->get();
                                if ($subdata->isEmpty())
                                {

                                    return back()->with('success', 'Invalid Member ID please Update your profile !!!!!');
                                }
                            }
                        } 
                        else 
                        {
                            $adsubjectdata = Admissiondata::where('memid', $memberid)->where('patternclass_id', $data2->patternclass_id)->get();
                            if (!$adsubjectdata->isEmpty()) 
                            {
                                $subjectdata = null;
                                $backsubject = null;
                            } 
                            else
                            {
                                return back()->with('success', 'Invalid Member ID please Update your profile !!!!!');
                            }
                        }
                        break;
                    case 5:
                        //third year sem 5 to sem 6
                        $oddevensixsem = true;
                        $memberid = $student->memid; //123;
                        $adsubjectdata = Admissiondata::where('memid', $memberid)->where('patternclass_id', $data2->patternclass_id)->get();
                        if (!$adsubjectdata->isEmpty()) 
                        {
                            if ($adsubjectdata->last()->academicyear_id == $currentexam->first()->academicyear_id) 
                            {

                                $subjectdata = Subject::whereIn('id', $adsubjectdata->pluck('subject_id'))->where('subject_sem', $data2->sem + 1)->get();
                                $backsubject = null;
                                $subdata = $student->studentmarks()->with('subject')->pluck('subject_id');
                                $backsubject = Subject::whereIn('id', $subdata)->get();
                            } 
                            else 
                            {
                                //fail student
                                $subjectdata = null;
                                $subjectdataprevious = Subject::whereIn('id', $adsubjectdata->pluck('subject_id'))->where('subject_sem', $data2->sem + 1)->get();
                                $a = $subjectdataprevious->pluck('id');
                                $backsubjectpreviousem = null;
                                $backsubjectpreviousem = Subject::whereIn('id', $a)->get();
                            }
                        } else
                        {
                            return back()->with('success', 'Invalid Member ID please Update your profile !!!!!');
                        }

                    break;
                    case 6:
                        $subjectdata = null;
                        $backsubject = null;
                        $subdata = $student->studentmarks()->with('subject')->pluck('subject_id');
                        $backsubject = Subject::whereIn('id', $subdata)->where('patternclass_id', $data2->patternclass_id)->get();
                    break;
                }
               
               
                $excrsubid = $student->intextracreditbatchseatnoallocations->where('grade', '=', 'NA')->pluck('subject_id');
                if ($student->patternclass->coursepatternclasses->course->course_type == "PG") { //dd($student->studentadmission->whereIn('academicyear_id',[1,2])->count());
                    if ($student->studentadmission->whereIn('academicyear_id', [1, 2])->count() >= 1) {
                        $extracreditsub = Extracreditsubject::where('isactive', '0')
                            ->where('course_type', $student->patternclass->coursepatternclasses->course->course_type)
                            ->get();
                        $totalextracredit = $extracreditsub->pluck('subject_credit')->sum();
                        //dd($extracreditsub);
                    } else {
                        $extracreditsub = Extracreditsubject::where('isactive', '1')
                            ->where('course_type', $student->patternclass->coursepatternclasses->course->course_type)
                            ->get();
                        $totalextracredit = $extracreditsub->pluck('subject_credit')->sum();
                    }
                } else {
                    $extracreditsub = Extracreditsubject::where('isactive', '1')
                        ->where('course_type', $student->patternclass->coursepatternclasses->course->course_type)
                        ->get();
                    $totalextracredit = $extracreditsub->pluck('subject_credit')->sum();
                }
                //dd($subjectdata);

                return view("student.examform1", compact('student', 'examsession', 'currentexam', 'subjectdata', 'extracreditsub', 'backsubjectpreviousem', 'totalextracredit', 'oddevensixsem'));
            }
        } //if exam form button on dashboard
        else   //view exam form button on dashboard
        {
            $currentexam = Exam::Where('status', '1')->get(); {
                $currentprintstatus = $student->examformmaster->where('exam_id', $currentexam->first()->id)->first()->printstatus;
                if ($currentprintstatus == 1) {

                    return back()->with('success', 'Your Exam form has already printed');
                }
                $data = $student->examformmaster->where('exam_id', $currentexam->first()->id)->first();
            }
           

            $flag = 1;
            if ($student->studentprofile) {
                if ((file_exists(public_path('storage/images/photo/' . $student->studentprofile->profile_photo_path))) || (file_exists(public_path('storage/images/photo/' . $student->studentprofile->sign_photo_path)))) {
                    //dd($student->id);
                    $pdf = PDF::loadView('student.printexamform', compact('data', 'flag'))->setOptions(['images' => true, 'defaultFont' => 'sans-serif']);
                    $pdf->setPaper('L');
                    $pdf->output();
                    $canvas = $pdf->getDomPDF()->getCanvas();
                    $height = $canvas->get_height();
                    $width = $canvas->get_width();
                    $canvas->set_opacity(.2, "Multiply");
                    $canvas->page_text(
                        $width / 5,
                        $height / 2,
                        'Print Preview',
                        null,
                        70,
                        array(0, 0, 0),
                        2,
                        2,
                        -30
                    );
                    $canvas->page_text(
                        $width / 9,
                        $height / 3,
                        'Print Preview',
                        null,
                        70,
                        array(0, 0, 0),
                        2,
                        2,
                        -30
                    );

                    return $pdf->stream('examform.pdf');
                } else {

                    return back()->with('success', 'Your Photo and sign is not available.Kindly Update your profile');
                }
            } else{
                return back()->with('success', 'Your Photo and sign is not available.Kindly Update your profile');

            }
        }
    }
    // public function saveexamform(Request $request)
    // {
    //     $oddevensixsem = false;

    //     $mediumofans = $request->input('mediumofans');


    //     $currentexam = Exam::Where('status', '1')->get();


    //     $projectfee = 0; //for SYBBA CA
    //     $student = Auth::guard('student')->user();
    //     $course_id = $student->patternclass->coursepatternclasses->course_id;

    //     $backlogexternalcount = 0;
    //     $totalbacklogfee = 0;
    //     $totalcapfee = 0;
    //     $somfeedata = 0;
    //     $internalcount = 0;
    //     $binternalcount = 0;
    //     $student = Auth::guard('student')->user();
    //     $examsedate = null;
    //     $examsession = null;
    //     $examid = null;
    //     $sem = null;
    //     if (is_null($student->prn))
    //         $prn = NULL;
    //     else
    //         $prn = $student->prn;

    //     //$data2=$student->currentclassstudents()->last();
    //     $maxsem = 0;
    //     $maxsem = $student->currentclassstudents()->max('sem');
    //     $data2 = $student->currentclassstudents()->where('sem', $maxsem)->first();

    //     $current_class_inward_students = $student->currentclassstudents()->where('pfstatus', '!=', '-1')->where('markssheetprint_status', '!=', '-1');


    //     //dd($current_class_inward_students);
    //     if (is_null($data2)) { //first year sem-I
    //         $sem = 1;
    //         $examdata = $student->patternclass->exams()->where('launch_status', '1')->first(); //->get();
    //         $examid = $examdata->id;

    //         $examsession = $examdata->exam_sessions;
    //         $patternclass_id = $student->patternclass->id;
    //         $examsedate = ExamPatternclass::where('exam_id', $examid)->where('patternclass_id', $patternclass_id)->get()->first();
    //         //dd($examsedate);        
    //         $feedata = $student->patternclass->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
    //         $memberid = $student->memid; //123;

    //         $adsubjectdata = Admissiondata::where('memid', $memberid)
    //             ->where('patternclass_id', $patternclass_id)
    //             ->where('academicyear_id', $currentexam->first()->academicyear_id)
    //             ->get();

    //         if (!$adsubjectdata->isEmpty()) {
    //             $currentadmission = true;
    //         } else {
    //             $currentadmission = false;
    //         }
    //     } else {
    //         if (
    //             ($student->patternclass->coursepatternclasses->course->course_type == 'PG' and $data2->sem == 4)
    //             || ($student->patternclass->coursepatternclasses->course->course_type == 'UG' and $data2->sem == 6)
    //         ) {
    //             $currentadmission = false;
    //         } else {
    //             $memberid = $student->memid; //123;

    //             $adsubjectdata = Admissiondata::where('memid', $memberid)
    //                 ->where('patternclass_id', $data2->patternclass_id + 1)
    //                 ->where('academicyear_id', $currentexam->first()->academicyear_id)
    //                 ->get();

    //             if (!$adsubjectdata->isEmpty()) {
    //                 $currentadmission = true;
    //             } else {
    //                 $currentadmission = false;
    //             }
    //         }

    //         switch ($data2->sem) {
    //             case 1:
    //                 $sem = 2;
    //                 $examdata = $student->patternclass->exams()->where('launch_status', '1')->first(); //->get();
    //                 $examid = $examdata->id;
    //                 $pc = PatternClass::where('id', $data2->patternclass_id)->first();

    //                 $examsession = $examdata->exam_sessions;
    //                 $patternclass_id = $data2->patternclass->id;
    //                 $examsedate = ExamPatternclass::where('exam_id', $examid)->where('patternclass_id', $patternclass_id)->get()->first();

    //                 $feedata = $pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
    //                 //dd($feedata);
    //                 break;

    //             case 2:
    //                 $Sem1Data = $student->studentresults->where('sem', $data2->sem - 1)->last();
    //                 $Sem2Data = $student->studentresults->where('sem', $data2->sem)->last();
    //                 if (is_null($Sem1Data) && is_null($Sem2Data)) //direct to 2nd year admission
    //                 {
    //                     if ($data2->markssheetprint_status == -1) {

    //                         $sem = $data2->sem + 1;
    //                         $pc = PatternClass::where('id', $data2->patternclass_id + 1)->first();

    //                         $examdata = $pc->exams()->where('launch_status', '1')->first();
    //                         $examid = $examdata->id;
    //                         $examsession = $examdata->exam_sessions;

    //                         $patternclass_id = $pc->id;

    //                         $examsedate = ExamPatternclass::where('exam_id', $examid)->where('patternclass_id', $patternclass_id)->get()->first();
    //                         $backfeedata = Examfeecourse::where('patternclass_id', $data2->patternclass_id)->where('examfees_id', '13')->first();

    //                         $feedata = $pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
    //                     }
    //                 } else if (!(is_null($Sem1Data) && is_null($Sem2Data))) {
    //                     $this->yearresult = $student->getyearresult_examform($Sem1Data, $Sem2Data, $data2);

    //                     if ($this->yearresult == 0 || $currentadmission == false) //fail repeater student
    //                     {

    //                         $sem = $data2->sem;
    //                         $pc = PatternClass::where('id', $data2->patternclass_id)->first();

    //                         $examdata = $pc->exams()->where('launch_status', '1')->first();
    //                         $examid = $examdata->id;
    //                         $examsession = $examdata->exam_sessions;

    //                         $patternclass_id = $pc->id;

    //                         $examsedate = ExamPatternclass::where('exam_id', $examid)->where('patternclass_id', $patternclass_id)->get()->first();
    //                         $backfeedata = Examfeecourse::where('patternclass_id', $data2->patternclass_id)->where('examfees_id', '13')->first();

    //                         $feedata = $pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
    //                     } else //regular admitted student
    //                     {
    //                         $sem = $data2->sem + 1;
    //                         $pc = PatternClass::where('id', $data2->patternclass_id + 1)->first();

    //                         $examdata = $pc->exams()->where('launch_status', '1')->first();
    //                         $examid = $examdata->id;
    //                         $examsession = $examdata->exam_sessions;

    //                         $patternclass_id = $pc->id;

    //                         $examsedate = ExamPatternclass::where('exam_id', $examid)->where('patternclass_id', $patternclass_id)->get()->first();
    //                         $backfeedata = Examfeecourse::where('patternclass_id', $data2->patternclass_id)->where('examfees_id', '13')->first();

    //                         $feedata = $pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
    //                     }
    //                 }

    //                 break;
    //             case 3:
    //                 $sem = 4;
    //                 $examdata = $student->patternclass->exams()->where('launch_status', '1')->first(); //->get();
    //                 $examid = $examdata->id;
    //                 $pc = PatternClass::where('id', $data2->patternclass_id)->first();

    //                 $examsession = $examdata->exam_sessions;
    //                 $patternclass_id = $data2->patternclass->id;
    //                 $examsedate = ExamPatternclass::where('exam_id', $examid)->where('patternclass_id', $patternclass_id)->get()->first();

    //                 $feedata = $pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
    //                 //dd($feedata);
    //                 break;
    //             case 4: //dd($current_class_inward_students->count());
    //                 if ($current_class_inward_students->isEmpty()) {
    //                     //direct ty admission
    //                     $sem = $data2->sem + 1;
    //                     $pc = PatternClass::where('id', $data2->patternclass_id + 1)->first();
    //                     //dd($data2->patternclass_id);
    //                     $examdata = $pc->exams()->where('launch_status', '1')->first();
    //                     //dd($examdata);
    //                     $examid = $examdata->id;
    //                     $examsession = $examdata->exam_sessions;

    //                     $patternclass_id = $pc->id;
    //                     // dd($patternclass_id);
    //                     $examsedate = ExamPatternclass::where('exam_id', $examid)->where('patternclass_id', $patternclass_id)->get()->first();
    //                     $backfeedata = Examfeecourse::where('patternclass_id', $data2->patternclass_id)->where('examfees_id', '13')->first();
    //                     // dd($backfeedata);
    //                     $feedata = $pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
    //                 }
    //                 if ($current_class_inward_students->count() == 4) {
    //                     $Sem1Data = $student->studentresults->where('sem', 1)->last();
    //                     $Sem2Data = $student->studentresults->where('sem', 2)->last();

    //                     if (!(is_null($Sem1Data) && is_null($Sem2Data))) {
    //                         $this->yearresult = $student->getyearresult_examform($Sem1Data, $Sem2Data, $data2);

    //                         if ($this->yearresult != 1 || $currentadmission == false) //fail repeater student
    //                         {

    //                             $sem = $data2->sem;
    //                             $pc = PatternClass::where('id', $data2->patternclass_id)->first();

    //                             $examdata = $pc->exams()->where('launch_status', '1')->first();
    //                             // dd($examdata);
    //                             $examid = $examdata->id;
    //                             $examsession = $examdata->exam_sessions;

    //                             $patternclass_id = $pc->id;
    //                             // dd($patternclass_id);
    //                             $examsedate = ExamPatternclass::where('exam_id', $examid)->where('patternclass_id', $patternclass_id)->get()->first();
    //                             $backfeedata = Examfeecourse::where('patternclass_id', $data2->patternclass_id)->where('examfees_id', '13')->first();
    //                             // dd($backfeedata);
    //                             $feedata = $pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
    //                         } else {
    //                             $Sem3Data = $student->studentresults->where('sem', 3)->last();
    //                             $Sem4Data = $student->studentresults->where('sem', 4)->last();
    //                             if (!(is_null($Sem3Data) && is_null($Sem4Data))) {
    //                                 $this->yearresult = $student->getyearresult_examform($Sem3Data, $Sem4Data, $data2);

    //                                 if ($this->yearresult == 0 || $currentadmission == false) //fail repeater student
    //                                 {
    //                                     $sem = $data2->sem;
    //                                     $pc = PatternClass::where('id', $data2->patternclass_id)->first();

    //                                     $examdata = $pc->exams()->where('launch_status', '1')->first();
    //                                     // dd($examdata);
    //                                     $examid = $examdata->id;
    //                                     $examsession = $examdata->exam_sessions;

    //                                     $patternclass_id = $pc->id;
    //                                     // dd($patternclass_id);
    //                                     $examsedate = ExamPatternclass::where('exam_id', $examid)->where('patternclass_id', $patternclass_id)->get()->first();
    //                                     $backfeedata = Examfeecourse::where('patternclass_id', $data2->patternclass_id)->where('examfees_id', '13')->first();
    //                                     // dd($backfeedata);
    //                                     $feedata = $pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
    //                                 } else { //dd("PP");


    //                                     $pc = PatternClass::where('id', $data2->patternclass_id + 1)->first();
    //                                     //dd($data2->patternclass_id);
    //                                     $examdata = $pc->exams()->where('launch_status', '1')->first();
    //                                     //dd($examdata);
    //                                     $examid = $examdata->id;
    //                                     $examsession = $examdata->exam_sessions;

    //                                     $patternclass_id = $pc->id;
    //                                     // dd($patternclass_id);
    //                                     $examsedate = ExamPatternclass::where('exam_id', $examid)->where('patternclass_id', $patternclass_id)->get()->first();
    //                                     $backfeedata = Examfeecourse::where('patternclass_id', $data2->patternclass_id)->where('examfees_id', '13')->first();
    //                                     // dd($backfeedata);
    //                                     $feedata = $pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
    //                                     if ($examsession == 2) {
    //                                         $sem = 6;
    //                                         $oddevensixsem = true;
    //                                     } else {
    //                                         $sem = $data2->sem + 1;
    //                                     }
    //                                 }
    //                             }
    //                         }
    //                     }
    //                 } else if ($current_class_inward_students->count() == 2) {
    //                     $Sem1Data = $student->studentresults->where('sem', $data2->sem - 1)->last();
    //                     $Sem2Data = $student->studentresults->where('sem', $data2->sem)->last();
    //                     if (!(is_null($Sem1Data) && is_null($Sem2Data))) {
    //                         $this->yearresult = $student->getyearresult_examform($Sem1Data, $Sem2Data, $data2);

    //                         if ($this->yearresult == 0 || $currentadmission == false) //fail repeater student
    //                         {

    //                             $sem = $data2->sem;
    //                             $pc = PatternClass::where('id', $data2->patternclass_id)->first();

    //                             $examdata = $pc->exams()->where('launch_status', '1')->first();
    //                             // dd($examdata);
    //                             $examid = $examdata->id;
    //                             $examsession = $examdata->exam_sessions;

    //                             $patternclass_id = $pc->id;
    //                             // dd($patternclass_id);
    //                             $examsedate = ExamPatternclass::where('exam_id', $examid)->where('patternclass_id', $patternclass_id)->get()->first();
    //                             $backfeedata = Examfeecourse::where('patternclass_id', $data2->patternclass_id)->where('examfees_id', '13')->first();
    //                             // dd($backfeedata);
    //                             $feedata = $pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
    //                         } else //regular admitted student
    //                         {
    //                             $sem = $data2->sem + 1;

    //                             $pc = PatternClass::where('id', $data2->patternclass_id + 1)->first();

    //                             $examdata = $pc->exams()->where('launch_status', '1')->first();
    //                             // dd($examdata);
    //                             $examid = $examdata->id;
    //                             $examsession = $examdata->exam_sessions;

    //                             $patternclass_id = $pc->id;
    //                             // dd($patternclass_id);
    //                             $examsedate = ExamPatternclass::where('exam_id', $examid)->where('patternclass_id', $patternclass_id)->get()->first();
    //                             $backfeedata = Examfeecourse::where('patternclass_id', $data2->patternclass_id)->where('examfees_id', '13')->first();
    //                             // dd($backfeedata);
    //                             $feedata = $pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
    //                         }
    //                     }
    //                 }
    //                 break;
    //             case 5:
    //                 $sem = 6;
    //                 $oddevensixsem = true;
    //                 $examdata = $student->patternclass->exams()->where('launch_status', '1')->first(); //->get();
    //                 $examid = $examdata->id;
    //                 $pc = PatternClass::where('id', $data2->patternclass_id)->first();

    //                 $examsession = $examdata->exam_sessions;
    //                 $patternclass_id = $data2->patternclass->id;
    //                 $examsedate = ExamPatternclass::where('exam_id', $examid)->where('patternclass_id', $patternclass_id)->get()->first();

    //                 $feedata = $pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
    //                 //dd($feedata);
    //                 break;
    //             case 6:
    //                 $sem = 6;
    //                 $oddevensixsem = true;
    //                 $examdata = $student->patternclass->exams()->where('launch_status', '1')->first(); //->get();
    //                 $examid = $examdata->id;
    //                 $pc = PatternClass::where('id', $data2->patternclass_id)->first();

    //                 $examsession = $examdata->exam_sessions;
    //                 $patternclass_id = $data2->patternclass->id;
    //                 $examsedate = ExamPatternclass::where('exam_id', $examid)->where('patternclass_id', $patternclass_id)->get()->first();

    //                 $feedata = $pc->examfeecourses()->where('patternclass_id', $patternclass_id)->get();
    //             //dd($feedata);

    //         }
    //     }
    //     // dd($sem);
    //     $extracrd = $request->input('extracrd');
    //     // dd($extracrd);
    //     $totalextracredit = 0;

    //     if (
    //         ($student->patternclass->coursepatternclasses->course->course_type == 'PG' and $sem == 4)
    //         || ($student->patternclass->coursepatternclasses->course->course_type == 'UG' and $sem == 6)
    //     ) {
    //         $excrsubid = $student->intextracreditbatchseatnoallocations->where('grade', '!=', 'NA')->pluck('intbatch_id');

    //         $intbatch = $student->intextracreditbatchseatnoallocations->where('grade', '!=', 'NA');
    //         $allintbatch = Internalmarksextracreditbatch::whereIn('id', $intbatch->pluck('intbatch_id'))->get();
    //         $totalextracredit = Extracreditsubject::whereIn('id', $allintbatch->pluck('subject_id'))->sum('subject_credit');



    //         if (isset($extracrd)) {
    //             //  dd($request->input('extracrd'));

    //             $extracreditsub = Extracreditsubject::whereIn('id', $extracrd)->get();
    //             $totalextracredit += $extracreditsub->pluck('subject_credit')->sum();
    //         }
    //         if ($totalextracredit < 4)
    //             return redirect()->route('student.dashboard')->with('success', 'Please select extra credit subjects!!!!!!!');
    //     }

    //     $subbacklog = $request->input('subbacklog');
    //     $backsubcount = 0;

    //     if (isset($subbacklog)) {
    //         $backlogpatternclass = Subject::whereIn('id', $subbacklog)->distinct()->pluck('patternclass_id');

    //         $semflag1 = 0;
    //         $capfee = 0;
    //         $semarray = array();

    //         $count = null;

    //         foreach ($request->input('subbacklog') as $subject_id) {
    //             $subject = Subject::find($subject_id);


    //             $failstatus = $subject->checkstatus($student); { //internal
    //                 if ($failstatus == "G" || $failstatus == "IG" || $failstatus == "I" || $failstatus == "IP" || $failstatus == "IINTP" || $failstatus == "INTP" || $failstatus == "IE" || $failstatus == "IEG" || $failstatus == "IEINTP" || $failstatus == "EINTP") {
    //                     $internalcount++;
    //                     $binternalcount++;
    //                 }
    //             }
    //             //external
    //             if ($failstatus == "E" || $failstatus == "P" || $failstatus == "EG" || $failstatus == "EINTP" || $failstatus == "IE" || $failstatus == "EG" || $failstatus == "IP" || $failstatus == "IEINTP") {
    //                 $backlogexternalcount++; //total external backlog subject
    //                 //dd("LLLL");
    //                 $backsubfee = $subject->patternclass->exambacklogfeecourses->where('sem', $subject->subject_sem)->where('active_status', '1')->first()->backlogfee;
    //                 // dd("LL".$backsubfee);
    //                 $totalbacklogfee = $totalbacklogfee + $backsubfee;
    //                 $semarray[$subject->subject_sem] = $subject->subject_sem;
    //                 if ($subject->patternclass_id != $patternclass_id) {
    //                     $backsubcount++;
    //                 }
    //             } //practical

    //         }
    //         // dd($internalcount);
    //     }





    //     $intsub = $request->input('internal');

    //     if (isset($intsub))
    //         $internalcount = $internalcount + count($request->input('internal')); //internal
    //     $grade = $request->input('grade');
    //     if (isset($grade))
    //         $internalcount = $internalcount + count($request->input('grade')); //grade subject

    //     $extracrdsub = $request->input('extracrd');
    //     if (isset($extracrdsub))
    //         $internalcount = $internalcount + count($request->input('extracrd')); //extra credit subject

    //     if ($backlogexternalcount != 0) {
    //         $previous_patternclass_id = $data2->patternclass->id;
    //         $capfeedata = $data2->patternclass->examfeecourses()->where('patternclass_id', $previous_patternclass_id)->where('examfees_id', '3')->get('fee')->first();

    //         $totalcapfee = count($semarray) * $capfeedata->fee;

    //         if ($backlogpatternclass->count() != 0) {
    //             $somfeedata1 = $data2->patternclass->examfeecourses()->where('patternclass_id', $previous_patternclass_id)->where('examfees_id', '4')->get('fee')->first();

    //             $somfeedata = $somfeedata1->fee * ($backlogpatternclass->count());
    //         }

    //     }

    //     $subbacklog1 = $request->input('subbacklog1'); // in a year sem 1 exam not given,both sem subject is on sem 2 exam form

    //     if (isset($subbacklog1)) {

    //         $backsubfee = Exambacklogfeecourse::where('sem', $sem)->where('patternclass_id', $patternclass_id)->where('active_status', '1')->first()->backlogfee;

    //         $totalbacklogfee = $totalbacklogfee + $backsubfee * count($subbacklog1);

    //         $previous_patternclass_id = $patternclass_id;
    //         $capfeedata = Examfeecourse::where('patternclass_id', $previous_patternclass_id)->where('examfees_id', '3')->get('fee')->first();

    //         $totalcapfee = $totalcapfee + $capfeedata->fee;

    //     }
    //     $totalfee = 0;
    //     $examfees_id = collect();
    //     $fee_amount = collect();
    //     $currentdate = Carbon::now();

    //     // dd($feedata);
    //     foreach ($feedata as $fee) {


    //         if ($fee->examfeemaster->fee_type == "Internal Marks Fee") { //dd($student);
    //             //  dd();
    //             $amount = $fee->fee * $internalcount;
    //             if ($amount > 0)
    //                 $amount -= $student->studentextracreditexamforms->where('exam_id', '8')
    //                     ->whereIn('subject_id', $extracrdsub)->count() * $fee->fee;
    //         } else
    //             $amount = $fee->fee;

    //         if ($fee->examfeemaster->fee_type == "Exam Fee") {
    //             if (isset($intsub))
    //                 $amount = $fee->fee + $totalbacklogfee;
    //             else
    //                 $amount = $totalbacklogfee;
    //             //dd($amount);
    //         }
    //         if ($fee->examfeemaster->fee_type == "Project Fee/Dissertation") {
    //             $project = $request->input('project'); // in a year sem 1 exam not given,both sem subject is on sem 2 exam form
    //             if (isset($project))

    //                 $amount = $fee->fee;
    //             else
    //                 $amount = 0;
    //         }
    //         if ($fee->examfeemaster->fee_type == "Passing Certificate Fee") {  //dd($sem);
    //             if (
    //                 ($student->patternclass->coursepatternclasses->course->course_type == 'PG' && $sem == 4)
    //                 || ($student->patternclass->coursepatternclasses->course->course_type == 'UG' && $sem == 6)
    //             )
    //                 $amount = $fee->fee;
    //             else
    //                 $amount = 0;
    //         }
    //         if ($fee->examfeemaster->fee_type == "CAP Fee") {
    //             if ($patternclass_id == 54 and $sem == 4)//MCS 2 Sem 4
    //                 $amount = $totalcapfee;
    //             else if (isset($intsub))
    //                 $amount = $fee->fee + $totalcapfee;
    //             else
    //                 $amount = $totalcapfee;
    //             //  dd($somfeedata);
    //         }
    //         if ($fee->examfeemaster->fee_type == "Statement of Marks Fee") {
    //             $extracrd = $request->input('extracrd');
    //             if ($student->patternclass->coursepatternclasses->course->course_type == 'PG')
    //                 $amount = $fee->fee;
    //             else if (($somfeedata == 0) && (isset($intsub) || isset($extracrd)))//|| isset($subbacklog)|| isset($subbacklog1))
    //                 $amount = $fee->fee + $somfeedata;

    //         }

    //         if ($fee->examfeemaster->fee_type == "EVS Fee")// && $currentadmission==true)
    //         {
    //             $amount = $fee->fee;
    //         }

    //         if ($fee->examfeemaster->fee_type == "Late Fee")// and $fee->examfeemaster->fee_type!="Fine Fee")
    //         {

    //             if (isset($intsub)) {
    //                 if ($currentdate->gte($examsedate->end_date) and $currentdate->lte($examsedate->latefee_date))
    //                     $amount = $fee->fee;
    //                 else
    //                     $amount = 0;
    //             } else {    //fy repeater student late fee date  apply sy late fee date 
    //                 $epc = ExamPatternclass::where('patternclass_id', ($patternclass_id))->where('exam_id', $examid)->first();
    //                 //dd($epc);
    //                 if ($currentdate->gte($epc->end_date) and $currentdate->lte($epc->latefee_date)) {
    //                     $amount = $fee->fee;
    //                 } else
    //                     $amount = 0;
    //             }



    //         }
    //         if ($fee->examfeemaster->fee_type == "Fine Fee") // and $fee->examfeemaster->fee_type!="Late Fee")
    //         {
    //             if (isset($intsub)) {
    //                 if ($currentdate->gt($examsedate->latefee_date) and $currentdate->lte($examsedate->finefee_date))
    //                     $amount = $fee->fee;
    //                 else
    //                     $amount = 0;
    //             } else {    //fy repeater student late fee date  apply sy late fee date 
    //                 $epc = ExamPatternclass::where('patternclass_id', ($patternclass_id))->where('exam_id', $examid)->first();
    //                 //dd($epc);
    //                 if ($currentdate->gte($epc->latefee_date) and $currentdate->lte($epc->finefee_date)) {
    //                     $amount = $fee->fee;
    //                 } else
    //                     $amount = 0;
    //             }
    //         }
    //         if ($fee->examfeemaster->fee_type == "Backlog Subject Exam Fee")
    //             $amount = 0;

    //         $examfees_id->push($fee->examfeemaster->id);
    //         $fee_amount->push($amount);

    //         $totalfee = $totalfee + $amount;
    //     }

    //     $insertid = null;
    //     $valuesexam = array(
    //         'student_id' => $student->id,
    //         'patternclass_id' => $patternclass_id,
    //         'totalfee' => $totalfee,
    //         'exam_id' => $examid
    //     );
    //     try {
    //         $applicationform = $student->examformmaster()->create($valuesexam);
    //         $insertid = $applicationform->id;

    //     } catch (Exception $e) {
    //         //dd($e);
    //     }

    //     $i = 0;
    //     if (!is_null($insertid)) {
    //         foreach ($examfees_id as $examfee_id) {
    //             $values = array(
    //                 'examformmaster_id' => $insertid,
    //                 'examfees_id' => $examfee_id,
    //                 'fee_amount' => $fee_amount[$i]
    //             );


    //             $i++;
    //             Studentexamformfee::insert($values);
    //         }

    //         if (isset($subbacklog)) { // dd("PP");
    //             foreach ($request->input('subbacklog') as $subject_id) {
    //                 $subject = Subject::find($subject_id);
    //                 $failstatus = $subject->checkstatus($student);


    //                 //internal
    //                 if ($failstatus == "I") //||$failstatus=="IP"||$failstatus=="IE" || $failstatus=="IEP"
    //                 {
    //                     $values = array(
    //                         'prn' => $prn,
    //                         'subject_id' => $subject_id,
    //                         'int_status' => '1',
    //                         'ext_status' => '0',
    //                         'exam_id' => $examid,
    //                         'examformmaster_id' => $insertid
    //                     );
    //                 }

    //                 if ($failstatus == "E") //||$failstatus=="IP"||$failstatus=="IE" || $failstatus=="IEP"
    //                 {
    //                     $values = array(
    //                         'prn' => $prn,
    //                         'subject_id' => $subject_id,
    //                         'int_status' => '0',
    //                         'ext_status' => '1',
    //                         'exam_id' => $examid,
    //                         'examformmaster_id' => $insertid
    //                     );
    //                 }
    //                 if ($failstatus == "IE" or $failstatus == "IP" or $failstatus == "IJ") {

    //                     $int_status = 1;


    //                     $values = array(
    //                         'prn' => $prn,
    //                         'subject_id' => $subject_id,
    //                         'int_status' => $int_status,
    //                         'ext_status' => '1',
    //                         'exam_id' => $examid,
    //                         'examformmaster_id' => $insertid
    //                     );

    //                 }
    //                 if ($failstatus == "EINTP") {

    //                     $int_practical_status = 1;


    //                     $values = array(
    //                         'prn' => $prn,
    //                         'subject_id' => $subject_id,
    //                         'int_practical_status' => $int_practical_status,
    //                         'ext_status' => '1',
    //                         'exam_id' => $examid,
    //                         'examformmaster_id' => $insertid
    //                     );


    //                 }
    //                 if ($failstatus == "IEINTP") {

    //                     $int_status = 1;
    //                     $int_practical_status = 1;

    //                     $values = array(
    //                         'prn' => $prn,
    //                         'subject_id' => $subject_id,
    //                         'int_status' => $int_status,
    //                         'int_practical_status' => $int_practical_status,
    //                         'ext_status' => '1',
    //                         'exam_id' => $examid,
    //                         'examformmaster_id' => $insertid
    //                     );

    //                 }
    //                 if ($failstatus == "IINTP") {


    //                     $int_status = 1;
    //                     $int_practical_status = 1;


    //                     $values = array(
    //                         'prn' => $prn,
    //                         'subject_id' => $subject_id,
    //                         'int_status' => $int_status,
    //                         'int_practical_status' => $int_practical_status,
    //                         'ext_status' => '0',
    //                         'exam_id' => $examid,
    //                         'examformmaster_id' => $insertid
    //                     );

    //                 }
    //                 if ($failstatus == "INTP") {

    //                     $int_practical_status = 1;


    //                     $values = array(
    //                         'prn' => $prn,
    //                         'subject_id' => $subject_id,
    //                         'int_practical_status' => $int_practical_status,
    //                         'exam_id' => $examid,
    //                         'examformmaster_id' => $insertid
    //                     );

    //                 }
    //                 if ($failstatus == "G" or $failstatus == "IG") {

    //                     $grade_status = 1;

    //                     $values = array(
    //                         'prn' => $prn,
    //                         'subject_id' => $subject_id,
    //                         'int_status' => '0',
    //                         'ext_status' => '0',
    //                         'grade_status' => $grade_status,
    //                         'exam_id' => $examid,
    //                         'examformmaster_id' => $insertid
    //                     );

    //                 }
    //                 if ($failstatus == "IEG") {

    //                     $int_status = 1;

    //                     $values = array(
    //                         'prn' => $prn,
    //                         'subject_id' => $subject_id,
    //                         'int_status' => '1',
    //                         'ext_status' => '1',
    //                         'exam_id' => $examid,
    //                         'examformmaster_id' => $insertid
    //                     );

    //                 }
    //                 if ($failstatus == "EG") {

    //                     $int_status = 0;

    //                     $values = array(
    //                         'prn' => $prn,
    //                         'subject_id' => $subject_id,
    //                         'int_status' => $int_status,
    //                         'ext_status' => '1',
    //                         'exam_id' => $examid,
    //                         'examformmaster_id' => $insertid
    //                     );

    //                 }
    //                 if ($failstatus == "P") //practical backlog UG logic
    //                 {
    //                     $values = array(
    //                         'prn' => $prn,
    //                         'subject_id' => $subject_id,
    //                         'int_status' => '0',
    //                         'ext_status' => '1',
    //                         'project_status' => '0',
    //                         'exam_id' => $examid,
    //                         'examformmaster_id' => $insertid
    //                     );


    //                 }

    //                 if ($failstatus == "O") //for Oral
    //                 {
    //                     $values = array(
    //                         'prn' => $prn,
    //                         'subject_id' => $subject_id,
    //                         'int_status' => '0',
    //                         'ext_status' => '0',
    //                         'oral_status' => '1',
    //                         'exam_id' => $examid,
    //                         'examformmaster_id' => $insertid
    //                     );

    //                     // StudentExamform::insert($values);
    //                 }

    //                 $student->studentexamform()->create($values);




    //             }
    //         }
    //         //dd($subbacklog1);
    //         if (isset($subbacklog1)) {

    //             foreach ($subbacklog1 as $subject_id) {

    //                 $subject_type = $request->input($subject_id);

    //                 if ($subject_type == "IE" or $subject_type == "IP") {
    //                     $values = array(
    //                         'prn' => $prn,
    //                         'subject_id' => $subject_id,
    //                         'int_status' => '0',
    //                         'ext_status' => '1',
    //                         'exam_id' => $examid,
    //                         'examformmaster_id' => $insertid
    //                     );


    //                 } else if ($subject_type == "IEP") {
    //                     $values = array(
    //                         'prn' => $prn,
    //                         'subject_id' => $subject_id,
    //                         'int_status' => '0',
    //                         'int_practical_status' => '0',
    //                         'ext_status' => '1',
    //                         'exam_id' => $examid,
    //                         'examformmaster_id' => $insertid
    //                     );

    //                 } else if ($subject_type == "P") //for MCOM project
    //                 {
    //                     $values = array(
    //                         'prn' => $prn,
    //                         'subject_id' => $subject_id,
    //                         'int_status' => '0',
    //                         'ext_status' => '0',
    //                         'project_status' => '1',
    //                         'exam_id' => $examid,
    //                         'examformmaster_id' => $insertid
    //                     );


    //                 } else if ($subject_type == "O") //for Oral
    //                 {
    //                     $values = array(
    //                         'prn' => $prn,
    //                         'subject_id' => $subject_id,
    //                         'int_status' => '0',
    //                         'ext_status' => '0',
    //                         'oral_status' => '1',
    //                         'exam_id' => $examid,
    //                         'examformmaster_id' => $insertid
    //                     );


    //                 }
    //                 //  dd($values);
    //                 $student->studentexamform()->create($values);
    //             }  //foreach
    //         } //if


    //         if (isset($intsub)) {

    //             foreach ($intsub as $subject_id) {

    //                 $subject_type = $request->input($subject_id);
    //                 if ($subject_type == "I") {
    //                     $values = array(
    //                         'prn' => $prn,
    //                         'subject_id' => $subject_id,
    //                         'int_status' => '1',
    //                         'ext_status' => '0',
    //                         'exam_id' => $examid,
    //                         'examformmaster_id' => $insertid
    //                     );


    //                 } else if ($subject_type == "IE" or $subject_type == "IP" or $subject_type == "IEG") {
    //                     $values = array(
    //                         'prn' => $prn,
    //                         'subject_id' => $subject_id,
    //                         'int_status' => '1',
    //                         'ext_status' => '1',
    //                         'exam_id' => $examid,
    //                         'examformmaster_id' => $insertid
    //                     );


    //                 } else if ($subject_type == "IEP") {
    //                     $values = array(
    //                         'prn' => $prn,
    //                         'subject_id' => $subject_id,
    //                         'int_status' => '1',
    //                         'int_practical_status' => '1',
    //                         'ext_status' => '1',
    //                         'exam_id' => $examid,
    //                         'examformmaster_id' => $insertid
    //                     );

    //                 } else if ($subject_type == "G" || $subject_type == "IG") {
    //                     $values = array(
    //                         'prn' => $prn,
    //                         'subject_id' => $subject_id,
    //                         'int_status' => '0',
    //                         'ext_status' => '0',
    //                         'grade_status' => '1',
    //                         'exam_id' => $examid,
    //                         'examformmaster_id' => $insertid
    //                     );


    //                 } else if ($subject_type == "IEG") {
    //                     $int_status = 1;
    //                     $values = array(
    //                         'prn' => $prn,
    //                         'subject_id' => $subject_id,
    //                         'int_status' => '1',
    //                         'ext_status' => '1',
    //                         'exam_id' => $examid,
    //                         'examformmaster_id' => $insertid
    //                     );

    //                 } else if ($subject_type == "O") //for Oral
    //                 {
    //                     $values = array(
    //                         'prn' => $prn,
    //                         'subject_id' => $subject_id,
    //                         'int_status' => '0',
    //                         'ext_status' => '0',
    //                         'oral_status' => '1',
    //                         'exam_id' => $examid,
    //                         'examformmaster_id' => $insertid
    //                     );

    //                     // StudentExamform::insert($values);
    //                 }
    //                 //  dd($values);
    //                 $student->studentexamform()->create($values);
    //             }  //foreach
    //         } //if
    //         $grade = $request->input('grade');
    //         if (isset($grade)) { //dd($extracrd);
    //             foreach ($request->input('grade') as $subject_id) {

    //                 $values = array(
    //                     'prn' => $prn,
    //                     'subject_id' => $subject_id,
    //                     'int_status' => '0',
    //                     'ext_status' => '0',
    //                     'grade_status' => '1',
    //                     'exam_id' => $examid,
    //                     'examformmaster_id' => $insertid
    //                 );
    //                 $student->studentexamform()->create($values);
    //             }
    //         }
    //         $extracrd = $request->input('extracrd');

    //         if (isset($extracrd)) { //dd($extracrd);
    //             foreach ($request->input('extracrd') as $subject_id) {
    //                 $values = array(
    //                     'prn' => $prn,
    //                     'subject_id' => $subject_id,
    //                     'select_status' => '1',
    //                     'exam_id' => $examid,
    //                     'course_id' => $course_id,
    //                     'examformmaster_id' => $insertid
    //                 );

    //                 $student->studentextracreditexamforms()->create($values);
    //             }  //foreach
    //         } //
    //     }
    //     $data = $student->examformmaster->last();

    //     $student->patternclassstudent()->upsert(['medium_instruction' => $mediumofans, 'student_id' => $student->id, 'patternclass_id' => $patternclass_id], ['student_id', 'patternclass_id']);


    //     return view("student.examformfee", compact('data', 'patternclass_id', 'internalcount'));

    // }
    // public function saveexamformfee(Request $request)
    // {
    //     return redirect()->route('student.dashboard')->with('success', 'Exam Form fill successfully');
    // }
    // public function printexamform()
    // {
    //     ini_set('max_execution_time', 3000);
    //     ini_set('memory_limit', '2048M');
    //     $currentexam = Exam::Where('status', '1')->get();
    //     $student = Auth::guard('student')->user();
    //     $values = array('printstatus' => '1');
    //     $eform = $student->examformmaster->where('exam_id', $currentexam->first()->id)->first();

    //     $eform->update($values);

    //     $data = $student->examformmaster->where('exam_id', $currentexam->first()->id)->first();
    //     $pdf = PDF::loadView('student.printexamform', compact('data', ))->setPaper('a4', 'portrait');
    //     $pdf->output();
    //     $canvas = $pdf->getDomPDF()->getCanvas();
    //     $height = $canvas->get_height();
    //     $canvas->page_text(10, 10, "Report Page: {PAGE_NUM} of {PAGE_COUNT}", null, 12, array(0, 0, 0));


    //     $pdf = PDF::loadView('student.printexamform', compact('data', ))->setPaper('a4', 'portrait');
    //     $pdf->output();
    //     $canvas = $pdf->getDomPDF()->getCanvas();
    //     $height = $canvas->get_height();
    //     $canvas->page_text(10, 10, "Report Page: {PAGE_NUM} of {PAGE_COUNT}", null, 12, array(0, 0, 0));

    //     $pdf = PDF::loadView('student.printexamform', compact('data', ))->setOptions(['images' => true, 'defaultFont' => 'sans-serif']);




    //     return $pdf->stream('examformfinal.pdf');
    // }
    // public function deleteexamform($id)
    // {
    //     $student = Auth::guard('student')->user();
    //     $exam = Exam::where('status', '1')->get();
    //     $currentprintstatus = $student->examformmaster
    //         ->where('exam_id', $exam->first()->id)->first()
    //         ->printstatus;


    //     if ($currentprintstatus == 1) {

    //         return back()->with('success', 'Can not  Delete !!!!! Your Exam form has already printed');
    //     } else {
    //         $data = Examformmaster::where('student_id', $id)->where('printstatus', '0')->first();

    //         $data->studentexamform()->delete();
    //         $data->studentexamformfee()->delete();
    //         $data->studentextracreditexamform()->delete();
    //         $data->delete();
    //         return back()->with('success', 'Exam Form Deleted Successfully !!!!!');
    //     }
    // }

    // public function downloadreceipt(Request $request)
    // {

    //     $student = Auth::guard('student')->user(); {
    //         $exam = Exam::where('status', '1')->get();
    //         $pendingfee = Pendigfees::where('memid', $student->memid)
    //             ->where('feepaidstatus', '1')
    //             ->get();

    //         $pendingstudfee = $pendingfee->sum('actual_fee') - $pendingfee->sum('paid_fee');
    //         if ($pendingfee->sum('actual_fee') > $pendingfee->sum('paid_fee'))
    //             return back()->with('success', "Please Contact to Accounts Department for your Pending Fee is Rs- " . $pendingstudfee);
    //         ini_set('max_execution_time', 3000);
    //         ini_set('memory_limit', '2048M');
    //         $examseatno = $student->examstudentseatno->last();
    //         $hallticketdata = collect();
    //         foreach ($examseatno->student->studentexamform->where('exam_id', $exam->first()->id)->sortBy('subject_id') as $examform) {
    //             if (
    //                 $examform->subject->id == 1052 || $examform->subject->id == 969 ||
    //                 $examform->subject->id == 979 || $examform->subject->id == 989
    //             ) {
    //                 $hallticketdata->add([
    //                     'subject_sem' => $examform->subject->subject_sem,
    //                     'subject_code' => $examform->subject->subject_code,
    //                     'subject_name' => $examform->subject->subject_name,
    //                     'subject_type' => $examform->subject->subject_type,
    //                     'int_status' => $examform->int_status,
    //                     'int_practical_status' => $examform->int_practical_status,
    //                     'ext_status' => $examform->ext_status,
    //                     'examdate' => null,
    //                     'timeslot' => '@Department'
    //                 ]);
    //             } else {
    //                 $hallticketdata->add([
    //                     'subject_sem' => $examform->subject->subject_sem,
    //                     'subject_code' => $examform->subject->subject_code,
    //                     'subject_name' => $examform->subject->subject_name,
    //                     'subject_type' => $examform->subject->subject_type,
    //                     'int_status' => $examform->int_status,
    //                     'int_practical_status' => $examform->int_practical_status,
    //                     'ext_status' => $examform->ext_status,
    //                     'examdate' => is_null($examform->subject->exam_timetables->last()) ? '-' : $examform->subject->exam_timetables->last()->examdate,
    //                     'timeslot' => is_null($examform->subject->exam_timetables->last()) ? '-' : $examform->subject->exam_timetables->last()->timetableslots->timeslot
    //                 ]);
    //             }
    //         }
    //         $sortdata = $hallticketdata->sortBy([
    //             ['examdate', 'asc'],
    //             ['timeslot', 'asc'],
    //         ]);
    //         $hallticketextracreditdata = collect();
    //         foreach ($examseatno->student->studentextracreditexamforms->where('exam_id', $exam->first()->id)->sortBy('subject_id') as $examform) {
    //             $hallticketextracreditdata->add([
    //                 'subject_sem' => $examform->subject->subject_sem,
    //                 'subject_code' => $examform->subject->subject_code,
    //                 'subject_name' => $examform->subject->subject_name,
    //                 'subject_type' => $examform->subject->subject_type

    //             ]);
    //         }
    //         $sortextracreditdata = $hallticketextracreditdata->sortBy([
    //             ['examdate', 'asc'],
    //             ['timeslot', 'asc'],
    //         ]);


    //         $pdf = PDF::loadView('student.studentreceipt', compact('examseatno', 'exam', 'sortdata', 'sortextracreditdata'))->setPaper('a4', 'portrait');
    //         $pdf->output();
    //         $canvas = $pdf->getDomPDF()->getCanvas();
    //         $height = $canvas->get_height();

    //         $canvas->page_text(10, 10, "Report Page: {PAGE_NUM} of {PAGE_COUNT}", null, 12, array(0, 0, 0));

    //         $examformmaster = $student->examformmaster->where('exam_id', $exam->first()->id)->first();
    //         $examformmaster->update(['hallticketstatus' => '1']);

    //         return $pdf->download("hallticket" . $examseatno->seatno . '.pdf');
    //     }
    //     //  else  return back()->with('success','ABC-ID does not match.Contact to exam department....');

    // }
    // public function printresult()
    // {
    //     $student = Auth::guard('student')->user();
    //     //dd($student);
    //     $exam = Exam::where('id', '11')->get();
    //     $pendingfee = Pendigfees::where('memid', $student->memid)
    //         ->where('feepaidstatus', '1')
    //         ->get();
    //     $pendingstudfee = $pendingfee->sum('actual_fee') - $pendingfee->sum('paid_fee');
    //     if ($pendingfee->sum('actual_fee') > $pendingfee->sum('paid_fee'))
    //         return back()->with('success', "Please Contact to Accounts Department for your Pending Fee is Rs- " . $pendingstudfee);
    //     ini_set('max_execution_time', 3000);
    //     ini_set('memory_limit', '2048M');
    //     $d = $student->examstudentseatno->last();

    //     $d->update(array("printstatus" => "5"));
    //     //if($d->exam_patternclasses_id<100)
    //     {
    //         $currentexam = $d->exampatternclasses->exam; //->get();//Exam::Where('status', '1')->get();
    //         //  dd($currentexam->id);
    //         $course_type = $student->patternclass->getclass->course->course_type;

    //         if ($course_type == "PG")
    //             view()->share('result.resultondashboardPG', $d); //for PG new format used in march 2022(July 2022) sem -II exam rule 
    //         //rule =>passing on total marks circular
    //         if ($course_type == "UG")
    //             view()->share('result.resultondashboard', $d); //for UG new format used in march 2022(July 2022) sem -II exam rule 

    //         if ($course_type == "PG")
    //             $pdf = PDF::loadView('result.resultondashboardPG', compact('d'), compact('currentexam'))->setOptions(['defaultFont' => 'sans-serif']);
    //         if ($course_type == "UG")
    //             $pdf = PDF::loadView('result.resultondashboard', compact('d'), compact('currentexam'))->setOptions(['defaultFont' => 'sans-serif']);




    //         $canvas = $pdf->getDomPDF()->getCanvas();

    //         $canvas->page_text(10, 10, "Report Page: {PAGE_NUM} of {PAGE_COUNT}", $pdf->getFontMetrics()->getFont('serif', 'normal'), 12, array(0, 0, 0));

    //         if ($d->count() > 0) {

    //             $filename = $d->seatno . '_marksheet' . '.pdf';
    //         } else
    //             $filename = "Emptymarksheet.pdf";


    //         return $pdf->stream($filename);
    //     }
    // }
    // public function apply_photocopy(Request $request)
    // {
    //     $currentexam = Exam::where('status', '1')->first();
    //     $student = Auth::guard('student')->user();

    //     if ($request->input('photocopy') == "Apply for Photocopy") {
    //         $studentmarks = Studentmark::where('student_id', $student->id)
    //             ->where('exam_id', $currentexam->id)
    //             ->whereHas('subject', function ($query) {

    //                 $query->whereIn('subject_type', ['IE', 'IEP']);
    //             })->get();


    //         return view("student.photocopyform", compact('student', 'studentmarks', 'currentexam'));
    //     } else if ($request->input('photocopy') == "Print Photocopy Form") {
    //         $examformmaster = Examformmaster::where('student_id', $student->id)
    //             ->where('exam_id', $currentexam->id)
    //             ->where('inwardstatus', '1')->get()->last();


    //         $data = Photocopyexammaster::where('student_id', $examformmaster->student_id)
    //             ->where('patternclass_id', $examformmaster->patternclass_id)
    //             ->where('exam_id', $examformmaster->exam_id)
    //             ->get()->first();

    //         $values = array('printstatus' => '1');
    //         $data->update($values);
    //         $pdf = PDF::loadView('student.printphotocopyform', compact('data', 'currentexam'))->setOptions(['images' => true, 'defaultFont' => 'sans-serif']);
    //         $pdf->setPaper('L');
    //         $pdf->output();
    //         $canvas = $pdf->getDomPDF()->getCanvas();
    //         $height = $canvas->get_height();
    //         $width = $canvas->get_width();
    //         $canvas->set_opacity(.2, "Multiply");

    //         return $pdf->stream('photocopyform.pdf');
    //     } else if ($request->input('photocopy') == "Delete Photocopy Form") {
    //         $examformmaster = Examformmaster::where('student_id', $student->id)
    //             ->where('exam_id', $currentexam->id)
    //             ->where('inwardstatus', '1')->get()->last();

    //         $data = Photocopyexammaster::where('student_id', $examformmaster->student_id)
    //             ->where('patternclass_id', $examformmaster->patternclass_id)
    //             ->where('exam_id', $examformmaster->exam_id)
    //             ->where('printstatus', '0')->get()->first();

    //         if ($data) {
    //             $data->photocopyexamsubjects()->delete();
    //             $data->delete();

    //             return back()->with('success', 'Photocopy Form Deleted Successfully !!!!!');

    //         } else {
    //             return back()->with('success', 'Photocopy Form is not Deleted !!!!!');

    //         }

    //     }

    // }
    // //apply_revaluation
    // public function apply_revaluation(Request $request)
    // {
    //     $currentexam = Exam::where('status', '1')->first();
    //     $student = Auth::guard('student')->user();

    //     if ($request->input('revaluation') == "Apply for Revaluation") {
    //         $data = Photocopyexammaster::where('student_id', $student->id)

    //             ->where('exam_id', $currentexam->id)
    //             ->where('inwardstatus', '1')
    //             ->get()->first();
    //         $studsubject = $data->photocopyexamsubjects->pluck('subject_id');
    //         $studentmarks = Studentmark::where('student_id', $student->id)
    //             ->where('exam_id', $currentexam->id)
    //             ->whereIn('subject_id', $studsubject)->get();

    //         return view("student.revalform", compact('student', 'data', 'currentexam', 'studentmarks'));
    //     } else if ($request->input('revaluation') == "Print Revaluation Form") {

    //         $data = Photocopyexammaster::where('student_id', $student->id)

    //             ->where('exam_id', $currentexam->id)
    //             ->get()->first();
    //         //dd($data);
    //         $values = array('printstatus' => '2');
    //         $data->update($values);
    //         $pdf = PDF::loadView('student.printrevalform', compact('data', 'currentexam'))->setOptions(['images' => true, 'defaultFont' => 'sans-serif']);
    //         $pdf->setPaper('L');
    //         $pdf->output();
    //         $canvas = $pdf->getDomPDF()->getCanvas();
    //         $height = $canvas->get_height();
    //         $width = $canvas->get_width();
    //         $canvas->set_opacity(.2, "Multiply");

    //         return $pdf->stream('revaluationform.pdf');
    //     } else if ($request->input('revaluation') == "Delete Revaluation Form") {
    //         $examformmaster = Examformmaster::where('student_id', $student->id)
    //             ->where('exam_id', $currentexam->id)
    //             ->where('inwardstatus', '2')->get()->last();

    //         //if($examformmaster)
    //         //{
    //         $data = Photocopyexammaster::where('student_id', $student->id)
    //             ->where('exam_id', $currentexam->id)
    //             ->where('printstatus', '1')->get()->first();
    //         //dd($data);
    //         if ($data) {
    //             $photocopysubject = $data->photocopyexamsubjects;
    //             $data->update([
    //                 'printstatus' => '1',
    //                 'revalformfee' => '0',
    //                 'revalpersubjectrate' => '0',
    //                 'revaltotalfee' => '0',

    //             ]);

    //             $photocopysubject->toQuery()->update(['revalsubjectstatus' => '0']);

    //             //dd("delete");
    //             return back()->with('success', 'Revaluation Form Deleted Successfully !!!!!');
    //         } else {
    //             return back()->with('success', 'Revaluation Form is not Deleted !!!!!');
    //         }
    //     }
    // }

}
