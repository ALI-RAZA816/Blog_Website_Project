<?php

    include "config.php";
    $query1 = "SELECT COUNT(first_name) AS count FROM users";
    $result1 = mysqli_query($connection, $query1);
    $row1 = mysqli_fetch_assoc($result1);
    $count1 = str_pad($row1['count'],2,0,STR_PAD_LEFT);

    $query2 = "SELECT COUNT(first_name) AS count FROM users WHERE role = 'admin'";
    $result2 = mysqli_query($connection, $query2);
    $row2 = mysqli_fetch_assoc($result2);
    $count2 = str_pad($row2['count'],2,0,STR_PAD_LEFT);
    $output = "<div class='col-md-5 py-3 px-3 rounded-3 mb-3 mb-md-0 me-md-5 bg-white' style='box-shadow:0 0 10px #efefef;'>
                    <h2 class='fs-5 fw-bold' style='color:royalblue;'>Total Users</h2>
                    <h2 class='fw-bold text-secondary'>{$count1}</h2>
                </div>
                <div class='col-md-6 py-3 px-3 rounded-3 bg-white' style='box-shadow:0 0 10px #efefef;'>
                    <h2 class='fs-5 fw-bold' style='color:royalblue;'>Total Admins</h2>
                    <h2 class='fw-bold text-secondary'>{$count2}</h2>
                </div>";

    echo $output;
?>