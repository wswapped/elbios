<?php 
include_once '../includes/database.inc.php';
class Query extends Database{
	private $result=array();

	
	protected function insert($query){
		$statement=$this->connect()->query($query);
		return $statement;
	}
	protected function update($query){
		$statement=$this->connect()->query($query);
		return $statement;
	}
	//execute returning query function
	protected function select($query){
		$result=array();
		$statement=$this->connect()->query($query);
		while($row=$statement->fetch_assoc()){
			$result[]=$row;
		}

		return $result;
	}

	//row counter

	protected function rows($query){
		$statement=$this->connect()->query($query);
		$numRows=$statement->num_rows;

		return $numRows;
	}

}
?>