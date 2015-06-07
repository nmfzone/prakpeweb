<?php

	/**
	 *	
	 * 	Change these configuration and match with your own
	 * 
	*/

	$base_url = 'http://prakpeweb.nmflocal.io';

	$db_connection = [
			'engine'   => 'mysql',
			'host'     => 'localhost',
			'database' => 'alumniuii',
			'user'     => 'root',
			'pass'     => '$!Nabilmuhf29!$'
	];











	$app = new System();
	$db = new Database($db_connection);
	$app->setUrl($base_url);