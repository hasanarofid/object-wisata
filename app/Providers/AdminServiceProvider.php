<?php 
namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Auth::extend('admin', function ($app, $name, array $config) {
            // Return an instance of your custom admin guard
            return new \App\Auth\AdminGuard(Auth::createUserProvider($config['provider']), $app->make('request'));
        });
    }
}