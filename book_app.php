
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
					$('#employee').empty();
				var emp = $.parseJSON(data);
				$('#employee').append($('<option>', {
								value: 1,
								text: 'Select an Employee'
							}));
					$.each(emp, function(index,employee) {
						
				//alert(employee);
					$('#employee').append('<option value="' + employee + '">'+ employee + '</option>');
                  //$("#employee").html(data);
					});
				}
						   
    });
});
	});
</script>
 <!--<script>
	function getdate() {
   var input = document.getElementById("datepicker").value;
   alert(input);
}
	</script> -->
<!--<script>
      $(function () {
		   $("form").submit(function(event) {
       // $('form').bind('click', function (event) {
event.preventDefault();// using this page stop being refreshing 

          $.ajax({
            type: 'POST',
            url: 'confirm_booking.php',
            data: $('form').serialize(),
            success: function () {
              alert('submitted');
            }
          });

        });
      });
    </script> -->

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
        dataType: 'json'
    }).success(function(data) {
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
		
    });
	
			});
		});
</script>
<!--<script>
$(document).ready(function(){
	$("#service_select").hide();
	$("#start").click(function(){
	$("#service_select").show(1000);
		$('html, body').animate({
                scrollTop: $("#service_select").offset().top
            }, 2000);
		$("#start").hide();
	});
});
</script> -->
<script>
$(document).ready(function(){
	$("#confirm").hide();
	$("#employee").change(function(){
		$("#confirm").show(1000);
		$('html, body').animate({
                scrollTop: $("#confirm").offset().top
            }, 2000);
	});
});
</script>
<script>
	
</script>
<body>


    <hr class="bg-danger " style="margin-top:100px">

<div align="center">
        <p style="font-size:30px; text-align: center;"> Book An Appointment</p>
    </div>
<button id="start">Click Here </button>
	
	


<?php 
$services = $connection->query("SELECT * FROM services WHERE salon_id=".$salonid);
$row4 = $services -> fetch_assoc(); 
	$serv_id = $row4['serv_id'];
	?>

<?php if($services->num_rows>0) {?>
<form action="confirm_booking.php" method="post">
<div id="service_select" class="jumbotron jumbotron-fluid">
<div class="container">
<div >
<h1 class="display-4">Select Services </h1>
<?php do { ?>
<input type="checkbox" class="service_check" name="services[]" value="<?php echo $row4['serv_id'];?>"> <?php echo $row4['serv_name'];?>
<?php } while($row4 = $services -> fetch_assoc()) ?>
<?php } else {?>
<h3>No services Yet </h3>
<?php } ?>

</div>
</div>
	</div>
<div id="date_select" class="jumbotron jumbotron-fluid">
<div class="container">
<h1 class="display-4">Pick a Date </h1>
<div >
<input type="text" id="datepicker" name="date">
</div>
	</div>
	</div>
	
<div id="time_select" class="jumbotron jumbotron-fluid">
<div class="container">
<h1 class="display-4">Pick a Time </h1>
<div>
<select id="time" name="time"></select> 
</div>
	</div>
	</div>
<div id="emp_select" class="jumbotron jumbotron-fluid">
<div class="container">
<h1 class="display-4">Choose Your Stylist</h1>
<div >
<select id="employee" name="employee"></select>
</div>
	</div>
	</div>

<input id="confirm" name="book" type="submit" value="Lets do This">

</form>
		
 

</body>
</html>

