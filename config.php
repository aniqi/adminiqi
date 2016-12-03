<?php

return
[
	
	//yoursite.com/#url_path#
	'url_path' => 'admin',

	// language panel "en" or "ru" 
	'language' => 'ru',

	//menu panel
	'menu'=> [	

		'en' => 

		[
			'Сonfiguration'=> 
			[
				'Panel Settings'=> '#urlpage',
				'Maintenance Mode'=> '#urlpage',
				'Administration'=> '#urlpage',
			],

		],
		
		
		'ru' =>

		[
			'Общие настройки'=> 
			[
				'Настройки Панели'=> '#urlpage',
				'Режим обслуживание'=> '#urlpage',
				'Администрирование'=> '#urlpage',
			],
		],
		

	],

	

	//privileges user admin panel
	'privileges' =>
	[
		'administrator',
		
		'user'=>
		[
			// обозначить доступ к меню
		],
		
		'privilege_name'=>
		[
			// пример дополнительной привилегии
		],
	],
	


	//users admin panel
	'users'=>
	[
		'admin' => 
		[
			'privilege' => 'administrator',
			'pass'=> '',

		],
		'username' => 
		[
			'privilege' => 'user',

		],
		'username2' => 
		[
			'privilege' => 'privilege_name',

		],

	],

	// uses for maintenance mode
	'allowed_ips' => ['127.0.0.1', '::1'],

	// uses for blocked client ips
	'blocked_ips' => ['127.0.0.1', '::1'],

];
