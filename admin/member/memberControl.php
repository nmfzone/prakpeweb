<?php
	include("../../config/autoload.php");
	session_start();
	$auth->isAllowed("AdminPage");
	
	/**
	 * 	Store Post to Database
	 */
	if (isset($_POST['actionType']) && strcmp($_POST['actionType'], "create") == 0)
	{
		$rows = [
			'judul'        => $_POST['title'],
			'isi'          =>  $_POST['contents'],
			'type'         => $_POST['type'],
			'id_user'      => $auth->get()->id,
			'published_at' => date('Y-m-d H:i:s'),
			'last_edited'  => date('Y-m-d H:i:s')
		];

		$save = $db->insert('artikel', $rows);

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
		$rows = [
			'judul'        => $_POST['title'],
			'isi'          =>  $_POST['contents'],
			'id_user'      => $auth->get()->id,
			'last_edited'  => date('Y-m-d H:i:s')
		];

		$save = $db->update('artikel', $rows, 'id = ' . $_POST['id']);

		if ($save > 0)
		{
			echo "1";
		}
		else
		{
			echo "Can't Update Article to Database!";
		}
	}

	/**
	 * 	Delete Post from Database
	 */
	if (isset($_POST['actionType']) && strcmp($_POST['actionType'], "delete") == 0)
	{
		$where = [
			'id' => $_POST['id']
		];

		$save = $db->delete('artikel', $where);

		if ($save > 0)
		{
			echo "1";
		}
		else
		{
			echo "Can't Delete Article from Database!";
		}
	}