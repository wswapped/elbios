<?php
if(isset($_POST['email']) && isset($_POST['password'])){
	include_once '../class_loader.php';
	//sanitize input data
	$email=$function->sanitize($_POST['email']);
	$password=$function->sanitize($_POST['password']);
	$user_id="";
	$names="";
	$user_type="";
	//validate user
	$validate_state=$seller->validateUser($email,$password);
	if($validate_state){
		//get user session data
		$session_data=array();
		$session_data=$seller->sessionData($email,$password);
		session_start();
		foreach ($session_data as $key => $value) {
			$user_id=$value['id'];
			$names=$value['name'];
			$user_type=$value['user_type'];
		}
		$isUserOnline=$seller->isOnline($user_id,true);
		if($isUserOnline){
			$_SESSION['user_id']=$user_id;
			$_SESSION['names']=$names;
			$_SESSION['user_type']=$user_type;

			echo "200";
		}else{
			echo "403";
		}
	}else{
		echo "500";
	}
}else{
	echo "500";
}
?>