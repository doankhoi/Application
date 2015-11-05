<?php

namespace App\Providers;

use Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Auth\Guard;

class AdminAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        Auth::extend('adminEloquent', function ($app) {
            $myProvider = new EloquentUserProvider($app['hash'], '\App\Models\User');
            return new Guard($myProvider, $app['session.store']);
        });

        $this->app->singleton('admin.driver_admin', function ($app) {
            return Auth::driver('adminEloquent');
        });
    }
}
