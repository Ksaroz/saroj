<?php 

include("delete_modal.php");

if(isset($_POST['checkBoxArray'])) {


    foreach($_POST['checkBoxArray'] as $userValueId ){

       $bulk_options = $_POST['bulk_options'];

            switch ($bulk_options) {
                
                case 'Admin':
                $query = "UPDATE user SET user_role = '{$bulk_options}' WHERE user_id = {$userValueId}";

                $user_role_admin = mysqli_query($connection, $query);
                confirmQuery($user_role_admin);
                break;

                case 'User':
                $query = "UPDATE user SET user_role = '{$bulk_options}' WHERE user_id = {$userValueId}";

                $user_role_user = mysqli_query($connection, $query);
                confirmQuery($user_role_user);
                break;

                case 'Bank':
                $query = "UPDATE user SET user_role = '{$bulk_options}' WHERE user_id = {$userValueId}";

                $user_role_bank = mysqli_query($connection, $query);
                confirmQuery($user_role_bank);
                break;

                case 'delete':
                $query = "DELETE FROM user WHERE user_id = {$userValueId}";

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




<form action="" method="post">
<table class="table table-bordered table-hover">


<div id="bulkOptionContainer" class="col-xs-4">

            <select class="form-control" name="bulk_options" id="">
            <option value="">Select Option</option>
            <option value="Admin">Admin</option>
            <option value="User">User</option>
            <option value="Bank">Blood Bank</option>
             <option value="delete">Delete</option>
            </select>

            </div>

        <div class="col-xs-4">
            
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a class="btn btn-primary" href="user.php?source=add_user">Add New</a>

        </div>

<span class="text-right"><h3>ALL USER</h3></span>

                            <thead>
                                <tr>
                                    <th><input id="selectAllPost" type="checkbox"></th>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Image</th>
                                    <th colspan='3' class="text-center">Change Role</th>
                                    <th colspan='2' class="text-center">Actions</th>

                                    <!-- <th>Date</th> -->
                                </tr>
                            </thead>

                        
                        <tbody>
                            
<?php 

$query = "SELECT * FROM user ORDER BY user_id DESC ";
$select_users = mysqli_query($connection,$query);

while ($row = mysqli_fetch_assoc($select_users)) {
$user_id = $row['user_id'];
$user_name = $row['user_name'];
$user_password = $row['user_password'];
$user_first_name = $row['user_first_name'];
$user_last_name = $row['user_last_name'];
$user_email = $row['user_email'];
$user_image = $row['user_image'];
$user_role = $row['user_role'];

// $user_date = $row['user_date'];
echo "<tr>";
?>

<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value="<?php echo $user_id ?>"></td>

<?php


echo "<td>$user_id</td>";
echo "<td>$user_name</td>";
echo "<td>$user_first_name</td>";
echo "<td>$user_last_name</td>";
echo "<td>$user_email</td>";
echo "<td>$user_role</td>";
echo "<td><img width='64' height='64' src='../img/$user_image' alt='image'></td>";
// echo "<td>$user_date</td>";




// $query = "SELECT * FROM post WHERE post_id = $com_post_id";
// $select_post_id_query = mysqli_query($connection,$query);

// while ($row = mysqli_fetch_assoc($select_post_id_query)) {
// $post_id = $row['post_id'];
// $post_title = $row['post_title'];

// echo "<td><a href='../pages/post.php?p_id=$post_id'>$post_title</a></td>";
// }






echo "<td><a href='user.php?admin={$user_id}'>Admin</a></td>";
echo "<td><a href='user.php?user={$user_id}'>User</a></td>";
echo "<td><a href='user.php?bb={$user_id}'>Blood Bank</a></td>";
echo "<td><a href='user.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";

echo "<td><a rel='$user_id' href='javascript: void(0)' class='delete_link'>Delete</a></td>";
// echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='user.php?delete={$user_id}'>Delete</a></td>";
echo "</tr>";


}



 ?>

                                
        </tbody>
    </table>


<?php 

changeUserRole();

deleteUser();


 ?>


 <script type="text/javascript">
     
        $(document).ready(function(){

            $(".delete_link").on('click', function(){

                var id = $(this).attr("rel");

                var delete_url = "user.php?delete="+ id +" ";

                $(".modal_delete").attr("href", delete_url);

                $("#deleteModal").modal('show');

                
            })

        });

 </script>