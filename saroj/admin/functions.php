<?php 

/********************************/
/*Query Confirmation*/

function confirmQuery($result) {
    global $connection;
    if(!$result) {
    die("Query Failed" . mysqli_error($connection));
}

}


/******************************************/
/* Category Section function */

function insert_categories() {

	global $connection;

if(isset($_POST['submit'])) {

        $cat_title = $_POST['cat_title'];

        if($cat_title == "" || empty($cat_title)) {

            echo "This field should not be empty";
        }else {

            $query = "INSERT INTO categories(category_title)";
            $query .= "VALUES('{$cat_title}')";

            $create_category_query = mysqli_query($connection, $query);


            if(!$create_category_query) {
                die('Query Failed' . mysqli_error($connection));
            }else {
            	header("Location: categories.php");
            }
        }                       

    } 

}


function findAllCategories() {
	global $connection;

$query = "SELECT * FROM categories";
$select_categories = mysqli_query($connection,$query);

while ($row = mysqli_fetch_assoc($select_categories)) {
$cat_id = $row['cat_id'];
$cat_title = $row['category_title'];

echo "<tr>";
echo "<td>{$cat_id}</td>";
echo " <td>{$cat_title}</td>";
echo " <td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
echo " <td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
echo "<tr>";
}
}

function deleteCategories() {
	global $connection;

	if(isset($_GET['delete'])) {
    $del_cat_id = $_GET['delete'];

    $query = "DELETE FROM categories WHERE cat_id={$del_cat_id}";
        $delete_query = mysqli_query($connection,$query);

        header("Location: categories.php");
}

}

/********************************************/
/* Post section Functions */

function deletePost() {
    global $connection;
    if(isset($_GET['delete'])) {

    $del_post_id = $_GET['delete'];

    $query = "DELETE FROM post WHERE post_id={$del_post_id}";
        $delete_post_query = mysqli_query($connection,$query);

        header("Location: post.php");

}
}


/*************************************/
/* Edit Post */

// function getAnEdit() { 
//     global $connection;

// if(isset($_GET['p_id'])) {

// $edit_post_id = $_GET['p_id'];

// }

// $query = "SELECT * FROM post WHERE post_id={$edit_post_id}";
// $select_post_by_id = mysqli_query($connection,$query);

// while ($row = mysqli_fetch_assoc($select_post_by_id)) {
// $post_id = $row['post_id'];
// $category_id = $row['category_id'];
// $post_title = $row['post_title'];
// $post_author = $row['post_author'];
// $post_date = $row['post_date'];
// $post_image = $row['post_image'];
// $post_content = $row['post_content'];
// $post_tags = $row['post_tags'];
// $post_comment_count = $row['post_comment_count'];
// $post_status = $row['post_status'];


// }

// if(isset($_POST['update_post'])) {

// $post_title = $_POST['title'];
// $category_id = $_POST['post_category'];
// $post_author = $_POST['author'];
// $post_date = date('d-m-y');
// $post_image = $_FILES['images']['name'];
// $post_image_temp = $_FILES['images']['tmp_name'];
// $post_content = $_POST['content'];
// $post_tags = $_POST['tags'];
// $post_comment_count = 4;
// $post_status = $_POST['status'];

// move_uploaded_file($post_image_temp, "../img/$post_image");

// if(empty($post_image)) {

//     $query = "SELECT * FROM post WHERE post_id = $edit_post_id";
//     $select_image = mysqli_query($connection,$query);

//     while($row = mysqli_fetch_array($select_image)){

//         $post_image = $row['post_image'];
//     }
// }

//     $query = "UPDATE post SET ";
//     $query .= "post_title = '{$post_title}',";
//     $query .= "category_id = '{$category_id}',";
//     $query .= "post_author = '{$post_author}',";
//     $query .= "post_date = now(),";
//     $query .= "post_image = '{$post_image}',";
//     $query .= "post_content = '{$post_content}',";
//     $query .= "post_tags = '{$post_tags}',";
//     $query .= "post_comment_count = '{$post_comment_count}',";
//     $query .= "post_status = '{$post_status}'";
//     $query .= "WHERE post_id = {$edit_post_id}";


// $update_query = mysqli_query($connection,$query);
// confirmQuery($update_query);
// }
// }












/************************************************/
/*Comment Section*/

function deleteComment() {
    global $connection;

     if(isset($_GET['delete'])) {

    $del_comment_id = $_GET['delete'];

    $query = "DELETE FROM comments WHERE comment_id={$del_comment_id}";
    $delete_comment_query = mysqli_query($connection,$query);

        header("Location: comment.php");

}
}


function unapprovedComment() {
    global $connection;

     if(isset($_GET['unapproved'])) {

    $unapprove_comment_id = $_GET['unapproved'];

    $query = "UPDATE comments SET comment_status= 'Unapproved' WHERE comment_id =  $unapprove_comment_id ";
    $unapproved_comment_query = mysqli_query($connection,$query);

        header("Location: comment.php");

}
}

function approvedComment() {
    global $connection;

     if(isset($_GET['approved'])) {

    $approve_comment_id = $_GET['approved'];

    $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id =  $approve_comment_id ";
    $approved_comment_query = mysqli_query($connection,$query);

        header("Location: comment.php");

}
}



/*************************************/
/* User section */

function deleteUser() {
    global $connection;

     if(isset($_GET['delete'])) {

    $del_user_id = $_GET['delete'];

    $query = "DELETE FROM user WHERE user_id={$del_user_id}";
    $delete_user_query = mysqli_query($connection,$query);

        header("Location: user.php");

}
}


function changeUserRole() {
    global $connection;

     if(isset($_GET['admin'])) {

    $change_to_admin = $_GET['admin'];

    $query = "UPDATE user SET user_role = 'Admin' WHERE user_id =  $change_to_admin ";

    $change_user_role_query = mysqli_query($connection,$query);

        header("Location: user.php");
    }

    if(isset($_GET['bb'])) {

    $change_to_bb = $_GET['bb'];

    $query = "UPDATE user SET user_role = 'Bank' WHERE user_id =  $change_to_bb ";

    $change_user_role_query = mysqli_query($connection,$query);

       header("Location: user.php");
    }


    if(isset($_GET['user'])) {

    $change_to_user = $_GET['user'];  
        

    $query = "UPDATE user SET user_role = 'User' WHERE user_id =  $change_to_user ";

    $change_user_role_query = mysqli_query($connection,$query);

       header("Location: user.php");


    }
    
}    



/************************************************************/
/* Donor Section */

function deleteDonar() {
    global $connection;

     if(isset($_GET['delete'])) {

    $del_donar_user_id = $_GET['delete'];

    $query = "DELETE FROM donar WHERE donar_id={$del_donar_user_id}";
    $delete_donar_query = mysqli_query($connection,$query);

        header("Location: manage.php");

}
}


/************************************************************/
/* Request Section */

function deleteRequest() {
    global $connection;

     if(isset($_GET['delete'])) {

    $del_req_user_id = $_GET['delete'];

    $query = "DELETE FROM request WHERE req_id={$del_req_user_id}";
    $delete_req_query = mysqli_query($connection,$query);

        header("Location: manage.php?source=request");

}
}


/************************************************************/
/* Request Section */

function deleteInquiry() {
    global $connection;

     if(isset($_GET['delete'])) {

    $del_inq_user_id = $_GET['delete'];

    $query = "DELETE FROM inquiry WHERE inq_id={$del_inq_user_id}";
    $delete_inq_query = mysqli_query($connection,$query);

        header("Location: manage.php?source=inquiry");

}
}



/************************************************************/
/* Request Section */

function deleteFeedback() {
    global $connection;

     if(isset($_GET['delete'])) {

    $del_feed_user_id = $_GET['delete'];

    $query = "DELETE FROM feedback WHERE feed_id={$del_feed_user_id}";
    $delete_feed_query = mysqli_query($connection,$query);

        header("Location: manage.php?source=feedback");

}
}


/***********************************************/
/* Profile Section */

function updateProfile() {

global $connection;

// if(isset($_GET['profile'])){


//     $the_edit_user_id = $_GET['profile'];

//     $query = "SELECT * FROM user WHERE user_id = $the_edit_user_id";
// $select_users_query = mysqli_query($connection,$query);

// while ($row = mysqli_fetch_assoc($select_users_query)) {
// $user_id = $row['user_id'];
// $user_name = $row['user_name'];
// $user_password = $row['user_password'];
// $user_first_name = $row['user_first_name'];
// $user_last_name = $row['user_last_name'];
// $user_email = $row['user_email'];
// $user_image = $row['user_image'];
// $user_role = $row['user_role'];

// }

if(isset($_POST['profile'])) {

// $user_id = $_POST['user_id'];
$username = $_POST['user_name'];
$user_password = $_POST['user_password'];
$user_first_name = $_POST['user_first_name'];
$user_last_name = $_POST['user_last_name'];
$user_email = $_POST['user_email'];

    $query = "UPDATE user SET ";
    $query .= "user_name = '{$username}',";
    $query .= "user_password = '{$user_password}',";
    $query .= "user_first_name = '{$user_first_name}',";
    $query .= "user_last_name = '{$user_last_name}',";
    $query .= "user_email = '{$user_email}'";
    $query .= "WHERE user_name = '{$username}'";


$update_query = mysqli_query($connection,$query);
confirmQuery($update_query);

header("Location: profile.php");

}

}


/**************Count All table Function***************/

function recordCount($table) {
global $connection;
$query = "SELECT * FROM " . $table;
$select_all_post = mysqli_query($connection,$query);
$result = mysqli_num_rows($select_all_post);
confirmQuery($result);

return $result;

}


/**************check status of specific table with where clause************/

function checkStatus($table,$column,$status){
global $connection;

$query = "SELECT * FROM $table WHERE $column = '$status'";

$result = mysqli_query($connection,$query);

confirmQuery($result);

 return mysqli_num_rows($result);


}



/**********Redirecting******************/

function redirect($location){
    header("Location:" . $location);
    exit;
}


/***************Check Login********************/

function isLoggedIn($user) {

    if(isset($_SESSION['user_role'])) {

        return true;
    }

    return false;

}









?>



