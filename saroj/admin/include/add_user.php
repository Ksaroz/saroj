<?php 

if(isset($_SESSION['user_id'])){


  $the_user_id = $_SESSION['user_id'];

  $query = "SELECT * FROM user WHERE user_id = $the_user_id";
$select_users_query = mysqli_query($connection,$query);

while ($row = mysqli_fetch_assoc($select_users_query)) {
$user_id = $row['user_id'];
}

if(isset($_POST['create_user'])) {

 

$post_user_first_name = $_POST['user_first_name'];
$post_user_last_name = $_POST['user_last_name'];
$post_user_role = $_POST['user_role'];
// $post_date = date('d-m-y');
// $post_image = $_FILES['images']['name'];
// $post_image_temp = $_FILES['images']['tmp_name'];
$post_username = $_POST['user_name'];
$post_user_email = $_POST['user_email'];
$post_user_password = $_POST['user_password'];

// move_uploaded_file($post_image_temp, "../img/$post_image");

$query = "INSERT INTO user(user_create_id,user_name,user_password,user_first_name,user_last_name,user_email,user_role)";

$query .= "VALUES({$user_id},'{$post_username}','{$post_user_password}','{$post_user_first_name}','{$post_user_last_name}','{$post_user_email}','{$post_user_role}')";

$create_user_insert_query = mysqli_query($connection,$query);

confirmQuery($create_user_insert_query);


echo "User Created: " . " " . " <a href = 'user.php'>View Users</a>";



}


}
?>

<span class="text-right"><h3>ADD USER</h3></span>

<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="user_first_name">First Name</label>
		<input type="text" class="form-control" name="user_first_name">
	</div>
	<div class="form-group">
		<label for="user_last_name">Last Name</label>
		<input type="text" class="form-control" name="user_last_name">
	</div>
	<div class="form-group">
		<select name="user_role" id="">
			<option value="User">Select Role</option>
			<option value="Admin">Admin</option>
			<option value="User">User</option>
			<option value="Blood Bank">Blood Bank</option>
			


		</select>

		</div> 
	
	
	<!-- <div class="form-group">
		<label for="images">Post Image</label>
		<input type="file"  name="images">
	</div> -->
	
	<div class="form-group">
		<label for="user_name">UserName</label>
		<input type="text" class="form-control" name="user_name">
	</div>
	<div class="form-group">
		<label for="user_email">Email</label>
		<input type="email" class="form-control" name="user_email">
	</div>
	<div class="form-group">
		<label for="user_password">Password</label>
		<input type="password" class="form-control" name="user_password">
	</div>
	
	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="create_user" value="Add User">
	</div>
</form>