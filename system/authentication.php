<?php

class Authentication extends Database {

	protected $table = 'users';

	protected $identity = 'username';

	/**
	 * 	Authenticating users
	 *
	 *	@param $username, $password
	 * 	@return void
	 */
	public function login($username, $password)
	{
		$where =  $this->identity . " = '" . $username . "' AND password = '" . md5($password) . "'";
		$try = $this->select($this->table, 'role', $where);

		if ($try['query']->rowCount() > 0)
		{
			$this->authenticate($username);
		}
		else
		{
			return "User Not Found!";
		}

		foreach ($try['result'] as $data) {
			$results = $data->role;
		}

		return $results;
	}

	/**
	 *	Signing Users
	 * 
	 * 	@param  $username
	 * 	@return void
	 */
	public function authenticate($username)
	{
		session_start();
		$_SESSION['username'] = $username;
	}

	/**
	 *	Set the Credentials that using by Authentication
	 *
	 * 	@param $table, $identity
	 * 	@return void
	 */
	public function setAuthDetails($table, $identity)
	{
		if ($table != '')
		{
			$this->table = $table;
		}

		if ($identity != '')
		{
			$this->identity = $identity;
		}
	}

	/**
	 * 	Check the user is have session or not
	 * 
	 * 	@return void
	 */
	public function check()
	{
		if (isset($_SESSION['username'])) return $_SESSION['username'] != '';
	}

	/**
	 *	Logout the User
	 * 
	 * 	@return void
	 */
	public function logout()
	{
		session_start();
		unset($_SESSION['username']);
		$app = new System();

		return $app->redirect('/');
	}

}