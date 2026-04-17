<?php 

    include "config.php";
    $CATEGORY_NAME = $_POST['category_name'];
    $query = "INSERT INTO category (category_name) VALUES ('{$CATEGORY_NAME}')";
    $result = mysqli_query($connection, $query);
    if($result){
        echo "Category Added";
    }else{
        echo "Category can't added";
    }

?>