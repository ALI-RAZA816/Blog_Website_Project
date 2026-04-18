<?php

    include "config.php";
    $FIRST_NAME = mysqli_real_escape_string($connection, $_POST['first_name']);
    $LAST_NAME = mysqli_real_escape_string($connection, $_POST['last_name']);
    $USER_NAME = mysqli_real_escape_string($connection, $_POST['user_name']);
    $PASSWORD = md5($_POST['password']);
    $EMAIL = mysqli_real_escape_string($connection, $_POST['Email']);
    $FIRST_LETTER = strtoupper(substr($FIRST_NAME, 0, 1));

    $query1 = "SELECT * FROM users WHERE first_name = '{$FIRST_NAME}'";
    $result1 = mysqli_query($connection, $query1);
    if(mysqli_num_rows($result1) > 0){
        echo "Name already exists";
        die();
    }

    $query2 = "SELECT * FROM users WHERE last_name = '{$LAST_NAME}'";
    $result2 = mysqli_query($connection, $query2);
    if(mysqli_num_rows($result2) > 0){
            echo "Lastname already exists";
            die();
    }

    $query3 = "SELECT * FROM users WHERE email = '{$EMAIL}'";
    $result3 = mysqli_query($connection, $query3);
    if(mysqli_num_rows($result3) > 0){
        echo "Email already exists";
        die();
    }

    $query4 = "INSERT INTO users (first_name, last_name, username, password, email, first_letter) VALUES ('{$FIRST_NAME}', '{$LAST_NAME}', '{$USER_NAME}', '{$PASSWORD}', '{$EMAIL}', '{$FIRST_LETTER}')";
    $result4 = mysqli_query($connection, $query4);
    if($result4){
        echo "Data successfully inserted";
    }else {
        echo "Failed to inserted data";
    }
    
?>