<?php

use Livewire\Livewire;


use App\Livewire\Index;
use App\Livewire\SelectTo;
use App\Livewire\DataTable;
use App\Livewire\User\Exam\AllExam;
use App\Livewire\User\college\Edit;
use App\Livewire\User\Home\UserHome;
use App\Livewire\User\UserDashboard;
use App\Livewire\Faculty\EditFaculty;
use App\Livewire\Faculty\ViewFaculty;
use App\Livewire\User\DeleteCollege;

use App\Livewire\User\Exam\EditExam;
use App\Livewire\Student\ViewProfile;
use Illuminate\Support\Facades\Route;
use App\Livewire\Faculty\UpdateProfile;
use App\Livewire\Faculty\RestoreFaculty;
use App\Livewire\Faculty\RegisterFaculty;
use App\Livewire\User\College\AllCollege;
use App\Livewire\User\Pattern\AllPattern;
use App\Livewire\User\Sanstha\AllSanstha;
use App\Livewire\Faculty\FacultyDashboard;
use App\Livewire\Faculty\Home\FacultyHome;
use App\Livewire\Student\Home\StudentHome;
use App\Livewire\Student\StudentDashboard;
use App\Livewire\Faculty\SoftDeleteFaculty;
use App\Livewire\Student\Helpline\Helpline;
use App\Livewire\Student\StudentViewProfile;
use App\Livewire\Faculty\FacultyRole\AddRole;
use App\Livewire\Faculty\FacultyRole\EditRole;
use App\Livewire\Faculty\FacultyRole\ViewRole;
use App\Livewire\User\Helpline\AllHelpline;
use App\Livewire\User\University\AllUniversity;
use App\Livewire\Faculty\FacultyRole\RestoreRole;
use App\Livewire\Faculty\FacultyRole\SoftDeleteRole;
use App\Livewire\Faculty\FacultyRoleType\AddRoleType;
use App\Livewire\Faculty\FacultyRoleType\EditRoleType;
use App\Livewire\Faculty\FacultyRoleType\ViewRoleType;
use App\Livewire\User\HelplineQuery\AllHelplineQuery;
use App\Livewire\Faculty\FacultyRoleType\RestoreRoleType;
use App\Livewire\Student\Profile\MultiStepStudentProfile;
use App\Livewire\Faculty\FacultyRoleType\SoftDeleteRoleType;
use App\Livewire\User\HelplineDocument\AllHelplineDocument;


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

    // Register Faculty
    Route::get('/register-faculty', RegisterFaculty::class)->name('register.faculty');

    // View Faculty
    Route::get('/view-faculty',ViewFaculty::class)->name('view.faculty');

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
