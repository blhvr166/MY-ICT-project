<?php 
if(!isset($_SESSION))
    {
        session_start();
    }
$_SESSION["salonid"];
include("config.php");
 if(isset($_POST["id"]))  {
	 $data = array();
	 $time = $_POST["id"];
	  $employee = ("SELECT DISTINCT employee.fname, employee.emp_id, slot.salon_id, slot.emp_id, slot.salon_id, slot.avail
	  						FROM employee, slot WHERE employee.emp_id = slot.emp_id 
							AND slot.salon_id= {$_SESSION["salonid"]}
							AND slot.avail = '".$_POST["id"]."' 
							AND slot.user_id IS NULL");
	// $employee = ("SELECT fname FROM employee WHERE  emp_id =(SELECT emp_id FROM slot WHERE slot.salon_id = {$_SESSION["salonid"]} AND avail = '".$_POST["id"]."')");
	 $result = mysqli_query($connection, $employee);  
	 
	 
	 
if ($result->num_rows == 0){
		$no->avail = "No Employees";
		echo json_encode($no);
	}
	else {
while ($row = $result->fetch_assoc()){
	$data[] = $row['fname'];
	
	
	
}
	echo json_encode($data);
	}
}

		


 ?>