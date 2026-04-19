<div class="cotainer-fluid">
    <div class="row g-0">
        <div class="col-lg-2 vh-100 bg-white sidebar px-3 py-4">
            <i class='fa-solid fa-angle-right' id='dashboard-angle-right'></i>
            <?php include "sidebar.php" ?>
        </div>
        <div class="col-lg-10 border">
            <?php include "header.php" ?>
            <div class="row p-0 my-4 px-4 g-0">
                <div class="col-md-5 py-3 px-3 rounded-3 mb-3 mb-md-0 me-md-5 bg-white" style='box-shadow:0 0 10px #efefef;'>
                    <h2 class='fs-5 fw-bold' style='color:royalblue;'>Total Users</h2>
                    <h2 class='fw-bold text-secondary'>1500</h2>
                </div>
                <div class="col-md-6 py-3 px-3 rounded-3 bg-white" style='box-shadow:0 0 10px #efefef;'>
                    <h2 class='fs-5 fw-bold' style='color:royalblue;'>Total Users</h2>
                    <h2 class='fw-bold text-secondary'>1500</h2>
                </div>
            </div>
            <div class="row g-0 p-0 px-4">
                <div class="col-12">
                    <h2 class='fs-3 fw-bold' style='color:royalblue;'>Users</h2>
                    <div class='row d-flex flex-column userOuput align-items-start g-0 p-0' style='min-height:55vh;'>
                        <!-- load user data from database  -->
                    </div>
                    <!-- <nav>
                        <ul class="pagination d-flex mt-3 justify-content-end me-5">
                            <li class="page-item"><a href="#" class="page-link d-flex align-items-center" style='height:100%;'><i class='fa-solid fa-angle-left'></i></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#" aria-current="page">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link d-flex align-items-center" style='height:100%;' href="#"><i class='fa-solid fa-angle-right'></i></a></li>
                        </ul>
                    </nav> -->
                </div>
            </div>
            <div class="row px-4 px-md-0  edit-user-form">
                <!-- load edit-user-modal-box  -->
            </div>
        </div>
    </div>
</div>
