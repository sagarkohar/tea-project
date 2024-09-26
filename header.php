<?php
require 'db_connect.php';

session_start();


if (isset($_SESSION['user_name'])) {
    $username = $_SESSION['user_name'];

    $sql = "SELECT * FROM cart WHERE user_name='$username'";
    $result = mysqli_query($con, $sql);
    if ($result = mysqli_query($con, $sql)) {
        // Return the number of rows in result set
        $rowcount = mysqli_num_rows($result);
    }
    
    $sql1 = "SELECT * FROM wishlist WHERE user_name='$username'";
    $result1 = mysqli_query($con, $sql1);
    if ($result1 = mysqli_query($con, $sql1)) {
        // Return the number of rows in result set
        $rowcount1 = mysqli_num_rows($result1);
    }

   
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
    <style>

    </style>


    <link href="https:/stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.bundle.min.js">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="main-navbar shadow-sm sticky-top">
        <div class="top-navbar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4 col-sm-4 col-md-2 my-auto">
                        <a href="index.php">
                            <img src="image/logo2.png" alt="Avatar Logo" style=";" class="img-fluid"> </a>
                    </div>
                    <div class="col-8 col-sm-8 col-md-5 my-auto">
                        <!-- <form role="search" autocomplete="off"> -->
                        <div class="input-group">
                            <input type="search" name="search" placeholder="Search your product" class="form-control"
                                oninput="fetchProducts(this.value)" autocomplete="off" />
                            <button class="btn bg-white" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                        <!-- </form> -->

                    </div>

                    <div class="col-12 col-sm-12 col-md-4 my-auto">
                        <ul class="nav justify-content-end">
                            <?php
                            if (!isset($_SESSION['user_name'])) {
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php">
                                        <i class="fa fa-shopping-cart"></i> Cart (0)
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php">
                                        <i class="fa fa-heart"></i> Wishlist (0)
                                    </a>
                                </li>
                                <li class="nav-item"><a href="login.php" class=""><button type="button"
                                            class="btn btn-outline-dark text-white">Log in</button></a></li>
                                <?php
                            } else {
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="cart.php">
                                        <i class="fa fa-shopping-cart"></i> Cart (
                                        <?php echo $rowcount ?>)
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="wishlist.php">
                                        <i class="fa fa-heart"></i> Wishlist (
                                        <?php echo $rowcount1 ?>)
                                    </a>
                                </li>
                                <li class="nav-item dropdown pr">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"> <i
                                            class="fas fa-user text-white"></i> </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                        <li><a class="dropdown-item" href="order.php">My Orders</a></li>

                                        <li><a class="dropdown-item" name="btn" href="logout.php">Logout</a></li>
                                        <?php
                            }
                            ?>
                                </ul>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                    Green Coffee
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="product.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact Us</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
<div id="searchResults" class="searchResults" stytle="display:none">
    <!-- Search results will be displayed here -->
</div>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    
    function fetchProducts(searchTerm) {
        if (searchTerm.trim() !== '') {
        $.ajax({
            url: 'search.php',
            method: 'POST',
            data: { search: searchTerm },
            success: function (response) {
                // Update the content of searchResults div
                $('#searchResults').html(response);

                // Apply CSS styles
                $('#searchResults').css({
                   
                    'position': 'fixed',
                    'top': '25%',
                    'left': '35%',
                    'transform': 'translate(-50%, -50%)',
                    'width': '40%',
                    'max-height': '200px',
                    'overflow-y': 'auto',
                    'background-color': 'white',
                    'box-shadow': '0px 0px 5px rgba(0, 0, 0, 0.1)',
                    'border': '1px solid #ccc',
                    'border-radius': '5px',
                    'z-index': '999',
                    'padding': '10px'
                });

                // Apply CSS styles to inner divs
                $('#searchResults div').css({
                    'padding': '10px',
                    'color': '#333',
                    'cursor': 'pointer'
                });

                // Apply hover effect to inner divs
                $('#searchResults div').hover(function () {
                    $(this).css('background-color', '#f0f0f0');
                }, function () {
                    $(this).css('background-color', 'initial');
                });

                // Show the searchResults div
                $('#searchResults').show();
            }
        });
    }
    else{
         $('#searchResults').hide();
    }
    }

</script>

<!-- Inside your HTML file -->
<div class="invalid alert alert-danger alert-dismissible fade show d-none" role="alert">
    <strong>Error: </strong> Invalid Credaintls
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<div class="inactive alert alert-danger alert-dismissible fade show d-none" role="alert">
    <strong>Error: </strong>Your account is not verified yet. Please check your email with the verification link to
    activate your account. Kindly check spam folder as well.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<div class="verified alert alert-success alert-dismissible fade show d-none" role="alert">
    <strong>Success: </strong>Your account has been verified and you can login now.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<div class="sendverify alert alert-success alert-dismissible fade show d-none" role="alert">
    <strong>Verification Link </strong>Has been sent to your email, kindly check spam also
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<div class="failed alert alert-danger alert-dismissible fade show d-none" role="alert">
    <strong>Error: </strong>Sending the Mail.Kindly Check your Internet Connection
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<div class="otpsent alert alert-success alert-dismissible fade show d-none" role="alert">
    <strong>Success: </strong>OTP sent to your mail.Kindly Check spam also
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php


if (isset($_COOKIE['success'])) {

    echo "<script>$('.sendverify').removeClass('d-none');</script>";

}

if (isset($_COOKIE['verified'])) {

    echo "<script>$('.verified').removeClass('d-none');</script>";
}

if (isset($_COOKIE['failed'])) {
  
    echo "<script>$('.failed').removeClass('d-none');</script>";
}


if (isset($_COOKIE['otpsent'])) {
    echo "<script>$('.otpsent').removeClass('d-none');</script>";
}

if (isset($_COOKIE['otpverified'])) {
    echo "<script>$('.otpverified').removeClass('d-none');</script>";
}
if (isset($_POST["loginBtn"])) {

    if ($invalid) {
        unset($_COOKIE['success']);
        unset($_COOKIE['verified']);
        unset($_COOKIE['failed']);
        $inactive = false;
        echo "<script>$('.invalid').removeClass('d-none');</script>";

    }

    if ($inactive) {
        unset($_COOKIE['success']);
        unset($_COOKIE['verified']);
        unset($_COOKIE['failed']);
        $invalid = false;
        echo "<script>$('.inactive').removeClass('d-none');</script>";

    }

}
?>