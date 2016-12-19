<?php
namespace Aniqi\Adminiqi\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Input;
//use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
//use Illuminate\Support\Facades\Session;
//use Illuminate\Support\Facades\Crypt;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class DataController extends BaseController
{
    
    public function ajax_handler(){
        
      //$data_old = read_config()
        

   
    $data =  $_POST['data'];
    return $this->save_config($data);
    //somecodes


      //data => [dfsdfsd] => []


      //$data == $data_old();

        //save_config($data)
    }


    public function save_config($data_ajax){


    

    $file =  __DIR__.'/../../config.php';
    // Открываем файл для получения существующего содержимого
    $data = file_get_contents($file);
    
    
    foreach ($data_ajax as $key => $value)//for ($i = 0; $i < count($keys); $i++) //передвижение по ключам // и количество //next()
    {
                
        $value_new = $value; 
        
        $pos  =  strpos($data, $key); //позиция ключа
        
        //echo $pos.'<br>';

        if (!empty($pos)) //наличие ключа
        {
            if (!is_array($value_new))
            {

                $pos_start = strpos($data, '=>', $pos); //поиск начала значения


                
                 $pos_1 = strpos($data, ',', $pos_start);//поиск конца значения  
                 $pos_2 = strpos($data, ']', $pos_start);  
                if ($pos_1<$pos_2)//сравнить что ближе ] или ,
                    $pos_end = $pos_1; 
                else
                    $pos_end = $pos_2; 

                //!!!!!!!!!!!!!!!!!!!
                //проверить что перед , идет ' или "
                //проверить что перед ] идет ' " или ,
                //то вернуть ошибку
                //if ()
                {

                $value_old =  substr($data, $pos_start+2, $pos_end-($pos_start+2)) ;


                $data = substr_replace( $data , '\''.$value_new.'\'' , $pos_start+2 , $pos_end-($pos_start+2) );
                //$data_new = substr_replace($data_file, $new_value, $pos, strlen($new_value));
                }

            }
            else
            {
                //var_dump($values[$i]);
                
                $pos_start = strpos($data, $key);

                foreach ($value as $k => $v)
                {
                    //echo $key.'<br>';

                    if(!is_array($v)) //проверка наличия ключа/уровня
                    {      
                        //echo $k.' - '.$v.'<br>';
                        //var_dump($value);
                        //echo '<br>';
                        $pos_v_1 = strpos($data, '=>', $pos_start);
                        $pos_v_start = strpos($data, '[', $pos_v_1);
                        $pos_v_end = strpos($data, ']', $pos_start);

                        $value_old =  substr($data, $pos_v_start+1, $pos_v_end-($pos_v_start+1)) ;
                        $value_new = implode("','", $value);
                        $value_new =  '\''.$value_new.'\'';
                        $data = substr_replace( $data , $value_new , $pos_v_start+1 , $pos_v_end-($pos_v_start+1) );
                        
                        //echo $data  .'<br>';

                        break;
                    }
                    else
                    {
                        
                        $pos_start_1 = strpos($data, $key, $pos_start);
                        
                        //echo $k.' - '.'<br>';

                        //foreach ($value as $k2 => $v2)
                        //{
                            //$pos_key2  =  strpos($data, key($values[$i][$values[$i]]));
                        //}
                   }
                }
                    

                   






            }


        }
    }

    // пишем содержимое обратно в файл
    file_put_contents($file, $data);

     return response()->json([
        'success' => true,
        'msg'=> 'Данные сохранены',
        'data'  => $data_ajax
    ]);


    }

    public function read_config(){

    }

}
/*  
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

        	

            if (!in_array($page, get_class_methods(get_class())))
        		
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
            abort(404);
        }


    	//Request::url();
    }

    public function save_config(Array $data)
    {
        //проверка конфига

        //Storage::put('avatars/1', $fileContents);
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
        */