<?php
session_start();
if(!isset($_SESSION['id']) && !isset($_SESSION['user'])){
	header("Location: access");
}else{
	unset($_SESSION['id']);
	unset($_SESSION['user']);
	session_destroy();
	header("Location: access");
}
?>