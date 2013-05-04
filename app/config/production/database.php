<?php

return array(
	'fetch' => PDO::FETCH_CLASS,
	'default' => 'mysql',
	'connections' => array(
		'mysql' => array(
			'driver'    => 'mysql',
			'host'      => $_SERVER["DB1_HOST"],
			'database'  => $_SERVER["DB1_NAME"],
			'username'  => $_SERVER["DB1_USER"],
			'password'  => $_SERVER["DB1_PASS"],
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
			'port' 		=> $_SERVER["DB1_PORT"]
		)
	),
	'migrations' => 'migrations',
	'redis' => array(
		'cluster' => true,
		'default' => array(
			'host'     => '127.0.0.1',
			'port'     => 6379,
			'database' => 0,
		),
	),
);
