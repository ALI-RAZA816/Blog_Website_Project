<?php 

    include "config.php";
    $query = "SELECT * FROM category";
    $result = mysqli_query($connection, $query);
    $output = '';
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $output .= "<div class='form-check'>
                            <input class='form-check-input post-category' type='radio' name='category' value='{$row['id']}' id='{$row['category_name']}'>
                            <label class='form-check-label' for='{$row['category_name']}'>{$row['category_name']}</label>
                        </div>";
        }
    }

    echo $output;

?>