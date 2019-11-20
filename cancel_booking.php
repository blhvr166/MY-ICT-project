<?php
include("config.php");
session_start();
$user_check = $_SESSION['email'];

if (isset($_POST["submit"])) {
    
    
       $slot_query = $connection -> query(" SELECT * FROM slot WHERE user_id = (SELECT user_id FROM user WHERE email = '$user_check')");
        
        $slot_info = $slot_query->fetch_assoc();

        $salon_id = $slot_info['salon_id'];
        $emp_id = $slot_info['emp_id'];
        $user_id = $slot_info['user_id'];
        $date = $slot_info['date'];
        $time = $slot_info['avail'];
        
    
    
        $cancel_query = $connection-> query("UPDATE slot SET slot.user_id = NULL WHERE user_id = '$user_id' AND date = '$date' AND avail= '$time' AND salon_id = '$salon_id' AND emp_id='$emp_id' ");
    
    if($cancel_query === true){
        
        
        $message = "You have successfully cancelled your booking. Please book again if you need an appointment";
			echo "<script type='text/javascript'>alert('$message');
			window.location.href='user_profile.php';
			</script>";
	
    } else {
        
        $message = "Cancellation error. Please try again.";
			echo "<script type='text/javascript'>alert('$message');
			window.location.href='user_profile.php';
			</script>";
	
        
    }
    
    
    
} ?>

