<?php 
    include "config.php";
    $POST_DELETE_ID = $_POST['post_delete_id'];

    $query1 = "SELECT * FROM posts WHERE id = {$POST_DELETE_ID}";
    $result1 = mysqli_query($connection, $query1);
    $row = mysqli_fetch_assoc($result1);
    // if(!empty($row['profile_img'])){
        unlink("../../uploads/post_image/".$row['post_img']);
    // }
    $query = "DELETE FROM posts WHERE id = {$POST_DELETE_ID}";
    $result = mysqli_query($connection, $query);
?>