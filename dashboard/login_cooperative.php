<?php
sleep(5);
if(isset($_POST['username']) && isset($_POST['password'])){
 require 'db.php';
 $username=mysqli_real_escape_string($con,$_POST['username']);
 $password=mysqli_real_escape_string($con,$_POST['password']);
 //check if user admin is available in the database
 $query=mysqli_query($con,"SELECT * FROM cooperatives WHERE admin='$username' AND password='$password' LIMIT 1");
 if($query){
 	if(mysqli_num_rows($query)==1){
 		while($r=mysqli_fetch_assoc($query)){
 		 $id=$r['id'];
 		 $user=$r['admin'];

 		 session_start();
 		 $_SESSION['id']=$id;
 		 $_SESSION['user']=$user;
 		 //redirect user to dashboard
 		 echo "1";
 		}
 	}else{
 		echo "0";
 	}
 }else{
 	die(mysqli_error($con));
 }
}else{
	echo "error";
}
?>