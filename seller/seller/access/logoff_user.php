<?php
session_start();
if(!isset($_SESSION['user_id']) && !isset($_SESSION['names']) && !isset($_SESSION['user_type'])){
	header("Location: login");
}else{
	include_once '../class_loader.php';
	$user_id=$_SESSION['user_id'];
	$isUserOnline=$seller->isOnline($user_id,false);
	if($isUserOnline){
		unset($_SESSION['user_id']);
		unset($_SESSION['names']);
		unset($_SESSION['user_type']);

		session_destroy();

		header("Location: login");
	}else{
		echo "403";
	}
}
?>