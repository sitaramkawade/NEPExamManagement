<?php

use App\Http\Controllers\Faculty\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Faculty\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Faculty\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Faculty\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Faculty\Auth\NewPasswordController;
use App\Http\Controllers\Faculty\Auth\PasswordController;
use App\Http\Controllers\Faculty\Auth\PasswordResetLinkController;
use App\Http\Controllers\Faculty\Auth\RegisteredUserController;
use App\Http\Controllers\Faculty\Auth\VerifyEmailController;
use App\Http\Controllers\Faculty\head\FacultyController;
use App\Http\Controllers\Faculty\head\SubjectController;
// use App\Faculty\head\FacultyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
Route::group(['prefix'=>'admin','as'=>'admin.'],function (){
    Route::middleware('guest:faculty')->group(function () {
        Route::get('register', [RegisteredUserController::class, 'create'])
                    ->name('register');
    
        Route::post('register', [RegisteredUserController::class, 'store']);
    
        Route::get('login', [AuthenticatedSessionController::class, 'create'])
                    ->name('login');
    
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
    
        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                    ->name('password.request');
    
        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                    ->name('password.email');
    
        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                    ->name('password.reset');
    
        Route::post('reset-password', [NewPasswordController::class, 'store'])
                    ->name('password.store');
    });
Route::group(['middleware'=>['faculty','auth:faculty']],function(){
    Route::get('/dashboard', function () {
           
        return view('faculty.dashboard');
    });
    Route::get('verify-email', EmailVerificationPromptController::class)
    ->name('verification.notice');

Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['signed:faculty', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware('throttle:6,1')
    ->name('verification.send');

Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
    ->name('password.confirm');

Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

Route::put('password', [PasswordController::class, 'update'])->name('password.update');

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//Head role
//1 Add new faculty
Route::get('/showfaculty', [FacultyController::class, 'index'])->name('head.showfaculty');
Route::get('/addfaculty/{id}', [FacultyController::class, 'create'])->name('head.addfaculty');
Route::post('/storefaculty', [FacultyController::class, 'store'])->name('head.store');
Route::get('/editfaculty/{id}', [FacultyController::class, 'edit'])->name('head.editfaculty');
Route::post('/updatefaculty', [FacultyController::class, 'update'])->name('head.update');
Route::put('/updatefaculty/{id}', [FacultyController::class, 'update'])->name('head.update');

Route::delete('/deletefaculty{id}', [FacultyController::class, 'delete'])->name('head.deletefaculty');
Route::get('/facultydetails/{id}', [FacultyController::class, 'alldetails'])->name('head.showalldetails');

Route::get('/activefaculty/{id}', [FacultyController::class, 'active_faculty'])->name('head.activefaculty');
Route::get('/deactivefaculty/{id}', [FacultyController::class, 'deactive_faculty'])->name('head.deactivefaculty');
//2 Add new Subject
Route::get('/showsubject', [SubjectController::class, 'index'])->name('subject.showsubject');
Route::get('/addsubject/{id}', [SubjectController::class, 'create'])->name('subject.addsubject');
Route::post('/storesubject/{id}', [SubjectController::class, 'store'])->name('subject.storesubject');
Route::get('/editsubject/{id}', [SubjectController::class, 'edit'])->name('subject.editsubject');
Route::post('/updatesubject', [SubjectController::class, 'update'])->name('subject.updatesubject');
Route::put('/updatesubject/{id}', [SubjectController::class, 'update'])->name('subject.updatesubject');

Route::delete('/deletesubject{id}', [SubjectController::class, 'delete'])->name('subject.deletesubject');
Route::get('/subjectdetails/{id}', [SubjectController::class, 'alldetails'])->name('subject.showalldetailssubject');

Route::get('/activesubject/{id}', [SubjectController::class, 'active_subject'])->name('subject.activesubject');
Route::get('/deactivesubject/{id}', [SubjectController::class, 'deactive_subject'])->name('subject.deactivesubject');

});

});