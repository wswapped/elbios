<?php
	$dbName = 'elbios';
	$con = $conn = new mysqli('localhost', 'elbios', '5rReqJs5lthAFUNJ', $dbName);
	if(!$conn){
		die("Connection error ".$conn->connect_error);
	}
	// $conn->query("SET timezone = '+2:00'");
?>