<?php

namespace App\Providers;

use App\Models\College;
use Illuminate\Support\ServiceProvider;

class AppNameServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $appName = College::where('is_default',1)->pluck('college_name')->first();
        if ($appName) {
            config(['app.name' => $appName]);
        } else {
            config(['app.name' => env('APP_NAME')]);
        }
    }
}
