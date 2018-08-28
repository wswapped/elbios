<?php 
include_once 'Query.php';
class Seller extends Query{
	private $result=array();
	private $rowCount=0;
	########################### USER PROFILE INFORMATION ############################
	//validate user
	public function validateUser($email,$password){
		$status=false;
		$query="SELECT * FROM users
				WHERE email=\"$email\"
				AND password=\"$password\"
				LIMIT 1";

		$result=$this->select($query);
		if(count($result)>0){
			foreach ($result as $key => $value) {
				if($value['email'] == $email && $value['password'] == $password){
					$status=true;
				}
			}
		}else{
			$status=false;
		}
		return $status;
	}
	//get data for session
	public function sessionData($email,$password){
		$query="SELECT * FROM users
				WHERE email=\"$email\"
				AND password=\"$password\"
				LIMIT 1";

		$result=$this->select($query);

		return $result;
	}

	//update user online status
	public function isOnline($user_id,$status){
		$query="";
		if($status){
			$query="UPDATE users SET is_online=1
					WHERE id=\"$user_id\"
					LIMIT 1";
		}else{
			$query="UPDATE users SET is_online=0
					WHERE id=\"$user_id\"
					LIMIT 1";
		}

		$status=$this->update($query);

		return $status;
	}
	########################### END OF USER PROFILE INFORMATION ###################
	//validate user

	//function to return all cooperative
	public function getAllCooperatives(){
		$query="SELECT * FROM cooperatives ORDER BY cooperativeId DESC LIMIT 20";
		$result=array();
		$result=$this->select($query);
		return $result;
	}

	//function to count records
	public function recordCounter($table){
		$allowed=array("cooperatives","crops","crop_grades","cooperative_harvest");//add all tables here
		if(in_array($table,$allowed)){
			$query="SELECT DISTINCT * FROM ".$table;
			$rowCount=$this->rows($query);
		}else{
			$rowCount=0;
		}

		return $rowCount;
	}
}
$seller=new Seller();
?>