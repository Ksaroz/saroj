
<?php 

        if(isset($_GET['r_id'])) {

          $the_user_id = $_GET['r_id'];
        
        
                  $query = "SELECT * FROM donar WHERE donar_user_id = $the_user_id";
                  $select_user = mysqli_query($connection,$query);

                  while($row = mysqli_fetch_assoc($select_user)) {
                    $donar_first_name =  $row['donar_first_name'];
                    $donar_email =       $row['donar_email'];
                    $donar_blood_group = $row['donar_blood_group'];
                }

                


if(isset($_POST['submit'])) {
  
  $donar_from = $_POST['donar_name'];
  $donar_email = $_POST['donar_email'];
    $donar_blood_group = $_POST['donar_blood_group'];
      $issue_date = date('d-m-y');
          $user_to_name = $_POST['user_to_name'];
            $user_to_email = $_POST['user_to_email'];
             $user_to_group = $_POST['user_to_group'];


$query ="INSERT INTO issue(issue_from,issue_from_email,issue_from_group,issue_date,issue_to,issue_to_email,issue_to_group)";
$query .="VALUES('{$donar_from}','{$donar_email}','{$donar_blood_group}',now(),'{$user_to_name}','{$user_to_email}','{$user_to_group}')";

$insert_blood_issue = mysqli_query($connection, $query);

confirmQuery($insert_blood_issue);



redirect('./manage.php?source=view_issue');

} 

} 

?>

<span class="text-right"><h3>BLOOD ISSUE FORM</h3></span>

<form action="" method="post">
      <div class="row">
   
    <div class="form-group col-md-4">
      <label for="inputEmail4">From:</label>
      <input type="text" name="donar_name" class="form-control" id="inputEmail4" placeholder="Donar Name" value="<?php echo $donar_first_name ?>">
    </div>
</div>
<div class="row"> 
    <div class="form-group col-md-4">
      <label for="inputEmail4">Email:</label>
      <input type="email" name="donar_email" class="form-control" id="inputEmail4" placeholder="Email" value="<?php echo $donar_email ?>">
    </div>
</div>
<div class="row"> 
    <div class="form-group col-md-4">
      <label for="inputEmail4">Blood Group:</label>
      <input type="text" name="donar_blood_group" class="form-control" id="inputEmail4" placeholder="Donar Blood Group" value="<?php echo $donar_blood_group ?>">
    </div>
</div>
  <div class="row">   
    <div class="form-group col-md-4">
      <label for="inputEmail4">To:</label>
      <input type="text" name="user_to_name" class="form-control" id="" placeholder="Request Name" value="">
    </div>
  </div>
  <div class="row">   
    <div class="form-group col-md-4">
      <label for="inputEmail4">Request Email:</label>
      <input type="email" name="user_to_email" class="form-control" id="" placeholder="Request Email" value="">
    </div>
  </div>
  <div class="row">   
    <div class="form-group col-md-4">
    <label for="inputEmail4">Request Blood Group:</label>
      <select id="bloodgroup" name="user_to_group" class="form-control">
        <option selected>Select</option>
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

  
  <button type="submit" name="submit" class="btn btn-primary">SUBMIT</button>
</form>



