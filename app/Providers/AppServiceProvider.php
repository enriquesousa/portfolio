<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Session;
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
        // Usar bootstrap para pagination
        Paginator::useBootstrap();

        // $language = 'es';
        // session(['locale' => 'es']); // set session variable
        // $language = session('lenguaje'); // Retrieve a piece of data from the session..
        
        // $language = session('lenguaje');
        // app()->setLocale($language);

    }
}
