<?php
include 'header.php';

$sql = "SELECT * FROM wishlist WHERE user_name='$username'";
$result = mysqli_query($con, $sql);

if ($result = mysqli_query($con, $sql)) {
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows($result);
}
?>
<style>
    <?php include 'style.css' ?>
    /* Cart or Wishlist */
    .shopping-cart .cart-header {
        padding: 10px;
    }

    .shopping-cart .cart-header h4 {
        font-size: 18px;
        margin-bottom: 0px;
    }

    .shopping-cart .cart-item a {
        text-decoration: none;
    }

    .shopping-cart .cart-item {
        background-color: #fff;
        box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
        padding: 10px 10px;
        margin-top: 10px;
    }

    .shopping-cart .cart-item .product-name {
        font-size: 16px;
        font-weight: 600;
        width: 100%;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
        cursor: pointer;
    }

    .shopping-cart .cart-item .price {
        font-size: 16px;
        font-weight: 600;
        padding: 4px 2px;
    }


    .shopping-cart .input-quantity {
        border: 1px solid #000;
        margin-right: 3px;
        font-size: 12px;
        width: 40%;
        outline: none;
        text-align: center;
    }

    .wishimage {

        width: 200px;
        height: 200px;
        object-fit: cover;
        aspect-ratio: 16/16;
    }


    /* Cart or Wishlist */
</style>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wishlist</title>
</head>

<body>


    <div class="deletewish alert alert-success alert-dismissible fade show d-none" role="alert">
        Item deleted from wishlist
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    if (isset($_COOKIE['deletewish'])) {

        echo "<script>$('.deletewish').removeClass('d-none');</script>";
    }
    ?>
    <div class="py-3 py-md-5 bg-light my-5">
        <div class="container">
            <h3>Your Wishlist</h3>
            <?php
            if ($rowcount == 0) {
                ?>
                <p>No item in wishlist</p>
                <a href="product.php">Explore</a>
                <?php
            } else {
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="shopping-cart">

                            <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Products</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Price</h4>
                                    </div>

                                    <div class="col-md-2">
                                        <h4>Remove</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="cart-item">
                                <div class="row">
                                    <?php
                                    while ($row = $result->fetch_assoc()) {
                                        # code...
                                
                                        ?>
                                        <div class="col-md-6 my-auto">
                                            <a href="productdetails.php?id=<?php echo $row['p_id'] ?>">
                                                <label class="product-name">
                                                    <img src="image/<?php echo $row['p_image'] ?>" alt="" class="wishimage">
                                                    <?php echo $row['p_name'] ?>
                                                </label>
                                            </a>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <label class="price">
                                                <?php echo $row['p_price'] ?>
                                            </label>
                                        </div>

                                        <div class="col-md-2 col-5 my-auto">
                                            <div class="remove">
                                                <a href="deletewish.php?id=<?php echo $row['p_id'] ?>"
                                                    class="btn-danger btn-sm text-danger">
                                                    <i class="fa fa-trash"></i> Remove
                                                </a>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
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

    <?php
    include 'footer.php';
    ?>
</body>

</html>