<?php 
session_start();
include("config.php");
if(isset($_SESSION['email']))
{
header("Location:index.php");
}
?>

<?php if(!isset($_SESSION['email'])){ ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   

</head>
<body  >
    
    <?php include('nav.php') ?>



<div class="container-fluid" style="background-image: url(images/login-bg1.jpg); background-repeat: no-repeat; background-size:100% 100%; min-height:700px ">


	<div class="d-flex justify-content-center">
		<div class="card" style="margin-top:150px; margin-bottom: 50px;height: auto">
			<div class="card-header border-danger">
				<h2 style=" text-align: center; margin-top:30px; margin-bottom:30px" class="text-danger">LOGIN OR REGISTER</h2>
			</div>
			<div class="card-body" style="margin-top: 30px">
				<div class="text-center">
					<a href="userLogin.php"><button type="button" class="btn btn-lg w-75 btn-outline-danger" style="margin-bottom: 20px; ">CLIENT</button></a>
		        </div>
				<div class="text-center">
					<a href="emp_portal.php"><button type="button" class="btn btn-lg w-75 btn-outline-danger" style="margin-bottom: 20px; ">STYLIST</button></a>
				</div>
				<div class="text-center">
				    <a href="salonLogin.php"><button type="button" class="btn  btn-lg w-75 btn-outline-danger" style="margin-bottom: 20px;">BOSS</button></a>
				</div>
			</div>
		</div>
	</div>
</div>
    

   
</body>
  
 <!-- Footer -->
<div class="footer">
<div class=" text-light bg-dark" style="margin-bottom:0;  padding-bottom:10px; padding-top:20px;">
  
<?php include("footer.php") ?>
  
     </div></div>
  <!-- Footer -->



</html>
<?php } ?>