<?php ob_start(); ?>
<?php include "../include/db.php"; ?>
<?php include "../include/functions.php" ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Blood Bank | Registration</title>
    <link rel="icon" href="../img/icon/drop.ico">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!--Bootstrap CSS stylesheet  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- Bootstrap offline Css -->
    <link rel="stylesheet" type="text/css" href="../css/boot/bootstrap.css">
    <!-- Css from folders -->
    
    <!-- <link rel="stylesheet" type="text/css" href="../css/regs.css"> -->
    
    <!-- Jquery offline -->
    <script type="text/javascript" src="../jquery/jquery.js"></script>
    <!-- Bootstrap Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>
  <body class="bg-info">
    
    <?php
    require '../vendor/autoload.php';
    $options = array(
    'cluster' => 'ap2',
    'useTLS' => true
    );
    $pusher = new Pusher\Pusher('9322f3977fc35073e2a0','1395334adea7cbfdd563','775023', $options);
    if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    if(username_exist($username)) {
    $message = '<div class="alert alert-warning alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Username! </strong>' . $username . ' Already Exist Please Try Different Username.
    </div>';
    }
    else if(email_exist($email)){
    $message = '<div class="alert alert-warning alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Email! </strong>' . $email . ' Already Exist Please Try Different Email.
    </div>';
    }
    else if(!empty($username) && !empty($password) && !empty($email)) {
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    $email = mysqli_real_escape_string($connection, $email);
    
    $query = "INSERT INTO user(user_name,user_password,user_email,user_role)";
    $query .= "VALUES('{$username}','{$password}','{$email}','User')";
    $register_user_insert_query = mysqli_query($connection,$query);
    if(!$register_user_insert_query) {
    die("Query Failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
    }
    $message = '<div class="alert alert-success alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Registration!</strong> has been Submitted Successfully Click here for <a href="login.php" class="alert-link">Login</a>.
    </div>';
    $data['message'] = $username;
    $pusher->trigger('notification', 'new_user', $data);
    }  else {
    $message = '<div class="alert alert-danger alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>feilds!</strong> cannot empty.
    </div>';
    }
    } else {
    $message = "";
    }
    ?>
    
    <section id="title">
      
      <div class="container-fluid">
        <!-- Nav Bar -->
        <nav class="navbar navbar-expand-lg navbar-dark">
          <!-- <a class="navbar-brand" href="">Blood Bank</a> -->
          <a class="navbar-brand" href="../index.php">
            <img src="../img/logo/logo.png" width="110" height="90" alt="logo">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="../index.php">Welcome</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="register.php">Register</a>
              </li>
            </ul>
          </div>
        </nav>
        <?php echo $message; ?>
        <div class="row">
          <div class="col-sm-4 col-md-4">
            
          </div>
          
          <div class="col-sm-4 col-md-4">
            <div class="card border-primary" style="width: 26rem;">
              <div class="card-body  ">
                <div class="text-center">
                  <i class="fas fa-key fa-2x"></i>
                </div>
                <h4 class="card-title text-center">Registration</h4>
                <form class="form-group" role="form" autocomplete="off" name="register" action="register.php" method="post" onsubmit="return validation()">
                  
                  <label>Username</label>
                  <span id="user" class="text-danger"></span>
                  <input class="form-control card border-primary mb-3" type="text" name="username" placeholder="Enter Username" id="username">
                  
                  <label>Password</label>
                  <span id="pass" class="text-danger"></span>
                  <input class="form-control card border-primary mb-3" type="Password" name="password" placeholder="Enter Password" id="password">
                  
                  <label>Confirm Password</label>
                  <span id="conpass" class="text-danger"></span>
                  <input class="form-control card border-primary mb-3" type="Password" name="confirm_password" placeholder="Enter Password Again" id="confirmPassword">
                  
                  <label>Email</label>
                  <span id="emails" class="text-danger"></span>
                  <input class="form-control card border-primary mb-3" type="email" name="email" placeholder="Enter Valid Email" id="emailid">
                  <!-- <button type="submit" class="btn btn-primary mb-2">Confirm identity</button> -->
                  <div class="text-center">
                    <input  class="btn btn-primary  form-control" type="submit" name="submit" value="Register">
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            
          </div>
        </div>
        
      </div>
    </section>
    <script src="../js/regvalidation.js"></script>
  </body>
</html>