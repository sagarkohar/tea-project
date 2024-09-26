<?php
include 'db_connect.php';
$id = $_GET['id'];
$showAlert = false;
$update = "UPDATE orders SET order_status='cancelled' WHERE order_id=$id";
$result = mysqli_query($con, $update);
if ($result) {
    $showAlert = true;
}
?>
<script>
    window.location.href='order.php';
</script>