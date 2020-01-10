<?php 
$sql2="SELECT * FROM comments WHERE comment_notify = 0";
  $result=mysqli_query($connection, $sql2);
  $count=mysqli_num_rows($result);
 ?>



<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="../img/logo/logo.png" width="50" height="35" alt="logo"></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li> -->
               
                    
                    <!-- <div>
               <button id="notification-icon" name="button" onclick="myFunction()" class="dropdown-toggle"><span id="notification-count"><?php if($count>0) { echo $count; } ?></span><i class="fa fa-fw fa-envelope"></i></button>
                 <div id="notification-latest"></div>
                </div>   -->


            <!-- <div class="input-group mb-3">
  <div class="input-group-prepend">
    <button id="notification-icon" name="button" onclick="myFunction()" class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span id="notification-count"><?php if($count>0) { echo $count; } ?></span><i class="fa fa-fw fa-envelope"></i></button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="#"><div id="notification-latest"></div></a> -->
      <!-- <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
      <div role="separator" class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Separated link</a> -->
    <!-- </div>
  </div>
  
</div> -->



 <li class="dropdown">
 <a id="notification-icon" name="button" onclick="myFunction()" class="dropdown-toggle" data-toggle="dropdown"><span id="notification-count"><?php if($count>0) {echo $count;} ?></span><i class="fa fa-bell"></i><b class="caret"></b></a>
      <ul class="dropdown-menu alert-dropdown">
        <li>
        <a href="comment.php"><div id="notification-latest"></div></a>
        
        </li>
    </ul>
     </li>



                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $_SESSION['username'] ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="./profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../pages/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li> 
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fas fa-tachometer-alt fa-2x"></i> Dashboard</a>
                    </li>
                    <!-- <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li> -->
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#post-dropdown"><i class="fab fa-usps fa-2x"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="post-dropdown" class="collapse">
                            <li>
                                <a href="./post.php">View All Posts</a>
                            </li>
                            <li>
                                <a href="post.php?source=add_post">Add Post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../admin/categories.php"><i class="fas fa-sitemap fa-2x"></i> Categories</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fas fa-users fa-2x"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="users" class="collapse">
                            <li>
                                <a href="./user.php">View All Users</a>
                            </li>
                            <li>
                                <a href="user.php?source=add_user">Add User</a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="comment.php"><i class="fas fa-comments fa-2x"></i> Comments</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#manage"><i class="fas fa-tasks fa-2x"></i> Manage <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="manage" class="collapse">
                        <li><a href="manage.php?source=donar">Donar</a></li>
                        <li><a href="manage.php?source=request">Request</a></li>
                        <li><a href="manage.php?source=stock">Stocks</a></li>
                        <li><a href="manage.php?source=view_issue">Issue</a></li>
                        <li><a href="manage.php?source=inquiry">Inquiry</a></li>
                        <li><a href="manage.php?source=feedback">Feedback</a></li>                      

                        </ul>
                        
                    </li>
                     <li>
                        <a href="profile.php"><i class="fas fa-id-card fa-2x"></i> Profile</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
