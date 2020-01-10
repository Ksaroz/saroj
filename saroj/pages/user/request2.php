<?php ob_start(); ?>
<?php include "../../include/db.php" ?>
<?php include "../../include/functions.php" ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Blood Bank | Request</title>
  <link rel="icon" href="../../img/icon/drop.ico">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
<!-- FontAwesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<!--CSS stylesheet  -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
  <!-- Bootstrap Offline Css -->
  <link rel="stylesheet" type="text/css" href="../../css/boot/bootstrap.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="../../css/user.css"> -->
 <!--  <link rel="stylesheet" type="text/css" href="../../css/mdb.css"> -->

<!-- css from folders -->

 <link rel="stylesheet" type="text/css" href="../../css/request.css"> 
  
<!-- jquery offline scripts -->
  <script type="text/javascript" src="../../jquery/jquery.js"></script>
 <!-- Bootstrap Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="../../js/reqvalidation.js"></script>

 </head>

<body>

<section class="wrap">   

<?php include "user-navigation.php"; ?>


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

if(isset($_SESSION['user_id'])){


  $the_user_id = $_SESSION['user_id'];

  $query = "SELECT * FROM user WHERE user_id = $the_user_id";
$select_users_query = mysqli_query($connection,$query);

while ($row = mysqli_fetch_assoc($select_users_query)) {
$user_id = $row['user_id'];
$user_first_name = $row['user_first_name'];
$user_last_name = $row['user_last_name'];
$user_blood_group = $row['user_blood_group'];
$user_email = $row['user_email'];
$user_address = $row['user_address'];
$user_phone = $row['user_phone'];
}

if(isset($_POST['request'])) {
  
  $req_first_name = $_POST['req_first_name'];
  $req_last_name = $_POST['req_last_name'];
  $req_blood_group = $_POST['req_blood_group'];
  $req_email = $_POST['req_email'];
  $req_phone = $_POST['req_phone'];
  $req_address = $_POST['req_address'];
  $req_description = $_POST['req_description'];




$query = "INSERT INTO request(req_user_id,req_first_name,req_last_name,req_blood_group,req_email,req_phone,req_address,req_description)";

$query .= "VALUES({$user_id},'{$req_first_name}','{$req_last_name}','{$req_blood_group}','{$req_email}',{$req_phone},'{$req_address}','{$req_description}')";

$create_request = mysqli_query($connection, $query);

confirmQuery($create_request);

$message = '<div class="alert alert-success alert-dismissible fade show">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Thank You!</strong> for your <strong>Request</strong> for blood. you will get a notify on your email soon.
</div>';

echo $message;



}
}

?>






<form action="request2.php" method="post" role="form" autocomplete="off" onsubmit="return reqValidation()">
<div class="container contact">
    <div class="row">
        <div class="col-md-3">
            <div class="contact-info">
                <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
                <h2>REQUEST !!!</h2>
                <h4>If you’re a blood donor, you’re a hero to someone, somewhere, who received your gracious gift of life.</h4>
            </div>
        </div>
        <div class="col-md-9">
            <div class="contact-form">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="firstname">First Name:</label>
                  <span id="fname" class="text-danger"></span>
                  <div class="col-sm-10">          
                    <input type="text" class="form-control" id="firstname" placeholder="Enter First Name" name="req_first_name" value="<?php echo $user_first_name ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="lastname">Last Name:</label>
                  <span id="lname" class="text-danger"></span>
                  <div class="col-sm-10">          
                    <input type="text" class="form-control" id="lastname" placeholder="Enter Last Name" value="<?php echo $user_last_name ?>" name="req_last_name">
                  </div>
                </div>
                <div class="form-group">
                    
      <label class="control-label col-sm-8" for="bloodgroups">Blood Group</label>
      <span id="bloodgroup" class="text-danger"></span>
      <div class="col-sm-4">
      <select id="bloodgroups" name="req_blood_group" class="form-control">
        <option selected><?php echo $user_blood_group ?></option>
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
</div>
          
                <div class="form-group">
                  <label class="control-label col-sm-2" for="emails">Email:</label>
                  <span id="email" class="text-danger"></span>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="emails" placeholder="Enter email" value="<?php echo $user_email ?>" name="req_email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="numbers">Phone:</label>
                  <span id="number" class="text-danger"></span>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="numbers" placeholder="Enter Your Phone Number" value="<?php echo $user_phone ?>" name="req_phone">
                  </div>
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2" for="address1">Address</label>
                <span id="address" class="text-danger"></span>
                <div class="col-sm-10">
                <input type="text" name="req_address" class="form-control" id="address1" value="<?php echo $user_address ?>" placeholder="Apartment, studio, or floor">
              </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="message">Message:</label>
                  <span id="messages" class="text-danger"></span>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="req_description" rows="5" id="message"></textarea>
                  </div>
                </div>
                
                  <div class="form-group">        
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="request" class="btn btn-default">REQUEST</button>
                  </div>
                </div>
            </div>
        </div>
    
</div>
</form>
</section>





        
       <!-- Footer -->

  <?php include "../../include/footer.php"; ?>

   <!-- Footer -->




        
</body>

</html>



