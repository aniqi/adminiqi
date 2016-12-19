<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>@yield('title')</title>
  <meta name="author" content="Andery Niqi" />
  <meta name="description" content="Administrator web-site panel" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  {{--<!--<meta name="keywords"  content="aniqi, adminiqi, admin, panel, website, site" />-->--}}
  <meta name="Resource-type" content="Document" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{--<!--<link rel="icon" href="icon.ico">-->--}}

  <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i|Roboto:300,400&amp;subset=cyrillic" rel="stylesheet">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
  {{--<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->--}}
  {{--<!--<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>-->--}}
  



   <link rel="stylesheet" type="text/css" href="{{asset('/aniqi/adminiqi/css/app.css')}}"/> 
   <script type="text/javascript" src="{{'/aniqi/adminiqi/js/app.js'}}"></script>
   <!--<script type="text/javascript" src="{{asset('/aniqi/adminiqi/js/app.js')}}"></script>-->
  

</head>


<body>


<section id="content" class="page-wrap">

@section('header')
<section id="header">  
    <div class="container">
        <div class="box">
             <div id="logo" class="inline"><img src="{{asset('/aniqi/adminiqi/img/adminiqi.svg')}}" alt="logo adminiqi"></div> 
            <div id="menu" class="inline">
                <ul id="menu-standart">
                    
                    {{--<!--foreach 1-->--}}

                    @foreach ( $data['pages'][($data['language'])] as $listname => $pages )
                    
                    <li>
                        <span class="submenu-name">{{ $listname }}</span>
                        <ul class="submenu c1">
                          
                          @foreach ( $pages as $url => $pagedata ) 

                            <li><a href="{{ url($data['url_path'].'/'.$url) }}" class="red">{{ $pagedata['name'] }}</a></li>
                            
                          @endforeach

                        </ul>
                    </li>
                    @endforeach


                    {{--<!--
                    <li>
                        <span class="submenu-name">+Menu1</span>
                        <ul class="submenu c1">
                            <li>+page7Menu1</li>
                            <li>+page6Menu1</li>
                            <li>+page5Menu1</li>
                            <li>+page4Menu1</li>
                        </ul>
                    </li>
                    <li class="menu-not-active">+Menu2</li>
                    <li>+Menu3</li>
                    <li>+Menu4</li>
                    <li>+Menu5</li>
                    <li>
                        <span class="submenu-name">+Menu6</span>
                        <ul class="submenu c1">
                            <li>+page1Menu6</li>
                            <li>+page2Menu6</li>
                            <li>+page3Menu6</li>
                            <li>+page10Menu6</li>
                        </ul>
                    </li>
                    <li>+Menu7</li>
                    <li>
                        <span class="submenu-name">+Menu8</span>
                        <ul class="submenu c1">
                            <li>+page1Menu8</li>
                            <li>+page2Menu8</li>
                            <li>+page3Menu8</li>
                            <li>+page4Menu8</li>
                        </ul>
                    </li>
                    <li >+Menu9</li>
                    <li>+Menu10</li>
                    <li>
                        <span class="submenu-name">+MenuLongSuperName000011</span>
                        <ul class="submenu c1">
                            <li>+page1MenuLongSuperName000011</li>
                            <li>+page2Menu11</li>
                            <li>+page3Menu11</li>
                            <li>+page4Menu11</li>
                        </ul>
                    </li>
                    -->--}}
                </ul>
                <div id="prepend">•••</div>
                <ul class="menu-prepend"></ul>
                
            </div>
            <div id="login" class="inline">
                <ul>
                    <li id="login-name">{{ $user }}</li>
                    <li><a href="{{ url($data['url_path'].'/logout') }}" class="red">✖</a></li>
                </ul>
            </div>
        </div>    
    </div>

</section>
@show
    <div class="container">
        @section('h1')    
        <h1 class="h">@yield('h1_name')</h1>
        <hr/>
        @show
        <div class="c">
        @yield('content')
        {{--<!--<h3>Пример заголовка</h3>
          <p>Проснувшись однажды утром после беспокойного сна, Грегор Замза обнаружил, что он у себя в постели превратился в страшное насекомое. Лежа на <a href="#">это образец ссылки</a> панцирнотвердой спине, он видел, стоило ему приподнять голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот, на верхушке которого еле держалось готовое вот-вот окончательно сползти одеяло. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами. «Что со мной случилось?» – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Над столом, где были разложены распакованные образцы сукон – Замза был коммивояжером, – висел портрет, который он недавно вырезал из иллюстрированного журнала и вставил в красивую золоченую рамку. На портрете была изображена дама в меховой шляпе и боа, она сидела очень прямо и протягивала зрителю тяжелую меховую муфту, в которой целиком исчезала ее рука. Затем взгляд Грегора устремился в окно, и пасмурная погода – слышно было, как по жести подоконника стучат капли дождя – привела его и вовсе в грустное настроение. «Хорошо бы еще немного поспать и забыть всю эту чепуху», – подумал он, но это было совершенно неосуществимо, он привык спать на правом боку, а в теперешнем своем
            </p>
            
            <h3>Checkboxes</h3>
            <p><input type="checkbox" id="checkbox-1" checked="checked" /> <label for="checkbox-1">Some label</label></p>
            <p><input type="checkbox" id="checkbox-2" /> <label for="checkbox-2">Some label2</label></p>
            <p><input type="checkbox" id="checkbox-3" /> <label for="checkbox-3">Some label3</label></p>
            
 
            <h3>Radio buttons</h3>
            <p><input name="radio" type="radio" id="radio-1" checked="checked" /> <label for="radio-1">Some label</label></p>
            <p><input name="radio" type="radio" id="radio-2"/> <label for="radio-2">Some label2</label></p>
            <p><input name="radio" type="radio" id="radio-3" /> <label for="radio-3">Some label3</label></p>
            

            <h3>Toggle switch</h3>
            <p><input class="toggle-switch" type="checkbox" id="switch-1" /> <label for="switch-1">Some label</label></p>

            <h3>Number</h3>
            <p><input type="number" name="quantity" min="1" max="500" value="10" tooltip="привет это подсказка2"/></p>


            <h3>Text</h3>     
            <p>
                <div class="input-text">      
                  <input type="text"  tooltip="привет это еще подсказка" required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Имя пользователя</label>
                </div>
                  
                <div class="input-text">      
                  <input type="password"  tooltip="привет это подсказка" required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Пароль</label>
                </div>
            </p>


            <h3>Кнопка</h3>     
            <button>Войти</button>

            <h3>Таблица</h3>     
            <table>
                <tr>
                    <th width="100px">ДАТА</th>
                    <th>ДЕТАЛИ ОПЕРАЦИЙ</th>
                    <th>СУММА</th>
                </tr>
                <tr>
                    <td><small>30 декабря 2016 22:46</small></td>
                    <td><green>Пополнение с VISA</green></td>
                    <td><green>+ 1000 рублей<green></td>
                </tr>
                <tr>
                    <td><small>3 декабря 2016 21:15</small></td>
                    <td><red>Снятие со счёта</red></td>
                    <td><red>- 5560 рублей</red></td>
                </tr>
                <tr>
                    <td><small>29 ноября 2016 22:46</small></td>
                    <td>Возврат на счет</td>
                    <td>+ 130 рублей</td>
                </tr>
                <tr>
                    <td><small>29 ноября 2016 12:46</small></td>
                    <td>Возврат на счет</td>
                    <td>+ 1100 рублей</td>
                </tr>
            </table>
          -->--}}
        
           
           
       </div>
    </div>
</section>
@section('footer')
<section id="footer" class="site-footer u-max-full-width">
<div class="container">  
    <p>Copyright © 2016 Niqi Studio</p>
    </div>
</section>
@show
  
</body>
</html>