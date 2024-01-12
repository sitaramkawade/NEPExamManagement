<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Builder::macro('search', function(string $attribute, string $searchTerm) {
        //     return $this->where($attribute, 'LIKE', "%{$searchTerm}%");
        //  });
        // Builder::macro('search',function($field,$string){
        //     return $string ? $this->where($field,'like','%'.$string.'%'):$this;

        // });
        // Builder::macro('search', function($attributes, string $searchTerm) {
        //     foreach(array_wrap($attributes) as $attribute) {
        //     $this->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
        //        }
            
        //     return $this;
        //     });
    }
}
