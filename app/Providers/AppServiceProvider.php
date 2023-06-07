<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('kad_pengenalan', function ($attribute, $value, $parameters, $validator) {
            // Define the regular expression pattern for the Kad Pengenalan format
            $pattern = '/^[0-9]{6}-[0-9]{2}-[0-9]{4}$/';

            // Check if the value matches the pattern
            return preg_match($pattern, $value);
        });

    }
}
