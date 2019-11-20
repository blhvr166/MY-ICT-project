<?php
session_start();
$user_check = $_SESSION['email'];
include("config.php");


   		$user_sql = $connection -> query("select * from salon where email='$user_check'");

		if ($user_sql -> num_rows == 1) {
			$row = $user_sql -> fetch_assoc();
			$id = $row['salon_id'];
      $image= $row['image'];
			$sname = $row['sname'];
			$oname = $row['oname'];
			$email = $row['email'];
      $password=$row['password'];
			$saddress=$row['saddress'];
			$city=$row['city'];
			$zip=$row['zip'];
			$state=$row['state'];
			$number=$row['number'];


	if(isset($_GET['Submit'])){//if the submit button is clicked

	$nsname = $_GET['nsname'];

	$noname = $_GET['noname'];

	$nemail = $_GET['nemail'];

  $npassword = base64_encode($connection->real_escape_string($_GET['npassword']));

	$nsaddress=$_GET['nsaddress'];

	$ncity=$_GET['ncity'];

	$nzip=$_GET['nzip'];

	$nstate=$_GET['nstate'];

	$nnumber=$_GET['nnumber'];


	$update = $connection->query("UPDATE salon SET sname='$nsname', oname='$noname', email='$nemail',
    password='$npassword',saddress='$nsaddress',city='$ncity',zip='$nzip',state='$nstate', number='$nnumber'
    WHERE salon_id = '$id'");


if($update === true){//if the update worked

		$message = "Update Successful";
			echo "<script type='text/javascript'>alert('$message');
			window.location.href='salon_update.php';
			</script>";
	header("Location:salon_profile.php");
}
else {

	$message = "Update Error";
			echo "<script type='text/javascript'>alert('$message');
			window.location.href='salon_update.php';
			</script>";
}


	}
?>

<script src="js/validation.js"></script>
<?php include("nav.php"); ?>
<body style="background-image: url(images/salon-bg1.jpg);">

<div class="container" style=" min-height: 700px ">
    <h1 class="text-dark text-center" style="margin-top:40px; ">Update Details</h1>

<form action="salon_update.php" method="GET">
<div class="row" >
  <div class="col-lg-4 " >
  <img class="img-thumbnail mx-auto" src="<?php echo $row['image'];?>"
            alt="Card image cap" style="width: 300px;height: 300px;margin-top:50px"><br>
            </div>
  	<div class="col-lg-8 " style="margin-top:30px">
            <div class="row">
              <div class="col-1"></div>
            <div class="col-5  field-label-responsive font-weight-bold">
                <label for="sname">SALON NAME:</label>
            </div>
            <div class="col-5 ">
                <div class="form-group">
                     <div class="input-group  ">

                        <input type="text" name="nsname" class="form-control " id="sname" required
                               placeholder="Salon Name" onChange="inputAlphabet(nsname)"
                                value="<?php echo $row['sname']; ?>">
							   </div>
                </div>
            </div></div>

            <div class="row">
            <div class="col-1"></div>
            <div class="col-5 field-label-responsive font-weight-bold">
                <label for="oname"> OWNER  NAME:</label>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <div class="input-group ">

                        <input type="text" name="noname" class="form-control" id="oname"
                               placeholder="Owner Name"  onChange="inputAlphabet(noname)" required value="<?php echo $row['oname']; ?>">
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

                        <input type="email" name="nemail" class="form-control" id="email"
                               placeholder="you@example.com" required  onChange="ValidateEmail(nemail)" value="<?php echo $row['email']; ?>">
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
                               placeholder="confirm password" required onChange="checkRePassword(npassword, rePassword)" required
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

                            <input type="number" name="nzip" class="form-control" id="zip"
                                   placeholder="Zip" pattern="[0-9]" value="<?php echo $row['zip']; ?>">
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
                                   placeholder="State" onChange="inputAlphabet(nstate)"
                                   value="<?php echo $row['state']; ?>">
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

                        <input type="number" name="nnumber" class="form-control" id="snumber" required
                               placeholder="Contact Number" pattern="[0-9]" value="<?php echo $row['number']; ?>" onChange="lengthDefine(nnumber,10)" >
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
