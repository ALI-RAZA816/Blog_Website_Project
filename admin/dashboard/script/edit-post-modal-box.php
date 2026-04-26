<?php 

    include "config.php";
    $EDIT_POST_ID = $_POST['edit_id'];
    $query = "SELECT * FROM posts WHERE id = {$EDIT_POST_ID}";
    $result = mysqli_query($connection, $query);
    $output = '';
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $output .= "<div class='row edit-post-modal g-0 p-0 my-4 px-4'>
                            <h2 class='text-white'>Edit Post <i class='fa-solid fa-xmark hide-edit-post-box' style='float:right;cursor:pointer;'></i></h2>
                            <form action='' class='row'>
                                <input type='hidden' value='{$EDIT_POST_ID}' name='edit-post-id' class='form-control my-3'>
                                <div class='col-md-8 rounded-3 p-3 bg-white' >
                                    <input type='text' placeholder='Post Title' value='{$row['title']}' name='edit-post-title' class='form-control my-3 post-title'>
                                    <textarea name='edit-post-description' class='form-control post-description' placeholder='Description' id=''>{$row['description']}</textarea>
                                </div>
                                <div class='col-md-4'>
                                    <div class='ms-md-4 mt-3 mt-md-0 px-4 py-3 bg-white rounded-3'>
                                        <h3 class='text-uppercase mb-3 fs-6 text-dark'>Categories</h3>
                                        <div class='category-box px-2' style='max-height:260px;overflow-y:auto;'>";
                                            $query1 = "SELECT * FROM category";
                                            $result1 = mysqli_query($connection, $query1);
                                            if(mysqli_num_rows($result) > 0){
                                                while($row1 = mysqli_fetch_assoc($result1)){
                                                    if($row['category'] == $row1['id']){
                                                        $checked = 'checked';
                                                    }else{
                                                        $checked = '';
                                                    }
                                                    $output .= "<div class='form-check'>
                                                                    <input class='form-check-input post-category' type='radio' name='edit-category' value='{$row1['id']}' id='{$row1['category_name']}' $checked >
                                                                    <label class='form-check-label' for='{$row1['category_name']}'>{$row1['category_name']}</label>
                                                                </div>
                                                                <input class='form-check-input post-category' style='width:100%;height:50px;' type='hidden' name='old-category' value='{$row['category']}'>";
                                                }
                                            }
                                        $output .= "</div>
                                    </div>
                                    <div class='ms-md-4 mt-3 d-flex rounded-3 flex-column justify-content-center align-items-center bg-white'>
                                        <div class='col-8 py-5 post-images'>
                                            <img src='../uploads/post_image/{$row['post_img']}' class='img-fluid' alt=''>
                                        </div>
                                        <div class='input-group px-4 mb-3'>
                                            <input type='file' name='edit-post-img' class='form-control post-img' id='inputGroupFile02'>
                                            <input type='text' name='old-edit-img' value='{$row['post_img']}' class='form-control'>
                                        </div>
                                    </div>
                                </div>
                                <button class='btn btn-primary mt-2 edit-post-button post-upload-button mb-3 d-block w-100'>Edit Post</button>
                            </form>
                        </div>";
        }
    }
    echo $output;

?>