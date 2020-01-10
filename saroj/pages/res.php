<?php ob_start(); ?>
<?php include "../include/db.php"; ?>
<?php include "../include/functions.php"; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Blood Bank | Reset</title>
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
    
    <!-- <link rel="stylesheet" type="text/css" href="../css/login.css"> -->
    
    <!-- Jquery offline -->
    <script type="text/javascript" src="../jquery/jquery.js"></script>
    <!-- Bootstrap Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>
  <body class="bg-secondary">
    
    
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
                <a class="nav-link active" href="login.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
              </li>
            </ul>
          </div>
        </nav>
        <!-- Login Box Section -->
        <?php
        if(!isset($_GET['email']) && !isset($_GET['token'])) {
        redirect('../index.php');
        }
        // $email = 'ksaroz1992@gmail.com';
        // $token = 'b0709f3d426b12b993e2c887bc036a3b4647475e8d0b970cb66cfa0ced5c2bc4711e3e3ad3574eb271a0649a6547b672003c';
        if($stmt = mysqli_prepare($connection, 'SELECT user_name, user_email, user_token FROM user WHERE user_token=?'))
        {
        mysqli_stmt_bind_param($stmt, "s", $_GET['token']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $user_name, $user_email, $token);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
        
        
        // if($_GET['token'] !== $token || $_GET['email'] !== $email) {
        //   redirect('login.php');
        // }
        if(isset($_POST['password']) && isset($_POST['conpassword'])){
        if($_POST['password'] === $_POST['conpassword']) {
        $password = $_POST['password'];
        if($stmt = mysqli_prepare($connection, "UPDATE user SET user_token='', user_password='{$password}' WHERE user_email = ?")) {
        mysqli_stmt_bind_param($stmt, "s", $_GET['email']);
        mysqli_stmt_execute($stmt);
        if(mysqli_stmt_affected_rows($stmt) >= 1){
        
        redirect('login.php');
        }
        mysqli_stmt_close($stmt);
        }
        } else {
        echo "password are not matched";
        }
        }
        }
        ?>
        <div class="row">
          
          <div class="col-md-4">
            
          </div>
          <div class="col-md-4">
            <div class="card border-primary mb-3" style="width: 26rem;">
              <div class="card-body  ">
                
                <!-- <img src="../img/logo/login.png" class="login"> -->
                <div class="text-center">
                  <i class="fas fa-lock fa-3x"></i>
                </div>
                <h3 class="text-center mb-4">Reset Password?</h3>
                <p class="text-center text-muted">You can reset your password here.</p>
                <form id="register-form" role="form" autocomplete="off" class="form" method="post">
                  <div class="form-group">
                    <label>New Password:</label>
                    <input class="form-control card border-primary mb-3" type="password" name="password" placeholder="Enter New Password">
                  </div>
                  <div class="form-group">
                    <label>Confirm Password:</label>
                    <input class="form-control card border-primary mb-3" type="password" name="conpassword" placeholder="Enter Password Again">
                  </div>
                  <div class="form-group">
                    <input name="resetPassword" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                  </div>
                  <input type="hidden" name="token" class="hide" id="token" value="">
                  <!-- <a href="#">Lost your password?</a><br>
                  <a href="register.php">Don't have an account?</a> -->
                </form>
              </div>
            </div>
            <div class="col-md-4">
              
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>