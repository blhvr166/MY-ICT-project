<?php
session_start();
include("config.php");
    if (isset($_POST["submit"])) {
     //$connection = new mysqli("localhost", "root", "root", "ictatjcu_bandofbarbers");
        
        
        
        //$image_path = 'user_imgs/'.$_FILES['image']['name'];
    
		//$image_path = $connection->real_escape_string($image_path);
        
        
		$firstName = $connection->real_escape_string($_POST["fname"]);
		$lastName = $connection->real_escape_string($_POST["lname"]);
		$email = $connection->real_escape_string($_POST["email"]);
		$password = base64_encode($connection->real_escape_string($_POST["password"]));
    $saddress=$connection->real_escape_string($_POST["address"]);
    $city=$connection->real_escape_string($_POST["city"]);
    $pin=$connection->real_escape_string($_POST["pin"]);
    $state=$connection->real_escape_string($_POST["state"]);
    $number=$connection->real_escape_string($_POST["number"]);

		$data1 = $connection->query("SELECT * FROM user WHERE email= '$email'");
		if ($data1->num_rows>0){
			$message = "You are already Registered";
			echo "<script type='text/javascript'>alert('$message');
			window.location.href='userLogin.php';
			</script>";

		}
		else{
            if(preg_match("!image!",$_FILES['image']['type'])){
                    
				if(copy($_FILES['image']['tmp_name'],$image_path)){
          
		$user_query = $connection->query("INSERT INTO user (image, fname, lname, email, password, address, city, pin, state, number, latitude, longitude) VALUES ('$uimg','$firstName', '$lastName', '$email', '$password','$saddress','$city','$pin','$state','$number', NULL, NULL)");

    	if ($user_query === false){
            
        	$message = "Error Please Try Again";
			echo "<script type='text/javascript'>alert('$message');
			window.location.href='userReg.php';
			</script>";
            
		}
    	else
		{
			$message = "Your have been registered";
			echo "<script type='text/javascript'>alert('$message');
			window.location.href='userReg.php';
			</script>";
                    
    
}}}
	  
else
{
    
    
    $message = "REGISTERED SUCCESSFULLY";
    $user_query = $connection->query("INSERT INTO user (image, fname, lname, email, password, address, city, pin, state, number, latitude, longitude) VALUES (DEFAULT,'$firstName', '$lastName', '$email', '$password','$saddress','$city','$pin','$state','$number', NULL, NULL)");
    
			echo "<script type='text/javascript'>alert('$message');
			window.location.href='userLogin.php';
			</script>"	;
}

	}}
	
?>
