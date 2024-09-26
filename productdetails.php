<?php
include 'header.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE p_id = $product_id";
    $result = mysqli_query($con, $sql);
    while ($row = $result->fetch_assoc()) {
        $id = $row['p_id'];
        $name = $row['p_name'];
        $status = $row['p_status'];
        $price = $row['p_price'];
        $image = $row['p_image'];
        $detail = $row['p_details'];
        $stock = $row['stock'];
    }
}


?>
<style>
    <?php include 'style.css' ?>


    .custom-button {
        min-width: 120px;
        /* Adjust as needed */
        white-space: nowrap;
        /* Prevent text wrapping */
        margin: 5px;
        justify-content: center;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
</head>

<body>
    <!-- <div class="container bg-white rounded"> -->

    <hr class="text-success">
    <div class="container bg-white text-white shadow-lg bg-body rounded w-100">
        <div class="row my">
            <div class="col-sm-12 col-md-12 bg-white text-white ">
                <p class="text-success my-2"> <a href="index.php" class="text-success" style="text-decoration:none">Home
                    </a><span class="text-dark">| Product deatil</span></p>
            </div>
        </div>
    </div>
    <?php
    if (!isset($_SESSION['user_name'])) {


        ?>
        <div class="container-fluid my-1">
            <div class="container bg-white text-white shadow-lg bg-body rounded w-100">
                <div class="row">
                    <div class="col-sm-12 p-3 bg-white text-dark d-flex">
                        <div class="card shadow-lg" style="width:100%">
                            <div class="content d-flex justify-content-between">

                            </div>
                            <div class="text-center">
                                <img class="card-img-top w-50 text-center" src="<?php echo "image/" . $image ?>"
                                    alt="Card image">
                            </div>
                            <div class="card-body ">
                                <div class="content my-5">

                                    <h3 class="text-center text-success">
                                        <?php echo $name ?>
                                    </h3>

                                    <p>
                                        <?php echo $detail ?>
                                    </p>
                                    <div class="row d-flex justify-content-center float-center">
                                        <div class="col-sm-12 col-md-4 col-lg-3 justify-content-center">
                                            <button type="submit" name="wishBtn" class="btn btn-success custom-button"
                                                onclick="alert('Please login first')">
                                                Add to wishlist
                                                <i class="fa fa-heart"></i>
                                            </button>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3 justify-content-center">

                                            <button type="submit" class="btn btn-success custom-button" name="cartBtn"
                                                onclick="alert('Please login first')">Add
                                                to Cart
                                                <i class="fa fa-shopping-cart"></i>
                                            </button>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3">
                                            <a href="product.php" class="btn btn-success custom-button">Go
                                                Back</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
    } else {
        ?>
            <div class="container-fluid my-1">
                <div class="container bg-white text-white shadow-lg bg-body rounded w-100">
                    <form action="add.php ?id=<?= $product_id ?>" method="post" id="f1">
                        <div class="row">
                            <div class="col-sm-12 p-3 bg-white text-dark d-flex">
                                <div class="card shadow-lg" style="width:100%">
                                    <div class="content d-flex justify-content-between">
                                        <?php
                                        if ($stock != 0) {
                                            ?>
                                            <a href="#" class="btn btn-success float-left w-auto rounded m-2">
                                                <?php echo $status ?>:
                                                <?php echo $stock?>
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="#" class="btn btn-danger bg-danger float-left w-auto rounded m-2">
                                                <?php echo $status ?>
                                            </a>
                                            <?php
                                        }
                                        ?>
                                        <h4 class="text-success">$
                                            <?php echo $price ?>/-
                                        </h4>
                                    </div>
                                    <div class="text-center">
                                        <img class="card-img-top w-50 text-center" src="<?php echo "image/" . $image ?>"
                                            alt="Card image">
                                    </div>

                                    <div class="card-body ">
                                        <div class="content my-5">

                                            <h3 class="text-center text-success">
                                                <?php echo $name ?>

                                            </h3>
                                            <p>
                                                <?php echo $detail ?>
                                            </p>
                                            <div class="row d-flex justify-content-center float-center">
                                                <div class="col-sm-12 col-md-4 col-lg-3 justify-content-center">
                                                    <button type="submit" name="wishBtn"
                                                        class="btn btn-success custom-button">Add to wishlist
                                                        <i class="fa fa-heart"></i>
                                                    </button>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 justify-content-center">

                                                    <button type="submit" class="btn btn-success custom-button"
                                                        name="cartBtn">Add
                                                        to Cart
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3">
                                                    <a href="product.php" class="btn btn-success custom-button">Go
                                                        Back</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <?php
    }
    ?>
    <?php
    include 'footer.php'
        ?>
</body>

</html>