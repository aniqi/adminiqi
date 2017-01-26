# Adminiqi - web-site administarator panel
# version no work!!! (test mode)
0.1


## Add in config/app.php 
```
	'providers' => [
	...
		/*
       		* Package Service Providers...
    	*/

        Aniqi\Adminiqi\AdminiqiServiceProvider::class,
        Aniqi\Adminiqi\CheckForMaintenanceMode::class,

    ...
```

## Install

Via Composer

``` bash
"aniqi/adminiqi": "master-dev"
```
aniqi/adminiqi/css/app.css


## PHP Artisan command

```php artisan vendor:publish
```
