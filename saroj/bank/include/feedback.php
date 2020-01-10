
<?php 

include("delete_modal.php");

if(isset($_POST['checkBoxArray'])) {


    foreach($_POST['checkBoxArray'] as $userValueId ){

       $bulk_options = $_POST['bulk_options'];

            switch ($bulk_options) {
                
                case 'pending':
                $query = "UPDATE feedback SET feed_status = '{$bulk_options}' WHERE feed_id = {$userValueId}";

                $update_bulk_feed_status_pending = mysqli_query($connection, $query);
                confirmQuery($update_bulk_feed_status_pending);
                break;

                case 'archived':
                $query = "UPDATE feedback SET feed_status = '{$bulk_options}' WHERE feed_id = {$userValueId}";

                $update_bulk_feed_status_archived = mysqli_query($connection, $query);
                confirmQuery($update_bulk_feed_status_archived);
                break;

                case 'delete':
                $query = "DELETE FROM feedback WHERE feed_id = {$userValueId}";

                $delete_feedback = mysqli_query($connection, $query);
                confirmQuery($delete_feedback);
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
            <option value="pending">Pending</option>
            <option value="archived">Archived</option>
            <!-- <option value="Bank">Reply</option> -->
             <option value="delete">Delete</option>
            </select>

            </div>

        <div class="col-xs-4">
            
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            

        </div>
<span class="text-right"><h3>FEEDBACKS</h3></span>
                            <thead>
                                <tr>
                                    <th><input id="selectAllPost" type="checkbox"></th>
                                    <th>Id</th>
                                    <th>User Id</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Feedback</th>
                                    <!-- <th>Status</th> -->
                                    <th>Action</th>
                                    <!-- <th>Date</th> -->
                                </tr>
                            </thead>

                        
                        <tbody>
                            
<?php 

$query = "SELECT * FROM feedback";
$select_all_feedback = mysqli_query($connection,$query);

while ($row = mysqli_fetch_assoc($select_all_feedback)) {
$feed_id = $row['feed_id'];
$feed_user_id = $row['feed_user_id'];
$feed_first_name = $row['feed_first_name'];
$feed_last_name = $row['feed_last_name'];
$feed_email = $row['feed_email'];
$feed_description = substr($row['feed_description'],0,50);
// $feed_status = ($row['feed_status']);


// $user_date = $row['user_date'];


echo "<tr>";
?>

<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value="<?php echo $feed_id ?>"></td>

<?php

echo "<td>$feed_id</td>";
echo "<td>$feed_user_id</td>";
echo "<td>$feed_first_name</td>";
echo "<td>$feed_last_name</td>";
echo "<td>$feed_email</td>";
echo "<td>$feed_description</td>";
// echo "<td>$feed_status</td>";







// $query = "SELECT * FROM post WHERE post_id = $com_post_id";
// $select_post_id_query = mysqli_query($connection,$query);

// while ($row = mysqli_fetch_assoc($select_post_id_query)) {
// $post_id = $row['post_id'];
// $post_title = $row['post_title'];

// echo "<td><a href='../pages/post.php?p_id=$post_id'>$post_title</a></td>";
// }






// echo "<td><a href='user.php?admin={$user_id}'>Admin</a></td>";
// echo "<td><a href='user.php?user={$user_id}'>User</a></td>";
// echo "<td><a href='user.php?bb={$user_id}'>Blood Bank</a></td>";
// echo "<td><a href='manage.php?source=feedback&feedback={$feed_user_id}'>Reply</a></td>";

echo "<td><a rel='$feed_id' href='javascript: void(0)' class='delete_link'>Delete</a></td>";
// echo "<td><a href='manage.php?source=feedback&delete={$feed_id}'>Delete</a></td>";
echo "</tr>";


}



 ?>

                                
        </tbody>
    </table>


<?php 



deleteFeedback();
 ?>

 <script type="text/javascript">
     
        $(document).ready(function(){

            $(".delete_link").on('click', function(){

                var id = $(this).attr("rel");

                var delete_url = "manage.php?source=feedback&delete="+ id +" ";

                $(".modal_delete").attr("href", delete_url);

                $("#deleteModal").modal('show');

                
            })

        });

 </script>