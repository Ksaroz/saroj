<?php 

if(isset($_SESSION['user_id'])){


  $the_user_id = $_SESSION['user_id'];

  $query = "SELECT * FROM user WHERE user_id = $the_user_id";
$select_users_query = mysqli_query($connection,$query);

while ($row = mysqli_fetch_assoc($select_users_query)) {
$user_id = $row['user_id'];
}

if(isset($_POST['create_post'])) {

 
$post_title = $_POST['title'];
$category_title = $_POST['post_category'];
$post_author = $_POST['author'];
$post_date = date('d-m-y');
$post_image = $_FILES['images']['name'];
$post_image_temp = $_FILES['images']['tmp_name'];
$post_content = $_POST['content'];
$post_tags = $_POST['tags'];
$post_status = $_POST['status'];

move_uploaded_file($post_image_temp, "../img/$post_image");

$query = "INSERT INTO post(post_user_id,category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status)";

$query .= "VALUES({$user_id},'{$category_title}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";

$create_post_query = mysqli_query($connection,$query);

confirmQuery($create_post_query);

$the_post_id = mysqli_insert_id($connection);

echo "Post Created: " . " " . " <a href = 'post.php?source=view_post&p_id={$the_post_id}'>View Post</a>";



}

}	



 ?>

<span class="text-right"><h3>ADD POST</h3></span>

<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title">
	</div>
	<div class="form-group">
		<select name="post_category" id="">
			

<?php 

$query = "SELECT * FROM categories";
$select_categories = mysqli_query($connection,$query);

confirmQuery($select_categories);

while ($row = mysqli_fetch_assoc($select_categories)) {
$cat_id = $row['cat_id'];
$cat_title = $row['category_title'];

echo "<option value='{$cat_id}'>$cat_title </option>";

}


?>



		</select>
		
	</div>
	<div class="form-group">
		<label for="author">Post Author</label>
		<input type="text" class="form-control" name="author">
	</div>
	<div class="form-group">
		<label for="dates">Post Date</label>
		<input type="date" class="form-control" name="dates">
	</div>
	<div class="form-group">
		<label for="images">Post Image</label>
		<input type="file"  name="images">
	</div>
	<div class="form-group">
		<label for="content">Post Contents</label>
		<textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
	</div>
	<div class="form-group">
		<label for="tags">Post Tags</label>
		<input type="text" class="form-control" name="tags">
	</div>
	<!-- <div class="form-group">
		<label for="comment">Post Comments</label>
		<input type="text" class="form-control" name="comment">
	</div> -->
	<div class="form-group">

	<select name="status" id="select_status">
	<option value="Active">Active</option>
	<option value="Draft">Draft</option>
	</select>
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="create_post" value="Publish">
	</div>
</form>