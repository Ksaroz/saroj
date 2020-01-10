<?php ob_start(); ?>
<?php
/********************************/
/*Query Confirmation*/
function confirmQuery($result) {
global $connection;
if(!$result) {
die("Query Failed" . mysqli_error($connection));
}
}
/*****************************************/
/*Functions ADmin*/
function logAdmin($username = '') {
global $connection;
$query = "SELECT user_role FROM user WHERE user_name = '$username'";
$result = mysqli_query($connection, $query);
confirmQuery($result);
$row = mysqli_fetch_array($result);
if($row['user_role'] == 'Admin') {
header("Location: ../admin");
}else {
header("Location: login.php");
}
}
function logUser($username = '') {
global $connection;
$query = "SELECT user_role FROM user WHERE user_name = '$username'";
$result = mysqli_query($connection, $query);
confirmQuery($result);
$row = mysqli_fetch_array($result);
if($row['user_role'] == 'User') {
header("Location: user/user.php");
}else {
header("Location: login.php");
}
}
/**********************************************/
/* Registeration function */
function insertReg() {
global $connection;
if(isset($_POST['submit'])) {
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
if(username_exist($username)) {
$message = '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Indicates a successful or positive action.
</div>';
}
if(!empty($username) && !empty($password) && !empty($email)) {
$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);
$email = mysqli_real_escape_string($connection, $email);

$query = "INSERT INTO user(user_name,user_password,user_email,user_role)";
$query .= "VALUES('{$username}','{$password}','{$email}','User')";
$register_user_insert_query = mysqli_query($connection,$query);
if(!$register_user_insert_query) {
die("Query Failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
}
$message = "Your Registration has been Submitted";
} else {
$message = "Fields Cannot be Empty";
}
} else {
$message = "";
}
}
/************************Password Hash********************/
// function password_hash() {
// $query = "SELECT user_rand_salt FROM user";
//  $select_randsalt_query = mysqli_query($connection, $query);
//  if(!$select_randsalt_query) {
//  die("Query Failed" . mysqli_error($connection));
//  }
//   $row = mysqli_fetch_array($select_randsalt_query);
//   $salt = $row['user_rand_salt'];
//   $password = crypt($password, $salt);
// }
/******************Username Exist Check****************/
function username_exist($username) {
global $connection;
$query = "SELECT user_name FROM user WHERE user_name = '$username'";
$result = mysqli_query($connection, $query);
confirmQuery($result);
if(mysqli_num_rows($result) > 0) {
return true;
} else {
return false;
}
}
/**********Redirecting******************/
function redirect($location){
header("Location:" . $location);
exit;
}
function ifItIsMethod($method=null){
if($_SERVER['REQUEST_METHOD'] == strtoupper($method)) {
return true;
}
return false;
}
/***************Check Login********************/
function isLoggedIn($user) {
if(isset($_SESSION['user_role'])) {
return true;
}
return false;
}
/***********************************************************/
// USER SECTION
/**********************************************************/
/***********user logged in check and redirect ***********/
function checkIfUserIsLoggedInAndRedirect($redirectLocation=null){
if(isLoggedIn()) {
redirect($redirectLocation);
}
}
/*********************Check Email Exist********************/
function email_exist($email) {
global $connection;
$query = "SELECT user_email FROM user WHERE user_email = '$email'";
$result = mysqli_query($connection,$query);
confirmQuery($result);
if(mysqli_num_rows($result) > 0) {
return true;
} else {
return false;
}
}
/********************Escaping string ****************/
function escape($string) {
global $connection;
return mysqli_real_escape_string($connection, trip($string));
}
/************User Login.php**************/
function login_user($username, $password) {
global $connection;
$user_name = trim($user_name);
$user_password = trim($user_password);
$user_name      = mysqli_real_escape_string($connection, $user_name);
$user_password  = mysqli_real_escape_string($connection, $user_password);
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

} else if($user_name !== $db_user_name && $user_password !== $db_user_password) {
echo '<div class="alert alert-warning alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Username! </strong> & <strong>Password </strong>Not Matched Please Try Again.
</div>';

}else {
redirect('login.php');
}
}
/*************Notification****************/
function notifySuccess($notice) {
global $connection;
echo "<script>
var notificationChannel =  pusher.subscribe('notification');
notificationChannel.bind($notice, function(notification){
var message = notification.message;
toastr.success(`${message} Just logged In`);

}); </script>";
}
?>