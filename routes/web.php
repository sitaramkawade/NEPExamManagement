<?php

use Livewire\Livewire;


use App\Livewire\Index;
use App\Livewire\SelectTo;
use App\Livewire\DataTable;
use App\Livewire\User\Exam\AllExam;
use App\Livewire\User\Home\UserHome;
use App\Livewire\User\UserDashboard;
use Illuminate\Support\Facades\Route;
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
use App\Livewire\User\University\AllUniversity;
use App\Livewire\Faculty\Facultyrole\AllFacultyRole;
use App\Livewire\Faculty\updateProfile\UpdateProfile;
use App\Livewire\User\HelplineQuery\AllHelplineQuery;
use App\Livewire\Student\Profile\MultiStepStudentProfile;
use App\Livewire\User\HelplineDocument\AllHelplineDocument;
use App\Livewire\Faculty\Facultyroletype\AllFacultyRoletype;



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

    // Student Helpline
    Route::get('/helpline',Helpline::class)->name('helpline');
});


// Auth User Routes
Route::prefix('user')->name('user.')->middleware(['auth:user','is_user','verified:user.verification.notice'])->group(function () {

    // User Dashboard
    Route::get('dashboard', UserDashboard::class)->name('dashboard');

    //All College
      Route::get('/all_college', AllCollege::class)->name('colleges');

    //All Sanstha  
      Route::get('/all_sanstha', AllSanstha::class)->name('sanstha');

    //All University    
      Route::get('/all_university', AllUniversity::class)->name('university');

    //All Pattern   
      Route::get('/all_pattern', AllPattern::class)->name('pattern');

    //All Pattern   
      Route::get('/all_exam', AllExam::class)->name('exam');

    //All Student Helpline
     Route::get('/all/helpline',AllHelpline::class)->name('all_helpline');

    //All Student Helpline Query
     Route::get('/all/helpline/query',AllHelplineQuery::class)->name('all_helpline_query');

    //All Student Helpline Documnet
    Route::get('/all/helpline/document',AllHelplineDocument::class)->name('all_helpline_document');



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
