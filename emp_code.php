<?php 
session_start();
include("config.php");
if(isset($_POST["emp_code"])){
	
$user_check = $_SESSION['email']; 
	
		//$connection = new mysqli("localhost", "root", "root", "ictatjcu_bandofbarbers");
		$user_sql = "select * from salon where email='$user_check'";
   		$user_sql = $connection -> query($user_sql);
        
        $salon_info = $user_sql->fetch_assoc();
        $salon_id = $salon_info['salon_id'];
        
        $emp_code =$_POST["emp_code"]; 
        
        $emp_code_query = $connection -> query("SELECT * FROM employee WHERE employee.salon_id= '$salon_id' AND  emp_code = '$emp_code'");
    
        $emp_code_check = $emp_code_query -> fetch_assoc();
    
    
		if ($user_sql -> num_rows == 1) {



	 //include("config.php");
	//$connection = new mysqli("localhost", "root", "root", "ictatjcu_bandofbarbers");
	
	//$emp_code = $connection->real_escape_string($_POST["emp_code"]);
	
            
   if ($emp_code_query -> num_rows > 0){
       
       
       
		  $message = "You have already given this code. Please give a new one.";
			echo "<script type='text/javascript'>alert('$message');
			window.location.href='salon_welcome.php';
			</script>";
    	  
       
       
       
   }
            else {
            
            
            
            
            
	$data1 = $connection->query("INSERT into employee (fname , lname , email , password , emp_code, salon_id) 
	VALUES (NULL,NULL,NULL,NULL,'$emp_code', (SELECT salon_id FROM salon WHERE email = '$user_check'))");

	
	if ($data1 === false) {
		
		
		       			$message = "Please try again.";
			echo "<script type='text/javascript'>alert('$message');
			window.location.href='salon_welcome.php';
			</script>";
    	  

	}else{
		
    	       			$message = "You have been generated an employee code.";
			echo "<script type='text/javascript'>alert('$message');
			window.location.href='salon_welcome.php';
			</script>";
    	  

	echo $output3;
}}

?>

<?php } ?>

    <?php } else { 
	header(("Location:salon_welcome.php"));
?>
<?php } ?>

