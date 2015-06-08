<?php

	include("config/autoload.php");

	if (isset($_POST['username']) && isset($_POST['password']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$role = $auth->login($username, $password);

		echo $role;
	}
	else
	{
		$app->redirect('/');
	}