<?php
include 'header.php';

$sql = "SELECT * FROM products";
$result = mysqli_query($con, $sql);
unset($_SESSION['total_price']);
?>
<style>
    <?php include 'style.css' ?>
    .bn {
        border: none;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>

<body>
    <div class="addedcart alert alert-success alert-dismissible fade show d-none" role="alert">
        Item added to cart successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="existscart alert alert-danger alert-dismissible fade show d-none" role="alert">
        Item already exists in cart
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="addedwish alert alert-success alert-dismissible fade show d-none" role="alert">
        Item added to wishllist successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="existswish alert alert-danger alert-dismissible fade show d-none" role="alert">
        Item already exists in wishlist
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="orderplaced alert alert-success alert-dismissible fade show d-none" role="alert">
        Your order has been successfully placed
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

      <div class="outofstock alert alert-danger alert-dismissible fade show d-none" role="alert">
        One of the item is out of stock
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="outofstock1 alert alert-danger alert-dismissible fade show d-none" role="alert">
        This item is out of stock
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    if (isset($_COOKIE['addedcart'])) {

        echo "<script>$('.addedcart').removeClass('d-none');</script>";
    }

    if (isset($_COOKIE['existscart'])) {

        echo "<script>$('.existscart').removeClass('d-none');</script>";
    }

    if (isset($_COOKIE['addedwish'])) {

        echo "<script>$('.addedwish').removeClass('d-none');</script>";
    }

    if (isset($_COOKIE['existswish'])) {

        echo "<script>$('.existswish').removeClass('d-none');</script>";
    }

    if (isset($_COOKIE['payment'])) {

        echo "<script>$('.orderplaced').removeClass('d-none');</script>";
    }

    if (isset($_SESSION['outofstock'])) {
        echo "<script>$('.outofstock').removeClass('d-none');</script>";
    }

    if (isset($_SESSION['outofstock1'])) {
        echo "<script>$('.outofstock1').removeClass('d-none');</script>";
    }
unset($_SESSION['outofstock']);
    unset($_SESSION['outofstock1']);
    ?>
    <div class="container d-flex justify-content-center">
        <div class="row w-100">
            <div class="col-sm-12 col-md-12 text-dark">
                <div class="card ">
                    <img class="card-img-top w-100" src="image/p3.jpg" alt="Card image">
                    <div class="card-img-overlay d-flex align-items-center justify-content-center">
                        <h2 class="card-title text-dark text-capatilize">Products</h2>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (!isset($_SESSION['user_name'])) {

        ?>
        <div class="container bg-white text-white shadow-lg bg-body rounded w-100 my-5">
            <div class="container bg-white text-white shadow-lg bg-body rounded w-100">
                <div class="row">
                    <div class="col-sm-12 col-md-12 bg-white text-white">
                        <p class="text-success">Home <span class="text-dark">| Product deatil</span></p>
                    </div>
                </div>
            </div>
            <div class="container bg-white text-dark shadow-lg bg-body rounded w-100 my-2">
                <div class="row justify-content-center">

                    <?php
                    while ($row = $result->fetch_assoc()) {
                        $pid=$row['p_id'];
                        $stock=$row['stock'];
                      
                        ?>
                        <div class="col-sm-12 col-md-6 col-lg-4  p-3 bg-white text-dark">
                            <div class="card">

                                <img class="shop card-img-top" src="<?php echo "image/" . $row['p_image']; ?>" alt="Card image">
                                <div class="card-body ">

                                    <div class=" bg-success rounded w-auto float-end my-2">
                                        <ul class="nav justify-content-center text-dark">
                                            <li class="">
                                                <a href="login.php" onclick="alert('Please login first')">
                                                    <i class="fa fa-shopping-cart text-dark"></i>
                                                </a>
                                            </li>
                                            <li class="mx-2">
                                                <a href="login.php" onclick="alert('Please login first')">
                                                    <i class="fa fa-heart text-dark"></i>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="productdetails.php ?id=<?= $row['p_id'] ?>">
                                                    <i class="fa fa-eye text-dark"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="content my-5">

                                        <h5>
                                            <?php echo $row['p_name']; ?>
                                        </h5>

                                        <p class="text-success">Price:
                                            <?php echo $row['p_price'];
                                            ?>/-
                                        </p>
                                        <div class="row d-flex align-items-center justify-content-center float-start">
                                            <div class="buy col-10 col-sm-10 col-md-10 col-lg-8">

                                                <a href="login.php" class="btn btn-success float-left  rounded w-75"
                                                    onclick="alert('Please login first')">Shop now</a>
                                            </div>
                                            <div class="form-group col-2 col-sm-2 col-md-2 col-lg-4">
                                                <input class="form text-center" id="inputdefault" type="number" placeholder="1"
                                                    name="qnt">
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

        <?php
    } else {

        ?>

        <div class="container bg-white text-white shadow-lg bg-body rounded w-100 my-5">
            <div class="container bg-white text-white shadow-lg bg-body rounded w-100">
                <div class="row">
                    <div class="col-sm-12 col-md-12 bg-white text-white">
                        <p class="text-success">Home <span class="text-dark">| Product deatil</span></p>
                    </div>
                </div>
            </div>
            <div class="container bg-white text-dark shadow-lg bg-body rounded w-100 my-2">
                <div class="row justify-content-center">

                    <?php
                    while ($row = $result->fetch_assoc()) {

                        $id = $row['p_id'];
                        ?>
                        <div class="col-sm-12 col-md-6 col-lg-4  p-3 bg-white text-dark">

                            <form action="add.php ?id=<?= $row['p_id'] ?>" method="post" id="f1">
                                <div class="card">
                                    <a class="" href="productdetails.php ?id=<?= $row['p_id'] ?>">
                                        <img class="shop card-img-top" src="<?php echo "image/" . $row['p_image']; ?>"
                                            alt="Card image">
                                    </a>

                                    <div class="card-body ">

                                        <div class=" bg-success rounded w-auto float-end my-2">
                                            <ul class="nav justify-content-center text-dark">

                                                <li class="">

                                                    <button type="submit" class="bn bg-success" name="cartBtn" id="cartBtn">
                                                        <i class="fa fa-shopping-cart text-dark"></i>
                                                    </button>


                                                </li>
                                                <li class="mx-2">
                                                    <button type="submit" class="bn bg-success" name="wishBtn" id="wishBtn">
                                                        <i class="fa fa-heart text-dark"></i>
                                                    </button>

                                                </li>
                                                <li class="">
                                                    <a class="" href="productdetails.php ?id=<?= $row['p_id'] ?>">
                                                        <i class="fa fa-eye text-dark"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="content my-5">

                                            <h5>
                                                <a class="text-decoration-none text-dark" href="productdetails.php ?id=<?= $row['p_id'] ?>">
                                                    <?php echo $row['p_name']; ?>
                                                </a>
                                            </h5>

                                            <p class="text-success">Price: $
                                                <?php echo $row['p_price']; ?>/-
                                            </p>
                                            <div class="row d-flex align-items-center justify-content-center float-start">
                                                <div class="buy col-10 col-sm-10 col-md-10 col-lg-8">
                                                    <a href="checkout.php ?id=<?= $row['p_id'] ?>" name="qnt"
                                                        class="btn btn-success float-left rounded w-75" id="shop">Shop
                                                        now</a>
                                                </div>
                                                <div class="form-group col-2 col-sm-2 col-md-2 col-lg-4">
                                                    <input class="form text-center" id="inputdefault" type="number" name="qnt"
                                                        min="1" value="1">

                                                </div>
                            </form>
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


        ?>

    </body>

    </html>

    <!-- Bootstrap JS -->
    <script src="jquery-3.7.1.min.js"></script>
    <script src="jquery.validate.js"></script>

    <script>

        $(document).ready(function () {
            $('[name="cartBtn"]').click(function (e) {

                //Add validation rules for each form
                $('form').each(function () {
                    var form = this; // Capture the form element
                    var isFirstError = true;
                    $(this).validate({
                        rules: {
                            qnt: {
                                required: true,
                                min: 1
                            }
                        },
                        messages: {
                            qnt: {
                                required: "Please select a quantity",
                                min: "Please select at least 1 item"

                            }
                        },
                        errorPlacement: function (error, element) {
                            if (isFirstError) {
                                alert(error.text());
                                isFirstError = false; // Update flag to indicate error has been shown
                            }
                        }
                    });
                });
            });
        });




    </script>
    <?php
    }
    ?>

<?php
include 'footer.php'
    ?>
</body>

</html>