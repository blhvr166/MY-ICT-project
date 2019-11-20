
 <?php  
session_start();
include("config.php");
$id = $_GET['id'];
 //$connection = new mysqli("localhost", "root", "root", "ictatjcu_bandofbarbers"); 
 $query = "SELECT * FROM employee WHERE emp_id=".$id;  
 $result = mysqli_query($connection, $query);  
 ?>  
<!DOCTYPE html>
<html>
<head>
	<title>Time Slot</title>
	


</head>
<body>

<?php include('nav.php') ?>
            
         
      
    
      <body>  
           <br /><br />  
           <div class="container" style="width:700px;">  
                <h3 align="center"></h3>  
                <br />  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="70%">Employee Name</th>  
                               <th width="30%">View Time Slot</th>  
                          </tr>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["fname"]; ?></td>  
                          
                               <td><input type="button" name="view" value="view" id="<?php echo $row["emp_id"]; ?>" class="btn btn-danger btn-xs view_data" /></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 
 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                  
                     <h4 class="modal-title">Time Slot Availability</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer"> 
                     <button type="button" class="close"  class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div> 
 <script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var id = $(this).attr("id");  
           $.ajax({  
                url:"aj.php",  
                method:"post",  
                data:{id:id},  
                success:function(data){  
				  $('#employee_detail').html(data);  
                     $('#dataModal').modal("show");  
                       
                }  
           });  
      });  
 });  
 </script>
 <br> <br> <br>
 
</body>
    
    <!-- Footer -->
<div class="footer">
<div class=" text-light bg-dark" style="margin-bottom:0;  padding-bottom:10px; padding-top:20px;">
  
<?php include("footer.php") ?>
  
     </div></div>
  <!-- Footer -->
</html>  
