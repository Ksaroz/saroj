

 <?php include "user_header.php"; ?>    
     <!-- User Navigation -->

<?php include "user-navigation.php"; ?>





<?php 

// if(isset($_GET['source'])) {

//     $source = $_GET['source'];
// } else {

//     $source = '';
// }


// switch ($source) {
//     case 'profile':
//         include "profile.php";
//         break;
//     case 'donar':
//         include "donation.php";
//         break;
//     case 'reuest':
//         echo "request.php";
//         break;
//     case 'inquiry':
//         echo "inquiry.php";
//         break;
//     case 'feedback':
//         echo "feedback.php";
//         break;
    
//     default:
//         include "user.php";
//         break;
// }


 ?>


<!-- Page Content -->
<section class="">

  <div class="container">



    <div class="form-row">
      
              <?php 
                  $query = "SELECT * FROM post";
                  $select_all_post = mysqli_query($connection,$query);

                  while ($row = mysqli_fetch_assoc($select_all_post)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content =  substr($row['post_content'],0,100);
                    $post_status = $row['post_status'];

                    if($post_status == 'Active') {



                    ?>


            <!-- Blog Entries Column -->
           

    
             <div class="col-md-8">

    <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <div class="card">
  <div class="card-body">
    <h5 class="card-title">
      <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
    </h5>
    <p class="">
    by <a href="index.php"><?php echo $post_author; ?></a>
    </p>
    <p class="card-text"><?php echo $post_content; ?>
      <form class="form-group">
    <a class="btn btn-primary" type="submit" name="submit" href="post.php?p_id=<?php echo $post_id; ?>">Read More</a>
</form>
    </p>
    <p class="card-text"><small class="text-muted">Last updated <?php echo $post_date; ?></small></p>
  </div>
  <hr>
  <a href="post.php?p_id=<?php echo $post_id; ?>"><img src="../../img/<?php echo $post_image; ?>" class="card-img-top" alt="..."></a>
</div>
</div> 


<?php } } ?>

</div>
</div> 
</section>



 

               
<section class="container">

  <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
      <!-- Pager -->
      <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>

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