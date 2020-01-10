
<?php include "include/admin_header.php"; ?>


<?php 

if(isset($_SESSION['username'])) {

    $username = $_SESSION['username'];

    $query = "SELECT * FROM user where user_name = '{$username}' ";

    $select_user_profile_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_user_profile_query)) {

        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_password = $row['user_password'];
        $user_first_name = $row['user_first_name'];
        $user_last_name = $row['user_last_name'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];

    }

}


 ?>

<?php 

updateProfile();

 ?>




    <div id="wrapper">

        <!-- Navigation -->

<?php include "include/admin_navigation.php"; ?>








<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome! Admin
                            <small><?php echo $_SESSION['username'] ?></small>
                        </h1>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_name">UserName</label>
        <input type="text" class="form-control" name="user_name" value="<?php echo $user_name ?>">
    </div>
    <div class="form-group">
        <label for="user_first_name">First Name</label>
        <input type="text" class="form-control" name="user_first_name" value="<?php echo $user_first_name ?>">
    </div>
    <div class="form-group">
        <label for="user_last_name">Last Name</label>
        <input type="text" class="form-control" name="user_last_name" value="<?php echo $user_last_name ?>">
    </div>
    <!-- <div class="form-group">
        <select name="user_role" id="">
            <option value="User">Select Role</option>
            <option value="Admin">Admin</option>
            <option value="User">User</option>
            <option value="Blood Bank">Blood Bank</option>
            


        </select>

        </div> 
     -->
    
    <!-- <div class="form-group">
        <label for="images">Post Image</label>
        <input type="file"  name="images">
    </div> -->
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email ?>">
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password" value="<?php echo $user_password ?>">
    </div>
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="profile" value="Update">
    </div>
</form>



                        



                       
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

</div>
    <!-- /#wrapper -->

   <?php include "include/admin_footer.php"; ?>