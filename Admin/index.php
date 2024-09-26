<?php
include 'header.php';
$con = mysqli_connect("localhost", "root", "", "green coffee");

$sql = "SELECT * FROM registration";
$result = mysqli_query($con, $sql);

if ($result = mysqli_query($con, $sql)) {
    // Return the number of rows in result set
    $users = mysqli_num_rows($result);

}

$sql1 = "SELECT * FROM products";
$result1 = mysqli_query($con, $sql1);

if ($result1 = mysqli_query($con, $sql1)) {
    // Return the number of rows in result set
    $products = mysqli_num_rows($result1);

}

$sql2 = "SELECT * FROM products WHERE p_status='Available'";
$result2 = mysqli_query($con, $sql2);

if ($result2 = mysqli_query($con, $sql2)) {
    // Return the number of rows in result set
    $avl = mysqli_num_rows($result2);

}

$sql3 = "SELECT * FROM products WHERE p_status='out of stock'";
$result3 = mysqli_query($con, $sql2);

if ($result3 = mysqli_query($con, $sql3)) {
    // Return the number of rows in result set
    $out = mysqli_num_rows($result3);

}

$sql4 = "SELECT * FROM contact";
$result4 = mysqli_query($con, $sql4);

if ($result4 = mysqli_query($con, $sql4)) {
    // Return the number of rows in result set
    $t_message = mysqli_num_rows($result4);

}

$sql5 = "SELECT * FROM orders";
$result5 = mysqli_query($con, $sql5);

if ($result5 = mysqli_query($con, $sql5)) {
    // Return the number of rows in result set
    $orders = mysqli_num_rows($result5);
}

$sql6 = "SELECT * FROM slider";
$result6 = mysqli_query($con, $sql6);

if ($result6 = mysqli_query($con, $sql6)) {
    // Return the number of rows in result set
    $sliders = mysqli_num_rows($result6);
}

$sql7 = "SELECT * FROM brand_icon";
$result7 = mysqli_query($con, $sql7);

if ($result7 = mysqli_query($con, $sql7)) {
    // Return the number of rows in result set
    $icons = mysqli_num_rows($result7);
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
    <title>Green Tea Dashboard</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="script.js"></script>
</head>

<body>

    <div class="container d-flex justify-content-center">
        <div class="row w-100">
            <div class="col-sm-12 col-md-12 text-dark">
               
            </div>
        </div>
    </div>
    </div>
    <div class="container bg-white text-dark shadow-lg bg-body w-100 my-3">
        <div class="container bg-white text-dark shadow-lg bg-body rounded w-100 ">
            <div class="row">
                <!-- <div class="col-sm-12 col-md-12 bg-white text-dark">
                    <p class="text-success">Home <span class="text-dark">| DASHBOARD</span></p>
                </div> -->
            </div>
        </div>

        <h3 class="text-uppercase text-center my-5">Dashboard</h3>
        <div class="row gap-1">
            <div class="container p-3 col-12 col-sm-12 col-md-5 bg-white shadow-lg bg-body rounded text-center ">
                <h4>Welcome!</h4>
                <p>
                    surendra
                </p>
                <a href="profile.php" class="btn btn-success float-left w-auto rounded">Profile</a>
            </div>
            <div class="container p-3 col-12 col-sm-12 col-md-5 bg-white shadow-lg bg-body rounded text-center">
                <h4>
                    <?php echo $products ?>
                </h4>
                <p>Products Added</p>
                <a href="addproduct.php" class="btn btn-success float-left w-auto rounded">Add New Products</a>
            </div>
            <div class="container p-3 col-12 col-sm-12 col-md-5 bg-white shadow-lg bg-body rounded text-center my-3">
                <h4>
                    <?php echo $avl ?>
                </h4>
                <p>Total Available Products</p>
                <a href="astatus.php" class="btn btn-success float-left w-auto rounded">View Available Products</a>
            </div>
            <div class="container p-3 col-12 col-sm-12 col-md-5 bg-white shadow-lg bg-body rounded text-center my-3">
                <h4>
                    <?php echo $out ?>
                </h4>
                <p>Total Out of stock Products</p>
                <a href="outstock.php" class="btn btn-success float-left w-auto rounded">View out of stock Products</a>
            </div>
            <div class="container p-3 col-12 col-sm-12 col-md-5 bg-white shadow-lg bg-body rounded text-center my-3">
                <h4>
                    <?php echo $users ?>
                </h4>
                <p>Registered Users</p>
                <a href="Accounts.php" class="btn btn-success float-left w-auto rounded">View Users</a>
            </div>

            <div class="container p-3 col-12 col-sm-12 col-md-5 bg-white shadow-lg bg-body rounded text-center my-3">
                <h4>
                    <?php echo $t_message ?>
                </h4>
                <p>Unread Message</p>
                <a href="unread.php" class="btn btn-success float-left w-auto rounded">View Message</a>
            </div>
            <div class="container p-3 col-12 col-sm-12 col-md-5 bg-white shadow-lg bg-body rounded text-center my-3">
                <h4>
                    <?php echo $orders ?>
                </h4>
                <p>Total Orders Placed</p>
                <a href="orders.php" class="btn btn-success float-left w-auto rounded">View Orders</a>
            </div>

             <div class="container p-3 col-12 col-sm-12 col-md-5 bg-white shadow-lg bg-body rounded text-center my-3">
                <h4>
                    <?php echo $sliders ?>
                </h4>
                <p>Slider Added</p>
                <a href="slider.php" class="btn btn-success float-left w-auto rounded">View Sliders</a>
            </div>

            <div class="container p-3 col-12 col-sm-12 col-md-5 bg-white shadow-lg bg-body rounded text-center my-3">
                <h4>
                    <?php echo $icons ?>
                </h4>
                <p>Brand Icons Added</p>
                <a href="brandicons.php" class="btn btn-success float-left w-auto rounded">View Brand Icons</a>
            </div>
        </div>
    </div>
    <?php
    include 'footer.php'
        ?>
</body>

</html>