<?php 

    include "config.php";
    $EDIT_USER_ID = $_POST['edit_id'];
    $query = "SELECT * FROM users WHERE id = {$EDIT_USER_ID}";
    $result = mysqli_query($connection, $query);
    $output = '';
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $output .= "<div class='col-3 bg-white rounded-3 p-3'>
                    <h2 class='fs-4 fw-bold' style='color:royalblue'>Edit User</h2>
                    <form action=''>
                        <div class='mb-2'>
                            <label for='' class='form-label mb-1'>First Name</label>
                            <div><input type='hidden' class='form-control' name='edit_id' value='{$row['id']}'></div>
                            <div><input type='text' class='form-control' name='edit_firstname' value='{$row['first_name']}'></div>
                        </div>
                        <div class='mb-2'>
                            <label for='' class='form-label mb-1'>Last Name</label>
                            <div><input type='text' class='form-control' name='edit_lastname' value='{$row['last_name']}'></div>
                        </div>
                        <div class='mb-2'>
                            <label for='' class='form-label'>Email</label>
                            <div><input type='text' class='form-control' name='edit_email' value='{$row['email']}'></div>
                        </div>
                        <div class='mb-2'>
                            <label for='' class='form-label' >Role</label>
                            <div>
                            <select id='' name='role' class='form-select'>
                                <option value='admin'>Admin</option>
                                <option value='user'>User</option>
                            </select>
                            </div>
                        </div>
                        <div>
                            <label for='' class='form-label'>Profile Photo</label>
                            <div><input type='file' name='upload_file' class='form-control'></div>
                            <div><input type='text' class='form-control' name='old_image' value='{$row['profile_img']}'></div>
                        </div>
                        <button type='submit' style='background-color:royalblue;border-color:royalblue;' class='btn mt-3 btn-primary d-block w-100 user-update'>Update</button>
                    </form>
                </div>";
        }
    }

    echo $output;

?>