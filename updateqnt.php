<?php
require 'db_connect.php';
if (isset($_GET['qnt'])) {
  
    $qnt = $_GET['qnt'];
    $pid = $_GET['pid'];
    $result = $con->query("SELECT p_price FROM cart WHERE p_id=$pid");

    if ($result) {

        if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();
            $pprice = $row['p_price'];
        }
        $t_price = $qnt * $pprice;
        echo $t_price;
        $update = "UPDATE cart SET quantity = $qnt, t_price = $t_price WHERE p_id = $pid";

        $result = $con->query($update);
        if (!$result) {
            echo "Error" . $con->error;
        } else {

        }
    }
}
?>
<script>
    window.location.href='cart.php';
</script>