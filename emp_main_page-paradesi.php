<?php
	session_start();
include("config.php");
if(!isset($_SESSION["emp_code"])){
	header('Location: emp_main_page.php');
}

	$emp_code = $_SESSION["emp_code"];
include("config.php");
 //$connection = new mysqli("localhost", "root", "root", "ictatjcu_bandofbarbers");

		$data = $connection->query("SELECT * FROM employee WHERE emp_code='$emp_code'");
if ($data->num_rows>0){
			$row = $data -> fetch_assoc();
			$emp_id = $row['emp_id'];
			$fname = $row['fname'];
			$lname = $row['lname'];
			$email = $row['email'];
		$_SESSION["emp_code"] =$row['emp_code'];

	 	$slot = $connection->query("SELECT * FROM slot WHERE avail > CURTIME() AND emp_id='$emp_id' ORDER BY avail ASC ");
		  $row1 = $slot-> fetch_assoc();
}
 if(isset($_SESSION["emp_code"])){
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8"><link href="styles.css" rel="stylesheet">

    
    
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    
    
    
    
    
    
  <?php

if(!isset($_SESSION))
    {
        session_start();
    }


 //$connection = new mysqli("localhost", "root", "root", "ictatjcu_bandofbarbers");

?>

  
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
		
$check =  $_SESSION["email"];

			    $query5 = $connection->query("SELECT email FROM user WHERE email = '$check'");
				$query6 = $connection->query("SELECT email FROM salon WHERE email = '$check'");
				$query7 = $connection->query("SELECT email FROM employee WHERE email = '$check'");
				$row5 = $query5->fetch_assoc();
				$row6 = $query6->fetch_assoc();
				$row7 = $query7->fetch_assoc();
       	
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
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
	   $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' });
	   $( "#datepicker3" ).datepicker({ dateFormat: 'yy-mm-dd' });
	
  } );
  </script>
<link rel="stylesheet" href="styles.css">
    <script src="js/validation.js"></script>
<title>Employee Portal</title>
</head>


<body>

<div style=" font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif ; font-style: bold ; font-size: 16px; color: black;">

<div>
	<h3 style="text-align: center; margin-top:40px">Welcome <?php echo $row['fname']; ?></h3>
</div>
	</div>

			<div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h3 style="text-align: center; margin-top:40px">View Timeslots</h3>
                <div>
                
					<h2>View Time Slots:</h2><input type="text" name="date" id="datepicker">
                </div>
                 <div align="center" class="col-md-6">
	
	<select id="time" name="time"></select> 
	
	</div>
                <hr class="bg-danger">
                
            </div>
        </div>
        		<div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h3 style="text-align: center; margin-top:40px">Delete Timeslots</h3>
                <div>
                
					<h2>Select Date:</h2><input type="text" name="date" id="datepicker3">
                </div>
                 <div align="center" class="col-md-6">
	
	<select id="timedel" name="timedel"></select> 
	</div>
                <hr class="bg-danger">
                
            </div>
        </div>
        
<script>
	$(document).ready(function() {
    $("#timedel").change(function(e){
		e.preventDefault();
        $.ajax({
            type: 'POST',
			url: 'timeslot_delete.php',
			
            data:  {id:$('#timedel option:selected').val()},
			    success: function(data)
                {
				   alert("Time Slot Successfully Deleted");
				}
						   
    });
});
	});
</script>


 <script>
	 
    $(document).ready(function() {
       $('#datepicker').on('change',function(e) {
            e.preventDefault();
            $.ajax({
				cache: false,
                type: 'POST',
                url: 'employee_timeslots.php',
                data: {id: $('#datepicker').val()},
				
                success: function(data)
                {
			if(data != ''){
					$('#time').empty();
					var x = $.parseJSON(data);
						var check = [];
					$('#time').append($('<option>', {
								value: 1,
								text: 'Select a Time'
							}));
					$.each(x, function(index,time) {
						if (check.indexOf(time) == -1) {
                $("#time").append("<option value=" + time + ">" + time + "</option>");
                check.push(time);
            }
  					});
				
				} else {
					alert(" No Time Slots Available for the Selected Date");
					$('#time').empty();
						$('#time').append($('<option>', {
								value: 1,
								text: 'No Slots'
							}));
				}
				}
				
    });
});
	});
</script>
 <script>
	 
    $(document).ready(function() {
       $('#datepicker3').on('change',function(e) {
            e.preventDefault();
            $.ajax({
				cache: false,
                type: 'POST',
                url: 'delete.php',
                data: {id: $('#datepicker3').val()},
				
                success: function(data)
                {
			if(data != ''){
					$('#timedel').empty();
					var x = $.parseJSON(data);
						var check = [];
					$('#timedel').append($('<option>', {
								value: 1,
								text: 'Select a Time'
							}));
					$.each(x, function(index,time) {
						if (check.indexOf(time) == -1) {
                $("#timedel").append("<option value=" + time + ">" + time + "</option>");
                check.push(time);
            }
  					});
				
				} else {
					alert(" No Time Slots Available for the Selected Date");
					$('#timedel').empty();
						$('#timedel').append($('<option>', {
								value: 1,
								text: 'No Slots'
							}));
				}
				}
				
    });
});
	});
</script>


<div style=" font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif ; font-style: bold ; font-size: 16px; color: black;">
<h2 style="text-align: center; margin-top:40px">Update Your TimeSlots</h2>
<hr class="bg-danger">
	<form class="form-horizontal" method="post" action="timeslot_action.php">
	<div align="center">
		<input type="checkbox" name="time" value="08:00">08:00<br>
	<input type="checkbox" name="time[]" value="09:00">09:00<br>
	<input type="checkbox" name="time[]" value="10:00">10:00<br>
	<input type="checkbox" name="time[]" value="11:00">11:00<br>
	<input type="checkbox" name="time[]" value="12:00">12:00<br>
	<input type="checkbox" name="time[]" value="13:00">13:00<br>
	<input type="checkbox" name="time[]" value="14:00">14:00<br>
	<input type="checkbox" name="time[]" value="15:00">15:00<br>
	<input type="checkbox" name="time[]" value="16:00">16:00<br>
	<input type="checkbox" name="time[]" value="17:00">17:00<br>
	<input type="text" id="datepicker2" name="date"/>
    <input type="submit" name="submit" class="btn btn-danger" style="align-content: center" ></input>
	  </div>	    
	</form>


</div>



<!--
 <script>
 $(document).ready(function(){
      $('.view_data').click(function(){
           var id = $(this).attr("id");
           $.ajax({
                url:"timeslot_delete.php",
                method:"post",
                data:{id:id},
                success:function(data){
				 location.reload();
					//alert(data);


                }
           });
      });
 });
 </script> -->
	</body>
	<!-- Footer -->
<div class="footer">
<div class=" text-light bg-dark" style="margin-bottom:0;  padding-bottom:10px; padding-top:20px;">

<?php include("footer.php") ?>

     </div></div>
  <!-- Footer -->
</html>
<?php }?>
