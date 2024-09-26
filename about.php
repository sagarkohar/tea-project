<?php
include 'header.php';
?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
    <?php include 'style.css' ?>

    .reviewimage {
        display: block;
        width: 125px;
        /* Set desired width */
        height: 125px;
        /* Set desired height */
        object-fit: cover;
        border-radius: 50%;
    }


    .carousel .carousel-item {
        color: #999;
        overflow: hidden;
        min-height: 120px;
        font-size: 13px;
    }

    .carousel .media img {
        width: 80px;
        height: 80px;
        display: block;
        border-radius: 50%;
    }

    .carousel .testimonial {
        padding: 0 15px 0 60px;
        position: relative;
    }

    .carousel .testimonial::before {
        content: "\201C";
        font-family: Arial, sans-serif;
        color: #e2e2e2;
        font-weight: bold;
        font-size: 68px;
        line-height: 54px;
        position: absolute;
        left: 15px;
        top: 0;
    }

    .carousel .overview b {
        text-transform: uppercase;
        color: #1c47e3;
    }

    .carousel .carousel-indicators {
        bottom: -40px;
    }

    .carousel-indicators li,
    .carousel-indicators li.active {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        margin: 1px 3px;
        box-sizing: border-box;
    }

    .carousel-indicators li {
        background: #e2e2e2;
        border: 4px solid #fff;
    }

    .carousel-indicators li.active {
        color: #fff;
        background: #1c47e3;
        border: 5px double;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="row w-100">
            <div class="col-sm-12 col-md-12 text-dark">
                <div class="card ">
                    <img class="card-img-top w-100" src="image/p3.jpg" alt="Card image">
                    <div class="card-img-overlay d-flex align-items-center justify-content-center">
                        <h2 class="card-title text-dark text-capatilize">About us</h2>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container bg-white text-white bg-body rounded w-100 my-5">
        <div class="container bg-white text-white shadow-lg bg-body rounded w-100">
            <div class="row">
                <div class="col-sm-12 col-md-12 bg-white text-white">
                    <p class="text-success my-2">Home <span class="text-dark">| About</span></p>
                </div>
            </div>
        </div>
        <?php
        // if (!isset($_SESSION['user_name'])) {
        

        ?>


        <div class="container bg-white text-dark bg-body rounded w-100 my-2">
            <div class="row">
                <div class="col-sm-12 col-md-6 p-3 bg-white text-dark">
                    <div class="card">
                        <img class="card-img-top" src="image/6.jpg" alt="Card image">
                        <div class="card-img-overlay">
                            <p class="card-text text-white ms-4">COFFEE</p>
                            <h2 class="card-title text-white">Lemon green</h2>
                            <a href="product.php" class="btn btn-success ms-4">Shop
                                Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 p-3 bg-white text-dark">
                    <div class="card">
                        <img class="card-img-top" src="image/7.jpg" alt="Card image">
                        <div class="card-img-overlay">
                            <p class="card-text text-white ms-4 ">COFFEE</p>
                            <h2 class="card-title text-white">Lemon Teaname</h2>
                            <a href="product.php" class="btn btn-success ms-4">Shop
                                Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 p-3 bg-white text-dark">
                    <div class="card">
                        <img class="card-img-top" src="image/7.jpg" alt="Card image">
                        <div class="card-img-overlay">
                            <p class="card-text text-white ms-4 ">COFFEE</p>
                            <h2 class="card-title text-white">Lemon Teaname</h2>
                            <a href="product.php" class="btn btn-success ms-4"
                                onclick="alert('Please login first')">Shop
                                Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 p-3 bg-white text-dark">
                    <div class="card">
                        <img class="card-img-top" src="image/6.jpg" alt="Card image">
                        <div class="card-img-overlay">
                            <p class="card-text text-white ms-4">COFFEE</p>
                            <h2 class="card-title text-white">Lemon green</h2>
                            <a href="product.php" class="btn btn-success ms-4">Shop
                                Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container p-2 my-5 bg-white text-white shadow-lg bg-body rounded w-100">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <img src="image/download.png" alt="">
                    <h3 class="text-dark text-capitalize">Why choose us?</h3>
                    <p class=" text-dark">We Provide you you the best service and fast delivery</p>
                </div>
                <div class="row d-flex justify-content-around">
                    <div class="col-6 col-sm-6 col-md-3 col-lg-3 p-3 bg-white text-white">
                        <figure class="figure text-center">
                            <img src="image/icon2.png" class="rounded" alt="...">
                            <figcaption class="figure-caption">
                                <div class="text-center"> <br>
                                    <p class="h6 text-success">Great Savings</p>
                                    <p>Save big amount in each and every order.</p>
                                    <div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-6 col-sm-6 col-md-3 col-lg-3 p-3 bg-white text-white">
                        <figure class="figure text-center">
                            <img src="image/icon1.png" class="rounded" alt="...">
                            <figcaption class="figure-caption">
                                <div class="text-center"> <br>
                                    <p class="h6 text-success">24*7 Support</p>
                                    <p>one-on-one Support.</p>
                                    <div>
                            </figcaption>
                        </figure>
                    </div>

                    <div class="col-6 col-sm-6 col-md-3 col-lg-3 p-3 bg-white text-white">
                        <figure class="figure text-center">
                            <img src="image/icon0.png" class="rounded" alt="...">
                            <figcaption class="figure-caption"> <br>
                                <div class="text-center">
                                    <p class="h6 text-success">Gift Vouchers</p>
                                    <p>Vouchers on every festiivals and events.</p>
                                    <div>
                            </figcaption>
                        </figure>
                    </div>

                    <div class="col-6 col-sm-6 col-md-3 col-lg-3 p-3 bg-white text-white">
                        <figure class="figure text-center">
                            <img src="image/icon.png" class="rounded" alt="...">
                            <figcaption class="figure-caption">
                                <div class="text-center"> <br>
                                    <p class="h6 text-success">Worldwide Delivery</p>
                                    <p>We ship and delivery all over the world.</p>
                                    <div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <div class="container p-5 my-5 bg-white text-white  bg-body w-100 ">
            <div class="how-section1">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 how-img">
                        <img src="image/3.png" class="img-fluid" alt="" />
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                        <h4 class="text-success">Visit our beautiful showroom</h4>
                        <h2 class="font-weight-bold">save up to 50% off.</h2>
                        <p class="text-muted">Freedom to work on ideal projects. On GetLance, you run your own business
                            and choose your own clients and projects. Just complete your profile and we'll highlight
                            ideal jobs. Also search projects, and respond to client invitations.Wide variety and high
                            pay. Clients are now posting jobs in hundreds of skill categories, paying top price for
                            great work. More and more success. The greater the success you have on projects, the more
                            likely you are to get hired by clients that use GetLance.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 text-center">
            <img src="image/download.png" alt="">
            <h3 class="text-dark text-capitalize">What people say about us?</h3>

        </div>
       <div class="container-xl p-5">
    <div class="row">
        <div class="col-sm-12">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Carousel indicators -->
                <ol class="carousel-indicators">
                    <?php
                    $ans = mysqli_query($con, "SELECT * FROM review");
                    $num_rows = mysqli_num_rows($ans);
                    $num_pairs = floor($num_rows / 2);
                    $num_single = $num_rows % 2; // Check for the presence of a single row
                    for ($i = 0; $i < $num_pairs + $num_single; $i++) {
                        ?>
                        <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" <?php if ($i == 0)
                            echo 'class="active"'; ?>></li>
                        <?php
                    }
                    ?>
                </ol>
                <!-- Wrapper for carousel items -->
                <div class="carousel-inner">
                    <?php
                    $first = true;
                    // Display pairs of reviews
                    for ($j = 0; $j < $num_pairs; $j++) {
                        $row1 = mysqli_fetch_array($ans);
                        $row2 = mysqli_fetch_array($ans);
                        ?>
                        <div class="carousel-item <?php if ($first) {
                            echo 'active';
                            $first = false;
                        } ?>">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="media">
                                        <img src="image/<?php echo $row1['image']; ?>" class="mr-3" alt="">
                                        <div class="media-body">
                                            <div class="testimonial">
                                                <p>
                                                    <?php echo $row1['review_description']; ?>
                                                </p>
                                                <p class="overview"><b>
                                                        <?php echo $row1['name']; ?>
                                                    </b>,
                                                    <?php echo $row1['profession']; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="media">
                                        <img src="image/<?php echo $row2['image']; ?>" class="mr-3" alt="">
                                        <div class="media-body">
                                            <div class="testimonial">
                                                <p>
                                                    <?php echo $row2['review_description']; ?>
                                                </p>
                                                <p class="overview"><b>
                                                        <?php echo $row2['name']; ?>
                                                    </b>,
                                                    <?php echo $row2['profession']; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    // If there's one row left, occupy the entire column
                    if ($num_single == 1) {
                        $single_row = mysqli_fetch_array($ans); // Fetch the single row
                        ?>
                        <div class="carousel-item <?php if ($first) {
                            echo 'active';
                        } ?>">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="media">
                                        <img src="image/<?php echo $single_row['image']; ?>" class="mr-3" alt="">
                                        <div class="media-body">
                                            <div class="testimonial">
                                                <p>
                                                    <?php echo $single_row['review_description']; ?>
                                                </p>
                                                <p class="overview"><b>
                                                        <?php echo $single_row['name']; ?>
                                                    </b>,
                                                    <?php echo $single_row['profession']; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    unset($_SESSION['total_price']);
    if (isset($_SESSION['user_name'])) {
    ?>
    <a href="addreview.php">Add your Review</a>
    <?php
    }
    ?>
</div>


    </div>

    <?php
    include 'footer.php'
        ?>
</body>

</html>