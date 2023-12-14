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
use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'faculty' ,'as'=>'faculty.'],function (){

    Route::middleware('guest:faculty')->group(function () {
        // Route::get('register', [RegisteredUserController::class, 'create'])->name('register');

        // Route::post('register', [RegisteredUserController::class, 'store']);

        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');

        Route::post('login', [AuthenticatedSessionController::class, 'store']);

        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');

        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');

        Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
    });

    Route::middleware(['auth:faculty','is_faculty'])->group(function () {

        // Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');

        // Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');

        // Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');

        // Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');

        // Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

        // Route::put('password', [PasswordController::class, 'update'])->name('password.update');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
  
    });
    
});