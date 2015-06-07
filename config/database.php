<?php

class Database extends PDO {

	private $engine;
    private $host;
    private $database;
    private $user;
    private $pass;
	
	/**
	 * The class constructor.
	*/
	function __construct($data)
	{
		$this->engine   = $data['engine'];
		$this->host     = $data['host'];
		$this->database = $data['database'];
		$this->user     = $data['user'];
		$this->pass     = $data['pass'];
		
        $dns = $this->engine.':dbname='.$this->database.";host=".$this->host;
        parent::__construct( $dns, $this->user, $this->pass );
	}

}