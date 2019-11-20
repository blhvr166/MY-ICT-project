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
	<title>Employee Portal</title>
	
</head>
<body>
    
<?php include('nav.php') ?>



<div class="container-fluid" style="background-image: url(images/user-bg2.jpg);background-repeat: no-repeat; background-size:100% 100%; min-height:700px ">

	<div class="d-flex justify-content-center">
		<div class="card" style="margin-top: 100px; margin-bottom: 50px;height: auto;">
			<div class="card-header">
				<h3 class="text-danger text-center" style="margin-top:30px; margin-bottom:30px">STYLIST</h3>

			</div>
			<div class="card-body">
				<form action="emp_portal_action.php" method="post" >
					<div class="input-group form-group" style="margin-top:20px">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="email" name="email" class="form-control" placeholder="email" required onChange="ValidateEmail(email)">

					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" class="form-control" placeholder="password" required>
					</div>
					<div class="form-group">
						<input type="submit" name="Login" value="Login" class="btn btn-outline-danger  mx-auto d-block">
					</div>
				</form>
			</div>
			<div class="card-footer" >
				<div class="d-flex justify-content-center links text-danger">
					Don't have an account? &nbsp;<a href="empLogin.php" style="color: black">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="forgot_password.php" style="color: black">Forgot your password?</a>
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