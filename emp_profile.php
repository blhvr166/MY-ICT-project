
<?php
session_start();
$user_check = $_SESSION['email'];
include("config.php");
		//$connection = new mysqli("localhost", "root", "root", "ictatjcu_bandofbarbers");
		$user_sql = "select * from employee where email='$user_check'";
   		$user_sql = $connection -> query($user_sql);

        $slot_query = $connection -> query(" SELECT * FROM slot WHERE emp_id = (SELECT emp_id FROM employee WHERE email = '$user_check')");
        
        $slot_info = $slot_query->fetch_assoc();

        $salon_id = $slot_info['salon_id'];
        $emp_id = $slot_info['emp_id'];
        $salon_id = $slot_info['salon_id'];
        $date = $slot_info['date'];
        $user_id = $slot_info['user_id'];


        
        $booking_query = $connection -> query ("SELECT avail, date, slot.emp_id, slot.user_id, slot.customer, slot.c_number
        FROM slot
        WHERE slot.emp_id = '$emp_id' 
        AND slot.user_id IS NOT NULL
        AND slot.date >= CURDATE()
        ORDER BY slot.date ASC");

        $booking_info = $booking_query->fetch_assoc();

        

		if ($user_sql -> num_rows == 1) {
    	//make a query to check if a valid user
    	$ses_sql = "select * from employee where email='$user_check'";

  	// check session variable
  	if (isset($_SESSION['email']))
  	{

		$user_check = $_SESSION['email'];

		//$connection = new mysqli("localhost", "root", "root", "ictatjcu_bandofbarbers");


    	//make a query to check if a valid user
    	$ses_sql = "select * from employee where email='$user_check'";
    	$result = $connection -> query($ses_sql);

		if ($result -> num_rows == 1) {
			$row = $result -> fetch_assoc();
			$id = $row['emp_id'];
			$image=$row['image'];
			$fname = $row['fname'];
			$lname = $row['lname'];
			$email = $row['email'];
			$saddress=$row['saddress'];
			$city=$row['city'];
			$zip=$row['pin'];
			$state=$row['state'];
			$number=$row['number'];





	?>
<?php include("nav.php"); ?>
<body style="background-image: url(images/salon-bg1.jpg); ">
<div class="container  " style="text-align:center; min-height: 700px">
    <h1 class="text-dark list-inline-item " style="margin-top:40px">My Account </h1>
	<div class="row">
	<div class="col-xl-4">
	<img class="rounded-circle mx-auto"
            src="<?php echo $row['image'];?>"
            alt="Card image cap" style="width: 300px;height: 300px;margin-top:50px"><br>
		<p style="font-family: aladin; font-size:35px"><?php echo $row["fname"] ?> &nbsp; <?php echo $row["lname"] ?> </p>
		<a  href=emp_update.php class="btn btn-outline-danger" style="float:center" >EDIT </a> &nbsp;
		<a  href=emp_main_page.php class="btn btn-outline-danger" style="float:center"> ADD TIMESLOTS</a>

	</div>



    <div class="col-xl-8 col-12" >   
	<table class="table mx-auto table-dark table-striped  text-uppercase" style=" margin-top:50px">

          <tr >
             <td> First Name:</td>
            <td><?php echo $row["fname"] ?></td>
          </tr>
          <tr>
             <td> Last Name:</td>
             <td> <?php echo $row["lname"] ?></td>
          </tr>
          <tr>
              <td>Email:</td>
                <td><?php echo $row["email"] ?></td>
          </tr>
					<tr>
	              <td>Password:</td>
	                <td><?php echo base64_decode($row["password"]) ?></td>
	          </tr>
		<tr>
              <td>Address:</td>
                <td><?php echo $row["saddress"] ?></td>
          </tr>
        <tr>
              <td>City:</td>
                <td><?php echo $row["city"] ?></td>
          </tr>
		<tr>
              <td>Pin:</td>
                <td><?php echo $row["pin"] ?></td>
          </tr>
		<tr>
              <td>State:</td>
                <td><?php echo $row["state"] ?></td>
          </tr>
		<tr>
              <td>Phone:</td>
                <td><?php echo $row["number"] ?></td>
          </tr>
			</table>
        
        <div class="container" id="history" > 
        
        <h1 class="text-center text-dark font-weight-bold mt-4  w-100 mx-auto dropdown-item-text">BOOKINGS</h1>
        <br>

<div id="multi-item" class="carousel slide carousel-multi-item" data-ride="carousel">
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
                
    <div class="row"> 
        
        <?php
          $counter =1;  
            
           if($booking_query->num_rows > 0){  
            do { ?>
                     
                
      <?php   if ($counter%2 == 0){
        ?>
         
         
          </div>
        </div>
        <div class="carousel-item">
        <div class="row"> 
            
           
        <?php
        }?> 
            
        <div class="col-10 mx-auto">
            
        
        <div class="card mb-5 mx-auto" style="background:transparent; height:auto; width:auto">
          
          <div class="card-body text-center">
              
            <div class="row">
                <div class="col-4">
                    <h6 class="card-title text-uppercase text-left">Customer</h6>
                </div>
                <div class="col-0">
                    <h6 class="card-title text-uppercase text-left">:</h6>
                </div>
                <div class="col-7">
                    <h6 class="text-left"><?php echo $booking_info['customer'];?></h6>
                </div>
            
            </div>
            <div class="row">
                <div class="col-4">
                    <h6 class="card-title text-uppercase text-left">Phone</h6>
                </div>
                <div class="col-0">
                    <h6 class="card-title text-uppercase text-left">:</h6>
                </div>
                <div class="col-7">
                    <h6 class="text-left"><?php echo $booking_info['c_number'];?></h6>
                </div>
            
            </div>
            <div class="row">
                <div class="col-4">
                    <h6 class="card-title text-uppercase text-left">Date</h6>
                </div>
                <div class="col-0">
                    <h6 class="card-title text-uppercase text-left">:</h6>
                </div>
                <div class="col-7">
                    <h6 class="text-left"><?php echo $booking_info['date'];?></h6>
                </div>
            
            </div>
            <div class="row">
                <div class="col-4">
                    <h6 class="card-title text-uppercase text-left">Time</h6>
                </div>
                <div class="col-0">
                    <h6 class="card-title text-uppercase text-left">:</h6>
                </div>
                <div class="col-7">
                    <h6 class="text-left"><?php echo $booking_info['avail'];?></h6>
                </div>
            
            </div>
             
            
          </div>
            </div>
     
            
            
       
            
             
            
          </div>
          
       <?php $counter*=2; } while($booking_info = $booking_query->fetch_assoc()) ?>  
        
      
    
       <?php } else { ?>
        
            <div class="card mb-5 mx-auto" style="background:transparent; height:auto; width:auto">
          
          <div class="card-body text-center">
              
            <h4> You do not have any appointment. </h4>
              
              
        <?php } ?>
      </div>
        
        </div> 
     </div>
    </div>
    </div>       
            </div>
      </div>
        
        
        </div>
	</div>

</div>
		<!-- Footer -->
<div class="footer">
<div class=" text-light bg-dark" style="margin-bottom:0;  padding-bottom:10px; padding-top:20px;">

<?php include("footer.php") ?>

     </div></div>
  <!-- Footer -->
<?php } ?>
  <?php } ?>
  <?php } else {
	header(("Location:index.php"));
?>
<?php }?>
