<?php
require 'db_connect.php';
session_start();
if (isset($_GET['order_id'])) {
    $orderid=$_GET['order_id'];
}
if (isset($_GET['name'])) {
    $pname = $_GET['name'];
}
$username = $_SESSION['user_name'];
$result=mysqli_query($con,"SELECT * FROM orders WHERE user_name='$username'");
while ($row=$result->fetch_assoc()) {
    $quantity=$row['quantity'];
}
// Execute the query
$result1 = mysqli_query($con, "SELECT * FROM products WHERE p_name='$pname'");

// Check if the query executed successfully
if (!$result1) {
    die("Error: " . mysqli_error($con));
}

// Fetch data from the result set
while ($row1 = $result1->fetch_assoc()) {
    $stock = $row1['stock'];
    $pid = $row1['p_id'];
}

$stock=$stock+$quantity;
$delete = mysqli_query($con, "DELETE FROM orders WHERE username='$username' AND order_id='$orderid'");
if ($delete) {
    $update="UPDATE products SET stock=$stock WHERE p_id=$pid";
}

?>