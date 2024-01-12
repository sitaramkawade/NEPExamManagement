<?php

use Livewire\Livewire;


use App\Livewire\Index;
use App\Livewire\SelectTo;
use App\Livewire\DataTable;

use App\Livewire\User\Exam\AllExam;
use App\Livewire\User\User\AllUser;
use App\Livewire\User\Home\UserHome;
use App\Livewire\User\UserDashboard;
use Illuminate\Support\Facades\Route;
use App\Livewire\User\Course\AllCourse;
use App\Livewire\User\College\AllCollege;
use App\Livewire\User\Pattern\AllPattern;
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
use App\Livewire\User\CourseClass\AllCourseClass;
use App\Livewire\User\PatternClass\AllPatternClass;
use App\Livewire\Faculty\Facultyrole\AllFacultyRole;
use App\Livewire\Faculty\UpdateProfile\UpdateProfile;
use App\Livewire\User\HelplineQuery\AllHelplineQuery;
use App\Livewire\Student\Profile\MultiStepStudentProfile;
use App\Livewire\User\HelplineDocument\AllHelplineDocument;
use App\Livewire\Faculty\FacultyRoleType\AllFacultyRoletype;
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
  Route::get('/',Index::class)->name('home');

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
  Route::get('/all/college', AllCollege::class)->name('all_colleges');

  //All Pattern
  Route::get('/all/pattern', AllPattern::class)->name('all_pattern');

  //All Exam
  Route::get('/all/exam', AllExam::class)->name('all_exam');

  //All Users
  Route::get('/all/users', AllUser::class)->name('all_user');

  //All Educational Courses
  Route::get('/all/EducationalCourses', AllEducationalCourse::class)->name('all_educational_courses');

  //All Student Helpline
  Route::get('/all/hel pline',AllHelpline::class)->name('all_helpline');

  //All Student Helpline Query
  Route::get('/all/helpline/query',AllHelplineQuery::class)->name('all_helpline_query');

  //All Student Helpline Documnet
  Route::get('/all/helpline/document',AllHelplineDocument::class)->name('all_helpline_document');

  //All Programmes
  Route::get('/all/programme',AllProgramme::class)->name('all_programme');

  //All Courses
  Route::get('/all/course',AllCourse::class)->name('all_course');

  //All Class Years
  Route::get('/all/class/year',AllClassYear::class)->name('all_class_year');

  //All Class Years
  Route::get('/all/course/class',AllCourseClass::class)->name('all_course_class');

  //All Class Years
  Route::get('/all/pattern/class',AllPatternClass::class)->name('all_pattern_class');
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
    Route::get('/all-faculty-roletype', AllFacultyRoletype::class)->name('all-roletypes');

    // Update Faculty Profile
    Route::get('/update-profile', UpdateProfile::class)->name('updateprofile');

    // All Subject
    Route::get('/all-subject', AllSubject::class)->name('all-subjects');
});

require __DIR__.'/student.php';
require __DIR__.'/faculty.php';
require __DIR__.'/user.php';
