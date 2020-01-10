<!-- Page Content -->
 <?php 

        if(isset($_GET['p_id'])) {

          $the_post_id = $_GET['p_id'];
        }
        
                  $query = "SELECT * FROM post WHERE post_id = $the_post_id";
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
                <div class="card">
  <div class="card-body">
    <h3 class="card-title"><?php echo $post_title; ?></h3>
    <p class="">
    by <a href="index.php"><?php echo $post_author; ?></a>
    </p>
    <p class="card-text"><?php echo $post_content; ?></p>
    <p class="card-text"><small class="text-muted">Last updated <?php echo $post_date; ?></small></p>
  </div>
  <hr>
  <img src="../img/<?php echo $post_image; ?>" class="card-img-top img-responsive center-block" alt="Responsive image">
</div>
    
  
<?php }  ?>
   
 <hr>

                <!-- Posted Comments -->


<?php 

$query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
$query .= "AND comment_status = 'approved'";
$query .= "ORDER BY comment_id DESC ";

$select_comment_query = mysqli_query($connection, $query);

if(!$select_comment_query) {
  die("Query Failed" . mysqli_error($connection));
}

while ($row = mysqli_fetch_array($select_comment_query)) {
  $comment_id = $row['comment_id'];
  $comment_date = $row['comment_date'];
  $comment_content = $row['comment_content'];
  $comment_author = $row['comment_author'];
  ?>

<!-- Comment -->
                <div class="media comment-media">
                    <!-- <a class="pull-left" href="#">



                        <img class="media-object" img width='64' height='64' src="../../img/<?php echo $user_image ?>" alt="image">
                    </a> -->
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author  ?>
                            <small><?php echo $comment_date ?></small>
                        </h4>
                        <?php echo $comment_content ?>
                    </div>
                    <hr>
                </div>



<?php } ?>


               
                

      <!-- Blog Categories W