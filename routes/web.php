<?php

use App\Livewire\RND;
use Livewire\Livewire;
use App\Livewire\Index;
use App\Livewire\HomeIndex;
use App\Livewire\User\Cap\AllCap;
use App\Livewire\User\Cgpa\AllCgpa;
use App\Livewire\User\Exam\AllExam;
use App\Livewire\User\User\AllUser;
use App\Livewire\User\Home\UserHome;
use App\Livewire\User\UserDashboard;
use App\Livewire\User\Block\AllBlock;
use Illuminate\Support\Facades\Route;
use App\Livewire\User\Grade\AllGrades;
use App\Livewire\User\Course\AllCourse;
use App\Livewire\User\Credit\AllCredit;
use App\Livewire\User\Notice\AllNotice;
use App\Http\Controllers\AuthController;
use App\Livewire\User\College\AllCollege;
use App\Livewire\User\ExamFee\AllExamFee;
use App\Livewire\User\Pattern\AllPattern;
use App\Livewire\User\Sanstha\AllSanstha;
use App\Http\Controllers\GoogleController;
use App\Livewire\Faculty\FacultyDashboard;
use App\Livewire\Faculty\Home\FacultyHome;
use App\Livewire\Student\Home\StudentHome;
use App\Livewire\Student\StudentDashboard;
use App\Livewire\User\Faculty\UserFaculty;
use App\Livewire\Student\Helpline\Helpline;
use App\Livewire\User\Building\AllBuilding;
use App\Livewire\User\ExamForm\AllExamForm;
use App\Livewire\User\Helpline\AllHelpline;
use App\Livewire\User\PaperSet\AllPaperSet;
use App\Livewire\User\Ratehead\AllRateHead;
use App\Livewire\Faculty\Faculty\AllFaculty;
use App\Livewire\Faculty\Subject\AllSubject;
use App\Livewire\Student\StudentViewProfile;
use App\Livewire\User\ClassYear\AllClassYear;
use App\Livewire\User\ExamOrder\AllExamOrder;
use App\Livewire\User\ExamPanel\AllExamPanel;
use App\Livewire\User\Programme\AllProgramme;
use App\Livewire\User\ExamForm\InwardExamForm;
use App\Livewire\User\ExamForm\ModifyExamForm;
use App\Http\Controllers\GoogleDriveController;
use App\Livewire\Faculty\FileUpload\FileUpload;
use App\Livewire\User\Department\AllDepartment;
use App\Livewire\User\University\AllUniversity;
use App\Http\Controllers\ExamOrderPdfController;
use App\Livewire\Faculty\ExamPanel\ViewExamPanel;
use App\Livewire\User\CourseClass\AllCourseClass;
use App\Livewire\User\AcademicYear\AllAcademicYear;
use App\Livewire\User\ExamBuilding\AllExamBuilding;
use App\Livewire\User\PatternClass\AllPatternClass;
use App\Livewire\Faculty\FacultyHead\AllFacultyHead;
use App\Livewire\Faculty\Facultyrole\AllFacultyRole;
use App\Livewire\Faculty\SubjectType\AllSubjectType;
use App\Livewire\Faculty\UpdateProfile\UpdateProfile;
use App\Livewire\User\AdmissionData\AllAdmissionData;
use App\Livewire\User\ExamFeeCourse\AllExamFeeCourse;
use App\Livewire\User\ExamOrderPost\AllExamOrderPost;
use App\Livewire\User\ExamTimeTable\AllExamTimeTable;
use App\Livewire\User\HelplineQuery\AllHelplineQuery;
use App\Livewire\User\TimeTableSlot\AllTimeTableSlot;
use App\Livewire\User\DepartmentType\AllDepartmentType;
use App\Livewire\Faculty\AssignSubject\AllAssignSubject;
use App\Livewire\Faculty\SubjectBucket\AllSubjectBucket;
use App\Livewire\User\FacultyOrder\GenerateFacultyOrder;
use App\Livewire\User\SubjectOrder\GenerateSubjectOrder;
use App\Livewire\Student\Profile\MultiStepStudentProfile;
use App\Livewire\User\BoardUniversity\AllBoardUniversity;
use App\Livewire\User\ExamTimeTable\SubjectExamTimeTable;
use App\Livewire\User\PaperSubmission\AllPaperSubmission;
use App\Livewire\User\ExamForm\DeleteExamFormBeforeInward;
use App\Livewire\User\GenerateExamOrder\GenerateExamOrder;
use App\Livewire\User\ExamPatternClass\AllExamPatternClass;
use App\Livewire\User\HelplineDocument\AllHelplineDocument;
use App\Livewire\Faculty\FacultyRoleType\AllFacultyRoleType;
use App\Livewire\Faculty\SubjectCategory\AllSubjectCategory;
use App\Livewire\Faculty\SubjectVertical\AllSubjectVertical;
use App\Livewire\User\ExamFormStatistics\ExamFormReportView;
use App\Livewire\User\ExamFormStatistics\ExamFormStatistics;
use App\Http\Controllers\Student\Razorpay\RazorPayController;
use App\Livewire\Student\StudentExamForm\FillStudentExamForm;
use App\Livewire\User\EducationalCourse\AllEducationalCourse;
use App\Livewire\User\HodAppointSubject\AllHodAppointSubject;
use App\Livewire\Faculty\DepartmentPrefix\AllDepartmentPrefix;
use App\Livewire\Student\StudentExamForm\DeleteStudentExamForm;
use App\Livewire\Faculty\InternalAudit\AssignTool\AllAssignTool;
use App\Livewire\Student\StudentExamForm\FillStudentExamFormNew;
use App\Livewire\Faculty\InternalAudit\InternalTool\AllInternalTool;
use App\Livewire\Faculty\InternalToolAuditor\AllInternalToolAuditor;
use App\Livewire\Faculty\InternalAudit\HodAssignTool\AllHodAssignTool;
use App\Livewire\Faculty\InternalAudit\UploadDocument\AllUploadDocument;
use App\Http\Controllers\User\ExamFormStatistics\ExamFormReportViewController;
use App\Http\Controllers\Student\StudentExamForm\PrintStudentExamFormController;
use App\Livewire\Faculty\InternalAudit\InternalToolDocument\AllInternalToolDocument;
use App\Http\Controllers\Student\StudentExamForm\PrintPreviewStudentExamFormController;

// Livewire Update Route
Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/livewire/update', $handle);
});

// Livewire JS Route
Livewire::setScriptRoute(function ($handle) {
    return Route::get('/livewire/livewire.js', $handle);
});

// Guest Routes
Route::middleware(['guest'])->group(function () {

  // Guest Home
  Route::get('/',HomeIndex::class)->name('home');

  // Student Home
  Route::get('/student',StudentHome::class)->name('student');

  // User Home
  Route::get('/user',UserHome::class)->name('user');

  // Faculty Home
  Route::get('/faculty',FacultyHome::class)->name('faculty');

  // RND
  Route::get('/rnd', RND::class);


  Route::get('/upload/drive', [GoogleDriveController::class, 'uploadFile'])->name('upload-to-drive');

  Route::get('/login/google', [AuthController::class,'redirectToGoogleProvider']);
  Route::get('/login/google/callback', [AuthController::class,'handleProviderGoogleCallback']);
  Route::get('/gogle/home',  [AuthController::class,'index'])->name('google_home');
  Route::get('/notice', [GoogleController::class,'handleNotice']);

});

// Auth Student Routes
Route::prefix('student')->name('student.')->middleware(['auth:student','is_student','verified:student.verification.notice'])->group(function () {

  // Student Dashboard
  Route::get('/dashboard',StudentDashboard::class)->name('dashboard');

  // Student Profile
  Route::get('/profile',MultiStepStudentProfile::class)->name('profile');

  // Student View Profile
  Route::get('/view/profile',StudentViewProfile::class)->name('view-profile');

  // Student Helpline
  Route::get('/helpline',Helpline::class)->name('helpline');

  // Student Exam Form
  Route::post('/exam/form',FillStudentExamForm::class)->name('student_exam_form');

  // Student Delete Exam Form
  Route::post('/delete/exam/form',DeleteStudentExamForm::class)->name('student_delete_exam_form');

  // Student Print Preview Exam Form
  Route::post('/print/preview/exam/form', [PrintStudentExamFormController::class,'print_preview_exam_form'])->name('student_print_preview_exam_form');

  // Student Print Final Exam Form
  Route::post('/print/final/exam/form', [PrintStudentExamFormController::class,'print_final_exam_form'])->name('student_print_final_exam_form');

  // Student Pay Exam Form Fee
  Route::post('/pay/exam/form/fee/{examformmaster}', [RazorPayController::class,'student_pay_exam_form_fee'])->name('student_pay_exam_form_fee');

  // Student Verify Exam Form Fee Payment
  Route::post('/verify/exam/form/fee/payment', [RazorPayController::class,'student_verify_exam_form_payment'])->name('student_verify_exam_form_payment');

  // Student Fail Exam Form Fee Payment
  Route::post('/failed/exam/form/fee/payment', [RazorPayController::class,'student_failed_exam_form_payment'])->name('student_failed_exam_form_payment');

  // Student Exam Form Fee Refund
  Route::post('/refund/exam/form/fee/{examformmaster}', [RazorPayController::class,'student_refund_exam_form'])->name('student_refund_exam_form');


});


// Auth User Routes
Route::prefix('user')->name('user.')->middleware(['auth:user','is_user','verified:user.verification.notice'])->group(function () {

  // User Dashboard
  Route::get('dashboard', UserDashboard::class)->name('dashboard');

  //All College
  Route::get('/colleges', AllCollege::class)->name('all_colleges');

  //All Sanstha
  Route::get('/sansthas', AllSanstha::class)->name('all_sanstha');

  //All University
  Route::get('/universities', AllUniversity::class)->name('all_university');

  //All Pattern
  Route::get('/patterns', AllPattern::class)->name('all_pattern');

  //All Exam
  Route::get('/exams', AllExam::class)->name('all_exam');

  //All Educational Course
  Route::get('/educationalCourses', AllEducationalCourse::class)->name('all_educationalcourse');

  //All CGPA
  Route::get('/cgpas', AllCgpa::class)->name('all_cgpa');

  //All Grade
  Route::get('/grades', AllGrades::class)->name('all_grade');

  //All Departments
  Route::get('/departments', AllDepartment::class)->name('all_department');

  //All Department Types
  Route::get('/departmentTypes', AllDepartmentType::class)->name('all_departmenttype');

  //All Credits
  Route::get('/credits', AllCredit::class)->name('all_credit');

  //All Exam Time Table class wise
  Route::get('/examTimeTables', AllExamTimeTable::class)->name('all_examtimetable');

  Route::get('exam/timetable/pdf/{exampatternclass}',[ExamOrderPdfController::class,'timetable'])->name('timetables');

  //All Exam Time Table Subject-Wise
  Route::get('/examTimeTables/subject', SubjectExamTimeTable::class)->name('all_examtimetable_subject');

  //All Buildings
  Route::get('/building', AllBuilding::class)->name('all_builidng');

  //All Blocks
  Route::get('/blocks', AllBlock::class)->name('all_block');

  //All Exam Building
  Route::get('/exam/building', AllExamBuilding::class)->name('all_exam_building');

  //All Ratehead
  Route::get('/ratehead', AllRateHead::class)->name('all_ratehead');

  //AllvExam Order Post
  Route::get('/exam/order/post', AllExamOrderPost::class)->name('all_exam_order_post');

  //All Exam Panel
  Route::get('/exampanel', AllExamPanel::class)->name('all_exam_panel');

  //All Exam Order
  Route::get('/examorder', AllExamOrder::class)->name('all_exam_order');

  //Generate Exam Order
  Route::get('/generate/exam/order', GenerateExamOrder::class)->name('generate_exam_order');

  Route::get('exam/order/{id}/{token}', [ExamOrderPdfController::class, 'order'])->name('examorder');

  //Cancel Exam Order
  Route::get('cancel/exam/order/{id}',[ExamOrderPdfController::class,'cancelorder'])->name('cancelorder');

  //Generate faculty order
  Route::get('/generate/faculty/order', GenerateFacultyOrder::class)->name('generate_faculty_order');

  //Generate Subject Order
  Route::get('/generate/subject/order', GenerateSubjectOrder::class)->name('generate_subject_order');

  //User Faculty
  Route::get('/faculty', UserFaculty::class)->name('all_faculty');

  //All PaperSet
  Route::get('/paper/set', AllPaperSet::class)->name('all_paperset');

  //All PaperSubmission
  Route::get('/paper/submission', AllPaperSubmission::class)->name('all_paper_submission');

  //All Users
  Route::get('/users', AllUser::class)->name('all_user');

  //All Student Helpline
  Route::get('/helplines',AllHelpline::class)->name('all_helpline');

  //All Student Helpline Query
  Route::get('/helpline/queries',AllHelplineQuery::class)->name('all_helpline_query');

  //All Student Helpline Documnet
  Route::get('/helpline/documents',AllHelplineDocument::class)->name('all_helpline_document');

  //All Programmes
  Route::get('/programmes',AllProgramme::class)->name('all_programme');

  //All Courses
  Route::get('/courses',AllCourse::class)->name('all_course');

  //All Class Years
  Route::get('/class/years',AllClassYear::class)->name('all_class_year');

  //All Course Class
  Route::get('/course/classes',AllCourseClass::class)->name('all_course_class');

  //All Pattern Class
  Route::get('/pattern/classes',AllPatternClass::class)->name('all_pattern_class');

  //All Exam Pattern Class
  Route::get('/exam/pattern/classes',AllExamPatternClass::class)->name('all_exam_pattern_class');

  //All Cap
  Route::get('/caps',AllCap::class)->name('all_cap');

  //All Academic Year
  Route::get('/academicyears',AllAcademicYear::class)->name('all_academic_year');

  //All Academic Year
  Route::get('/boarduniversities',AllBoardUniversity::class)->name('all_board_university');

  //All Time Table Slot
  Route::get('/timetableslots',AllTimeTableSlot::class)->name('all_time_table_slot');

  //All Admission Data
  Route::get('/admissiondatas',AllAdmissionData::class)->name('all_admission_data');

  //All Notice
  Route::get('/notices',AllNotice::class)->name('all_notice');

  //All Exam Fee
  Route::get('/exam/fees',AllExamFee::class)->name('all_exam_fee');

  //All Exam Fee Course
  Route::get('/exam/fee/course',AllExamFeeCourse::class)->name('all_exam_fee_course');

  //Delete Exam Form Before Inward
  Route::get('/delete/exam/form/before/inward',DeleteExamFormBeforeInward::class)->name('delete_exam_form_before_inward');

  //All Exam Form
  Route::get('/exam/form',AllExamForm::class)->name('all_exam_form');

  //Inward Exam Form
  Route::get('/inward/exam/form',InwardExamForm::class)->name('inward_exam_form');

  //Modify Exam Form
  Route::get('/modify/exam/form',ModifyExamForm ::class)->name('modify_exam_form');

  //Exam Form Statistics
  Route::get('/exam/form/statistics',ExamFormStatistics::class)->name('exam_form_statistics');

  //Exam Form Report View
  Route::get('/exam/form/report/view/{exam_pattern_class_id}{status}',[ExamFormReportViewController::class,'exam_form_report_view'])->name('exam_form_report_view');

  //All Subject Hod
  Route::get('/all-hodappointsubject',  AllHodAppointSubject::class)->name('all-hodappointsubjects');

});



// Auth Faculty Routes
Route::prefix('faculty')->name('faculty.')->middleware(['auth:faculty','verified:faculty.verification.notice'])->group(function () {

  // Faculty Dashboard
  Route::get('dashboard', FacultyDashboard::class)->name('dashboard');

  // All Faculty
  Route::get('/faculties', AllFaculty::class)->name('all_faculties');

  // All Faculty Role
  Route::get('/role', AllFacultyRole::class)->name('all_roles');

  // All Faculty Role
  Route::get('/roletype', AllFacultyRoleType::class)->name('all_role_types');

  // Update Faculty Profile
  Route::get('/update/profile', UpdateProfile::class)->name('update_profile');

  // All Subject Categories
  Route::get('/subject/categories', AllSubjectCategory::class)->name('all_subject_categories');

  // All Subject Verticals
  Route::get('/subject/verticals', AllSubjectVertical::class)->name('all_subject_verticals');

  // All Subject
  Route::get('/subject', AllSubject::class)->name('all_subjects');

  // All Allocate Subject
  Route::get('/assign/subject', AllAssignSubject::class)->name('all_assign_subjects');

  // All SubjectBucket
  Route::get('/subject/bucket', AllSubjectBucket::class)->name('all_subject_buckets');

  // All SubjectType
  Route::get('/subject/types', AllSubjectType::class)->name('all_subject_types');

  // All FacultyHead
  Route::get('/facultyheads', AllFacultyHead::class)->name('all_faculty_heads');

  // All ViewExamPanel
  Route::get('/view/exampanel', ViewExamPanel::class)->name('view_exam_panels');

  // All Department Prefix
  Route::get('/department/prefixes', AllDepartmentPrefix::class)->name('all_department_prefixes');

  // All Internal Tool Master
  Route::get('/internal/tool', AllInternalTool::class)->name('all_internal_tool');

  // All Internal Tool Document
  Route::get('/internal/tool/documents', AllInternalToolDocument::class)->name('all_internal_tool_documents');

  // All Assign Tool
  Route::get('/assign/tools', AllAssignTool::class)->name('all_assign_tools');

  // All Document Upload
  Route::get('/upload/documents', AllUploadDocument::class)->name('all_upload_documents');

  // All Hod Assign Tool
  Route::get('/hod/assign/tools', AllHodAssignTool::class)->name('all_hod_assign_tools');

});

require __DIR__.'/student.php';
require __DIR__.'/faculty.php';
require __DIR__.'/user.php';
