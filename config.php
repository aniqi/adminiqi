<?php

return
[
	
	//yoursite.com/#url_path#
	'url_path' => 'admin',

	// language panel "en" or "ru" 
	'language' => 'en',

	//menu panel
	'pages'=> [	

		'en' => 

		[


			'Сonfiguration'=> 
			[

				'panelsetting'=>
				[ 
					'name'=>'Panel Settings',
					//'contained' =>

				],


				'maintenance'=>
				[ 
					'name'=>'Maintenance Mode',
				],


				'administration'=>
				[ 
					'name'=>'Administration',
				],

				'sitesetting'=>
				[ 
					'name'=>'Site Settings',

				],


			],

			'Demo pages'=>
			[
				'adminpage/generation'=>
				[
					
					'name' => 'Adminpage Generation',
					'content' => 
					[
						'table' => 
						[
							'name' => 'table_name',
							'type' => 'db',
							//'type' => 'data',
							'table_content' => 
							[
								'db_tablename' => 
								[

									'db_rowname' => 'edit',
									'db_rowname' => 'view',
								],
							],
						],
						'button' => 
						[
							'name' => 'button_name',
							'type' => 'ajax',
							//'type' => 'url',
						],
					],
				],
			],

		],
		
		
		'ru' =>

		[
			'Общие настройки'=> 
			[

				'panelsetting'=>
				[ 
					'name' => 'Настройки Панели',

				],

				'maintenance'=>
				[ 
					'name' => 'Режим обслуживание',
				],

				'administration'=>
				[ 
					'name' => 'Администрирование',
				],

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
			'pass'=> '$2y$10$aDt9Dgd2CDdEPq3MCu2dVO7azAhmuDJWRgDOsByIUyFGKrnjMIXrO',

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
	'maintenance_mode' =>'1',

	// Secure Login by ip (allow_ips)
	'login_allow_ips' => 1,
	// uses for maintenance mode
	'allowed_ips' => ['127.0.0.1','192.168.1.1','188.122.241.113'],

	// uses for access to the adminiqi //or ['192.168.1.7','192.168.1.8','127.0.0.1'],
	'allowed_adminiqi_ips' => 'all',
	
	// uses for blocked site client ips
	'blocked_ips' => ['127.0.0.1', '192.168.1.7', '192.168.1.8', ],

	'key' =>     '+2y}10H4f7Gzb1hf78YSl!oJauF1nHD4eDCqmRnx.0=ZqBnLM76WNUaysTsG%9FmBy'   ,

];
