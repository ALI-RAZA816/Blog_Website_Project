<div class="cotainer-fluid">
    <div class="row g-0">
        <div class="col-lg-2 vh-100 bg-white sidebar px-3 py-4">
            <i class='fa-solid fa-angle-right' id='dashboard-angle-right'></i>
            <?php include "sidebar.php" ?>
        </div>
        <div class="col-lg-10 border">
            <?php include "header.php" ?>
            <div class="row p-0 my-4 px-4 g-0 user-cards"></div>
            <div class="row g-0 p-0 px-4">
                <div class="col-12">
                    <h2 class='fs-3 fw-bold' style='color:royalblue;'>Users</h2>
                    <div class='row d-flex flex-column userOuput align-items-start g-0 p-0' style='min-height:55vh;'>
                        <!-- load user data from database  -->
                    </div>
                </div>
            </div>
            <div class="row px-4 px-md-0  edit-user-form">
                <!-- load edit-user-modal-box  -->
            </div>
        </div>
    </div>
</div>
