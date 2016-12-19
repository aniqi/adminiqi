<?php







  
Route::group(['middleware' => ['web']], function () {

  //Route::get('/'.config('config.url_path', 'Aniqi\Adminiqi\Controllers\UserController@check'), function () { 
          //
 // });


  //!!!!!!!!!!!!!!!
  //Route::get('/'.config('config.url_path').'/'.{'pages'}, 'Aniqi\Adminiqi\Controllers\UserController@pages');

  



  Route::get('/'.config('config.url_path').'/logout', 'Aniqi\Adminiqi\Controllers\PagesController@logout');


  Route::get('/'.config('config.url_path'), 'Aniqi\Adminiqi\Controllers\PagesController@login');
  Route::post('/'.config('config.url_path'), 'Aniqi\Adminiqi\Controllers\PagesController@check');
  Route::get('/'.config('config.url_path').'/test','Aniqi\Adminiqi\Controllers\PagesController@test');
  
  Route::post('/'.config('config.url_path').'/ajax', 'Aniqi\Adminiqi\Controllers\DataController@ajax_handler');
  


  Route::get('/'.config('config.url_path').'/{pages}','Aniqi\Adminiqi\Controllers\PagesController@pages');


});
    //Auth::logout();

    //return Redirect::to('/'.config('config.url_path'));




//$config = config('config');
//Route::get('/'.config('config.url_path').'/login', function () { 
    
    //Input::get('login', 'Sally');
  //$data = Request::method();

   // dd($data);




  //return Response::make('', 404);

    //App::abort(404);
    //return Artisan::call('up');
    //echo Hash::make("p@$$w0rd");
//});
//Route::get('/'.config('config.url_path').'/user', 'Aniqi\Adminiqi\Controllers\UserController@index');



/*Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function ()    {
        // Uses Auth Middleware
    });

    Route::get('user/profile', function () {
        // Uses Auth Middleware
    });
})
*/