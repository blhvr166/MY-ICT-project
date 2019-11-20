<?php 
include("config.php");
session_start(); 
$check_mail = $_SESSION["email"];
                $query5 = $connection->query("SELECT email FROM user WHERE email = '$check_mail'");
				$query6 = $connection->query("SELECT email FROM salon WHERE email = '$check_mail'");
				$query7 = $connection->query("SELECT email FROM employee WHERE email = '$check_mail'");

				$user_emai = $query5->fetch_assoc();
				$boss_email = $query6->fetch_assoc();
				$emp_email = $query7->fetch_assoc();
	?>


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">





<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

<style>
    
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  cursor: pointer;
  padding: 15px;
  font-size: 15px;
 
}
</style>




	<section>
      <footer class="page-footer ">

       
        <div class="container text-center text-md-right">

         
          <div class="row">

          
            


           
            <!-- Grid column -->
            <div class="col-md-5 mx-auto">
    
                
            <ul class="list-unstyled list-inline text-center py-2 mt-3">
                
                 <?php 
     if(!isset($_SESSION['email'])) { ?>
                
                
          <li class="list-inline-item">
            <h6 class="mb-1">JOIN US FOR FREE</h6>
          </li>
          <li class="list-inline-item">
            <a href="login.php" class="btn btn-danger btn-rounded btn-sm">Sign up!</a>
          </li>
                <hr>
                
                <?php }  ?>
            <?php 
     if(isset($_SESSION['email'])) { ?>    
                
            <li class="list-inline-item">
            <h6 class="mb-1">WELCOME TO THE BAND OF</h6>
          </li>
          <li class="list-inline-item">
            <a href="salons.php" class="btn btn-danger btn-rounded btn-sm">SALONS</a>
          </li>
                <hr>    
     
              <?php } ?>  
     
     
        </ul>
                

                
                <div class="row">
            <div class="col-xs-6 mx-auto"><div class="footer text-center">© 2019 Copyright -
          <a href="index.php " class="text-decoration-none text-light">Band Of <text class="text-danger">Barbers</text></a>
        </div></div>
                 <div class="col-xs-6 mx-auto">
                <ul class="list-unstyled list-inline text-center">
          <li class="list-inline-item">
            <a class="p-2 m-2 fa-lg fb-ic"><i class="fab fa-facebook-f"> </i></a>                
                            
          </li>
          <li class="list-inline-item">
            <a class="fa-lg ins-ic  btn-lg"><i class="fab fa-instagram"> </i></a>
          </li>
          
        </ul>
                </div> 
               
                    </div>

            </div>
               <hr class="clearfix w-100 d-md-none">

            <div class="col-md-5 ml-auto">
                
                <ul class="contact-icons text-center list-unstyled " style="margin-top:20px">
                    <ul class="list-inline">
                            <li class="list-inline-item"><i class="fas fa-map-marker "></i> </li>
                            <li class="list-inline-item"><p style="font-size:15px">Brisbane, QLD - 4000, Australia</p></li>
                    </ul>
                    
                    <ul class="list-inline">
                            <li class="list-inline-item"><i class="fas fa-phone "></i></li>
                            <li class="list-inline-item"><p style="font-size:15px">+61 - 999 999 990</p></li>
                    </ul>
                    <ul class="list-inline">
                            <li class="list-inline-item"><i class="fas fa-envelope "></i></li>
                            <li class="list-inline-item"><a href="https://accounts.google.com/signin/v2/identifier?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="text-decoration-none text-light" style="font-size:15px">bandofbarbers@ictatjcub.com</a></li>
                    </ul>     
                        </ul>
                </div>
                <div class="col-md-2 mx-auto">

              <!-- Content -->
              <a href="index.php"> <img src="images/logo5.png" alt="logo" class="img-fluid " style="width:150px; height:150px"></a>
              
              <button class="btn btn-danger btn-sm" onclick="topFunction()" id="myBtn" title="Go to top">TOP </button>

            </div>

          </div>
        

        </div>


      </footer>
    </section>
	
