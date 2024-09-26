<?php
require_once 'header.php';
unset($_SESSION['user_name']);
unset($_SESSION['loggedin']);
?>
<script>
    window.location.href = "index.php";
</script>