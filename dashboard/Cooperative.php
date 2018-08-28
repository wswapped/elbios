<?php 


class Cooperative_old{
	function check_cooperative($id){
		global $con;
		$state=false;
		$query=mysqli_query($con,"SELECT id FROM cooperatives WHERE id='$id' LIMIT 1");
		if($query){
			if(mysqli_num_rows($query)==1){
				$state=true;
			}else{
				$state=false;
			}
		}else{
			die(mysqli_error($con));
		}
		return $state;
	}
	//function to check if telephone and id number do not exist in db
	function check_member($phone,$id_number){
		global $con;
		$state=false;
		$query=mysqli_query($con,"SELECT phone,id_number FROM co_members WHERE phone='$phone' AND id_number='$id_number'");
		if($query){
			if(mysqli_num_rows($query)>0){
				$state=true;
			}else{
				$state=false;
			}
		}else{
			die(mysqli_error($con));
		}
		return $state;
	}
	//functiont user member into the cooperative
	function save_member($firstname,$lastname,$id_number,$phone,$residence,$co_id){
		global $con;
		$status=false;
		$query=mysqli_query($con,"INSERT INTO co_members(cooperative_id,f_name,l_name,id_number,phone,address,status)
												 VALUES('$co_id','$firstname','$lastname','$id_number','$phone','$residence','PENDING')");
		if($query){
			$status=true;
		}else{
			die(mysqli_error($con));
		}
		return $status;
	}
	//function to get all cooperative members
	function get_members($co_id){
		global $con;
		$members=array();
		$query=mysqli_query($con,"SELECT * FROM co_members WHERE cooperative_id='$co_id'");
		if($query){
			while($data=mysqli_fetch_assoc($query)){
				$members[]=$data;
			}
		}else{
			die(mysqli_error($con));
		}
		return $members;
	}
	//function to get if group have members or not
	function members_exist($id){
		global $con;
		$state=false;
		$query=mysqli_query($con,"SELECT * FROM co_members WHERE cooperative_id='$id' LIMIT 1");
		if($query){
			if(mysqli_num_rows($query)==1){
				$state=true;
			}else{
				$state=false;
			}
		}else{
			die(mysqli_error($con));
		}
		return $state;
	}
}
$cooperative=new Cooperative_old();
?>