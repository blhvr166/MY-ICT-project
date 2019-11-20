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

  $npassword = base64_encode($connection->real_escape_string($_POST["npassword"]));

	$naddress=$_POST['naddress'];

	$ncity=$_POST['ncity'];

	$npin=$_POST['npin'];

	$nstate=$_POST['nstate'];

	$nnumber=$_POST['nnumber'];


        $update = $connection->query("UPDATE user SET fname='$nfname', lname='$nlname',
        email='$nemail', password='$npassword', address='$naddress',city='$ncity',pin='$npin',state='$nstate',
        number='$nnumber' WHERE user_id = '$id'");




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
<script src="js/validation.js"> </script>
<?php include("nav.php"); ?>
<body style="background-image: url(images/salon-bg1.jpg);">

<div class="container" style=" min-height: 700px ">
    <h1 class="text-dark text-center" style="margin-top:40px; ">Update Details</h1>

<form action="user_update.php" method="POST">
<div class="row" >
<div class="col-lg-4">
    <img class="img-thumbnail mx-auto" src="<?php echo $row['image'];?>"
              alt="Card image cap" style="width: 300px;height: 300px;margin-top:50px"><br>

              </div>
  	<div class="col-lg-8 " style="margin-top:30px">
            <div class="row">
             <div class="col-1 " ></div>
            <div class="col-5  field-label-responsive font-weight-bold">
                <label for="Fname">FIRST NAME:</label>
            </div>
            <div class="col-5 ">
                <div class="form-group">
                     <div class="input-group  ">

                        <input type="text" name="nfname" class="form-control " id="Fname"
                               placeholder="First Name" required onChange="inputAlphabet(nfname)"
                               value="<?php echo $row['fname']; ?>">
							   </div>
                </div>
            </div></div>

            <div class="row">
            <div class="col-1"></div>
            <div class="col-5 field-label-responsive font-weight-bold">
                <label for="lname">LAST NAME:</label>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <div class="input-group ">

                        <input type="text" name="nlname" class="form-control" id="lname"
                               placeholder="Last Name" required onChange="inputAlphabet(nlname)"value="<?php echo $row['lname']; ?>">
                    </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-1"></div>
            <div class="col-5 field-label-responsive font-weight-bold">
                <label for="email">EMAIL:</label>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <div class="input-group ">

                        <input type="text" name="nemail" class="form-control" id="email"
                               placeholder="you@example.com"required onChange="ValidateEmail(email)" value="<?php echo $row['email']; ?>">
                    </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-1"></div>
            <div class="col-5 field-label-responsive font-weight-bold">
                <label for="password">PASSWORD:</label>
            </div>
            <div class="col-5">
                <div class="form-group has-danger">
                    <div class="input-group ">

                        <input type="password" name="npassword" class="form-control" id="npassword"
                               placeholder="Password" value="<?php echo base64_decode($row['password']); ?>"
                            required onChange="lengthDefine(npassword,4), checkRePassword(npassword, rePassword)">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-5 field-label-responsive font-weight-bold">
                <label for="password">CONFIRM PASSWORD:</label>
            </div>
            <div class="col-5">
                <div class="form-group has-danger">
                    <div class="input-group ">

                        <input type="password" name="rePassword" class="form-control" id="rePassword"
                               placeholder="Confirm Password" value="<?php echo base64_decode($row['password']); ?>"
                                required onChange="checkRePassword(npassword, rePassword)">
                    </div>
                </div>
            </div>
        </div>

          <div class="row">
            <div class="col-1"></div>
            <div class="col-5 field-label-responsive font-weight-bold">
                <label for="saddress">ADDRESS:</label>
            </div>
            <div class="col-5">
                <div class="form-group has-danger">
                    <div class="input-group ">

                        <input type="text" name="naddress" class="form-control" id="address"
                               placeholder="address" value="<?php echo $row['address']; ?>">
                    </div>
                </div>
            </div>
</div>


<div class="row">
  <div class="col-1"></div>
            <div class="col-5 field-label-responsive font-weight-bold">
                <label for="city">CITY:</label>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <div class="input-group">

                        <input type="text" name="ncity" class="form-control" id="city"
                               placeholder="city" onChange="inputAlphabet(ncity)"value="<?php echo $row['city']; ?>">
                    </div>
                </div>
            </div>
          </div>


          <div class="row">
            <div class="col-1"></div>
                <div class="col-5 field-label-responsive font-weight-bold">
                    <label for="zip">PIN:</label>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <div class="input-group ">

                            <input type="number" name="npin" class="form-control" id="zip"
                                   placeholder="Zip" pattern="[0-9]" value="<?php echo $row['pin']; ?>">
                        </div>
                    </div>
                </div>
              </div>



              <div class="row">
                <div class="col-1"></div>
                <div class="col-5 field-label-responsive font-weight-bold">
                    <label for="state">STATE:</label>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <div class="input-group ">

                            <input type="text" name="nstate" class="form-control" id="state"
                                   placeholder="State" onChange="inputAlphabet(nstate)"value="<?php echo $row['state']; ?>">
                        </div>
                    </div>
                </div>
              </div>

              <div class="row">
                <div class="col-1"></div>
            <div class="col-5 field-label-responsive font-weight-bold">
                <label for="number">PHONE:</label>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <div class="input-group ">

                        <input type="number" name="nnumber" class="form-control" id="snumber"
                               placeholder="Contact Number" pattern="[0-9]" required value="<?php echo $row['number']; ?>" onChange="lengthDefine(nnumber,10)" >
                    </div>
                </div>
            </div>
  </div>

</div>
	<input TYPE="Submit" VALUE="Update Your Details" NAME="Submit" class="mx-auto">
	</div>

</form>
</div>
</body>
<!-- Footer -->
<div class="footer">
<div class=" text-light bg-dark" style="margin-bottom:0;  padding-bottom:10px; padding-top:20px;">

<?php include("footer.php") ?>

     </div></div>
  <!-- Footer -->
<?php }?>
