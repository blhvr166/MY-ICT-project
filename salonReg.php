<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>Salon Registration</title>
</head>
<script src="js/validation.js"> </script>
<?php include('nav.php'); ?>
<body>

<div class="container-fluid " style="background-image: url(images/register-bg.jpg);background-repeat: no-repeat; background-size:100% 100%; min-height:600px " >
<div class="row" >
<div class="col-lg-6"></div>
<div class="col-lg-6" style="background: rgba(0, 0, 0, 0.6); padding-bottom:50px">
<div style=" font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif ; font-style: bold ; font-size: 16px; color: black;">
    <form class="form-horizontal text-white" role="form" method="POST" action="salon_register_action.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-12">
                <h2 style="text-align: center; margin-top:60px"><b>Register a SALON</b></h2>
                <hr class="bg-danger mt-5">
            </div>
        </div>
		<div class="row" style="margin-top:30px">
            <div class="col-1"></div>
            <div class="col-5 field-label-responsive font-weight-bold">
                <label for="image">SALON IMAGE:</label>
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
            <div class="col-1"></div>
            <div class="col-5 field-label-responsive font-weight-bold">
                <label for="sname">SALON NAME:</label>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <div class="input-group">

                        <input type="text" name="sname" class="form-control" id="sname"
                               placeholder="Salon Name" required autofocus onChange="inputAlphabet(sname)">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-5 field-label-responsive font-weight-bold">
                <label for="oname">BOSS NAME:</label>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <div class="input-group">

                        <input type="text" name="oname" class="form-control" id="oname"
                               placeholder="Owner Name" required onChange="inputAlphabet(oname)">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-5 field-label-responsive font-weight-bold">
                <label for="email">SALON MAIL:</label>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <div class="input-group ">

                        <input type="text" name="email" class="form-control" id="semail"
                               placeholder="you@example.com" required onChange="ValidateEmail(semail)" >
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
                <label for="password">CONFIRM PASSWORD:</label>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <div class="input-group ">

                        <input type="password"  name="rePassword" class="form-control"
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
                <div class="form-group has-danger">
                    <div class="input-group ">

                        <input type="text" name="saddress" class="form-control" id="address"
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
                <div class="form-group has-danger">
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
                <div class="form-group has-danger">
                    <div class="input-group ">

                        <input type="number" name="zip" class="form-control" id="zip" pattern="[0-9]"
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
                <div class="form-group has-danger">
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
                <label for="number">SALON NUMBER:</label>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <div class="input-group ">

                        <input type="number" name="number" class="form-control" id="snumber" pattern="[0-9]"
                               placeholder="Store Contact Number" required onChange="lengthDefine(number,10)" >
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top:30px">
            <div class="col-5"></div>
            <div class="col-5">
                <button type="submit" name = "register" class="btn btn-danger" > Register</button>
            </div>
        </div>
    </form>
	</div>

<br>
    </div></div>
    </div>
    </body>
<!-- Footer -->
<div class="footer">
<div class=" text-light bg-dark" style="margin-bottom:0;  padding-bottom:10px; padding-top:20px;">

<?php include("footer.php") ?>

     </div></div>
  <!-- Footer -->

</html>
