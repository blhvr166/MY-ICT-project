<?php
session_start();
include("config.php");

if(isset($_SESSION['emp_code']))
{
unset($_SESSION['emp_code']);
}
?>

<?php if(!isset($_SESSION['emp_code'])){ ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
    <script src="js/validation.js"></script>
	<!--Custom styles-->
</head>
<body>
    <?php include('nav.php') ?>
<div class="container-fluid" style="background-image: url(images/boss-bg2.jpg);background-repeat: no-repeat; background-size:100% 100%; min-height:700px ">

	<div class="d-flex justify-content-center">
		<div class="card" style="margin-top: 100px; margin-bottom: 50px;height: auto;">
			<div class="card-header">
				<h3 class="text-danger text-center" style="margin-top:30px; margin-bottom:30px">STYLIST</h3>

			</div>
			<div class="card-body">
				<form method="post" action="emp_login_action.php">
					<div class="input-group form-group" style="margin-top:30px">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="emp_code" id="emp_code" class="form-control" placeholder="Employee Code" required >

					</div>

					<div class="form-group" style="margin-top:30px">
						<input name="login" type="submit" value="Enter" class="btn btn-outline-danger login_btn mx-auto d-block">
					</div>
				</form>
			</div>
			<div class="card-footer" >
				<div class="d-flex justify-content-center links text-dark">
					<text class="text-danger" >HINT: </text> &nbsp; Please get the unique code from <br> &nbsp; the SALON BOSS and enter in the <br> &nbsp; textbox above.
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
