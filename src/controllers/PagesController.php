<?php
namespace Aniqi\Adminiqi\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;


use Illuminate\Routing\Controller as BaseController;

class PagesController extends BaseController
{
    
    protected $messages;
    protected $users;
    protected $key;
    //protected $url;
    //protexted $privileges = config('config.privileges');

    protected $request;

    public function __construct(Request $request) {
        
        $this->request = $request;
       // $this->is_auth($request);
        $this->users = config('config.users');
        $this->key = config('config.key');
        //$this->$url = Request::url();
        
        
        //$this->auth = false;
    }

   


    public function check()
    {
        

            if(in_array($this->request['login'], array_keys($this->users)))
            {
                //$this->is_auth(); 
                if(Hash::check($this->request['pass'], $this->users[$this->request['login']]['pass']) )
                {
                    //$this->username = $this->request['login'];
                    //add session
                    //echo "ok";
                    //$this->session->flush();
                    //$this->username=$this->request['login'];
                    $this->request->session()->put( 'k' ,[
                        Hash::make($this->request['login'].$this->key), 
                        Crypt::encrypt($this->request['login'])
                    ]);
                    $this->is_auth();
                    return self::login();
                    
                    //return view('courier::welcome');
                
                    //dd(Crypt::decrypt(Session::get('u')));
                    //self::$auth = true;
                }
                else
                {
                    Session::flush();
                    return redirect(config('config.url_path'));
                }
                
            }
            else
            {
                Session::flush();
                return redirect(config('config.url_path'));
            }
        //else


  
    }
    public function test()
    {
        var_dump($this->is_auth());
        //var_dump(Session::get('k'));
        //var_dump(Session::get('k')!=null);
        //echo '!!!'.$this->username.'!!!'; 
        //echo Crypt::decrypt(Session::get('u'));
        //echo $this->request;
        //echo Session::get('u');
        //dd ($this->request->session()->get('k'));

    }

    public function login()
    {
        //var_dump($this->is_auth());
        //var_dump(Session::get('u'));
        if ($this->is_auth())
        {
            return redirect(config('config.url_path').'/panelsetting');
            //return view('courier::panelsetting');
            //echo 1;
        }
        else
        {
            return view('courier::login');
        }
    }

    public function pages()
    {

        //var_export(Route::current());
        //if (Route::current()->pages)
        if ($this->is_auth())
        {

            $data = config('config');
            //dd (View::getPath());


            $page = Route::current()->pages; 
            $page_name = array_column($data['pages'][$data['language']],$page);
           
           //dd(array_column($data['pages'][$data['language']],$page)); 

            //dd($page_name[0]['name']);
            //dd(array_keys($data['pages'][$data['language']],$page)); 

            

            if (!in_array($page, get_class_methods(get_class())) && $page!='ajax')
                
                if (view()->exists('courier::'.$page))
                {
                    
                   //dd ($data);
                    return view('courier::'.$page, 
                        [ 'user' => Crypt::decrypt(Session::get('k.1')) , 'page_name' => $page_name[0]['name'] , 'data' => $data ] );
                }
                else
                {
                    //dd ($data);
                    abort(404);
                }
        }
        else
        {
            //echo 'test';
            abort(404);
        }


        //Request::url();
    }


    //public function valid_config(Array $data)
   // {
        //сохраниние конфига
    //}


    public function is_auth()
    {
        
        if (Session::get('k')!=null)
        {
            $key = Session::get('k.0');
            $ukey = Crypt::decrypt(Session::get('k.1')).config('config.key');
            
            if (Hash::check($ukey, $key))
            {
                return true;
            }
            //var_export($this->request);
            //$this->check();
            //  создать отдельный класс для сессий
            //echo $this->username;
            else
            {
                //redirect(config('config.url_path'));
                return false;
            }
        }
        else
        {
            //redirect(config('config.url_path'));
            return false;
        }
        //if (Hash::check(Crypt::decrypt(Session::get('u')).''.config('config.key'), Session::get('k')))
            //return true;      
        //else
            //return false;

        //return redirect(config('config.url_path'));
        
            
            //return self::$auth;
    }
    
    public function logout()
    {   
        Session::flush();
        return redirect(config('config.url_path'));
    }



}

        //Session::put(['token', unique()+$request['login']+'']);
        //
        //dd(self::$auth );
        
        //dd($request);
        //echo Hash::make('admin');
        //dd( $this->users[$request['login']]['pass']);
        //echo $request['pass'];
        //echo $this->users[$request['login']]['pass'];

        //echo Hash::make('admin');

        //dd(Hash::check($request['pass'], $this->users[$request['login']]['pass']));
        //dd();

        //dd($this->users[$request['login']]['pass']);
        
        //$this->auth = true;