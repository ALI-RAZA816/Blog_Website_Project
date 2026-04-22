<?php 
    include "config.php";
    $limit = 5;
    if(isset($_POST['page_no'])){
        $pageNo = $_POST['page_no'];
    }else{
        $pageNo = 1;
    }
    $offset = ($pageNo - 1) * $limit;
    $query = "SELECT * FROM posts LEFT JOIN category ON posts.category = category.id LEFT JOIN users ON posts.author = users.id LIMIT {$offset}, {$limit}";
    $result = mysqli_query($connection, $query);
    $output = '';
    $output1 = '';
    if(mysqli_num_rows($result) > 0){
        $output .= "<table class='table'>
                        <thead>
                            <tr >
                                <th class='col-5 text-secondary' style='background-color:transparent;'>Atricle Detail</th>
                                <th class='col-2 text-secondary' style='background-color:transparent;'>Status</th>
                                <th class='col-3 text-secondary' style='background-color:transparent;'>Author</th>
                                <th class='col-2 text-secondary' style='background-color:transparent;'>Date</th>
                                <th class='col-2 text-secondary' style='background-color:transparent;'>Edit/Delete</th>
                            </tr>
                        </thead>
                        <tbody class=''>";
        while($row = mysqli_fetch_assoc($result)){
            $output .= "<tr>
                                <td>
                                    <div class='row g-0 p-0'>
                                        <div class='col-3 p-1 bg-secondary-subtle rounded-2'><img src='../uploads/post_image/{$row['post_img']}' class='img-fluid' alt=''></div>
                                        <div class='col-9'>
                                            <h2 class='text-dark fs-6 ms-2'>{$row['title']}</h2>
                                            <span class='badge ms-2 rounded-pill text-bg-secondary'>{$row['category_name']}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class='align-middle'><span class='badge rounded-pill text-bg-secondary'>{$row['status']}</span></td>
                                <td class='align-middle'>
                                    <img src='../uploads/user/{$row['profile_img']}' class='img-fluid rounded-circle' style='height:40px;width:40px;'alt=''>
                                    <span class='text-secondary ms-2'>{$row['first_name']}</span>
                                </td>
                                <td class='align-middle'><p class='text-secondary'>{$row['date']}</p></td>
                                <td class='align-middle'>
                                    <i class='fa-solid fa-edit me-2'></i>
                                    <i class='fa-solid fa-trash'></i>
                                </td>
                            </tr>";
        }
        $output .= "</tbody>
                    </table>";
        $query1 = "SELECT * FROM posts";
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
                                $output .="<li class='page-item'><a class='page-link $active post-pagination' data-postpage={$i} href='#'>{$i}</a></li>";
                            }
        $output .=" <li class='page-item'><a href='#' class='page-link d-flex align-items-center' style='height:100%;'><i class='fa-solid fa-angle-right'></i></a></li></ul>
                    </nav>";
    }else{
        echo "<h2 class='text-dark fw-bold fs-3'>No post found</h2>";
    }
    echo $output;

?>