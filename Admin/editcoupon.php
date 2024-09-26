<?php
include 'header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM offers WHERE coupon_id = $id";
    $result = mysqli_query($con, $sql);
    while ($row = $result->fetch_assoc()) {
        $coupon_code = $row['coupon_code'];
        $discount = $row['discount'];
        $minimum = $row['minimum_order'];
    }
}
if (isset($_POST['btn'])) {
    $showAlert = false;
    $status = $_POST['status'];
    $coupon = $_POST['code'];
    $discount = $_POST['discount'];
    $minimum = $_POST['minimum'];

    $update = "UPDATE offers SET coupon_code= '$coupon',discount=$discount,minimum_order=$minimum WHERE coupon_id = $id ";

    $result = mysqli_query($con, $update);

    if ($result) {



        echo '  <div class="failed alert alert-success alert-dismissible fade show" role="alert">
         coupon updated sucessfully
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
<script src="bootstrap.bundle.min.js"></script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Tea</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap.bundle.min.js">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
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
                        <h2 class="card-title text-dark text-uppercase">Edit Offers</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container bg-white text-dark shadow-lg bg-body w-100 my-3">
        <div class="container bg-white text-dark shadow-lg bg-body rounded w-100 ">
            <div class="row">
                <div class="col-sm-12 col-md-12 bg-white text-dark">
                    <p class="text-success">Dashboard <span class="text-dark text-uppercase">|Edit Offers</span></p>
                </div>
            </div>
        </div>

        <h3 class="text-uppercase text-center my-5">Edit Offers</h3>

        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-12 p-3">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form mb-3 mt-3 col-md-12 col-12">
                            <label for="status" class="text-dark">Coupon Status</label>
                            <select class="form-select form-control shadow-lg border-success" id="status" name="status">
                                <option>Active</option>
                                <option>Disabled</option>
                            </select>

                        </div>

                        <div class="form mb-3 mt-3 col-md-12 col-12">
                            <label for="code" class="text-dark">Coupon Code</label>
                            <input type="text" class="form-control shadow-lg border-success" id="code" placeholder=""
                                name="code" value="<?php echo $coupon_code ?>">
                        </div>

                        <div class="form mb-3 mt-3 col-md-12 col-12">
                            <label for="discount" class="text-dark">Discount</label>
                            <input type="number" class="form-control shadow-lg border-success" id="discount"
                                placeholder="" name="discount" value="<?php echo $discount ?>" required min="1">
                        </div>
                        <div class="form mb-3 mt-3 col-md-12 col-12">
                            <label for="minimum" class="text-dark">Minimum Order</label>
                            <input type="number" class="form-control shadow-lg border-success" id="minimum"
                                placeholder="" name="minimum" value="<?php echo $minimum ?>" required min="1">
                        </div>


                    </div>




                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-12 d-flex justify-content-center gap-2">
                            <button type="submit" class="btn btn-success rounded" name="btn">Update Coupon</button>

                            <a href="brandicons.php" class="btn btn-success rounded  ">Go Back</a>

                            <a href="delete.php?coupon_id=<?php echo $id ?>" class="btn btn-success rounded"
                                name="btn">Delete</a>
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