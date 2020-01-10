<?php include "user_header.php"; ?>

<?php include "user-navigation.php"; ?>

<link rel="stylesheet" type="text/css" href="../../css/user_profile.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="row">

<?php 


if(isset($_SESSION['user_id'])){


  $the_edit_user_id = $_SESSION['user_id'];

  $query = "SELECT * FROM user WHERE user_id = $the_edit_user_id";
$select_users_query = mysqli_query($connection,$query);

while ($row = mysqli_fetch_assoc($select_users_query)) {
$user_id = $row['user_id'];
$user_create_id = $row['user_create_id'];
$user_name = $row['user_name'];
$user_password = $row['user_password'];
$user_first_name = $row['user_first_name'];
$user_last_name = $row['user_last_name'];
$user_dob = $row['user_dob'];
$user_blood_group = $row['user_blood_group'];
$user_email = $row['user_email'];
$user_address = $row['user_address'];
$user_city = $row['user_city'];
$user_zip = $row['user_zip'];
$user_country = $row['user_country'];
$user_phone = $row['user_phone'];
$user_image = $row['user_image'];
$user_role = $row['user_role'];
$user_bio = $row['user_bio'];
}

if(isset($_POST['update_profile'])) {

// $user_id = $row['user_id'];
$user_name = $_POST['user_name'];
$user_password = $_POST['user_password'];
$user_first_name = $_POST['user_first_name'];
$user_last_name = $_POST['user_last_name'];
$user_blood_group = $_POST['user_blood_group'];
$user_dob = $_POST['user_dob'];
$user_email = $_POST['user_email'];
$user_address = $_POST['user_address'];
$user_city = $_POST['user_city'];
$user_zip = $_POST['user_zip'];
$user_country = $_POST['user_country'];
$user_phone = $_POST['user_phone'];
$user_bio = $_POST['user_bio'];
$user_image = $_FILES['images']['name'];
$user_image_temp = $_FILES['images']['tmp_name'];



move_uploaded_file($user_image_temp, "../../img/$user_image");

if(empty($user_image)) {

 $query = "SELECT * FROM user WHERE user_id = $the_edit_user_id";
 $select_image = mysqli_query($connection,$query);

 while($row = mysqli_fetch_array($select_image)){

   $user_image = $row['user_image'];
 }
}


// $query = "SELECT user_rand_salt FROM user";
//  $select_randsalt_query = mysqli_query($connection, $query);
//  if(!$select_randsalt_query) {
//  die("Query Failed" . mysqli_error($connection));
//  }

// $row = mysqli_fetch_array($select_randsalt_query);

//   $salt = $row['user_rand_salt'];

//   $hashed_password = crypt($user_password, $salt);





  $query = "UPDATE user SET ";
  $query .= "user_name = '{$user_name}',";
  $query .= "user_password = '{$user_password}',";
  $query .= "user_first_name = '{$user_first_name}',";
  $query .= "user_last_name = '{$user_last_name}',";
  $query .= "user_blood_group = '{$user_blood_group}',";
  $query .= "user_dob = '{$user_dob}',";
  $query .= "user_email = '{$user_email}',";
  $query .= "user_address = '{$user_address}',";
  $query .= "user_city = '{$user_city}',";
  $query .= "user_zip = '{$user_zip}',";
  $query .= "user_country = '{$user_country}',";
  $query .= "user_phone = '{$user_phone}',";
  $query .= "user_image = '{$user_image}',";
  $query .= "user_bio = '{$user_bio}'";
  $query .= "WHERE user_id = {$the_edit_user_id}";


$update_query = mysqli_query($connection,$query);
confirmQuery($update_query);

header("Location: profile.php");

}

}

 ?>

<div class="col-lg-4">
<div class="card card-profile">
<div style="background-image: url(https://demo.bootstrapious.com/admin-premium/1-4-5/img/photos/paul-morris-116514-unsplash.jpg);" class="card-header"></div>
<div class="card-body text-center"><img src="../../img/<?php echo $user_image ?>" class="card-profile-img" alt="image">

  
  <!-- <div class="form-group">
    <img width="100" >
  </div> -->
  <h3 class="mb-3"><?php echo $user_first_name ?></h3>
  <p class="mb-4"><?php echo $user_bio ?></p>
    <!-- <button class="btn btn-outline-dark btn-sm"><span class="fa fa-twitter"></span></button> -->
</div>
</div>
<!-- <div class="card">
<div class="card-body">
  <div class="media"><span style="background-image: url(../../img/<?php echo $user_image ?>)" class="avatar avatar-xl mr-3"></span>
    <div class="media-body">
      <h4><?php echo $user_name ?></h4>
      <p class="text-muted mb-0"><?php echo $user_first_name ?></p>
      <ul class="social-links list-inline mb-0 mt-2">
        <li class="list-inline-item"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" data-original-title="Nathan's Facebook"><i class="fa fa-facebook"></i></a></li>
        <li class="list-inline-item"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" data-original-title="@nathan_andrews"><i class="fa fa-twitter"></i></a></li>
        <li class="list-inline-item"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" data-original-title="+420777555987"><i class="fa fa-phone"></i></a></li>
        <li class="list-inline-item"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" data-original-title="@nathan"><i class="fa fa-skype"></i></a></li>
      </ul>
    </div>
  </div>
</div>
</div> -->

<form class="card" action="" method="post" enctype="multipart/form-data">
<div class="card-header">
  <h3 class="card-title">My Profile</h3>
</div>
<div class="card-body">
  <div class="row mb-3">
    <div class="col-auto d-flex align-items-center"><span style="background-image: url(../../img/<?php echo $user_image ?>)" class="avatar avatar-lg"></span></div>
    <div class="col">
      <div class="form-group">
        <!-- <label class="form-label">Name:</label> -->
       <span class="font-weight-bolder h4"><?php echo $user_first_name ?></span>
       <span class="font-weight-bolder h4"><?php echo $user_last_name ?></span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label class="form-label font-weight-bolder">Bio:</label>
    <span><?php echo $user_bio ?></span>
  </div>
   <div class="form-group">
    <label class="form-label font-weight-bolder">DOB:</label>
    <span><?php echo $user_dob ?></span>
  </div>
  <div class="form-group">
    <label class="form-label font-weight-bolder">Blood Group:</label>
    <span><?php echo $user_blood_group ?></span>
  </div>
  <div class="form-group">
    <label class="form-label font-weight-bolder">Email:</label>
    <span><?php echo $user_email ?></span >
  </div>
    <div class="form-group">
    <label class="form-label font-weight-bolder">Contact:</label>
    <span><?php echo $user_phone ?></span >
  </div>
  <div class="form-group">
    <label class="form-label font-weight-bolder">Country:</label>
    <span><?php echo $user_country ?></span>
  </div>
  <div class="form-group">
    <label class="form-label font-weight-bolder">City:</label>
    <span><?php echo $user_city ?></span>
  </div>
</div>
<!-- <div class="card-footer text-right">
  <button name="update_profile" class="btn btn-primary">Save</button>
</div> -->
</form>
</div>
<div class="col-lg-8">
<div class="card">

<form class="card" role="form" autocomplete="off" action="" method="post" enctype="multipart/form-data">
<div class="card-body">
  <h3 class="card-title">Edit Profile</h3>
  <div class="row">
    <div class="col-sm-6 col-md-6">
      <div class="form-group mb-4">
        <label class="form-label">Username</label>
        <input type="text" name="user_name" placeholder="Username" value="<?php echo $user_name ?>" class="form-control">
      </div>
    </div>
    <div class="col-sm-6 col-md-6">
      <div class="form-group mb-4">
        <label class="form-label">Password</label>
        <input type="password" name="user_password" placeholder="Password" value="<?php echo $user_password ?>" class="form-control">
      </div>
    </div>
        <div class="col-sm-6 col-md-6">
      <div class="form-group mb-4">
        <label class="form-label">First Name</label>
        <input type="text" name="user_first_name" placeholder="First name" class="form-control" value="<?php echo $user_first_name ?>">
      </div>
    </div>
    <div class="col-sm-6 col-md-6">
      <div class="form-group mb-4">
        <label class="form-label">Last Name</label>
        <input type="text" name="user_last_name" placeholder="Last Name" class="form-control" value="<?php echo $user_last_name ?>">
      </div>
    </div>
    <div class="col-sm-6 col-md-4">
      <div class="form-group mb-4">
        <label class="form-label">Email address</label>
        <input type="email" name="user_email" placeholder="Email" class="form-control" value="<?php echo $user_email ?>">
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="form-group mb-4">
        <label class="form-label">Contact:</label>
        <input type="text" name="user_phone" placeholder="Phone Number" class="form-control" value="<?php echo $user_phone ?>">
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="form-group mb-4">
        <label class="form-label">DOB:</label>
        <input type="date" name="user_dob" placeholder="Date Of Birth" class="form-control" value="<?php echo $user_dob ?>">
      </div>
    </div>
    <div class="col-sm-6 col-md-2">
      <div class="form-group mb-4">
        <label class="form-label">Group:</label>
        <select id="bloodgroup" name="user_blood_group" class="form-control">
        <option selected><?php echo $user_blood_group ?></option>
        <option>A(+)</option>
        <option>A(-)</option>
        <option>B(+)</option>
        <option>B(-)</option>
        <option>O(+)</option>
        <option>O(-)</option>
        <option>AB(+)</option>
        <option>AB(-)</option>
      </select>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group mb-4">
        <label class="form-label">Address</label>
        <input type="text" name="user_address" placeholder="Home Address" class="form-control" value="<?php echo $user_address ?>">
      </div>
    </div>
    <div class="col-sm-6 col-md-4">
      <div class="form-group mb-4">
        <label class="form-label">City</label>
        <input type="text" name="user_city" placeholder="City" class="form-control" value="<?php echo $user_city ?>">
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="form-group mb-4">
        <label class="form-label">ZIP</label>
        <input type="number" name="user_zip" placeholder="ZIP" class="form-control" value="<?php echo $user_zip ?>">
      </div>
    </div>
    <div class="col-md-5">
      <div class="form-group mb-4">
        <label class="form-label">Country</label>
        <select name="user_country" class="form-control custom-select">
          <option value=""><?php echo $user_country ?></option>
          <option value="India">India</option>
          <option value="Nepal">Nepal</option>
        </select>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group mb-3">
        <label class="form-label">About Me:</label>
        <textarea rows="5" placeholder="Here can be your description" name="user_bio" class="form-control"><?php echo $user_bio ?></textarea>
      </div>
    </div>
    <div class="col-sm-6 col-md-6 mb-3">
       <div class="form-group">
        <label class="form-label">Upload Image:</label>
    <input type="file"  name="images" value="<?php echo $user_image ?>">
  </div>
</div>
</div>
  <button type="submit" name="update_profile" class="btn btn-primary form-control">Update Profile</button>
</div>
</form>
</div>
</div>
</div>
</div>




<?php include "../../include/footer.php"; ?>