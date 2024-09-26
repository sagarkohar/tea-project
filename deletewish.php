<?php
require 'db_connect.php';
if (isset($_GET['id'])) {
    $id=$_GET['id'];
}
$delete="DELETE FROM wishlist WHERE p_id=$id";
$result=$con->query($delete);
if ($result) {
    setcookie("deletewish","deleted wish",time() + 2, "/");
}
?>
<script>
    window.location.href='wishlist.php';
</script>