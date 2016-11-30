<?php

namespace Aniqi\Adminiqi;

use Illuminate\Support\ServiceProvider;


class AdminiqiServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

        require __DIR__.'/routes.php';
    
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
        //return "test";
    }
}
