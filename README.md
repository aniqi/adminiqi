# Adminiqi - web-site administarator panel
# version 0.0.1
# package for Laravel 5.3



## Add in config/app.php 
```
	'providers' => [
	...
		/*
       		* Package Service Providers...
    	*/

        Aniqi\Adminiqi\AdminiqiServiceProvider::class,

    ...
```

## Install

in file composer.json 

``` bash
"aniqi/adminiqi": "master-dev"
```

## Composer command

``` bash
composer update
```

## PHP Artisan command

``` bash
php artisan vendor:publish
```
