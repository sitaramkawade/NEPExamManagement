<?php

use App\Livewire\Faculty\ViewFaculty;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $post=null;
    return view('welcome',compact('post'));
});

Route::get('vf', ViewFaculty::class);


require __DIR__.'/faculty.php';
require __DIR__.'/user.php';
