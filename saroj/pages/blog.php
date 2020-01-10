<section id="news" class="container mb-5">
  <div class="row ">
    <div class="col-md-12">
      <div class="card-deck border-primary mb-3">
        <?php
        $query = "SELECT * FROM post ORDER BY post_id DESC LIMIT 4 ";
        $select_post_blog = mysqli_query($connection, $query);
        confirmQuery($select_post_blog);
        while ($row = mysqli_fetch_assoc($select_post_blog)) {
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_comment = $row['post_comment_count'];
        ?>
        <div class="card blog-card">
          <img class="card-img-top" src="./img/<?php echo $post_image; ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><?php echo $post_title ?></h5>
            <p class="card-text"><?php echo $post_content; ?></p>
            <p class="card-text"><small class="text-muted">Post Date: <?php echo  $post_date ?></small></p>
            <p class="card-text"><small class="text-muted">Post Comment: <?php echo  $post_comment ?></small></p>
          </div>
        </div>
        <?php } ?>
        
      </div>
    </div>
  </div>
</section>