<?php 
     
    include "config.php";
    $UPDATED_CATEGORY_VALUE = $_POST['updatecategoryvalue'];
    $UPDATED_CATEGORY_ID = $_POST['updatecategoryid'];
    $query = "UPDATE category SET category_name = '{$UPDATED_CATEGORY_VALUE}' WHERE id = {$UPDATED_CATEGORY_ID}";
    $result = mysqli_query($connection, $query);

?>