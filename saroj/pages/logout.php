<?php ob_start(); ?>
<?php session_start(); ?>

<?php 
require '../vendor/autoload.php';

$options = array(
    'cluster' => 'ap2',
    'useTLS' => true
  );

$pusher = new Pusher\Pusher('9322f3977fc35073e2a0','1395334adea7cbfdd563','775023', $options);

$username = $_SESSION['username'];

$_SESSION['username'] = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;
$_SESSION['user_role'] = null;

$data['message'] = $username;
$pusher->trigger('notification', 'logout_user', $data);

header("Location: ../index.php");

 ?>

