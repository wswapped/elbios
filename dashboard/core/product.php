<?php
	class product{
		public function add($cropName)
		{
			# Adds crop in system
			global $conn;
			$query = $conn->query("INSERT INTO crops(cropName) VALUES (\"$cropName\") ") or trigger_error("Error with CROP addition $conn->error");

			return $conn->insert_id;
		}

		public function details($productId)
		{
			# returns product details
			global $conn;
			$query = $conn->query("SELECT * FROM products WHERE productId = \"$productId\" LIMIT 1 ") or trigger_error("Error with product details $conn->error");

			$data = $query->fetch_assoc();
			$data['units'] = $this->measurementUnits($productId);

			return $data;
		}

		public function measurementUnits($productId)
		{
			# returns product measurement units
			global $conn;
			$query = $conn->query("SELECT * FROM product_unit_measures WHERE productId = \"$productId\" LIMIT 1 ") or trigger_error("Error with product unit $conn->error");

			$ret = array('main'=>array(), 'others'=>array());
			while ($data = $query->fetch_assoc()) {
				//checking main measurement unit
				if($data['main']==1){
					$ret['main'] = $data;
				}else{
					$ret['others'][] = $data;
				}
			}

			return $ret;
		}

		public function list()
		{
			# returns list of products
			global $conn;
			$query = $conn->query("SELECT * FROM products ") or trigger_error("Error with product details $conn->error");

			$crops = array();

			while($data = $query->fetch_assoc()){
				$crops[] = $data;
			};

			return $crops;
		}

		public function add_variety($cropId, $variety)
		{
			# Adds crop in system
			global $conn;
			$query = $conn->query("INSERT INTO crop_varieties(cropId, variety) VALUES (\"$cropId\", \"$variety\") ") or trigger_error("Error with CROP variety addition $conn->error");

			return $conn->insert_id;
		}

		public function varieties($crop='')
		{
			# returns list of crop's variety
			global $conn;
			$query = $conn->query("SELECT * FROM crop_varieties WHERE cropId = \"$crop\" ") or trigger_error("Error with CROP varieties $conn->error");

			$varieties = array();

			while($data = $query->fetch_assoc()){
				$varieties[] = $data;
			};

			return $varieties;
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

	$Product = new product();
?>