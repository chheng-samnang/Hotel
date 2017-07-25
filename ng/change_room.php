<?php
 	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	include("db.php");
	$id=$_GET["id"];
	$result = $conn->query("SELECT * FROM tbl_room AS r INNER JOIN tbl_room_type AS rt ON r.room_type_code=rt.room_type_code INNER JOIN tbl_check_in As ch ON ch.room_id=r.room_id WHERE check_in_id='$id' ");
	$outp = "";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)){	
	    if ($outp != "") {$outp .= ",";}	    
	    $outp .= '{"Room_name":"'  . $rs["room_name"] . '",';
	    $outp .= '"Room_type_name":"'  . $rs["room_type_name"] . '",';
	    $outp .= '"Check_In":"'  . $rs["check_in"] . '",';
	    $outp .= '"Check_Out":"'  . $rs["check_out"] . '",';
	    $outp .= '"Status":"'  . $rs["status"] . '",';	  
	    $outp .= '"Price":"'  . $rs["price"] . '",';  
	    $outp .= '"Id":"'. $rs["room_id"]. '"}'; 
	}
	$outp ='{"records":['.$outp.']}';
	$conn->close();
	echo ($outp);
?>