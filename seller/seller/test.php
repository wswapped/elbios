<?php 
include_once 'class_loader.php';
$email="sam@ref.com";
$password="samuels";
$data=array();
$seller=new Seller();
$validate_state=$seller->validateUser($email,$password);
if($validate_state){
	$data=$seller->sessionData($email,$password);
	var_dump($data);
}else{
	echo "Invalid password and email";
}
?>
