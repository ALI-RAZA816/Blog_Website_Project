<?php

    include "config.php";
    $CATEGORY_DELETE_ID = $_POST['cat_id'];
    $query = "DELETE FROM category Where id = {$CATEGORY_DELETE_ID}";
    $result = mysqli_query($connection, $query);
    if($result){
        echo "Category Deleted";
    }

?>