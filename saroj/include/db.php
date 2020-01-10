<?php 
ob_start();

$connection = mysqli_connect('localhost','root','','blood');

if (!$connection) {
	die("Connection Failed". mysqli_error($connection));
}

 ?>