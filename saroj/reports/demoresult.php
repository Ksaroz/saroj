<?php

$name = $_POST['checkBoxArray[]'];

if(isset($_POST['checkBoxArray[]'])){

// optional
echo "You chose the following color(s): <br>";

foreach ($name as $color){ 
    echo $color."<br />";
}
}else {
	echo "not selected";
}

?>
