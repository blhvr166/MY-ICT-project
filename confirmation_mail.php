<?php
include("config.php");
require 'phpmailer/PHPMailerAutoload.php';
session_start();
$mail = new PHPMailer;
$check =  $_SESSION["email"];
			  	$query5 = $connection->query("SELECT * FROM user WHERE email = '$check'");
				$row5 = $query5->fetch_assoc();
	$user_id = $row5['user_id'];
$book = $connection->query("SELECT * FROM bookings WHERE bookings.user_id = '$user_id'");

$row9 = $book -> fetch_assoc();
$emp_id=$row9['emp_id'];
$salon_id = $row9['salon_id'];
$salonmail = $connection->query("SELECT * FROM salon WHERE salon_id='$salon_id'");
$row3 = $salonmail->fetch_assoc();
$salonemail = $row3['email'];
$employee = $connection->query("SELECT fname FROM employee WHERE emp_id='$emp_id'");
$row2 = $employee -> fetch_assoc();
$empname = $row2['fname'];
$mail->isSMTP();                                    
$mail->Host = 'smtp.gmail.com';  
$mail->SMTPAuth = true;                               
$mail->Username = 'bandofbarbers09@gmail.com';                
$mail->Password = 'bandofbarbers@999';                        
$mail->SMTPSecure = 'tls';                          
$mail->Port = 587;                                    

$mail->From = 'bandofbarbers09@gmail.com';
$mail->FromName = 'Band of Barbers';
$mail->addAddress($check, 'User');     
$mail->addAddress($check);              
$mail->addReplyTo($check, 'Confirmation');
$mail->addCC($salonemail);
$mail->addBCC('bandofbarber09@gmail.com');

$mail->WordWrap = 50;                                
$mail->isHTML(true);                                

$mail->Subject = 'Booking Confirmation';
$mail->Body    = 'Date - >'  .$row9['date']. 
	'Time->'.$row9['avail']. 
	'Employee->' .$empname.  
	'Salon Name->' .$row3['sname'].
	'<b></b>';
$mail->AltBody = 'Booking Confirmation';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Booking Confirmation Mail Has been Sent, Please Check Your Inbox';

}
header("Location:user_profile.php");
?>