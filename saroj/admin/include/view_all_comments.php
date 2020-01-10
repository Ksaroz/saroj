<?php 

include("delete_modal.php");

if(isset($_POST['checkBoxArray'])) {


    foreach($_POST['checkBoxArray'] as $userValueId ){

       $bulk_options = $_POST['bulk_options'];

            switch ($bulk_options) {
                
                case 'Approved':
                $query = "UPDATE comments SET comment_status = '{$bulk_options}' WHERE comment_id = {$userValueId}";

                $update_bulk_comment_status_approved = mysqli_query($connection, $query);
                confirmQuery($update_bulk_comment_status_approved);
                break;

                case 'Unapproved':
                $query = "UPDATE comments SET comment_status = '{$bulk_options}' WHERE comment_id = {$userValueId}";

                $update_bulk_comment_status_unapproved = mysqli_query($connection, $query);
                confirmQuery($update_bulk_comment_status_archived);
                break;

                case 'delete':
                $query = "DELETE FROM comments WHERE comment_id = {$userValueId}";

                $delete_comments = mysqli_query($connection, $query);
                confirmQuery($delete_comments);
                break;

                
                default:
                    # code...
                    break;
            }

}

}
 ?>
<span class="text-right"><h3>COMMENTS</h3></span>
<form action="" method="post">
<table class="table table-bordered table-hover">

    <div id="bulkOptionContainer" class="col-xs-4">

            <select class="form-control" name="bulk_options" id="">
            <option value="">Select Option</option>
            <option value="Approved">Approved</option>
            <option value="Unapproved">Unapproved</option>
            <!-- <option value="Bank">Reply</option> -->
             <option value="delete">Delete</option>
            </select>

            </div>

        <div class="col-xs-4">
            
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            

        </div>

                            <thead>
                                <tr>
                                    <th><input id="selectAllPost" type="checkbox"></th>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Email</th>
                                    <th>Comments</th>
                                    <th>Status</th>
                                    <th>In Response to</th>
                                    <th>Date</th>
                                    <th>Approved</th>
                                    <th>Unapproved</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>

                        
                        <tbody>
                            
<?php 

$query = "SELECT * FROM comments ORDER BY comment_id DESC ";
$select_comments = mysqli_query($connection,$query);

while ($row = mysqli_fetch_assoc($select_comments)) {
$com_id = $row['comment_id'];
$com_post_id = $row['comment_post_id'];
$com_email = $row['comment_email'];
$com_author = $row['comment_author'];
$com_date = $row['comment_date'];
$com_status = $row['comment_status'];
$com_content = substr($row['comment_content'],0,50);

echo "<tr>";
?>

<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value="<?php echo $com_id ?>"></td>

<?php

echo "<td>$com_id</td>";
echo "<td>$com_author</td>";
echo "<td>$com_email</td>";
echo "<td>$com_content</td>";
echo "<td>$com_status</td>";




$query = "SELECT * FROM post WHERE post_id = $com_post_id";
$select_post_id_query = mysqli_query($connection,$query);

while ($row = mysqli_fetch_assoc($select_post_id_query)) {
$post_id = $row['post_id'];
$post_title = $row['post_title'];

echo "<td><a href='post.php?source=view_post&p_id={$post_id}'>$post_title</a></td>";
}



echo "<td>$com_date</td>";


echo "<td><a href='comment.php?approved=$com_id'>Approve</a></td>";
echo "<td><a href='comment.php?unapproved=$com_id'>Unapprove</a></td>";

echo "<td><a rel='$com_id' href='javascript: void(0)' class='delete_link'>Delete</a></td>";
echo "</tr>";


}



 ?>

                                
        </tbody>
    </table>


<?php 

approvedComment();

unapprovedComment();

deleteComment();


 ?>


 <script type="text/javascript">
     
        $(document).ready(function(){

            $(".delete_link").on('click', function(){

                var id = $(this).attr("rel");

                var delete_url = "comment.php?delete="+ id +" ";

                $(".modal_delete").attr("href", delete_url);

                $("#deleteModal").modal('show');

                
            })

        });

 </script>