<?php
	include("../../config/autoload.php");
	session_start();
	$auth->isAllowed("AdminPage");
	
	/**
	 * 	Store Post to Database
	 */
	if (isset($_POST['actionType']) && strcmp($_POST['actionType'], "create") == 0)
	{
		if (isset($_POST['type']) && strcmp($_POST['type'], "article") == 0)

		$rows = [
			'title'        => $_POST['title'],
			'contents'     =>  $_POST['contents'],
			'type'         => $_POST['type'],
			'id_user'      => $auth->get()->id,
			'published_at' => date('Y-m-d H:i:s'),
			'updated_at'   => date('Y-m-d H:i:s')
		];

		$save = $db->insert('articles', $rows);

		if ($save > 0)
		{
			echo "1";
		}
		else
		{
			echo "Can't Insert Article to Database!";
		}
	}

	/**
	 * 	Editing Post
	 */
	if (isset($_POST['actionType']) && strcmp($_POST['actionType'], "edit") == 0)
	{
		
	}

	/**
	 * 	Delete Post from Database
	 */
	if (isset($_POST['actionType']) && strcmp($_POST['actionType'], "delete") == 0)
	{
		
	}