<?php

namespace App\Providers;

use App\Models\College;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppNameServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    public function boot(): void
    {    
        if (Schema::hasTable('colleges')) {
            $appName = College::where('is_default', 1)->pluck('college_name')->first();

            if ($appName) {
                config(['app.name' => $appName]);
            } else {
                config(['app.name' => env('APP_NAME')]);
            }
        } else {
            config(['app.name' => env('APP_NAME')]);
        }
    }
}
