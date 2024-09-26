<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Link Bootstrap CSS -->
    <link href="path/to/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Styles */
        .coupon-container {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="my-4">Available Offers</h1>
        <?php
        $offer = mysqli_query($con, "SELECT * FROM offers");

        while ($detail = $offer->fetch_assoc()) {
            ?>
            <div class="coupon-container shadow">
                <p>Coupon code: <?php echo $detail['coupon_code'] ?></p>
                <p>Discount: <?php echo $detail['discount'] ?>%</p>
            </div>
            <?php
        }
        ?>
        <a href="cart.php" class="btn btn-success">Go Back</a>
    </div>
<?php
include 'footer.php';
?>
    <!-- Link Bootstrap JS (optional if you need Bootstrap JavaScript features) -->
    <script src="path/to/bootstrap.min.js"></script>
</body>

</html>