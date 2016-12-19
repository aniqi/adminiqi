<?php

namespace Aniqi\Adminiqi;

use Illuminate\Support\ServiceProvider;
//use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\Asset;

class AdminiqiServiceProvider extends ServiceProvider
{


    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {


    $this->loadViewsFrom(__DIR__.'/views/pages', 'courier');   
    $this->mergeConfigFrom( __DIR__.'/../config.php', 'config' );
    //$config = config('config');
    

    //$data = config('config');

        //key($data[(key($data))]);


                    //dd(key($data[(key($data))]));
                   //dd($current); 
        //$flip1 =   array_flip($data);
        //dd($flip1);

                    //echo $file;
     $ip = Request::getClientIp();
     $allowed = config('config.allowed_ips');
        
    if(config('config.maintenance_mode') && !in_array($ip, $allowed))    {
        
        $ip = Request::getClientIp();
        //echo view('courier::maintenancemode');
        //view('errors.500',  'My custom message',  503);
        //response()->view('errors.404', [], 404);
        abort(503);
        exit;
    }
    

    //echo '<h1>'.Asset::js().'</h1>';
    


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

    $this->publishes([
   
        __DIR__.'/views/assets' => public_path('aniqi/adminiqi/'),

    
    ], 'public');

         // config([
            //'config/setting.php',
       // ]);
        //return "test";
    }










}





