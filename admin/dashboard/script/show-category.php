<?php

    include "config.php";
    $limit = 3;
    if(isset($_POST['page_no'])){
        $page = $_POST['page_no'];
    }else{
        $page = 1;
    }
    $offset = ($page - 1) * $limit;
    $query = "SELECT * FROM category LIMIT {$offset}, {$limit}";
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
                                <i class='fa-solid fa-edit' id='update-category' data-updatecatid = {$row['id']}></i>
                                <i class='fa-solid fa-trash' id='delete-category' data-catid = {$row['id']}></i>
                            </div>
                        </div>";
        }
        $query = "SELECT * FROM category";
        $result1 = mysqli_query($connection, $query);
        $totalRecords = mysqli_num_rows($result1);
        $totalPages = ceil($totalRecords/$limit);
        $output .= "     <nav>
                        <ul class='pagination d-flex mt-3 justify-content-end me-5'>
                        <li class='page-item'><a href='#' class='page-link d-flex align-items-center' style='height:100%;'><i class='fa-solid fa-angle-left'></i></a></li>";
                        for($i=1; $i <= $totalPages; $i++){
                            if($i == $page){
                                $active = 'active';
                            }else{
                                $active = '';
                            }
                            $output .= "<li class='page-item'><a class='page-link $active' href='category.php?' data-page={$i}>{$i}</a></li>";
                        }
        $output .= " <li class='page-item'><a class='page-link d-flex align-items-center' style='height:100%;' href='#'><i class='fa-solid fa-angle-right'></i></a></li></ul>
                </nav>";
    }else{
        echo "<h2 class='fs-4 text-dark m-0'>No record found</h2>";
    }
    echo $output;
?>