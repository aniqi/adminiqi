<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">


<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Вход в панель администрирования</title>
  <meta name="author" content="Andery Niqi" />
  <meta name="description" content="Administrator web-site panel" />
  <meta name="Resource-type" content="Document" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i|Roboto:300,400&amp;subset=cyrillic" rel="stylesheet">  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="{{asset('/aniqi/adminiqi/css/app.css')}}"/> 
  <script type="text/javascript" src="{{asset('/aniqi/adminiqi/js/app.js')}}"></script>
 
  <style type="text/css">

   button{
    background-color: #364050;
   }
   #logotip img{
    width: 140px;
    margin-top: 100px;
   }

  </style>

</head>


<body>






<div id="input-block">


        <form method="POST">
          <p id="logotip"><img  src="{{asset('/aniqi/adminiqi/img/adminiqi.svg')}}" alt="logo adminiqi"></p>
        	   <p>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="input-text center">      
                  <input type="text"  name="login" tooltip="Для входа в панель введите имя и пароль" required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Имя пользователя</label>
                </div>
                  
                <div class="input-text center">      
                  <input type="password"  name="pass" required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Пароль</label>

                </div>
                <button type="submit" formaction="{{config('config.url_path')}}">Войти</button>
            </p>
        </form>
</div>

</body>
</html>