<?php

namespace App\Http\Controllers\Faculty\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
       // dd($request->user()->hasVerifiedEmail());
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended('/admin/dashboard')
                    : view('faculty.auth.verify-email');
    }
}
