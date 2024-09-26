<?php
include 'header.php';

$sql = "SELECT * FROM offers";
$result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="html2pdf.bundle.min.js"></script>

    <style>
        .table {
            width: 100%;
            table-layout: auto;
        }

        .order-list table td {
            white-space: nowrap;
        }

        .order-list table th {
            white-space: nowrap;
        }

        .order-list table img {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        .shop {
            aspect-ratio: 1/1;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="bg-white shadow-lg mt-3 p-3">
            <h1 class="text-center text-success mb-4">ALL OFFERS</h1>

            <div class="order-list table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="text-success">Coupon Code</th>
                            <th scope="col" class="text-success">Discount%</th>
                            <th scope="col" class="text-success">Minimum Purchase</th>
                             <th scope="col" class="text-success">Coupon Status</th>
                              <th scope="col" class="text-success">Edit Coupon</th>
                               <th scope="col" class="text-success">Delete Coupon</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row['coupon_code']; ?>
                                </td>
                                <td>
                                    <?php echo $row['discount']; ?>
                                </td>
                                 <td>
                                    <?php echo $row['minimum_order']; ?>
                                </td>

                                <?php
                                if ($row['coupon_status'] == 'Active') {
                                    ?>
                                    <td><span class="badge bg-success">
                                            <?php echo $row['coupon_status']; ?>
                                        </span></td>
                                    <?php
                                } else {
                                    ?>
                                    <td><span class="badge bg-danger">
                                            <?php echo $row['coupon_status']; ?>
                                        </span></td>
                                    <?php
                                }
                                ?>
                                <td><a href="editcoupon.php ?id=<?= $row['coupon_id'] ?>">Edit Coupon</a></td>

                                <td><a href="delete.php ?coupon_id=<?= $row['coupon_id'] ?>"
                                        onclick="alert('Are you sure,you want to delete this coupon?')">Delete Coupon</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="addcoupon.php">Add Coupon</a>
            </div>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>

</body>

</html>