<?php 
class Sensor{
	//function to get sensor values
	function get_sensors(){
		global $con;
		$sensors = array();
		$query = mysqli_query($con,"SELECT * FROM stations_data ORDER BY id DESC LIMIT 20");
		if($query){
			while($data = mysqli_fetch_assoc($query)){
				$sensors[] = $data;
			}
		}else{
			die("eerror ".mysqli_error($con));
		}
		return $sensors;
	}
	function save_notification($co_id,$body){
		global $con;
		$state=false;
		$query=mysqli_query($con,"INSERT INTO co_notification(co_id,title,status)VALUES('$co_id','$body','PENDING')");
		if($query){
			$state=true;
		}else{
			die(mysqli_error($con));
		}
		return $state;
	}
	//function to check if there some data in sensor nodes.
	//get predict data from ground sendor value
	function predict_ground_moisture($gr_moisture,$gr_temperature,$air_temp,$air_moisture,$co_id){
		$state="";
		global $con;
		//check values
		$gr_moi=(int)$gr_moisture;
		$gr_temp=(int)$gr_temperature;
		$air_temp=(int)$air_temp;
		$air_moi=(int)$air_moisture;
		if($gr_temp>20){
			$state=$gr_temp." is temperature in ground now. There should be check of data if possible irrigate the farm as recommended";
		}else if($air_temp>40 && $gr_moi<50){
			//save notification

			$state=$air_temp." is temperature in air now. ".$gr_moi." is moisture in ground .There should be check of data if possible irrigate the farm as recommended";
			$query=mysqli_query($con,"INSERT INTO co_notification(co_id,title,status)VALUES('$co_id','$state','PENDING')");
		}else if($gr_moisture>50){
			$state=$gr_moisture." is Moisture in ground now. Field is in normal condition";
			$query=mysqli_query($con,"INSERT INTO co_notification(co_id,title,status)VALUES('$co_id','$state','PENDING')");
		}else if($air_temp>40 && gr_moi>50){
			$state=$gr_moisture." is Moisture in ground now ".$air_temp." is temperature in air Field is in normal condition";
			$query=mysqli_query($con,"INSERT INTO co_notification(co_id,title,status)VALUES('$co_id','$state','PENDING')");
		}
		return $state;
	}

	
}
$sensor=new Sensor();
?>