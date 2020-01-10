
 <?php include "user_header.php"; ?>    
     <!-- User Navigation -->

<?php include "user-navigation.php"; ?>


<!-- Page Content -->
<section class="">

  <div class="container">



    <div class="form-row">
          <div class="col-md-8">
      
              <?php 

              $per_page = 5;

                if(isset($_GET['page'])) {

                  $page = $_GET['page'];
                }else {
                  $page = "";
                }

                  if($page == "" || $page == 1) {

                    $page_1 = 0;
                  }else {
                    
                    $page_1 = ($page * $per_page) - $per_page;
                  }


            $select_post_query_count = "SELECT * FROM post WHERE post_status = 'Active'";
            $find_count = mysqli_query($connection,$select_post_query_count);
            $count = mysqli_num_rows($find_count);

            if($count < 1) {

              echo "<h1 class='text-danger text-center'>SORRY!! NO POST AVAILABLE</h1>";
            }else {

            $count = ceil($count / 2);

                


                  $query = "SELECT * FROM post ORDER BY post_id DESC LIMIT $page_1, $per_page";
                  $select_all_post = mysqli_query($connection,$query);

                  while ($row = mysqli_fetch_assoc($select_all_post)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content =  substr($row['post_content'],0,100);
                    $post_status = $row['post_status'];

                    ?>

                <!-- First Blog Post -->
                <div class="card border-dark mb-3">
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

<?php } } ?>

</div> 
<?php include "sidebar.php"; ?>
</div>
</div> 
</section>



 

               
<section class="container">

  <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
      <!-- Pager -->
      <nav aria-label="Page navigation example" id="pagination">
  <ul class="pagination justify-content-center">
  <li class="page-item"><a class="page-link" href="user.php?page=<?php echo $page-1 ?>">Previous</a></li>
    <?php 

      for($i = 1; $i <= $count; $i++) {

        echo "<li class='page-item'><a class='page-link' href='user.php?page={$i}'>$i</a></li>";

      }
    ?>
    <li class="page-item"><a class="page-link" href="user.php?page=<?php echo $page+1 ?>">Next</a></li>
  </ul>
</nav>

  </div>
</div>

  </section>
      
        <?php include "../../include/footer.php"; ?>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>

      

</body>

</html>