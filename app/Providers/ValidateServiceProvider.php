<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ValidateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['validator']->extend('tags', function($attribute, $value, $parameter){
            return preg_match('/^[A-Za-z0-9,]{1,50}(,[A-Za-z0-9]{1,50})*$/', $value);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
