<?php

namespace App\Providers;
use App\Models\Faculty;

use App\Policies\FacultyPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
class AuthServiceProvider extends ServiceProvider
{

   
    protected $policies = [
        Faculty::class => FacultyPolicy::class,
        
        Facultybankaccount::class => FacultybankaccountPolicy::class,
    ];


    public function boot(): void
    {
    }

}