<?php

	abstract class DB
	{
		abstract function __construct($address, $login, $password, $db_name);

		abstract function __destruct();
			// select db
		abstract function choose_db($db_name);
			// executing query
		abstract function execute_query($query);
			// database hadler
		public $db_handler;
			// current databse name (in use)
		public $cur_dbName;
			// last query execution time
		public static $query_exec_time = 0;

		public static $executions = 0;
	}

	class Mysql_DB extends DB
	{
			// constructor
		function __construct($address, $login, $password, $db_name)
		{
				// connecting to database
			$this->db_handler = @mysql_connect($address, $login, $password);
				// handling connection errors
			if (!$this->db_handler) {
				echo "<p> Failed to connect to database server</p>";
				exit();
			}
				// selecting db
			$this->choose_db($db_name);
		}
			// destructor
		function __destruct() {
			mysql_close($this->db_handler);
		}
			// selecting DB
		function choose_db($db_name) {
							// selecting table and handling selection erros
			if (!@mysql_select_db($db_name, $this->db_handler)) {
				echo "<p> Failed to select table. Your database might be empty </p>";
				return False;
			}
			else {
				$this->cur_dbName = $db_name;
				return True;
			}

		}

			//executing query
		function execute_query($query) {
			$query_handle = mysql_query($query);
			DB::$query_exec_time = $end - $start;
			parent::$executions++;
			if (!$query_handle) {
				echo "can't execute this query";
				echo $query;
			}
			return $query_handle; 
		}
	}

	
?>