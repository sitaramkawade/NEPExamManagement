<?php

use Livewire\Livewire;


use App\Livewire\Index;
use App\Livewire\SelectTo;
use App\Livewire\DataTable;
use App\Livewire\User\college\Edit;
use App\Livewire\User\DeleteCollege;
use App\Livewire\User\Exam\EditExam;
use App\Livewire\User\Home\UserHome;

use App\Livewire\User\UserDashboard;
use Illuminate\Support\Facades\Route;
use App\Livewire\Faculty\FacultyDashboard;
use App\Livewire\Faculty\Home\FacultyHome;
use App\Livewire\Student\Home\StudentHome;
use App\Livewire\Student\StudentDashboard;
use App\Livewire\User\Pattern\EditPattern;
use App\Livewire\User\sanstha\EditSanstha;
use App\Livewire\Faculty\Faculty\AllFaculty;
use App\Livewire\Faculty\Subject\AllSubject;
use App\Livewire\Student\StudentViewProfile;
use App\Livewire\User\university\EditUniversity;
use App\Livewire\Faculty\Facultyrole\AllFacultyRole;
use App\Livewire\Faculty\UpdateProfile\UpdateProfile;
use App\Livewire\Student\Profile\MultiStepStudentProfile;
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
});


// Auth User Routes
Route::prefix('user')->name('user.')->middleware(['auth:user','is_user','verified:user.verification.notice'])->group(function () {

    // User Dashboard
    Route::get('dashboard', UserDashboard::class)->name('dashboard');

    //add College
    Route::get('add_college', function () {
        return view('user.college');
    })->name('college');

    //View College
    Route::get('/view_college', function () {
        return view('user.view_college');
    })->name('view_college');

    //Edit College
     Route::get('/edit/{id}',Edit::class)->name('edit');

    //Add Sanstha
    Route::get('addSanstha', function () {
        return view('user.addSanstha');
    })->name('addSanstha');

    //View Sanstha
    Route::get('/view_Sanstha', function () {
        return view('user.viewSanstha');
    })->name('viewSanstha');

    //Edit Sanstha
      Route::get('/editSanstha/{id}',EditSanstha::class)->name('editSanstha');

    //Add University
    Route::get('/add_university', function () {
        return view('user.addUniversity');
    })->name('addUniversity');

     //View University
     Route::get('/view_university', function () {
        return view('user.viewUniversity');
    })->name('viewUniversity');

    //Edit University
     Route::get('/editUniversity/{id}',EditUniversity::class)->name('editUniversity');

    //Add Pattern
    Route::get('/add_pattern', function () {
        return view('user.addPattern');
    })->name('addPattern');

    //View Pattern
       Route::get('/view_pattern', function () {
        return view('user.viewPattern');
    })->name('viewPattern');

    //Edit Pattern
    Route::get('/editPattern/{id}',EditPattern::class)->name('editPattern');

     //Add Exam
     Route::get('/add_exam', function () {
        return view('user.addExam');
    })->name('addExam');

     //View Pattern
     Route::get('/view_exam', function () {
        return view('user.viewExam');
    })->name('viewExam');

     //Edit Pattern
     Route::get('/editExam/{id}',EditExam::class)->name('editExam');






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
