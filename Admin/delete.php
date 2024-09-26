<?php
include 'header.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $delete = "DELETE FROM products WHERE p_id=$product_id";
    $con->query($delete);
    echo "<script>
    window.location.href='view.php';
</script>";
}

if (isset($_GET['slider_id'])) {
    $slider_id = $_GET['slider_id'];
    $delete = "DELETE FROM slider WHERE slider_id=$slider_id";
    $con->query($delete);
    echo "<script>
    window.location.href='slider.php';
</script>";
}

if (isset($_GET['brand_id'])) {
    $brand_id = $_GET['brand_id'];
    $delete = "DELETE FROM brand_icon WHERE brand_id=$brand_id";
    $con->query($delete);
    echo "<script>
    window.location.href='brandicons.php';
</script>";
}
if (isset($_GET['coupon_id'])) {
    $coupon_id = $_GET['coupon_id'];
    $delete = "DELETE FROM offers WHERE coupon_id=$coupon_id";
    $con->query($delete);
    echo "<script>
    window.location.href='offers.php';
</script>";
}
?>