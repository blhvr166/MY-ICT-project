<?php
include("config.php");
if(!isset($_SESSION))
    {
        session_start();
    }


 //$connection = new mysqli("localhost", "root", "root", "ictatjcu_bandofbarbers");

?>
<html>
<head>
<title>Home </title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">




<style>



</style>

  <nav class="navbar navbar-expand-lg bg-dark  navbar-dark sticky-top" style="sm-padding-bottom:10px; padding-top:0px;  ">
   <a class="navbar-brand " href="index.php"><ul class="list-unstyled list-inline">
       <li class="list-inline-item"><img src="images/logo5.png" alt="logo" class="img-fluid " style="width:70px; height:70px"></li>
       <li class="list-inline-item" ><div style="margin-top:40px"><h4>Band Of <text class="text-danger">Barbers</text></h4></div></li>
  </ul></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">

      <ul class="navbar-nav mx-auto ">
      <li class="nav-item p-2 ">
        <a class="nav-link"  href="index.php" style="color:#ffffff"> Home</a>
      </li>
        <li class="nav-item p-2" >
        <a class="nav-link"  href="salons.php" style="color:#ffffff; " >Salons</a>
      </li>
      <li class="nav-item p-2" >
        <a class="nav-link" href="about.php" style="color:#ffffff;  ">Why Us?</a>
      </li>
      <li class="nav-item p-2" >
        <a class="nav-link " href="contact.php" style="color:#ffffff; ">Contact</a>
      </li>


         </ul>



      <ul class="navbar-nav ml-auto" id="collapsibleNavbar">



        <div class="navbar-buttons" >


 <?php


  if(isset($_SESSION["email"])) {
		

       	$check =  $_SESSION["email"];

			     $query5 = $connection->query("SELECT email FROM user WHERE email = '$check'");
				$query6 = $connection->query("SELECT email FROM salon WHERE email = '$check'");
				$query7 = $connection->query("SELECT email FROM employee WHERE email = '$check'");
				$row5 = $query5->fetch_assoc();
				$row6 = $query6->fetch_assoc();
				$row7 = $query7->fetch_assoc();
	?>
		<?php if($check = $row5['email']){ ?>

           <a class="btn btn-md btn-outline-danger nav-item "   href="user_profile.php?id=<?php echo $_SESSION["email"]; ?>" style="color:#ffffff"><i class="fa fa-user"></i> <span class="clearfix d-none d-inline-block" >Account</span></a>
		 <?php } elseif($check = $row6['email']){?>

           <a class="btn btn-md btn-outline-danger nav-item" href="salon_profile.php?id=<?php echo $_SESSION["email"]; ?>" style="color:#ffffff"><i class="fa fa-user"></i> <span class="clearfix d-none d-inline-block">Account</span></a>

		 <?php } elseif($check = $row7['email']){?>
           <a class="btn btn-md btn-outline-danger nav-item"  href="emp_profile.php?id=<?php echo $_SESSION["email"]; ?>" style="color:#ffffff"><i class="fa fa-user"></i> <span class="clearfix d-none d-inline-block">Account</span></a>
		 <?php } else {?>
		 <?php } ?>
           <?php } ?>

 		<?php if(isset($_SESSION["email"])){?>



        <a class="btn btn-md btn-outline-danger nav-item" href="logout.php" style="color:#ffffff">Logout</a>

          <?php } else { ?>
          <a href="login.php" style="color:#ffffff; " class="btn btn-md btn-outline-danger nav-item">Login</a>
          <?php } ?>

          </div>
 </ul>

     </div>


</nav>

</html>
