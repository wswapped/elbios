<?php
require("db.php");
$json = file_get_contents('https://api.thingspeak.com/channels/428688/feeds.json');
$test=json_decode($json,1);
//var_dump($test);
$channel_name = $test['channel']['name'];
$channel_id = $test['channel']['id'];
// var_dump($channels);
$feeds=$test['feeds'];
for($i=0;$i<count($feeds);$i++){
	$feed = $feeds[$i];
	$created_at=$feed['created_at'];
	$entry_id=$feed['entry_id'];
	$field1=$feed['field1'];
	$field2=$feed['field2'];
	$field3=$feed['field3'];
	$field4=$feed['field4'];

	if(checkId($entry_id)==false){
		$query=mysqli_query($con,"INSERT INTO stations_data(device_id,entry_id,field1,field2,field3,field4,created_at)VALUES('$channel_id','$entry_id','$field1'
			,'$field2','$field3','$field4','$created_at')");
		if($query){
			echo "added<br>";
		}else{
			die(mysqli_error($con));
		}
	}
}

function checkId($id){
	require("db.php");
	$state=false;
	$query=mysqli_query($con,"SELECT * FROM stations_data WHERE entry_id='$id'");
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
?>
<script type="text/javascript">
setInterval(function(){ location.reload();}, 10000);
</script>