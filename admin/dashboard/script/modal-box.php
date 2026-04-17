<?php 

    include "config.php";
    $CATEGORY_UPDATE_ID = $_POST['updateID'];
    $query = "SELECT * FROM category WHERE id = {$CATEGORY_UPDATE_ID}";
    $result = mysqli_query($connection, $query);
    $output = '';
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $output .= "<div class='col-3 bg-white rounded-3'>
                            <h2 class='fs-5 my-4 fw-bold text-center text-uppercase'>Edit</h2>
                            <form>
                                <input type='hidden' placeholder='Category' value='{$CATEGORY_UPDATE_ID}' class='form-control update-category-id'>
                                <input type='text' placeholder='Category' value='{$row['category_name']}' class='form-control update-category-value'>
                                <button class='btn btn-primary mt-3 mb-3 d-block w-100 updatecatBtn' style='background-color:royalblue;border-color:royalblue;'>Edit Category</button>
                            </form>
                        </div>";
        }
    }
    echo $output;
?>