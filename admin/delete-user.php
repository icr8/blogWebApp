<?php
require 'config/database.php';

if(isset($_GET['id'])){
   
    $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

     //fetch user from database
     $query = "SELECT * FROM users WHERE id=$id";
     $result = mysqli_query($connection, $query);
     $user = mysqli_fetch_assoc($result);

     //make sure we got back only one user
     if(mysqli_num_rows($result) == 1){
        $avatar_name = $user['avatar'];
        $avatar_path = '../img/images/' . $avatar_name;
        //delete image if available
        if($avatar_path){
            unlink($avatar_path);
        }
     }

     // for later
     //fetch all thumbnails of user's posts and delete them
     $thumbnaill_query = "SELECT thumbnail FROM posts WHERE author_id = $id";
     $thumbnaill_result = mysqli_query($connection, $thumbnaill_query);
     if(mysqli_num_rows($thumbnaill_result) > 0){
      while($thumbnaill = mysqli_fetch_assoc($thumbnaill_result)){
         $thumbnaill_path == '../img/images/' . $thumbnaill['thumbnail'];
         //delete thumbnail from images folder if exist
         if($thumbnaill_path){
            unlink($thumbnaill_path);
         }
      }
     }



     //delete user from database
     $delete_user_query = "DELETE FROM users WHERE id=$id";
     $delete_user_result = mysqli_query($connection, $delete_user_query);
     if(mysqli_errno($connection)){
        $_SESSION['delete-user'] = "Couldn't delete user '{$user['firstname']} '{$user['lastname']}'";
     }
     else{
        $_SESSION['delete-user-success'] = "User '{$user['firstname']} {$user['lastname']}' deleted successfully";
     }
}

header('location: ' . ROOT_URL . 'admin/manage-users.php');
die();