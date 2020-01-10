<?php include "report_header.php"; ?>

<?php include "report_navigation.php" ?>

<div class="container-fluid">
	<h1 class="text-center mb-4">Blood Issue Report<h1>
		<h3 class="text-center"><strong></strong>Red Bank</strong></h3>
		<h6 class="text-center"><small>www.redbank.com</small></h6>
		<hr class="mb-4">
	<div class="row">
		<div class="col-md-1">
			
		</div>
		<div class="col-md-10">
<table class="table table-bordered">
	<?php 

if(isset($_GET['report'])) {

	$the_report_id = $_GET['report'];

$query = "SELECT * FROM issue WHERE issue_id = $the_report_id";

$select_users = mysqli_query($connection,$query);

while ($row = mysqli_fetch_assoc($select_users)) {
$issue_id = $row['issue_id'];
$issue_from = $row['issue_from'];
$issue_from_email = $row['issue_from_email'];
$issue_from_group = $row['issue_from_group'];
$issue_date = $row['issue_date'];
$issue_to = $row['issue_to'];
$issue_to_email = $row['issue_to_email'];
$issue_to_group = $row['issue_to_group'];
$issue_status = $row['issue_status'];

  echo "<thead>";
    echo "<tr>";
       	echo "<th scope='col'>Id</th>";
	    echo "<th scope='col'>Donar Name</th>";
	    echo "<th scope='col'>Donar Email</th>";
	    echo "<th scope='col'>Donar_Group</th>";
	    echo "<th scope='col'>Issue_Date</th>";
	    echo "<th scope='col'>Request Name</th>";
	    echo "<th scope='col'>Request Email</th>";
	    echo "<th scope='col'>Request Group</th>";
	    echo "<th scope='col'>Status</th>";
    echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
 

// $user_date = $row['user_date'];
echo "<tr>";






echo "<td>$issue_id</td>";
echo "<td>$issue_from</td>";
echo "<td>$issue_from_email</td>";
echo "<td>$issue_from_group</td>";
echo "<td>$issue_date</td>";
echo "<td>$issue_to</td>";
echo "<td>$issue_to_email</td>";
echo "<td>$issue_to_group</td>";
echo "<td>$issue_status</td>";
echo "</tr>";
echo "</tbody>";

}
}
?>
  
</table>
</div>
<div class="col-md-1">
	
</div>
</div>
</div>
                            

<?php include "../include/footer.php"; ?>