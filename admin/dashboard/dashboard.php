<?php include "config.php";?>
<div class="cotainer-fluid">
    <div class="row g-0">
        <div class="col-lg-2 vh-100 bg-white sidebar px-3 py-4">
            <i class='fa-solid fa-angle-right' id='dashboard-angle-right'></i>
            <?php include "sidebar.php" ?>
        </div>
        <div class="col-lg-10 border">
            <?php include "header.php" ?>
            <div class="row g-0 p-0">
                <div class="col-12 px-3 px-lg-5 py-3">
                    <div class="row gy-5 p-0">
                        <div class ='col-md-6 col-xl-3'>
                            <div class="d-flex flex-column cards bg-white px-3 py-3">
                                <span class='fw-bold fs-5 mb-3'>Posts</span>
                                <?php
                                    $query1 = "SELECT COUNT(*) AS total_posts FROM posts";
                                    $result1 = mysqli_query($connection, $query1);
                                    $row1 = mysqli_fetch_assoc($result1);
                                    $count1 = str_pad($row1['total_posts'],2,0,STR_PAD_LEFT);
                                    echo "<span class='fw-bold fs-1 text-secondary'>{$count1}</span>";
                                ?>
                            </div>
                        </div>
                        <div class ='col-md-6 col-xl-3'>
                            <div class="d-flex flex-column cards bg-white px-3 py-3">
                                <span class='fw-bold fs-5 mb-3'>Categories</span>
                                <?php
                                    $query2 = "SELECT COUNT(*) AS total_category FROM category";
                                    $result2 = mysqli_query($connection, $query2);
                                    $row2 = mysqli_fetch_assoc($result2);
                                    $count2 = str_pad($row2['total_category'],2,0,STR_PAD_LEFT);
                                    echo "<span class='fw-bold fs-1 text-secondary'>{$count2}</span>";
                                ?>
                            </div>
                        </div>
                        <div class ='col-md-6 col-xl-3'>
                            <div class="d-flex flex-column cards bg-white px-3 py-3">
                                <span class='fw-bold fs-5 mb-3'>Users</span>
                                <?php
                                    $query3 = "SELECT COUNT(*) AS total_users FROM users";
                                    $result3 = mysqli_query($connection, $query3);
                                    $row3 = mysqli_fetch_assoc($result3);
                                    $count3 = str_pad($row3['total_users'],2,0,STR_PAD_LEFT);
                                    echo "<span class='fw-bold fs-1 text-secondary'>{$count3}</span>";
                                ?>
                            </div>
                        </div>
                        <div class ='col-md-6 col-xl-3'>
                            <div class="d-flex flex-column cards bg-white px-3 py-3">
                                <span class='fw-bold fs-5 mb-3'>Admins</span>
                                   <?php
                                    $query4 = "SELECT COUNT(*) AS total_admins FROM users WHERE role = 'admin'";
                                    $result4 = mysqli_query($connection, $query4);
                                    $row4 = mysqli_fetch_assoc($result4);
                                    $count4 = str_pad($row4['total_admins'],2,0,STR_PAD_LEFT);
                                    echo "<span class='fw-bold fs-1 text-secondary'>{$count4}</span>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-0 g-0">
                <div class="col-12">
                    <div class="row p-0 g-0 d-flex justify-content-center">
                        <div class="col-xl-8 px-2 pe-4">
                            <h2 class='my-4 fw-bold recent-post'>Recent Posts</h2>
                            <div class='bg-secondary-subtle p-2 rounded-3 table-responsive'>
                                <table class="table">
                                    <thead>
                                        <tr >
                                            <th class="col-5 text-secondary" style='background-color:transparent;'>Atricle Detail</th>
                                            <th class="col-2 text-secondary" style='background-color:transparent;'>Status</th>
                                            <th class="col-3 text-secondary" style='background-color:transparent;'>Author</th>
                                            <th class="col-2 text-secondary" style='background-color:transparent;'>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 

                                            include "config.php";
                                            $query = "SELECT * FROM posts LEFT JOIN category ON posts.category = category.id LEFT JOIN users ON posts.author = users.id ORDER BY posts.id DESC LIMIT 0, 5";
                                            $result = mysqli_query($connection, $query);
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_assoc($result)){
                                                    echo "<tr>
                                                            <td>
                                                                <div class='row g-0 p-0'>
                                                                    <div class='col-3 p-1 bg-secondary-subtle rounded-2'><img src='../uploads/post_image/{$row['post_img']}' class='img-fluid' alt=''></div>
                                                                    <div class='col-9'>
                                                                        <h2 class='text-dark fs-6 ms-2'>{$row['title']}</h2>
                                                                        <span class='badge ms-2 rounded-pill text-bg-secondary'>{$row['category_name']}</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td><span class='badge mt-3 rounded-pill text-bg-secondary'>{$row['status']}</span></td>
                                                            <td>";
                                                            if(empty($row['profile_img'])){
                                                                if(empty($row['first_letter'])){
                                                                    echo "<span class='text-secondary bg-secondary-subtle ms-2' style='display:inline-block;height:40px;width:40px;border-radius:100%;border:1px solid #a7a7a7;text-align:center;line-height:40px;'>U</span>
                                                                <span class='text-secondary ms-2'>Unkown</span>";
                                                                }else{
                                                                echo "<span class='text-secondary bg-secondary-subtle ms-2' style='display:inline-block;height:40px;width:40px;border-radius:100%;border:1px solid #a7a7a7;text-align:center;line-height:40px;'>{$row['first_letter']}</span>
                                                                <span class='text-secondary ms-2'>{$row['first_name']}</span>";
                                                                }
                                                            }else{
                                                                echo "<img src='../uploads/user/{$row['profile_img']}' class='img-fluid border-primary rounded-circle mt-2' style='height:40px;width:40px;'alt=''>
                                                                 <span class='text-secondary ms-2'>{$row['first_name']}</span>";
                                                            }
                                                            echo "</td>
                                                            <td><p class='text-secondary mt-3'>{$row['date']}</p></td>
                                                        </tr>";
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xl-3 px-2">
                            <div>
                                <h4 class='my-4 fw-bold recent-user'>Recent Users</h4>
                                <div class='recent-users'>
                                    <!-- <div class='row g-0 p-0'>
                                        <div class="col-12 mb-2 d-flex align-items-center users rounded-2 p-2">
                                            <img src="../images/1ec99389-6d1a-4d68-bee3-38ab2100d489.jpg" class='img-fluid rounded-circle mt-2' style='height:50px;width:50px;'alt="">
                                            <div class='mt-2 ms-2'>
                                                <h2 class='fw-bold fs-6 text-dark mb-0'>Name</h2>
                                                <p class='text-secondary m-0 fs-6'>alirazamujahid102@gmail.com</p>
                                                <span class="badge rounded-pill text-bg-dark text-uppercase">Admin</span>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

