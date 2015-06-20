<?php

	$DIR_PATH = realpath(dirname(__FILE__));
	
	function autoload($className)
	{
		$DIR_PATH = realpath(dirname(__FILE__)). '/../';
	    $className = strtolower(ltrim($className, '\/'));
	    $fileName  = '';
	    $namespace = '';
	    if ($lastNsPos = strripos($className, '\/')) {
	        $namespace = substr($className, 0, $lastNsPos);
	        $className = substr($className, $lastNsPos + 1);
	        $fileName  = str_replace('\/', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
	    }
	    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
	 
	    require $DIR_PATH . $fileName;
	}

	autoload('System/Database');
	autoload('System/Authentication');
	autoload('System/System');
	autoload('System/Equipment');

	include($DIR_PATH . '/app.php');
	include($DIR_PATH . '/detil.php');
	include($DIR_PATH . '/auth.php');
	
