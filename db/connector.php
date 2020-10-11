<?php

final class Connector {

    private $_connection;
	private static $_instance; //The single instance
	private $_host = "localhost";
	private $_username = "";
	private $_password = "";
	private $_database = "projects_db";

	/*
	Get an instance of the Database
	@return Instance
	*/
	public static function getInstance() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	// Constructor
	private function __construct() {
		$this->_connection = new SQLite3($_SERVER['DOCUMENT_ROOT'].'/db/projectsDB.db');

	
		 //Error handling
		if(mysqli_connect_error()) {
			trigger_error("Failed to conencto to MySQL: " . mysqli_connect_error(), E_USER_ERROR);
		}
	}

	// Magic method clone is empty to prevent duplication of connection
	private function __clone() { }

	// Get mysqli connection
	public function getConnection() {
		return $this->_connection;
	}
}
?>