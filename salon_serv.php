<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="styles.css">

<script src="js/validation.js"></script>
<title>Service Registration</title>
</head>

<?php include('nav.php'); ?>
<body style="background-image: url(images/salon-bg1.jpg);">
<div class="container-fluid" style="min-height:600px" >

<div style=" font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif ; font-style: bold ; font-size: 16px; color: black;">
    <form class="form-horizontal" role="form" method="POST" action="service_register_action.php" enctype="multipart/form-data">
        <h1 class="text-dark text-center" style="margin-top:40px; ">ADD A SERVICE</h1>
        <hr class="bg-danger w-75">
				<div class="row" style="margin-top:30px">
								<div class="col-md-2"></div>
								<div class="col-md-3 field-label-responsive">
										<label for="image">Service Image:</label>
								</div>
								<div class="col-md-5">
										<div class="form-group">
												<div class="input-group mb-2 mr-sm-2 mb-sm-0">
														<input id="serv_image" type="file" accept="image/*" name="image" >
												</div>
										</div>
								</div>
						</div>
				<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-3 field-label-responsive">
								<label for="serv_name">Service Name:</label>
						</div>
						<div class="col-md-5">
								<div class="form-group">
										<div class="input-group mb-2 mr-sm-2 mb-sm-0">

												<input type="text" name="service" class="form-control" id="serv_name"
															 placeholder="Service Name" required autofocus onChange="inputAlphabet(serv_name)">
										</div>
								</div>
						</div>
				</div>
				<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-3 field-label-responsive">
								<label for="serv_desc">Service Description:</label>
						</div>
						<div class="col-md-5">
								<div class="form-group">
										<div class="input-group mb-2 mr-sm-2 mb-sm-0">

												<input type="text" name="description" class="form-control" id="serv_desc"
															 placeholder="Service Description" required autofocus onChange="inputAlphabet(serv_desc)">
										</div>
								</div>
						</div>
				</div>
				<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-3 field-label-responsive">
								<label for="sprice">Service Price:</label>
						</div>
						<div class="col-md-5">
								<div class="form-group">
										<div class="input-group mb-2 mr-sm-2 mb-sm-0">

												<input type="text" name="price" class="form-control" id="sprice"
															 placeholder="Service Price" >
										</div>
								</div>
						</div>
				</div>
        
                <button type="submit" name = "register" class="btn btn-danger d-flex mx-auto mt-5" > Register</button>
         
    </form>
	</div>

<br>

    </div>
    
</body>

<!-- Footer -->
<div class="footer">
<div class=" text-light bg-dark" style="margin-bottom:0;  padding-bottom:10px; padding-top:20px;">
  
<?php include("footer.php") ?>
  
     </div></div>
  <!-- Footer -->  
</html>
