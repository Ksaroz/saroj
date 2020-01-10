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
  <title>Blood Bank | Donar</title>
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

 <link rel="stylesheet" type="text/css" href="../../css/donar.css"> 
  
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



if(isset($_POST['donate'])) {

  $donar_first_name = $_POST['donar_first_name'];
  $donar_last_name = $_POST['donar_last_name'];
  $donar_blood_group = $_POST['donar_blood_group'];
  $donar_email = $_POST['donar_email'];
  $donar_phone = $_POST['donar_phone'];
  $donar_address = $_POST['donar_address'];
  $donar_description = $_POST['donar_description'];
  

if(!isset($_POST['donar_agreement'])){

   $message = '<div class="alert alert-danger alert-dismissible fade show">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Sorry!</strong> It seems you have not read the requirements below which indicates that you are not ready to donate blood.
</div>';

 echo $message;

   
  
}else {

    $donar_agreement = $_POST['donar_agreement'];
  

$query = "INSERT INTO donar(donar_user_id,donar_first_name,donar_last_name,donar_blood_group,donar_email,donar_phone,donar_address,donar_description,donar_agreement)";

$query .= "VALUES({$user_id},'{$donar_first_name}','{$donar_last_name}','{$donar_blood_group}','{$donar_email}',{$donar_phone},'{$donar_address}','{$donar_description}','{$donar_agreement}')";

$create_donar = mysqli_query($connection, $query);

confirmQuery($create_donar);





$message = '<div class="alert alert-success alert-dismissible fade show">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Thank You!</strong> for being ready to donate blood. You will get a notify on your email soon.
</div>';

echo $message;

}
}
}

?>







<form action="donar.php" method="post" role="form" autocomplete="off" onsubmit="return reqValidation()">
<div class="container contact">
    <div class="row">
        <div class="col-md-3">
            <div class="contact-info">
                <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
                <h2>Donation !!!</h2>
                <h4>We celebrate World Blood Donor Day on 14 June every year. It was established across the countries in 2004, to spread the awareness for need to donate blood and thank the blood donors for their selfless work. Be a hero, A real hero in someone’s life. There are various myths surrounding the blood donation activities. Actual awareness and right information can really benefit both the donor and recipient. Come forward and join the hands in this initiative.</h4>
            </div>
        </div>
        <div class="col-md-9">
            <div class="contact-form">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="firstname">First Name:</label>
                  <span id="fname" class="text-danger"></span>
                  <div class="col-sm-10">          
                    <input type="text" class="form-control" id="firstname" name="donar_first_name" value="<?php echo $user_first_name ?>" placeholder="Enter First Name">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="lastname">Last Name:</label>
                  <span id="lname" class="text-danger"></span>
                  <div class="col-sm-10">          
                    <input type="text" class="form-control" name="donar_last_name" id="lastname" value="<?php echo $user_last_name ?>" placeholder="Enter Last Name">
                  </div>
                </div>
                <div class="form-group">
                    
      <label class="control-label col-sm-8" for="bloodgroups">Blood Group:</label>
      <span id="bloodgroup" class="text-danger"></span>
      <div class="col-sm-4">
      <select id="bloodgroups" name="donar_blood_group" class="form-control">
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
                    <input type="email" class="form-control" name="donar_email" id="emails" value="<?php echo $user_email ?>" placeholder="Enter email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="numbers">Phone:</label>
                  <span id="number" class="text-danger"></span>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="numbers" placeholder="Enter Phone Number" value="<?php echo $user_phone ?>" name="donar_phone">
                  </div>
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2" for="address1">Address:</label>
                <span id="address" class="text-danger"></span>
                <div class="col-sm-10">
                <input type="text" name="donar_address" class="form-control" id="address1" value="<?php echo $user_address ?>" placeholder="Apartment, studio, or floor">
              </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="message">Message:</label>
                  <span id="messages" class="text-danger"></span>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="donar_description" rows="5" id="message"></textarea>
                  </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                <p>I want to donate blood voluntarily and will not be entitled to claim any exchange for my donation. I guarantee that all the provided information is true. I understand the requirements to donate blood, which are for my protection as well as to protect the receipient of my blood.</p>
                <p>Red Cross Requirements for males that want to donate blood:</p>   
                <ul>
                  <li>Be healthy and feeling well</li>
                  <li>Be at least 17 years old in most states</li>
                  <li>Be at least 5'1"</li>
                  <li>Weigh at least 130 lbs.</li>
                </ul>    
                <p>Red Cross Requirements for females that want to donate blood:</p>    
                <ul>
                  <li>Be healthy and feeling well</li>
                  <li>Be at least 17 years old in most states</li>
                  <li>Be at least 5'5"</li>
                  <li>Weigh at least 150 lbs.</li>
                </ul>
              </div>
          </div>
          </div>
  <div class="custom-control custom-checkbox form-group">
  <input type="checkbox" name="donar_agreement" id="agreement" class="custom-control-input" value="Yes">
  <label class="custom-control-label" for="agreement">I have read the requirements. I am eligible to donate blood</label>
  
</div>
                <div class="form-group">        
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="donate" class="btn btn-default">Submit</button>
                  </div>
                </div>
            </div>
        </div>
    
</div>
</div>
</form>
</section>


        
       <!-- Footer -->

  <?php include "../../include/footer.php" ?>

   <!-- Footer -->
       
</body>

</html>



