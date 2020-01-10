<?php ob_start(); ?>
<?php session_start(); ?>
<?php
include "include/db.php";

$sql="UPDATE comments SET comment_notify=1 WHERE comment_notify=0";	
$result=mysqli_query($connection, $sql);

$sql="select * from comments ORDER BY comment_id DESC limit 1";
$result=mysqli_query($connection, $sql);

$response='';
while($row=mysqli_fetch_array($result)) {
	$comment_user_id = $_SESSION['username'];
	$comments = $row["comment_content"];
	$response = $response . "<div class='notification-item'>" .
	// "<div class='notification-subject'>". $row["comment_email"] . "</div>" . 
	"<div class='notification-comment'>" . "Comment from: $comment_user_id ". "<br>" . $comments . "</div>" .
	"</div>";
}
if(!empty($response)) {
	print $response;
}


?>