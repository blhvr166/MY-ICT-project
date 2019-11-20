<?php
session_start();
include("config.php");
//get by id or email of the salon
$id = $_GET['id'];
$_SESSION["salonid"] = $id ;
$check =  $_SESSION["email"];

			    $query5 = $connection->query("SELECT email FROM user WHERE email = '$check'");
				$query6 = $connection->query("SELECT email FROM salon WHERE email = '$check'");
				$query7 = $connection->query("SELECT email FROM employee WHERE email = '$check'");
				$row5 = $query5->fetch_assoc();
				$row6 = $query6->fetch_assoc();
				$row7 = $query7->fetch_assoc();

//$connection = new mysqli("localhost", "root", "root", "ictatjcu_bandofbarbers");

$data1 = $connection->query("SELECT * FROM salon WHERE salon_id =" .$id);

$data2 = $connection->query("SELECT * FROM employee WHERE fname IS NOT NULL AND employee.salon_id =" . $id );
$data3 = $connection->query("SELECT * FROM slot WHERE  slot.salon_id =" . $id );
$data4 = $connection->query("SELECT * FROM services WHERE service IS NOT NULL AND services.salon_id =" . $id );

$row1 = $data1 -> fetch_assoc();
$row2 = $data2 -> fetch_assoc();
$row3 = $data3 -> fetch_assoc(); 
$row4 = $data4 -> fetch_assoc(); 

?>

<!DOCTYPE html>
<html>
<head>
	<title>Salon Description</title>
    
    
<?php
include("config.php");
if(!isset($_SESSION))
    {
        session_start();
    }


 //$connection = new mysqli("localhost", "root", "root", "ictatjcu_bandofbarbers");

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">






  <nav class="navbar navbar-expand-lg bg-dark  navbar-dark sticky-top" style="sm-padding-bottom:10px; padding-top:0px;  ">
   <a class="navbar-brand " href="index.php"><ul class="list-unstyled list-inline">
       <li class="list-inline-item"><img src="images/logo5.png" alt="logo" class="img-fluid " style="width:70px; height:70px"></li>
       <li class="list-inline-item" ><div style="margin-top:40px"><h4>Band Of <text class="text-danger">Barbers</text></h4></div></li>
  </ul></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">

      <ul class="navbar-nav mx-auto ">
      <li class="nav-item p-2 ">
        <a class="nav-link"  href="index.php" style="color:#ffffff"> Home</a>
      </li>
        <li class="nav-item p-2" >
        <a class="nav-link"  href="salons.php" style="color:#ffffff; " >Salons</a>
      </li>
      <li class="nav-item p-2" >
        <a class="nav-link" href="about.php" style="color:#ffffff;  ">Why Us?</a>
      </li>
      <li class="nav-item p-2" >
        <a class="nav-link " href="contact.php" style="color:#ffffff; ">Contact</a>
      </li>


         </ul>



      <ul class="navbar-nav ml-auto" id="collapsibleNavbar">



        <div class="navbar-buttons" >


 <?php


  if(isset($_SESSION["email"])) {
		

       	
	?>
		<?php if($check = $row5['email']){ ?>

           <a class="btn btn-md btn-outline-danger nav-item "   href="user_profile.php?id=<?php echo $_SESSION["email"]; ?>" style="color:#ffffff"><i class="fa fa-user"></i> <span class="clearfix d-none d-inline-block" >Account</span></a>
		 <?php } elseif($check = $row6['email']){?>

           <a class="btn btn-md btn-outline-danger nav-item" href="salon_profile.php?id=<?php echo $_SESSION["email"]; ?>" style="color:#ffffff"><i class="fa fa-user"></i> <span class="clearfix d-none d-inline-block">Account</span></a>

		 <?php } elseif($check = $row7['email']){?>
           <a class="btn btn-md btn-outline-danger nav-item"  href="emp_profile.php?id=<?php echo $_SESSION["email"]; ?>" style="color:#ffffff"><i class="fa fa-user"></i> <span class="clearfix d-none d-inline-block">Account</span></a>
		 <?php } else {?>
		 <?php } ?>
           <?php } ?>

 		<?php if(isset($_SESSION["email"])){?>



        <a class="btn btn-md btn-outline-danger nav-item" href="logout.php" style="color:#ffffff">Logout</a>

          <?php } else { ?>
          <a href="login.php" style="color:#ffffff; " class="btn btn-md btn-outline-danger nav-item">Login</a>
          <?php } ?>

          </div>
 </ul>

     </div>


</nav>


    
    
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    
    

    
    
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
				
                $("#employee_check").append("<option value=" + employee + ">" + employee + "</option>");
           
				//alert(employee);
					//$('#employee_check').append('<option value="' + employee + '">'+ employee + '</option>');
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
    
</head>


<body style="background-image: url(images/salon-bg1.jpg);">
<div id="home" class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url(<?php echo $row1['image'];?>); background-repeat: no-repeat; background-size:cover; background-position: center center; min-height:700px">
          <div class="mask rgba-stylish-light">
            <div class="container h-100 d-flex justify-content-center align-items-center" >
                <div class="row pt-5 mt-3">
                    <div class="col-md-12 mb-3">
                        <div class=" text-center text-white" style="padding-top:150px">
                            <h1 class="display-3 white-text mb-5 wow fadeInDown font-weight-bold" data-wow-delay="0.3s" style="background: rgba(0, 0, 0, 0.3); padding:10px"><?php echo $row1['sname']; ?></h1>
                            <h6 class="text-uppercase white-text mb-3 mt-1 font-weight-bold wow fadeInDown " data-wow-delay="0.3s">Check Our</h6>
                            <a href="#employee" class="btn btn-light btn-lg wow fadeInDown" style="width:150px" >STYLISTS</a>
                            <a href="#services" class="btn btn-light btn-lg wow fadeInDown" style="width:150px" >SERVICES</a><br>
                            
                            <?php if($check_email = $row5['email'] || !isset($_SESSION['email'])){ ?>
                            
                            <a href="#book-appointment" class="btn btn-danger btn-lg wow fadeInDown" style="margin-top:20px" >BOOK APPOINTMENT</a>
                            
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>       

<div class="container-fluid bg-light pt-4">
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

   
    <div class="container" id="employee"> 
        <h1 class="text-center text-dark font-weight-bold mt-4  mx-auto">STYLISTS</h1>
        <hr>
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
 
     
  <!--/.Indicators-->

  <!--Slides-->
    
  <div class="carousel-inner" role="listbox">

      
    <!--First slide-->

      
    <div class="carousel-item active">
    <div class="row">
        
        <?php
        
        
        $counter = 1;
        do {       
        if ($counter%2 == 0){
        ?> 
        

        </div>
        </div>
        <div class="carousel-item">
        <div class="row"> 
         
        <?php
        }?> 
                    
        <div class="col-lg-3 mx-auto">
        <div class="card mb-5 " style="background:transparent; height:400px">
          <img class="rounded-circle mx-auto mt-3"
            src="images/salon-bg4.jpg"
            alt="Card image cap" style="width: 150px;height: 150px">
          <div class="card-body text-center">
            <h4 class="card-title text-uppercase"><?php echo $row2['fname']; ?></h4>
            <p class="card-text ">Description Of Employee which gives better idea about the specialization of the stylist</p>
            
          </div>
            </div>
            </div> 
          
          
      
     <?php $counter*=2; } while($row2 = $data2 -> fetch_assoc()) ?>   
            </div>
      </div>
      
    
            
            </div>
    <!--/.First slide-->


  </div>
  <!--/.Slides-->

</div>
<!--/.Carousel Wrapper-->

   <hr class="bg-danger " style="margin-top:100px">
    
 <div class="container" id="services" > 
    <h1 class="text-center text-dark font-weight-bold   mx-auto">SERVICES</h1>
     <hr>
        <br>
    <div id="multi-item" class="carousel slide carousel-multi-item" data-ride="carousel">

  <!--Controls-->
  
    <a class="carousel-control-prev " href="#multi-item" data-slide="prev">
    <span class="carousel-control-prev-icon bg-danger"></span>
  </a>
  <a class="carousel-control-next" href="#multi-item" data-slide="next">
    <span class="carousel-control-next-icon bg-danger"></span>
  </a>
 
  <!--/.Controls-->

  <!--Indicators-->

  <!--/.Indicators-->

  <!--Slides-->
  <div class="carousel-inner" role="listbox">

      

    <!--First slide-->
    <div class="carousel-item active">
     <div class="row justify-content-center">
         
    <?php
          $counter =1;       
            do { ?>
                     
                
      <?php   if ($counter%2 == 0){
        ?>
         
         
          </div>
        </div>
        <div class="carousel-item">
        <div class="row"> 
            
           
        <?php
        }?> 
            
        <div class="col-lg-3 mx-auto">
        <div class="card mb-5 " style="background:transparent; height:400px">
        <img class="rounded-circle mx-auto mt-3"
            src="<?php echo $row4['image'];?>"
            alt="Card image cap" style="width: 150px;height: 150px">
          <div class="card-body text-center d-flex flex-column">
            <h4 class="card-title text-uppercase"><?php echo $row4['service']; ?></h4>
            <p class="card-text "><?php echo $row4['description']; ?></p>
             <button class="btn btn-danger text-light font-weight-bolder w-50 mt-auto mx-auto" style="" disabled ><?php echo $row4['price']; ?></button>
          </div>
        </div>
      </div>

      
<?php $counter*=2; } while($row4 = $data4 -> fetch_assoc()) ?>
      
     </div>
    </div>
    <!--/.First slide-->

  </div>
  <!--/.Slides-->

</div>
    </div>
    
    <?php if($check_email = $row5['email'] || !isset($_SESSION['email'])){ ?>
    
    
    <hr class="bg-danger " style="margin-top:100px">

    
  
                              
    
    
    <div class="container" id="book-appointment"> 

  <div  >
        
      
      <div align="center">
        <p style="font-size:30px; text-align: center;"> Book An Appointment</p>
    </div>
    <div align="center">
<button id="start">Click Here </button>
		</div>
		


<?php 
$services = $connection->query("SELECT * FROM services WHERE service IS NOT NULL AND services.salon_id =" . $id );
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
      
    
    </div>
	</div>
    
    
    <?php } ?> <br>
	 
   
    </body>
	
<!-- Footer -->
<div class="footer">
<div class=" text-light bg-dark" style="margin-bottom:0;  padding-bottom:10px; padding-top:20px;">
  
<?php include("footer.php") ?>
  
     </div></div>
  <!-- Footer -->

</html>
