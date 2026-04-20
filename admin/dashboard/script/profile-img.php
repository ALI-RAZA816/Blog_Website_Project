<?php 

    session_start();
    include "config.php";
    $output = '';
    if(!isset($_SESSION['email'])){
        $output .= "<span class='text-dark'><i class='fa-regular fa-user'></i></span>";
    }else{
        $query = "SELECT * FROM users WHERE email = '{$_SESSION['email']}' ";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                if(!empty($row['profile_img'])){
                    $output .= "<img src='../uploads/user/{$row['profile_img']}' height='50px' width='40px' class='rounded-circle' alt=''>";
                }else{
                    $output .= "<span class='text-dark'>{$row['first_letter']}</span>";
                }
            }
        }
    }

    echo $output;

?>