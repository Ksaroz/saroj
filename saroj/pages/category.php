<?php include "../include/db.php" ?>

<?php  ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Blood Bank | Category</title>
  <link rel="icon" href="../img/icon/drop.ico">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
<!-- FontAwesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<!--CSS stylesheet  -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
  <!-- Bootstrap Offline Css -->
  <link rel="stylesheet" type="text/css" href="../css/boot/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/user.css">
<!-- css from folders -->
  
<!-- jquery offline scripts -->
  <script type="text/javascript" src="../jquery/jquery.js"></script>
 <!-- Bootstrap Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body>
     
     <!-- User Navigation -->

<?php include "../include/user-navigation.php"; ?>

<!-- Page Content -->
<section class="title-card">

  <div class="container">

        <div class="row">
              
  
              <?php 

                if(isset($_GET['category'])){
                  $post_category = $_GET['category'];
                }
                  $query = "SELECT * FROM post WHERE category_id = $post_category";

                  $select_all_post = mysqli_query($connection,$query);

                  while ($row = mysqli_fetch_assoc($select_all_post)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];

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
    <p class="card-text"><?php echo $post_content; ?></p>
    <p class="card-text"><small class="text-muted">Last updated <?php echo $post_date; ?></small></p>
  </div>
  <hr>
  <a href="post.php?p_id=<?php echo $post_id; ?>"><img src="../img/<?php echo $post_image; ?>" class="card-img-top" alt="..."></a>
</div>
    
  </div> 
<?php } ?>
   

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
        
        <?php include "../include/footer.php"; ?>

    
    <!-- /.container -->

    <!-- jQuery -->
    

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

      

</body>

</html>