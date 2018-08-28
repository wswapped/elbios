<?php

getData();

function getData(){
	require("../db.php");
	$query=mysqli_query($con,"SELECT * FROM stations_data ORDER BY id DESC LIMIT 1");
	if($query){
		while($r=mysqli_fetch_array($query)){
			$temp_ground=$r[4];
			$temp_air=$r[6];

			$moisture_gr=$r[3];
			$moisture_air=$r[5];

			$data[]=array("temp_ground"=>$temp_ground,"temp_air"=>$temp_air,"moisture_air"=>$moisture_air,"moisture_gr"=>$moisture_gr);
			$info=array("data"=>$data);
		}
		header('Content-Type: application/json');
		echo json_encode($info);
	}else{
		die(mysqli_error($con));
	}
}
?>