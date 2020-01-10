<?php  ?>

<?php 

include("delete_modal.php");

if(isset($_POST['checkBoxArray'])) {


    foreach($_POST['checkBoxArray'] as $postValueId ){

       $bulk_options = $_POST['bulk_options'];

            switch ($bulk_options) {
                
                case 'Active':
                $query = "UPDATE post SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}";

                $active_post_status = mysqli_query($connection, $query);
                confirmQuery($active_post_status);
                break;

                case 'Draft':
                $query = "UPDATE post SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}";

                $draft_post_status = mysqli_query($connection, $query);
                confirmQuery($draft_post_status);
                break;

                case 'delete':
                $query = "DELETE FROM post WHERE post_id = {$postValueId}";

                $delete_post = mysqli_query($connection, $query);
                confirmQuery($delete_post);
                break;

                
                default:
                    # code...
                    break;
            }

}

}
 ?>


<form action="" method="post">
<table class="table table-bordered table-hover">
            <div id="bulkOptionContainer" class="col-xs-4">

            <select class="form-control" name="bulk_options" id="">
            <option value="">Select Option</option>
            <option value="Active">Active</option>
            <option value="Draft">Draft</option>
            <option value="delete">Delete</option>
            </select>

            </div>

        <div class="col-xs-4">
            
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a class="btn btn-primary" href="post.php?source=add_post">Add New</a>

        </div>
<span class="text-right"><h3>ALL POST</h3></span>
    
                            <thead>
                                <tr>
                                    <th><input id="selectAllPost" type="checkbox"></th>
                                    <th>Id</th>
                                    <th>Cat Title</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Comments</th>
                                    <th>Tags</th>
                                    <th>Contents</th>
                                    <th>Image</th>
                                     <th>Dates</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                        
                        <tbody>
                            
<?php 

if(isset($_SESSION['user_id'])) {


  $the_user_id = $_SESSION['user_id'];


$query = "SELECT * FROM post WHERE post_user_id = $the_user_id ORDER BY post_id DESC ";
$select_all_post = mysqli_query($connection,$query);

while ($row = mysqli_fetch_assoc($select_all_post)) {
    if(!empty($row)) {
$post_id = $row['post_id'];
$category_id = $row['category_id'];
$post_title = $row['post_title'];
$post_author = $row['post_author'];
$post_date = $row['post_date'];
$post_image = $row['post_image'];
$post_content = substr($row['post_content'],0,50);
$post_tags = $row['post_tags'];
$post_comment_count = $row['post_comment_count'];
$post_status = $row['post_status'];

echo "<tr>";
?>

<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value="<?php echo $post_id ?>"></td>

<?php

echo "<td>$post_id</td>";

$query = "SELECT * FROM categories WHERE cat_id = $category_id";
$edit_categories = mysqli_query($connection,$query);

while ($row = mysqli_fetch_assoc($edit_categories)) {
$cat_id = $row['cat_id'];
$cat_title = $row['category_title'];

echo "<td>$cat_title</td>";
 }

echo "<td>$post_author</td>";
echo "<td>$post_title</td>";

$query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
$send_comment_query = mysqli_query($connection, $query);

$row = mysqli_fetch_array($send_comment_query);
$comment_id = $row['comment_id'];
$count_comments = mysqli_num_rows($send_comment_query);



echo "<td><a href='post_comments.php?id=$post_id'>$count_comments</td>";





echo "<td>$post_tags</td>";
echo "<td>$post_content</td>";
echo "<td><img width='100' src='../img/$post_image' alt='image'></td>";
echo "<td>$post_date</td>";
echo "<td>$post_status</td>";
echo "<td><a href='post.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
echo "<td><a rel='$post_id' href='javascript: void(0)' class='delete_link'>Delete</a></td>";
// echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='post.php?delete={$post_id}'>Delete</a></td>";
echo "</tr>";


}
}
}


 ?>




                                
                        </tbody>
                    </table>

</form>
<?php 

deletePost();


 ?>



 <script type="text/javascript">
     
        $(document).ready(function(){

            $(".delete_link").on('click', function(){

                var id = $(this).attr("rel");

                var delete_url = "post.php?delete="+ id +" ";

                $(".modal_delete").attr("href", delete_url);

                $("#deleteModal").modal('show');

                
            })

        });





 </script>