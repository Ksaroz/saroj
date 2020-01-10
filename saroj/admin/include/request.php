
<?php 

include("delete_modal.php");

if(isset($_POST['checkBoxArray'])) {


    foreach($_POST['checkBoxArray'] as $userValueId ){

       $bulk_options = $_POST['bulk_options'];

            switch ($bulk_options) {
                
                case 'pending':
                $query = "UPDATE request SET req_status = '{$bulk_options}' WHERE req_id = {$userValueId}";

                $update_bulk_req_status_pending = mysqli_query($connection, $query);
                confirmQuery($update_bulk_req_status_pending);
                break;

                case 'archived':
                $query = "UPDATE request SET req_status = '{$bulk_options}' WHERE req_id = {$userValueId}";

                $update_bulk_req_status_archived = mysqli_query($connection, $query);
                confirmQuery($update_bulk_req_status_archived);
                break;

                case 'delete':
                $query = "DELETE FROM request WHERE req_id = {$userValueId}";

                $delete_request = mysqli_query($connection, $query);
                confirmQuery($delete_request);
                break;

                
                default:
                    # code...
                    break;
            }

}

}
 ?>

<!-- <div class="col-xs-4">
        
            <div>
                <form class="form-inline my-2 my-lg-0" role="form" autocomplete="off" action="include/searchRequest.php" method="post">
        <input name="search" class="form-control mr-sm-0" type="search" placeholder="Search" aria-label="Search">
          <button name="submit" class="btn btn-primary my-2 my-sm-0 float-right" type="submit">Search</button>
      </form>
  </div>

</div> -->


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
            <!-- <button type="submit" value="submit" class="btn btn-primary"><a href="../reports/demoresult.php">Reports</a></button> -->
            

        </div>
    <span class="text-right"><h3>REQUESTS</h3></span>
                            <thead>
                                <tr>
                                    <th><input id="selectAllPost" type="checkbox"></th>
                                    <th>Id</th>
                                    <th>User Id</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Blood Group</th>
                                    <th>Email</th>
                                    <th>Contact No:</th>
                                    <th>Address</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th colspan='2' class="text-center">Actions</th>
                                    <!-- <th>Date</th> -->
                                </tr>
                            </thead>

                        
                        <tbody>
                            
<?php 

$query = "SELECT * FROM request";
$select_all_request = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_all_request)) {
$req_id = $row['req_id'];
$req_user_id = $row['req_user_id'];
$req_first_name = $row['req_first_name'];
$req_last_name = $row['req_last_name'];
$req_blood_group = $row['req_blood_group'];
$req_email = $row['req_email'];
$req_phone = $row['req_phone'];
$req_address = $row['req_address'];
$req_description = substr($row['req_description'],0,50);
$req_status = ($row['req_status']);


// $user_date = $row['user_date'];


echo "<tr>";
?>

<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value="<?php echo $req_id ?>"></td>

<?php
echo "<td>$req_id</td>";
echo "<td>$req_user_id</td>";
echo "<td>$req_first_name</td>";
echo "<td>$req_last_name</td>";
echo "<td>$req_blood_group</td>";
echo "<td>$req_email</td>";
echo "<td>$req_phone</td>";
echo "<td>$req_address</td>";
echo "<td>$req_description</td>";
echo "<td>$req_status</td>";







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


echo "<td><a href='manage.php?source=reply&r_id={$req_user_id}'>Reply</a></td>";

echo "<td><a rel='$req_id' href='javascript: void(0)' class='delete_link'>Delete</a></td>";
// echo "<td><a href='include/request.php?delete={$req_id}'>Delete</a></td>";
echo "</tr>";


}



 ?>

                                
        </tbody>
    </table>


<?php 



deleteRequest();


 ?>


 <script type="text/javascript">
     
        $(document).ready(function(){

            $(".delete_link").on('click', function(){

                var id = $(this).attr("rel");

                var delete_url = "manage.php?source=request&delete="+ id +" ";

                $(".modal_delete").attr("href", delete_url);

                $("#deleteModal").modal('show');

                
            })

        });

 </script>