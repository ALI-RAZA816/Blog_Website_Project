<?php 
    include "config.php";
    $limit = 3;
    if(isset($_POST['pageNo'])){
        $pageNo = $_POST['pageNo'];
    }else{
        $pageNo = 1;
    }
    $offset = ($pageNo - 1) * $limit;
    $query = "SELECT * FROM users LIMIT {$offset}, {$limit}";
    $resutl = mysqli_query($connection, $query);
    $output = '';
    if(mysqli_num_rows($resutl) > 0){
        while($row = mysqli_fetch_assoc($resutl)){
            $output .= " <div style='height:95px;' class='col-12 mb-2 d-flex align-items-center justify-content-between users rounded-2 px-4 p-2'>
                            <div class='d-flex'>
                            <div class='rounded-circle d-flex bg-secondary-subtle justify-content-center align-items-center border' style='height:50px;width:50px;overflow:hidden;'>";
                            if(!$row['profile_img']){
                                $output .= "<span class='text-secondary fs-3'>{$row['first_letter']}</span>";
                            }else{
                                $output .= "<img src='../uploads/user/{$row['profile_img']}' class='img-fluid rounded-circle' style='height:50px;width:50px;'alt=''>";
                            }
                            $output .= "</div>
                                <div class='mt-2 ms-2'>
                                    <h2 class='fw-bold fs-6 text-dark mb-0'>{$row['first_name']} {$row['last_name']}</h2>
                                    <p class='text-secondary m-0 fs-6'>{$row['email']}</p>
                                    <span class='badge rounded-pill text-bg-dark text-uppercase'>{$row['role']}</span>
                                </div>
                            </div>
                            <div>
                                <i class='fa-solid fa-edit' id='edit-user' data-editid={$row['id']}></i>
                                <i class='fa-solid fa-trash' id='delete-user' data-userid={$row['id']}></i>
                            </div>
                        </div>";
        }
        $query1 = "SELECT * FROM users";
        $result1 = mysqli_query($connection, $query1);
        $totalRecords = mysqli_num_rows($result1);
        $totalPages = ceil($totalRecords/$limit);
        $output .= "<nav>
                        <ul class='pagination d-flex mt-3 justify-content-end me-5'>
                         <li class='page-item'><a href='#' class='page-link d-flex align-items-center' style='height:100%;'><i class='fa-solid fa-angle-left'></i></a></li>";
                            for($i=1; $i <= $totalPages; $i++){
                                if($i == $pageNo){
                                    $active = 'active';
                                }else{
                                    $active = '';
                                }
                                $output .="<li class='page-item'><a class='page-link $active user-pagination' data-userpage={$i} href='#'>{$i}</a></li>";
                            }
        $output .=" <li class='page-item'><a href='#' class='page-link d-flex align-items-center' style='height:100%;'><i class='fa-solid fa-angle-right'></i></a></li></ul>
                    </nav>";
    }else{
        echo "<h2 class='fs-5 fw-bold text-bold text-secondary'>No User found.</h2>";
    }

    echo $output;
?>