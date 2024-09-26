<?php
require '../db_connect.php';
if ($_GET['id']) {
    $orderid = $_GET['id'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['updatebtn'])) {
            $success = false;
            $status = $_POST['status'];

            $update = "UPDATE orders SET order_status='$status' WHERE order_id='$orderid'";

            $res = $con->query($update);
            if ($res) {
                $success = true;

            } else {
                echo "Error" . $con->error;
            }
        }
        if (isset($_POST['deletebtn'])) {
            $delete = "DELETE FROM orders WHERE order_id= '$orderid'";
            $con->query($delete);
        }

        if (isset($_POST['confirmbtn'])) {
            $update = "UPDATE orders SET order_status= 'Processing' WHERE order_id='$orderid'";
            $con->query($update);
        }
    }

}

?>
<script>
    window.location.href = 'orders.php';
</script>