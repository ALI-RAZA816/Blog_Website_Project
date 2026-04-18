<?php 

    include "config.php";
    $DELETE_USER_ID = $_POST['delete_id'];
    $query = "DELETE FROM users WHERE id = {$DELETE_USER_ID}";
    $result = mysqli_query($connection, $query);
    if($result){
        echo "User successfully deleted";
    }else{
        echo "User cannot deleted";
    }

?>