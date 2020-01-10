<section class="container">
  <div class="row"> 

<?php 

        if(isset($_GET['r_id'])) {

          $the_user_id = $_GET['r_id'];
        
        
                  $query = "SELECT * FROM donar WHERE donar_user_id = $the_user_id";
                  $select_user_email = mysqli_query($connection,$query);

                  while ($row = mysqli_fetch_assoc($select_user_email)) {
                    $user_email = $row['donar_email'];

                }

                $query = "SELECT * FROM request WHERE req_user_id = $the_user_id";
                  $select_user_email = mysqli_query($connection,$query);

                  while ($row = mysqli_fetch_assoc($select_user_email)) {
                    $user_email = $row['req_email'];

                }

                $query = "SELECT * FROM inquiry WHERE inq_user_id = $the_user_id";
                  $select_user_email = mysqli_query($connection,$query);

                  while ($row = mysqli_fetch_assoc($select_user_email)) {
                    $user_email = $row['inq_email'];

                }





if(isset($_POST['reply'])) {
  if(mail($_POST['email'], $_POST['subject'], $_POST['message'])) {
    echo "mail sent";
  }else{
    echo "failed";
  }

// $reply_description = $_POST['reply_description'];

// $query = "UPDATE donar SET donar_reply = '{$reply_description}' WHERE donar_user_id = $the_donar_id";
// $result = mysqli_query($connection, $query);
// confirmQuery($result);

redirect('./manage.php');

} 

} 

?>

<span class="text-right"><h3>REPLY</h3></span>
<form action="" method="post">
      <div class="row">
   
    <div class="form-group col-md-4">
      <label for="inputEmail4">Email:</label>
      <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" value="<?php echo $user_email ?>">
    </div>
  </div>
  <div class="row">   
    <div class="form-group col-md-4">
      <label for="inputEmail4">Subject:</label>
      <input type="text" name="subject" maxlength="50" class="form-control" id="" placeholder="Subject" value="">
    </div>
  </div>
  <div class="row"> 
    <div class="form-group col-md-6">

  <div class="form-group">
    <label for="Textarea">Message:</label>
    <textarea name="message" class="form-control" name="textarea" id="Textarea" rows="6"></textarea>
  </div>
    </div>
  </div>
  <button type="submit" name="reply" class="btn btn-primary">SEND</button>
</form>
</div>
</section>

