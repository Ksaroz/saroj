
<?php include "user_header.php"; ?>




     
     <!-- User Navigation -->

<?php include "user-navigation.php"; ?>

<!-- Page Content -->
<section class="title-card">

  <div class="container">

        <div class="row">

          <div class="col-md-8">
    

              <?php 

        global $connection;
       if (isset($_POST['submit'])) {
         $search = $_POST['search'];

         $query = "SELECT * FROM post WHERE post_tags LIKE '%$search%'";

         $search_query = mysqli_query($connection, $query);

         if (!$search_query) {
           die("Query Failed". mysqli_error($connection));
         }

         $count = mysqli_num_rows($search_query);
         if ($count == 0) {
           echo "<h1 class='text-center text-danger'>NO RESULT!!!</h1>";
         } else {
                  while ($row = mysqli_fetch_assoc($search_query)) {
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];

                    ?>


            <!-- Blog Entries Column -->
            

   <!--  <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1> -->

                <!-- First Blog Post -->
    <div class="card border-dark mb-3">
  <div class="card-body">
    <h5 class="card-title"><?php echo $post_title; ?></h5>
    <p class="">
    by <a href="index.php"><?php echo $post_author; ?></a>
    </p>
    <p class="card-text"><?php echo $post_content; ?></p>
    <p class="card-text"><small class="text-muted">Last updated <?php echo $post_date; ?></small></p>
  </div>
  <hr>
  <img src="../../img/<?php echo $post_image; ?>" class="card-img-top" alt="...">
</div>
    
 <?php } 

         }
       }
  ?>
</div>  
<?php include "sidebar.php"; ?>
</div>
</div> 


</section>

               
                

      <!-- Blog Categories Well -->
                

      
        

       

        <!-- Footer -->
        
        <?php include "../../include/footer.php"; ?>

    
    <!-- /.container -->

    <!-- jQuery -->
    

    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>

      

</body>

</html>