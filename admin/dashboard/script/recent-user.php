<?php 

    include "config.php";
    $query = "SELECT * FROM users ORDER BY users.id DESC LIMIT 0, 3";
    $result = mysqli_query($connection, $query);
    $output ='';
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
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
                        </div>";
        }
    }else{
        echo "<h2 class='text-secondary fs-5'>No Recent User</h2>";
    }
    echo $output;

?>