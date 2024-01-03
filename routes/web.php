<?php

use Livewire\Livewire;
use App\Livewire\SelectTo;
use App\Livewire\DataTable;
use App\Livewire\Student\ViewProfile;
use App\Livewire\Faculty\EditFaculty;
use App\Livewire\Faculty\ViewFaculty;
use Illuminate\Support\Facades\Route;
use App\Livewire\Faculty\DeleteFaculty;
use App\Livewire\Faculty\UpdateProfile;
use App\Livewire\Faculty\RestoreFaculty;
use App\Livewire\Faculty\RegisterFaculty;
use App\Livewire\Master\Gender\ViewGender;

use App\Livewire\Student\StudentDashboard;
use App\Livewire\Faculty\SoftDeleteFaculty;
use App\Livewire\Faculty\FacultyRole\AddRole;
use App\Livewire\Faculty\FacultyRole\EditRole;
use App\Livewire\Faculty\FacultyRole\ViewRole;
use App\Livewire\Faculty\FacultyRole\RestoreRole;
use App\Livewire\Faculty\MultiStepFacultyProfile;
use App\Livewire\Faculty\FacultyRole\SoftDeleteRole;
use App\Livewire\Faculty\FacultyRoleType\AddRoleType;
use App\Livewire\Faculty\FacultyRoleType\EditRoleType;
use App\Livewire\Faculty\FacultyRoleType\ViewRoleType;
use App\Livewire\Faculty\FacultyRoleType\RestoreRoleType;
use App\Livewire\Student\Profile\MultiStepStudentProfile;
use App\Livewire\Faculty\FacultyRoleType\SoftDeleteRoleType;

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
    Route::get('/select',SelectTo::class)->name('select');

});

// Auth Student Routes
Route::prefix('student')->name('student.')->middleware(['auth:student','is_student','is_studentverified'])->group(function () {

    // Student Dashboard
    Route::get('/dashboard',StudentDashboard::class)->name('dashboard');

    // Student Profile
    Route::get('/profile',MultiStepStudentProfile::class)->name('profile');
 
    // Student View Profile
    Route::get('/view/profile',ViewProfile::class)->name('view-profile');
});


// Auth User Routes
Route::prefix('user')->name('user.')->middleware(['auth:user','is_user'])->group(function () {

    // User Dashboard
    Route::get('dashboard', function () {
        return view('user.user-dashboard');
    })->name('dashboard');



});



// Auth Faculty Routes
Route::prefix('faculty')->name('faculty.')->middleware(['auth:faculty','verified:faculty.verification.notice'])->group(function () {

    // Faculty Dashboard
    Route::get('dashboard', function () {
        return view('faculty.faculty-dashboard');
    })->name('dashboard');

    // Register Faculty
    Route::get('/register-faculty', function () {
        return view('faculty.faculty-register');
    })->name('register.faculty');

    // View Faculty
    Route::get('/view-faculty', function () {
        return view('faculty.faculty-view');
    })->name('view.faculty');

    //Edit Faculty
    Route::get('/edit-faculty/{id}', EditFaculty::class)->name('edit.faculty');

    //Delete Faculty
    Route::get('/delete-faculty/{id}', SoftDeleteFaculty::class)->name('delete.faculty');

    //Restore Faculty
    Route::get('/restore-faculty/{id}', RestoreFaculty::class)->name('restore.faculty');

    //Update Profile Faculty
    Route::get('/update-profile', UpdateProfile::class)->name('update-profile.faculty');


    //View Faculty Role
    Route::get('/view-faculty-role', ViewRole::class)->name('view-role.faculty');

    //Add Faculty Role
    Route::get('/add-faculty-role', AddRole::class)->name('add-role.faculty');

    //Edit Faculty Role
    Route::get('/edit-faculty-role/{id}', EditRole::class)->name('edit-role.faculty');

    //Delete Faculty Role
    Route::get('/delete-faculty-role/{id}', SoftDeleteRole::class)->name('delete-role.faculty');

    //Restore Faculty Role
    Route::get('/restore-faculty-role/{id}', RestoreRole::class)->name('restore-role.faculty');

    //View Faculty Role Type
    Route::get('/view-roletype', ViewRoleType::class)->name('view-roletype.faculty');

    //Add Faculty Role Type
    Route::get('/add-roletype', AddRoleType::class)->name('add-roletype.faculty');

    //Edit Faculty Role Type
    Route::get('/edit-roletype/{id}', EditRoleType::class)->name('edit-roletype.faculty');

    //Delete Faculty Role Type
    Route::get('/delete-roletype/{id}', SoftDeleteRoleType::class)->name('delete-roletype.faculty');

    //Restore Faculty Role Type
    Route::get('/restore-roletype/{id}', RestoreRoleType::class)->name('restore-roletype.faculty');


});

require __DIR__.'/student.php';
require __DIR__.'/faculty.php';
require __DIR__.'/user.php';
