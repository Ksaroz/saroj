<section> 
    
            <div class="col-md-4 form-group">

            <div class="card border-dark mb-3" style="width: 20rem;">
            <div class="card-body">
                <form class="form-inline my-2 my-lg-0" role="form" autocomplete="off" action="search.php" method="post">
        <input name="search" class="form-control mr-sm-0" type="search" placeholder="Search" aria-label="Search">
          <button name="submit" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
  </div>
</div>



              
                <!-- Blog Categories Well -->
                <div class="sidebar">
                
                <?php 
                $query = "SELECT * FROM categories";
                $select_all_categories_query = mysqli_query($connection,$query);

                ?>
 
            <!-- Blog Entries Column -->
                            

                        <div class="card border-primary mb-3" style="width: 20rem;">
                        <div class="card-body">
                        <h4 class="card-title">Blog Categories</h4>
                        <hr>
                        <ul class="list-group">
         
<?php 

            while ($row = mysqli_fetch_assoc($select_all_categories_query)) {

                $cat_title = $row['category_title'];
                $cat_id = $row['cat_id'];

                echo "<li class='list-group-item'><a href='category.php?category=$cat_id' class='card-link'>{$cat_title}</a></li>";
            }

         ?>

               </ul>
            </div>
            </div>

            
            </div>    
            <div class="card border-danger mb-3" style="width: 20rem;">

        <?php 

            $query = "SELECT * FROM post WHERE post_status = 'Emergency' Limit 1";
            $select_post_emergency_query = mysqli_query($connection,$query);

            confirmQuery($select_post_emergency_query);

         ?>
  <div class="card-header"><h3>Emergency</h3></div>
  <div class="card-body text-danger">
    <?php 

            while ($row = mysqli_fetch_assoc($select_post_emergency_query)) {

                $post_title = substr($row['post_title'],0,30);
                $post_content = substr($row['post_content'],0,90);

                
            }

         ?>
    <h5 class="card-title"><?php echo $post_title ?></h5>
    <p class="card-text"><?php echo $post_content ?></p>
  </div>
</div>        

</div>
      </section>