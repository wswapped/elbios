<?php
ob_start();

//specify JSON as content type
header('Content-Type: application/json');

define('DB_DATE_FORMAT', 'Y-m-d H:i:s');
$date_format = "Y-m-d h:i:s";
$standard_date = "Y-m-d h:i:s";

$response = array("date"=>)