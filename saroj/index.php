<?php include "include/index_head.php"; ?>
<section id="title" class="mb-5">
  
  <div class="container-fluid">
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
      <!-- <a class="navbar-brand" href="">Blood Bank</a> -->
      <a class="navbar-brand" href="index.php">
        <img src="img/logo/logo.png" width="110" height="90" alt="logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Welcome</a>
          </li>
          <li clas s="nav-item">
            <a class="nav-link" href="#news">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/register.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <!-- Title -->
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div>
          <img class="title-image" src="img/drop.png" alt="drop">
        </div>
        
        <h1>Are you ready to donate?</h1>
        
      </div>
      <!-- <div class="col-lg-6">
        <h1>Are you ready to donate?</h1>
      </div> -->
      
      <div class="col-lg-6 mb-3">
        <!--************** Carousel ****************** -->
        <div class="bd-example">
          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/slides/welcome.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5><!-- Welcome !!! --></h5>
                  <p class="text-danger font-weight-bold">Welcome To Blood Bank Management System</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="img/slides/blood6.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block text-dark">
                  <h5 class="font-weight-bolder">Donate Your Blood!!</h5>
                  <p>"If you’re a blood donor, you’re a hero to someone, somewhere, who received your gracious gift of life."</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="img/slides/blood7.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block text-dark">
                  <h5 class="font-weight-bolder">Save Life !!!</h5>
                  <p class="slide_para">“To give blood you need neither extra strength nor extra food, and you will save a life.”</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</section>
<!-- News cards -->
<?php include "pages/blog.php"; ?>
<!-- News Headings -->
<?php include "pages/about.php"; ?>
<!-- footer -->
<?php include "include/footer.php"; ?>
</body>
</html>