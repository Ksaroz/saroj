
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



if(isset($_POST['request'])) {

  $req_first_name = $_POST['req_first_name'];
  $req_last_name = $_POST['req_last_name'];
  $req_blood_group = $_POST['req_blood_group'];
  $req_email = $_POST['req_email'];
  $req_phone = $_POST['req_phone'];
  $req_address1 = $_POST['req_address1'];
  $req_address2 = $_POST['req_address2'];
  $req_city = $_POST['req_city'];
  $req_state = $_POST['req_state'];
  $req_zip_code = $_POST['req_zip_code'];
  $req_description = $_POST['req_description'];
  



$query = "INSERT INTO request(req_first_name,req_last_name,req_blood_group,req_email,req_phone,req_address1,req_address2,req_city,req_state,req_zip_code,req_description)";

$query .= "VALUES('{$req_first_name}','{$req_last_name}','{$req_blood_group}','{$req_email}',{$req_phone},'{$req_address1}','{$req_address2}','{$req_city}','{$req_state}','{$req_zip_code}','{$req_description}')";

$create_request = mysqli_query($connection, $query);

confirmQuery($create_request);

}




?>



<!-- Page Content -->
<section class="container">
<form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="firstname">First Name</label>
      <input type="text" name="req_first_name" class="form-control" id="firstname" placeholder="Enter First Name" value="">
    </div>
    <div class="form-group col-md-4">
      <label for="lastname">Last Name</label>
      <input type="text" name="req_last_name" class="form-control" id="lastname" placeholder="Enter Last Name" value="">
    </div>
    <div class="form-group col-md-4">
      
    </div>
  </div>
    <div class="row">
    <div class="form-group col-md-4">
      <label for="bloodgroup">Blood Group</label>
      <select id="bloodgroup" name="req_blood_group" class="form-control">
        <option selected>Select...</option>
        <option>A(+)</option>
        <option>A(-)</option>
        <option>B(+)</option>
        <option>B(-)</option>
        <option>O(+)</option>
        <option>O(-)</option>
        <option>AB(+)</option>
        <option>AB(-)</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Email</label>
      <input type="email" name="req_email" class="form-control" id="inputEmail4" placeholder="Email" value="">
    </div>
    <div class="form-group col-md-4">
      <label for="phonenumber">Contact Number</label>
      <input type="number" name="req_phone" class="form-control" id="phonenumber" placeholder="Enter Phone Number" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress1">Address 1</label>
    <input type="text" name="req_address1" class="form-control" id="inputAddress1" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" name="req_address2" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" name="req_city" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <input type="text" name="req_state" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" name="req_zip_code" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <label for="Textarea">Description</label>
    <textarea name="req_description" class="form-control" name="textarea" id="Textarea" rows="6"></textarea>
  </div>
    
  <button type="submit" name="request" class="btn btn-primary form-control">REQUEST</button>
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