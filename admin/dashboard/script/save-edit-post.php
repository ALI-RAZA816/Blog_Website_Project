<?php 
    session_start();
    include "config.php";
    $EDIT_POST_ID = $_POST['edit-post-id'];
    $EDIT_TITLE = $_POST['edit-post-title'];
    $EDIT_DESCRIPTION = $_POST['edit-post-description'];
    $EDIT_CATEGORY = $_POST['edit-category'];
    $OLD_CATEGORY = $_POST['old-category'];
    $OLD_IMG = $_POST['old-edit-img'];
    $AUTHOR = $_SESSION['first_name'];
    $query = "SELECT * FROM posts WHERE id = {$EDIT_POST_ID}";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    if(empty($_FILES['edit-post-img']['name'])){
        $new_name = $OLD_IMG;
    }else{
        $IMAGE_NAME = $_FILES['edit-post-img']['name'];
        $FILE_TYPE = $_FILES['edit-post-img']['type'];
        $FILE_TEMP = $_FILES['edit-post-img']['tmp_name'];
        $FILE_SIZE = $_FILES['edit-post-img']['size'];
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
        if(!empty($row['post_img'])){
            unlink("../../uploads/post_image/".$row['post_img']);
        }
        $new_name = time()."-".basename($IMAGE_NAME);
        $ACTUAL_IMAGE = "../../uploads/post_image/".$new_name;
        move_uploaded_file($FILE_TEMP, $ACTUAL_IMAGE);
    }
    $query1 = "UPDATE posts SET title = '{$EDIT_TITLE}', description = '{$EDIT_DESCRIPTION}', category = {$EDIT_CATEGORY}, author = '{$AUTHOR}', post_img = '{$new_name}' WHERE id = {$EDIT_POST_ID};";
    if($OLD_CATEGORY != $EDIT_CATEGORY){
        $query1 .= "UPDATE category SET post_number = post_number - 1 WHERE category.id = {$OLD_CATEGORY};";
        $query1 .= "UPDATE category SET post_number = post_number + 1 WHERE category.id = {$EDIT_CATEGORY}";
    }
    $result1 = mysqli_multi_query($connection, $query1);
    if($result1){
        echo 'Post updated';
    }else{
        echo 'Post cannot updated';
    }
?>