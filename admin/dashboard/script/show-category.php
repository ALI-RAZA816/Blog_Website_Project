<?php

    include "config.php";
    $query = "SELECT * FROM category";
    $result = mysqli_query($connection, $query);
    $output = '';
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $output .= "<div class='col-12 mb-2 d-flex justify-content-between align-items-center rounded-3 bg-white px-3 py-2'>
                            <div class='d-flex align-items-center'>
                                <i class='fa-solid fa-box me-3'></i>
                                <h5 class='mb-0 fw-bold'>{$row['category_name']}</h5>
                            </div>
                            <div class='d-flex flex-column align-items-center'>
                                <span class='m-0 fs-5 post-number fw-bold'>24</span>
                                <span class='m-0 fw-bold text-secondary post-text'>Posts</span>
                            </div>
                            <div>
                                <i class='fa-solid fa-edit'></i>
                                <i class='fa-solid fa-trash' data-catid = {$row['id']}></i>
                            </div>
                        </div>";
        }
    }
    echo $output;
?>