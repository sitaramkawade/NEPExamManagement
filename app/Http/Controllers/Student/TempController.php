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
    
    public Student $student;
    public $member_id;
    public $year_result = null;


    public $medium_instruction;



}
