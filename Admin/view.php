<?php
include 'header.php';

$sql = "SELECT * FROM products";
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
            <h1 class="text-center text-success mb-4">ALL PRODUCTS</h1>

            <div class="order-list table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="text-success">Product Name:</th>
                            <th scope="col" class="text-success">Product Price:</th>
                            <th scope="col" class="text-success">Product Image</th>
                            <th scope="col" class="text-success">Product Status:</th>
                            <th scope="col" class="text-success">Edit Products</th>
                            <th scope="col" class="text-success">Delete Products</th>
                            <th scope="col" class="order-details text-success">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row['p_name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['p_price']; ?>
                                </td>
                                <td><img src="<?php echo "../image/" . $row['p_image']; ?>" class=" image-fluid" alt=""></td>
                                <?php
                                if ($row['p_status'] == 'Available') {
                                    ?>
                                    <td><span class="badge bg-success">
                                            <?php echo $row['p_status']; ?>
                                        </span></td>
                                    <?php
                                } else {
                                    ?>
                                    <td><span class="badge bg-danger">
                                            <?php echo $row['p_status']; ?>
                                        </span></td>
                                    <?php
                                }
                                ?>
                                <td><a href="editproducts.php ?id=<?= $row['p_id'] ?>">Edit Product</a></td>
                                <td><a href="delete.php ?id=<?= $row['p_id'] ?>"
                                        onclick="alert('Are you sure,you want to delete this product?')">Delete Product</a>
                                </td>
                                <td class="order-details"><a href="productdetails.php ?id=<?= $row['p_id'] ?>"
                                        class="text-primary">View Details</a></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>

</body>

</html>