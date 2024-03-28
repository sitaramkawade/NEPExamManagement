<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Faculty;
use App\Models\Admissiondata;
use App\Models\Questionpaperbank;
use Illuminate\Support\Facades\Gate;
use App\Policies\User\StrongRoom\StrongRoomPolicy;
use App\Policies\User\AdmissionData\AdmissionDataPolicy;
use App\Policies\User\QuestionPaperBank\QuestionPaperBankPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Admissiondata::class => AdmissionDataPolicy::class,
        Questionpaperbank::class => StrongRoomPolicy::class,
        Questionpaperbank::class => QuestionPaperBankPolicy ::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('access_strong_room', function (User $user) {
            return $user->role_id === 4;
        });

        Gate::define('access_download_question_paper', function (Faculty $user) {
            return $user->role_id === 4;
        });
    }
}