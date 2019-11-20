<?php
include("config.php");
require 'phpmailer/PHPMailerAutoload.php';
session_start();
$mail = new PHPMailer;


$check_email =  $_POST["email"];

			    $query5 = $connection->query("SELECT email FROM user WHERE email = '$check_email'");
				$query6 = $connection->query("SELECT email FROM salon WHERE email = '$check_email'");
				$query7 = $connection->query("SELECT email FROM employee WHERE email = '$check_email'");
				$row5 = $query5->fetch_assoc();
				$row6 = $query6->fetch_assoc();
				$row7 = $query7->fetch_assoc();

if (isset($_POST["submit"])) {
    
    
    	 if($check_email = $row5['email']){ 
            
$user_email_query = $connection-> query("select email,password FROM user WHERE user.email ='$check_email'");
$user_results = $user_email_query -> fetch_assoc();
            
$email = $user_results['email'];
            
$password = base64_decode($user_results['password']);

$mail->isSMTP();                                    
$mail->Host = 'smtp.gmail.com';  
$mail->SMTPAuth = true;                               
$mail->Username = 'bandofbarbers09@gmail.com';                
$mail->Password = 'bandofbarbers@999';                        
$mail->SMTPSecure = 'tls';                          
$mail->Port = 587;                                    

$mail->From = 'bandofbarbers09@gmail.com';
$mail->FromName = 'Band of Barbers';
$mail->addAddress($email, 'User');     
$mail->addAddress($email);              
$mail->addReplyTo($email, 'Confirmation');
$mail->addCC('');
$mail->addBCC('bandofbarber09@gmail.com');

$mail->WordWrap = 50;                                
$mail->isHTML(true);                                

$mail->Subject = 'Check your password';
$mail->Body    = 'The password for your email id is <b>'  .$password.   '</b>. Please use this to login. ';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
    header("Location:userLogin.php");
} 


 } elseif($check_email = $row6['email']){


$salon_email_query = $connection-> query("select email,password FROM salon WHERE salon.email ='$check_email'");
             
$salon_results = $salon_email_query -> fetch_assoc();
            
$salonemail = $salon_results['email'];
            
$password = base64_decode($salon_results['password']);

$mail->isSMTP();                                    
$mail->Host = 'smtp.gmail.com';  
$mail->SMTPAuth = true;                               
$mail->Username = 'bandofbarbers09@gmail.com';                
$mail->Password = 'bandofbarbers@999';                        
$mail->SMTPSecure = 'tls';                          
$mail->Port = 587;                                    

$mail->From = 'bandofbarbers09@gmail.com';
$mail->FromName = 'Band of Barbers';
$mail->addAddress($salonemail, 'User');     
$mail->addAddress($salonemail);              
$mail->addReplyTo($salonemail, 'Confirmation');
$mail->addCC('');
$mail->addBCC('bandofbarber09@gmail.com');

$mail->WordWrap = 50;                                
$mail->isHTML(true);                                

$mail->Subject = 'Check your password';
$mail->Body    = 'The password for your email id is <b>'  .$password.   '</b>. Please use this to login. ';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
    header("Location:salonLogin.php");
} 




} elseif($check_email = $row7['email']){


$emp_email_query = $connection-> query("select email,password FROM employee WHERE employee.email ='$check_email'");
$emp_results = $emp_email_query -> fetch_assoc();
            
$email = $emp_results['email'];
            
$password = base64_decode($emp_results['password']);

$mail->isSMTP();                                    
$mail->Host = 'smtp.gmail.com';  
$mail->SMTPAuth = true;                               
$mail->Username = 'bandofbarbers09@gmail.com';                
$mail->Password = 'bandofbarbers@999';                        
$mail->SMTPSecure = 'tls';                          
$mail->Port = 587;                                    

$mail->From = 'bandofbarbers09@gmail.com';
$mail->FromName = 'Band of Barbers';
$mail->addAddress($email, 'User');     
$mail->addAddress($email);              
$mail->addReplyTo($email, 'Confirmation');
$mail->addCC('');
$mail->addBCC('bandofbarber09@gmail.com');

$mail->WordWrap = 50;                                
$mail->isHTML(true);                                

$mail->Subject = 'Check your password';
$mail->Body    = 'The password for your email id is <b>'  .$password.   '</b>. Please use this to login. ';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
    header("Location:emp_portal.php");
} 


?>
           
		 <?php } else {?>
		 <?php } 
    
    
    
}


?>