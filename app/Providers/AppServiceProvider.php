<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    // Should return TRUE or FALSE
    Gate::define('admin', function() {
        return auth()->user()->role == 'admin';
    });

    // Should return TRUE or FALSE
    Gate::define('employer', function() {
        return auth()->user()->role == 'employer';
    });

    // Should return TRUE or FALSE
    Gate::define('seeker', function() {
        return auth()->user()->role == 'seeker';
    });
        Schema::defaultStringLength(191);
    }


}
