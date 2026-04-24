<footer class='footer'>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-6">
                <h5 class='fw-bold fs-5 text-dark'>Newsletter Subscribe</h5>
                <p class='text-muted' style='font-size:15px;'>
                <?php 
                     include "config.php";
                     $query = "SELECT * FROM setting";
                     $result = mysqli_query($connection, $query);
                     if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "{$row['sub_description']}";
                        }
                     }
                ?>
                </p>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <input type="text" class='form-control news-letter-field' placeholder='Enter your email'>
                <i class="fa-solid fa-paper-plane ms-3"></i>
            </div>
        </div>
    </div>
    <div class="col-12 text-center bg-white py-4">
        <p class='text-muted fs-6 m-0'>   <?php 
                     include "config.php";
                     $query = "SELECT * FROM setting";
                     $result = mysqli_query($connection, $query);
                     if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "{$row['f_description']}";
                        }
                     }
                ?></p>
    </div>
</footer>
