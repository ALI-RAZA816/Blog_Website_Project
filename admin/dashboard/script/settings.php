<?php 

    include "config.php";
    $WEB_NAME = $_POST['web_name'];
    $SUB_DESCRIPTION = $_POST['sub_description'];
    $F_DESCRIPTION = $_POST['f_description'];
    
    $IMAGE_NAME = $_FILES['web_logo']['name'];
    $FILE_TYPE = $_FILES['web_logo']['type'];
    $FILE_TEMP = $_FILES['web_logo']['tmp_name'];
    $FILE_SIZE = $_FILES['web_logo']['size'];
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

    // if(!empty($row['logo'])){
        // }
        
        unlink("../../../images/logo/".$row['logo']);
        $new_name = time()."-".basename($IMAGE_NAME);
        $ACTUAL_IMAGE = "../../../images/logo/".$new_name;
        move_uploaded_file($FILE_TEMP, $ACTUAL_IMAGE);

    $query  = "UPDATE setting SET website_name ='{$WEB_NAME}',
      sub_description = '{$SUB_DESCRIPTION}',
        f_description = '{$F_DESCRIPTION}',
        logo = '{$new_name}'";
    $result = mysqli_query($connection, $query);

?>