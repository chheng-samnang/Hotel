<?php
 	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	include("db.php");
	
	$room_id=$_GET["room_id"];
	$c_in=$_GET["check_in"];
	$c_out=$_GET["check_out"];	
	$result = $conn->query("SELECT * FROM tbl_check_in AS ch 
	INNER JOIN tbl_guest AS g ON ch.guest_code=g.guest_code
	WHERE check_in='$c_in' AND check_out='$c_out' AND room_id='$room_id'");
	$outp = "";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)){	
	    if ($outp != "") {$outp.= ",";}else{ return FALSE; }	    
	   /* $outp .= '{"Booking_code":"' . $rs["booking_code"].'",';
	    $outp .= '{"Room_name":"' . $rs["room_name"].'",';
	    $outp .= '"Id":"'. $rs["room_id"]. '"}'; */
	}
	$outp ='{"records":['.$outp.']}';
	$conn->close();
	echo($outp);
?>