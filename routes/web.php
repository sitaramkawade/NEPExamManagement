<?php

use Livewire\Livewire;


use App\Livewire\Index;
use App\Livewire\SelectTo;
use App\Livewire\DataTable;

use App\Livewire\HomeIndex;
use App\Livewire\User\Cap\AllCap;
use App\Livewire\User\Cgpa\AllCgpa;
use App\Livewire\User\Exam\AllExam;
use App\Livewire\User\User\AllUser;
use App\Livewire\User\Home\UserHome;
use App\Livewire\User\UserDashboard;
use Illuminate\Support\Facades\Route;
use App\Livewire\User\Grade\AllGrades;
use App\Livewire\User\Course\AllCourse;
use App\Livewire\User\Credit\AllCredit;
use App\Livewire\User\Notice\AllNotice;
use App\Livewire\User\College\AllCollege;
use App\Livewire\User\Pattern\AllPattern;
use App\Livewire\User\Sanstha\AllSanstha;
use App\Livewire\Faculty\FacultyDashboard;
use App\Livewire\Faculty\Home\FacultyHome;
use App\Livewire\Student\Home\StudentHome;
use App\Livewire\Student\StudentDashboard;
use App\Livewire\Student\Helpline\Helpline;
use App\Livewire\User\Helpline\AllHelpline;
use App\Livewire\Faculty\Faculty\AllFaculty;
use App\Livewire\Faculty\Subject\AllSubject;
use App\Livewire\Student\StudentViewProfile;
use App\Livewire\User\ClassYear\AllClassYear;
use App\Livewire\User\Programme\AllProgramme;
use App\Livewire\User\Department\AllDepartment;
use App\Livewire\User\University\AllUniversity;
use App\Livewire\User\CourseClass\AllCourseClass;
use App\Livewire\User\AcademicYear\AllAcademicYear;
use App\Livewire\User\PatternClass\AllPatternClass;
use App\Livewire\Faculty\FacultyHead\AllFacultyHead;
use App\Livewire\Faculty\Facultyrole\AllFacultyRole;
use App\Livewire\Faculty\SubjectType\AllSubjectType;
use App\Livewire\Faculty\UpdateProfile\UpdateProfile;
use App\Livewire\User\AdmissionData\AllAdmissionData;
use App\Livewire\User\ExamTimeTable\AllExamTimeTable;
use App\Livewire\User\HelplineQuery\AllHelplineQuery;
use App\Livewire\User\TimeTableSlot\AllTimeTableSlot;
use App\Livewire\User\DepartmentType\AllDepartmentType;
use App\Livewire\Faculty\SubjectBucket\AllSubjectBucket;
use App\Livewire\Student\Profile\MultiStepStudentProfile;
use App\Livewire\User\BoardUniversity\AllBoardUniversity;
use App\Livewire\User\ExamPatternClass\AllExamPatternClass;
use App\Livewire\User\HelplineDocument\AllHelplineDocument;
use App\Livewire\Faculty\FacultyRoleType\AllFacultyRoleType;
use App\Livewire\User\EducationalCourse\AllEducationalCourse;





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

  // RND Pages
  Route::get('/table',DataTable::class);

  Route::get('/select',SelectTo::class)->name('select');



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

  //All Exam Time Table
  Route::get('/examTimeTables', AllExamTimeTable::class)->name('all_examTimeTable');

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
});



// Auth Faculty Routes
Route::prefix('faculty')->name('faculty.')->middleware(['auth:faculty','verified:faculty.verification.notice'])->group(function () {

  // Faculty Dashboard
  Route::get('dashboard', FacultyDashboard::class)->name('dashboard');

  // All Faculty
  Route::get('/all-faculties', AllFaculty::class)->name('all-faculties');

  // All Faculty Role
  Route::get('/all-faculty-role', AllFacultyRole::class)->name('all-roles');

  // All Faculty Role
  Route::get('/all-faculty-roletype', AllFacultyRoleType::class)->name('all-roletypes');

  // Update Faculty Profile
  Route::get('/update-profile', UpdateProfile::class)->name('updateprofile');

  // All Subject
  Route::get('/all-subject', AllSubject::class)->name('all-subjects');

  // All SubjectBucket
  Route::get('/all-subjectbucket', AllSubjectBucket::class)->name('all-subjectbuckets');

  // All SubjectType
  Route::get('/all-subjecttypes', AllSubjectType::class)->name('all-subjecttypes');

  // All FacultyHead
  Route::get('/all-facultyheads', AllFacultyHead::class)->name('all-facultyheads');

});

require __DIR__.'/student.php';
require __DIR__.'/faculty.php';
require __DIR__.'/user.php';
