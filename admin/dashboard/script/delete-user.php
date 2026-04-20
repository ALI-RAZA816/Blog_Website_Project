<?php 

    include "config.php";
    $DELETE_USER_ID = $_POST['delete_id'];
    $query1 = "SELECT * FROM users WHERE id = {$DELETE_USER_ID}";
    $result1 = mysqli_query($connection, $query1);
    $row = mysqli_fetch_assoc($result1);
    if(!empty($row['profile_img'])){
        unlink("../../uploads/user/".$row['profile_img']);
    }
    $query = "DELETE FROM users WHERE id = {$DELETE_USER_ID}";
    $result = mysqli_query($connection, $query);
    if($result){
        echo "User successfully deleted";
    }else{
        echo "User cannot deleted";
    }

?>