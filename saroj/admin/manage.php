
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
    case 'reply':
        include "include/reply.php";
        break;
    case 'request':
        include "include/request.php";
        break;
    case 'stock':
        include "include/stock.php";
        break;
    case 'inquiry':
        include "include/inquiry.php";
        break;
    case 'feedback':
        include "include/feedback.php";
        break;
    case 'issue':
        include "include/issue_form.php";
        break;
    case 'edit_issue':
        include "include/edit_issue.php";
        break;
    case 'view_issue':
        include "include/view_issued_blood.php";
        break;
    case 'report':
        include "../reports/issue_report.php";
        break;
    
    default:
        include "include/view_all_donar.php";
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

   <?php include "include/admin_footer.php"; ?>