<?php
	$dbName = 'elbios';
	$con = $conn = new mysqli('localhost', 'elbios', '5rReqJs5lthAFUNJ', $dbName);
	if(!$conn){
		die("Connection error ".$conn->connect_error);
	}
	date_default_timezone_set("Africa/Kigali");
	// $conn->query("SET timezone = '+2:00'");
?>