<?php

	//quickly set timezone - just incase it isn't set in php.ini
	date_default_timezone_set('America/New_York');
 
 	//DB credentials
	$db_host = "localhost";
	$db_user = "";
	$db_pass = "";
	$db_name = "amp";
 
 	// Create connection
	$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
 
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
 
?>