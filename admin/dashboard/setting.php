<div class="cotainer-fluid">
    <div class="row g-0">
        <div class="col-lg-2 vh-100 bg-white sidebar px-3 py-4">
            <i class='fa-solid fa-angle-right' id='dashboard-angle-right'></i>
            <?php include "sidebar.php" ?>
        </div>
        <div class="col-lg-10 border">
            <?php include "header.php" ?>
            <div class="row g-0 p-0 px-3 my-4">
                <div class="col-12">
                    <h2 class='mb-0 fw-bold fs-3' style='color:royalblue;'>Settings</h2>
                    <p class='mb-0'>Define the structural identity and core performance parameters of your  digital publication.</p>
                </div>
            </div>
            <div class="row g-0 p-0 px-4">
                <div class="col-12 bg-white rounded-4 p-4" style='box-shadow:0 0 10px #efefef;'>
                    <form action="">
                        <div class='mb-4'>
                            <label for="" class='form-label'>Website Name</label>
                            <input type="text" class='form-control'>
                        </div>
                        <div class='mb-4'>
                            <label for="" class='form-label'>Subscription Description</label>
                            <textarea type="text" class='form-control' style='height:100px;'></textarea>
                        </div>
                        <div class='mb-4'>
                            <label for="" class='form-label'>Footer Description</label>
                            <input type="text" class='form-control'>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="inputGroupFile02">
                        </div>
                        <button class='btn btn-primary' style='background-color:royalblue;border:none;'>Save Changes</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
