<?php 
include("config.php"); 

if(!isset($_SESSION))
    {
        session_start();
    }
$_SESSION["email"];
if(isset($_POST['book'])){
	
	$check =  $_SESSION["email"];
			  	$query5 = $connection->query("SELECT * FROM user WHERE email = '$check'");
				$row5 = $query5->fetch_assoc();
	$user_id = $row5['user_id'];
	//echo $user_id;
	$_POST['time'];
	$_POST['date'];
	$employee = $connection->query("SELECT emp_id FROM employee WHERE fname ='".$_POST["employee"]."' ");
	$row6 = $employee->fetch_assoc();
	$emp_id = $row6['emp_id'];
	
foreach ($_POST['services'] as $services) {
	$query = $connection->query("INSERT INTO `bookings`(`avail`, `date`, `service_id`, `salon_id`, `user_id`,`emp_id`) VALUES ('".$_POST["time"]."','".$_POST["date"]."','.$services.',{$_SESSION["salonid"]},'$user_id','$emp_id') ");
	
    $user_query=$connection->query("SELECT fname, number FROM user WHERE user.user_id = '$user_id'");
    $user_name_result = $user_query -> fetch_assoc();
    $user_name = $user_name_result['fname'];
    $user_number = $user_name_result['number'];
    
    
	$confirm = $connection->query("UPDATE slot SET slot.user_id = '$user_id', slot.customer = '$user_name'  
	WHERE slot.avail= '".$_POST["time"]."' AND slot.date = '".$_POST["date"]."' AND slot.salon_id ={$_SESSION["salonid"]} AND slot.emp_id = '$emp_id' ");
	
	
	//echo '<p>'.$services.'</p>' ;
}



	//header("Location:confirmation_mail.php");
 // echo $_POST['time'];echo '<br>';
	//echo $_POST['date']; echo '<br>';
//	echo $_POST['employee'];  echo '<br>';
//echo $_SESSION["salonid"];  echo '<br>';
//	echo $_SESSION['emp_id'];
	

}

?>