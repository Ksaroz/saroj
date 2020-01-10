<?php include "user_header.php"; ?>
     
     <!-- User Navigation -->

<?php include "user-navigation.php"; ?>

<!-- Page Content -->
<section class="title-card">

  <div class="container">

        <div class="row">

           <!-- Blog Entries Column -->
            <div class="col-md-8">
    

              <?php 

        if(isset($_GET['p_id'])) {

          $the_post_id = $_GET['p_id'];
        }
        
                  $query = "SELECT * FROM post WHERE post_id = $the_post_id ORDER BY post_id DESC";
                  $select_all_post = mysqli_query($connection,$query);

                  while ($row = mysqli_fetch_assoc($select_all_post)) {
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];


                    ?>


           

    <!-- <h1 class="page-header">
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
  <?php }  ?>  
  </div> 
<?php include "sidebar.php"; ?>
</div>









                    
    



 <!-- Blog Comments -->

 <?php 

 if(isset($_SESSION['user_id'])){


  $the_user_id = $_SESSION['user_id'];

  $query = "SELECT * FROM user WHERE user_id = $the_user_id";
$select_users_query = mysqli_query($connection,$query);

while ($row = mysqli_fetch_assoc($select_users_query)) {
$user_id = $row['user_id'];
$user_first_name = $row['user_first_name'];
$user_email = $row['user_email'];
$user_image = $row['user_image'];

}

if(isset($_POST['create_comment'])) { 

$the_post_id = $_GET['p_id'];

// $comment_author = $_POST['comment_author'];
// $comment_email = $_POST['comment_email'];
$comment_content = $_POST['comment_content'];


$query = "INSERT INTO comments(comment_user_id,comment_post_id,comment_author,comment_email,comment_content,comment_date)";

$query .= "VALUES ($user_id,$the_post_id ,'{$user_first_name}', '{$user_email}', '{$comment_content}',now())";

$comment_insert_query = mysqli_query($connection,$query);

if(!$comment_insert_query) {
  die("Query Failed" . mysqli_error($connection));
}


// $query = "UPDATE post SET post_comment_count = post_comment_count + 1 ";
// $query .= "WHERE post_id = $the_post_id";

// $update_comment_count = mysqli_query($connection,$query);



}
}

  ?>

                <!-- Comments Form -->
                <div class="comment">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" class="form-comment">
                        <!-- <div class="form-group">
                          <label for="author">Full Name</label>
                        <input type="text" class="form-control" name="comment_author">
                          </div>
                          <div class="form-group">
    <label for="comment-email">Email address</label>
    <input type="email" class="form-control" id="comment-email" name="comment_email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div> -->
                          <div class="form-group">
    <label for="comment_content">Your Comment</label>
    <textarea class="form-control" name="comment_content" id="commentTextarea" rows="5"></textarea>
  </div>
                        <button type="submit"  name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>


                <!-- Posted Comments -->


<?php 

$query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
$query .= "AND comment_status = 'Approved'";
$query .= "ORDER BY comment_id DESC ";

$select_comment_query = mysqli_query($connection, $query);

if(!$select_comment_query) {
  die("Query Failed" . mysqli_error($connection));
}

while ($row = mysqli_fetch_array($select_comment_query)) {
  $comment_date = $row['comment_date'];
  $comment_content = $row['comment_content'];
  $comment_author = $row['comment_author'];
  
  ?>

<!-- Comment -->
                <div class="media comment-media">
                    <a class="pull-left" href="#">
                        <img class="media-object" img width='64' height='64' src="../../img/<?php echo $user_image ?>" alt="image">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author  ?>
                            <small><?php echo $comment_date ?></small>
                        </h4>
                        <?php echo $comment_content ?>
                    </div>
                </div>



<?php } ?>
            
                

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