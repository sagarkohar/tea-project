<?php

// Database connection
require 'db_connect.php';
// Fetch user information based on the logged-in user's username

$username = $_SESSION['user_name'];

$sql = "SELECT * FROM registration WHERE user_name = '$username'";
$result = mysqli_query($con, $sql);

// Check if user data is fetched successfully
while ($row = $result->fetch_assoc()) {
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    // $username = $row['user_name'];
    $email = $row['email'];
    $phon = $row['phone_number'];
    $state = $row['state'];
    $city = $row['city'];
    $address = $row['address'];
    $password = $row['password'];
    $gender = $row['gender'];
    $image = $row['image'];
    $role = $row['role'];

    // Convert phone number to integer
    $phone = (int) $phon;
} 


// Close database connection

?>