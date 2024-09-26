<?php
include 'header.php';

$sql = "SELECT * FROM orders";
$result = mysqli_query($con, $sql);
if ($result = mysqli_query($con, $sql)) {
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows($result);
}

?>
<style>
    <?php include 'style.css' ?>

</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Tea</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="script.js"></script>
</head>

<body>

    <div class="container d-flex justify-content-center">
        <div class="row w-100">
            <div class="col-12 col-sm-12 col-md-12 text-dark">
                <div class="card ">
                    <img class="card-img-top w-100" src="../image/p3.jpg" alt="Card image">
                    <div class="card-img-overlay d-flex align-items-center justify-content-center">
                        <h2 class="card-title text-dark text-uppercase">Orders Placed</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container bg-white text-dark shadow-lg bg-body w-100 my-3 p-3">
        <div class="container bg-white text-dark shadow-lg bg-body rounded w-100 ">
            <div class="row">
                <div class="col-sm-12 col-md-12 bg-white text-dark">
                    <p class="text-success">Dashboard <span class="text-dark">| ORDERS PLACED</span></p>
                </div>
            </div>
        </div>
        <h3 class="text-uppercase text-center my-5">total orders placed</h3>

        <div class="row gap-1">

            <?php

            if ($rowcount > 0) {

                while ($row = $result->fetch_assoc()){
                    
                    $order_status=$row['order_status'];
                    ?>
                    <div class="container p-3 col-12 col-sm-12 col-md-12 col-lg-5 bg-white shadow-lg bg-body rounded">
                        <div class="log d-flex">
                            <?php

                            $orderid = $row['order_id'];
                            if ($row['order_status'] == "Processing") {
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

                        </div>
                        <p>User Name:
                            <?php echo $row['user_name'] ?>
                        </p>
                        <p>First Name:
                            <?php echo $row['first_name'] ?>
                        </p>
                        <p>Last Name:
                            <?php echo $row['last_name'] ?>
                        </p>
                        <p>Placed On:
                            <?php echo $row['order_date'] ?>
                        </p>
                        <p>User Email:
                            <?php echo $row['email'] ?>
                        </p>
                        <p>Total Price:
                            <?php echo $row['total_price'] ?>
                        </p>
                      
                        <p>Address:
                            <?php echo $row['address'] ?>
                        </p>
                        <form action="updateorders.php?id=<?= $orderid ?>" method="post">

                            <div class="row">
                                <div class="form mb-3 mt-3 col-md-12 col-12">
                                    <label for="status" class="text-dark"></label>
                                    <select class="form-select form-control shadow-lg border-success" id="status" name="status">
                                        <option value="Processing">Processing</option>
                                        <option value="Delivered">Delivered</option>
                                        <option value="cancelled">Cancelled</option>
                                        <option value="Shipped">Shipped</option>
                                    </select>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center gap-2">
                                    <?php
                                        if ($order_status == 'Pending') {

                                        ?>
                                        <button type="submit" name="confirmbtn"
                                            onclick="alert('order confirmed successfully')"
                                            class="btn btn-success rounded ">Confirm Order</button>
                                          <?php
                                        }
                                          ?>
                                        <button class="btn btn-success rounded " name="updatebtn"
                                            onclick="alert('Status Updated')">Update Status</button>

                                        <button type="submit" name="deletebtn"
                                            onclick="alert('Are you sure you want to delete?')"
                                            class="btn btn-success rounded ">Delete Order</button>

                                    </div>
                                    
                                </div>
                            </div>
                        </form>
                        <?php

                        ?>
                    </div>
                    <?php
                }
            } else {
                ?>
                <p>No orders Placed</p>

                <?php
            }
            ?>

        </div>
    </div>
    </div>

    <?php
    include 'footer.php'
        ?>
</body>

</html>