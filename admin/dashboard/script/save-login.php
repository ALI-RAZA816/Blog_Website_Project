<?php 

    session_start();
    include "config.php";
    $LOGIN_EMAIL = mysqli_real_escape_string($connection, $_POST['email']);
    $LOGIN_PASSWORD = md5($_POST['password']);
  
    $query = "SELECT * FROM users WHERE email = '{$LOGIN_EMAIL}' && password = '{$LOGIN_PASSWORD}'";
    $result = mysqli_query($connection, $query);

    $query1 = "SELECT * FROM users WHERE email = '{$LOGIN_EMAIL}'";
    $result1 = mysqli_query($connection, $query1);
    $query2 = "SELECT * FROM users WHERE password = '{$LOGIN_PASSWORD}'";
    $result2 = mysqli_query($connection, $query2);

    if(mysqli_num_rows($result1) === 0){
        echo "Incorrect email";
        die();
    }

    if(mysqli_num_rows($result2) === 0){
        echo "Incorrect password";
        die();
    }

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $_SESSION['userid'] = $row['id'];
            $_SESSION['firstname'] = $row['first_name'];
            $_SESSION['lastname'] = $row['last_name'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_role'] = $row['role'];
            $_SESSION['passwordname'] = $row['password'];
            $_SESSION['email'] = $row['email'];
            echo "Login Successful";
        }
    }else{
        echo "Can't Login";
    }
?>