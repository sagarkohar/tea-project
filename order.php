<?php
include 'header.php';

$sql = "SELECT * FROM orders WHERE user_name='$username'";
$result = mysqli_query($con, $sql);


if ($result = mysqli_query($con, $sql)) {
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows($result);
}
$sql1 = "SELECT * FROM registration WHERE user_name='$username'";
$result1 = mysqli_query($con, $sql1);

$sql2 = "SELECT * FROM adminlogin";
$result2 = mysqli_query($con, $sql2);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="html2pdf.bundle.min.js"></script>

    <style>
        <?php include 'style.css' ?>

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
    </style>
</head>

<body>
<?php
if (isset($_POST['cancel'])) {
    if ($showAlert) {
        ?>
        <div class="failed alert alert-success alert-dismissible fade show" role="alert">
            order cancelled
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
    }
}
?>
    <div class="container">

        <div class="bg-white shadow-lg mt-3 p-3">
            <h1 class="text-center text-success mb-4">Your Orders</h1>

            <div class="order-list table-responsive">
                <h4 class="mb-4">Recent Orders</h4>
                <?php
                if ($rowcount > 0) {
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" class="text-success">Order ID</th>
                                <th scope="col" class="text-success">Date Placed</th>
                                <th scope="col" class="text-success">Items</th>
                                <th scope="col" class="text-success">Quantity</th>
                                <th scope="col" class="text-success">Total</th>
                                <th scope="col" class="text-success">Status</th>
                                <th scope="col" class="text-success">Cancel</th>
                                <th scope="col" class="order-details text-success">Details</th>
                            </tr>
                        </thead>
                        <?php
                        while ($row = $result->fetch_assoc()) {

                            $orderid = $row['order_id'];
                            // echo $orderid
                    

                            ?>

                            <tbody>

                                <tr>
                                    <td>ORD-
                                        <?php echo $id= $row['order_id'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['order_date'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['p_names'] ?>
                                    </td>
                                     <td>
                                        <?php echo $row['quantity'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['total_price'] ?>
                                    </td>
                                     
                                    <td>
                                        <?php
                                        if ($row['order_status'] == "Pending") {
                                            ?>
                                                <span class="badge bg-danger">
                                                    <?php echo $row['order_status'] ?>
                                                </span>
                                                <?php
                                        }
                                        elseif ($row['order_status'] == "Processing") {
                                            ?>
                                            <span class="badge bg-warning">
                                                <?php echo $row['order_status'] ?>
                                            </span>
                                            <?php
                                        } elseif ($row['order_status'] == "Shipped") {
                                            ?>
                                            <span class="badge bg-primary">
                                                <?php echo $row['order_status'] ?>
                                            </span>
                                            <?php
                                        } elseif ($row['order_status'] == "Delivered") {
                                            ?>
                                            <span class="badge bg-success">
                                                <?php echo $row['order_status'] ?>
                                            </span>
                                            <?php
                                        } else {
                                            ?>
                                            
                                            <span class="badge bg-danger">
                                                <?php echo $row['order_status'] ?>
                                            </span>
                                           
                                            <?php
                                        }
                                        ?>
                                    </td>
                                     <td>
                                                   <a href="cancelorder.php?id=<?php echo $id ?>" name="cancel">Cancel Order</a>
                                            </td>
                                    <td class="order-details"><a href="invoice1.php?ordid=<?php echo $orderid ?>"
                                            class="text-primary" data-bs-toggle="modal" data-bs-target="#orderDetailsModal">View
                                            Details</a></td>
                                </tr>
                            </tbody>
                            <?php
                        }
                } else {
                    ?>
                        <p>No orders Place</p>
                        <a href="product.php">Explore</a><br>
                        <?php
                }
                ?>


                </table>
                <a href="index.php">Go Back</a>
            </div>
        </div>

       <div class="modal fade" id="orderDetailsModal" tabindex="-1" aria-labelledby="orderDetailsModalLabel"
     aria-hidden="true">
    <!-- Modal content here -->
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex">
                <div class="head">
                    <h5 class="modal-title title-center" id="orderDetailsModalLabel">Order Details</h5>
                </div>
                <div class="buttons">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="container">
                <?php
                $sql3 = "SELECT * FROM orders WHERE order_id='$orderid'";
                $result3 = mysqli_query($con, $sql3);
                while ($row1 = $result3->fetch_assoc()) {
                ?>
                <div class="invoice">
                    <div id="invoice">
                        <div class="header d-flex justify-content-between align-items-center mb-4">
                            <img src="image/logo.jpg" alt="Company Logo" class="logo">
                            <div class="invoice-info text-end">
                                <h1>Invoice</h1>
                                <p>Invoice Number: #12345</p>
                                <p>Date: 2024-02-13</p>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <?php
                                while ($row = $result2->fetch_assoc()) {
                                ?>
                                <div class="customer-address">
                                    <h2>Seller:</h2>
                                    <p>Name: <?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></p>
                                    <p>Address: <?php echo $row['address']; ?></p>
                                    <p><?php echo $row['state']; ?> <?php echo $row['city']; ?></p>
                                    <p>Phone: <?php echo $row['phone_number']; ?></p>
                                    <p>Email: <?php echo $row['email']; ?></p>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <?php
                                while ($row = $result1->fetch_assoc()) {
                                ?>
                                <div class="customer-address">
                                    <h2>Customer:</h2>
                                    <p>Name: <?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></p>
                                    <p>Address: <?php echo $row['address']; ?></p>
                                    <p><?php echo $row['state']; ?> <?php echo $row['city']; ?></p>
                                    <p>Phone: <?php echo $row['phone_number']; ?></p>
                                    <p>Email: <?php echo $row['email']; ?></p>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="details">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Gross Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="custom-description">
                                            <h3>Item 1</h3>
                                            <p>This is a custom description for item 1. You can add detailed information about the item here.</p>
                                        </div>
                                    </td>
                                    <td>2</td>
                                    <td>$10</td>
                                    <td>$20</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-description">
                                            <h3>Item 2</h3>
                                            <p>This is a custom description for item 2. You can add detailed information about the item here.</p>
                                        </div>
                                    </td>
                                    <td>1</td>
                                    <td>$25</td>
                                    <td>$25</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="3">Subtotal:</td>
                                    <td>$45</td>
                                </tr>
                                <tr>
                                    <td colspan="3">GST (10%):</td>
                                    <td>$4.50</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Tax:</td>
                                    <td>$5.50</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Total:</td>
                                    <td>$55.50</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <button class="btn text-center bg-success" id="downloadPdf">Download Invoice</button>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

    </div>
    <?php
    include 'footer.php';
    ?>
</body>

</html>

<script>
    window.onload = function () {
        document.getElementById('downloadPdf').addEventListener("click", () => {
            const invoice = this.document.getElementById("invoice");
            var opt = {
                margin: 1,
                filename: 'invoice.pdf',
                image: {
                    type: 'pdf',
                    quality: 1
                },
                html2canvas: {
                    scale: 2, // Adjusted scale for better quality

                },
                jdPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'portrait'
                },
                pagebreak: { // Define page breaks
                    mode: 'avoid-all'
                }
            }
            html2pdf().from(invoice).set(opt).save();
        })
    }
</script>