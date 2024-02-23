<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Models\Admissiondata' => 'App\Policies\User\AdmissionData\AdmissionDataPolicy',
    ];

    public function boot(): void
    {
        //
    }

}