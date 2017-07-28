<?php
 	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	include("db.php");
	$result = $conn->query("SELECT * FROM tbl_room AS r INNER JOIN tbl_room_type AS rt ON r.room_type_code=rt.room_type_code");
	$outp = "";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)){	
	    if ($outp != "") {$outp .= ",";}	    
	    $outp .= '{"Room_name":"'  . $rs["room_name"] . '",';
	    $outp .= '"Room_type_name":"'  . $rs["room_type_name"] . '",';
	    $outp .= '"Photo":"'  . $rs["photo"] . '",';
	    $outp .= '"Maximum_people":"'  . $rs["maximum_people"] . '",';
	    $outp .= '"Status":"'  . $rs["status"] . '",';	  
	    $outp .= '"Price":"'  . $rs["price"] . '",';  
	    $outp .= '"Id":"'. $rs["room_id"]. '"}'; 
	}
	$outp ='{"records":['.$outp.']}';
	$conn->close();
	echo ($outp);
?>