<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Faculty;

use App\Policies\FacultyPolicy;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
// use Illuminate\Auth\Notifications\VerifyEmail;
// use Illuminate\Notifications\Messages\MailMessage;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
   
    protected $policies = [
        Faculty::class => FacultyPolicy::class,
        
        Facultybankaccount::class => FacultybankaccountPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        
    //    VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
          
    //         return (new MailMessage)
    //             ->subject('Verify Email Address')
    //             ->line('Click the button below to verify your email address.')
    //             ->action('Verify Email Address', $url);
    //     });
      
        
    }
}
