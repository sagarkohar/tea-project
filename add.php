<?php

require 'db_connect.php';
session_start();
$username = $_SESSION['user_name'];
if (isset($_POST['qnt'])) {
    $quantity = $_POST['qnt'];
} else {
    $quantity = 1;
}

if (isset($_POST['cartBtn'])) {


    if (isset($_GET['id'])) {

        $product_id = $_GET['id'];

        $sql = "SELECT * FROM products WHERE p_id='$product_id'";
        $result = mysqli_query($con, $sql);
        while ($row = $result->fetch_assoc()) {
            $p_id = $row['p_id'];
            $pname = $row['p_name'];
            $pprice = $row['p_price'];
            $pimage = $row['p_image'];
            $pstatus = $row['p_status'];
            // $detail = $row['p_details'];
        }
       
        $sql1 = "SELECT * FROM cart WHERE user_name='$username'";
        $result1 = mysqli_query($con, $sql1);
        $pr_id = 0;
        while ($row = $result1->fetch_assoc()) {
            $pr_id = $row['p_id'];
        }
        if ($product_id == $pr_id) {
            setcookie("existscart", "Already exists", time() + 2, "/");
        } else {

            $tprice = $pprice * $quantity;
            $insert = "INSERT INTO cart (user_name,p_id,p_name,p_price,t_price,p_image,p_status,quantity) VALUES
('$username','$product_id','$pname','$pprice','$tprice','$pimage','$pstatus','$quantity')";
            $res = $con->query($insert);

            if (!$res) {
                echo "Error" . $con->error;
            } else {
                setcookie("addedcart", "Item added to cart", time() + 2, "/");
            }
        }

    }
}
if (isset($_POST['wishBtn'])) {

    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE p_id='$product_id'";
        $result = mysqli_query($con, $sql);
        while ($row = $result->fetch_assoc()) {
            $p_id = $row['p_id'];
            $pname = $row['p_name'];
            $pprice = $row['p_price'];
            $pimage = $row['p_image'];
            $pstatus = $row['p_status'];
            // $detail = $row['p_details'];
        }
        $sql1 = "SELECT * FROM wishlist WHERE user_name='$username'";
        $result1 = mysqli_query($con, $sql1);
        $pr_id = 0;
        while ($row = $result1->fetch_assoc()) {
            $pr_id = $row['p_id'];
        }

        if ($product_id == $pr_id) {
            setcookie("existswish", "Already exists wish", time() + 2, "/");
        } else {
            $insert = "INSERT INTO wishlist (user_name,p_id,p_name,p_price,p_image,p_status) VALUES
('$username','$product_id','$pname','$pprice','$pimage','$pstatus')";
            $res = $con->query($insert);
            if ($res) {
                setcookie("addedwish", "Item added to wish", time() + 2, "/");
            }
        } 
    }
}


?>


<script>
    window.location.href = 'product.php'
</script>