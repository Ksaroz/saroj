<?php ob_start(); ?>
<?php include "../include/db.php"; ?>
<?php include "../include/functions.php"; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Blood Bank | Login</title>
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
        require '../vendor/autoload.php';
        $options = array(
        'cluster' => 'ap2',
        'useTLS' => true
        );
        $pusher = new Pusher\Pusher('9322f3977fc35073e2a0','1395334adea7cbfdd563','775023', $options);
        if(isset($_POST['login'])) {
        $user_name = $_POST['username'];
        $user_password = $_POST['password'];
        $user_name = mysqli_real_escape_string($connection, $user_name);
        $user_password = mysqli_real_escape_string($connection, $user_password);
        $query = "SELECT * FROM user WHERE user_name = '{$user_name}'";
        $select_user_query = mysqli_query($connection,$query);
        confirmQuery($select_user_query);
        while ($row = mysqli_fetch_array($select_user_query)) {
          
          $db_user_id = $row['user_id'];
          $db_user_name = $row['user_name'];
          $db_user_password = $row['user_password'];
          $db_user_first_name = $row['user_first_name'];
          $db_user_last_name = $row['user_last_name'];
        $db_user_role = $row['user_role'];
        }
        // $password = crypt($user_password, $db_user_password);
        if($user_name === $db_user_name && $user_password === $db_user_password) {
        $_SESSION['user_id'] = $db_user_id;
        $_SESSION['username'] = $db_user_name;
        $_SESSION['firstname'] = $db_user_first_name;
        $_SESSION['lastname'] = $db_user_last_name;
        $_SESSION['user_role'] = $db_user_role;
        $data['message'] = $user_name;
        $pusher->trigger('notification', 'login_user', $data);
        if($_SESSION['user_role'] == 'Admin')
        {
        redirect('../admin');
        }else if($_SESSION['user_role'] == 'Bank')
        {
        redirect('../bank');
        }else if($_SESSION['user_role'] == 'User') {
        redirect('user/user.php');
        } else  {
        redirect('login.php');
        }
        
        }else if($user_name !== $db_user_name && $user_password !== $db_user_password) {
        echo '<div class="alert alert-warning alert-dismissible fade show">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Username! </strong> & <strong>Password </strong>Not Matched Please Try Again.
        </div>';
        
        }else {
        redirect('login.php');
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
                  <i class="fas fa-user-circle fa-3x"></i>
                </div>
                <h3 class="text-center mb-4">Login Here</h3>
                <form class="form-group" role="form" autocomplete="off" action="" method="post">
                  <label>Username:</label>
                  <input class="form-control card border-primary mb-3" type="text" name="username" placeholder="Enter Username">
                  <label>Password:</label>
                  <input class="form-control card border-primary mb-4" type="password" name="password" placeholder="Enter Password">
                  <input class="form-control btn btn-primary mb-3" type="submit" name="login" value="Login">
                  <a href="forgoat.php?forgot=<?php echo uniqid(true); ?>">Lost your password?</a><br>
                  <a href="register.php">Don't have an account?</a>
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