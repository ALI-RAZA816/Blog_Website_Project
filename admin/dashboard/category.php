<div class="cotainer-fluid">
    <div class="row g-0">
        <div class="col-lg-2 vh-100 bg-white sidebar px-3 py-4">
            <i class='fa-solid fa-angle-right' id='dashboard-angle-right'></i>
            <?php include "sidebar.php" ?>
        </div>
        <div class="col-lg-10 border">
            <?php include "header.php" ?>
            <div class="row p-0 px-3 g-0" >
                <div class="col-12 bg-white rounded-3 px-3 py-3 my-4" style='box-shadow:0 0 10px #efefef;'>
                    <h2 class='fs-2 fw-bold m-0 category'>Categories</h2>
                    <p class='mb-0 mt-2'>Manage the primary classification pilars and micro-descriptors that drive discoverability</p>
                </div>
            </div>
            <div class="row px-3 p-0 g-0">
                <div class="col-md-3 rounded-3 bg-white p-3 add-category">
                    <h2 class='fs-5 my-4 fw-bold text-center text-uppercase'>Add New Category</h2>
                    <form action="">
                        <input type="text" placeholder='Category' class='form-control'>
                        <button class='btn btn-primary mt-3 d-block w-100 addcatBtn'>Add Category</button>
                    </form>
                </div>
                <div class="col-md-8 ms-md-5 mt-3 mt-md-0">
                    <h2 class='fs-3 fw-bold text-uppercase' style='color:royalblue;'>Categories Record</h2>
                    <div class="row bg-secondary-subtle rounded-3 p-2 p-0 g-0">
                        <div class="col-12 mb-2 d-flex justify-content-between align-items-center rounded-3 bg-white px-3 py-2">
                            <div class='d-flex align-items-center'>
                                <i class="fa-solid fa-box me-3"></i>
                                <h5 class='mb-0 fw-bold'>Category Name</h5>
                            </div>
                            <div class='d-flex flex-column align-items-center'>
                                <span class='m-0 fs-5 post-number fw-bold'>24</span>
                                <span class='m-0 fw-bold text-secondary post-text'>Posts</span>
                            </div>
                            <div>
                                <i class='fa-solid fa-edit'></i>
                                <i class='fa-solid fa-trash'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
