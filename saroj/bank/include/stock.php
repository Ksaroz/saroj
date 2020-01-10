

<?php 

include("delete_modal.php");

?>

<span class="text-right"><h3>STOCKS</h3></span>
<form action="" method="post">
<table class="table table-bordered table-hover">

    

                            <thead>
                                <tr>
                                    
                                    <th>Donar</th>
                                    <th>Groups</th>
                                    <th>Status</th>
                                    <th>availaibility</th>
                                    <th colspan='3' class="text-center">Actions</th>
                                    <!-- <th>Date</th> -->
                                </tr>
                            </thead>

                        
                        <tbody>
                            
<?php 

$query = "SELECT * FROM donar WHERE donar_status = 'archived' ORDER BY donar_user_id DESC ";
$select_all_donar = mysqli_query($connection,$query);

while ($row = mysqli_fetch_assoc($select_all_donar)) {
$donar_id = $row['donar_id'];
$donar_user_id = $row['donar_user_id'];
$donar_blood_group = $row['donar_blood_group'];




// $user_date = $row['user_date'];


echo "<tr>";
?>



<?php

echo "<td><a href='manage.php?source=donar&$donar_id'>$donar_user_id</a></td>";
echo "<td>$donar_blood_group</td>";
echo "<td><select class='form-control'>
            <option value='InStock'>InStock</option>
            <option value='Issued'>Issue</option>
            </select></td>";

echo "<td>0</td>";



echo "<td><a href='manage.php?source=issue&r_id={$donar_user_id}'>Issue</a></td>";

echo "<td><a href='manage.php?source=reply&r_id={$donar_user_id}'>Reply</a></td>";

echo "<td><a rel='$donar_id' href='javascript: void(0)' class='delete_link'>Delete</a></td>";
// echo "<td><a href='manage.php?delete={$donar_id}'>Delete</a></td>";
echo "</tr>";

}


  ?>

                                
        </tbody>
    </table>


<?php 


deleteDonar();


 ?>

 <script type="text/javascript">
     
        $(document).ready(function(){

            $(".delete_link").on('click', function(){

                var id = $(this).attr("rel");

                var delete_url = "manage.php?source=donar&delete="+ id +" ";

                $(".modal_delete").attr("href", delete_url);

                $("#deleteModal").modal('show');

                
            })

        });

 </script>