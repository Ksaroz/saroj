<?php 

if(isset($_GET['edit_issue'])){


	$the_edit_issue_id = $_GET['edit_issue'];

	$query = "SELECT * FROM issue WHERE issue_id = $the_edit_issue_id";
$select_issue_query = mysqli_query($connection,$query);

while ($row = mysqli_fetch_assoc($select_issue_query)) {
$issue_id = $row['issue_id'];
$issue_from = $row['issue_from'];
$issue_from_email = $row['issue_from_email'];
$issue_from_group = $row['issue_from_group'];
$issue_date = $row['issue_date'];
$issue_to = $row['issue_to'];
$issue_to_email = $row['issue_to_email'];
$issue_to_group = $row['issue_to_group'];

}

if(isset($_POST['edit_issue'])) {

// $user_id = $row['user_id'];
$issue_from = $_POST['issue_from'];
$issue_from_email = $_POST['issue_from_email'];
$issue_from_group = $_POST['issue_from_group'];
$issue_date = $_POST['issue_date'];
$issue_to = $_POST['issue_to'];
$issue_to_email = $_POST['issue_to_email'];
$issue_to_group = $_POST['issue_to_group'];


	$query = "UPDATE issue SET ";
	$query .= "issue_from = '{$issue_from}',";
	$query .= "issue_from_email = '{$issue_from_email}',";
	$query .= "issue_from_group = '{$issue_from_group}',";
	$query .= "issue_date = '{$issue_date}',";
	$query .= "issue_to = '{$issue_to}',";
	$query .= "issue_to_email = '{$issue_to_email}',";
	$query .= "issue_to_group = '{$issue_to_group}'";
	$query .= "WHERE issue_id = {$the_edit_issue_id}";


$update_query = mysqli_query($connection,$query);
confirmQuery($update_query);

redirect('manage.php?source=view_issue');

}

}


?>
<span class="text-right"><h3>EDIT ISSUE</h3></span>
<form action="" method="post">
	<div class="form-group">
		<label for="user_first_name">Donar Name:</label>
		<input type="text" class="form-control" name="issue_from" value="<?php echo $issue_from ?>">
	</div>
	<div class="form-group">
		<label for="user_last_name">Donar Email</label>
		<input type="email" class="form-control" name="issue_from_email" value="<?php echo $issue_from_email ?>">
	</div>
	
	
	
	<!-- <div class="form-group">
		<label for="images">Post Image</label>
		<input type="file"  name="images">
	</div> -->
	
	<div class="form-group">
		<label for="user_name">Donar Group</label>
		<input type="text" class="form-control" name="issue_from_group" value="<?php echo $issue_from_group ?>">
	</div>
	<div class="form-group">
		<label for="user_email">Issue Date</label>
		<input type="date" class="form-control" name="issue_date" value="<?php echo $issue_date ?>">
	</div>
	<div class="form-group">
		<label for="user_password">Request Name</label>
		<input type="text" class="form-control" name="issue_to" value="<?php echo $issue_to ?>">
	</div>
	<div class="form-group">
		<label for="user_password">Request Email</label>
		<input type="text" class="form-control" name="issue_to_email" value="<?php echo $issue_to_email ?>">
	</div>
	<div class="form-group">
		<label for="user_password">Request Group</label>
		<input type="text" class="form-control" name="issue_to_group" value="<?php echo $issue_to_group ?>">
	</div>
	
	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="edit_issue" value="Update">
	</div>
</form>