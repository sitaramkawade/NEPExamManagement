<?php

use Livewire\Livewire;
use App\Livewire\SelectTo;
use App\Livewire\DataTable;
use App\Livewire\User\Edit;
use App\Livewire\EditUniversity;
use App\Livewire\User\AddCollege;
use App\Livewire\User\EditSanstha;
use App\Livewire\User\DeleteCollege;
use Illuminate\Support\Facades\Route;
use App\Livewire\Student\StudentDashboard;
use App\Livewire\Student\Profile\MultiStepStudentProfile;

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
    Route::get('/', function () {
        $post=null;
        return view('welcome',compact('post'));
    });

    // Student Home
    Route::get('/student', function () {
        return view('student.home.home');
    })->name('student');

    // User Home
    Route::get('/user', function () {
        return view('user.home.home');
    })->name('user');

    // Faculty Home
    Route::get('/faculty', function () {
        return view('faculty.home.home');
    })->name('faculty');

    // RND Page
    Route::get('/table',DataTable::class);

});

// Auth Student Routes
Route::prefix('student')->name('student.')->middleware(['auth:student','is_student','is_studentverified'])->group(function () {

    // Student Dashboard
    Route::get('/dashboard',StudentDashboard::class)->name('dashboard');

    // Student Profile
    Route::get('/profile',MultiStepStudentProfile::class)->name('profile');

});


// Auth User Routes
Route::prefix('user')->name('user.')->middleware(['auth:user','is_user'])->group(function () {

    // User Dashboard
    Route::get('dashboard', function () {
        return view('user.user-dashboard');
    })->name('dashboard');

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



});



// Auth Faculty Routes
Route::prefix('faculty')->name('faculty.')->middleware(['auth:faculty'])->group(function () {

    // Faculty Dashboard
    Route::get('dashboard', function () {
        return view('faculty.faculty-dashboard');
    })->name('dashboard');



});

require __DIR__.'/student.php';
require __DIR__.'/faculty.php';
require __DIR__.'/user.php';
