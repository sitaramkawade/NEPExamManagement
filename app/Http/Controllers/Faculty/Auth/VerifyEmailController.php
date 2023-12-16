<?php

namespace App\Http\Controllers\Faculty\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user('faculty')->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::FACULTYHOME.'?verified=1');
        }

        if ($request->user('faculty')->markEmailAsVerified()) {
            event(new Verified($request->user('faculty')));
        }

        return redirect()->intended(RouteServiceProvider::FACULTYHOME.'?verified=1');
    }
}
