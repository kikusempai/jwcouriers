<?php
abstract class DB {
	public static $timeUsed;
	
	abstract public function __construct($server = 'localhost', $user = 'root', $pass = NULL, $db_name = 'couriresdb');
	
	abstract public function __destruct();
	
	abstract public function query($request);
}

class MySQL_DB extends DB {
	public function __construct($server = 'localhost', $user = 'root', $pass = NULL, $db_name = 'couriresdb') {
		$db = @mysql_connect($server, $user, $pass);
		@mysql_select_db($db_name, $db);
	}
	
	public function __destruct() {
		@mysql_close();
	}
	
	public function query($request) {
		$start_time = microtime();
		$query = @mysql_query($request);
		DB::$timeUsed = microtime() - $start_time;
		return $query;
	}
}

class BlogEditor extends MySQL_DB {
	public function add($subject, $image = NULL, $text) {
		$this->query('INSERT INTO `lab8_blog` VALUES (NULL, NULL, "'.$subject.'", "'.$image.'", "'.$text.'")');
	}
	
	public function delete($id) {
		$this->query('DELETE FROM `lab8_blog` WHERE `id` = "'.$id.'"');
	}
	
	public function edit($id, $subject, $text) {
		$this->query('UPDATE `lab8_blog` SET `subject`="'.$subject.'", `text`="'.$text.'" WHERE `id`="'.$id.'"');
	}
}
?>