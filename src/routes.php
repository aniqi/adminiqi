<?php

//$config = config('config');
Route::get('/', function () { 
  	
  	return view('courier::welcome');
	//return Response::make('', 404);

    //App::abort(404);
    //return Artisan::call('up');
    //echo Hash::make("p@$$w0rd");
});

Route::get('/'.config('config.url_path'), function () { 
//return response('Be right back!', 503);  
	return view('courier::welcome');
    //return Artisan::call('up');
    //return dd(config('config.users.admin'));
    //echo Hash::make("p@$$w0rd");
});

Route::get('/'.config('config.url_path').'/user', 'Aniqi\Adminiqi\Controllers\UserController@index');

