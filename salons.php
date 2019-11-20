<?php
include("config.php");
session_start();


//$connection = new mysqli("localhost", "root", "root", "ictatjcu_bandofbarbers");
	$sql = "SELECT * FROM salon";
	$result = $connection -> query($sql);
		$row = $result -> fetch_assoc();


?>
<!doctype html>
<html><head>

<title>Salon</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
   <?php include("nav.php");?>
  <body style="background-image: url(images/salon-bg1.jpg); ">


    <div class="container text-center">


  <h1 class="text-dark" style="color:black;margin-top:40px">Salons</h1><hr class="bg-danger"><hr class="bg-danger">

  <div class="row">

   <?php do { ?>
      <div class=" col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12" style="margin-top:30px">

          <a href="salonDesc.php?id= <?php echo $row['salon_id']; ?>" class="text-decoration-none">
          <div class="card shadow-lg w-100  h-100" >

        <img class="card-img-top img-thumbnail" style="height: 250px" src="<?php echo $row['image'];?>" alt="<?php echo $row['sname']; ?>" >
        <div class="card-body">
            <h2 class="card-title mx-auto text-dark" style=" text-align:center; margin-top:10px "><b><i><?php echo $row['sname']; ?> </i></b></h2>


        </div>
          </div>
          </a>

      </div>

    <?php } while($row = $result -> fetch_assoc()) ?>

    </div>
       </div>
<br>
<div class="container text-dark">

    <br>What is Lorem Ipsum?<br><br>
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br><br>

    Where does it come from? <br><br>
    Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.<br><br>

    The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<br>
<br>
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
