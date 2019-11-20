<?php
session_start();
$user_check = $_SESSION['email'];
include("config.php");


   		$user_sql = $connection -> query("select * from user where email='$user_check'");

		if ($user_sql -> num_rows == 1) {
			$row = $user_sql -> fetch_assoc();
			$id = $row['user_id'];
            $image=$row['image'];
			$fname = $row['fname'];
			$lname = $row['lname'];
			$email = $row['email'];
			$address=$row['address'];
			$city=$row['city'];
			$pin=$row['pin'];
			$state=$row['state'];
			$number=$row['number'];


	if(isset($_POST['Submit'])){//if the submit button is clicked



  $nimage = $_POST['nimage'];

	$nfname = $_POST['nfname'];

	$nlname = $_POST['nlname'];

	$nemail = $_POST['nemail'];
        
   $npassword = base64_encode($_POST['npassword']); 

	$naddress=$_POST['naddress'];

	$ncity=$_POST['ncity'];

	$npin=$_POST['npin'];

	$nstate=$_POST['nstate'];

	$nnumber=$_POST['nnumber'];
 
        
        $update = $connection->query("UPDATE user SET fname='$nfname', lname='$nlname', email='$nemail', password='$npassword','address='$naddress',city='$ncity',pin='$npin',state='$nstate', number='$nnumber' WHERE user_id = '$id'");




if($update === false){//if the update worked
    
        $message = "Update Error";
			echo "<script type='text/javascript'>alert('$message');
			window.location.href='user_update.php';
			</script>";
		
    
    
} 
else {
$message = "Update Successful";
			echo "<script type='text/javascript'>alert('$message');
			window.location.href='user_profile.php';
			</script>";
	header("Location:user_profile.php");
	
}
    


	}
?>