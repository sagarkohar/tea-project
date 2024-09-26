<?php
session_start();
$username = $_SESSION['loggedin'];

// Database connection
require '../db_connect.php';
if (!$con) {
    echo ("Error" . mysqli_connect_error());
}
if (!isset($_SESSION['loggedin'])) {
    header('location:../login.php');
}
$sql = "SELECT * FROM adminlogin ";
$result = mysqli_query($con, $sql);

while ($row = $result->fetch_assoc()) {
    $image = $row['image'];
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="image/favi.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="script.js"></script>
    <!-- <title></title> -->

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="main-navbar shadow-sm sticky-top">
        <div class="top-navbar">
            <div class="container-fluid">
                <div class="row">
                    <div class=" col-4 col-sm-4 col-md-2 my-auto">
                        <img src="../image/logo2.png" alt="Avatar Logo" style=";" class="img-fluid">
                    </div>
                    <div class="col-8 col-sm-8 col-md-5 my-auto">
                        <form role="search">
                            <div class="input-group">
                                <input autofocus type="search" placeholder="Search product" class="form-control" />
                                <button class="btn bg-white" type="submit">
                                    <i class="fa fa-search text-dark"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 my-auto">
                        <ul class="nav justify-content-end">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"> <i
                                        class="fas ">
                                        <img src="<?php echo "../image/" . $image ?>" alt="Avatar Logo" style="width:50px;"
                                            class="rounded-pill">
                                    </i> </a>
                                <ul class="dropdown-menu">

                                    <li><a class="dropdown-item" href="profile.php">Profile Setting</a></li>

                                    <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                    Green Tea
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="addproduct.php">Add Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="view.php">View Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Accounts.php">Accounts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="slider.php">Slider</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="brandicons.php">Brand Icons</a>
                        </li>
                          <li class="nav-item">
                            <a class="nav-link" href="offers.php">Offers</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>