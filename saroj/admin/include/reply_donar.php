<?php 

if(isset($_GET['reply_donar'])) {

$reply_donar = $_GET['reply_donar'];

}

$query = "SELECT * FROM donar WHERE donar_user_id={$reply_donar}";
$reply_back_donar = mysqli_query($connection,$query);

while ($row = mysqli_fetch_assoc($reply_back_donar)) {
$post_id = $row['post_id'];
$category_id = $row['category_id'];
$post_title = $row['post_title'];
$post_author = $row['post_author'];
$post_date = $row['post_date'];
$post_image = $row['post_image'];
$post_content = $row['post_content'];
$post_tags = $row['post_tags'];
$post_comment_count = $row['post_comment_count'];
$post_status = $row['post_status'];


}

if(isset($_POST['update_post'])) {

$post_title = $_POST['title'];
$category_id = $_POST['post_category'];
$post_author = $_POST['author'];
$post_date = date('d-m-y');
$post_image = $_FILES['images']['name'];
$post_image_temp = $_FILES['images']['tmp_name'];
$post_content = $_POST['content'];
$post_tags = $_POST['tags'];
$post_comment_count = 4;
$post_status = $_POST['status'];

move_uploaded_file($post_image_temp, "../img/$post_image");

if(empty($post_image)) {

	$query = "SELECT * FROM post WHERE post_id = $edit_post_id";
	$select_image = mysqli_query($connection,$query);

	while($row = mysqli_fetch_array($select_image)){

		$post_image = $row['post_image'];
	}
}

	$query = "UPDATE post SET ";
	$query .= "post_title = '{$post_title}',";
	$query .= "category_id = '{$category_id}',";
	$query .= "post_author = '{$post_author}',";
	$query .= "post_date = now(),";
	$query .= "post_image = '{$post_image}',";
	$query .= "post_content = '{$post_content}',";
	$query .= "post_tags = '{$post_tags}',";
	$query .= "post_comment_count = '{$post_comment_count}',";
	$query .= "post_status = '{$post_status}'";
	$query .= "WHERE post_id = {$edit_post_id}";


$update_query = mysqli_query($connection,$query);
confirmQuery($update_query);

echo "Post Edited: " . " " . " <a href = 'post.php'>View Post</a>";

}

?>

<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title" value="<?php echo $post_title; ?>">
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
		<input  value="<?php echo $post_author; ?>" type="text" class="form-control" name="author">
	</div>
	<div class="form-group">
		<label for="dates">Post Date</label>
		<input type="date" class="form-control" name="dates" value="<?php echo $post_date; ?>">
	</div>
	<div class="form-group">
		<label for="images">Post Image</label>
		<input type="file"  name="images" value="<?php echo $post_image; ?>">
	</div>
	<div class="form-group">
		<img width="100" src="../img/<?php echo $post_image; ?>" alt="image">
	</div>
	<div class="form-group">
		<label for="content">Post Contents</label>
		<textarea class="form-control" name="content" id="content" cols="30" rows="10"><?php echo $post_content; ?></textarea>
	</div>
	<div class="form-group">
		<label for="tags">Post Tags</label>
		<input type="text" class="form-control" name="tags" value="<?php echo $post_tags; ?>">
	</div>
	<!-- <div class="form-group">
		<label for="comment">Post Comments</label>
		<input type="text" class="form-control" name="comment" value="<?php echo $post_comment_count; ?>">
	</div> -->

    <div class="form-group">
      
      <select name="status" id="select_status">
        <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
        <?php 

        	if($post_status == 'Active') {

        		echo "<option value='Draft'>Draft</option>"; 
        	}else {
        		echo "<option value='Active'>Active</option>"; 
        	}


         ?>
      </select>
    </div>



	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="update_post" value="Update">
	</div>
</form>