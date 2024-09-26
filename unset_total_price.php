<?php
session_start();

// Unset the session variable for total price
unset($_SESSION['total_price']);

echo 'Session variable total_price unset successfully.';
?>
