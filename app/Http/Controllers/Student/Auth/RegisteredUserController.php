<?php

namespace App\Http\Controllers\Student\Auth;

use App\Events\AdminRegisterMailEvent;
use App\Http\Controllers\Controller;
use App\Listeners\AdminRegisterMailListener;
use App\Models\Faculty;
use App\Models\Student;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('student.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
     
       

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' =>['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],          
            'mobile_no'=>['required','digits:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Student::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
    
        ]);


        $student = Student::create([
            'student_name' =>strtoupper(trim($request->input('last_name'))." ".trim($request->input('first_name'))." ".trim($request->input('middle_name'))),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
            'mobile_no' => trim($request->input('mobile_no')),
            'email_verification_token' => Str::random(32),
            
        ]);
 
    //    event(new Registered($student));
       event(new AdminRegisterMailEvent($student));
        Auth::guard('faculty')->login($student);
      

        return redirect(RouteServiceProvider::STUDENTHOME);
    }
}
