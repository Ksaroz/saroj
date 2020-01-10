

<?php 

include("delete_modal.php");

if(isset($_POST['checkBoxArray'])) {


    foreach($_POST['checkBoxArray'] as $userValueId ){

       $bulk_options = $_POST['bulk_options'];

            switch ($bulk_options) {
                
                case 'pending':
                $query = "UPDATE donar SET donar_status = '{$bulk_options}' WHERE donar_id = {$userValueId}";

                $update_bulk_donar_status_pending = mysqli_query($connection, $query);
                confirmQuery($update_bulk_donar_status_pending);
                break;

                case 'archived':
                $query = "UPDATE donar SET donar_status = '{$bulk_options}' WHERE donar_id = {$userValueId}";

                $update_bulk_donar_status_archived = mysqli_query($connection, $query);
                confirmQuery($update_bulk_donar_status_archived);
                break;

                case 'delete':
                $query = "DELETE FROM donar WHERE donar_id = {$userValueId}";

                $delete_user = mysqli_query($connection, $query);
                confirmQuery($delete_user);
                break;

                
                default:
                    # code...
                    break;
            }

}

}
 ?>

<span class="text-right"><h3>DONORS</h3></span>
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

                            <thead>
                                <tr>
                                    <th><input id="selectAllPost" type="checkbox"></th>
                                    <th>Donar Id</th>
                                    <th>User Id</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Blood Group</th>
                                    <th>Email</th>
                                    <th>Contact No:</th>
                                    <th>Address</th>
                                    <th>Description</th>
                                    <th>Agreement</th>
                                    <th>Status</th>
                                    <th colspan='2' class="text-center">Actions</th>
                                    <!-- <th>Date</th> -->
                                </tr>
                            </thead>

                        
                        <tbody>
                            
<?php 

$query = "SELECT * FROM donar ORDER BY donar_id DESC";
$select_all_donar = mysqli_query($connection,$query);

while ($row = mysqli_fetch_assoc($select_all_donar)) {
$donar_id = $row['donar_id'];
$donar_user_id = $row['donar_user_id'];
$donar_first_name = $row['donar_first_name'];
$donar_last_name = $row['donar_last_name'];
$donar_blood_group = $row['donar_blood_group'];
$donar_email = $row['donar_email'];
$donar_phone = $row['donar_phone'];
$donar_address = $row['donar_address'];
$donar_description = substr($row['donar_description'],0,50);
$donar_agreement = $row['donar_agreement'];
$donar_status = $row['donar_status'];

// $user_date = $row['user_date'];


echo "<tr>";
?>

<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value="<?php echo $donar_id ?>"></td>

<?php
echo "<td>$donar_id</td>";
echo "<td>$donar_user_id</td>";
echo "<td>$donar_first_name</td>";
echo "<td>$donar_last_name</td>";
echo "<td>$donar_blood_group</td>";
echo "<td>$donar_email</td>";
echo "<td>$donar_phone</td>";
echo "<td>$donar_address</td>";
echo "<td>$donar_description</td>";
echo "<td>$donar_agreement</td>";
echo "<td>$donar_status</td>";






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
echo "<td><a href='manage.php?source=reply&r_id={$donar_user_id}'>Reply</a></td>";

echo "<td><a rel='$donar_id' href='javascript: void(0)' class='delete_link'>Delete</a></td>";
// echo "<td><a href='manage.php?delete={$donar_id}'>Delete</a></td>";
echo "</tr>";


}



  ?>

                                
        </tbody>
    </table>


<?php 


deleteDonar();


 ?>

 <script type="text/javascript">
     
        $(document).ready(function(){

            $(".delete_link").on('click', function(){

                var id = $(this).attr("rel");

                var delete_url = "manage.php?source=donar&delete="+ id +" ";

                $(".modal_delete").attr("href", delete_url);

                $("#deleteModal").modal('show');

                
            })

        });

 </script>