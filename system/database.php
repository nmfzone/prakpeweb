<?php

namespace System;

use \PDO;

class Database extends \PDO
{
	protected $engine;
    protected $host;
    protected $database;
    protected $user;
    protected $pass;
	
	/**
	*	The class constructor.
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
	/*
    *	Insert values into the table
    */
	public function insert($table, $rows = NULL)
	{
		$command = 'INSERT INTO ' . $table;
		$row     = NULL;
		$value   = NULL;

		foreach ($rows as $key => $nilai)
		{
			$row   .= "," . $key;
			$value .= ", :" . $key;
		}

		$command .= "(" . substr($row, 1) . ")";
		$command .= "VALUES(" . substr($value, 1) . ")";

		$stmt = parent::prepare($command);
		$stmt->execute($rows);

		return $stmt->rowCount();
	}
	
	/*
    *	Delete records from the database.
    */
	public function delete($tabel, $where = NULL)
	{
		$command   = 'DELETE FROM ' . $tabel;
		$parameter = NULL;

		$list = [];

		foreach ($where as $key => $value)
		{
			$list[]    = "$key = :$key";
			$parameter .= ', ":' . $key . '":"' . $value . '"';
		}

		$command .= ' WHERE ' . implode(' AND ', $list);
		$json    = "{" . substr($parameter, 1) . "}";
		$param   = json_decode($json, true);
				
		$query = parent::prepare($command); 
		$query->execute($param);

        return $query->rowCount();
	}
	
	/*
    *	Update Record
    */
	public function update($tabel, $field = NULL, $where = NULL)
	{
		$update = 'UPDATE ' . $tabel . ' SET ';
		$set    = NULL;
		$value  = NULL;

		foreach($field as $key => $values)
		{
			$set   .= ', ' . $key . ' = :' . $key;
			$value .= ', ":' . $key . '":"' . $values . '"';
		}

		$update .= substr(trim($set), 1);
		$json   = '{' . substr($value, 1) . '}';
		$param  = json_decode($json, true);

		if ($where != NULL) $update .= ' WHERE ' . $where;

		$query = parent::prepare($update);
		$query->execute($param);

		return $query->rowCount();
    }
	
	
	/*
    *	Selects information from the database.
    */
	public function select($table, $rows = NULL, $where = NULL, $order = NULL, $limit = NULL)
	{
		if (trim($rows) == '' || $rows == NULL) $rows = '*';

	    $command = 'SELECT ' . $rows . ' FROM ' . $table;
        if ($where != NULL || trim($where) != '') $command .= ' WHERE ' . $where;
        if ($order != NULL || trim($order) != '') $command .= ' ORDER BY ' . $order;
        if ($limit != NULL || trim($limit) != '') $command .= ' LIMIT ' . $limit;
			
		$query = parent::prepare($command);
		$query->execute();

		$results = [
			'query' => $query,
			'result' => $query->fetchAll(PDO::FETCH_OBJ)
		];

		return $results;
	}

}