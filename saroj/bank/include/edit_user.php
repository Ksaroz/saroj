<?php 

if(isset($_GET['edit_user'])){


	$the_edit_user_id = $_GET['edit_user'];

	$query = "SELECT * FROM user WHERE user_id = $the_edit_user_id";
$select_users_query = mysqli_query($connection,$query);

while ($row = mysqli_fetch_assoc($select_users_query)) {
$user_id = $row['user_id'];
$user_name = $row['user_name'];
$user_password = $row['user_password'];
$user_first_name = $row['user_first_name'];
$user_last_name = $row['user_last_name'];
$user_email = $row['user_email'];
$user_image = $row['user_image'];
$user_role = $row['user_role'];

}

if(isset($_POST['edit_user'])) {

// $user_id = $row['user_id'];
$user_name = $_POST['user_name'];
$user_password = $_POST['user_password'];
$user_first_name = $_POST['user_first_name'];
$user_last_name = $_POST['user_last_name'];
$user_email = $_POST['user_email'];
// $user_image = $row['user_image'];
//$user_role = $row['user_role'];

// move_uploaded_file($post_image_temp, "../img/$post_image");

// if(empty($post_image)) {

// 	$query = "SELECT * FROM post WHERE post_id = $edit_post_id";
// 	$select_image = mysqli_query($connection,$query);

// 	while($row = mysqli_fetch_array($select_image)){

// 		$post_image = $row['post_image'];
// 	}
// }


// $query = "SELECT user_rand_salt FROM user";
//  $select_randsalt_query = mysqli_query($connection, $query);
//  if(!$select_randsalt_query) {
//  die("Query Failed" . mysqli_error($connection));
//  }

// $row = mysqli_fetch_array($select_randsalt_query);

//   $salt = $row['user_rand_salt'];

//   $hashed_password = crypt($user_password, $salt);





	$query = "UPDATE user SET ";
	$query .= "user_name = '{$user_name}',";
	$query .= "user_password = '{$user_password}',";
	$query .= "user_first_name = '{$user_first_name}',";
	$query .= "user_last_name = '{$user_last_name}',";
	$query .= "user_email = '{$user_email}'";
	$query .= "WHERE user_id = {$the_edit_user_id}";


$update_query = mysqli_query($connection,$query);
confirmQuery($update_query);

header("Location: user.php");

}

}







// if(isset($_POST['edit_user'])) {

 

// $post_user_first_name = $_POST['user_first_name'];
// $post_user_last_name = $_POST['user_last_name'];
// $post_user_role = $_POST['user_role'];
// // $post_date = date('d-m-y');
// // $post_image = $_FILES['images']['name'];
// // $post_image_temp = $_FILES['images']['tmp_name'];
// $post_username = $_POST['user_name'];
// $post_user_email = $_POST['user_email'];
// $post_user_password = $_POST['user_password'];

// // move_uploaded_file($post_image_temp, "../img/$post_image");

// $query = "INSERT INTO user(user_name,user_password,user_first_name,user_last_name,user_email,user_role)";

// $query .= "VALUES('{$post_username}','{$post_user_password}','{$post_user_first_name}','{$post_user_last_name}','{$post_user_email}','{$post_user_role}')";

// $create_user_insert_query = mysqli_query($connection,$query);

// confirmQuery($create_user_insert_query);


// }
?>
<span class="text-right"><h3>EDIT USER</h3></span>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="user_first_name">First Name</label>
		<input type="text" class="form-control" name="user_first_name" value="<?php echo $user_first_name ?>">
	</div>
	<div class="form-group">
		<label for="user_last_name">Last Name</label>
		<input type="text" class="form-control" name="user_last_name" value="<?php echo $user_last_name ?>">
	</div>
	
	
	
	<!-- <div class="form-group">
		<label for="images">Post Image</label>
		<input type="file"  name="images">
	</div> -->
	
	<div class="form-group">
		<label for="user_name">UserName</label>
		<input type="text" class="form-control" name="user_name" value="<?php echo $user_name ?>">
	</div>
	<div class="form-group">
		<label for="user_email">Email</label>
		<input type="email" class="form-control" name="user_email" value="<?php echo $user_email ?>">
	</div>
	<div class="form-group">
		<label for="user_password">Password</label>
		<input type="password" class="form-control" name="user_password" value="<?php echo $user_password ?>">
	</div>
	
	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="edit_user" value="Update">
	</div>
</form>