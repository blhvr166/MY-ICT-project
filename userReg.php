<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>User Registration</title>
</head>

<script src="js/validation.js"> </script>
<?php include('nav.php'); ?>
<body>

<div class="container-fluid " style="background-image: url(images/register-bg.jpg);background-repeat: no-repeat; background-size:100% 100%; min-height:600px " >
<div class="row" >
<div class="col-lg-6"></div>
<div class="col-lg-6" style="background: rgba(0, 0, 0, 0.6); padding-bottom:50px">
<div style=" font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif ; font-style: bold ; font-size: 16px; color: black;">
    <form class="form-horizontal text-light" role="form" method="POST" action="user_register_action.php">
	<div class="row">
            <div class="col-sm-12">
                <h2 style="text-align: center;  margin-top:60px"><b>Register as a CLIENT</b></h2>
                <hr class="bg-danger mt-5">
            </div>
        </div>
        <div class="row" style="margin-top:30px">
                <div class="col-1"></div>
                <div class="col-5 field-label-responsive font-weight-bold">
                    <label for="image">USER IMAGE:</label>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <div class="input-group ">
                            <input id="uploadimage" type="file" accept="image/*" name="image">
                        </div>
                    </div>
                </div>
            </div>
        <div class="row">
             <div class="col-1 " ></div>
            <div class="col-5  field-label-responsive font-weight-bold">
                <label for="Fname">FIRST NAME:</label>
            </div>
            <div class="col-5 ">
                <div class="form-group">
                     <div class="input-group  ">

                        <input type="text" name="fname" class="form-control " id="Fname"
                               placeholder="First Name" required autofocus onChange="inputAlphabet(fname)">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-5 field-label-responsive font-weight-bold">
                <label for="lname">LAST NAME:</label>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <div class="input-group ">

                        <input type="text" name="lname" class="form-control" id="lname"
                               placeholder="Last Name" required onChange="inputAlphabet(lname)">
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

                        <input type="text" name="email" class="form-control" id="email"
                               placeholder="you@example.com" required onChange="ValidateEmail(email)">
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

                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="Password" required onChange="lengthDefine(password,4)">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-5 field-label-responsive font-weight-bold">
                <label for="password"> CONFIRM PASSWORD:</label>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <div class="input-group ">

                        <input type="password" class="form-control"
                               id="rePassword" placeholder="Password" required onChange="checkRePassword(password, rePassword)">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-5 field-label-responsive font-weight-bold">
                <label for="address">ADDRESS:</label>
            </div>
            <div class="col-5">
                <div class="form-group ">
                    <div class="input-group">

                        <input type="text" name="address" class="form-control" id="address"
                               placeholder="1234 Main St" required>
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
                <div class="form-group r">
                    <div class="input-group">

                        <input type="text" name="city" class="form-control" id="city"
                               placeholder="city" required onChange="inputAlphabet(city)">
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

                            <input type="number" name="pin" class="form-control" id="zip" pattern="[0-9]"
                                   placeholder="Zip" required onChange="checkZIPCode(zip)">
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

                            <input type="text" name="state" class="form-control" id="state"
                                   placeholder="State" required onChange="inputAlphabet(state)">
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

                        <input type="number" name="number" class="form-control" id="number" pattern="[0-9]"
                               placeholder="Contact Number" required size="10" onChange="phoneNumberCheck(number)" >
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:30px">
            <div class="col-5"></div>
            <div class="col-5 ">
                <button type="submit" name="submit" class="btn btn-danger" > Register</button>
            </div>
        </div>
    </form>
    </div>
    <br>
    </div> </div>
</div>
</body>
    <!-- Footer -->
<div class="footer">
<div class=" text-light bg-dark" style="margin-bottom:0;  padding-bottom:10px; padding-top:20px;">

<?php include("footer.php") ?>

     </div></div>
  <!-- Footer -->
</html>
