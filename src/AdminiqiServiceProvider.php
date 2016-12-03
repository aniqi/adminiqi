<?php

namespace Aniqi\Adminiqi;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Request;
use Illuminate\Contracts\Foundation\Application;

class AdminiqiServiceProvider extends ServiceProvider
{


    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

    
        
        $ip = Request::getClientIp();
           echo $ip;



    // $ip = Request::getClientIp();
    // $allowed = array('192.168.1.7', '192.168.1.8', '127.0.0.1');

    // if(!in_array($ip, $allowed))
    // {
    //     return Response::view('maintenance', array(), 503);
    // }


        //exit;
            
            //$ip = Request::getClientIp();
           // echo $ip;
            //$allowed = array('192.168.1.7', '192.168.1.8', '127.0.0.1');

            //if(!in_array($ip, $allowed))
            //{
               // return Response::view('maintenance', array(), 503);
            //}






    //Artisan::call('down');
    //exit;
    //$maintenance = new Aniqi\Adminiqi\CheckForMaintenanceMode;





    $this->loadViewsFrom(__DIR__.'/views', 'courier');
    //connect config file
    $this->mergeConfigFrom( __DIR__.'/../config.php', 'config' );

    $config = config('config');
        
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
