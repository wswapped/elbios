<?php 

if(isset($_POST['cooperative'])){
    getData($_POST['cooperative']);
}else{
	echo "error";
}

function getData($cooperative){
	require("../db.php");
	$query=mysqli_query($con,"SELECT * FROM co_notification WHERE co_id='$cooperative' ORDER BY id DESC");
	if($query){
		if(mysqli_num_rows($query)>0){
		while($r=mysqli_fetch_array($query)){
			$title=$r[2];
			$message=$r[3];
			$date=formatDate($r[4]);
			$data[]=array("title"=>$title,"status"=>$r[3],"date"=>$date);
			$info=array("data"=>$data);
		}
		header('Content-Type: application/json');
		echo json_encode($info);
		}else{
			echo "Nta matangazo ahari...";
		}

	}else{
		die(mysqli_error($con));
	}
}

function formatDate($olddate){    //date as string
$now = time();                  //pick present time from server     
$old = strtotime( $olddate);  //create integer value of old time
$diff =  $now-$old;             //calculate difference
$old = new DateTime($olddate);
$old = $old->format('Y M d');       //format date to "2015 Aug 2015" format

    if ($diff /60 <1)                       //check the difference and do echo as required
    {
    return intval($diff%60)." amasegonda agiye";
    }
    else if (intval($diff/60) == 1) 
    {
    return " Umunota ugiye";
    }
    else if ($diff / 60 < 60)
    {
    return intval($diff/60)." iminota igiye";
    }
    else if (intval($diff / 3600) == 1)
    {
    return "Isaha Ishize";
    }
    else if ($diff / 3600 <24)
    {
    return intval($diff/3600) . "  Amasaha ahize";
    }
    else if ($diff/86400 < 30)
    {
    return intval($diff/86400) . "  Iminsi igiye";
    }
    else
    {
    return $old;  ////format date to "2015 Aug 2015" format
    }
}
?>