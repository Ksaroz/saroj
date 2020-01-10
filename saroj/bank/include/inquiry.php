
<?php 

include("delete_modal.php");

if(isset($_POST['checkBoxArray'])) {


    foreach($_POST['checkBoxArray'] as $userValueId ){

       $bulk_options = $_POST['bulk_options'];

            switch ($bulk_options) {
                
                case 'pending':
                $query = "UPDATE inquiry SET inq_status = '{$bulk_options}' WHERE inq_id = {$userValueId}";

                $update_bulk_inq_status_pending = mysqli_query($connection, $query);
                confirmQuery($update_bulk_inq_status_pending);
                break;

                case 'archived':
                $query = "UPDATE inquiry SET inq_status = '{$bulk_options}' WHERE inq_id = {$userValueId}";

                $update_bulk_inq_status_archived = mysqli_query($connection, $query);
                confirmQuery($update_bulk_inq_status_archived);
                break;

                case 'delete':
                $query = "DELETE FROM inquiry WHERE inq_id = {$userValueId}";

                $delete_inquiry = mysqli_query($connection, $query);
                confirmQuery($delete_inquiry);
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
<span class="text-right"><h3>INQUIRIES</h3></span>
                            <thead>
                                <tr>
                                    <th><input id="selectAllPost" type="checkbox"></th>
                                    <th>Id</th>
                                    <th>User Id</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Contact No:</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th colspan='2' class="text-center">Actions</th>
                                    <!-- <th>Date</th> -->
                                </tr>
                            </thead>

                        
                        <tbody>
                            
<?php 


$query = "SELECT * FROM inquiry";
$select_all_inquiry = mysqli_query($connection,$query);

while ($row = mysqli_fetch_assoc($select_all_inquiry)) {
$inq_id = $row['inq_id'];
$inq_user_id = $row['inq_user_id'];
$inq_first_name = $row['inq_first_name'];
$inq_last_name = $row['inq_last_name'];
$inq_email = $row['inq_email'];
$inq_phone = $row['inq_phone'];
$inq_description = substr($row['inq_description'],0,50);
$inq_status = ($row['inq_status']);


// $user_date = $row['user_date'];


echo "<tr>";
?>

<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value="<?php echo $inq_id ?>"></td>

<?php
echo "<td>$inq_id</td>";
echo "<td>$inq_user_id</td>";
echo "<td>$inq_first_name</td>";
echo "<td>$inq_last_name</td>";
echo "<td>$inq_email</td>";
echo "<td>$inq_phone</td>";
echo "<td>$inq_description</td>";
echo "<td>$inq_status</td>";







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
// echo "<td><a href='manage.php?source=reply&r_id={$donar_user_id}'>Reply</a></td>";

echo "<td><a href='manage.php?source=reply&r_id={$inq_user_id}'>Reply</a></td>";

echo "<td><a rel='$inq_id' href='javascript: void(0)' class='delete_link'>Delete</a></td>";
// echo "<td><a href='manage.php?source=inquiry&delete={$inq_id}'>Delete</a></td>";
echo "</tr>";


}



 ?>

                                
        </tbody>
    </table>


<?php 



deleteInquiry();


 ?>



 <script type="text/javascript">
     
        $(document).ready(function(){

            $(".delete_link").on('click', function(){

                var id = $(this).attr("rel");

                var delete_url = "manage.php?source=inquiry&delete="+ id +" ";

                $(".modal_delete").attr("href", delete_url);

                $("#deleteModal").modal('show');

                
            })

        });

 </script>