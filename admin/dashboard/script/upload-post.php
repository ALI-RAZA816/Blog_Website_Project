<?php 

    session_start();
    include "config.php";
    $output ='';
    $POST_TITLE = $_POST['post-title'];
    $POST_DESCRIPTION = $_POST['post-description'];
    $POST_CATEGORY = $_POST['category'];
    // $POST_IMG =$_FILES['post-img'];
    $AUTHOR = ($_SESSION['userid']) ? $_SESSION['userid'] : 0;
    $DATE = date('F y');
    $IMAGE_NAME = $_FILES['post-img']['name'];
    $FILE_TYPE = $_FILES['post-img']['type'];
    $FILE_TEMP = $_FILES['post-img']['tmp_name'];
    $FILE_SIZE = $_FILES['post-img']['size'];
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
    $ACTUAL_IMAGE = "../../uploads/post_image/".$new_name;
    move_uploaded_file($FILE_TEMP, $ACTUAL_IMAGE);
    $query = "INSERT INTO posts (title, description, category, author, date, post_img) VALUES ('{$POST_TITLE}', '{$POST_DESCRIPTION}', {$POST_CATEGORY}, {$AUTHOR}, '{$DATE}', '{$new_name}');";
    $query .= "UPDATE category SET post_number = post_number + 1 WHERE category.id = {$POST_CATEGORY}";
    $result = mysqli_multi_query($connection, $query);
    if($result){
        echo "Post successfully uploaded";
    }else{
        echo "Post cannot be uploaded";
    }
    
?>