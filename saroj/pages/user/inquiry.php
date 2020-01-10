
 <?php include "user_header.php"; ?>    
     <!-- User Navigation -->

<?php include "user-navigation2.php"; ?>


<?php 


// $query = "SELECT * FROM user ";
// $select_users = mysqli_query($connection,$query);

// while ($row = mysqli_fetch_assoc($select_users)) {
// $user_id = $row['user_id'];
// $user_name = $row['user_name'];
// $user_password = $row['user_password'];
// $user_first_name = $row['user_first_name'];
// $user_last_name = $row['user_last_name'];
// $user_email = $row['user_email'];
// $user_phone = $row['user_phone'];
// $user_image = $row['user_image'];
// $user_role = $row['user_role'];
//}



if(isset($_POST['inquiry'])) {

  $inq_first_name = $_POST['inq_first_name'];
  $inq_last_name = $_POST['inq_last_name'];
  $inq_email = $_POST['inq_email'];
  $inq_phone = $_POST['inq_phone'];
  $inq_description = $_POST['inq_description'];
  



$query = "INSERT INTO inquiry(inq_first_name,inq_last_name,inq_email,inq_phone,inq_description)";

$query .= "VALUES('{$inq_first_name}','{$inq_last_name}','{$inq_email}',{$inq_phone},'{$inq_description}')";

$send_inquiry = mysqli_query($connection, $query);

confirmQuery($send_inquiry);

}




?>



<!-- Page Content -->
<section class="container">
<form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="firstname">First Name</label>
      <input type="text" name="inq_first_name" class="form-control" id="firstname" placeholder="Enter First Name" value="">
    </div>
    <div class="form-group col-md-4">
      <label for="lastname">Last Name</label>
      <input type="text" name="inq_last_name" class="form-control" id="lastname" placeholder="Enter Last Name" value="">
    </div>
    <div class="form-group col-md-4">
      
    </div>
  </div>
    <div class="row">
   
    <div class="form-group col-md-4">
      <label for="inputEmail4">Email</label>
      <input type="email" name="inq_email" class="form-control" id="inputEmail4" placeholder="Email" value="">
    </div>
    <div class="form-group col-md-4">
      <label for="phonenumber">Contact Number</label>
      <input type="number" name="inq_phone" class="form-control" id="phonenumber" placeholder="Enter Phone Number" value="">
    </div>
  </div>
  
  <div class="form-group">
    <label for="Textarea">Description</label>
    <textarea name="inq_description" class="form-control" name="textarea" id="Textarea" rows="6"></textarea>
  </div>
    
  <button type="submit" name="inquiry" class="btn btn-primary form-control">SEND</button>
</form>

</section>                

      
        

       

        <!-- Footer -->
        
        <?php include "../../include/footer.php"; ?>

    
    <!-- /.container -->

    <!-- jQuery -->
    

    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>

      

</body>

</html>