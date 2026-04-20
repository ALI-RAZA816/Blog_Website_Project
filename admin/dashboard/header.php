  <?php session_start(); ?>
<header class='d-flex py-2 justify-content-between align-items-center px-3' id="header">
    <h2 class='fw-bold fs-3 mb-0 text-dark me-2 d-flex align-items-center'><i class='fa-solid fa-bars text-dark me-lg-0 me-3 d-lg-none dashboard-bars' style='cursor:pointer;'></i>Dashboard</h2>
    <div class='accounts d-flex justify-content-between align-items-center'>
        <div class='d-flex justify-content-between align-items-center search-bar'>
            <i class='fa-solid fa-magnifying-glass search-icon'></i>
            <input type="text" class='form-control' placeholder='Search...'>
        </div>
        <div class="user overflow-hidden bg-secondary-subtle user-profile-icon d-flex justify-content-center align-items-center ms-2 ms-md-5">
            <div class='profile-img '></div>
        </div>
        
        <div class="logout rounded-3">
            <?php 
                include "config.php";
                if(!isset($_SESSION['username'])){
                    echo "<a href='index.php' class='text-decoration-none'><button class='signup-button rounded-2 px-2 mt-2 d-flex justify-content-center align-items-center'><i class='fa-solid fa-user me-2'></i>SignUp</button></a>";
                }else{
                    echo "<button class='logout-button rounded-2 px-2 d-flex justify-content-center align-items-center'><i class='fa-solid fa-right-from-bracket me-2'></i>Logout</button>";
                }
            ?>
        </div>
    </div>
</header>
