<?php
include 'header.php';
$sql = "SELECT * FROM cart WHERE user_name='$username'";
$result = mysqli_query($con, $sql);
if ($result = mysqli_query($con, $sql)) {
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows($result);
}

$sql1 = "SELECT * FROM registration WHERE user_name='$username'";
$result1 = mysqli_query($con, $sql1);
while ($row = $result1->fetch_assoc()) {
    $create = $row['create_time'];
}


$total_price = 0;
$quantity = 0;
$product_names = array();
?>
<style>
    <?php include 'style.css' ?>
    .d-flex a {
        text-decoration: none;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="icon" type="image/png" href="image/favi.png">

    <style>

    </style>
</head>

<body>
    <div class="removed alert alert-success alert-dismissible fade show d-none" role="alert">
        Item removed from cart successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    if (isset($_COOKIE['removed'])) {

        echo "<script>$('.removed').removeClass('d-none');</script>";
    }
    ?>
    <!-- cart + summary -->
    <section class="bg-light my-5">

        <div class="container">
            <div class="row">

                <!-- cart -->
                <div class="col-lg-9">
                    <div class="card border shadow-0">
                        <div class="m-4">
                            <h4 class="card-title mb-4">Your shopping cart</h4>
                            <?php
                            if ($rowcount > 0) {


                                while ($row = $result->fetch_assoc()) {
                                    $pid = $row['p_id'];
                                    ?>

                                    <div class="row gy-3 mb-4">
                                        <div class="col-lg-5">
                                            <div class="me-lg-5">
                                                <div class="d-flex">
                                                    <a href="productdetails.php?id=<?php echo $row['p_id'] ?>">
                                                        <img src="<?php echo "image/" . $row['p_image'] ?>"
                                                            class="border rounded me-3" style="width: 96px; height: 96px;" />
                                                    </a>
                                                    <div class="d-flex w-100">
                                                        <a href="productdetails.php?id=<?php echo $row['p_id'] ?>">
                                                            <h5 class="text-black">
                                                                <?php echo $product_names[] = $row['p_name'];
                                                                $_SESSION['p_names'] = $product_names;
                                                                ?>

                                                            </h5>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                                            Quantity:
                                            <div class="col-8">
                                                <input type="number" class="form-control" name="qnt" id="qnt" min="1"
                                                    value="<?php echo $qnt = $row['quantity']; ?>"
                                                    onchange="window.location.href='updateqnt.php?qnt=' + this.value + '&pid=<?php echo $pid; ?>'">
                                                <?php
                                                $quantity += $qnt;
                                                $_SESSION['quantity'] = $quantity;
                                                ?>

                                            </div>
                                            <div class="">
                                                <text class="h6">$
                                                    <?php echo $tprice = $row['t_price'];

                                                    $total_price += $tprice;
                                                    $t_price = $total_price;

                                                    $tax = 10;

                                                    $_SESSION['total_price'] = $total_price;

                                                    ?>

                                                </text> <br />
                                                <small class="text-muted text-nowrap">
                                                    $ <?php echo $pprice = $row['p_price']; ?>
                                                    / per item
                                                </small>

                                            </div>
                                        </div>
                                        <div
                                            class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                                            <div class="float-md-end">
                                                <a href="delete.php ?id=<?= $row['p_id'] ?>"
                                                    class="btn-danger btn-sm text-danger" style="text-decoration:none">
                                                    <i class="fa fa-trash"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>

                                    <?php

                                }
                            } else {
                                $t_price = 0;
                                $discount = 0;
                                $tax = 0;
                                ?>
                                <p>Your Cart is empty</p>
                                <a href="product.php">Explore</a>
                                <?php
                                // Free result set
                                mysqli_free_result($result);
                            }
                            ?>


                        </div>

                        <div class="border-top pt-4 mx-4 mb-4">
                            <p><i class="fas fa-truck text-muted fa-lg"></i> Free Delivery within 1-2 weeks</p>
                            <p class="text-muted">

                                Savor the soothing taste of our premium green tea blends, delivered straight to you with
                                our complimentary shipping service, guaranteeing arrival within a mere 1-2 weeks.
                                Embrace the tranquility of each sip as you indulge in the refreshing goodness of
                                nature's finest leaves. From delicate sencha to robust matcha, our selection promises a
                                journey through the verdant landscapes of Japan and beyond. Elevate your tea ritual to
                                new heights of enjoyment with every package delivered to your door, bringing the essence
                                of relaxation and wellness into your daily routine.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- cart -->
                <!-- summary -->
                <div class="col-lg-3">
                    <div class="card mb-3 border shadow-0">
                        <div class="card-body">
                            <form method="post">
                                <div class="form-group">
                                    <label class="form-label">Have coupon?</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control border" name="coupon"
                                            value="<?php echo isset($_POST['coupon']) ? htmlspecialchars($_POST['coupon']) : ''; ?>"
                                            placeholder="Coupon code" />
                                        <button class="btn btn-success border" name="applyBtn">Apply</button> <br>

                                    </div>
                                    <span id='show'></span><br>
                                    <i class="fa-solid fa-tag"></i>
                                    <a href="viewcoupon.php" class="text-decoration-none text-dark">view more coupons
                                        <i class="fa-solid fa-chevron-right flex-end"></i>
                                    </a>

                                </div>

                            </form>

                            <?php

                            $discount_amount = 0; // Initialize discount amount to 0
                            
                            if (isset($_POST['applyBtn'])) {
                                $coupon_code = trim($_POST['coupon']);

                                $offer = mysqli_query($con, "SELECT * FROM offers");

                                while ($detail = $offer->fetch_assoc()) {
                                    $coupon = trim($detail['coupon_code']);
                                    $discount = $detail['discount'];
                                    $condition = $detail['minimum_order'];
                                    
                                    // Convert $create time to a Unix timestamp
                                    $create_timestamp = strtotime($create);

                                    // Set the default timezone to Asia/Kolkata
                                    date_default_timezone_set('Asia/Kolkata');

                                    $expiry = strtotime('-5 days');

                                    if ($create_timestamp < $expiry && $coupon_code == 'NEWUSER15') {
                                        echo "<script>document.getElementById('show').innerHTML = 'Only for new user';</script>";
                                        break;
                                    }
                                     if ($coupon_code != $coupon) {
                                        echo "<script>document.getElementById('show').innerHTML = 'Invalid coupon';</script>";
                                    
                                     }
                                    if ($total_price >= $condition) {

                                        if ($coupon_code == $coupon) {
                                            $discount_amount = $total_price * ($discount / 100); // Calculate the discount amount
                                            echo "<script>document.getElementById('show').innerHTML = '$discount% off applied';</script>";
                                            break; // Exit the loop once a matching coupon is found
                                        }

                                    } else {
                                        echo "<script>document.getElementById('show').innerHTML = 'Minimum price should be $condition';</script>";
                                        break;
                                    }
                                }
                            }
                            $total_price = ($total_price - $discount_amount) + $tax; // Update total price after applying discount
                            ?>


                        </div>
                    </div>





                    <div class="card shadow-0 border">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">

                                <p class="mb-2">Total price:</p>
                                <?php

                                ?>
                                <p class="mb-2">
                                    <?php echo $t_price ?>
                                </p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Discount:</p>
                                <p class="mb-2 text-success">-$ <?php echo $discount_amount ?></p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">TAX:</p>
                                <p class="mb-2">$10.00</p>
                            </div>
                            <hr />
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Total price:</p>
                                <p class="mb-2 fw-bold">$
                                    <?php echo $total_price ?>
                                </p>
                            </div>

                            <div class="mt-3">
                                <a href="checkout.php ?id=<?= $pid ?>" class="btn btn-success w-100 shadow-0 mb-2"> Make
                                    Purchase </a>
                                <a href="product.php" class="btn btn-success w-100 border mt-2"> Back to shop </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- summary -->

            </div>
        </div>

    </section>

    <?php
    include 'footer.php'
        ?>

</body>

</html>