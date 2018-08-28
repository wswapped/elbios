<?php 
sleep(10);
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['id_number'])){
	require 'db.php';
	include 'Cooperative.php';
	$firstname=mysqli_real_escape_string($con,$_POST['firstname']);
	$lastname=mysqli_real_escape_string($con,$_POST['lastname']);
	$id_number=mysqli_real_escape_string($con,$_POST['id_number']);
	$phone=mysqli_real_escape_string($con,$_POST['phone']);
	$residence=mysqli_real_escape_string($con,$_POST['residence']);
	$co_id=mysqli_real_escape_string($con,$_POST['co_id']);

	//check if cooperative existst and check if user phone or id not exi
	$state=$cooperative->check_cooperative($co_id);
	if($state==true){
		$status=$cooperative->check_member($phone,$id_number);
		if($status==false){
			//now we can save the user records
			$save=$cooperative->save_member($firstname,$lastname,$id_number,$phone,$residence,$co_id);
			if($save){
				echo "1";// 1 stands for data saved successfully.
			}else{
				echo "2"; //2 stands for system error
			}
		}else{
			echo "-1";//-1 stands for user already exists.
		}
	}else{
		echo "0"; //0 stands for cooperative do not exists.
	}
}else{
	echo "error";
}

//function to check if cooperative exist

//function to check if user id and phone are not already exists
?>