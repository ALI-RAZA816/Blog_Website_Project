<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meranda - Blog Website</title>
    <!-- BOOTSTRAP CDN LINK -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- FONTAWESOME CDN LINK  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    <!-- STYLESHEET LINK  -->
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/utils.css"/>
</head>
<body>
    <header class='bg-light py-2'>
        <div class="container">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-sm-6 d-flex justify-content-between align-items-center col-md-6">
                    <!-- Meranda -->
                    <?php 
                        include "config.php";
                        $query = "SELECT * FROM setting";
                        $result = mysqli_query($connection, $query);
                        $row = mysqli_fetch_assoc($result);
                        if($row['website_name'] == ''){
                            echo " <img src='images/logo/{$row['logo']}' style='height:50px;width:50px;object-fit:cover;' alt=''>";
                        }else{
                            echo "<h2 class='navbar-brand m-0'><a href='index.php' class='logo-name text-dark text-decoration-none fw-bold fs-1'>{$row['website_name']}</a></h2>";
                        }
                    ?>
                    <i class='fa-solid fa-bars' id='bars'></i>
                </div>
                <div class="col-sm-6 col-md-6 search d-flex justify-content-sm-end align-items-center ">
                    <input type="text" class="form-control me-3" placeholder='Search'>
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
        </div>
    </header>
    <div class="category-links">
        <div class="container">
            <div class="row">
                <div class="col-12 border-bottom py-2 p-0">
                    <ul class="nav">
                        <i class='fa-solid fa-xmark text-right m-2 fs-5' id='xmark'></i>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link me-md-3" href="#">Categories</a></li>
                        <li class="nav-item"><a class="nav-link me-md-3" href="category.php">Politics</a></li>
                        <li class="nav-item"><a class="nav-link me-md-3" href="category.php">Business</a></li>
                        <li class="nav-item"><a class="nav-link me-md-3" href="category.php">Health</a></li>
                        <li class="nav-item"><a class="nav-link me-md-3" href="category.php">Design</a></li>
                        <li class="nav-item"><a class="nav-link me-md-3" href="category.php">Sport</a></li>
                        <li class="nav-item"><a class="nav-link me-md-3" href="contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src='js/main.js'></script>
</body>
</html>