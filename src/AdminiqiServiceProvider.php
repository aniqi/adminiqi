<?php

namespace Aniqi\Adminiqi;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;


class AdminiqiServiceProvider extends ServiceProvider
{


    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

    $this->loadViewsFrom(__DIR__.'/views', 'courier');   
    $this->mergeConfigFrom( __DIR__.'/../config.php', 'config' );
    //$config = config('config');
     
     $ip = Request::getClientIp();
     $allowed = config('config.allowed_ips');
        
        if(config('config.maintenance_mode') && !in_array($ip, $allowed))    {
            
            $ip = Request::getClientIp();
            echo view('courier::maintenancemode');
            exit;
        }



   
    //connect config file
    
        
    //dd ($config);

    //connect routes

    require __DIR__.'/routes.php';



    
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()

    {

         // config([
            //'config/setting.php',
       // ]);
        //return "test";
    }
}
