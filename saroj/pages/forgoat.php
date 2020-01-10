<?php ini_set('max_execution_time', 300); ?>
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
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
        require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
        require '../vendor/phpmailer/phpmailer/src/SMTP.php';
        require '../vendor/phpmailer/phpmailer/src/Exception.php';
        // require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
        require '../classes/Config.php';
        
        
        if(!ifItIsMethod('get') && !isset($_GET['forgot'])) {
        redirect('../index.php');
        }
        if(ifItIsMethod('post')) {
        if(isset($_POST['email']))
        $email = $_POST['email'];
        $length = 50;
        $token = bin2hex(openssl_random_pseudo_bytes($length));
        
        if(email_exist($email)) {
        
        if($stmt = mysqli_prepare($connection, "UPDATE user SET user_token='{$token}' WHERE user_email= ?")) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        /** Configure php mailer **/
        $mail = new PHPMailer(true);
        $mail->isSMTP();// Set mailer to use SMTP
        $mail->CharSet = "utf-8";// set charset to utf8
        $mail->SMTPAuth = true;// Enable SMTP authentication
        $mail->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted
        $mail->Host = Config::SMTP_HOST;// Specify main and backup SMTP servers
        $mail->Port = Config::SMTP_PORT;// TCP port to connect to
        $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
        $mail->isHTML(true);// Set email format to HTML
        $mail->Username = Config::SMTP_USER;;// SMTP username
        $mail->Password = Config::SMTP_PASSWORD;;// SMTP password
        $mail->setFrom('ksaroz1992@gmail.com', 'Saroj Kumar');//Your application NAME and EMAIL
        $mail->Subject = 'Test';//Message subject
        $mail->MsgHTML('<p>Please Click link to reset your password
          <a href="http://localhost/saroj/pages/res.php?email=' . $email. '&token=' . $token . ' ">http://localhost/saroj/pages/res.php?email=' . $email. '&token=' . $token . '</a>
        </p>
        ');// Message body
        $mail->addAddress($email);// Target email
        if($mail->send()) {
          $message = '<div class="alert alert-success alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Congratulation!</strong> your Email has been sent Successfully...Please Check your Email for Reset Password.
    </div>';

    echo $message;
        
        } else {
          $message = '<div class="alert alert-success alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Sorry!</strong> Please Insert a Valid Email Address.
    </div>';
        echo $message;
        }
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
                <h3 class="text-center mb-4">Forgot Password?</h3>
                <p class="text-center text-muted">You can reset your password here.</p>
                <form id="register-form" role="form" autocomplete="off" class="form" method="post">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
                      </div>
                      <input id="email" name="email" placeholder="Email Address" class="form-control"  type="email">
                    </div>
                  </div>
                  <div class="form-group">
                    <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                  </div>
                  
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