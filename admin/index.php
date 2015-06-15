<?php
	include("../config/autoload.php");
	session_start();
	$auth->isAllowed("AdminPage");
?>
