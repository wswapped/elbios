<?php 
	session_start();
	if(isset($_SESSION['username'], $_SESSION['password'])){
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
		//checking the login
		$user = login($username, $password, false);
		if($user){
			$user_data = get_user($user);

			$user_data['cooperative'] = is_cooperative_leader($user);
			$user_data['cooperativeId'] = is_cooperative_leader($user)['cooperative'];

			//keeping the userId
			$currentUserId = $thisid = $user;
		}else{
			header("location:login.php");
		}
	}else{
		header("location:login.php");
	}
?>