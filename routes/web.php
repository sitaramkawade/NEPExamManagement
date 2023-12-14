<?php

use App\Livewire\Faculty\ViewFaculty;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Livewire\Master\Gender\ViewGender;


Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/livewire/update', $handle);
});

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

Route::get('register-faculty', ViewFaculty::class);

Route::get('/vf', function () {
    return view('livewire.faculty.view-faculty')->extends('layouts.faculty')->section('faculty');
});

Route::get('gender', ViewGender::class);

require __DIR__.'/student.php';
require __DIR__.'/faculty.php';
require __DIR__.'/user.php';
