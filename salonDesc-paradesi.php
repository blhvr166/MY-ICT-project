<?php
session_start();
$_SESSION["email"];
include("config.php");

//get by id or email of the salon
$salonid = $_GET['id'];
$_SESSION["salonid"] = $salonid;
$data1 = $connection->query("SELECT * FROM salon WHERE salon_id =" .$salonid);
$row1 = $data1->fetch_assoc();

?>

<!DOCTYPE html>
<html>

<head>
	<title>Salon Description</title>
</head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
<?php include("nav.php") ?>



  <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
	
  } );
  </script>

 <script>
	 
    $(document).ready(function() {
		 $("#time_select").hide();
		//$(document).on("click", '.date', function() {
       $('#datepicker').on('change',function(e) {
            e.preventDefault();
			  $("#time_select").show(1000);
		   	$('html, body').animate({
                scrollTop: $("#time_select").offset().top
            }, 2000);
            $.ajax({
				cache: false,
                type: 'POST',
                url: 'time_option.php',
                data: {id: $('#datepicker').val()},
				
                success: function(data)
                {
				if(data != ''){
					$('#time').empty();
					var opts = $.parseJSON(data);
						var check = [];
					$('#time').append($('<option>', {
								value: 1,
								text: 'Select a Time'
							}));
					$.each(opts, function(index,time) {
						if (check.indexOf(time) == -1) {
                $("#time").append("<option value=" + time + ">" + time + "</option>");
                check.push(time);
            }
				//alert(time);
					//$('#time').append('<option value="' + time + '">'+ time + '</option>');
                   // $("#employee").html(data);	
                   // $("#time").html(data);
  					});
				
				} else {
					alert("Sorry No Time Slots Available for the Selected Date, Try another Day :)");
					$('#time').empty();
						$('#time').append($('<option>', {
								value: 1,
								text: 'No Slots'
							}));
					$("#confirm").hide();
					
				}
				}
						   
				
    });
});
	});
</script>
<script>
	$(document).ready(function() {
		$("#emp_select").hide();
		
    $("#time").change(function(e){
		e.preventDefault();
		$("#emp_select").show(1000);
			$('html, body').animate({
                scrollTop: $("#emp_select").offset().top
            }, 2000);
		
        $.ajax({
			
            type: 'POST',
			url: 'emp_check.php',
			
            data:  {id:$('#time option:selected').val()},
			    success: function(data)
                {
					$('#employee_check').empty();
				var emp = $.parseJSON(data);
				$('#employee_check').append($('<option>', {
								value: 1,
								text: 'Select an Employee'
							}));
					$.each(emp, function(index,employee) {
						
				//alert(employee);
					$('#employee_check').append('<option value="' + employee + '">'+ employee + '</option>');
                  //$("#employee").html(data);
					});
				}
						   
    });
});
	});
</script>
<script>
$(document).ready(function() {	
$('#date_select').hide();
$('.service_check').click(function(){
if(this.checked) {
        $('#date_select').show(1000);
	$('html, body').animate({
                scrollTop: $("#date_select").offset().top
            }, 2000);
	
	$("#confirm").hide();
    }
	else{
		$('#date_select').hide(1000);
	}
});
});
</script>
<script>
	$(document).ready(function(){
		$("#service_select").hide();
		$("#start").click(function(){
			var email = "<?php echo $_SESSION["email"];  ?>";
    $.ajax({
		type: 'POST',
        url: "booking_user_check.php",
		 data: {email: email},
        dataType: 'json',
		success:function(data) {
        //alert(data);
		 if (data == "user check") { 
			 $("#service_select").show(1000);
			 $('html, body').animate({
                scrollTop: $("#service_select").offset().top
            }, 2000);
			
              $("#start").hide();  
            
		 } else {
			 alert("Please Login To Book An Appointment");
		
		 }
    }
		
    });
	
			});
		});
</script>
<script>
$(document).ready(function(){
	$("#confirm").hide();
	$("#employee_check").change(function(){
		$("#confirm").show(1000);
		$('html, body').animate({
                scrollTop: $("#confirm").offset().top
            }, 2000);
		
	});
});
</script>

<body>
<div id="home" class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url(<?php echo $row1['image'];?>); background-repeat: no-repeat; background-size:cover; background-position: center center; min-height:700px">
          <div class="mask rgba-stylish-light">
            <div class="container h-100 d-flex justify-content-center align-items-center" >
                <div class="row pt-5 mt-3">
                    <div class="col-md-12 mb-3">
                        <div class=" text-center text-white" style="padding-top:150px">
                            <h1 class="display-3 white-text mb-5 wow fadeInDown font-weight-bold" data-wow-delay="0.3s" style="background: rgba(0, 0, 0, 0.3); padding:10px"><?php echo $row1['sname']; ?></h1>
                            <h6 class="text-uppercase white-text mb-3 mt-1 font-weight-bold wow fadeInDown " data-wow-delay="0.3s">Check Our</h6>
                            <a href="#employee" class="btn btn-danger btn-lg wow fadeInDown" style="width:150px" >STYLISTS</a>
                            <a href="#services" class="btn btn-light btn-lg wow fadeInDown" style="width:150px" >SERVICES</a><br>
                            <a href="#book-appointment" class="btn btn-light btn-lg wow fadeInDown" style="margin-top:20px" >BOOK APPOINTMENT</a>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>       
<br>
<div class="container-fluid">
    <div class="row">
    <div class="col-xl-4">
                    <ul class="list-inline text-center ">
                            <li class="list-inline-item"><i class="fas fa-map-marker fa-2x"></i> </li>
                            <li class="list-inline-item">
                                <ul class="list-inline text-center "><li class="list-inline-item">
                                    <p style="font-size:20px">
                                        <?php echo $row1['saddress']; ?>
                                        <?php echo $row1['city']; ?> &nbsp;
				                        <?php echo $row1['state']; ?>
                                        <?php echo $row1['zip']; ?>
                                    </p></li></ul>
                            </li>
                    </ul>
    </div>
    <div class="col-xl-4">
                    <ul class="list-inline text-center ">
                            <li class="list-inline-item"><i class="fas fa-phone fa-2x"></i> </li>
                            <li class="list-inline-item"><p style="font-size:20px"><?php echo $row1['number']; ?></p></li>
                    </ul>
    </div>
    <div class="col-xl-4">
                    <ul class="list-inline text-center">
                            <li class="list-inline-item"><i class="fas fa-envelope fa-2x"></i> </li>
                            <li class="list-inline-item"><p style="font-size:20px"><?php echo $row1['email']; ?></p></li>
                    </ul>
    </div>
    
    </div>
    
    </div>
<div class="container-fluid" style="background-image: url(images/salon-bg1.jpg);">
	</div>
   <br><br>
    <div class="container-fluid" id="employee"> 
        <h1 class="text-center text-DARK font-weight-bold">STYLIST</h1>
        <br>
<!--Carousel Wrapper-->
<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

  <!--Controls-->
  
    <a class="carousel-control-prev " href="#multi-item-example" data-slide="prev">
    <span class="carousel-control-prev-icon bg-danger"></span>
  </a>
  <a class="carousel-control-next" href="#multi-item-example" data-slide="next">
    <span class="carousel-control-next-icon bg-danger"></span>
  </a>
 
  <!--/.Controls-->

  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
    <li data-target="#multi-item-example" data-slide-to="1"></li>
    <li data-target="#multi-item-example" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->

  <!--Slides-->
  <div class="carousel-inner" role="listbox">

    <!--First slide-->
    <div class="carousel-item active">
     <div class="row justify-content-center">
      <div class="col-md-3">
        <div class="card mb-2" >
          <img class="rounded-circle mx-auto mt-3"
            src="images/salon-bg4.jpg"
            alt="Card image cap" style="width: 200px;height: 200px">
          <div class="card-body text-center">
            <h4 class="card-title ">Employee 1</h4>
            <p class="card-text ">Description Of Employee about the specialization of the stylist</p>
            <a class="btn btn-danger  text-light">BOOK</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card mb-2">
          <img class="rounded-circle mx-auto mt-3"
            src="images/user-bg.jpg"
            alt="Card image cap" style="width: 200px;height: 200px">
          <div class="card-body text-center">
            <h4 class="card-title">Employee 2</h4>
            <p class="card-text">Description Of Employee about the specialization of the stylist</p>
            <a class="btn btn-danger text-light">BOOK</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card mb-2">
          <img class="rounded-circle mx-auto mt-3"
            src="images/salon1.jpg"
            alt="Card image cap" style="width: 200px;height: 200px">
          <div class="card-body text-center">
            <h4 class="card-title">Employee 3</h4>
            <p class="card-text">Description Of Employee about the specialization of the stylist</p>
            <a class="btn btn-danger text-light">BOOK</a>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!--/.First slide-->

    <!--Second slide-->
    <div class="carousel-item">
     <div class="row justify-content-center">
      <div class="col-md-3">
        <div class="card mb-2">
          <img class="rounded-circle mx-auto mt-3"
            src="images/salon1.jpg" alt="Card image cap" style="width: 200px;height: 200px">
          <div class="card-body text-center">
            <h4 class="card-title">Employee 4</h4>
            <p class="card-text">Description Of Employee about the specialization of the stylist</p>
            <a class="btn btn-danger text-light">BOOK</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card mb-2">
          <img class="rounded-circle mx-auto mt-3"
            src="images/salon-bg4.jpg" alt="Card image cap" style="width: 200px;height: 200px">
          <div class="card-body text-center">
            <h4 class="card-title">Employee 5</h4>
            <p class="card-text">Description Of Employee about the specialization of the stylist</p>
            <a class="btn btn-danger text-light">BOOK</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card mb-2">
          <img class="rounded-circle mx-auto mt-3"
            src="images/user-bg.jpg" alt="Card image cap" style="width: 200px;height: 200px">
          <div class="card-body text-center">
            <h4 class="card-title">Employee 6</h4>
            <p class="card-text">Description Of Employee about the specialization of the stylist.</p>
            <a class="btn btn-danger text-light">BOOK</a>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!--/.Second slide-->

    <!--Third slide-->
    <div class="carousel-item">
     <div class="row justify-content-center">
      <div class="col-md-3">
        <div class="card mb-2">
          <img class="rounded-circle mx-auto mt-3"
            src="images/user-bg.jpg" alt="Card image cap" style="width: 200px;height: 200px">
          <div class="card-body text-center">
            <h4 class="card-title">Employee 7</h4>
            <p class="card-text">Description Of Employee about the specialization of the stylist</p>
            <a class="btn btn-danger text-light">BOOK</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card mb-2">
          <img class="rounded-circle mx-auto mt-3"
            src="images/salon1.jpg" alt="Card image cap" style="width: 200px;height: 200px">
          <div class="card-body text-center">
            <h4 class="card-title">Employee 8</h4>
            <p class="card-text">Description Of Employee about the specialization of the stylist</p>
            <a class="btn btn-danger text-light">BOOK</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card mb-2">
          <img class="rounded-circle mx-auto mt-3"
            src="images/salon-bg4.jpg" alt="Card image cap" style="width: 200px;height: 200px">
          <div class="card-body text-center">
            <h4 class="card-title">Employee 9</h4>
            <p class="card-text">Description Of Employee about the specialization of the stylist</p>
            <a class="btn btn-danger text-light">BOOK</a>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!--/.Third slide-->

  </div>
  <!--/.Slides-->

</div>
<!--/.Carousel Wrapper-->

   <hr class="bg-danger " style="margin-top:100px">
    
    <div class="conatiner-fluid" id="services" style="margin-top:100px"> 
    <h1 class="text-center text-DARK font-weight-bold">SERVICES</h1>
        <br>
    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

  <!--Controls-->
  
    <a class="carousel-control-prev " href="#multi-item-example" data-slide="prev">
    <span class="carousel-control-prev-icon bg-danger"></span>
  </a>
  <a class="carousel-control-next" href="#multi-item-example" data-slide="next">
    <span class="carousel-control-next-icon bg-danger"></span>
  </a>
 
  <!--/.Controls-->

  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
    <li data-target="#multi-item-example" data-slide-to="1"></li>
    <li data-target="#multi-item-example" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->

  <!--Slides-->
  <div class="carousel-inner" role="listbox">

    <!--First slide-->
    <div class="carousel-item active">
     <div class="row justify-content-center">
      <div class="col-md-3">
        <div class="card mb-2" >
          <img class="rounded-circle mx-auto mt-3"
            src="images/salon-bg4.jpg"
            alt="Card image cap" style="width: 200px;height: 200px">
          <div class="card-body text-center">
            <h4 class="card-title ">Employee 1</h4>
            <p class="card-text ">Description Of Employee about the specialization of the stylist</p>
            <a class="btn btn-danger  text-light">BOOK</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card mb-2">
          <img class="rounded-circle mx-auto mt-3"
            src="images/user-bg.jpg"
            alt="Card image cap" style="width: 200px;height: 200px">
          <div class="card-body text-center">
            <h4 class="card-title">Employee 2</h4>
            <p class="card-text">Description Of Employee about the specialization of the stylist</p>
            <a class="btn btn-danger text-light">BOOK</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card mb-2">
          <img class="rounded-circle mx-auto mt-3"
            src="images/salon1.jpg"
            alt="Card image cap" style="width: 200px;height: 200px">
          <div class="card-body text-center">
            <h4 class="card-title">Employee 3</h4>
            <p class="card-text">Description Of Employee about the specialization of the stylist</p>
            <a class="btn btn-danger text-light">BOOK</a>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!--/.First slide-->

    <!--Second slide-->
    <div class="carousel-item">
     <div class="row justify-content-center">
      <div class="col-md-3">
        <div class="card mb-2">
          <img class="rounded-circle mx-auto mt-3"
            src="images/salon1.jpg" alt="Card image cap" style="width: 200px;height: 200px">
          <div class="card-body text-center">
            <h4 class="card-title">Employee 4</h4>
            <p class="card-text">Description Of Employee about the specialization of the stylist</p>
            <a class="btn btn-danger text-light">BOOK</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card mb-2">
          <img class="rounded-circle mx-auto mt-3"
            src="images/salon-bg4.jpg" alt="Card image cap" style="width: 200px;height: 200px">
          <div class="card-body text-center">
            <h4 class="card-title">Employee 5</h4>
            <p class="card-text">Description Of Employee about the specialization of the stylist</p>
            <a class="btn btn-danger text-light">BOOK</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card mb-2">
          <img class="rounded-circle mx-auto mt-3"
            src="images/user-bg.jpg" alt="Card image cap" style="width: 200px;height: 200px">
          <div class="card-body text-center">
            <h4 class="card-title">Employee 6</h4>
            <p class="card-text">Description Of Employee about the specialization of the stylist.</p>
            <a class="btn btn-danger text-light">BOOK</a>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!--/.Second slide-->

    <!--Third slide-->
    <div class="carousel-item">
     <div class="row justify-content-center">
      <div class="col-md-3">
        <div class="card mb-2">
          <img class="rounded-circle mx-auto mt-3"
            src="images/user-bg.jpg" alt="Card image cap" style="width: 200px;height: 200px">
          <div class="card-body text-center">
            <h4 class="card-title">Employee 7</h4>
            <p class="card-text">Description Of Employee about the specialization of the stylist</p>
            <a class="btn btn-danger text-light">BOOK</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card mb-2">
          <img class="rounded-circle mx-auto mt-3"
            src="images/salon1.jpg" alt="Card image cap" style="width: 200px;height: 200px">
          <div class="card-body text-center">
            <h4 class="card-title">Employee 8</h4>
            <p class="card-text">Description Of Employee about the specialization of the stylist</p>
            <a class="btn btn-danger text-light">BOOK</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card mb-2">
          <img class="rounded-circle mx-auto mt-3"
            src="images/salon-bg4.jpg" alt="Card image cap" style="width: 200px;height: 200px">
          <div class="card-body text-center">
            <h4 class="card-title">Employee 9</h4>
            <p class="card-text">Description Of Employee about the specialization of the stylist</p>
            <a class="btn btn-danger text-light">BOOK</a>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!--/.Third slide-->

  </div>
  <!--/.Slides-->


</div>
    </div>
    <hr class="bg-danger " style="margin-top:100px">
    
<div align="center">
        <p style="font-size:30px; text-align: center;"> Book An Appointment</p>
    </div>
    <div align="center">
<button id="start">Click Here </button>
		</div>
		


<?php 
$services = $connection->query("SELECT * FROM services WHERE salon_id=".$salonid);
$row4 = $services -> fetch_assoc(); 
	$serv_id = $row4['serv_id'];
	?>

<?php if($services->num_rows>0) {?>
<form action="confirm_booking.php" method="post">
<div id="service_select">
<div align="center">
<div >
<h1 class="display-4">Select Services </h1>

<?php do { ?>
<input type="checkbox" class="service_check" name="services[]" value="<?php echo $row4['serv_id'];?>"> <?php echo $row4['service'];?>
<?php } while($row4 = $services -> fetch_assoc()) ?>
<?php } else {?>
<h3>No services Yet </h3>
<?php } ?>

</div>
</div>
	</div>
<div id="date_select">
<div align="center">
<h1 class="display-4">Pick a Date </h1>
<div >
<input type="text" id="datepicker" name="date">
</div>

	</div>
	</div>
	
<div id="time_select">
<div align="center">
<h1 class="display-4">Pick a Time </h1>
<div>
<select id="time" name="time"></select> 
</div>

	</div>
	</div>
<div id="emp_select">
<div align="center">
<h1 class="display-4">Choose Your Stylist</h1>
<div >
<select id="employee_check" name="employee"></select>
</div>

	</div>
	</div>
<div align="center">
<input id="confirm" name="book" type="submit" value="Lets do This">
	</div>
</form>
<br>
    </div></body>
	
<!-- Footer -->
<div class="footer">
<div class=" text-light bg-dark" style="margin-bottom:0;  padding-bottom:10px; padding-top:20px;">
  
<?php include("footer.php"); ?>
  
     </div></div>
  <!-- Footer -->

</html>
