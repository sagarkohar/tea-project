<?php

require 'db_connect.php';
session_start();
$username = $_SESSION['user_name'];

$query = "SELECT * FROM registration WHERE user_name='$username'";
$res = mysqli_query($con, $query);
while ($row = $res->fetch_assoc()) {
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $email = $row['email'];
    $phone = $row['phone_number'];
    $address=$row['address'];
}

if (isset($_SESSION['total_price']) && isset($_SESSION['p_names']) && isset($_SESSION['quantity'])) {
    $qnt = $_SESSION['quantity'];
    $pprice = $_SESSION['total_price'];
    $p_names = $_SESSION['p_names'];

    $product_names = implode(", ", $p_names);


    if (isset($_GET['id'])) { // Check if both id and paymentMethod are set

        $product_id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE p_id='$product_id'";
        $result = mysqli_query($con, $sql);
        while ($row = $result->fetch_assoc()) {
            $pstatus = $row['p_status'];
            $stock = $row['stock'];
        }

        $insert = "INSERT INTO orders (user_name, first_name, last_name, p_names, order_date,quantity, total_price, email, phone_number, address) 
           VALUES ('$username', '$first_name', '$last_name', '$product_names', CURDATE(),$qnt, $pprice, '$email', '$phone', '$address')";

        $st = $con->query($insert);
        if ($st) {
            unset($_SESSION['quantity']);
            unset($_SESSION['total_price']);
            unset($_SESSION['p_names']);
            $stock = $stock - $qnt;
            $result = mysqli_query($con, "UPDATE products SET stock=$stock WHERE p_id=$product_id");
            if ($stock == 0) {
                mysqli_query($con, "UPDATE products SET p_status='out of stock' WHERE p_id=$product_id");
            }
            setcookie("payment", "order placed", time() + 2, "/");
        } else {

        }

    }
} else {
    if (isset($_GET['id'])) { // Check if both id and paymentMethod are set
        $product_id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE p_id='$product_id'";
        $result = mysqli_query($con, $sql);
        while ($row = $result->fetch_assoc()) {
            $pname = $row['p_name'];
            $pprice = $row['p_price'];
            $pstatus = $row['p_status'];
            $stock = $row['stock'];
        }

        $insert = "INSERT INTO orders (user_name, first_name, last_name, p_names, order_date, total_price, email, phone_number, address) 
           VALUES ('$username', '$first_name', '$last_name', '$pname', CURDATE(), $pprice,  '$email', '$phone', '$address')";

        $st = $con->query($insert);
        if ($st) {
            unset($_SESSION['total_price']);
            unset($_SESSION['p_names']);
            $qnt = 1;
            $stock = $stock - $qnt;
            $result = mysqli_query($con, "UPDATE products SET stock=$stock WHERE p_id=$product_id");
            if ($stock == 0) {
                mysqli_query($con, "UPDATE products SET p_status='out of stock' WHERE p_id=$product_id");
            }
            setcookie("payment", "order placed", time() + 2, "/");
        } else {
            echo "Error" . $con->error;
        }

    }
}
?>

<script>
    // window.location.href = 'product.php';
</script>