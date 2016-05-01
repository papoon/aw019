<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\estadios;
use App\equipas;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        
        
        
        view()->composer('master',function($view)
        {
            $estadios = Estadios::all();
            $equipas = Equipas::all();
            $view->with(compact('estadios','equipas'));

        });

        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
