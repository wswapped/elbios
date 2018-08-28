<?php 

require 'db.php';
include 'Sensor.php';
$data=$sensor->predict_ground_moisture("58");
echo $data;
?>