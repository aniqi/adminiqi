
@extends('courier::template')

@section('title', $page_name)

@section('header')



@section('h1') 


@section('h1_name')
{{ $page_name }}
@endsection


@section('content')
        <h3>Режим обслуживания сайта:</h3>
        <p><input name="maintenance_mode" class="toggle-switch" type="checkbox" id="switch-1" {{ ($data['maintenance_mode'])?'checked':'' }}/> <label for="switch-1">Режим обслуживания</label></p>
        <br>
        <h3>Разрешенные IP-адреса:</h3>     
            <p>                 
                <div class="input-text"> 
                <textarea name="allowed_ips" onkeyup="textAreaAdjust(this)" tooltip="привет это подсказка" required>
                	{{ implode("\n", $data['allowed_ips']) }}
                </textarea>     
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Список IP-адресов</label>
                </div>
            </p>
            <button>Сохранить изменения</button>  
            <button ajax="allowed_ips">Сохранить изменения</button>

@endsection

@section('footer')
