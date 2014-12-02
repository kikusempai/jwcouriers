<?php
		// connecting to database
	$db_handler = @mysql_connect("localhost", "root", NULL);
		// handling connection errors
	if (!$db_handler) {
		echo "alert('Failed to connect to database server')";
		exit();
	}
		// selecting table and handling selection erros
	if (!@mysql_select_db("couriersdb", $db_handler)) {
		echo "alert('Failed to select table')";
		exit();
	}

	$query = "SELECT * FROM user where email = '".$_REQUEST['login']."';";
	$query_handle = mysql_query($query);
	if (!$query_handle) {
		echo "alert('failed to execute query')";
		exit();
	}

	if (mysql_num_rows($query_handle))
		echo "true";
	else
		echo "false";
?>