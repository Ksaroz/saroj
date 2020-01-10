<?php
include('db.php');
if(isset($_POST['view'])){
// $con = mysqli_connect("localhost", "root", "", "notif");
if($_POST["view"] != '')
{
   $update_query = "UPDATE inquiry SET notify_status = 1 WHERE notify_status=0";
   mysqli_query($connection, $update_query);
}
$query = "SELECT * FROM inquiry ORDER BY inq_id DESC LIMIT 5";
$result = mysqli_query($connection, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{
  $output .= '
  <li>
  <a href="#">
  <strong>'.$row["inq_subject"].'</strong><br />
  <small><em>'.$row["inq_description"].'</em></small>
  </a>
  </li>
  ';
}
}
else{
    $output .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
}
$status_query = "SELECT * FROM inquiry WHERE notify_status=0";
$result_query = mysqli_query($connection, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
echo json_encode($data);
}
?>