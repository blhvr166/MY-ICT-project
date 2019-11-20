<?php 
session_start();
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
    
    
<body >
    
<?php include('nav.php') ?>



<div class="container-fluid " style="background-image: url(images/boss-bg2.jpg);background-repeat: no-repeat; background-size:100% 100%; min-height:700px " >
    

	<div class="d-flex justify-content-center">
		<div class="card" style="margin-top: 100px; margin-bottom: 50px;height: auto;">
			<div class="card-header">
				<h3 class="text-danger text-center" style="margin-top:30px; margin-bottom:30px">FORGOT PASSWORD</h3>

			</div>
			<div class="card-body">
				<form action="forgot_password_action.php" method="post" >
					<div class="input-group form-group" style="margin-top:20px">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="email" name="email" class="form-control" placeholder="email" required onChange="ValidateEmail(email)">

					</div>
					
					<div class="form-group">
						<input type="submit" name="submit" value="SUBMIT" class="btn btn-outline-danger  mx-auto d-block">
					</div>
				</form>
			</div>
			<div class="card-footer" >
				<h4 class="d-flex justify-content-center links text-dark">
					Please enter your registered mail id
				</h4>
				
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

			<?php  } ?>