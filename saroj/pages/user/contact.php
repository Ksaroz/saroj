<?php ob_start(); ?>
<?php include "../../include/db.php" ?>
<?php include "../../admin/functions.php" ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Blood Bank | Contact</title>
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

 <link rel="stylesheet" type="text/css" href="../../css/contact.css"> 
  
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



 </head>

<body>

<section class="wrap">   

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




<form action="" method="post">
<div class="container contact">
    <div class="row">
        <div class="col-md-3">
            <div class="contact-info">
                <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
                <h2>Contact Us</h2>
                <h4>We would love to hear from you !</h4>
            </div>
        </div>
        <div class="col-md-9">
            <div class="contact-form">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="fname">First Name:</label>
                  <div class="col-sm-10">          
                    <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="inq_first_name">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="lname">Last Name:</label>
                  <div class="col-sm-10">          
                    <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="inq_last_name">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Email:</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="inq_email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Phone No:</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="phone" placeholder="Enter Your Phone Number" name="inq_phone">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="comment">Comment:</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="inq_description" rows="5" id="comment"></textarea>
                  </div>
                </div>
                <div class="form-group">        
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="inquiry" class="btn btn-default">SEND</button>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
</section>


<!-- Footer -->

  <footer id="footer">
      <i class="social-icon fab fa-facebook-f"></i>
      <i class="social-icon fab fa-twitter"></i>
      <i class="social-icon fab fa-instagram"></i>
      <i class="social-icon fas fa-envelope"></i>
    <p>© Copyright 2019 Blood Bank</p>

  </footer>

   <!-- Footer -->
          
</body>

</html>



