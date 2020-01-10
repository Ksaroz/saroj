<?php 

include("delete_modal.php");

if(isset($_POST['checkBoxArray'])) {


    foreach($_POST['checkBoxArray'] as $userValueId ){

       $bulk_options = $_POST['bulk_options'];

            switch ($bulk_options) {
                
                case 'Pending':
                $query = "UPDATE issue SET issue_status = '{$bulk_options}' WHERE issue_id = {$userValueId}";

                $issue_status = mysqli_query($connection, $query);
                confirmQuery($issue_status);
                break;

                case 'Archived':
                $query = "UPDATE issue SET issue_status = '{$bulk_options}' WHERE issue_id = {$userValueId}";

                $issue_status = mysqli_query($connection, $query);
                confirmQuery($issue_status);
                break;

                // case 'Report':
                // <a href='../fpdf/issueSingleReport.php?report={$userValueId}'>Report</a>
                // break;

                case 'delete':
                $query = "DELETE FROM issue WHERE issue_id = {$userValueId}";

                $delete_issue = mysqli_query($connection, $query);
                confirmQuery($delete_issue);
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
            <option value="Pending">Pending</option>
            <option value="Archived">Archived</option>
            <option value="Report">Report</option>
             <option value="delete">Delete</option>
            </select>

            </div>

        <div class="col-xs-4">
            
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <!-- <a class="btn btn-primary" href="user.php?source=add_user">Add New</a> -->

        </div>

<span class="text-right"><h3>ISSUE BLOOD</h3></span>

                            <thead>
                                <tr>
                                    <th><input id="selectAllPost" type="checkbox"></th>
                                    <th>Id</th>
                                    <th>Donar Name</th>
                                    <th>Donar Email</th>
                                    <th>Donar_Group</th>
                                    <th>Issue_Date</th>
                                    <th>Request Name</th>
                                    <th>Request Email</th>
                                    <th>Request Group</th>
                                    <th>Status</th>
                                    <!-- <th colspan='3' class="text-center">Change Role</th> -->
                                    <th colspan='3' class="text-center">Actions</th>

                                    <!-- <th>Date</th> -->
                                </tr>
                            </thead>

                        
                        <tbody>
                            
<?php 

$query = "SELECT * FROM issue ORDER BY issue_id DESC ";
$select_users = mysqli_query($connection,$query);

while ($row = mysqli_fetch_assoc($select_users)) {
$issue_id = $row['issue_id'];
$issue_from = $row['issue_from'];
$issue_from_email = $row['issue_from_email'];
$issue_from_group = $row['issue_from_group'];
$issue_date = $row['issue_date'];
$issue_to = $row['issue_to'];
$issue_to_email = $row['issue_to_email'];
$issue_to_group = $row['issue_to_group'];
$issue_status = $row['issue_status'];


// $user_date = $row['user_date'];
echo "<tr>";
?>

<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value="<?php echo $issue_id ?>"></td>

<?php


echo "<td>$issue_id</td>";
echo "<td>$issue_from</td>";
echo "<td>$issue_from_email</td>";
echo "<td>$issue_from_group</td>";
echo "<td>$issue_date</td>";
echo "<td>$issue_to</td>";
echo "<td>$issue_to_email</td>";
echo "<td>$issue_to_group</td>";
echo "<td>$issue_status</td>";

// echo "<td>$user_date</td>";




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

echo "<td><a href='../fpdf/issueSingleReport.php?report={$issue_id}'>Report</a></td>";

echo "<td><a href='manage.php?source=edit_issue&edit_issue={$issue_id}'>Edit</a></td>";

echo "<td><a rel='$issue_id' href='javascript: void(0)' class='delete_link'>Delete</a></td>";
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