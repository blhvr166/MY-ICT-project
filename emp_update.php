<?php
session_start();
$user_check = $_SESSION['email'];
include("config.php");


   		$user_sql = $connection -> query("select * from employee where email='$user_check'");

		if ($user_sql -> num_rows == 1) {
			$row = $user_sql -> fetch_assoc();
			$emp_id = $row['emp_id'];
      $image=$row['image'];
			$fname = $row['fname'];
			$lname = $row['lname'];
			$email = $row['email'];
			$saddress=$row['saddress'];
			$city=$row['city'];
			$pin=$row['pin'];
			$state=$row['state'];
			$number=$row['number'];


	if(isset($_GET['Submit'])){//if the submit button is clicked

	$nfname = $_GET['nfname'];

	$nlname = $_GET['nlname'];

	$nemail = $_GET['nemail'];

	$npassword = base64_encode($connection->real_escape_string($_GET['npassword']));

	$nsaddress=$_GET['nsaddress'];

	$ncity=$_GET['ncity'];

	$npin=$_GET['npin'];

	$nstate=$_GET['nstate'];

	$nnumber=$_GET['nnumber'];


	$update = $connection->query("UPDATE employee SET fname='$nfname', lname='$nlname', email='$nemail',
    password='$npassword',saddress='$nsaddress',
    city='$ncity',pin='$npin',state='$nstate',number='$nnumber' WHERE emp_id = '$emp_id'");





if($update === true){//if the update worked

		$message = "Update Successful";
			echo "<script type='text/javascript'>alert('$message');
			window.location.href='emp_profile.php';
			</script>";
	header("Location:emp_profile.php");
}
else {

	$message = "Update Error";
			echo "<script type='text/javascript'>alert('$message');
			window.location.href='emp_update.php';
			</script>";
}


	}
?>

<script src="js/validation.js"> </script>
<?php include("nav.php"); ?>
<body style="background-image: url(images/salon-bg1.jpg);">

<div class="container" style=" min-height: 700px ">
    <h1 class="text-dark text-center" style="margin-top:40px; ">Update Details</h1>

<form action="emp_update.php" method="GET">
<div class="row" >
  <div class="col-lg-4 " >
  <img class="img-thumbnail mx-auto" src="<?php echo $row['image'];?>"
            alt="Card image cap" style="width: 300px;height: 300px;margin-top:50px"><br>
            </div>
  	<div class="col-lg-8 " style="margin-top:30px">
            <div class="row">
              <div class="col-1"></div>
            <div class="col-5  field-label-responsive font-weight-bold">
                <label for="sname">FIRST NAME:</label>
            </div>
            <div class="col-5 ">
                <div class="form-group">
                     <div class="input-group  ">

                        <input type="text" name="nfname" class="form-control " id="fname" required
                               placeholder="Employee Name" onChange="inputAlphabet(nfname)"
                                value="<?php echo $row['fname']; ?>">
							   </div>
                </div>
            </div></div>

            <div class="row">
            <div class="col-1"></div>
            <div class="col-5 field-label-responsive font-weight-bold">
                <label for="lname"> LAST  NAME:</label>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <div class="input-group ">

                        <input type="text" name="nlname" class="form-control" id="lname"
                               placeholder="Last Name" required onChange="inputAlphabet(nlname)" value="<?php echo $row['lname']; ?>">
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

                        <input type="nemail" name="nemail" class="form-control" id="email"
                               placeholder="you@example.com" required onChange="ValidateEmail(nemail)" value="<?php echo $row['email']; ?>">
                    </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-1"></div>
            <div class="col-5 field-label-responsive font-weight-bold">
                <label for="email">PASSWORD:</label>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <div class="input-group ">

                        <input type="password" name="npassword" class="form-control" id="password" required
                               placeholder="password"
                               onChange="lengthDefine(npassword,4), checkRePassword(npassword, rePassword)"
                               value="<?php echo base64_decode($row['password'])?>">
                    </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-1"></div>
            <div class="col-5 field-label-responsive font-weight-bold">
                <label for="email">CONFIRM PASSWORD:</label>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <div class="input-group ">

                        <input type="password" name="rePassword" class="form-control" id="rePassword"
                               placeholder="confirm password" required onChange="checkRePassword(npassword, rePassword)"
                               value="<?php echo base64_decode($row['password'])?>">
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

                        <input type="text" name="nsaddress" class="form-control" id="saddress"
                               placeholder="saddress" value="<?php echo $row['saddress']; ?>">
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
                               placeholder="city" onChange="inputAlphabet(ncity)" value="<?php echo $row['city']; ?>">
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

                            <input type="number" name="npin"   pattern="[0-9]" class="form-control" id="pin"
                                   placeholder="Pin" value="<?php echo $row['pin']; ?>">
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
                                   placeholder="State" onChange="inputAlphabet(nstate)" value="<?php echo $row['state']; ?>">
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

                        <input type="number" name="nnumber" pattern="[0-9]" class="form-control" id="snumber" required
                               placeholder="Contact Number" value="<?php echo $row['number']; ?>" onChange="lengthDefine(nnumber,10)" >
                    </div>
                </div>
            </div>
  </div>

	<INPUT TYPE="Submit" VALUE="Update Your Details" NAME="Submit" class="mx-auto">
</div>
	</div>
</div>
</form>
</body>


<!-- Footer -->
<div class="footer">
<div class=" text-light bg-dark" style="margin-bottom:0;  padding-bottom:10px; padding-top:20px;">

<?php include("footer.php") ?>

     </div></div>
  <!-- Footer -->
<?php }?>
