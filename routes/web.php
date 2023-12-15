<?php

use Livewire\Livewire;
use App\Livewire\Faculty\ViewFaculty;
use Illuminate\Support\Facades\Route;
use App\Livewire\Faculty\RegisterFaculty;
use App\Livewire\Master\Gender\ViewGender;



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
    Route::get('/temp', function () {
        return view('temp');
    });

});

// Auth Student Routes
Route::prefix('student')->name('student.')->middleware(['auth:student','is_student','is_studentverified'])->group(function () {

    // Student Dashboard
    Route::get('/dashboard', function () {
        return view('student.student-dashboard');
    })->name('dashboard');



});


// Auth User Routes
Route::prefix('user')->name('user.')->middleware(['auth:user','is_user'])->group(function () {

    // User Dashboard
    Route::get('dashboard', function () {
        return view('user.user-dashboard');
    })->name('dashboard');



});



// Auth Faculty Routes
Route::prefix('faculty')->name('faculty.')->middleware(['auth:faculty','is_faculty'])->group(function () {

    // Faculty Dashboard
    Route::get('dashboard', function () {
        return view('faculty.faculty-dashboard');
    })->name('dashboard');



});


// Livewire Update Route
Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/livewire/update', $handle);
});

// Livewire JS Route
Livewire::setScriptRoute(function ($handle) {
    return Route::get('/livewire/livewire.js', $handle);
});

Route::get('/', function () {
    $post=null;
    return view('welcome',compact('post'));
});
Route::get('/temp', function () {
    $mode='add';
    return view('temp',compact(''));
});


Route::get('/register-faculty', function () {
    return view('faculty.reg-faculty');
});

Route::get('gender', ViewGender::class);

require __DIR__.'/student.php';
require __DIR__.'/faculty.php';
require __DIR__.'/user.php';
