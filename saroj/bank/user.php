
<?php include "include/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->

<?php include "include/admin_navigation.php"; ?>



<!-- Categories -->





<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome! Admin
                            <small><?php echo $_SESSION['username'] ?></small>
                        </h1>

<?php 

if(isset($_GET['source'])) {

    $source = $_GET['source'];
} else {

    $source = '';
}


switch ($source) {
    case 'add_user':
        include "include/add_user.php";
        break;
    case 'edit_user':
        include "include/edit_user.php";
        break;
    case '200':
        echo "Nice 200";
        break;
    
    default:
        include "include/view_all_user.php";
        break;
}





 ?>
                        



                       
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

</div>
    <!-- /#wrapper -->
</div>

   <?php include "include/admin_footer.php"; ?>