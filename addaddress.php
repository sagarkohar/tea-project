<?php

session_start();

require 'db_connect.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_SESSION['user_name'];



// Fetching necessary data from registration table
$get = "SELECT * FROM registration WHERE user_name='$username'";
$result = mysqli_query($con, $get);
while ($row = $result->fetch_assoc()) {
    $phone = $row['phone_number'];
    $gender = $row['gender'];
    $address1=$row['address'];
}

function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first = sanitize_input(strtolower($_POST['first_name']));
    $last = sanitize_input(strtolower($_POST['last_name']));
    $email = sanitize_input(strtolower($_POST['email']));
    $state = sanitize_input($_POST['state']);
    $city = sanitize_input($_POST['city']);
    $address2 = sanitize_input($_POST['address']);
    $address=$address1+","+ $address2;

    // Assuming 'address' is the table name and 'gender' is a field in 'address' table
    $query = "UPDATE registration set address='$address'";
    $res = $con->query($query);
    if ($res) {
        echo "updated successfully";
    } else {
        echo "Error: " . $query . "<br>" . $con->error;
    }
}

?>