

<!doctype html>
<html><head>
<meta charset="UTF-8">


<title>Contact Us</title>

    </head>

    <?php include('nav.php');?>
  <body style="background-image: url(images/salon-bg1.jpg); ">

<div class="container">

<div style=" font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif ; font-style: bold ; font-size: 16px; color: black;">
    <h2 class="text-center" style="font-size:34px; margin-top:40px">GET IN TOUCH</h2>
    <hr class="bg-danger">
    <form class="form-horizontal text-light" role="form" method="POST" action="contact_action.php" enctype="multipart/form-data">

    <div id="contact" class="container-fluid bg-grey">

  <div class="row text-dark" style="margin-top:40px">
    <div class="col-sm-4">
         <div class="col-md-3"></div>
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Brisbane, Australia</p>
      <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
      <p><span class="glyphicon glyphicon-envelope"></span> bandofbarbers@gmail.com</p>
    </div>

    <div class="col-7 slideanim">

      <div class="row">
        <div class="col-12 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-12 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
        <div class="col-12 form-group">
          <input class="form-control" id="phone" name="phone" placeholder="Phone Number" type="number" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comment" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-12 form-group">
          <button class="btn btn-lg btn-outline-danger mx-auto d-block" type="submit" name="submit" style="margin-top:30px" >Send</button>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
</div>
    </div>
    </body>
<!-- Image of location/map -->
<img src="images/map.jpg" class="w3-image w3-greyscale-min" style="width:100%; margin-top:40px">


<!-- Footer -->
<div class="footer">
<div class=" text-light bg-dark" style="margin-bottom:0;  padding-bottom:10px; padding-top:20px;">

<?php include("footer.php") ?>

     </div></div>
  <!-- Footer -->



</html>
