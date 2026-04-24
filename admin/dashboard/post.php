<div class="cotainer-fluid">
    <div class="row g-0">
        <div class="col-lg-2 vh-100 bg-white sidebar px-3 py-4">
            <i class='fa-solid fa-angle-right' id='dashboard-angle-right'></i>
            <?php include "sidebar.php" ?>
        </div>
        <div class="col-lg-10 border">
            <?php include "header.php" ?>
            <div class="row g-0 px-3 ">
                <div class="col-12 mt-3 px-3 py-3  rounded-3 post-management">
                    <h2 class='fw-bold fs-2 mb-0'>Posts Management</h2>
                </div>
            </div>
            <div class="row px-3 g-0">
                <div class="col-12 posts rounded-3 mt-4 px-2 bg-secondary-subtle" style='min-height:65vh;'>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="edit-post-modal-box">
    <!-- <div class="row edit-post-modal g-0 p-0 my-4 px-4">
         <h2 class='text-white'>Edit Post <i class='fa-solid fa-xmark hide-edit-post-box' style='float:right;cursor:pointer;'></i></h2>
        <form action="" class='row'>
            <div class="col-md-8 rounded-3 p-3 bg-white" >
                <input type="text" placeholder='Post Title' name='edit-post-title' class='form-control my-3 post-title'>
                <textarea name="edit-post-description" class='form-control post-description' placeholder='Description' id=""></textarea>
            </div>
            <div class="col-md-4">
                <div class='ms-md-4 mt-3 mt-md-0 px-4 py-3 bg-white rounded-3'>
                    <h3 class='text-uppercase mb-3 fs-6 text-dark'>Categories</h3>
                    <div class='category-box px-2' style='max-height:260px;overflow-y:auto;'>
                    </div>
                </div>
                <div class='ms-md-4 mt-3 d-flex rounded-3 flex-column justify-content-center align-items-center bg-white'>
                    <div class='col-8 post-images'>
                        <img src="../images/free image icon png vector.png" class='img-fluid' alt="">
                    </div>
                    <div class="input-group px-4 mb-3">
                        <input type="file" name='edit-post-img' class="form-control post-img" id="inputGroupFile02">
                        <input type="text" name='edit-img' class="form-control" id="inputGroupFile02">
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mt-2 edit-post post-upload-button mb-3 d-block w-100">Edit Post</button>
        </form>
    </div> -->
</div>
