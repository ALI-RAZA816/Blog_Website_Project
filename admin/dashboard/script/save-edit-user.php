<?php 

    include "config.php";
    $EDIT_ID = $_POST['edit_id'];
    $EDIT_FIRST_NAME = $_POST['edit_firstname'];
    $EDIT_LAST_NAME = $_POST['edit_lastname'];
    $EDIT_EMAIL = $_POST['edit_email'];
    $EDIT_USER_ROLE = $_POST['role'];
    $UPLOAD_FILE = $_FILES['upload_file'];
    $OLD_IMAGE = $_POST['old_image'];


    if(empty($_FILES['upload_file']['name'])){
        $new_name = $OLD_IMAGE;
    }else{
        $IMAGE_NAME = $_FILES['upload_file']['name'];
        $FILE_TYPE = $_FILES['upload_file']['type'];
        $FILE_TEMP = $_FILES['upload_file']['tmp_name'];
        $FILE_SIZE = $_FILES['upload_file']['size'];
        $FILE_EXPLODE = explode('.',$IMAGE_NAME);
        $FILE_END = end($FILE_EXPLODE);
        $FILE_EXT = strtolower($FILE_END);

        $EXTENSIONS = array("jpg","jpeg","png");

        if(!in_array($FILE_EXT, $EXTENSIONS)){
            echo "Choose PNG or JPG file";
            die();
        }

        if($FILE_SIZE > 1073741824 ){
            echo "Filse size must be 3MB or less";
            die();
        }

        $new_name = time()."-".basename($IMAGE_NAME);
        $ACTUAL_IMAGE = "../../uploads/user/".$new_name;
        move_uploaded_file($FILE_TEMP, $ACTUAL_IMAGE);

    }
    $query = "SELECT * FROM users WHERE id = {$EDIT_ID}";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    unlink("../../uploads/user/".$row['profile_img']);
    $query = "UPDATE users SET first_name = '{$EDIT_FIRST_NAME}', last_name = '{$EDIT_LAST_NAME}', email = '{$EDIT_EMAIL}', role = '{$EDIT_USER_ROLE}', profile_img = '{$new_name}' WHERE id = {$EDIT_ID}";
    $result = mysqli_query($connection, $query);
?>