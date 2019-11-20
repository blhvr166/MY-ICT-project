<?php 
include("config.php");
session_start(); 
$check_mail = $_SESSION["email"];
                $query5 = $connection->query("SELECT email FROM user WHERE email = '$check_mail'");
				$query6 = $connection->query("SELECT email FROM salon WHERE email = '$check_mail'");
				$query7 = $connection->query("SELECT email FROM employee WHERE email = '$check_mail'");

				$user_email = $query5->fetch_assoc();
				$boss_email = $query6->fetch_assoc();
				$emp_email = $query7->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Carousel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    
  <style>
 
        .jarallax {
          height: 700px;
        }

       
    
    </style>


<div id="myCarousel" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->

  <div class="carousel-inner">
    
    <div class="carousel-item active">
        
      <div id="home" class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url(images/hair.jpg); background-repeat: no-repeat; background-size: cover; background-position: center center;">
          
          <div class="mask rgba-stylish-light">
            <div class="container h-100 d-flex justify-content-center align-items-center" >
                <div class="row pt-5 mt-3">
                    <div class="col-md-12 mb-3">
                        <div class="intro-danger-content text-center text-white" style="padding-top:150px">
                            <h1 class="display-3 white-text mb-5 wow fadeInDown" data-wow-delay="0.3s" style="background: rgba(0, 0, 0, 0.3); padding:10px">Let us <i>STYLE</i> your <text class="white-text font-weight-bold">HAIR</text></h1>
                            
                            <?php if($check_email = $emp_email['email']){ ?>
                            
                            <h6 class="text-uppercase white-text mb-3 mt-1 font-weight-bold wow fadeInDown " data-wow-delay="0.3s">Do you have any Bookings?</h6>
                            <a href="emp_main_page.php" class="btn btn-danger btn-lg wow fadeInDown" data-wow-delay="0.3s">CHECK</a>
                            
                            
                            <?php }  ?>
                            
                           <?php if($check_email = $user_email['email'] || !isset($_SESSION['email'])){ ?>
                            
                            
                            <a href="salons.php" class="btn btn-danger btn-lg wow fadeInDown" data-wow-delay="0.3s">BOOK APPOINTMENT</a>
                            
                            <?php } ?>
                            
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
    <div class="carousel-item">
        <div id="home" class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url(images/connect.jpg); background-repeat: no-repeat; background-size:cover; background-position: center center;">
          <div class="mask rgba-stylish-light">
            <div class="container h-100 d-flex justify-content-center align-items-center" >
                <div class="row pt-5 mt-2">
                    <div class="col-12 mb-3">
                        <div class=" text-center text-white " style="padding-top:150px">
                            <h1 class="display-3 white-text mb-5 wow fadeInDown" data-wow-delay="0.3s" style="background: rgba(0, 0, 0, 0.3); padding:10px">Connecting SALONS  to our <text class="white-text font-weight-bold">CLIENTS</text> </h1>
                            
                            <?php 
                             if(!isset($_SESSION['email'])) { ?>
                            
                            <h6 class="text-uppercase white-text mb-3  font-weight-bold wow fadeInDown " data-wow-delay="0.3s">Register AS </h6>
                            <a href="salonReg.php" class="btn btn-danger btn-lg wow fadeInDown" style="width:100px" >BOSS</a>
                            <a href="userReg.php" class="btn btn-light btn-lg wow fadeInDown" style="width:100px" >CLIENT</a>
                                
                            <?php   } ?>
                           
                            
                            
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      
    </div>
    <div class="carousel-item">
      <div id="home" class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url(images/boss-bg.jpg); background-repeat: no-repeat; background-size: cover; background-position: center center;">
          <div class="mask rgba-stylish-light">
            <div class="container h-100 d-flex justify-content-center align-items-center" >
                <div class="row pt-5 mt-3">
                    <div class="col-md-12 mb-3">
                        <div class="intro-danger-content text-center text-white" style="padding-top:150px">
                            
                             
                            <h1 class="display-3 white-text mb-5 wow fadeInDown" data-wow-delay="0.3s " style="background: rgba(0, 0, 0, 0.3); padding:10px">We will STYLE, you will SMILE </h1>
                            
                           
                            <?php 
                             if(!isset($_SESSION['email'])) { ?>
                            
                            <h5 class="text-uppercase white-text mb-3 mt-1 font-weight-bold wow fadeInDown " data-wow-delay="0.3s">Checkout our </h5>
                            <a href="salons.php" class="btn btn-danger btn-lg wow fadeInDown" style="width:120px">SALONS</a>
                            
                            
                            <?php } ?>
                            
                            <?php if($check_email = $emp_email['email']){ ?>
                            
                            <a href="emp_main_page.php" class="btn btn-danger btn-lg wow fadeInDown" style="width:auto">UPDATE TIMESLOTS</a>
                            
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
   


