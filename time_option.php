<?php
session_start();
$salon_id = $_SESSION["salonid"];
//echo json_encode($_SESSION["salonid"]);
include("config.php");
if(isset($_POST["id"])){
	$data = array();
$result = $connection->query("select * from slot where slot.salon_id = $salon_id AND slot.user_id IS NULL AND date = '".$_POST["id"]."'");
	if ($result->num_rows == 0){
		//$no->avail = "No slots";
		//echo json_encode($no);
	}
	else {
while ($row = $result->fetch_assoc()){
	$data[] = $row['avail'];
}
	echo json_encode($data);
	}
}

		
die();
