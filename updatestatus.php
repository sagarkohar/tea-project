<?php
require 'db_connect.php';
if (isset($_GET['email'])) {
    $email = $_GET['email'];

    $sql = "UPDATE registration SET status='active' WHERE email='$email'";
    $result = $con->query($sql);
    if ($result) {
        setcookie("verified", "Account Verified successfully", time() + 2, "/");
        echo "Cookie set!";
    } else {
        echo "Error" . $con->error;
    }
}
?>
<script>
    window.location.href = 'login.php';
</script>