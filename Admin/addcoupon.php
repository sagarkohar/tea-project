<?php
include 'header.php';

if (isset($_POST['btn'])) {
    $showAlert = false;
    $coupon = mysqli_real_escape_string($con, $_POST['coupon']);
    $discount = mysqli_real_escape_string($con, $_POST['discount']);
    $minimum = mysqli_real_escape_string($con, $_POST['minimum']);



    $insert = "INSERT INTO offers (coupon_code, discount, minimum_order)
           VALUES ('$coupon',$discount,$minimum)";

    $result = mysqli_query($con, $insert);

    if ($result) {
        echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
        coupon added successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    } else {
        echo "error" . $con->error;
    }
}

?>
<style>
    <?php include 'style.css' ?>
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Coupon</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="script.js"></script>
</head>

<body>
    <?php
  
    ?>
    <div class="container d-flex justify-content-center">
        <div class="row w-100">
            <div class="col-sm-12 col-md-12 text-dark">
                <div class="card ">
                    <img class="card-img-top w-100" src="../image/p3.jpg" alt="Card image">
                    <div class="card-img-overlay d-flex align-items-center justify-content-center">
                        <h2 class="card-title text-dark text-uppercase">Add Coupon</h2>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container bg-white text-dark shadow-lg bg-body w-100 my-3 p-3">
        <div class="container bg-white text-dark shadow-lg bg-body rounded w-100 ">
            <div class="row">
                <div class="col-sm-12 col-md-12 bg-white text-dark">
                    <p class="text-success">Dashboard <span class="text-dark text-uppercase">|Add Coupon</span></p>
                </div>
            </div>
        </div>

        <h3 class="text-uppercase text-center my-5">Add Coupon</h3>

        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-12 p-3">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">

                        <div class="form mb-3 mt-3 col-md-12">
                            <label for="coupon" class="text-success">Coupon Code</label><br>
                            <input type="text" name="coupon" id="coupon" class="form-control border-success">
                        </div>

                        <div class="form mb-3 mt-3 col-md-12">
                            <label for="discount" class="text-success">Discount%</label>
                            <input type="number" name="discount" id="discount" class="form-control border-success" min="1">
                        </div>

                        <div class="form mb-3 mt-3 col-md-12">
                            <label for="minimum" class="text-success">Minimum Purchase</label>
                            <input type="number" name="minimum" id="minimum" class="form-control border-success" min="1">
                        </div>
                        <div class="buttons d-flex justify-content-center w-100" style="gap:1.5rem">
                            <div class="log d-flex ">
                                <button type="submit" class="btn btn-success w-auto shadow border-success text-white"
                                    name="btn">
                                    Add Coupon</button>
                            </div>
                           
                        </div>

                    </div>
                </form>
            </div>
        </div>


    </div>
    <?php
    include 'footer.php'
        ?>
</body>

</html>