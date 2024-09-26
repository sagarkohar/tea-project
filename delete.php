<?php
require 'db_connect.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $delete = "DELETE FROM cart WHERE p_id=$product_id";
    $result=$con->query($delete);
    if ($result) {
        setcookie("removed","removed successfully", time() + 2, "/");
    }
}
?>
<script>
    window.location.href = "cart.php";
</script>