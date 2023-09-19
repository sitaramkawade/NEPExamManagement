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
use App\Faculty\head\FacultyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
Route::group(['prefix'=>'admin'],function (){
    Route::middleware('guest:faculty')->group(function () {
        Route::get('register', [RegisteredUserController::class, 'create'])
                    ->name('admin.register');
    
        Route::post('register', [RegisteredUserController::class, 'store']);
    
        Route::get('login', [AuthenticatedSessionController::class, 'create'])
                    ->name('admin.login');
    
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
    
        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                    ->name('admin.password.request');
    
        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                    ->name('admin.password.email');
    
        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                    ->name('admin.password.reset');
    
        Route::post('reset-password', [NewPasswordController::class, 'store'])
                    ->name('admin.password.store');
    });
Route::group(['middleware'=>['faculty','auth:faculty'],'as'=>'admin.'],function(){
    Route::get('/dashboard', function () {
           
        return view('faculty.dashboard');
    });
    Route::get('verify-email', EmailVerificationPromptController::class)
    ->name('verification.notice');

Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['signed', 'throttle:6,1'])
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
Route::get('/showfaculty', [FacultyController::class, 'index'])->name('admin.showfaculty');
Route::get('/addfaculty', [FacultyController::class, 'create'])->name('admin.addfaculty');

});

});