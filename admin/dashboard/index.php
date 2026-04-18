<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <!-- BOOTSTRAP CDN LINK -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- FONTAWESOME CDN LINK  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    <!-- STYLESHEET LINK  -->
    <link rel="stylesheet" href="../../css/style.css"/>
    <link rel="stylesheet" href="../../css/utils.css"/>
</head>
<body>
    <div class="container-fluid p-0 bg-white">
        <div class="row d-flex vh-100 justify-content-center align-items-center">
            <div class="col-3 bg-white rounded-3 p-3" style='box-shadow:0 0 10px #efefef;'>
                <h2 style='color:royalblue' class='fw-bold text-center'>SignUp</h2>
                <form action="">
                    <div class='mb-2'>
                        <label for="" class='form-label mb-1'>First Name</label>
                        <div><input type="text" class='form-control firstname'></div>
                    </div>
                    <div class='mb-2'>
                        <label for="" class='form-label mb-1'>Last Name</label>
                        <div><input type="text" class='form-control lastname'></div>
                    </div>
                    <div class='mb-2'>
                        <label for="" class='form-label mb-1'>Password</label>
                        <div><input type="password" class='form-control password'></div>
                    </div>
                    <div>
                        <label for="" class='form-label'>Email</label>
                        <div><input type="text" class='form-control email'></div>
                    </div>
                    <button style='background-color:royalblue;border-color:royalblue;' class='btn mt-3 btn-primary d-block w-100 signup'>SignUp</button>
                    <span class='d-flex mt-2'>Already have an account <a href="login.php" class='text-decoration-none ms-2' style='color:royalblue;'>Login</a></span>
                </form>
            </div>
        </div>
    </div>
</body>
<script src='../../js/jquery.js'></script>
<script src='../../js/script.js'></script>
</html>