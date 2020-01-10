
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
                            Welcome! 
                            <small><?php echo $_SESSION['username'] ?></small>
                        </h1>

                        <div class="col-xs-6">

    <?php 

    insert_categories();

    ?>
                                
                           


        <form action="" method="post">
            <div class="form-group">
                <label class="cat-title">Add Category</label>
                <input class="form-control" type="text" name="cat_title">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
            </div>
        </form>


<?php 
// UPDATE AN INCLUDE QUERY
if(isset($_GET['edit'])) {

    $cat_id = $_GET['edit'];

    include "include/update_categories.php";
}


?>
   


                     </div><!-- Add Category Form -->

                        <div class="col-xs-6">


                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                        <th colspan='2' class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

<?php 
//FIND ALL CATEGORIES
findAllCategories(); 
?>

<?php 
// DELETE QUERY
deleteCategories();
?>


                                    
                                </tbody>
                            </table>
                        </div>



                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


        








        

    </div>
    <!-- /#wrapper -->

   <?php include "include/admin_footer.php"; ?>