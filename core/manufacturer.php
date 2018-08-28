<?php
	class manufacturer{
		public function add($userId, $location, $doneBy)
		{
			# adds a purchasing order
			global $conn;
			$query = $conn->query("INSERT INTO suppliers(userId, location, createdBy) VALUES (\"$userId\", \"$location\", \"$doneBy\") ") or trigger_error("Error with suuplier addition $conn->error");
			return $conn->insert_id;
		}

		public function details($id)
		{
			global $conn;
			$query = $conn->query("SELECT * FROM manufacturers WHERE .id = \"$id\" LIMIT 1 ") or trigger_error("Error $conn->error");
			$data = $query->fetch_assoc();

			return $data;
		}

		public function list()
		{
			# returns list of manufacturers
			global $conn;
			$query = $conn->query("SELECT * FROM manufacturers ") or trigger_error("Error $conn->error");
			return $query->fetch_all(MYSQLI_ASSOC);
		}
	}
	$Manufacturer = new manufacturer();
?>