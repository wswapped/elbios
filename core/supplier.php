<?php
	class supplier{
		public function add($userId, $location, $doneBy)
		{
			# adds a purchasing order
			global $conn;
			$query = $conn->query("INSERT INTO suppliers(userId, location, createdBy) VALUES (\"$userId\", \"$location\", \"$doneBy\") ") or trigger_error("Error with suuplier addition $conn->error");
			return $conn->insert_id;
		}

		public function details($supplierId)
		{
			global $conn;
			$query = $conn->query("SELECT S.*, U.names as name, U.email FROM suppliers AS S JOIN users AS U ON S.userId = U.id WHERE S.id = \"$supplierId\" LIMIT 1 ") or trigger_error("Error with CROP details $conn->error");

			$data = $query->fetch_assoc();

			return $data;
		}

		public function list()
		{
			# returns list of suppliers
			global $conn;
			$query = $conn->query("SELECT S.*, U.names as name FROM suppliers AS S JOIN users AS U ON S.userId = U.id ORDER BY id DESC") or trigger_error("Error with suppliers listing $conn->error");
			return $query->fetch_all(MYSQLI_ASSOC);
		}

		public function add_variety($cropId, $variety)
		{
			# Adds crop in system
			global $conn;
			$query = $conn->query("INSERT INTO crop_varieties(cropId, variety) VALUES (\"$cropId\", \"$variety\") ") or trigger_error("Error with CROP variety addition $conn->error");

			return $conn->insert_id;
		}

		public function isSupplier($userId)
		{
			# Checks if the user is a supplier
			global $conn;
			$query = $conn->query("SELECT * FROM suppliers WHERE userId = \"$userId\" AND archived = 'no' ");

			if($query){
				//check num rows
				if($query->num_rows){
					return true;
				}else{
					return false;
				}
			}else{
				return trigger_error($conn->error);
			}
		}

		public function userSupplierId($userId){
			//gives the userId and we get the supplier id
			global $conn;
			$query = $conn->query("SELECT id FROM suppliers WHERE userId = \"$userId\" ") or trigger_error($conn->error);
			if($query->num_rows){
				$data = $query->fetch_assoc();
				return $data['id'];
			}else{
				return false;
			}
		}

		public function add_grade($cropId, $grade)
		{
			# Adds grade in system
			global $conn;
			$query = $conn->query("INSERT INTO crop_grades(cropId, grade) VALUES (\"$cropId\", \"$grade\") ") or trigger_error("Error with CROP grade addition $conn->error");

			return $conn->insert_id;
		}

		public function grades($crop='')
		{
			# returns list of crop's variety
			global $conn;
			$query = $conn->query("SELECT * FROM crop_grades WHERE cropId = \"$crop\" ") or trigger_error("Error with CROP grades $conn->error");

			$varieties = array();

			while($data = $query->fetch_assoc()){
				$varieties[] = $data;
			};

			return $varieties;
		}
	}
	$Supplier = new supplier();
?>