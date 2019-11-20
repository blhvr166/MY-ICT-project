<?php 
session_start();
include("config.php");
if(isset($_POST["email"])) {
			  	$check =  $_POST["email"];
			  	$query5 = $connection->query("SELECT email FROM user WHERE email = '$check'");
				$row5 = $query5->fetch_assoc();
	if($check = $row5['email']){
		$result = "user check" ;
		echo json_encode($result);
	}
	else {
		$result = "Please Login To Make An Appointment! ";
		echo json_encode($result);
	}
}
?>