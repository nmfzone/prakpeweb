<?php

class Authentication extends Database {

	protected $table = 'users';

	protected $identity = 'username';

	/**
	 * 	Authenticating users
	 *
	 *	@param $username, $password
	 * 	@return int UserRole
	 */
	public function login($username, $password)
	{
		$where =  $this->identity . " = '" . $username . "' AND password = '" . md5($password) . "'";
		$try = $this->select($this->table, 'role', $where);

		if ($try['query']->rowCount() > 0)
		{
			foreach ($try['result'] as $data) {
				$role = $data->role;
			}

			$this->authenticate($username, $role);

			return $role;
		}
		
		return "User Not Found!";

	}

	/**
	 *	Signing Users
	 * 
	 * 	@param  $username
	 * 	@return void
	 */
	protected function authenticate($username, $role)
	{
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['role'] = $role;
	}

	/**
	 *	Set the credentials that using by Authentication
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
	 * 	Check the viewer is have session or not
	 * 
	 * 	@return boolean
	 */
	public function check()
	{
		return $this->isIssetSessionUsername() && $this->isIssetSessionRole();
	}

	/**
	 * 	To check viewer is admin or not
	 * 
	 * 	@return boolean
	 */
	public function isAdmin()
	{
		return $this->getSessionRole() == 1;
	}

	/**
	 * 	To check viewer is user or not
	 * 
	 * 	@return boolean
	 */
	public function isUser()
	{
		return $this->getSessionRole() == 0;
	}

	/**
	 * 	To check is viewer allowed to view the page or not
	 * 
	 * 	@return boolean
	 */
	public function isAllowed($areas)
	{
		if (strcmp($areas, "AdminPage"))
		{
			return $this->isAdmin();
		}
		else if (strcmp($areas, "UserPage"))
		{
			return $this->isAdmin() || $this->isUser();
		}

		$app = new System();

		return $app->redirect('/');
	}

	/**
	 * 	Get the name of the User
	 * 
	 * 	@return string 		Name of user
	 */
	public function getName()
	{
		if ($this->check())
		{
			session_start();
			$where =  $this->identity . " = '" . $this->getSessionUsername() . "' AND role = " . $this->getSessionRole();
			$try = $this->select($this->table, 'name', $where);

			if ($try['query']->rowCount() > 0)
			{
				foreach ($try['result'] as $data) {
					$name = $data->name;
				}

				return $name;
			}
		}
	}

	/**
	 * 	Get the Username from Session
	 * 
	 * 	@return string 		Session Username
	 */
	public function getSessionUsername()
	{
		if ($this->isIssetSessionUsername())
		{
			session_start();
			return $_SESSION['username'];
		}
	}

	/**
	 * 	Get the Role from Session
	 * 
	 * 	@return string 		Session Role
	 */
	public function getSessionRole()
	{
		if ($this->isIssetSessionRole())
		{
			session_start();
			return $_SESSION['role'];
		}
	}

	/**
	 * 	To check is Session Username empty or not
	 * 
	 * 	@return boolean
	 */
	public function isIssetSessionUsername()
	{
		session_start();
		return isset($_SESSION['username']);
	}

	/**
	 * 	To check is Session Role empty or not
	 * 
	 * 	@return boolean
	 */
	public function isIssetSessionRole()
	{
		session_start();
		return isset($_SESSION['role']);
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
		unset($_SESSION['role']);
		$app = new System();

		return $app->redirect('/');
	}

}